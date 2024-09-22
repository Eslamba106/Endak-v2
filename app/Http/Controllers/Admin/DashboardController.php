<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $this->authorize('admin_general_dashboard');
        return view("admin.dashboard");
    }
    public function adminOffers(Request $request)
    {
        $ids = $request->bulk_ids;
        $now = Carbon::now()->toDateTimeString();

  

        //Update
        if ($request->bulk_action_btn === 'update_status' && $request->status && is_array($ids) && count($ids)) {
            $data = ['status' => $request->status];

            if ($request->status == 1) {
                $data['updated_at'] = $now;
            }

            Post::whereIn('id', $ids)->update($data);
            return back()->with('success', __('bulk_action_success'));
        }
}
}