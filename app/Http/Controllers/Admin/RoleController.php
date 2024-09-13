<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Section;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('Show_Admin_Roles');

        $roles = Role::with('users')
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        $data = [
            'pageTitle' => trans('admin/pages/roles.page_lists_title'),
            'roles' => $roles,
        ];

        return view('admin.roles.lists', $data);
    }

    public function create()
    {
        $this->authorize('Create_Admin_Roles');

        $sections = Section::whereNull('section_group_id')
            ->with('children')
            ->get();

        $data = [
            'pageTitle' => trans('admin/main.role_new_page_title'),
            'sections' => $sections
        ];
        // dd($sections);

        return view('admin.roles.create', $data);
    }

    public function store(Request $request)
    {
        $this->authorize('Create_Admin_Roles');

        $this->validate($request, [
            'name' => 'required|min:3|max:64|unique:roles,name',
            'caption' => 'required|min:3|max:64|unique:roles,caption',
        ]);

        $data = $request->all();

        $role = Role::create([
            'name' => $data['name'],
            'caption' => $data['caption'],
            'is_admin' => (!empty($data['is_admin']) and $data['is_admin'] == 'on'),
            'created_at' => time(),
        ]);

        if ($request->has('permissions')) {
            $this->storePermission($role, $data['permissions']);
        }

        Cache::forget('sections');

        return redirect(getAdminPanelUrl("/roles/{$role->id}/edit"))->with('success' , "Created Successfully");
    }

    public function edit($id)
    {
        $this->authorize('Edit_Admin_Roles');

        $role = Role::findOrFail($id);
        $permissions = Permission::where('role_id', '=', $role->id)->get();
        $sections = Section::whereNull('section_group_id')
            ->with('children')
            ->get();

        $data = [
            'pageTitle' => trans('/admin/main.edit'),
            'role' => $role,
            'sections' => $sections,
            'permissions' => $permissions->keyBy('section_id')
        ];

        return view('admin.roles.create', $data);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('Update_Admin_Roles');

        $role = Role::find($id);

        $this->validate($request, [
            'caption' => 'required',
        ]);

        $data = $request->all();

        $role->update([
            'caption' => $data['caption'],
            'is_admin' => ((!empty($data['is_admin']) and $data['is_admin'] == 'on') or $role->name == Role::$admin),
        ]);

        Permission::where('role_id', '=', $role->id)->delete();

        if (!empty($data['permissions'])) {
            $this->storePermission($role, $data['permissions']);
        }

        Cache::forget('sections');

        return redirect(getAdminPanelUrl("/roles/{$role->id}/edit"))->with('success' , "Updated Successfully");
    }

    public function destroy(Request $request)
    {
        $this->authorize('Delete_Admin_Roles');

        $role = Role::find($request->id);
        if ($role->id !== 2) {
            $role->delete();
        }

        return redirect(getAdminPanelUrl() . '/roles')->with('success' , "Deleted Successfully");
    }

    public function storePermission($role, $sections)
    {
        $sectionsId = Section::whereIn('id', $sections)->pluck('id');
        $permissions = [];
        foreach ($sectionsId as $section_id) {
            $permissions[] = [
                'role_id' => $role->id,
                'section_id' => $section_id,
                'allow' => true,
            ];
        }
        Permission::insert($permissions);
    }
}
