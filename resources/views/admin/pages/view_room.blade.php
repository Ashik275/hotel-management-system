     @extends('admin.layouts.app')

     @section('content')

     <div class="m-2">
         <div class="title">
             <strong>Hotel Rooms</strong>
         </div>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">

        {{ session('success') }}

        <button type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
@endif

         <div class="table-responsive">
             <table class="table table-striped table-bordered">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>Room Image</th>
                         <th>Room Title</th>
                         <th>Description</th>
                         <th>Price</th>
                         <th>Room Type</th>
                         <th>Free Wifi</th>
                         <th>Action</th>
                     </tr>
                 </thead>

                 <tbody>
                     @forelse($rooms as $room)
                     <tr>
                         <th scope="row">{{ $loop->iteration }}</th>

                         <td>
                             <img src="{{ asset('room_images/'.$room->image) }}"
                                 width="80"
                                 height="60"
                                 style="object-fit: cover; border-radius: 5px;"
                                 alt="Room Image">
                         </td>

                         <td>{{ $room->room_title }}</td>

                         <td>{{ $room->description }}</td>

                         <td>৳{{ $room->price }}</td>

                         <td>{{ ucfirst($room->room_type) }}</td>

                         <td>{{ ucfirst($room->wifi) }}</td>

                         <td>
                             <a href=""
                                 class="btn btn-sm btn-primary"
                                 title="Edit">
                                 <i class="fa fa-edit"></i>
                             </a>

                             <form action="{{ route('delete_room', $room->id) }}"
                                 method="POST"
                                 style="display:inline;"
                                 onsubmit="return confirm('Are you sure you want to delete this room?')">

                                 @csrf
                                 @method('DELETE')

                                 <button type="submit" class="btn btn-danger btn-sm">
                                     <i class="fa fa-trash"></i>
                                 </button>

                             </form>
                         </td>
                     </tr>
                     @empty
                     <tr>
                         <td colspan="8" class="text-center">
                             No Rooms Found!
                         </td>
                     </tr>
                     @endforelse
                 </tbody>
             </table>
         </div>
     </div>

     @endsection