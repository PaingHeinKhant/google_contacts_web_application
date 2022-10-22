<nav class="navbar-light py-2 bg-white  shadow-sm sticky-top" style="z-index: 100">
<div class="container-fluid ">
   <div class="row d-flex align-items-center">
       <div class="col-3">
           <a class="navbar-brand d-flex align-items-center mx-5" href="{{ url('/') }}">
               <div class="ms-2">
                   <i class="bi bi-person-fill text-light fs-1 rounded rounded-pill shadow py-1 px-2  bg-primary me-3"></i>
               </div>
               <h3>Contacts Web Application</h3>
           </a>

       </div>
       <div class="col-7">
           <form class="form d-flex" action="{{ route('contact.index') }}" method="get">
               <input class="form-control w-50 me-5"  name="keyword" value="{{request('keyword')}}" type="search" placeholder="Search"  required/>
               <button class="btn btn-primary">Search</button>
           </form>
       </div>
       <div class="col-2 ">
           <div class="me-5 pe-5" id="navbarSupportedContent">
               <!-- Left Side Of Navbar -->
               {{--        <ul class="navbar-nav me-auto">--}}
               {{--            --}}
               {{--        </ul>--}}


               <!-- Right Side Of Navbar -->
               <ul class="navbar-nav ms-auto">
                   <!-- Authentication Links -->
                   @guest
                       @if (Route::has('login'))
                           <li class="nav-item">
                               <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                           </li>
                       @endif

                       @if (Route::has('register'))
                           <li class="nav-item">
                               <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                           </li>
                       @endif
                   @else
                       <li class="nav-item dropdown">
                           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               {{ Auth::user()->name }}
                           </a>

                           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                   {{ __('Logout') }}
                               </a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                   @csrf
                               </form>
                           </div>
                       </li>
                   @endguest
               </ul>
           </div>
       </div>
   </div>
</div>
</nav>
