<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(Request $request){

        // check if new coming user is first or single
        $cnt = User::count();
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        ;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($cnt === 0)
        {
            $perms_cnt = Permission::count();

            if ($perms_cnt === 0)
            {
                Permission::insert([
                    ["name" => 'permission.show', "title" => 'Ruxsatlarni ko\'rish', "guard_name" => 'web'],
                    ["name" => 'permission.edit', "title" => 'Ruxsatlarni o\'zgartirish', "guard_name" => 'web'],
                    ["name" => 'permission.add', "title" => 'Yangi ruxsat qo\'shish', "guard_name" => 'web'],
                    ["name" => 'permission.delete', "title" => 'Ruxsatlarni o\'chirish', "guard_name" => 'web'],

                    ["name" => 'roles.show', "title" => 'Rollarni ko\'rish', "guard_name" => 'web'],
                    ["name" => 'roles.edit', "title" => 'Rollarni o\'zgartirish', "guard_name" => 'web'],
                    ["name" => 'roles.add', "title" => 'Rollar qo\'shish', "guard_name" => 'web'],
                    ["name" => 'roles.delete', "title" => 'Rollarni o\'chirish', "guard_name" => 'web'],

                    ["name" => 'user.show', "title" => 'Userlarni ko\'rish', "guard_name" => 'web'],
                    ["name" => 'user.edit', "title" => 'Userlarni o\'zgartirish', "guard_name" => 'web'],
                    ["name" => 'user.add', "title" => 'Yangi Userlarni qo\'shish', "guard_name" => 'web'],
                    ["name" => 'user.delete', "title" => 'Userlarni o\'chirish', "guard_name" => 'web'],
                    ["name" => 'api-user.add', "title" => 'ApiUser Add', "guard_name" => 'web'],
                    ["name" => 'api-user.view', "title" => 'ApiUser View', "guard_name" => 'web'],
                    ["name" => 'api-user.edit', "title" => 'ApiUser Edit', "guard_name" => 'web'],
                    ["name" => 'api-user-passport.view', "title" => 'ApiUser Password view', "guard_name" => 'web'],
                ]);
            }

            $role_cnt = Role::count();

            if ($role_cnt === 0)
            {
                Role::create([
                    'name' => 'Super Admin',
                    'title' => 'Super Admin',
                    'guard_name' => 'web'
                ]);
            }

            $user->assignRole('Super Admin');
            Auth::login($user);
            return  redirect()->route('home');
        }

        return  redirect()->route('login');
    }
    public function destroy(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
