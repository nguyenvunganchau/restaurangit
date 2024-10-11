<?php

namespace App\Http\Controllers\Facility;

use Illuminate\Http\Request;
use App\Modules\Facility\Models\Facility;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FacilityController extends BaseController
{
    public function show_create_facility(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.facility.create');
    }

    public function show_list_facility(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $facility = Facility::orderby('facility_id', 'desc')->paginate(15);
        $facilityCount = Facility::count();
        return view(
            'employee.page.facility.list',
            [
                'facility' => $facility,
                'facilityCount' => $facilityCount,
            ]
        );
    }
    public function create_facility(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên cơ sở vật chất!',
            'amount.required' => 'Vui lòng nhập số lượng!',
        ]);
        try {
            DB::beginTransaction();
            $facility = new Facility();
            $facility->name = $request['name'];
            $facility->amount = $request['amount'];
            $facility->save();
            DB::commit();
            Session::flash('success', 'Thêm thành công!');
            return redirect()->route('show_list_facility.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
    public function edit_facility($id)
    {
        $facility = Facility::findOrFail($id);

        return view('employee.page.facility.edit', [
            'facility' => $facility,
        ]);
    }
    public function update_facility(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên cơ sở vật chất!',
            'amount.required' => 'Vui lòng nhập số lượng!',
        ]);

        $facility = Facility::findOrFail($id);
        $facility->fill($request->except('facility_id'));
        $facility->save();

        Session::flash('success', 'Cập nhật thành công!');
        return redirect()->route('show_list_facility.index');
    }
    public function destroy($id): RedirectResponse
    {
        $facility = Facility::find($id);
        $facility->delete();
        return redirect()->route('show_list_facility.index')->with('success', 'Đã được xóa thành công!');
    }
}
