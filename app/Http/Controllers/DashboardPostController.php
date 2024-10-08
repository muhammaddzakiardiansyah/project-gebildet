<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tambahPostingan =  $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'gambar' => 'image|file|max:1024',
            'caption' => 'required'
        ]);

        if (request('gambar')) {
            $file = $request->file('gambar');
            $destination = public_path('uploads');
            $image = uniqid() . '-' . $file->getClientOriginalName();
            $file->move($destination, $image);
            $tambahPostingan['gambar'] = $image;
        } else {
            $tambahPostingan['gambar'] = null;
        }

        $tambahPostingan['user_id'] = auth()->user()->id;
        $tambahPostingan['excrpt'] = Str::limit(strip_tags($request->caption), 100);

        Post::create($tambahPostingan);
        return redirect('/dashboard/posts')->with('success', 'Postingan baru berhasil di upload');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'judul' => 'required|max:255',
            'category_id' => 'required',
            'caption' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validateData = $request->validate($rules);

        if ($request->file('gambar')) {
            if ($post->gambar) {
                Storage::delete($post->gambar);
            }

            $validateData['gambar'] = $request->file('gambar')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excrpt'] = Str::limit(strip_tags($request->caption), 100);

        Post::where('id', $post->id)
            ->update($validateData);
        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->gambar) {
            Storage::delete($post->gambar);
        }

        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Postingan berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
