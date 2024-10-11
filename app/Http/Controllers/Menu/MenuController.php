<?php

namespace App\Http\Controllers\Menu;

use App\Modules\CategoryFood\Models\CategoryFood;
use App\Modules\Menu\Models\Menu;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MenuController extends BaseController
{
    public function show_create_menu(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = CategoryFood::all();
        return view('employee.page.menu.create', ['category' => $category]);
    }
    public function show_edit_menu($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $menu = Menu::find($id);
        $category = CategoryFood::all();
        return view('employee.page.menu.create', ['category' => $category, 'menu' => $menu]);
    }

    public function show_list_menu(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $menu = Menu::orderby('item_id', 'desc')->paginate(15);
        $menuCount = Menu::count();
        return view('employee.page.menu.list', ['menu' => $menu, 'menuCount' => $menuCount]);
    }
    public function destroy($id): RedirectResponse
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('show_list_menu.index')->with('success', 'Đã được xóa thành công!');
    }
    public function create_menu(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'images' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ], [
            'item_name.required' => 'Vui lòng nhập tên món!',
            'images.required' => 'Vui lòng chọn ảnh!',
            'price.required' => 'Vui lòng nhập giá tiền!',
            'category_id.required' => 'Vui lòng chọn loại món!',
        ]);

        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $imagePath = $this->uploadFile($request->file('images'));
        }

        try {
            DB::beginTransaction();
            $menu = new Menu();
            $menu->item_name = $request->input('item_name');
            $menu->image_menu = $imagePath;
            $menu->description = $request->input('description');
            $menu->price = $request->input('price');
            $menu->discount = $request->input('discount');
            $menu->category_id = $request->input('category_id');
            $menu->save();
            DB::commit();
            return redirect()->route('show_list_menu.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
    public function edit_menu($id)
    {
        $menu = Menu::findOrFail($id);
        $category = CategoryFood::all();
        return view('employee.page.menu.edit', [
            'menu' => $menu,
            'category' => $category
        ]);
    }
    public function update_menu(Request $request, $id): RedirectResponse
    {
        // Validate input
        $request->validate([
            'item_name' => 'required',
            'price' => 'required',
        ], [
            'item_name.required' => 'Vui lòng nhập tên món!',
            'price.required' => 'Vui lòng nhập giá!',
        ]);

        // Tìm menu theo id
        $menu = Menu::findOrFail($id);

        try {
            DB::beginTransaction();

            // Kiểm tra và upload ảnh mới nếu có
            if ($request->hasFile('images') && $request->file('images')->isValid()) {
                $imagePath = $this->uploadFile($request->file('images'));
            } else {
                $imagePath = $menu->image_menu; // Giữ lại đường dẫn ảnh hiện tại
            }

            // Cập nhật menu
            $menu->item_name = $request->input('item_name');
            $menu->description = $request->input('description');
            $menu->price = $request->input('price');
            $menu->discount = $request->input('discount');
            $menu->image_menu = $imagePath;
            $menu->category_id = $request->input('category_id');
            $menu->save();

            DB::commit();
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('show_list_menu.index');
        } catch (Exception $e) {
            DB::rollback();
            // Thông báo lỗi
            Session::flash('error', 'Đã xảy ra lỗi khi cập nhật: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('menu', $fileName, 'public');
    }
}
