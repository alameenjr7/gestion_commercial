<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settings()
    {
        $setting=Setting::first();
        return view('backend.settings.settings',compact('setting'));
    }

    public function settingsUpdate(Request $request)
    {
        $setting=Setting::first();
        $status=$setting->update([
            'title'=>$request->title,
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request->meta_keywords,
            'favicon'=>$request->favicon,
            'logo'=>$request->logo,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'footer'=>$request->footer,
            'fax'=>$request->fax,
            'facebook_url'=>$request->facebook_url,
            'twitter_url'=>$request->twitter_url,
            'linkedin_url'=>$request->linkedin_url,
            'instagram_url'=>$request->instagram_url,
            'snapchat_url'=>$request->snapchat_url,
            'pinterest_url'=>$request->pinterest_url,
            'playStore_url'=>$request->playStore_url,
            'appStore_url'=>$request->appStore_url,
            'youtube_url'=>$request->youtube_url,
            'map_url' =>$request->map_url,
        ]);
        $status=$setting->fill($request->all());
        
        if($status){
            return back()->with('success','Setting successfully updated');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }

	public function smtp()
	{
		return view('backend.settings.smtp');
	}

	public function smtpUpdate(Request $request)
	{
		foreach ($request->types as $key=>$type) {
			# code...
			$this->overWriteEnvFile($type,$request[$type]);
		}

		return back()->with('success','SMTP configuration updated successfully');
	}

	public function overWriteEnvFile($type,$val)
	{
		$path=base_path('.env');
		if(file_exists($path)){
			$val='"'.trim($val).'"';
			if(is_numeric(strpos(file_get_contents($path),$type)) && strpos(file_get_contents($path),$type)>=0){
				file_put_contents($path,str_replace(
					$type.'="'.env($type).'"',$type.'='.$val,file_get_contents($path)
				));
			}
			else{
				file_put_contents($path,file_get_contents($path)."\r\n".$type.'='.$val);
			}
		}
	}

    public function payment()
    {
        return view('backend.settings.payment');
    }

    //paypal
    public function paypalUpdate(Request $request)
    {
        foreach($request->types as $key=>$type){
            $this->overWriteEnvFile($type,$request[$type]);
        }

        $settings=Setting::first();
        if($request->has('paypal_sandbox')){
            $settings->paypal_sandbox=1;
            $settings->save();
        }
        else{
            $settings->paypal_sandbox=0;
            $settings->save();
        }

        return back()->with('success','Payment setting updated successfully');
    }
}
