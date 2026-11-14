<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('home.index');
            } elseif ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        return view('home.index');
    }

    public function create_room()
    {
        return view('admin.pages.create_room');
    }

    public function add_room(AddRoomRequest $request)
    {
        $data = $request->validated();
        // Upload room image

        // Upload image
        if ($request->hasFile('room_image')) {

            $image = $request->file('room_image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Create folder if not exists
            if (!file_exists(public_path('room_images'))) {
                mkdir(public_path('room_images'), 0755, true);
            }

            // Move uploaded image
            $image->move(public_path('room_images'), $imageName);

            $data['image'] = $imageName;
        }

        // Save room data
        Room::create([
            'room_title' => $data['room_title'],
            'description' => $data['room_description'],
            'price' => $data['room_price'],
            'image' => $data['image'],
            'room_type' => $data['room_type'],
            'wifi' => $data['free_wifi'],
        ]);

        return redirect()->back()->with('success', 'Room Added Successfully!');
    }
}
