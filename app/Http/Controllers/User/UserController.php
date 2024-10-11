<?php

namespace App\Http\Controllers\User;

use App\Modules\Employee\Models\Employee;
use App\Modules\Employee\Requests\CreateEmployeeRequest;
use App\Modules\Role\Models\Role;
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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function show_create_employee(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $role = Role::all();
        return view('employee.page.user.create',['role'=>$role]);
    }
    public function show_index_admin(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.index');
    }

    public function show_list_employee(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $employee = Employee::orderby('employee_id', 'desc')->paginate(15);
        $employeeCount = Employee::count();
        return view('employee.page.user.list',
            [
                'employee' => $employee,
                'employeeCount' => $employeeCount,
            ]);
    }

    public function create_employee(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:10',
            'address' => 'required',
            'role_id' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'phone.required' => 'Vui lòng nhập số điện thoiạ!',
            'phone.max' => 'Số điện thoại tối đa 10 ký tự!',
            'address.required' => 'Vui lòng nhập địa chỉ!',
            'role_id.required' => 'Vui lòng chọn loại bàn!',
        ], []);

        try {
            DB::beginTransaction();
            $employee = new Employee();
            $employee->name = $request['name'];
            $employee->address = $request['address'];
            $employee->email = $request['email'];
            $employee->phone = $request['phone'];
            $employee->role_id = $request['role_id'];
            if ($employee->role_id == 1 || $employee->role_id == 4) {
                $employee->password = bcrypt('admin1234');
            } else {
                $employee->password = null;
            }
            $employee->save();
            DB::commit();
            Session::flash('success','Thêm mới thành công!');
            return redirect()->route('show_list_employee.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }

    public function edit_employee($id)
    {
        $role = Role::all();
        $user = Employee::findOrFail($id);

        return view('employee.page.user.edit', [
            'user' => $user,
            'role' => $role,
        ]);
    }  
    public function update_employee(Request $request, $id) { 
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'phone.required' => 'Vui lòng nhập số điện thoiạ!',
            'address.required' => 'Vui lòng nhập địa chỉ!',
        ]);
    
        // Lưu các thay đổi vào model employee, ngoại trừ trường id
        $user = Employee::findOrFail($id);
        $user->fill($request->except('employee_id')); 
        $user->save();
        
        Session::flash('success','Cập nhật thành công!');
        // Chuyển hướng người dùng đến danh sách nhân viên
        return redirect()->route('show_list_employee.index');
    }
    
    public function destroy($id): RedirectResponse
    {
        $employee = Employee::find($id);
        $employee->delete();
        Session::flash('success','Xoá thành công!');
        return redirect()->route('show_list_employee.index')->with('success', 'Đã được xóa thành công!');
    }
}
