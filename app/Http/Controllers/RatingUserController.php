<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingUserController extends Controller
{
    public function add_rate($id){
        $order = Order::findOrFail($id);

        return view('front_office.rate.add_rate' , compact('order' , 'id')) ;
    }

    public function store(Request $request){

        $request->validate([
            'order_id' => 'required',
            'professionalism_in_dealing' => "required",
            'communication_and_follow_up' => "required",
            'quality_of_work_delivered' => 'required',
            'experience_in_the_project_field' => 'required',
            'delivery_on_time' => 'required',
            'deal_with_him_again' => 'required',
        ]);


        $order = Order::where('id' , $request->order_id)->first();
        $data = $request->all();
        $data['creator_id'] = auth()->user()->id;
        $data['user_id'] = $order->service_provider_id;
        // dd($order->service_provider_id);
        $data = $request->all();
        $rates = 0;
        $rates += (int)$data['professionalism_in_dealing'];
        $rates += (int)$data['communication_and_follow_up'];
        $rates += (int)$data['quality_of_work_delivered'];
        $rates += (int)$data['experience_in_the_project_field'];
        $rates += (int)$data['delivery_on_time'];
        $rates += (int)$data['deal_with_him_again'];

        $rate = Rating::create([
            'order_id' => $request->order_id,
            'creator_id' => auth()->user()->id,
            'user_id' =>2,
            'professionalism_in_dealing' => (int)$data['professionalism_in_dealing'],
            'communication_and_follow_up' => (int)$data['communication_and_follow_up'],
            'quality_of_work_delivered' => (int)$data['quality_of_work_delivered'],
            'experience_in_the_project_field' => (int)$data['experience_in_the_project_field'],
            'deal_with_him_again' => (int)$data['deal_with_him_again'],
            'delivery_on_time' => (int)$data['delivery_on_time'],
            'rate' => $rates > 0 ? number_format($rates, 2) / 6 : 0,
            'comment' => $data['comment'],
            'created_at' => time(),
        ]);
        // $rate = Rating::create($data);
        return redirect()->url('/')->with('success' , "Add Rating successfully");
    }
}
