<?php

namespace App\Http\Controllers\Message;

use App\Modules\Message\Message;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MessageController extends BaseController
{
    public function show_list_message(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $message = Message::all();
        $messageCount = Message::count();
        return view('employee.page.message.list', ['message' => $message, 'messageCount' => $messageCount]);
    }

    public function create_message(Request $request)
    {
        $request->validate([
            'name_customer' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ], [
            'name_customer.required' => 'Vui lòng nhập tên!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'subject.required' => 'Vui lòng nhập tiêu đề!',
            'message.required' => 'Vui lòng nhập nội dung!',
        ]);
        try {
            DB::beginTransaction();
            $message = new Message();
            $message->name_customer = $request['name_customer'];
            $message->email = $request['email'];
            $message->subject = $request['subject'];
            $message->message = $request['message'];
            $message->save();
            DB::commit();
            return redirect()->back()->with('success', 'Cảm ơn đã phản hồi nhà hàng chúng tôi');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }

    public function edit_message($id)
    {
        $message = Message::findOrFail($id);
        return view('employee.page.message.edit', [
            'message' => $message,
        ]);
    }
    public function update_message(Request $request, $id): RedirectResponse
    {
        $message = Message::findOrFail($id);

        try {
            DB::beginTransaction();

            $message->status = $request->input('status');
            $message->save();

            DB::commit();
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('show_list_message.index');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('error', 'Đã xảy ra lỗi khi cập nhật: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
