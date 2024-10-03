<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingApiController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, [
            'order_id' => 'required',
            'user_id' => 'required',
            'creator_id' => 'required',
            'professionalism_in_dealing' => 'required',
            'communication_and_follow_up' => 'required',
            'quality_of_work_delivered' => 'required',
            'experience_in_the_project_field' => 'required',
            'delivery_on_time' => 'required',
            'deal_with_him_again' => 'required',
            'comment' => 'required',
        ]);
        $order = Order::where('id', $request->order_id)
            ->where('status', 'complete')
            ->first();
        if(!empty($order)){
            $data = $request->all();    
            $rates = 0;
            $rates += (int)$data['professionalism_in_dealing'];
            $rates += (int)$data['communication_and_follow_up'];
            $rates += (int)$data['quality_of_work_delivered'];
            $rates += (int)$data['experience_in_the_project_field'];
            $rates += (int)$data['delivery_on_time'];
            $rates += (int)$data['deal_with_him_again'];

            $rate = Rating::create([
                'order_id' => $order->id,
                'creator_id' => $data['creator_id'],
                'user_id' => $data['user_id'],
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
            if($rate){
                return response()->apiSuccess($rate);
            }else{
                return response()->apiFail();
            }
            
        }
        return response()->apiFail("Order Not Found or is not Complete");
    }
}
