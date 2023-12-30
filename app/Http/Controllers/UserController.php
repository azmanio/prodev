<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('role', 'admin')->get();
        return view("pages.admin.user.admin.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.user.admin.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
            'nama' => 'required|string',
            'image_path' => 'nullable|image'
        ]);

        if ($data['image_path']) {
            $ext = $request->file('image_path')->getClientOriginalExtension();
            // save to storage
            $data['image_path'] = $request->file('image_path')->storeAs('public/profile', time().Str::slug($request->nama) . '.' . $ext);
            $data['image_path'] = str_replace('public/', '', $data['image_path']);
        }

        $data['role'] = 'admin';
        User::create($data);
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.admin.user.admin.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'nullable|string|confirmed',
            'nama' => 'required|string',
            'image_path' => 'nullable|image'
        ]);

        if (@$data['image_path']) {
            $ext = $request->file('image_path')->getClientOriginalExtension();
            // save to storage
            $data['image_path'] = $request->file('image_path')->storeAs('public/profile', time().Str::slug($request->nama) . '.' . $ext);
            $data['image_path'] = str_replace('public/', '', $data['image_path']);
        }

        if ($data['password'] == "") {
            unset($data['password']);
        }

        $user->update($data);
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index');
    }

    public function status(User $user)
    {
        $user->status = !$user->status;
        $user->save();
        return redirect()->route('admin.index');
    }
}