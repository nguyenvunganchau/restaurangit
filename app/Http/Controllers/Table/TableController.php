<?php

namespace App\Http\Controllers\Table;

use App\Modules\Reservation\Models\Reservation;
use App\Modules\Table\Models\Table;
use App\Modules\Table\Models\TableType;
use App\Modules\Table\Requests\CreateTableRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TableController extends BaseController
{

    public function show_create_table_type(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.table.create');
    }

    public function show_list_table_type(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $table_type = TableType::orderby('table_type_id', 'desc')->paginate(15);
        $tableCount = TableType::count();
        return view(
            'employee.page.table.list',
            [
                'table_type' => $table_type,
                'tableCount' => $tableCount,
            ]
        );
    }

    public function create_table_type(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'images' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên loại bàn!',
            'amount.required' => 'Vui lòng nhập giá!',
            'images.required' => 'Vui lòng chọn ảnh!'
        ]);

        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            // Upload the file and get the path
            $imagePath = $this->uploadFile($request->file('images'));
        }

        try {
            // Begin transaction
            DB::beginTransaction();

            // Create new TableType instance and assign values
            $table_type = new TableType();
            $table_type->name = $request->input('name');
            $table_type->image_table_type = $imagePath;
            $table_type->price = $request->input('price');
            $table_type->description = $request->input('description');
            $table_type->amount = $request->input('amount');
            $table_type->save();

            // Commit transaction
            DB::commit();
            Session::flash('success', 'Thêm thành công!');
            return redirect()->route('show_list_table_type.index');
        } catch (Exception $e) {
            // Rollback transaction in case of error
            DB::rollback();
            dd($e->getMessage());
        }
    }

    public function count_table_type(Request $request): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $reservationDate = $request->input('reservation_date');
        $tableItems = Table::all();
        $availableTableCounts = [];
        foreach ($tableItems as $tableType) {
            $count = Reservation::where('reservation_date', $reservationDate)
                ->where('table_id', $tableType->table_id)
                ->whereIn('status', ['approved', 'completed', 'processing'])
                ->count();
            $availableTableCounts[$tableType->name] = $tableType->amount - $count;
        }
        return view('employee.page.table.count', [
            'availableTableCounts' => $availableTableCounts,
            'tableItems' => $tableItems,
            'reservationDate' => $reservationDate
        ]);
    }
    public function destroy($id): RedirectResponse
    {
        $table = TableType::find($id);
        $table->delete();
        return redirect()->route('show_list_table_type.index')->with('success', 'Đã được xóa thành công!');
    }
    public function edit_table_type($id)
    {
        $table_type = TableType::findOrFail($id);

        return view('employee.page.table.edit', [
            'table_type' => $table_type,
        ]);
    }
    public function update_table_type(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên loại bàn!',
            'amount.required' => 'Vui lòng giá!',
        ]);

        $table_type = TableType::findOrFail($id);

        try {
            DB::beginTransaction();

            if ($request->hasFile('images') && $request->file('images')->isValid()) {
                $imagePath = $this->uploadFile($request->file('images'));
            } else {
                $imagePath = $table_type->image_table_type; // Giữ lại đường dẫn ảnh hiện tại
            }

            $table_type->name = $request->input('name');
            $table_type->description = $request->input('description');
            $table_type->price = $request->input('price');
            $table_type->image_table_type = $imagePath;
            $table_type->amount = $request->input('amount');
            $table_type->save();

            DB::commit();
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('show_list_table_type.index');
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('table_type', $fileName, 'public');
    }
}
