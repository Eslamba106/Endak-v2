<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ForgotPassword extends Component
{
    public $phone;
    public $otp;
    public $newPassword;
    public $step = 1; // للتحكم في عرض الشاشة المناسبة

    protected $rules = [
        'phone' => 'required|numeric|exists:users,phone',
        'otp' => 'required|numeric|min:4',
        'newPassword' => 'required|min:6',
    ];

    public function sendOtp()
    {
        $this->validate(['phone' => 'required|numeric|exists:users,phone']);

        // توليد رمز تحقق عشوائي
        $this->otp = 1111;
        // $this->otp = rand(1000, 9999);

        // إرسال الرمز عبر SMS باستخدام خدمة الـ SMS (مثل Twilio أو Nexmo)
        // هنا يمكنك استدعاء خدمة الـ SMS المناسبة لإرسال الـ OTP
        // Twilio::message($this->phone, "Your OTP code is: $this->otp");

        // حفظ الرمز في الجلسة (Session)
        Session::put('otp', $this->otp);

        // الانتقال إلى الخطوة التالية
        $this->step = 2;
    }

    public function verifyOtp()
    {
        $this->validate([
            'otp' => 'required|numeric|min:4',
            'newPassword' => 'required|min:6',
        ]);

        // التحقق من الرمز المدخل
        if (Session::get('otp') == $this->otp) {
            // تحديث كلمة المرور للمستخدم
            $user = User::where('phone', $this->phone)->first();
            $user->password = Hash::make($this->newPassword);
            $user->save();

            // مسح رمز OTP من الجلسة
            Session::forget('otp');

            // عرض رسالة نجاح
            session()->flash('message', __('auth.Password_Updated'));
            $this->step = 3;
        } else {
            session()->flash('error', __('auth.Invalid_OTP'));
        }
    }

    public function render()
    {
        return view('livewire.forgot-password');
    }
}
