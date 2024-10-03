<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProductServices;
use App\Http\Controllers\Controller;

class ProductApiController extends Controller
{
    public $product_service;

    public function __construct(ProductServices $product_service)
    {
        $this->product_service = $product_service;
    }
    public function index($id)
    {
        return response()->apiSuccess($this->product_service->getAllWith('department_id' , $id));
    }
}
