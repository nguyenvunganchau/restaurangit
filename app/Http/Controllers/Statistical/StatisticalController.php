<?php

namespace App\Http\Controllers\Statistical;

use App\Modules\Order\Models\Order;
use App\Modules\Reservation\Models\Reservation;
use App\Modules\Role\Models\Role;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StatisticalController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function show_list_statistical(Request $request)
    {
        $this->v['reservationToday'] = Reservation::whereDate('created_at', today())->count();
        $this->v['reservationCompletedToday'] = Reservation::where('status', "completed")->whereDate('created_at', today())->count();
        $this->v['reservationPendingToday'] = Reservation::where('status', "pending")->whereDate('created_at', today())->count();
        $this->v['reservationApprovedToday'] = Reservation::where('status', "approved")->whereDate('created_at', today())->count();

        $month = $request->month ? $request->month : date('m');
        $year = date('Y');

        // Initialize variables for each day of the month
        for ($i = 1; $i <= 31; $i++) {
            $this->v['totalMoney' . $i] = Order::whereDay('created_at', $i)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->sum('total_amount');
            $this->v['countBooking' . $i] = Reservation::whereDay('created_at', $i)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->count();
        }

        for ($i = 1; $i <= 12; $i++) {
            $this->v['countBookingYear' . (string)$i] = Reservation::whereMonth('created_at', '=', date((string)$i))
                ->whereYear('created_at', '=', date('Y'))
                ->count();
            $this->v['totalMoneyYear' . (string)$i] = Order::whereMonth('created_at', '=', date((string)$i))
                ->whereYear('created_at', '=', date('Y'))
                ->sum('total_amount');
        }

        // Set variables for the charts
        for ($i = 1; $i <= 31; $i++) {
            $this->v['totalMoney' . $i] = Order::whereDay('created_at', $i)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->sum('total_amount');
            $this->v['countBooking' . $i] = Reservation::whereDay('created_at', $i)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->count();
        }

        $this->v['monthToday'] = $month;

        return view('employee.page.statistical.list', $this->v);
    }

    public function month(Request $request)
    {
        $this->v['reservationToday'] = Reservation::whereDate('created_at', today())->count();
        $this->v['reservationCompletedToday'] = Reservation::where('status', "completed")->whereDate('created_at', today())->count();
        $this->v['reservationPendingToday'] = Reservation::where('status', "pending")->whereDate('created_at', today())->count();
        $this->v['reservationApprovedToday'] = Reservation::where('status', "approved")->whereDate('created_at', today())->count();

        $month = $request->month ? $request->month : date('m');
        $year = date('Y');
        $this->v['monthToday'] = $month;

        // Initialize variables for each day of the month
        for ($i = 1; $i <= 31; $i++) {
            $this->v['totalMoney' . $i] = Order::whereDay('created_at', $i)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->sum('total_amount');
            $this->v['countBooking' . $i] = Reservation::whereDay('created_at', $i)
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->count();
        }


        for ($i = 1; $i <= 12; $i++) {
            $this->v['countBookingYear' . (string)$i] = Reservation::whereMonth('created_at', '=', date((string)$i))
                ->whereYear('created_at', '=', date('Y'))
                ->count();
            $this->v['totalMoneyYear' . (string)$i] = Order::whereMonth('created_at', '=', date((string)$i))
                ->whereYear('created_at', '=', date('Y'))
                ->sum('total_amount');
        }

        return view('employee.page.statistical.list', $this->v);
    }
}
