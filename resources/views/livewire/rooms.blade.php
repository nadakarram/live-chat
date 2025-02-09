<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4>Rooms {{$massage}}</h4>
      <div class="d-flex align-items-center">
        <select class="form-select me-3" style="width: auto;">
          <option selected>Alphabetical</option>
          <option value="1">Most Popular</option>
          <option value="2">Recently Added</option>
        </select>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Create Room
        </button>
       
        <!-- Modal -->
        <div class="modal fade modal-lg" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <img src="{{ asset('assets/images/logo (2).png') }}" alt="">
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="createroom">
                            <div class="form-group mt-3">
                                <label for="name" class="form-label">Room Name</label>
                                <input type="text" class="form-control" id="name" wire:model="name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="description" class="form-label">Room Description</label>
                                <textarea placeholder="Describe your room (optional)" id="description" class="form-control p-2 w-100" cols="60" rows="7" wire:model="description"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
        
                            <div class="form-group mt-3">
                                <label for="image" class="form-label">Room Image</label>
                                <input type="file" class="form-control" id="image" wire:model="image">
                                @error('room_image') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
        
                            <div class="d-flex mt-3">
                                <label for="room_type" class="form-label">Select Type</label>
                                <select id="room_type" class="form-control w-50 ms-5" wire:model="room_type">
                                    <option value="">Choose room type</option>
                                    <option value="private">Private</option>
                                    <option value="public">Public</option>
                                </select>
                                @error('room_type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
        
                            <input type="submit" class="btn btn-outline-primary mt-3"  data-bs-dismiss="modal" value="Create">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
      </div>
    </div>
  
    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4" id="groupTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="friends-groups-tab" data-bs-toggle="tab" data-bs-target="#friends-groups" type="button" role="tab">Friends' groups</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="suggested-tab" data-bs-toggle="tab" data-bs-target="#suggested" type="button" role="tab">Suggested for you</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="popular-tab" data-bs-toggle="tab" data-bs-target="#popular" type="button" role="tab">Popular near you</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="more-suggestions-tab" data-bs-toggle="tab" data-bs-target="#more-suggestions" type="button" role="tab">More suggestions</button>
      </li>
    </ul>
    @if ($massage!="")
    <div class="alert alert-warning d-flex justify-content-between lert-dismissible fade show">
        {{$massage}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>   
    @endif
    
  
    <!-- Group Cards -->
    <div class="row p-5">
        @foreach ($rooms as $room)
        <div class="col-md-4 mb-3 ">
            <div class="card shadow-sm position-relative">
              <img src="{{asset("storage/".$room->image)}}"  class="card-img-top "  alt="Group Image" style="height:120px;object-fit:cover;">
              <div class="card-body text-center">
                <div style="top: 25%; left: 43%;" class="d-flex position-absolute  justify-content-center align-items-center mb-2">
                  <div class="rounded-circle bg-success text-white p-2">
                    <i class="fas fa-comments"></i>
                  </div>
                </div>
                <h5 class="card-title">{{$room->name}}</h5>

                <p class="text-muted"><i class="
                    @if ($room->room_type=="private")
                      fas fa-lock  
                    @else
                    fas fa-globe
                        
                    @endif
                   "></i> {{$room->room_type}} Room</p>
                <div class="d-flex justify-content-between">
                  <span>
                    <?php
                        $member_number=0
                        ?>
                    @foreach ($rooms_member as $member )
                    @if ($member->room_id==$room->id)
                    <?php $member_number++?>
                        
                    @endif
                        
                    @endforeach
                    {{-- {{room_member_number($room->id)}} --}}
                    
                    {{$member_number}} Members</span>
                  {{-- <span>20 Posts per day</span> --}}
                </div>
                <div class="mt-3 d-flex align-items-center">
                  
                  <div class="bg-secondary text-white rounded-circle d-flex me-3 justify-content-center align-items-center"
                  style="width: 40px;height: 40px;"> <i class="fas fa-user"></i></div>
                
                  <div class="bg-secondary text-white rounded-circle d-flex me-3 justify-content-center align-items-center"
                  style="width: 40px;height: 40px;"> <i class="fas fa-user"></i></div>
                  <div class="bg-secondary text-white rounded-circle d-flex me-3 justify-content-center align-items-center"
                  style="width: 40px;height: 40px;"> <i class="fas fa-user"></i></div>
                
                  <span class="text-muted">+  {{$member_number}}</span>
                </div>
                {{-- dvider --}}
                <hr>
                <div class="d-flex justify-content-center align-items-center">
                    <button class="btn btn-primary" wire:click="joinroom({{$room->id}})">Join Room</button>
                </div>
              </div>
            </div>
          </div>
            
        @endforeach
     
  
      <!-- Repeat more group cards as necessary -->
    </div>
  </div>
  
  <!-- Include FontAwesome for icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  