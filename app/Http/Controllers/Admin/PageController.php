<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->bulk_action_btn === 'update_status') {
            if (is_live_env()) {
                return back()->with('error', ('demo_restriction'));
            }

            Page::query()->whereIn('id', $request->bulk_ids)->update(['status' => $request->status]);
            return back()->with('success', ('bulk_action_success'));
        }
        if ($request->bulk_action_btn === 'delete') {
            if (is_live_env()) {
                return back()->with('error', ('demo_restriction'));
            }

            Page::query()->whereIn('id', $request->bulk_ids)->delete();
            return back()->with('success', ('bulk_action_success'));
        }

        $title = ('pages');
        $posts = Page::whereType('page')->orderBy('id', 'desc')->paginate(20);
        return view('admin.pages.index', compact('title', 'posts'));
    }

    public function create()
    {
        $title = ('pages');
        return view('admin.pages.create', compact('title'));
    }

    public function store(Request $request)
    {
        // if(is_live_env()) return back()->with('error', ('app.feature_disable_demo'));

        $user = Auth::user();
        $rules = [
            'title' => 'required|max:220',
            'post_content' => 'required',
        ];
        // $this->validate($request, $rules);

        $slug = unique_slug($request->title, 'Models\Page');
        $data = [
            'user_id' => $user->id,
            'title' => clean_html($request->title),
            'slug' => $slug,
            'page_content' => clean_html($request->post_content),
            'type' => 'page',
            'status' => 1,
        ];

        Page::create($data);
        return redirect(route('admin.pages'))->with('success', ('page_has_been_created'));
    }

    public function edit($id)
    {
        $title = ('edit_page');
        $post = Page::find($id);
        return view('admin.pages.edit', compact('title', 'post'));
    }

    public function update(Request $request, $id)
    {
        // if(is_live_env()) return back()->with('error', ('app.feature_disable_demo'));

        // $rules = [
        //     'title'     => 'required|max:220',
        //     'post_content'   => 'required',
        // ];
        // $this->validate($request, $rules);
        $page = Page::find($id);

        $data = [
            'title' => clean_html($request->title),
            'page_content' => clean_html($request->post_content),
        ];

        $page->update($data);
        return redirect()->route('admin.pages')->with('success', ('page_has_been_updated'));
    }

    public function show($slug)
    {
        $page = Page::whereSlug($slug)->first();

        if (!$page) {
            return view('theme.error_404');
        }
        $title = $page->title;
        return view('admin.pages.show', compact('title', 'page'));
    }
    public function pageSingle($slug)
    {
        $page = Page::whereSlug($slug)->first();
        if (!$page) {
            abort(404);
        }
        $title = $page->title;

        return view('front_office.page.show', compact('title', 'page'));

    }
}
