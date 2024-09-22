<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CategoryServices;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public $category_services;

    public function __construct(CategoryServices $category_services)
    {
        $this->category_services = $category_services;
    }

    public function index()
    {
        $n =$this->category_services->getAllWith('category_id' , 0);
        // dd($this->category_services);
        return response()->apiSuccess($this->category_services->getAllWith('category_id' , 0));
    }
    public function childern($id)
    {
        return response()->apiSuccess($this->category_services->getAllWith('category_id' , $id));
    }
}
