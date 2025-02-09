<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="{{asset("assets/css/bootstrap.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/css_style.css")}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <title>{{ $title ?? "home" }}</title>
        <style>
             .list-group-item-action{
                background-color: #fff
            }
            .list-group-item-action:hover{
                background-color: #007bff
            }
        </style>
        {{-- <style>
          .btn-purple{
            background-color: #6d31ed;
            color:white
          }
          .btn-purple:hover{
            background-color: white;
            color: #6d31ed;
            border-color: #6d31ed
          }
          .btn-purple-outline{
            background-color: white;
            color: #6d31ed;
            border-color: #6d31ed
            
          }
          .btn-purple-outline:hover{
            background-color: #6d31ed;
            color:white
            
          }
          .thumbs img {
    border: 2px solid #f0f0f0;
    cursor: pointer;
}

.thumbs img:hover {
    border-color: #007bff;
}

.product-details .badge {
    font-size: 0.9rem;
}

.product-details h2 {
    font-size: 2rem;
    font-weight: bold;
}

.product-details .price {
    font-size: 1.8rem;
    color: #6f42c1;
}

.product-details .star-rating {
    color: #ffc107;
    font-size: 1.2rem;
}

.product-details ul li {
    font-size: 0.9rem;
    margin-bottom: 5px;
}

.product-details ul li i {
    color: #28a745;
    margin-right: 10px;
}
.text-purpel{
  color: #6d31ed
}
.text-purpel:hover{
    color: #6f42c1
}
.bg-purpel{
    color: white;
  background-color: #6d31ed
}

.input-group .form-control {
            border-left: none;
            border-color: #6c757d;
            background-color: #fff; /* Background color */
            border-radius: 8px; /* Optional: Round the edges */
        }

        .input-group .btn {
            border: none;
            background-color: transparent; /* Make the button background transparent */
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #6c757d;
        }

        .form-select{
            border-color: #6c757d
        }
        .input-group .btn i {
            color: #6c757d; /* Icon color */
        }
        .input-group-text{
            border-right: none;
            border-color: #6c757d;
            
            background-color: #fff
            
        }
        .input-group-text:focus{
            border-color: #6c757d;
        }
        .input-group-text i{
           color: gray
        }

        .card-custom {
            border-radius: 2px;
            padding: 20px;
            background-color: #fff
        }
        .btn-custom {
            background-color: #6f42c1;
            color: white;
            border-radius: 30px;
        }
        .product-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 10px;
        }
        .voucher-input {
            border-radius: 20px;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 10px;
        }
        .custom-file-input {
            display: none; /* Hide the default file input */
        }
        .custom-file-label {
            cursor: pointer; /* Change cursor to pointer */
        }
        .delivery-option {
            padding: 15px;
            border-radius: 10px;
            border: 2px solid #ddd;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }
        .delivery-option.active {
            border-color: #6f42c1;
            background-color: #f9f1ff;
        }
        .testimonial-card {
        max-width: 500px;
        background-color: #fdf9ff;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px auto;
        border: none;
    }

    .user-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border: 3px solid #ffffff;
    }

    .testimonial-content h5 {
        margin-bottom: 10px;
        font-weight: bold;
    }

    .testimonial-content .rating i {
        margin-right: 2px;
    }

    .testimonial-content p {
        margin-top: 5px;
        color: #555555;
    }
        /* .radio-custom {
            display: none;
        }
        .radio-custom-label {
            cursor: pointer;
            margin-right: 15px;
            transition: color 0.3s ease;
        } */
        /* .radio-custom:checked + .radio-custom-label {
            color: #6f42c1;
        } */
        </style> --}}
       
        @livewireStyles
    </head>
    <body>
    
        <!-- Header -->
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-light py-0 sticky-top">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#"><img src="{{asset("assets/images/logo (2).png")}}" alt="logo"></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0  ">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/rooms">Rooms</a>
                      </li>
                      {{-- <li class="nav-item ">
                        <a class="nav-link " href="/profile" >
                            Profile
                        </a>
                       
                      </li> --}}
                      {{-- <li class="nav-item">
                        <a class="nav-link " href="/events"  >events</a>
                      </li> --}}
                      @auth
                      <a href="/logout" class= "nav-link">Logout</a >
                     
                      @endauth
                     
                    </ul>
                    <div class="d-flex  ">
                        @guest
                        
                            <a class="nav-link me-3" href="/login" >
                                Login
                            </a>
                           
                          
                          
                            <a class="nav-link me-3" href="/signup"  >Sign Up</a>
                          
                        @endguest
                      
                      @auth
                      
                    
                     
                        <a href="/profile" class= "btn me-1 "><i class="fas fa-user mx-1 "></i>{{auth()->user()->username}}</a >
                        
                        @endauth
                       
                    </div>
                  </div>
                </div>
            </nav>
        </header>
    
        <!-- Main Content -->
        <main class="container-fluid p-0 ">
        
            {{ $slot }}
        </main>
    
        <!-- Footer -->
      
    
        @livewireScripts
        <script>
            document.getElementById('list-group-item-action').addEventListener('click', function() {
                this.style.backgroundColor = "red";
            });
    // #007bff23
        </script>
    
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="{{asset("assets/js/bootstrap.bundle.min.js")}}"></script>
    </body>
</html>
