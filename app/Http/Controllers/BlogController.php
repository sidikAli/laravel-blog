<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use App\Tags;

class BlogController extends Controller
{
	public function index()
	{
		$posts = Posts::latest()->paginate(7);
		$categories = Category::all();
		$tags = Tags::all();
    	return view('blog.index', compact('posts', 'categories', 'tags'));
	}

	public function page($slug)
	{
		$post = Posts::where('slug', $slug)->firstorfail();
		$categories = Category::all();
		$tags = Tags::all();
    	return view('blog.page', compact('post', 'categories', 'tags'));
	}

	public function search(Request $request)
	{
		$keyword = $request->keyword;
		$posts = Posts::where('judul', $keyword)->orWhere('judul', 'like', '%'.$keyword.'%')->paginate(1);
		$categories = Category::all();
		$tags = Tags::all();
		return view('blog.list', compact('keyword', 'posts', 'categories', 'tags'));
	}

	public function category(Category $category)
	{
		$categories = Category::all();
		$posts = $category->posts()->paginate(7);
		$tags = Tags::all();
    	return view('blog.list', compact('posts', 'categories', 'tags'));
	}

	public function tag($tag)
	{
		$posts = Tags::where('slug', $tag)->first()->post()->paginate(7);
		$categories = Category::all();
		$tags = Tags::all();
    	return view('blog.list', compact('posts', 'categories', 'tags'));
	}
}
