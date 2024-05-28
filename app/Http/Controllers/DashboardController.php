<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $projects = $user->projects;

        return view('dashboard.index', compact('projects'), [
            'title' => 'SemuaBeli | Dashboard',
            'sub_title' => 'My Dashboard'
        ]);
    }

    public function myproject(){
        $user = Auth::user();
        $projects = $user->projects;
        return view('dashboard.project',compact('projects'), [
            'title' => 'SemuaBeli | Dashboard Project',
            'sub_title' => 'My Project'
        ]);
    }
    public function setting(){
        return view('dashboard.setting', [
            'title' => 'SemuaBeli | Setting',
            'sub_title' => 'Setting'
        ]);
    }
    public function setting_profile(){
        $user = Auth::user();
        return view('dashboard.update-profile', compact('user'), [
            'title' => 'SemuaBeli | Update Profile',
            'sub_title' => 'Update Profile'
        ]);
    }
    public function update(Request $request, User $user){
        $user = Auth::user();
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user->update($validatedData);
        $messages = "Profile has been edited!";
    
        return redirect('dashboard/setting')->with('success', $messages);
    }    
}
