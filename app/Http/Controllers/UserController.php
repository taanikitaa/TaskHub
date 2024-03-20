<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\Pembimbing;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::all();
        return view('home.admin.index', compact('users'));
    }

    public function search(Request $request)
    {
        $search = $request->query('search');
        $users = User::query();

        if ($search) {
            $users->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }

        $users = $users->paginate(10);

        return view('home.admin.index', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('home.admin.index')->with('success', 'Admin berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('home.admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();

        return redirect()->route('home.admin.index')->with('success', 'Data admin berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('home.admin.index')->with('success', 'Admin berhasil dihapus');
    }

    public function assignRoleForm($userId)
    {
        $user = User::findOrFail($userId);
        $roles = Role::all();
        return view('home.admin.assign_role', compact('user', 'roles'));
    }


    public function assignRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $role = $request->input('role');

        switch ($role) {
            case 'admin':
                break;
            case 'pembimbing':
                $pembimbing = new Pembimbing([
                    'nama' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make($user->password), 
                ]);
                $pembimbing->id = $user->id;
                $pembimbing->save();
                $user->assignRole('pembimbing'); 
                break;
            case 'karyawan pkl':
                $karyawan = new Karyawan([
                    'nama' => $user->name, 
                    'email' => $user->email,
                    'password' => Hash::make($user->password), 
                ]);
                $karyawan->id = $user->id; 
                $karyawan->save();
                $user->assignRole('karyawan pkl'); 
                break;
            default:
                break;

                
        }

        return redirect()->route('home.admin.index')->with('success', 'Assign Role berhasil ');
    }


}
