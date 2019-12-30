<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use File;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::orderBy('created_at','desc')->paginate(10);
        return view('backend.employee.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('backend.employee.create');
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
                'user_id' => 'required',
                'position' => 'required',
                'status' => 'required',
                'name' => 'required',
                'image' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/profile'), $image_name);

        } else{
            $this->validate($request, [
                'user_id' => 'required',
                'position' => 'required',
                'status' => 'required',
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);
        }


        $form_data = array(
            'name'       =>   $request->name,
            'image'       =>   $image_name,
            'email'        =>   $request->email,
            'password'        =>   Hash::make($request->password),
            'position'        =>   $request->position,
            'status'        =>   $request->status,
            'user_id'        =>   $request->user_id,
        );
        
        Employee::create($form_data);

        return redirect('/crm/employee')->with('success', trans('backend.successadd'));
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
        $data = Employee::findOrFail($id);
        return view('backend.employee.edit', compact('data'));
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
                'user_id' => 'required',
                'position' => 'required',
                'status' => 'required',
                'name' => 'required',
                'image' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

        $image_path = "images/profile/".$image_name;  // delete previous image
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/profile'), $image_name);
        } else{
        $this->validate($request, [
            'user_id' => 'required',
            'position' => 'required',
            'status' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    }


    $form_data = array(
        'name'       =>   $request->name,
        'image'       =>   $image_name,
        'email'        =>   $request->email,
        'password'        =>   Hash::make($request->password),
        'position'        =>   $request->position,
        'status'        =>   $request->status,
        'user_id'        =>   $request->user_id,
    );

    Employee::whereId($id)->update($form_data);
    return redirect('/crm/employee')->with('success', trans('backend.successupdate'));
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employee::findOrFail($id);

        $image_path = "images/profile/".$data->image;
        if($data->image != '') {
            File::delete($image_path);
        }
        $data->delete();

        return redirect('crm/employee')->with('success', trans('backend.successdelete'));
    }
}
