<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * /dashboard  ->  admins are sent to the admin dashboard,
     * normal users see the user dashboard.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard', [
            'user'    => $user,
            'profile' => $user->profile,
        ]);
    }
}
