<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile(){
        return view('profile');
    }


    public function upload(Request $request){
        if ($request->hasFile('avatar')) {
            Storage::disk('public')->delete('images/'.auth()->user()->avatar);

            $file_name = $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('images', $file_name, 'public');
        }

        auth()->user()->update([
            'avatar'=>$file_name
        ]);

        return back();
    }
}
