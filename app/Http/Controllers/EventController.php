<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use App\Models\Event;
use App\Models\Company;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $events = [];
       $data = Event::all();
       if($data->count()){
          foreach ($data as $key => $value) {
            $events[] = Calendar::event(
                $value->company_id.':'.$value->name.' ('.$value->description.')',
                true,
                new \DateTime($value->start_date),
                new \DateTime($value->end_date.' +1 day'),
                null,
                [
                      'color' => $value->color,
                      'url' => '/crm/event/'.$value->id.'/edit',
                  ]
            );
          }
       }
      $calendar = Calendar::addEvents($events); 
      return view('backend.event.index', compact('calendar'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('backend.event.create', compact('companies'));
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
            'color' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $form_data = array(
            'user_id'       =>   $request->user_id,
            'company_id'        =>   $request->company_id,
            'name'        =>   $request->name,
            'color'        =>   $request->color,
            'description'        =>   $request->description,
            'start_date'        =>   $request->start_date,
            'end_date'        =>   $request->end_date,
        );

        Event::create($form_data);

        return redirect('/crm/event')->with('success', trans('backend.successadd'));
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
        $data = Event::findOrFail($id);
        return view('backend.event.edit', compact('data'));
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
            'color' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $form_data = array(
            'name'        =>   $request->name,
            'color'        =>   $request->color,
            'description'        =>   $request->description,
            'start_date'        =>   $request->start_date,
            'end_date'        =>   $request->end_date,
        );

        Event::whereId($id)->update($form_data);
        return redirect('/crm/event')->with('success', trans('backend.successupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Event::findOrFail($id);
        $data->delete();

        return redirect('crm/event')->with('success', trans('backend.successdelete'));
    }
}
