<?php


namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Collection;

class MenuController extends Controller
{

    //index page and return menu data by code we defined in our model (getHTML)
    public function index()
    {
        //menu
        $menus = Menu::orderby('order', 'asc')->get();

        $menu = new Menu;
        $menu = $menu->getHTML($menus);

        return view('Admin.menu.dynamicMenu', compact('menus', 'menu'));
    }

    public function updateMenusParents(Request $request): \Illuminate\Http\JsonResponse
    {
        $menus = json_decode($request->get('menus'), true);
        $this->saveMenu($menus);
        return response()->json(['success' => true]);
    }

    private function saveMenu($menus, $parentId = null)
    {
        foreach ($menus as $menu) {
            $menuItem = Menu::find($menu['id']);
            $menuItem->parent_id = $parentId;
            $menuItem->order = $menu['order'];
            $menuItem->save();
            if (!empty($menu['children'])) {
                $this->saveMenu($menu['children'], $menuItem->id);
            }
        }
    }

    //get edit page

    public function getEdit($id)
    {
        $item = Menu::findOrFail($id);
        return view('admin.menus.edit', compact('item'));
    }

    public function show(Request $request): \Illuminate\Http\JsonResponse
    {
        $where = array('id' => $request->id);
        $Menu  = Menu::where($where)->first();
        return Response()->json($Menu);
    }

    public function destroy(Request $request)
    {
        $id=$request->id;
        $Menu=Menu::find($id);
        $Menu->delete();
    }



    // same as update function when you make resource controller
    public function FormUpdateMenuDynamic(Request $request)
    {
        $item = Menu::find($request->id);
        $item->title = $request->input('title');
        $item->slug = $request->input('slug');
        $item->save();
        return Response()->json($item);
    }

    // AJAX Reordering function (update menu item orders by ajax)
    public function postIndex(MenuRequest $request)
    {
        $source = $request->input('source');
        $destination = $request->input('destination');
        $item = Menu::find($source);
        $item->parent_id = $destination;
        $item->save();

        $ordering = json_decode(Input::get('order'));
        $rootOrdering = json_decode(Input::get('rootOrder'));
        if($ordering){
            foreach($ordering as $order => $item_id){
                if($itemToOrder = Menu::find($item_id)){
                    $itemToOrder->order = $order;
                    $itemToOrder->save();
                }
            }
        } else {
            foreach($rootOrdering as $order=>$item_id){
                if($itemToOrder = Menu::find($item_id)){
                    $itemToOrder->order = $order;
                    $itemToOrder->save();
                }
            }
        }
        return 'ok ';
    }

    //store function (create new item)
    public function postNew(MenuRequest $request)
    {
        $item = new Menu;
        $item->title = $request->input('title');
        $item->slug = $request->input('slug');
        $item->order = Menu::max('order')+1;
        $item->save();

        return redirect()->back();
    }


}
