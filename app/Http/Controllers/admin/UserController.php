<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users = User::where('role', '!=', 'admin')->latest()->get();

        return view('admin.user.index', compact('users'));
    }
    
    public function delete($id)
    {
        $user = User::findOrFail(decrypt($id));

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
