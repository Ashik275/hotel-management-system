     @extends('admin.layouts.app')

     @section('content')
          <div class="col-lg-12">
                <div class="block">
                  <div class="title"><strong>Create Room</strong></div>
                  <div class="block-body">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Room Titile</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="room_title" id="room_title">
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Room Description</label>
                        <div class="col-sm-9">
                          <textarea name="room_description" id="room_description" class="form-control"></textarea>
                        </div>
                      </div>
                        <div class="line"></div>
                       <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Room Price</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="room_price" id="room_price">
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Room Image</label>
                        <div class="col-sm-9">
                          <input type="file" name="room_image" class="form-control">
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Room Type</label>
                        <div class="col-sm-9">
                          <select name="room_type" class="form-control mb-3 mb-3">
                            <option value="regular">Regular</option>
                            <option value="preamium">Preamium</option>
                            <option value="deluxe">Deluxe</option>
                          </select>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Free Wifi</label>
                        <div class="col-sm-9">
                          <select name="free_wifi" class="form-control mb-3 mb-3">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-9 ml-auto">
                          <button type="submit" class="btn btn-secondary">Cancel</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
     @endsection