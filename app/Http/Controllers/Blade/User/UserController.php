<?php

namespace App\Http\Controllers\Blade\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\LogWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // List of users
    public function index()
    {
        abort_if_forbidden('user.show');
        $users = User::where('id','!=',auth()->user()->id)->get();
        return view('pages.user.index',compact('users'));
    }

    // user add page
    public function add()
    {
        abort_if_forbidden('user.add');
        if (auth()->user()->hasRole('Super Admin'))
            $roles = Role::all();
        else
            $roles = Role::where('name','!=','Super Admin')->get();

        return view('pages.user.add',compact('roles'));
    }

    // user create
    public function create(Request $request)
    {
        abort_if_forbidden('user.add');
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $user->assignRole($request->get('roles'));

        return redirect()->route('userIndex')->with('success','Muvofiqiyatli yaratildi!');
    }

    // user edit page
    public function edit($id)
    {
        abort_if((!auth()->user()->can('user.edit') && auth()->id() != $id),403);

        $user = User::find($id);

        if ($user->hasRole('Super Admin') && !auth()->user()->hasRole('Super Admin'))
        {
            message_set("У вас нет разрешения на редактирование администратора",'error',5);
            return redirect()->back();
        }

        if (auth()->user()->hasRole('Super Admin'))
            $roles = Role::all();
        else
            $roles = Role::where('name','!=','Super Admin')->get();

        return view('pages.user.edit',compact('user','roles'));
    }

    // update user dates
    public function update(Request $request, $id)
    {
        abort_if((!auth()->user()->can('user.edit') && auth()->id() != $id),403);

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find($id);

        if ($request->get('password') != null)
        {
            $user->password = Hash::make($request->get('password'));
        }

        unset($request['password']);


        $user->fill($request->all());
        $user->save();

        if (isset($request->roles)) $user->syncRoles($request->get('roles'));
        unset($user->roles);


        if (auth()->user()->can('user.edit'))
            return redirect()->route('userIndex');
        else
            return redirect()->route('home');
    }

    // delete user by id
    public function destroy($id)
    {
        abort_if_forbidden('user.delete');

        $user = User::destroy($id);
        if (!auth()->user()->hasRole('Super Admin'))
        {
            message_set("У вас нет разрешения на редактирование администратора",'error',5);
            return redirect()->back();
        }
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        DB::table('model_has_permissions')->where('model_id',$id)->delete();

        return redirect()->route('userIndex');
    }


}
