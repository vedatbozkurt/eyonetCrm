<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Company;
use DB;

class OfferController extends Controller
{
	public function index()
	{
		$currency = DB::table('settings')
            ->join('currencies', 'settings.currency_id', '=', 'currencies.id')
            ->select('currencies.symbol')
            ->first();      
        $data = Offer::all();
        return view('backend.offer.index', compact('data','currency'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	$companies = Company::all();
    	return view('backend.offer.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
        public function createcompanyoffer($id)
    {
        $company_id=$id;
        $companies = Company::all();
        return view('backend.offer.createcompanyoffer', compact('companies','company_id'));

    }

    public function store(Request $request)
    {

    	$this->validate($request, [
    		'user_id' => 'required',
    		'company_id' => 'required',
    		'name' => 'required',
    		'price' => 'required',
    		'details' => 'required',
    	]);


    	$form_data = array(
    		'user_id'        =>   $request->user_id,
    		'company_id'       =>   $request->company_id,
    		'name'       =>   $request->name,
    		'price'        =>   $request->price,
    		'details'        =>   $request->details,
    	);

    	Offer::create($form_data);

    	return redirect('/crm/offer')->with('success', trans('backend.successadd'));
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
        $data = Offer::findOrFail($id);
        return view('backend.offer.edit', compact('data','companies'));
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
    		'status' => 'required',
    		'price' => 'required',
    		'details' => 'required',
    	]);


    	$form_data = array(
    		'company_id'       =>   $request->company_id,
    		'name'       =>   $request->name,
    		'status'        =>   $request->status,
    		'price'        =>   $request->price,
    		'details'        =>   $request->details,
    	);

    	Offer::whereId($id)->update($form_data);
    	return redirect('/crm/offer')->with('success', trans('backend.successupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$data = Offer::findOrFail($id);
    	$data->delete();
    	return redirect('crm/offer')->with('success', trans('backend.successdelete'));
    }
}
