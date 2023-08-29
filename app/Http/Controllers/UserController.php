<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('is_super_admin');
    }

    public function index(Request $request){
        $user = User::latest();

        if($request->search){
            $user->where('name', 'LIKE', '%'.$request->search.'%');
        }

        return view('pages.role.index',[
            'theme' => 'cupcake',
            'active' => 'user_data',
            'judul' => 'User Data',
            'user' => $user->paginate(6),
        ]);
    }

    public function detail(Request $request, $id)
    {
        $user = User::find($id);

        return view('pages.role.detail',[
            'theme' => 'cupcake',
            'active' => 'user_data',
            'judul' => 'User Data',
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('pages.role.edit',[
            'user' => $user,
            'theme' => 'cupcake',
            'active' => 'user_data',
            'judul' => 'User Data'
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'role' => $request->role,
        ]);

        return redirect('/user');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('user')->with('delete', 'Di Delete');
    }
}
