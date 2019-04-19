<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" >
    <title>Broad Street Valuations</title>
  </head>
  <body>
    <?php $origin=session('origin_form'); ?>
    <!-- container wrapper -->
    <div class="container">
        
        <header class="header">
            <!-- top-section -->
            <div class="top-section">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                          <a href="/home"><img src="img/logo.png" alt="logo"  > </a>
                        </div>
                    </div>  
                    <div class="col-lg-8 col-md-12 d-flex align-items-center justify-content-lg-end justify-content-md-start">
                          
                          <form method="post" action="{{ route('login') }}" id="loginform">
                          <!-- login form  -->
                          @if (($message = Session::get('error')) && $origin=='login')
                            <div class="alert alert-danger alert-block">
                              <button type="button" class="close" data-dismiss="alert">x</button>
                              <strong>{{$message}}</strong>
                            </div> 
                          @endif
                        
                          @if (count($errors) >0 && $origin=='login')
                              <div class="alert alert-danger">
                                  <ul>
                                    @foreach($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                    @endforeach  
                                  </ul>
                              </div>  
                          @endif 

                           {{ csrf_field() }}
                            <div class="form-row ">
                              <div class="col-auto">
                                <label class="sr-only" for="Email">{{ __('E-Mail Address') }}</label>
                                <input type="Email" class="form-control mb-2{{ $errors->has('email') && $origin=='login' ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" id="Email" placeholder="Email">
                                
                              </div>
                              <div class="col-auto">
                                <label class="sr-only" for="PassWord">{{ __('Password') }}</label>
                                <input type="password" class="form-control mb-2{{ $errors->has('password') && $origin=='login' ? ' is-invalid' : '' }}" name="password" id="PassWord" placeholder="****">
                              </div>
                              <div class="col-auto">
                                <button type="submit" class="btn btn-brown mb-2">{{ __('Login') }}</button>
                              </div>
                            </div>
                            <p  class="small-text">Forgot Password?  <a href="#">Click Here</a></p>
                          </form>
                        <!-- ./login form -->

                    </div> 


                 </div> 
            </div>
            <!-- ./top-section -->

            <div class="register-section">
                <div class="row">
                    <div class="col">
                      <div class="d-flex justify-content-lg-end justify-content-md-start align-items-center">
                          <span>register now! </span>
                         <a href="client" class="btn btn-brown mr-1">lender/client registration</a>
                         <a href="appraiser" class="btn btn-brown mr-1">appraiser registration</a>
                      </div>   
                    </div>  
                </div>  
            </div>  


        </header>


        <!-- main-nav -->
        <nav class="nav nav-pills nav-fill main-nav">
         
          <a class="nav-item nav-link {{ Request::url() == url('/home') ? 'active' : '' }}" href="home">Home</a>

           <a class="nav-item nav-link {{ Request::url() == url('/company') ? 'active' : '' }}" href="company">Company</a>

           <a class="nav-item nav-link {{ Request::url() == url('/products') ? 'active' : '' }}" href="products">products</a>

           <a class="nav-item nav-link {{ Request::url() == url('/technology') ? 'active' : '' }}" href="technology">technology</a>
          
          <a class="nav-item nav-link {{ Request::url() == url('/advantages') ? 'active' : '' }}" href="advantages">advantages</a>

          <a class="nav-item nav-link {{ Request::url() == url('/licenses') ? 'active' : '' }}" href="licenses">licenses</a>
         

         <a class="nav-item nav-link {{ Request::url() == url('/contact') ? 'active' : '' }}" href="contact">contact us</a>
          
         
        </nav>
        <!-- ./main-nav -->