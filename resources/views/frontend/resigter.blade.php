@extends('frontend.master')
@section('body')
<div class="row w-100">
            <div class="col col-md-4">

            </div>
            <div class="col-12 col-md-4 p-5">
                <form action="{{route('customer-resigter')}}" method="post">
                  @csrf
                    <div class="form-outline mb-4">
                        <div class="text-center mt-2 mb-4">
                            <img class="logo-header rounded" src="{{asset('/')}}fontend-asset/image/logo.png" alt="">
                        </div>
                    
                      <input type="text" name="name" required id="form2Example1" class="form-control" />
                      <label class="form-label" for="form2Example1">Your Name</label>
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                       
                    
                      <input type="email" name="email" required id="form2Example1" class="form-control" />
                      <label class="form-label" for="form2Example1">Email address</label>
                    </div>
                  
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" name="password" required id="form2Example2" class="form-control" />
                      <label class="form-label" for="form2Example2">Password</label>
                    </div>
                  
                    <!-- 2 column grid layout for inline styling -->
                   
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary1 btn-block mb-4">Resister</button>
                    </form>
                    <!-- Register buttons -->
                    <div class="text-center">
                      <p>Are you member? <a href="{{route('customer-login')}}">Login</a></p>
                      <p>or sign up with:</p>
                      <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-facebook-f"></i>
                      </button>
                  
                      <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-google"></i>
                      </button>
                  
                      <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                      </button>
                  
                      <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-github"></i>
                      </button>
                    </div>
                  
            </div>
            <div class="col col-md-4">

            </div>
        </div>

@endsection