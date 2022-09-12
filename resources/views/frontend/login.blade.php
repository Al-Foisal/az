@extends('frontend.master')
@section('body')
 

<div class="row w-100">
            <div class="col col-md-4">

            </div>
            <div class="col-12 col-md-4 p-5">
                <form action="{{route('customer-login1')}}" method="post">
                  @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <div class="text-center mt-2 mb-4">
                            <img class="logo-header rounded" src="./fontend-asset/image/logo.png" alt="">
                        </div>
                    
                      <input type="email" name="email" id="form2Example1" class="form-control" />
                      <label class="form-label" for="form2Example1">Email address</label>
                    </div>
                  
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="form2Example2" class="form-control" />
                      <label class="form-label" for="form2Example2">Password</label>
                    </div>
                  
                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4 float-left">
                      <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check ">
                          <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                          <label class="form-check-label " for="form2Example31"> Remember me </label>
                        </div>
                      </div>
                  
                    
                    </div>
                  
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary1 btn-block mb-4">Sign in</button>
                    </form>
                    <!-- Register buttons -->
                    <div class="text-center">
                      <p>Not a member? <a href="{{route('customer-resigter')}}">Register</a></p>
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