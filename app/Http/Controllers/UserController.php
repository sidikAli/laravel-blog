<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\User;
use App\Posts;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(7);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:64',
            'email' => 'required|email',
            'password' => 'required|min:3|max:64',
            'tipe' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'tipe' => $request->tipe
        ]);

        return redirect()->route('user.index')->with('success', 'User Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:64',
            'email' => 'required|email',
            'tipe' => 'required'
        ]);

        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'tipe' => $request->tipe
        ];

        if ($request->input('password')) {
            $request->validate(['password' => 'min:3|max:64']);
            $user['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        }

        User::whereId($id)->update($user);

        return redirect()->route('user.index')->with('success', 'User Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == Auth::id()) {
            return redirect()->route('user.index')->with('success', 'Tidak Dapat Hapus Akun Sendiri');
        }

        // jika punya post ganti user_id
        $posts = Posts::where('user_id', $id)->count();
        if ($posts) {
            Posts::where('user_id', $id)->update(['user_id' => Auth::id()]);
        }

        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User Berhasil Dihapus');
    }
}
