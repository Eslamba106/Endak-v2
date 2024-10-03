<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\OrderServices;
use App\Http\Controllers\Controller;

class OrderApiController extends Controller
{

    public $order_service;

    public function __construct(OrderServices $order_service)
    {
        $this->order_service = $order_service;
    }
    public function store(Request $request){

        $request->validate([
            'department_id'         => 'required',
            'customer_id'           => 'required',
            'service_provider_id'   => 'required',
        ]);
        // $user =  auth('sanctum')->user()->id;
        $data = $request->all();
        $is_create = $this->order_service->store($data);
        if($is_create != null){

            return response()->apiSuccess($is_create);
        }
        return response()->apiFail();

    }

    public function myOrders($id){
        
        $my_orders = $this->order_service->getAllWith('customer_id' , $id);
        $my_orders_service = $this->order_service->getAllWith('service_provider_id' , $id);
        // dd($my_orders_service->count());
        if($my_orders->count()){
            $data['items'] = $my_orders->all();
            return response()->apiSuccess($data);
        }elseif($my_orders_service->count()){
            $data['items'] = $my_orders_service->all();
            return response()->apiSuccess($data);
        }else{
            return response()->apiFail();
        }
    }
}
