<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\requestUser;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function GuzzleHttp\Promise\all;

class UsersController extends Controller
{


    public function index($type)
    {
        $users = User::getUsers($type);
        $all_data = ['users' => $users];
        return view('Admin.User.userList')->with('data', $all_data);
    }


    public function create()
    {
        return view('Admin.User.userInsert');
    }

    public function store(requestUser $request)
    {
        $data['name'] = $request->name;
        $data['family'] = $request->family;
        $data['email'] = $request->email;
        $data['mobile'] = $request->mobile;

        $data['national_identity'] = $request->national_identity;
        $data['username'] = $request->username;
        $data['status'] = (int)$request->status;
        $data['type'] = (int)$request->type;
        $data['delete'] = 0;
        $data['birth_date'] = 0;
        $data['password'] = Hash::make($request->password);
        if (isset($request->birth_date))
        $data['birth_date'] = DateTimeTOTimeStamp($request->birth_date);
//        dd($request->all());

        $hasFile = $request->hasFile('imageInfo');
        $file = $request->file('imageInfo');
        $allowedfileExtension = ['jpeg', 'jpg', 'png'];
        $filePath = 'File/user/';
        $image = '';
        $checkUsername = User::checkUsername($request->username, 0);
        $checkMobile = User::checkMobile($request->mobile, 0);
        $checkNationalIdentity = User::checkNationalIdentity($request->national_identity, 0);

        if ($checkUsername > 0)
            return redirect()->route('Admin.users.create')->with('msgError', trans('langPanel.the_username_failed'));

        if ($checkMobile > 0)
            return redirect()->route('Admin.users.create')->with('msgError', trans('langPanel.the_mobile_failed'));

        if ($checkNationalIdentity > 0)
            return redirect()->route('Admin.users.create')->with('msgError', trans('langPanel.the_national_identity_failed'));


        if ($hasFile) {

            $image = storeFile($file, $filePath);
        }
        $data['image'] = $image;
        $check = User::store($data);

        if ($check === true)
            return redirect()->route('Admin.users.create')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.users.create')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $user = User::getUserD($id);
        $all_data = ['user' => $user];
        return view('Admin.User.userEdit')->with('data', $all_data);

    }

    public function update(requestUser $request, $id)
    {
        $User = User::getUserD($id);
        $data['name'] = $request->name;
        $data['family'] = $request->family;
        $data['email'] = $request->email;
        $data['mobile'] = $request->mobile;
        $data['national_identity'] = $request->national_identity;
        $data['username'] = $request->username;
        $data['status'] = (int)$request->status;
        $data['type'] = (int)$request->type;
        //$data['password'] = Hash::make($request->password);
        $data['delete'] = 0;
        $data['birth_date'] = 0;
        if (isset($request->birth_date))
            $data['birth_date'] = DateTimeTOTimeStamp($request->birth_date);

        $checkUsername = User::checkUsername($request->username, $id);
        $checkMobile = User::checkMobile($request->mobile, $id);
        $checkNationalIdentity = User::checkNationalIdentity($request->national_identity, $id);

        if ($checkUsername > 0)
            return redirect()->route('Admin.users.edit', $id)->with('msgError', trans('langPanel.the_username_failed'));

        if ($checkMobile > 0)
            return redirect()->route('Admin.users.edit', $id)->with('msgError', trans('langPanel.the_mobile_failed'));

        if ($checkNationalIdentity > 0)
            return redirect()->route('Admin.users.edit', $id)->with('msgError', trans('langPanel.the_national_identity_failed'));


        if ($request->file('image')) {
            $hasFile = $request->hasFile('image');
            $file = $request->file('image');
            $allowedfileExtension = ['jpeg', 'jpg', 'png'];
            $filePath = 'File/user/';
            if ($hasFile)
                $data['image'] = storeFile($file, $filePath);
            if (\Illuminate\Support\Facades\File::exists($User->image)) {
                \Illuminate\Support\Facades\File::delete($User->image);
            }
        } else
            $data['image'] = $User->image;

        $check = User::updateUser($data, $id);

        if ($check === true)
            return redirect()->route('Admin.users.edit', $id)->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.users.edit', $id)->with('msgError', trans('langPanel.the_operation_failed'));
    }


    public function destroy($id)
    {
        $check = User::UserDelete($id);
        if ($check === true)
            return redirect()->back()->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->back()->with('msgError', trans('langPanel.the_operation_failed'));
    }


//    ---------------------


    public function userPerm($userId)
    {
        $user = User::getUserD($userId);
        if ($user == null) {
            return redirect()->back();
        }
        $userPerm = $user->perms()->pluck('perm_route_name');
        $all_data = ['user' => $user, 'userPerm' => $userPerm];
        return view('Admin.User.userPerm')->with('data', $all_data);
    }

    public function userPermUpdate(Request $request, $userId)
    {

        $user = User::getUserD($userId);
        if ($user == null) {
            return redirect()->back();
        }
        $a = Arr::flatten($request->perm);

        $arrVal = [];
        foreach ($a as $item) {
            if ($item != null)
                $arrVal[] = ['perm_route_name' => $item];
        }
        $user->perms()->delete();
        $user->perms()->createMany($arrVal);
        return redirect()->route('Admin.userPerm.index', $userId);
    }

//    ---------------------

    public function profileEdit()
    {
        $user = \App\User::getUser();
        $social = Settings::getSocial();
        $all_data = ['user' => $user, 'social' => $social];
        return view('Admin.Profile.profile')->with('data', $all_data);
    }

    public function profileUpdate(Request $request)
    {
        $data = [];
        if (isset($request->password))
            $data['password'] = Hash::make($request->password);
        if (isset($request->image))
            $data['imageInfo'] = storeFile($request->image, 'File/users/');

        $data['name'] = $request->name;
        $data['family'] = $request->family;
        $data['email'] = $request->email;
        $data['birth_date'] = $request->birth_date;
        $data['tel'] = $request->tel;
        $data['mobile'] = $request->mobile;
        $check = \App\User::updateProfile($data);
        if ($check === true)
            return redirect()->route('Admin.users.profile.edit')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.users.profile.edit')->with('msgError', trans('langPanel.the_operation_failed'));
    }

    public function updateSocial(Request $request)
    {
        $check = \App\User::updateSocial($request->social);
        if ($check === true)
            return redirect()->route('Admin.users.profile.edit')->with('msgSuccess', trans('langPanel.mission_accomplished'));
        else
            return redirect()->route('Admin.users.profile.edit')->with('msgError', trans('langPanel.the_operation_failed'));
    }


}
