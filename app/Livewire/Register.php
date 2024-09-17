<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;

    public $password;
    public $image;

    protected $rules = [
        "first_name"        => "required|min:3",
        "last_name"         => "required|min:3",
        'email'             => "email", 
        'password'          => "required|min:6", 
        'phone'             => "required",                    
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function register()
    {
        $this->validate();

        if($this->image){
            
            $new_image = uploadImage($this , "users" , "image");
        }

        User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role_name' => "user",
            'role_id' => 1,
            'image' => $new_image ?? null,
            'password' => Hash::make($this->password),

        ]);
        return redirect()->route('home');

    }

    public function render()
    {
        return view('livewire.register');
    }
}
