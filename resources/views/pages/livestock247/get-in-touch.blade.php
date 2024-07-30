@extends('layouts.app')
    @section('content')    
    <div class="wrapper-get-in-touch">
        <div class="wrapper-how-content">
            <div class="row row-how">
                <div class="col-lg-6 col-md-6 col-12 col-how">
                    <h5 class="text-success text-left mb-4 main-title">GET SOLUTIONS</h5>
                    <h2 class="wrapper-get-in-touch-title">GET IN TOUCH</h2>
                    <p class="get-in-touch-content">
                        If you have any questions about livestock247 or you feel we could work together, kindly contact us
                    </p>                
                </div>            
                <div class="col-lg-6 col-md-6 col-12 col-how">
                    <div class="get-in-touch-container">
                    @if(session()->has('successMessage'))
                        <p class="text-success my-2">
                            {{session('successMessage')}}
                        </p>
                    @endif
                    @if(session()->has('failureMessage'))
                        <p class="text-success my-2">
                            {{session('failureMessage')}}
                        </p>
                    @endif

                        <form action="{{route('get-in-touch')}}" method="POST" >
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="message-type" class="control-label">Choose message type</label>
                                <select name="message_type" id="" class="form-control">
                                   <option value="">Select message type</option>
                                    <option value="partnership">Partnership</option>
                                    <option value="complain">Complain</option>
                                    <option value="awareness">Awareness</option>
                                    <option value="others">Others</option>
                                </select>
                                <span class="text-danger">
                                    @if($errors->has('message_type'))
                                    {{ $message_type=$errors->first('message_type')}}
                                    @else
                                    {{$message_type=''}}
                                    @endif
                                </span> 
                            </div>
                            <div class="form-group">
                                <label for="your-name" class="control-label">Your name</label>
                                <input type="text" name="your_name" class="form-control">
                                <span class="text-danger">
                                    @if($errors->has('your_name'))
                                    {{ $your_name=$errors->first('your_name')}}
                                    @else
                                    {{$your_name=''}}
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="company-name" class="control-label">Company's name</label>
                                <input type="text" name="company_name" class="form-control">
                                <span class="text-danger">
                                    @if($errors->has('company_name'))
                                    {{ $company_name=$errors->first('company_name')}}
                                    @else
                                    {{$company_name=''}}
                                    @endif
                                </span>                                
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" name="email" class="form-control">
                                <span class="text-danger">
                                    @if($errors->has('email'))
                                    {{ $email=$errors->first('email')}}
                                    @else
                                    {{$email=''}}
                                    @endif
                                </span>                                
                            </div>
                            <div class="form-group">
                                <label for="phone-number" class="control-label">Phone number</label>
                                <input type="text" name="phone_number" class="form-control">
                                <span class="text-danger">
                                    @if($errors->has('phone_number'))
                                    {{ $phone_number=$errors->first('phone_number')}}
                                    @else
                                    {{$phone_number=''}}
                                    @endif
                                </span>                                
                            </div> 
                            <div class="form-group">
                                <label for="message" class="control-label">Your message</label>
                                <textarea name="your_message" class="form-control" id="" cols="30" rows="5" placeholder="Type your message" ></textarea>
                            </div>  
                            <input type="submit" value="Send message" class="btn btn-primary btn-block">                                             
                        </form>
                    </div>         
                </div>                                          
            </div>                  
        </div>
    </div>
@endsection    