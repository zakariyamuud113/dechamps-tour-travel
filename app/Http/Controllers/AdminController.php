<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Destination;
use Illuminate\Support\Str;
use App\Models\Blog;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $bookings = Booking::latest()->get();
        $destinations = Destination::count();
        $totalBookings = Booking::count();
        $totalBlogs = Blog::count();

        return view('admin.dashboard', compact(
            'bookings',
            'destinations',
            'totalBookings',
            'totalBlogs'
            ));
    }

// Admin Bookings Methods
    public function bookings()
    {
        $bookings = Booking::latest()->get();

        return view('admin.bookings', compact('bookings'));
    }

    public function updateBookingStatus(Request $request, Booking $booking)
    {
        $booking->status = $request->status;
        $booking->save();

        return back()->with('success', 'Booking status updated.');
    }

    public function deleteBooking(Booking $booking)
    {
        $booking->delete();

        return back()->with('success', 'Booking deleted successfully.');
    }

// Admin Destinations Methods
    public function destinations()
    {
        $destinations = Destination::latest()->get();

        return view('admin.destinations.index', compact('destinations'));
    }

    public function createDestination()
    {
        return view('admin.destinations.create');
    }

    public function storeDestination(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'group_size' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = $request->file('image')->store('destinations', 'public');

        Destination::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imagePath ?? null,
            'location' => $request->location,
            'elevation' => $request->elevation,
            'best_time' => $request->best_time,
            'wildlife' => $request->wildlife,
            'price' => $request->price,
            'duration' => $request->duration,
            'group_size' => $request->group_size,
            'best_season' => $request->best_season,
            'difficulty' => $request->difficulty,
            'highlights' => $request->highlights,
            'featured' => $request->boolean('featured'),
        ]);

        return redirect()->route('admin.destinations.index')->with('success', 'Destination created successfully');
    }

    public function editDestination($id)
    {
        $destination = Destination::findOrFail($id);
        return view('admin.destinations.edit', compact('destination'));
    }

    public function updateDestination(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        $data = $request->all();

        // slug update if name changes
        $data['slug'] = Str::slug($request->name);

        // image update (optional)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destinations', 'public');
            $data['image'] = $imagePath;
        } else {
            unset($data['image']);
        }

        $destination->update($data);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination updated successfully');
        }

    public function deleteDestination($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect()->route('admin.destinations.index')->with('success', 'Destination deleted successfully');
        }


// Admin Blogs Methods
    public function blogs()
    {
        $blogs = Blog::latest()->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function createBlog()
    {
        return view('admin.blogs.create');
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
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
            'author' => auth()->user()->name ?? 'Admin',
            'status' => 'approved', // admin-created = auto approved
            'featured' => $request->featured ? 1 : 0,
        ]);

        return redirect()->route('admin.blogs.index');
    }

    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $blog->update([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'featured' => $request->featured ? 1 : 0,
            'status' => $request->status ?? $blog->status,
        ]);

        return redirect()->route('admin.blogs.index');
    }

    public function approveBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = 'approved';
        $blog->save();

        return back();
    }

    public function rejectBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = 'rejected';
        $blog->save();

        return back();
    }

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully');
    }
}
