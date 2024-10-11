<?php

namespace App\Http\Controllers\Comment;

use App\Modules\Comment\Models\Comment;
use App\Modules\Table\Models\TableType;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CommentController extends BaseController
{
    public function show_list_comment(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $comment = Comment::all();
        $table_type = TableType::orderBy('table_type_id', 'desc')->paginate(10);
        return view('employee.page.comment.list', ['comment' => $comment, 'table_type' => $table_type]);
    }

    public function edit_comment($id)
    {
        $table_type = TableType::findOrFail($id);
        $comment = Comment::with('customer')->with('table_type')
            ->where('table_type_id', '=', $table_type->table_type_id)
            ->orderBy('comment_id', 'desc')
            ->get();
        return view('employee.page.comment.edit', [
            'comment' => $comment,
            'table_type' => $table_type
        ]);
    }

    public function destroy($id): RedirectResponse
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('show_list_comment.index')->with('success', 'Đã được xóa thành công!');
    }
}
