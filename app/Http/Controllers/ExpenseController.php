<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use DB;

class ExpenseController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $currency = DB::table('settings')
            ->join('currencies', 'settings.currency_id', '=', 'currencies.id')
            ->select('currencies.symbol')
            ->first();      
        $data = Expense::all();
        return view('backend.expense.index', compact('data','currency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.expense.create');
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
            'details' => 'required',
            'user_id' => 'required',
            'price' => 'required',
        ]);

        $form_data = array(
            'name'       =>   $request->name,
            'price'        =>   $request->price,
            'user_id'        =>   $request->user_id,
            'details'        =>   $request->details,
        );

        Expense::create($form_data);

        return redirect('/crm/expense')->with('success', trans('backend.successadd'));
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
        $data = Expense::findOrFail($id);
        return view('backend.expense.edit', compact('data'));
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
            'details' => 'required',
            'price' => 'required',
        ]);

        $form_data = array(
            'name'       =>   $request->name,
            'price'        =>   $request->price,
            'details'        =>   $request->details,
        );
  
        Expense::whereId($id)->update($form_data);

        return redirect('crm/expense')->with('success', trans('backend.successupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Expense::findOrFail($id);
        $data->delete();

        return redirect('crm/expense')->with('success', trans('backend.successdelete'));
    }
}

