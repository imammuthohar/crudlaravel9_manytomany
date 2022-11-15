<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;


class UserRoleController extends Controller
{
    // public function index()
    // {
    //     //get users form Model
    //     $roles = Role::latest()->paginate(5);
    //     //passing user to view
    //     // return view('users.users', compact('users'));
    //     return view('roles.index', compact('roles'));

    // }


    
    public function index (Role $role)
    {
        $role = Role::latest()->paginate(5);
        return view('roles.insertrole',compact('role'));
    }
    
    
public function store(Request $request)
    {
        $this->validate($request,
        [
            
            'user_id'  => 'required|min:1',
            'role_id'  => 'required|min:1'
        ]);
            $input = $request->all();
            $user = User::create($input);
            $user->roles()->attach($request->role_id);
        
        // $user = new User;
        
        // // $user->user_id = User::get('id');
        // // $user->role_id = Role::get('id');
        // $user->roles()->attach($request);
        // // $request->save();



    return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
