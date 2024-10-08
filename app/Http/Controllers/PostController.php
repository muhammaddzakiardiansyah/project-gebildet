<?php 

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function index() {
        
        $title = " ";
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = "di " . $category->nama;
        }

        if(request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = "oleh " . $user->name;
        }


        return view('posts', [
            "title" => "Postingan Utama " . $title,
            "active" => "posts",
            // "posts" => post::all()
            "posts" => post::latest()->filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(post $post) {
        return view('post', [
            "title" => "Post",
            "active" => "posts",
            "post" => $post
        ]);
    }
}