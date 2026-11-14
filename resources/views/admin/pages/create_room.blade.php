     @extends('admin.layouts.app')

     @section('content')
     <div class="col-lg-12">
       <div class="block">
         <div class="title"><strong>Create Room</strong></div>
         @if(session('success'))
         <div class="alert alert-success">
           {{ session('success') }}
         </div>
         @endif
         <div class="block-body">
           <form method="post" action="{{ route('add_room') }}"
             class="form-horizontal" enctype="multipart/form-data">

             @csrf

             <div class="form-group row">
               <label class="col-sm-3 form-control-label">Room Title</label>
               <div class="col-sm-9">
                 <input type="text"
                   class="form-control @error('room_title') is-invalid @enderror"
                   name="room_title"
                   value="{{ old('room_title') }}">

                 @error('room_title')
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
               </div>
             </div>

             <div class="line"></div>

             <div class="form-group row">
               <label class="col-sm-3 form-control-label">Room Description</label>
               <div class="col-sm-9">
                 <textarea name="room_description"
                   class="form-control @error('room_description') is-invalid @enderror">{{ old('room_description') }}</textarea>

                 @error('room_description')
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
               </div>
             </div>

             <div class="line"></div>

             <div class="form-group row">
               <label class="col-sm-3 form-control-label">Room Price</label>
               <div class="col-sm-9">
                 <input type="text"
                   class="form-control @error('room_price') is-invalid @enderror"
                   name="room_price"
                   value="{{ old('room_price') }}">

                 @error('room_price')
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
               </div>
             </div>

             <div class="line"></div>

             <div class="form-group row">
               <label class="col-sm-3 form-control-label">Room Image</label>
               <div class="col-sm-9">
                 <input type="file"
                   name="room_image"
                   class="form-control @error('room_image') is-invalid @enderror">

                 @error('room_image')
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
               </div>
             </div>

             <div class="line"></div>

             <div class="form-group row">
               <label class="col-sm-3 form-control-label">Room Type</label>
               <div class="col-sm-9">
                 <select name="room_type"
                   class="form-control @error('room_type') is-invalid @enderror">

                   <option value="regular" {{ old('room_type') == 'regular' ? 'selected' : '' }}>Regular</option>
                   <option value="preamium" {{ old('room_type') == 'preamium' ? 'selected' : '' }}>Premium</option>
                   <option value="deluxe" {{ old('room_type') == 'deluxe' ? 'selected' : '' }}>Deluxe</option>

                 </select>

                 @error('room_type')
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
               </div>
             </div>

             <div class="line"></div>

             <div class="form-group row">
               <label class="col-sm-3 form-control-label">Free Wifi</label>
               <div class="col-sm-9">
                 <select name="free_wifi"
                   class="form-control @error('free_wifi') is-invalid @enderror">

                   <option value="yes" {{ old('free_wifi') == 'yes' ? 'selected' : '' }}>Yes</option>
                   <option value="no" {{ old('free_wifi') == 'no' ? 'selected' : '' }}>No</option>

                 </select>

                 @error('free_wifi')
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
               </div>
             </div>

             <div class="form-group row">
               <div class="col-sm-9 ml-auto">
                 <button type="reset" class="btn btn-secondary">Cancel</button>
                 <button type="submit" class="btn btn-primary">Save changes</button>
               </div>
             </div>

           </form>
         </div>
       </div>
     </div>
     @endsection