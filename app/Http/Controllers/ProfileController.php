<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Faceds\HTML;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
      $posts = User::all()->sortByDesc('updated_at');
      
      if (count($posts) > 0) {
        $headline = $posts->shift();
      } else{
        $headline = null;
      }
      
      return view('profile.index', ['headline' => $headline, 'posts' => $posts]);
    }
    //    

    public function show($id)
    {
        $user = Auth::user()->id;
        if (!$user) return redirect()->route('profile.index')
            ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
        return view('profile.edit', [
            'user' => $user
        ]);
    }
    
}