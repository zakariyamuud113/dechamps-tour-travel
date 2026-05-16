<?php


namespace App\Http\Controllers;
use App\Models\Blog;


use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

    public function index()
    {
        $blogs = Blog::where('status', 'approved')->latest()->get();

        return view('pages.blogs', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 'approved')
            ->firstOrFail();
          

    return view('pages.blog-details', compact('blog'));

        $blogs = Blog::where('status', 'approved')
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.blog-details', compact('blog', 'blogs'));
    }

    public function create()
    {
        return view('pages.blog-submit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        Blog::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'image' => $imagePath,
            'author' => $request->author ?? 'Guest User',
            'status' => 'pending', // 🔥 KEY: user posts always pending
            'featured' => 0,
        ]);

        return redirect('/blogs')->with('success', 'Blog submitted for review!');
    }
}
