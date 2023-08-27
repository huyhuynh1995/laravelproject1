<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(7);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required','integer'],
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
        ]);
        return redirect('/admin/users')->with('message','Thành viên mới được tạo thành công');
    }

    public function edit(int $user_id)
    {
        $user = User::findOrFail($user_id);
        return view('admin.users.edit',compact('user'));
    }
    public function update(Request $request,int $user_id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required','integer'],
        ]);
        User::findOrFail($user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
        ]);
        return redirect('/admin/users')->with('message','Cập nhật thông tin thành công');
    }
    public function delete(int $user_id)
    {
        User::findOrFail($user_id)->delete();
        return redirect()->back()->with('message','Thành viên được xóa thành công');
    }
}
