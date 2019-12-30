<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;
use DB;
use File;
use App\Models\Currency;

class SettingController extends Controller
{
	public function edit()
	{
        $currencies = Currency::all();
        $data = DB::table('settings')->where('user_id', auth()->id())->first();
        return view('backend.setting.index', compact('data','currencies'));
    }

    public function update(Request $request)
    {
      $image_name = $request->hidden_image;
      $image = $request->file('image');
      if($image != '')
      {
        $request->validate([
            'user_id'    =>  'required',
            'company_name'     =>  'required',
            'domain'     =>  'required',
            'address'     =>  'required',
            'phone'     =>  'required',
            'currency_id'     =>  'required',
            'image'         =>  'image|max:2048'
        ]);

            $image_path = "images/logo/".$image_name;  // delete previous image
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/logo'), $image_name);
        }
        else
        {
            $request->validate([
                'user_id'    =>  'required',
                'company_name'     =>  'required',
                'domain'     =>  'required',
                'address'     =>  'required',
                'phone'     =>  'required',
                'currency_id'     =>  'required'
            ]);
        }

        $form_data = array(
            'user_id'       =>   $request->user_id,
            'company_name'        =>   $request->company_name,
            'domain'        =>   $request->domain,
            'address'        =>   $request->address,
            'phone'        =>   $request->phone,
            'currency_id'        =>   $request->currency_id,
            'logo'            =>   $image_name
        );

        Setting::where('user_id', auth()->id())->update($form_data);

        return redirect('/crm/setting')->with('success', trans('backend.successupdate'));
    }
}
