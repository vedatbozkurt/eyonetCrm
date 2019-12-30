<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;
use File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Contact::all();
        return view('backend.contact.index', compact('data'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('backend.contact.create', compact('companies'));
    }

    public function createcompanycontact($id)
    {
        $company_id=$id;
        $companies = Company::all();
        return view('backend.contact.createcompanycontact', compact('companies','company_id'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_name = '';
        $image = $request->file('image');
        if($image != '')
        {
            $this->validate($request, [
                'company_id' => 'required',
                'user_id' => 'required',
                'position' => 'required',
                'phone' => 'required',
                'name' => 'required',
                'image' => 'required',
                'email' => 'required',
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/contact'), $image_name);

        } else{
            $this->validate($request, [
                'company_id' => 'required',
                'user_id' => 'required',
                'position' => 'required',
                'phone' => 'required',
                'name' => 'required',
                'email' => 'required',
            ]);
        }


        $form_data = array(
            'user_id'       =>   $request->user_id,
            'company_id'       =>   $request->company_id,
            'name'       =>   $request->name,
            'image'       =>   $image_name,
            'email'        =>   $request->email,
            'position'        =>   $request->position,
            'phone'        =>   $request->phone,
        );
        
        Contact::create($form_data);

        return redirect('/crm/contact')->with('success', trans('backend.successadd'));
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
        $data = Contact::findOrFail($id);
        return view('backend.contact.edit', compact('data','companies'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $this->validate($request, [
                'company_id' => 'required',
                'position' => 'required',
                'phone' => 'required',
                'name' => 'required',
                'image' => 'required',
                'email' => 'required',
            ]);

        $image_path = "images/contact/".$image_name;  // delete previous image
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/contact'), $image_name);
    } else{
        $this->validate($request, [
            'company_id' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);
    }


    $form_data = array(
        'company_id'       =>   $request->company_id,
        'name'       =>   $request->name,
        'image'       =>   $image_name,
        'email'        =>   $request->email,
        'position'        =>   $request->position,
        'phone'        =>   $request->phone,
    );

    Contact::whereId($id)->update($form_data);
    return redirect('/crm/contact')->with('success', trans('backend.successupdate'));
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Contact::findOrFail($id);

        $image_path = "images/contact/".$data->image;
        if($data->image != '') {
            File::delete($image_path);
        }
        
        $data->delete();

        return redirect('crm/contact')->with('success', trans('backend.successdelete'));
    }
}
