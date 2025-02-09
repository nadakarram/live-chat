<div class="container-fluid">
    <div class="row " style="height: 90vh">
      <!-- Active Chats Sidebar -->
      {{-- @livewire('roomslist') --}}
      {{-- <div> --}}
        <div class="col-md-3 p-3 bg-white border " style=" ">
            <h6 class="mb-3"> chats <span class="badge bg-success"></span></h6>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Search for chats">
            </div>
            
            <!-- Chat List -->
            <div class="list-group " style="height:420px;overflow-y: auto;scroll-behavior: smooth">
              <!-- Chat Item 1 -->

              @foreach ($rooms as $room )
              <div wire:click="getroom({{$room->id}})"  class="cursor-pointer mt-3 border-0 list-group-item list-group-item-action d-flex align-items-center" style="background-color:{{$color}}">
                <img src="{{ asset('storage/'.$room->image) }}" class="rounded-circle me-3" width="40" alt="Room Image">
                <div>
                    <strong class="fs-6">{{ $room->name }}</strong>
                    <div class="small text-muted">
                       room
                    </div>
                </div>
                <span class="badge bg-success ms-auto"></span>
            </div>
              @endforeach
              @foreach ($privatechats1 as $privatechat1 )
              @foreach ($users as $user)
              @if ($user->id==$privatechat1->user2_id)
              <a href="privatechating/{{$user->id}}"  class="cursor-pointer mt-3 border-0 list-group-item list-group-item-action d-flex align-items-center" style="background-color:{{$color}}">
                <img src="{{ asset('storage/'.$user->image) }}" class="rounded-circle me-3" width="40" alt="Room Image">
                <div>
                    <strong class="fs-6">{{ $user->username }}</strong>
                   
                </div>
                <span class="badge bg-success ms-auto"></span>
              </a>
                  
             
                  
              @endif
                
              @endforeach
            
              @endforeach
              @foreach ($privatechats2 as $privatechat2 )
              @foreach ($users as $user)
              @if ($user->id==$privatechat2->user1_id)
              <a  href="privatechating/{{$user->id}}" class="cursor-pointer mt-3 border-0 list-group-item list-group-item-action d-flex align-items-center" style="background-color:{{$color}}">
                <img src="{{ asset('storage/'.$user->image) }}" class="rounded-circle me-3" width="40" alt="Room Image">
                <div>
                    <strong class="fs-6">{{ $user->username }}</strong>
             
                </div>
                <span class="badge bg-success ms-auto"></span>
              </a>
                  
             
                  
              @endif
                
              @endforeach

              @endforeach


    
    
      
            </div>
          </div>
      
    
          {{-- </div> --}}
      
          <!-- Chat Messages Section -->
      
          <div class="col-md-9 d-flex flex-column " >
        {{$page}}
      @livewire($page,["data",$data])
      </div>
      {{-- <div class="col-md-9 d-flex flex-column" style="height: 100vh;">
        <!-- Chat Header -->
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
          <div class="d-flex align-items-center">
            <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="Lori Ferguson">
            <div>
              <h6 class="mb-0">Lori Ferguson</h6>
              <small class="text-success">Online</small>
            </div>
          </div>
          <div>
            <button class="btn btn-light"><i class="fas fa-phone"></i></button>
            <button class="btn btn-light"><i class="fas fa-video"></i></button>
          </div>
        </div>
  
        <!-- Messages Body -->
        <div class="flex-grow-1 overflow-auto p-3" style="background-color: #f5f5f5;">
          <!-- Message from You -->
          <div class="d-flex justify-content-end mb-3">
            <div class="bg-primary text-white p-2 rounded-3" style="max-width: 60%;">
              <p class="mb-0">And sir dare view but over man So at within mr to simple assure Mr disposing.</p>
              <small class="d-block text-end">2:29 PM</small>
            </div>
          </div>
  
          <!-- Message from Lori -->
          <div class="d-flex justify-content-start mb-3">
            <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="Lori Ferguson">
            <div class="bg-light p-2 rounded-3" style="max-width: 60%;">
              <p class="mb-0">Traveling alteration impression 😑 six all uncommonly Chamber hearing inhabit joy highest private.</p>
              <small class="d-block text-muted">2:29 PM</small>
            </div>
          </div>
  
          <!-- More messages... -->
        </div>
  
        <!-- Message Input -->
        <div class="border-top p-3">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Type a message">
            <button class="btn btn-light"><i class="fas fa-paperclip"></i></button>
            <button class="btn btn-primary"><i class="fas fa-paper-plane"></i></button>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
  
  <!-- Include FontAwesome for icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  