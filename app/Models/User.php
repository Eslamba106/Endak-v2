<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_name',
        'role_id',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function scopeFilter(Builder $builder , $filters){

        // $builder->when($filters['name'] ?? false , function($builder , $value){
        //     $builder->where('categories.name','like','%'.$value.'%');
        // });

        $builder->when($filters['status'] ?? false , function($builder , $value){
            $builder->where('users.status', $value);
        });
        // if($filters['name'] ?? false){
        //     $builder->where('name','like','%'.$filters['name'].'%');
        // };
        // if($filters['status'] ?? false){
        //     $builder->where('status','=',$filters['status']);
        // };
    }
    public function hasPermission($section_name)
    {
        if (!isset($this->permissions)) {
            $sections_id = Permission::where('role_id', '=', $this->role_id)->where('allow', true)->pluck('section_id')->toArray();
            $this->permissions = Section::whereIn('id', $sections_id)->pluck('name')->toArray();
        }

        return in_array($section_name, $this->permissions);
    }
    public function scopeActive(Builder $builder){
        $builder->where('status' , 'active');
    }

    public function rate(){
        return $this->hasMany(Rating::class , 'user_id' , 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'service_provider_id', 'id');
            // ->orWhere('teacher_id', $this->id);
    }
    public function myorders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
            // ->orWhere('teacher_id', $this->id);
    }
    public function rates()
    {
        $orders = $this->orders()
            ->where('status', 'complete')
            ->where('admin_status', 'active')
            ->get();

        $rate = 0;


        if (!empty($orders)) {
            $rates = 0;
            $count = 0;

            foreach ($orders as $order) {
                $orderRate = Rating::where('order_id' , $order->id)->first();
                // \Log::info($orderRate->rate);
                if(isset($orderRate->rate)){
                    if (!empty($orderRate->rate) and $orderRate->rate > 0) {
                        $count += 1;
                        $rates += $orderRate->rate;
                    }
                }
                
            }

            if ($rates > 0) {
                if ($count < 1) {
                    $count = 1;
                }

                $rate = number_format($rates / $count, 2);
            }
        }

        return $rate;
    }


    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
    // public function profile(){
    //     return $this->hasOne(Profile::class , 'user_id' , 'id')
    //     ->withDefault();
    // }
}
