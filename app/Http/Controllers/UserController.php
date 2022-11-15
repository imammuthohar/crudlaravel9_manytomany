<?php
namespace App\Http\Controllers;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller

{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get users form Model
        $users = User::latest()->paginate(5);
        return view('users.index',compact('users'));

    }

    public function create ()
    {
        
        return view('users.inputuser');
    }

    public function store(Request $request)
    {
        
        
        $this->validate($request, [
            'name'     => 'required|min:5',
            'email'    => 'required|min:5',
            'password' => 'required|min:4',
            'phone'    => 'required|min:4',
            'role_id'  => 'reqired|min:1'
        ]);
        // dd($request->all());
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
            'phone'    => $request->phone,
            'role_id'  => $request->role_id
        ]);

        // $role_id = new Role;
        // $role_id->user_id = $user->id;
        // $role_id->role_id=$request->role_id;
        // $role_id->save();



    return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit ( User $user)
    {
        return view('users.edituser',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required|min:5',
            'email'    => 'required|min:5',
            'password' => 'required|min:4'
            
        ]);

        
            $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password
            
            ]);
            return redirect()->route('users.index')->with(['success' => 'Data Berhasil Diubah!']);
        }

        public function destroy(User $user)
    {
        //delete post
        $user->delete();

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

  
    }

    
