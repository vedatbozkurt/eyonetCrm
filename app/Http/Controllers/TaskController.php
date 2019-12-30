<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Company;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Task::all();
        return view('backend.task.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $companies = Company::all();
        return view('backend.task.create', compact('companies'));

    }

    public function createcompanytask($id)
    {
        $company_id=$id;
        $companies = Company::all();
        return view('backend.task.createcompanytask', compact('companies','company_id'));

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
            'details' => 'required',
        ]);

        $form_data = array(
            'user_id'       =>   $request->user_id,
            'company_id'        =>   $request->company_id,
            'details'        =>   $request->details,
        );

        Task::create($form_data);

        return redirect('/crm/task')->with('success', trans('backend.successadd'));
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
        $data = Task::findOrFail($id);
        return view('backend.task.edit', compact('data','companies'));
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
            'details' => 'required',
        ]);

        $form_data = array(
            'company_id'       =>   $request->company_id,
            'details'       =>   $request->details,
        );

        Task::whereId($id)->update($form_data);
        return redirect('/crm/task')->with('success', trans('backend.successupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Task::findOrFail($id);
        $data->delete();

        return redirect('crm/task')->with('success', trans('backend.successdelete'));
    }

}
