<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('Admin_Categories');
        // $data['title'] = __('category');
        $data['categories'] = Category::whereStep(0)->with('sub_categories', 'sub_categories.sub_categories')->orderBy('id', 'desc')->paginate(2);
        // dd($data);
        return view('admin.categories.categories', $data);
    }

    public function create()
    {
        $this->authorize('Create_Category');
        $data['title'] = __('category');
        $data['sub_title'] = __('category_create');
        $data['categories'] = Category::whereStep(0)->with('sub_categories')->orderBy('id', 'asc')->get();

        return view('admin.categories.category_add', $data);
    }

    public function store(Request $request)
    {
        $this->authorize('Create_Category');

        $user_id = Auth::user()->id;
        $slug = unique_slug(clean_html($request->category_name_en), 'Models\Category');

        $data = [
            'user_id' => $user_id,
            'category_name_en' => clean_html($request->category_name_en),
            'category_name_ar' => clean_html($request->category_name_ar),
            'slug' => $slug,
            'category_id' => clean_html($request->parent),
            'icon_class' => clean_html($request->icon_class),
            'thumbnail_id' => clean_html($request->thumbnail_id),
            'category_image' => ($request->parent == 0) ? $request->category_image : 0,
            'title_ar' => clean_html($request->title_ar),
            'title_en' => clean_html($request->title_en),
            'description_ar' => clean_html($request->description_ar),
            'description_en' => clean_html($request->description_en),
            'status' => clean_html($request->status),
            'step' => 0,
            'is_top' => 0,
        ];

        if ($request->parent) {
            $data['step'] = 1;
            $parent = Category::find($request->parent);
            if ($parent && $parent->category_id) {
                $data['step'] = 2;
            }
        }

        $is_create = Category::create($data);
        return back()->with('success', __('category_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $this->authorize('Update_Category');

        $category = Category::find($id);

        $data['category'] = $category;
        $data['categories'] = Category::whereStep(0)->with('sub_categories')->orderBy('id', 'asc')->where('id', '!=', $id)->get();

        if (!$category) {
            abort(404);
        }

        return view('admin.categories.category_edit', $data);
    }

    public function update(Request $request, $id)
    {
        // if(is_live_env()) return back()->with('error', __('demo_restriction'));
        $this->authorize('Update_Category');

        $category = Category::findOrFail($id);
        // if ( ! $category){
        //     return back()->with('error', trans('admin.category_not_found'));
        // }

        // if($request->parent==0) {
        //     $rules['category_image'] = 'required';
        // }

        $data = [
            'category_name_ar' => clean_html($request->category_name_ar),
            'category_name_en' => clean_html($request->category_name_en),
            'category_id' => $request->parent,
            'icon_class' => $request->icon_class,
            'thumbnail_id' => $request->thumbnail_id,
            'step' => 0,
            'status' => $request->status,
            'category_image' => ($request->parent == 0) ? $request->category_image : 0,
            'title_ar' => clean_html($request->title_ar),
            'title_en' => clean_html($request->title_en),
            'description_ar' => clean_html($request->description_ar),
            'description_en' => clean_html($request->description_en),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($request->parent) {
            $data['step'] = 1;
            $parent = Category::find($request->parent);
            if ($parent && $parent->category_id) {
                $data['step'] = 2;
            }
        }
        $category->update($data);

        return back()->with('success', trans('admin.category_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($slug)
    {
        $this->authorize('Delete_Category');

        $category = Category::whereSlug($slug)->first();
        $category->delete();
        return back()->with('success', 'Deleted Successfully');
        // if (count($request->categories)){
        //     foreach($request->categories as $cid) {
        //         $course_count = Course::where('category_id', $cid)->orWhere('second_category_id', $cid)->orWhere('parent_category_id', $cid)->count();
        //         if($course_count > 0) {
        //             return ['success' => false, 'message' => 'Unable to delete categories. Some categories are in used', 'data' => ''];
        //         }
        //     }
        //     Category::whereIn('id', $request->categories)->delete();
        //     return ['success' => true, 'message' => '', 'data' => ''];
        // }
        // return ['success' => false, 'message' => '', 'data' => ''];
    }

    // public function getTopicOptions(Request $request)
    // {
    //     $topics = Category::whereCategoryId($request->category_id)->get();

    //     $options_html = "<option value=''>" . __t('select_topic') . "</option>";
    //     foreach ($topics as $topic) {
    //         $options_html .= "<option value='{$topic->id}'>{$topic->category_name}</option>";
    //     }
    //     return ['success' => 1, 'options_html' => $options_html];
    // }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * Show categories view
     *
     */

    // public function show($slug)
    // {
    //     $data['category'] = Category::whereSlug($slug)->orWhere('id', $slug)->first();
    //     if (!$data['category']) {
    //         abort(404);
    //     }

    //     $data['title'] = $data['category']->category_name;
    //     $data['courses'] = $data['category']->courses()->paginate(20);
    //     return view(theme('single-category'), $data);
    // }

    // public function home(Request $request)
    // {
    //     $data['title'] = __t('topics');
    //     if ($request->has('slug') && $request->slug != '') {
    //         $category = Category::whereStatus(1)->where('slug', $request->slug)->first();
    //         if (!$category) {
    //             abort(404);
    //         }
    //         $data['title'] = $category->category_name;
    //         $data['category'] = $category;

    //         $sub_categories = Category::whereStatus(1)->where('category_id', $category->id)->get();
    //         $ids = $sub_categories->map(function ($item) {
    //             return $item->id;
    //         })->values();
    //         $data['topics'] = Category::with('category_courses')->whereStatus(1)->whereIn('category_id', $ids)->whereHas('category_courses', function ($query) {
    //             return $query->orderBy('created_at', 'desc');
    //         })->get();
    //     } else {
    //         return redirect('404');
    //     }
    //     // $data['categories']             = Category::where('category_id', '>', 0)->whereStatus(1)->get();
    //     // $data['categoriesWithCourses']  = Category::parent()->has('courses')->whereStatus(1)->get();
    //     return view(theme('categories'), $data);
    // }

    // public function update_top_categories(Request $request)
    // {
    //     $ids = $request->categories;

    //     if (is_live_env()) {
    //         return response()->json(array('status_message' => 'OK', 'status_code' => 401, 'message' => __a('demo_restriction'),
    //         ));
    //     }

    //     if ($request->mark_as_top == 1 || $request->mark_as_top == 0) {
    //         Category::whereIn('id', $ids)->update(['is_top' => $request->mark_as_top]);
    //         return response()->json(array('status_message' => 'OK', 'status_code' => 200, 'message' => __a('bulk_action_success'),
    //         ));
    //     }
    //     return response()->json(array('status_message' => 'OK', 'status_code' => 200, 'message' => 'Nothing updated',
    //     ));
    // }

}
