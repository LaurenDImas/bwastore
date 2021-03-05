<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;

class DashboardSettingController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function settings()
    {

        $user = Auth::user();
        $categories = Category::all();
        return view('pages.dashboard-account',[
            'user'=>$user,
            'categories'=>$categories
        ]);
    }
    
    public function store()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('pages.dashboard-settings',[
            'user'=>$user,
            'categories'=>$categories
        ]);
    }
    
    public function update(Request $request,$redirect)
    {
        $data = $request->all();
        $item = Auth::user();
        $item->update($data);
        return redirect()->route($redirect);
    }
}
