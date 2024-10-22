<?php

namespace App\Http\Controllers\Admin;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index(){
        $settings = Settings::first();

        return view('admin.settings.index' , compact('settings'));
    }

    public function edit(Settings $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $setting = Settings::first();
        $old_image = $setting->logo;
        $data = $request->except('logo');
        $new_image = $this->uploadImage($request);

        if ($new_image) {
            $data['image'] = $new_image;
        }
        $setting->update([
            "web_name" => $request->web_name,
            "logo" => $new_image ?? $old_image,
            "email" => $request->email,
            "phone" => $request->phone,
            "facebook" => $request->facebook,
            "twitter" => $request->twitter,
            "instagram" => $request->instagram,
            "linkedin" => $request->linkedin,
            "address_ar" => $request->address_ar,
            "address_en" => $request->address_en,
            "web_name_ar" => $request->web_name_ar,
            "web_name_en" => $request->web_name_en, 
            "about_us" => $request->about_us, 
        ]);
        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('admin.settings')->with('success','تم التعديل');
    }

    public function uploadImage(Request $request)
    {
        if (!$request->hasFile('logo')) {
            return;
        } else {
            $file = $request->file('logo');
            $path = $file->store('settings', [
                'disk' => 'public',
            ]);
            return $path;
        }
    }
}
