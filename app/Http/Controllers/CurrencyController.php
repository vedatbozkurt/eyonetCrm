<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Currency::all();
        return view('backend.currency.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.currency.create');
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
            'name' => 'required',
            'symbol' => 'required',
            'user_id' => 'required',
        ]);

        $form_data = array(
            'name'       =>   $request->name,
            'symbol'        =>   $request->symbol,
            'user_id'        =>   $request->user_id,
        );

        Currency::create($form_data);

        return redirect('/crm/currency')->with('success', trans('backend.successadd'));
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
        $data = Currency::findOrFail($id);
        return view('backend.currency.edit', compact('data'));
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
            'name' => 'required',
            'symbol' => 'required',
            'user_id' => 'required',
        ]);

        $form_data = array(
            'name'       =>   $request->name,
            'symbol'        =>   $request->symbol,
            'user_id'        =>   $request->user_id,
        );
  
        Currency::whereId($id)->update($form_data);

        return redirect('crm/currency')->with('success', trans('backend.successupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Currency::findOrFail($id);
        $data->delete();

        return redirect('crm/currency')->with('success', trans('backend.successdelete'));
    }
}
