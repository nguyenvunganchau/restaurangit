<?php

namespace App\Http\Controllers\New;

use App\Modules\CategoryFood\Models\CategoryFood;
use App\Modules\News\Models\News;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NewController extends BaseController
{
    public function show_create_new(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.new.create');
    }
    public function show_edit_new($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $new = News::find($id);
        return view('employee.page.new.create', ['new' => $new]);
    }

    public function show_list_new(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $new = News::orderby('new_id', 'desc')->paginate(15);
        return view('employee.page.new.list', ['new' => $new]);
    }
    public function destroy($id): RedirectResponse
    {
        $new = News::find($id);
        $new->delete();
        return redirect()->route('show_list_new.index')->with('success', 'Đã được xóa thành công!');
    }
    public function create_new(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'images' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề!',
            'images.required' => 'Vui lòng chọn ảnh!',
            'description.required' => 'Vui lòng nhập mô tả!',
        ]);

        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $imagePath = $this->uploadFile($request->file('images'));
        }

        try {
            DB::beginTransaction();
            $new = new News();
            $new->title = $request->input('title');
            $new->image_news = $imagePath;
            $new->description = $request->input('description');
            $new->save();

            DB::commit();
            return redirect()->route('show_list_new.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
    public function edit_new($id)
    {
        $new = News::findOrFail($id);
        return view('employee.page.new.edit', [
            'new' => $new,
        ]);
    }
    public function update_new(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề!',
            'description.required' => 'Vui lòng nhập mô tả!',
        ]);

        $new = News::findOrFail($id);

        try {
            DB::beginTransaction();

            // Kiểm tra và upload ảnh mới nếu có
            if ($request->hasFile('images') && $request->file('images')->isValid()) {
                $imagePath = $this->uploadFile($request->file('images'));
            } else {
                $imagePath = $new->image_news; // Giữ lại đường dẫn ảnh hiện tại
            }

            $new->title = $request->input('title');
            $new->description = $request->input('description');
            $new->image_news = $imagePath;
            $new->save();

            DB::commit();
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('show_list_new.index');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('error', 'Đã xảy ra lỗi khi cập nhật: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('news', $fileName, 'public');
    }
}
