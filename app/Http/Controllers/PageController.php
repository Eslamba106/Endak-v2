<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
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
