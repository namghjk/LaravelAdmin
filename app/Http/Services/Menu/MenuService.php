<?php

namespace App\Http\Services\Menu;

use Illuminate\Support\Str;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class MenuService
{

    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }



    public function create($request)
    {
        try {
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
                'slug' => Str::slug($request->input('name')),
            ]);
            Session::flash('success', 'Tạo thư mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }


    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }
}
