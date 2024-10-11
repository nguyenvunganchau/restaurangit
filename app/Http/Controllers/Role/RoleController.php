<?php

namespace App\Http\Controllers\Role;

use App\Modules\Role\Models\Role;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoleController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function show_create_role(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.role.create');
    }

    public function show_list_role(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $role = Role::orderby('role_id', 'desc')->paginate(15);
        $roleCount = Role::count();
        return view('employee.page.role.list',['role'=>$role,'roleCount'=>$roleCount]);
    }

    public function create_role(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên quyền!',
        ]);
        try {
            DB::beginTransaction();
            $role = new Role();
            $role->name = $request['name'];
            $role->description = $request['description'];
            $role->save();
            DB::commit();
            Session::flash('success','Thêm thành công!');
            return redirect()->route('show_list_role.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
    public function destroy($id): RedirectResponse
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('show_list_role.index')->with('success', 'Đã được xóa thành công!');
    }
    public function edit_role($id)
    {
        $role = Role::findOrFail($id);

        return view('employee.page.role.edit', [
            'role' => $role,
        ]);
    }  
    public function update_role(Request $request, $id) { 
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên quyền!',
        ]);
    
        $role = Role::findOrFail($id);
        $role->fill($request->except('role_id')); 
        $role->save();
        
        Session::flash('success','Cập nhật thành công!');
        return redirect()->route('show_list_role.index');
    }
}
