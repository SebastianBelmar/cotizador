<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
            'password' => 'required|min:4',
        ]);
        
        // Hasheo de la contraseña
        $userData = $request->all();
        $userData['password'] = Hash::make($request->input('password'));

        // Creación de un nuevo usuario
        $user = User::create($userData);

        return redirect()->route('admin.users.edit', $user)->with('info', 'El usuario se creó correctamente');
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => "required|email|unique:users,email,$user->id",
            'phone' => 'required|numeric',
            'password' => 'required|min:4',
        ]);
        
        // Hasheo de la contraseña
        $userData = $request->all();
        $userData['password'] = Hash::make($request->input('password'));

        // Creación de un nuevo usuario
        $user->update($userData);


        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', $user)->with('info', 'El usuario se actualizó correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('info', 'El usuario se eliminó con éxito');
    }
}
