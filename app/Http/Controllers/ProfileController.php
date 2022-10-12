<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit_prr()
    {
        $users = User::get();
        foreach ($users as $user) {
            $user->name = $user->first_name != null ? $user->first_name : $user->name;
            $user->save();
        }
    }
    public function markters()
    {
        $users = User::where('type', 'marketer')->get();
        return view('pages.marketers.index')->with('users', $users);
    }
    public function updateStatus(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }
    public function show($id){
        $user = User::find($id);
        return view('pages.marketers.profile.show')->with('user', $user);

    }
}
