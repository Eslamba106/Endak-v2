<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public $product_service;

    public function __construct(ProductServices $product_service)
    {
        $this->product_service = $product_service;
    }
    public function index(Request  $request){
        
        // $this->authorize('Show_Admin_Products');

        $ids = $request->bulk_ids;
        $now = Carbon::now()->toDateTimeString();
        if ($request->bulk_action_btn === 'delete' &&  is_array($ids) && count($ids)) {


            Product::whereIn('id', $ids)->delete();
            return back()->with('success', __('general.deleted_successfully'));
        }
        $products = Product::orderBy("created_at","desc")->paginate(10);

        return view("admin.products.index", compact("products"));
    }

    public function create(){
        // $this->authorize('Create_Product');
        return view('admin.products.create');
    }

    public function store(Request $request){

        // $this->authorize('Create_Product');

        $request->validate([
            'name_ar' => "required",
            'name_en' => "required",
            'description_ar' => "required",
            'description_en' => "required",
            'image'             => "required",
        ]);


        $slug = unique_slug(clean_html($request->name_en), 'Models\Product');
        $path = uploadImage( $request , 'products' , 'image');

        $data = [
            'name_ar'                   => clean_html($request->name_ar),
            'name_en'                   => clean_html($request->name_en),
            'slug'                      => $slug,
            'image'                     => $path,
            'description_ar'            => clean_html($request->description_ar),
            'description_en'            => clean_html($request->description_en),
        ];

        $product = $this->product_service->store($data);
        

        return redirect()->route('admin.products')->with('success' , __('products.add_success'));

    }


    
    public function edit($slug)
    
    {
        // $this->authorize('Update_Product');

        $product = Product::whereSlug($slug)->first();


        if (!$product){
            abort(404);
        }
        // dd($product);
        return view('admin.products.edit', compact('product'));
    }
    public function show($slug){
        $this->authorize('Show_Product');
        
        $Product = Product::whereSlug($slug)->first();

        // $data['Product'] = $Product;
        $Products = Product::whereStep(0)->with('sub_Products')->orderBy('id', 'asc')->where('slug', '!=', $slug)->get();
        // dd($Products[1]->posts);
        if ( ! $Product){
            abort(404);
        }

        return view('admin.Products.Product_show', compact('Product' , 'Products'));
    }

    public function update(Request $request, $slug){
        // $this->authorize('Update_Product');
        
        $product = Product::whereSlug($slug)->first();
        if ( ! $product){
            abort(404);
        }

        $old_image = $product->image;
        $path = uploadImage( $request , 'product' , 'image');


        $data = [
            'name_ar'                  => clean_html($request->name_ar),
            'name_en'                  => clean_html($request->name_en),
            'image'                 => ($path != 0) ? $path : $old_image,
            'description_ar'           => clean_html($request->description_ar),
            'description_en'           => clean_html($request->description_en),
            'updated_at'            => date('Y-m-d H:i:s')
        ];


        $product->update($data);

        if ($old_image && $path) {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()->route('admin.products')->with('success' , "Updated Successfully");

    }
    public function destroy($slug)
    {

        $Product = Product::where('slug',$slug)->first()->with('sub_Products', 'sub_Products.sub_Products');
        $Product->delete();

        return redirect()->route('admin.products')->with('success' , "Deleted Successfully");
    }
}
