<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 2)->latest()->paginate(15);
        return view('admin.users.index', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function emailVerfifyStatus(Request $request)
    {
        
        $user = User::find($request->user_id);

        // Always check if the user exists to prevent errors
        if (!$user) {
            // If user not found, send an error notification
            return back()->with('error', 'User not found.');
        }

        if ($user->email_verified_at === null) {
            // User's email is not verified, so verify it
            $user->email_verified_at = Carbon::now();
            $user->save();

            // Use 'success' type for verification. The message is clear and positive.
            return back()->with('success', 'Email for ' . $user->name . ' has been successfully verified.');
        } else {
            // User's email is already verified, so unverify it
            $user->email_verified_at = null; // Unsetting for verification status
            $user->save();

            // Use 'info' or 'warning' for unverification, as it's a state change
            // that might have implications or needs clear acknowledgment.
            // 'info' is generally good for state changes that aren't errors but aren't strictly 'success' from a user's goal perspective.
            // 'warning' if un-verifying has significant negative consequences.
            return back()->with('info', 'Email for ' . $user->name . ' has been unverified.');
            // Or: return back()->with('warning', 'Email for ' . $user->name . ' has been unverified. They may lose access to certain features.');
        }
    }
}
