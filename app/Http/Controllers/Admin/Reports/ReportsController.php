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

    //-------------- Doctors Profit ---------------\\

    public function doctorsProfit($id)
    {
		$items       = User::where('role', 'Doctor')->orderBy('id','desc')->get();
		
        return view('admin.reports.doctorsProfit', [
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


   
}
