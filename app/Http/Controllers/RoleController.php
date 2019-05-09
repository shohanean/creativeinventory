<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use App\User;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole');
    }
    
    public function test(){
    //    $role = Role::create(['name'=> 'writer']);
    //    $permission = Permission::create(['name'=> 'edit articles']);

    // $user = Auth::user();
    // print_r($user->name);
    // $user->assignRole(1);

    // Permission::create(['name' => 'post articles']);
    }

    public function index(){
        $permissions = Permission::all();
        $roles = Role::all();
        $users = User::all();
       return view('role.index', compact('roles', 'permissions', 'users'));
    }

    public function addRole(Request $request){
        $data = request()->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create($data);
        return back();
    }

    public function assignPermission(Request $request){
        foreach ($request->permission_id as $permission) {
            $role = Role::find($request->role_id);
            $permission = Permission::find($permission);
    
            $permission->assignRole($role);
            // $role->syncPermissions($permission);
            }
            return back();
    }
    public function assignRole(Request $request){
      
        $user_id = $request->user_id;
        $role_id = $request->user_id;
        
       $user = User::find($user_id);
       $role = Role::find($role_id);

        $user->syncRoles($role);

        return back();
    }
    
    public function removePermission($role_id, $permission_id ){

        $role = Role::findOrFail($role_id);
        $permission = Permission::findOrFail($permission_id)->name;

        $role->revokePermissionTo($permission);

    return back();
    }
    public function removeRole($user_id, $names ){

        $user = User::findOrFail($user_id);
        $role = Role::findByName($names);
        
        $user->removeRole($role);

    return back();
    }
}
