<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = User::query();

        // Search by name or email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%");
        }

        $users = $query->paginate(10); // Paginate results

        return view('user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'role' => 'required|string|max:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        // Create and store the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->input('role'),
            'password' => bcrypt($request->password),
        ]);

        //return response()->json(['message' => 'User created successfully!', 'user' => $user]);
        return redirect()->route('user')->with('success', 'User added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        //get product by ID
        $user = User::findOrFail($id);

        //render view with product
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'role' => 'required|string|max:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);


        $user = User::findOrFail($id);
        $user->update([
            'name'         => $request->title,
            'username'   => $request->username,
            'email'         => $request->email,
            'role'         => $request->input('role'),
            'password'         => bcrypt($request->password)
        ]);
        return redirect()->route('user')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
