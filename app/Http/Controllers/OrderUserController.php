<?php

namespace App\Http\Controllers;

use App\Services\OrderServices;
use DB;
use Illuminate\Http\Request;

class OrderUserController extends Controller
{
    public $order;

    public function __construct(OrderServices $order){
        $this->order = $order;
    }
    public function store(Request $request){

        $request->validate([
            'service_provider_id'  => "required",
            // 'post_data'            => "required",
        ]);
        // dd(gettype($request->post_data));
        $data = $request->all();


        $is_create = $this->order->store($data);
        if($is_create){
            $update_post_status =DB::table('posts')->where('id' , $request->post_id)->update([
                'status' => "pending",
            ]);
        }
        return redirect()->back()->with('success','Order Creates');
    }
}
