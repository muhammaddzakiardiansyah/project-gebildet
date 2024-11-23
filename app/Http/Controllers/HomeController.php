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

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = " in " . $category->name;
        }

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = " by " . $user->name;
        }

        return view('pages.home', [
            "title" => $title,
            "active" => "home",
            // "posts" => post::all()
            "posts" => post::latest()->filter(request(['search', 'category', 'user']))->paginate(10)->withQueryString()
        ]);
    }

    public function about()
    {
        return view('pages.about', [
            "title" => "About",
            "active" => "about"
        ]);
    }

    public function article()
    {
        return view(
            'pages.article',
            [
                'title' => 'Articles',
                'active' => 'articles',
            ]
        );
    }

    public function contact()
    {
        return view('pages.contact', [
            'title' => 'Contact',
            'active' => 'contact',
        ]);
    }
}
