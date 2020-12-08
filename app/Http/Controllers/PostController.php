<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Posts;
use App\Category;
use App\Tags;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all(); 
        $tags = Tags::all();
        return view('admin.post.create', compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'min:3'],
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required|image|max:2048'
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $post = Posts::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => 'public/uploads/posts/' . $new_gambar,
            'slug' => Str::slug($request->judul),
            'user_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tag);

        $gambar->move('public/uploads/posts', $new_gambar);
        return redirect()->back()->with('success', "Postingan Berhasil Disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all(); 
        $tags = Tags::all();
        $post = Posts::findOrFail($id);

        return view('admin.post.edit', compact('category', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => ['required', 'min:3'],
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'image|max:2048'
        ]);

        $post_data = [
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'slug' => Str::slug($request->judul)
        ];

        if($request->has('gambar')){
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/posts', $new_gambar);
            $post_data['gambar'] = 'public/uploads/posts/' . $new_gambar;
        }
        
        $post = Posts::find($id);
        $post->update($post_data);
        $post->tags()->sync($request->tag);
        return redirect()->route('post.index')->with('success', "Postingan Berhasil Diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', "Postingan Berhasil Dihapus (Silahkan cek trashed post!)");
    }

    public function trash()
    {
        $posts = Posts::onlyTrashed()->paginate(7);
        return view('admin.post.trash', compact('posts'));    
    }

    public function restore($id)
    {
        $post = Posts::withTrashed()->where('id', $id)->restore();
        return redirect()->route('post.index')->with('success', "Postingan Berhasil Dikembalikan");
    }

    public function kill($id)
    {
        $post = Posts::withTrashed()->where('id',$id);
        $post->forceDelete();
        return redirect()->route('post.trash')->with('success', "Postingan Berhasil Dihapus Secara Permanen");
    }
}
