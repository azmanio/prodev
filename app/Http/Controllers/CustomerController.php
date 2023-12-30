<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('role', 'customer')->get();
        return view("pages.admin.user.customer.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.user.customer.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'nama' => 'required|string',
            'image_path' => 'nullable|image'
        ]);

        if ($data['image_path']) {
            $ext = $request->file('image_path')->getClientOriginalExtension();
            // save to storage
            $data['image_path'] = $request->file('image_path')->storeAs('public/profile', time().Str::slug($request->nama) . '.' . $ext);
            $data['image_path'] = str_replace('public/', '', $data['image_path']);
        }

        $data['role'] = 'customer';
        Customer::create($data);
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $customer)
    {
        return view('pages.admin.user.customer.update', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $customer)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['nullable', 'string', 'confirmed'],
            'nama' => ['required', 'string'],
            'gender' => ['required', 'in:laki-laki,perempuan'],
            'telepon' => ['required', 'numeric'],
            'alamat' => ['nullable', 'string'],
            'instansi' => ['nullable', 'string'],
            'image_path' => ['nullable', 'image']
        ]);

        $data = $request->only('email', 'password', 'nama', 'image_path');

        if (@$data['image_path']) {
            $ext = $request->file('image_path')->getClientOriginalExtension();
            // save to storage
            $data['image_path'] = $request->file('image_path')->storeAs('public/profile', time().Str::slug($request->nama) . '.' . $ext);
            $data['image_path'] = str_replace('public/', '', $data['image_path']);
        }

        if ($data['password'] == "") {
            unset($data['password']);
        }

        $customer->update($data);

        $customer->customer->update($request->only('gender', 'alamat', 'telepon', 'instansi'));
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index');
    }

    public function status(Customer $customer)
    {
        $customer->status = !$customer->status;
        $customer->save();
        return redirect()->route('customer.index');
    }
}