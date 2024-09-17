<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = __('department');
        $data['departments'] = Department::with('sub_Departments', 'sub_Departments.sub_Departments')->orderBy('id', 'desc')->paginate(2);

        return view('admin.departments.departments', $data);
    }

    public function create(){
        $data['title'] = __('departments');
        $data['sub_title'] = __('department_create');
        $data['departments'] = Department::with('sub_Departments')->orderBy('id', 'asc')->get();

        return view('admin.departments.department_add', $data);
    }
    public function store(Request $request)
    {

        $user_id = Auth::user()->id;


        $slug = unique_slug(clean_html($request->name_en), 'Models\Department');
        $path = uploadImage( $request , 'department' , 'image');

        $data = [
            'name_ar'                  => clean_html($request->name_ar),
            'name_en'                  => clean_html($request->name_en),
            'slug'                  => $slug,
            'department_id'           => clean_html($request->parent),
            'icon_class'            => clean_html($request->icon_class),
            'image'                 => $path,
            'description_ar'           => clean_html($request->description_ar),
            'description_en'           => clean_html($request->description_en),
            'status'                => clean_html($request->status),
            'step'                  => 0,
            'is_top'                => 0,
        ];

        if ($request->parent){
            $data['step'] = 1;
            $parent = Department::find($request->parent);
            if ($parent && $parent->category_id){
                $data['step'] = 2;
            }
        }

        $is_create = Department::create($data);
        if ($request->has('topics')) {
            $is_create->topics()->sync($request->topics);
        }

        return redirect()->route('admin.departments')->with('success', __('department_created'));
    }

    public function edit($id){
        $department = Department::find($id);

        $data['title'] = __('category_edit');
        $data['department'] = $department;
        $data['departments'] = Department::whereStep(0)->with('sub_Departments')->orderBy('id', 'asc')->where('id', '!=', $id)->get();

        if ( ! $department){
            abort(404);
        }

        return view('admin.departments.department_edit', $data);
    }
    public function show($slug){
        $department = Department::whereSlug($slug)->first();

        // $data['department'] = $department;
        $departments = Department::whereStep(0)->with('sub_Departments')->orderBy('id', 'asc')->where('slug', '!=', $slug)->get();

        if ( ! $department){
            abort(404);
        }

        return view('admin.departments.department_show', compact('department' , 'departments'));
    }

    public function update(Request $request, $id){

        $department = Department::find($id);
        if ( ! $department){
            return back()->with('error', trans('admin.category_not_found'));
        }

        $old_image = $department->image;
        $path = uploadImage( $request , 'department' , 'image');
        // dd($path);
        // if (isset($path) && $path != 0 ) {
        //     $data['image'] = $path;
        // }else{
        //     $data['image'] = $old_image;
        // }

        $data = [
            'name_ar'                  => clean_html($request->name_ar),
            'name_en'                  => clean_html($request->name_en),
            'department_id'           => $request->parent,
            'icon_class'            => $request->icon_class,
            'step'                  => 0,
            'status'                => $request->status,
            'image'                 => ($path != 0) ? $path : $old_image,
            'description_ar'           => clean_html($request->description_ar),
            'description_en'           => clean_html($request->description_en),
            'updated_at'            => date('Y-m-d H:i:s')
        ];

        if ($request->parent){
            $data['step'] = 1;
            $parent = Department::find($request->parent);
            if ($parent && $parent->department_id){
                $data['step'] = 2;
            }
        }
        $department->update($data);
        if ($request->has('topics')) {
            $department->topics()->sync($request->topics);
        }
        if ($old_image && $path) {
            Storage::disk('public')->delete($old_image);
        }
        return redirect()->route('admin.departments')->with('success' , "Updated Successfully");

        // return back()->with('success', trans('admin.category_updated'));
    }
    public function destroy($slug)
    {

        $department = Department::where('slug',$slug)->first()->with('sub_Departments', 'sub_Departments.sub_Departments');
        $department->delete();

        return redirect()->route('admin.departments')->with('success' , "Deleted Successfully");
    }
}
