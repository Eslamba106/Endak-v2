<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Post;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Support\Str;
use App\Models\ProductItems;
use Illuminate\Http\Request;
use App\Services\OrderServices;

class OrderUserController extends Controller
{
    public $order;

    public function __construct(OrderServices $order)
    {
        $this->order = $order;
    }
    public function store(Request $request)
    {

        $request->validate([
            'service_provider_id' => "required",
            // 'post_data'            => "required",
        ]);
        // dd(gettype($request->post_data));
        $data = $request->all();
        $data['slug'] = Str::slug($request->title, '-');
        $id = $request->customer_id;
        $is_create = $this->order->store($data);
        if ($is_create) {
            $update_post_status = DB::table('posts')->where('id', $request->post_id)->update([
                'status' => "pending",
            ]);
            // $post = Post::find($request->post_id);
            $products = ProductItems::where('post_id' , $request->post_id)->get();
            foreach ($products as $product) {
    
                    OrderItems::create([
                        'product_id' => $product->product_id,
                        'quantity' => $product->quantity,
                        'order_id' => $request->post_id,
                        'price' => 0, 
                    ]);
            }
        }
        return redirect()->route('web.order.my_orders', $id)->with('success', 'Order Creates');
    }
    public function my_orders($id)
    {
        $user = auth()->user();
        if ($user->role_id == 1) {

            $orders = Order::where('customer_id', $id)->get();
            return view('front_office.orders.my_orders', compact('orders'));

        } elseif ($user->role_id == 3) {
            $orders = Order::where('service_provider_id', $id)->get();
            return view('front_office.orders.my_orders', compact('orders'));
        }

        return redirect()->back()->with('error', 'You do not have an order');
    }

    public function show_order($id)
    {
        $order = Order::findOrFail($id);

        return view('front_office.orders.show_order', compact('order'));
    }

    public function finish(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->update([
            'status' => "complete",
        ]);
        return redirect()->back()->with('success', 'Project Completed');
    }
    // public function product_order(Request $request){

    public function product_order(Request $request)
    {
        if (!$request->has('selected_products') || empty($request->input('selected_products'))) {
            return back()->withErrors('Please select at least one product and enter a quantity.');
        }

        $data = [
            'slug' => Str::slug($request->title, '-'),
            'customer_id' => auth()->user()->id,
            'service_provider_id' => 1,
            'title' => $request->title,
            'description' => $request->description ?? null,
            'price' => $request->price,
            'department_id' => $request->department_id,
        ];

        $order = $this->order->store($data);

        foreach ($request->input('selected_products') as $productId) {
            $quantity = $request->input("quantities.$productId");

            if ($quantity > 0) {
                OrderItems::create([
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'order_id' => $order->id,
                    'price' => 0, 
                ]);
            }
        }

        return redirect()->back()->with('success', 'Order saved successfully with selected products.');
    }

}
