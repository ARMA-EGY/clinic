<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patients;
use App\Models\Appointment;
use App\Models\Transaction;
use App\Models\Inventory;
use App\Models\Services;
use App\Models\Branches;
use App\Models\Sector;
use App\Models\Expenses;
use Illuminate\Support\Facades\Storage;



class ReportsController extends Controller
{

    //-------------- Doctors ---------------\\

    public function doctors()
    {
		$items       = User::where('role', 'Doctor')->orderBy('id','desc')->get();
		
        return view('admin.reports.doctors', [
            'items' => $items,
            'total_rows' => count($items),
        ]);
    }

    //-------------- Patients ---------------\\

    public function patients()
    {
		$items       = Patients::orderBy('id','desc')->get();
		
        return view('admin.reports.patients', [
            'items' => $items,
            'total_rows' => count($items),
        ]);
    }

    //-------------- Appointments ---------------\\

    public function appointments()
    {
		$items       = Appointment::orderBy('id','desc')->get();
		
        return view('admin.reports.appointments', [
            'items' => $items,
            'total_rows' => count($items),
        ]);
    }

    //-------------- Transactions ---------------\\

    public function transactions()
    {
		$items       = Transaction::orderBy('id','desc')->get();
		
        return view('admin.reports.transactions', [
            'items' => $items,
            'total_rows' => count($items),
        ]);
    }

    //-------------- Inventory ---------------\\

    public function inventory()
    {
		$items       = Inventory::orderBy('id','desc')->get();
		
        return view('admin.reports.inventory', [
            'items' => $items,
            'total_rows' => count($items),
        ]);
    }

    //-------------- Services ---------------\\

    public function services()
    {
		$items       = Services::orderBy('id','desc')->get();
		
        return view('admin.reports.services', [
            'items' => $items,
            'total_rows' => count($items),
        ]);
    }


    //-------------- Branches ---------------\\

    public function branches()
    {
        $user = auth()->user();

        $branches           = Branches::where('disable', 0)->orderBy('id','asc')->get();
		$appointments       = Appointment::orderBy('id','desc')->get();
		$expenses           = Expenses::orderBy('id','desc')->get();
		$transactions       = Transaction::orderBy('id','desc')->get();
		
        return view('admin.reports.branches', [
            'branches'        => $branches,
            'appointments'    => $appointments,
            'expenses'        => $expenses,
            'transactions'    => $transactions,
        ]);

    }

    //-------------- Branche Data ---------------\\

    public function branchData(Request $request)
    {
        if($request->id == 0)
        {
            $appointments       = Appointment::orderBy('id','desc')->get();
            $expenses           = Expenses::orderBy('id','desc')->get();
            $transactions       = Transaction::orderBy('id','desc')->get();
        }
        else
        {
            $appointments       = Appointment::where('branch_id', $request->id)->orderBy('id','desc')->get();
            $expenses           = Expenses::where('branch_id', $request->id)->orderBy('id','desc')->get();
            $transactions       = Transaction::where('branch_id', $request->id)->orderBy('id','desc')->get();
        }
		
        return view('admin.reports.branches_data', [
            'appointments'     => $appointments,
            'expenses'         => $expenses,
            'transactions'     => $transactions,
        ]);
    }


    //-------------- Doctors Profit ---------------\\

    public function doctorsProfit()
    {
        $user = auth()->user();

		$doctors       = User::where('role', 'Doctor')->orderBy('id','desc')->get();
		
        return view('admin.reports.doctor_profit', [
            'doctors' => $doctors,
        ]);

    }

    //-------------- Doctor Profit Data ---------------\\

    public function doctorProfitData(Request $request)
    {
   
        $appointments       = Appointment::where('doctor_id', $request->id)->orderBy('id','desc')->get();
        $arr_appointments   = Appointment::where('doctor_id', $request->id)->pluck('id')->toArray();
        $transactions       = Transaction::whereIn('appointment_id', $arr_appointments)->orderBy('id','desc')->get();
		$doctor             = User::where('id', $request->id)->where('role', 'Doctor')->orderBy('id','desc')->first();
		
        return view('admin.reports.doctor_profit_data', [
            'appointments'   => $appointments,
            'transactions'   => $transactions,
            'doctor'         => $doctor,
        ]);
    }


    //-------------- Staff Actions ---------------\\

    public function staffActions()
    {
        $user = auth()->user();

		$users       = User::where('role', 'Staff')->orderBy('id','desc')->get();
		
        return view('admin.reports.staff_actions', [
            'users' => $users,
        ]);

    }

    //-------------- Staff Actions Data ---------------\\

    public function staffActionsData(Request $request)
    {
   
        $appointments       = Appointment::where('user_id', $request->id)->orderBy('id','desc')->get();
        $arr_appointments   = Appointment::where('user_id', $request->id)->pluck('id')->toArray();
        $transactions       = Transaction::whereIn('appointment_id', $arr_appointments)->orderBy('id','desc')->get();
        $expenses           = Expenses::where('user_id', $request->id)->orderBy('id','desc')->get();
		
        return view('admin.reports.staff_actions_data', [
            'appointments'   => $appointments,
            'transactions'   => $transactions,
            'expenses'       => $expenses,
        ]);
    }

   
}
