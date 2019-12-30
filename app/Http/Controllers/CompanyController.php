<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Service;
use App\Models\Offer;
use File;
use DB;

class CompanyController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
      {
        $data = Company::all();
        return view('backend.company.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('backend.company.create');
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_name='';
        $image = $request->file('image');
        if($image != '')
        {
            $this->validate($request, [
                'user_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'website' => 'required',
                'status' => 'required',
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/company'), $image_name);

        } else{
            $this->validate($request, [
                'user_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'website' => 'required',
                'status' => 'required',
            ]);
        }


        $form_data = array(
            'name'       =>   $request->name,
            'logo'       =>   $image_name,
            'user_id'        =>   $request->user_id,
            'email'        =>   $request->email,
            'phone'        =>   $request->phone,
            'address'        =>   $request->address,
            'website'        =>   $request->website,
            'status'        =>   $request->status,
        );
        
        Company::create($form_data);

        return redirect('/crm/company')->with('success', trans('backend.successadd'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Company::findOrFail($id);
        $tasks = Company::find($id)->tasks;
        $contacts = Company::find($id)->contacts;
        $documents = Company::find($id)->documents;
        $offers = Company::find($id)->offers;

        $currency = DB::table('settings')
            ->join('currencies', 'settings.currency_id', '=', 'currencies.id')
            ->select('currencies.symbol')
            ->first();

        $employees = Employee::all();
        $services = Service::where('status', 1)->get();

        return view('backend.company.show', compact('data','tasks','contacts','documents','employees','services','offers','currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Company::findOrFail($id);
        return view('backend.company.edit', compact('data'));
    }

    public function editajax($id)
    {
        $where = array('id' => $id);
        $task  = Task::where($where)->first();
        return Response::json($task);
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
                'image' => 'required',
                'status' => 'required',
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'website' => 'required',
                'phone' => 'required',
            ]);

        $image_path = "images/company/".$image_name;  // delete previous image
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/company'), $image_name);
    } else{
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'website' => 'required',
            'status' => 'required',
        ]);
    }


    $form_data = array(
       'name'       =>   $request->name,
       'logo'       =>   $image_name,
       'email'        =>   $request->email,
       'phone'        =>   $request->phone,
       'address'        =>   $request->address,
       'website'        =>   $request->website,
       'status'        =>   $request->status,
   );

    Company::whereId($id)->update($form_data);
    return redirect('/crm/company/'.$id)->with('success', trans('backend.successupdate'));
}


public function updatecompanyemployee(Request $request, $id)
    {
        $request->validate([
            'employees' => 'required',
            ]);


        $company = Company::find($id);
        $company->employees()->sync($request->employees);

        return redirect('/crm/company/'.$id)->with('success', trans('backend.successupdate'));
    }

public function updatecompanyservice(Request $request, $id)
    {
        $request->validate([
            'services' => 'required',
            ]);


        $company = Company::find($id);
        $company->services()->sync($request->services);

        return redirect('/crm/company/'.$id)->with('success', trans('backend.successupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Company::findOrFail($id);

        $image_path = "images/company/".$data->logo;
        if($data->logo != '') {
            File::delete($image_path);
        }

        $data->delete();

        return redirect('crm/company')->with('success', trans('backend.successupdate'));
    }
}