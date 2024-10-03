<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserManagementController extends Controller
{
    public function index(Request $request){

        // $this->authorize('Show_All_User');


        $ids = $request->bulk_ids;
        $now = Carbon::now()->toDateTimeString();
        if ($request->bulk_action_btn === 'update_status' && $request->status && is_array($ids) && count($ids)) {
            $data = ['status' => $request->status];

          
            User::whereIn('id', $ids)->update($data);
            return back()->with('success', __('general.updated_successfully'));
        }
        // dd($request->bulk_action_btn );
        if ($request->bulk_action_btn === 'update_status' && $request->role && is_array($ids) && count($ids)) {
            $data = ['role_id' => $request->role];
            ($request->role == 1) ? $data['role_name'] = "user" : $data['role_name'] = 'مزود خدمة' ;
            $is_update = User::whereIn('id', $ids)->update($data);
            
            return back()->with('success', __('general.updated_successfully'));
        }
        if ($request->bulk_action_btn === 'update_role' && $request->role_id && is_array($ids) && count($ids)) {
            $data = ['role_id' => $request->role_id];
            User::whereIn('id', $ids)->update($data);
            return back()->with('success', __('general.updated_successfully'));
        }
        if ($request->bulk_action_btn === 'delete' &&  is_array($ids) && count($ids)) {


            User::whereIn('id', $ids)->delete();
            return back()->with('success', __('general.deleted_successfully'));
        }
        $users = User::orderBy("created_at","desc")->paginate(10);
        return view("admin.users.index", compact("users"));
    }
}
