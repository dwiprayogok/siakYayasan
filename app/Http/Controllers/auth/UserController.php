<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
   
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

        $users = $query->paginate(5); // Paginate results

        return view('user', compact('users'));
    }

  
    public function create()
    {
        //
    }

  
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

   
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }

   
    public function edit(string $id)
    {
        //
        $user = User::findOrFail($id);
        return view('user.edit', compact('users'));
    }


    public function update(Request $request,string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'email' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$id) {
            return response()->json(['error' => 'User ID is missing'], 400);
        }
    
        // Find the user or return a 404 error
        $user = User::find($id);
        
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $user->update([
            'id'            => $request->id,
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'role'          => $request->input('role'),
            'password'      => bcrypt($request->password)
        ]);

        return response()->json(['success' => 'User updated successfully!']);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(['success' => 'User deleted successfully']);
        
    }
}
