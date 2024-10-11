<?php

namespace App\Http\Controllers\CategoryFood;

use App\Modules\CategoryFood\Models\CategoryFood;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryFoodController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function show_create_category_food(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.category_food.create');
    }

    public function show_list_category_food(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category_food = CategoryFood::orderby('category_id', 'desc')->paginate(15);
        return view('employee.page.category_food.list', ['category_food' => $category_food]);
    }

    public function create_category_food(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục!',
        ]);
        try {
            DB::beginTransaction();
            $category_food = new CategoryFood();
            $category_food->name = $request['name'];
            $category_food->save();
            DB::commit();
            Session::flash('success', 'Thêm thành công!');
            return redirect()->route('show_list_category_food.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
    public function destroy($id): RedirectResponse
    {
        $category_food = CategoryFood::find($id);
        $category_food->delete();
        return redirect()->route('show_list_category_food.index')->with('success', 'Đã được xóa thành công!');
    }
    public function edit_category_food($id)
    {
        $category_food = CategoryFood::findOrFail($id);

        return view('employee.page.category_food.edit', [
            'category_food' => $category_food,
        ]);
    }
    public function update_category_food(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục!',
        ]);

        $category_food = CategoryFood::findOrFail($id);
        $category_food->fill($request->except('category_food_id'));
        $category_food->save();

        Session::flash('success', 'Cập nhật thành công!');
        return redirect()->route('show_list_category_food.index');
    }
}
