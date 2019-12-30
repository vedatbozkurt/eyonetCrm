<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Expense;
use App\Models\Task;
use App\Models\Event;
use DB;


class DashboardController extends Controller
{
    public function index()
    {
    	$currency = DB::table('settings')
            ->join('currencies', 'settings.currency_id', '=', 'currencies.id')
            ->select('currencies.symbol')
            ->first();

        $companies=Company::all()->count();
        $contacts=Contact::all()->count();
        $services=Service::all()->count();
        $employees=Employee::all()->count();

        $income=Payment::get()->sum('price');
        $expense=Expense::get()->sum('price');
        $tasks = Task::orderBy('created_at','desc')->limit(5)->get();
        $events = Event::orderBy('created_at','desc')->limit(5)->get();

        $i=1;
        $months = array();

        while($i <= 12) {
		$month=DB::table('companies')->whereMonth('created_at', '=', $i)->get()->count();
		array_push($months, $month);
		    $i++;
		}
       
        return view('backend.dashboard', compact('companies', 'contacts', 'services', 'employees', 'income', 'expense', 'currency', 'months', 'tasks', 'events'));
    }
}
