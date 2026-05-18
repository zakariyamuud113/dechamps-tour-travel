<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Destination;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\AboutPage;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

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
        $totalMessages = ContactMessage::count();

        return view('admin.dashboard', compact(
            'bookings',
            'destinations',
            'totalBookings',
            'totalBlogs',
            'totalMessages'
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
            'featured' => $request->has('featured') ? 1 : 0,
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

        // featured checkbox handling
        $data['featured'] = $request->has('featured') ? 1 : 0;

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


// Admin Contact Messages Methods
    public function contactMessages()
    {
        $messages = ContactMessage::latest()->get();

        return view('admin.contacts.index', compact('messages'));
    }

    public function showContact($id)
    {
        $contact = ContactMessage::findOrFail($id);

        return view('admin.contacts.show', compact('contact'));
    }  
    
    public function markContactRead($id)
    {
        $contact = ContactMessage::findOrFail($id);

        $contact->status = 'read';

        $contact->save();

        return back()->with('success', 'Message marked as read.');
    }

    public function deleteContact($id)
    {
        $contact = ContactMessage::findOrFail($id);

        $contact->delete();

        return back()->with('success', 'Message deleted successfully.');
    }

// Admin About Page Methods
    public function aboutPage()
    {
        $about = AboutPage::first();

        return view('admin.about.edit', compact('about'));
    }

    public function editAbout()
    {
        $about = AboutPage::first(); // single record system

        return view('admin.about.edit', compact('about'));
    }

    public function updateAbout(Request $request)
    {
        $about = AboutPage::first();

        $about->update([
            'hero_title' => $request->hero_title,
            'hero_subtitle' => $request->hero_subtitle,
            'story_title' => $request->story_title,
            'story_content' => $request->story_content,
            'mission' => $request->mission,
            'vision' => $request->vision,
            'years_experience' => $request->years_experience,
            'happy_travelers' => $request->happy_travelers,
            'destinations_count' => $request->destinations_count,
            'tour_guides' => $request->tour_guides,
        ]);

        return back()->with('success', 'About page updated successfully');
    }   

// Admin Gallery Methods
    public function gallery()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function createGallery()
    {
        return view('admin.gallery.create');
    }

    public function storeGallery(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'title' => 'nullable|string',
            'category' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'image' => $path,
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'featured' => $request->featured ? 1 : 0,
        ]);

        return redirect()->route('admin.gallery')->with('success', 'Image uploaded');
    }

    public function deleteGallery($id)
    {
        $image = Gallery::findOrFail($id);
        $image->delete();

        return back()->with('success', 'Image deleted');
    }
}
