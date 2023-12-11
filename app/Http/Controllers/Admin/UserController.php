<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.create')->only('create');
        $this->middleware('can:admin.users.edit')->only('edit');
        $this->middleware('can:admin.users.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        $roles = Role::all();

        $user = new User();

        return view('admin.users.create', compact('roles', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'phone' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    // Validar el formato del número de teléfono chileno
                    if (!preg_match('/^(\+?56)?(?:0?[2-9])?(9[0-9]{8}|[2-8][0-9]{7})$/', $value)) {
                        $fail('El teléfono ingresado no es un número de teléfono chileno válido. Ej: 569XXXXYYYY');
                    }
                },
                "unique:users,phone",
            ],
            'password' => 'required|min:6|max:255',
        ]);

        // Hasheo de la contraseña
        $userData = $request->all();
        $userData['password'] = Hash::make($request->input('password'));

        // Creación de un nuevo usuario
        $user = User::create($userData);

        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index', $user)->with('info', 'El usuario se creó correctamente');
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => "required|email|unique:users,email,$user->id|max:255",
            'phone' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    // Validar el formato del número de teléfono chileno
                    if (!preg_match('/^(\+?56)?(?:0?[2-9])?(9[0-9]{8}|[2-8][0-9]{7})$/', $value)) {
                        $fail('El teléfono ingresado no es un número de teléfono chileno válido. Ej: 569XXXXYYYY');
                    }
                },
                "unique:users,phone,$user->id",
            ],
            'password' => 'required|min:6|max:255',
        ]);

        // Hasheo de la contraseña
        $userData = $request->all();
        $userData['password'] = Hash::make($request->input('password'));

        // Creación de un nuevo usuario
        $user->update($userData);

        if($user->id != 1) {
            $user->roles()->sync($request->roles);
        }


        return redirect()->route('admin.users.index', $user)->with('info', 'El usuario se actualizó correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('info', 'El usuario se eliminó con éxito');
    }
}
