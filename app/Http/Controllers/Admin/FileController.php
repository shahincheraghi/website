<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class FileController extends Controller
{

    public function saveImages(Request $request)
    {

        $host = request()->getHttpHost();
        $validatedData = $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,JPG,gif,svg|max:2048',
        ]);
        if ($files = $request->file('file')) {
            $destinationPath = 'File/filemanager/'; // upload path
            $profileImage = storeFile($files, $destinationPath);
        }

        //return ['location' => "/" . $profileImage];
        return ['location' => "/" . $profileImage];

    }
}
