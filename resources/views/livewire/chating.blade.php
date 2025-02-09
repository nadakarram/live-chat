 <div class="col-md-12 d-flex flex-column"wire:poll style="height: 100vh;">
     <!-- Chat Header -->
     <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
         <div class="d-flex align-items-center">
             <a class="text-dark me-3" href="/"><i class="fas fa-arrow-left-long"></i></a>
             <img src="{{ asset('storage/' . $room->image) }}" class="rounded-circle me-3" width="40"
                 alt="Lori Ferguson">
             <div>
                 <h6 class="mb-0">{{ $room->name }}</h6>
                 <small class="text-success">{{ $room->room_type }}</small>
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
         @foreach ($massages as $massage)
             @if ($massage->sender_id == auth()->user()->id)
                 <div class="d-flex justify-content-end mb-3">
                     <div class="bg-primary text-white p-2 rounded-3" style="max-width: 60%;">
                         <p class="mb-0">{{ $massage->massage_text }}</p>
                         <small class="d-block text-end"> <?php $date = $massage->created_at; // Your date string
                         $formattedDate = date('g:i A', strtotime($date));
                         
                         echo $formattedDate;
                         ?></small>
                     </div>
                 </div>
             @else
                 <!-- Message from Lori -->
                 <div class="d-flex justify-content-start mb-3">
                     @foreach ($users as $user)
                         @if ($massage->sender_id == $user->id)
                             @if ($user->image == null)
                                 <button type="button" class="btn border-0" data-bs-toggle="modal"
                                     data-bs-target="#exampleModal{{ $user->id }}">
                                     <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center"
                                         style="width: 40px;height: 40px;"> <i class="fas fa-user"></i></div>
                                 </button>


                                 <!-- Modal -->
                                 <div class="modal fade border-0" id="exampleModal{{ $user->id }}"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                     <div class="modal-dialog d-flex justify-content-center">
                                         <div class="modal-content p-0 border-0 w-50">
                                            

                                             <div class="modal-body  p-0">
                                                 <div class="card p-0 bg-dark border-0 " style="height: 300px;">
                                                     <div
                                                         class="card-img-top p-0 position-relative bg-dark w-100 h-100">
                                                         <div class="bg-dark text-white top-0 position-absolute">
                                                             {{ $user->username }}</div>
                                                         <div
                                                             class="bg-secondary text-white  d-flex justify-content-center align-items-center w-100 h-100">
                                                             <i class="fas fa-user fs-1"></i></div>
                                                     </div>


                                                     <div class="card-body">
                                                         <div class="d-flex justify-content-around align-items-center">
                                                             <a href="/privatechating/{{ $user->id }}"><i
                                                                     class="fas fa-comment-sms text-white"></i></a>

                                                             <a><i class="fas fa-phone  text-white"></i></a>
                                                             <a><i class="fas fa-video  text-white"></i></a>
                                                             <a href=""> <i
                                                                     class="fas fa-info-circle  text-white"></i></a>
                                                         </div>

                                                     </div>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @else
                                 <button type="button" class="btn border-0" data-bs-toggle="modal"
                                     data-bs-target="#exampleModal{{ $user->id }}">
                                     <img src="{{ asset('storage/' . $user->image) }}" class="rounded-circle me-2"
                                         alt="Lori Ferguson" style="width: 40px;height: 40px;">
                                 </button>

                                 <!-- Modal -->
                                 <div class="modal fade border-0" id="exampleModal{{ $user->id }}"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                     <div class="modal-dialog d-flex justify-content-center">
                                         <div class="modal-content p-0 border-0 w-50">
                                             {{-- <div class="modal-header border-0">
                                                 <h5 class="modal-title" id="exampleModalLabel">
                              <img src="{{ asset('assets/images/logo (2).png') }}" alt="">
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div> --}}

                                             <div class="modal-body  p-0">

                                                 <div class="card p-0 bg-dark border-0 ">
                                                     <div class="card-img-top p-0 position-relative">
                                                         <div class="bg-dark text-white top-0 position-absolute">
                                                             {{ $user->username }}</div>
                                                         <img src="{{ asset('storage/' . $user->image) }}"
                                                             class="w-100 h-100" alt="Lori Ferguson">
                                                     </div>


                                                     <div class="card-body">
                                                         <div class="d-flex justify-content-around align-items-center">
                                                             <a href="/privatechating/{{ $user->id }}"><i
                                                                     class="fas fa-comment-sms text-white"></i></a>

                                                             <a><i class="fas fa-phone  text-white"></i></a>
                                                             <a><i class="fas fa-video  text-white"></i></a>
                                                             <a href=""> <i
                                                                     class="fas fa-info-circle  text-white"></i></a>
                                                         </div>

                                                     </div>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @endif
                         @endif
                     @endforeach

                     <div class="bg-light p-2 rounded-3" style="max-width: 60%;">
                         <p class="mb-0">{{ $massage->massage_text }}</p>
                         <small class="d-block text-end"> <?php $date = $massage->created_at; // Your date string
                         $formattedDate = date('g:i A', strtotime($date));
                         
                         echo $formattedDate;
                         ?></small>
                     </div>
                 </div>
             @endif
         @endforeach



         <!-- More messages... -->
     </div>

     <!-- Message Input -->
     <div class="border-top p-3">
         <form class="form" wire:submit="sendmassage">
             <div class="input-group ">


                 <input type="text" class="form-control" placeholder="Type a message" wire:model="massage_text">
                 <button class="btn btn-light"><i class="fas fa-paperclip"></i></button>
                 <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i></button>

             </div>
         </form>
     </div>
 </div>
