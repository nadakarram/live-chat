<div>
    <div class="col-md-3 p-3 bg-white border " style=" ">
        <h6 class="mb-3">Active chats <span class="badge bg-success">6</span></h6>
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Search for chats">
        </div>
        
        <!-- Chat List -->
        <div class="list-group " style="height:420px;overflow-y: auto;scroll-behavior: smooth">
          <!-- Chat Item 1 -->
          @foreach ($rooms as $room )
          <a wire:click.prevent="chatroom({{ $room->id }})" wire:key="room-{{ $room->id }}" class="mt-3 border-0 list-group-item list-group-item-action d-flex align-items-center">
            <img src="{{ asset('storage/'.$room->image) }}" class="rounded-circle me-3" width="40" alt="Room Image">
            <div>
                <strong class="fs-6">{{ $room->name }}</strong>
                <div class="small text-muted">
                    {{ strlen($room->description) > 19 ? substr($room->description, 0, 24) . '...' : $room->description }}
                </div>
            </div>
            <span class="badge bg-success ms-auto"></span>
        </a>
          @endforeach


  
        </div>
      </div>
  
</div>

