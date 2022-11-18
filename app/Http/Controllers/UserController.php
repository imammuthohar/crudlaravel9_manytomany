<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;


class UserController extends Controller

{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $katakunci=request('search');
        if($katakunci){
         $users = User::where( 'name', 'LIKE', '%' . $katakunci . '%' )->paginate(4);
              }  else {
                $users = User::latest()->paginate(4);
              } 
            return view('users.index',$users,compact('users'));    
 
    }

    public function create ()
    {
        $role = Role::get();// ini jika mau melempar varibel
        return view('users.inputuser',compact('role'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name'     => 'required|min:5',
            'email'    => 'required|min:5',
            'password' => 'required|min:4',
            'phone'    => 'required|min:4',
            'role_id'  => 'required|min:1'
        ]);
        
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
            'phone'    => $request->phone,
         
        ]);
      
    $user->roles()->attach($request->role_id);
    

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

    
