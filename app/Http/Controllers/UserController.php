<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use File;
use Illuminate\Support\Facades\Hash;
use App\Events\SettingCreatedEvent;

class UserController extends Controller
{
    public function editown()
    {
        $userId = Auth::id();
        $data = User::findOrFail($userId);;
        return view('backend.profile.index', compact('data'));
    }

    public function updateown(Request $request)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'name'    =>  'required',
                'email'     =>  'required',
                'password'     =>  'required',
                'image'         =>  'image|max:2048'
            ]);

            $image_path = "images/profile/".$image_name;  // delete previous image
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/profile'), $image_name);
        }
        else
        {
            $request->validate([
                'name'    =>  'required',
                'email'     =>  'required',
                'password'     =>  'required',
            ]);
        }

        $form_data = array(
            'name'       =>   $request->name,
            'email'        =>   $request->email,
            'password'        =>   Hash::make($request->password),
            'image'            =>   $image_name
        );

        $userId = Auth::id();
        User::whereId( $userId)->update($form_data);

        return redirect('crm/profile')->with('success', trans('backend.successupdate'));
    }

    public function index()
    {
        $users = User::orderBy('created_at','desc')->paginate(10);
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('backend.user.create');
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'name'    =>  'required',
                'email'     =>  'required',
                'status'     =>  'required',
                'role'     =>  'required',
                'password'     =>  'required',
                'image'         =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/profile'), $image_name);
        }
        else
        {
            $request->validate([
                'name'    =>  'required',
                'email'     =>  'required',
                'status'     =>  'required',
                'role'     =>  'required',
                'password'     =>  'required',
            ]);
            $image_name='';
        }

        $form_data = array(
            'name'       =>   $request->name,
            'email'        =>   $request->email,
            'status'        =>   $request->status,
            'role'        =>   $request->role,
            'password'        =>   Hash::make($request->password),
            'image'            =>   $image_name
        );
        
        $user=User::create($form_data);
        event(new SettingCreatedEvent($user));

        return redirect('/crm/user')->with('success', trans('backend.successadd'));
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
        $data = User::findOrFail($id);
        return view('backend.user.edit', compact('data'));
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
                'name'    =>  'required',
                'email'     =>  'required',
                'status'     =>  'required',
                'role'     =>  'required',
                'password'     =>  'required',
                'image' => 'required',
            ]);

        $image_path = "images/profile/".$image_name;  // delete previous image
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/profile'), $image_name);
    } else{
        $this->validate($request, [
            'name'    =>  'required',
            'email'     =>  'required',
            'status'     =>  'required',
            'role'     =>  'required',
            'password'     =>  'required',
        ]);
    }

    $form_data = array(
        'name'       =>   $request->name,
        'image'       =>   $image_name,
        'email'        =>   $request->email,
        'password'        =>   Hash::make($request->password),
        'status'        =>   $request->status,
        'role'        =>   $request->role,
    );

    User::whereId($id)->update($form_data);
    return redirect('/crm/user')->with('success', trans('backend.successupdate'));
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);

        $image_path = "images/profile/".$data->image;
        if($data->image != '') {
            File::delete($image_path);
        }
        $data->delete();

        return redirect('crm/user')->with('success', trans('backend.successdelete'));
    }
    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}
