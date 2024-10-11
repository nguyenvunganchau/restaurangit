<?php

namespace App\Http\Controllers\Reservation;

use App\Modules\Reservation\Models\Reservation;
use App\Modules\Table\Models\Table;
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

class ReservationController extends BaseController
{
    public function show_create_reservation(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.reservation.create');
    }

    public function show_list_reservation(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $reservationCount = Reservation::count();
        $table_type = TableType::all();
        $table = Table::all();
        $reservation = Reservation::orderby('reservation_id', 'desc')->paginate(15);
        return view('employee.page.reservation.list', [
            'reservation' => $reservation,
            'reservationCount' => $reservationCount,
            'table_type' => $table_type,
            'table' => $table,
        ]);
    }

    public function filterReservations(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $query = Reservation::query();
        $tableTypeId = $request->input('table_type_id');
        $tableId = $request->input('table_id');
        $reservationDate = $request->input('reservation_date');
        if (!empty($tableTypeId)) {
            $query->where('table_type_id', $tableTypeId);
        }
        if (!empty($tableId)) {
            $query->where('table_id', $tableId);
        }
        if (!empty($reservationDate)) {
            $query->where('reservation_date', $reservationDate);
        }
        $reservations = $query->orderby('reservation_id', 'desc')->paginate(15);
        $table_type = TableType::all();
        $table = Table::all();
        return view('employee.page.reservation.filter', [
            'reservations' => $reservations,
            'table_type' => $table_type,
            'table' => $table,
        ]);
    }

    public function destroy($id): RedirectResponse
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->route('show_list_reservation.index')->with('success', 'Đã được xóa thành công!');
    }

    public function show_update_reservation($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $reservation = Reservation::find($id);
        $table = Table::all();
        $table_type = TableType::all();
        $status = Reservation::all();
        return view('employee.page.reservation.edit', [
            'reservation' => $reservation,
            'table' => $table,
            'table_type' => $table_type,
            'status' => $status
        ]);
    }

    public function update_reservation(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'reservation_date' => 'required',
            'time' => 'required',
            'number_of_guests' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên khách hàng!',
            'phone.required' => 'Vui lòng nhập số điện thoại!',
            'email.required' => 'Vui lòng nhập email!',
            'reservation_date.required' => 'Vui lòng nhập ngày đặt!',
            'time.required' => 'Vui lòng nhập giờ đặt!',
            'number_of_guests.required' => 'Vui lòng nhập số người!',
        ]);
        try {
            DB::beginTransaction();
            $reservation = Reservation::find($id);
            $reservation->customer->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
            ]);

            $reservation->update([
                'reservation_date' => $request->input('reservation_date'),
                'time' => $request->input('time'),
                'time_out' => $request->input('time') + 2,
                'number_of_guests' => $request->input('number_of_guests'),
                'status' => $request->input('status'),
                'table_id' => $request->input('table_id'),
                'table_type_id' => $request->input('table_type_id'),
                'note' => $request->input('note'),
            ]);
            DB::commit();
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('show_list_reservation.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}
