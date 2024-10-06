<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class RatingUserController extends Controller
{
    public function add_rate($id){
        $order = Order::findOrFail($id);

        return view('front_office.rate.add_rate' , compact('order' , 'id')) ;
    }
}
