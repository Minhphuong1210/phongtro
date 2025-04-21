<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
      
$users = User::all();
        return view('Admin.User.List', compact('users'));
    }

    public function create()
    {
        return view('Admin.User.Add');
    }


    public function add(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' =>  $request->password,
        ]);
    
        $user->assignRole($request->role);
    
        return redirect()->route('admin.users.index')->with('success', 'Thêm mới người dùng thành công!');
    }

    public function search()
    {

    }

    public function edit(string $id)
    {
        $User = User::findOrFail($id);
        return view('Admin.User.Update', compact('User'));
    }

    public function update(Request $request, string $id)
    {
// dd($request->all());

$validator =  $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:users,email,' . $id,
            
            'phone' => 'required',
            // 'address' => 'required',
            'role' => 'required|in:admin,user'
        ]);
    

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'phone', 'address'));

        $user->syncRoles([$request->role]);
    
        return redirect()->route('admin.users.index')->with('success', 'Cập nhật người dùng thành công!');

    }
}
