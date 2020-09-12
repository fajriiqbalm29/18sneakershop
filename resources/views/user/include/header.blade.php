<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="/"><img src="{{asset('user/img/logo.png')}}" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
        </ul>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user" data-toggle="modal" data-target="#login"></i> Login |</a>
        </div>
        <div class="header__top__right__auth">
            <a href="#"> Register</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="/">Home</a></li>
            <li><a href="./shop-grid.html">Product</a></li>
            <li><a href="#">Profil</a>
               {{--  <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul> --}}
            </li>
            {{-- <li><a href="./blog.html">Blog</a></li> --}}
            <li><a href="./contact.html">About Us</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> 18senakershop@gmail.com</li>
            {{-- <li>Free Shipping for all Order of $99</li> --}}
        </ul>
    </div>
</div>

<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> 18sneakershop@gmail.com</li>
                            {{-- <li>Free Shipping for all Order of $99</li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        {{-- <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div> --}}
                        @if(Auth::check())
                         <div class="header__top__right__social">
                            <p><i class="fa fa-user"></i> {{Auth::user()->name}}</p>
                        </div>
                        <div class="header__top__right__social">
                            <a href="{{route('history')}}"><i></i> History Transaksi</a>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i></i> Logout</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        @else
                        <div class="header__top__right__social">
                            <a href="#" data-toggle="modal" data-target="#login"><i class="fa fa-user"></i> Login</a>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="#" data-toggle="modal" data-target="#register"><i></i> Register</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="/"><img src="{{asset('user/img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="{{route('index')}}">Product</a></li>
                        <li><a href="#">Promotion</a>
                            {{-- <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul> --}}
                        </li>
                        {{-- <li><a href="./blog.html">Blog</a></li> --}}
                        <li><a href="#">About Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>

<!-- Modal login-->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginLabel">LOGIN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" action="{{ route('login') }}">
        @csrf
      <div class="modal-body">
        <div class="form-group">
            <label>{{ __('E-Mail Address') }}</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
              </div>
              <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-describedby="basic-addon1">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label>{{ __('Password') }}</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
              </div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" aria-describedby="basic-addon1">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <hr>
        <small><a href="{{route('forgot')}}">Forgot password</a></small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal Register-->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="registerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" action="{{ route('register') }}">
        @csrf
      <div class="modal-body">
            <label>{{ __('Nama') }}</label>
        <div class="form-group">
           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
            <label>{{ __('E-Mail Address') }}</label>    
        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
            <label>{{ __('Password') }}</label>
        <div class="form-group">
           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <label>{{ __('Konfirmasi Password') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
      </div>
      </form>
    </div>
  </div>
</div>