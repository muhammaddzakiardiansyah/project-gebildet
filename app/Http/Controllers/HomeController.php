<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $title = " ";

        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = "di " . $category->nama;
        }

        if(request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = "oleh " . $user->name;
        }

        return view('home', [
            "title" => "Postingan Utama " . $title,
            "active" => "home",
            // "posts" => post::all()
            "posts" => post::latest()->filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString()
        ]);
    }

    public function about()
    {
        return view('about', [
            "title" => "About Me",
            "active" => "about"
        ]);
    }
}
