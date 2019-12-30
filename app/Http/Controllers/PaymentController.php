<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Company;
use App\Models\Service;
use DB;

class PaymentController extends Controller
{
public function index()
	{
		$currency = DB::table('settings')
            ->join('currencies', 'settings.currency_id', '=', 'currencies.id')
            ->select('currencies.symbol')
            ->first();      
        $data = Payment::all();
        return view('backend.payment.index', compact('data','currency'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	$companies = Company::all();
    	$services = Service::where('status', 1)->get();
    	return view('backend.payment.create', compact('companies','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {

    	$this->validate($request, [
    		'user_id' => 'required',
    		'company_id' => 'required',
    		'name' => 'required',
    		'price' => 'required',
    		'details' => 'required',
    		'service_id' => 'required',
    		'payment_method' => 'required',
    		'status' => 'required',
    	]);


    	$form_data = array(
    		'user_id'        =>   $request->user_id,
    		'company_id'       =>   $request->company_id,
    		'name'       =>   $request->name,
    		'price'        =>   $request->price,
    		'details'        =>   $request->details,
    		'service_id'        =>   $request->service_id,
    		'payment_method'        =>   $request->payment_method,
    		'status'        =>   $request->status,
    	);

    	Payment::create($form_data);

    	return redirect('/crm/payment')->with('success', trans('backend.successadd'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$companies = Company::all();
    	$services = Service::where('status', 1)->get();

        $data = Payment::findOrFail($id);
        return view('backend.payment.edit', compact('data','companies','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'company_id' => 'required',
    		'name' => 'required',
    		'price' => 'required',
    		'details' => 'required',
    		'service_id' => 'required',
    		'payment_method' => 'required',
    		'status' => 'required',
    	]);


    	$form_data = array(
    		'company_id'       =>   $request->company_id,
    		'name'       =>   $request->name,
    		'price'        =>   $request->price,
    		'details'        =>   $request->details,
    		'service_id'        =>   $request->service_id,
    		'payment_method'        =>   $request->payment_method,
    		'status'        =>   $request->status,
    	);

    	Payment::whereId($id)->update($form_data);
    	return redirect('/crm/payment')->with('success', trans('backend.successupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$data = Payment::findOrFail($id);
    	$data->delete();
    	return redirect('crm/payment')->with('success', trans('backend.successdelete'));
    }
}

