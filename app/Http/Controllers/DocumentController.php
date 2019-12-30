<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Company;
use File;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Document::all();
        return view('backend.document.index', compact('data'));
    }

    
    public function create()
    {
        $companies = Company::all();
        return view('backend.document.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function createcompanydocument($id)
    {
        $company_id=$id;
        $companies = Company::all();
        return view('backend.document.createcompanydocument', compact('companies','company_id'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'company_id' => 'required',
            'name' => 'required',
        ]);

        $file = $request->file('file');
        $file_name = rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('documents/'.$request->company_id), $file_name);

        $form_data = array(
            'user_id'       =>   $request->user_id,
            'company_id'        =>   $request->company_id,
            'name'        =>   $request->name,
            'filename'        =>   $file_name,
        );

        Document::create($form_data);

        return redirect('/crm/document')->with('success', trans('backend.successadd'));
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
        $data = Document::findOrFail($id);
        return view('backend.document.edit', compact('data','companies'));
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
        ]);


        $form_data = array(
            'company_id'       =>   $request->company_id,
            'name'       =>   $request->name,
        );

        Document::whereId($id)->update($form_data);
        return redirect('/crm/document')->with('success', trans('backend.successupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Document::findOrFail($id);

        $file_path = "documents/".$data->company_id.'/'.$data->filename;
        if($data->filename != '') {
            File::delete($file_path);
        }

        $data->delete();

        return redirect('crm/document')->with('success', trans('backend.successdelete'));
    }
}
