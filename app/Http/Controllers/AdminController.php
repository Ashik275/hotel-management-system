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

        return redirect()->route('view_room')
            ->with('success', 'Room Added Successfully!');
    }

    public function view_room()
    {
        $rooms = Room::latest()->get();

        return view('admin.pages.view_room', compact('rooms'));
    }

    public function delete_room($id)
    {
        $room = Room::findOrFail($id);

        // Delete room image
        $imagePath = public_path('room_images/' . $room->image);

        if ($room->image && file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete room from database
        $room->delete();

        return redirect()->route('view_room')
            ->with('success', 'Room Deleted Successfully!');
    }

    public function edit_room($id)
    {
        $room = Room::findOrFail($id);

        return view('admin.pages.edit_room', compact('room'));
    }

    public function update_room(AddRoomRequest $request, $id)
    {
        $room = Room::findOrFail($id);

        $data = $request->validated();

        // Upload new image if selected
        if ($request->hasFile('room_image')) {

            // Delete old image
            $oldImage = public_path('room_images/' . $room->image);

            if ($room->image && file_exists($oldImage)) {
                unlink($oldImage);
            }

            // Upload new image
            $image = $request->file('room_image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('room_images'), $imageName);

            $data['image'] = $imageName;
        }

        // Update room data
        $room->update([
            'room_title' => $data['room_title'],
            'description' => $data['room_description'],
            'price' => $data['room_price'],
            'image' => $data['image'] ?? $room->image,
            'room_type' => $data['room_type'],
            'wifi' => $data['free_wifi'],
        ]);

        return redirect()->route('view_room')
            ->with('success', 'Room Updated Successfully!');
    }
}
