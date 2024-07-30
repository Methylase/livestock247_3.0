@extends('layouts.app')
  @section('content')
    <div class="wrapper-hoina-hero">
    </div>
    <div class="wrapper-hoina">
        <div class="wrapper-hoina-content">
            <div class="row row-hoina-content">
                <div class="col-lg-6 col-md-6 col-12 my-auto col-hoina-content">
                    <h5 class="text-success text-left mb-4 main-title">HOINA</h5>
                    <h2 class="wrapper-hoina-title text-left font-weight-bold">Livestock Primary <span class="text-success">Healthcare</span> at it's best</h2>
                    <p class="hoina-content">
                        This is a livestock247 powered initiative implemented in rural livestock communities
                        designed to bring convenient, qualitative primary healthcare to these communities
                        and their owners. Through our community sensitization and advocacy we are constantly
                        engaging with our beneficiaries for capacity building and knowledge sharing improvement.
                    </p> 
                    <a href="" class="btn btn-primary mt-1 contact-us">Contact us</a>                   
                </div>            
                <div class="col-lg-6 col-md-6 col-12 my-auto text-center col-focus-content">
                    <img src="{{asset('livestock247-template/img/hoina-healthcare.png')}}" class="w-100 img-hoina">              
                </div>                                          
            </div>                  
        </div>
    </div>
    <div class="wrapper-hoina-features">
        <div class="wrapper-hoina-features-content">        
            <div class="row row-hoina-feature">
                <div class="col-lg-4 col-md-4 col-12 my-auto col-hoina-feature">
                    <div class="col-hoina-feature-content">
                        <img src="{{asset('livestock247-template/img//hoina/medication.svg')}}" class="img-hoina">
                        <h5 class="hoina-feature-title">MEDICATION</h5>
                        <p class="hoina-feature-content">
                        Easy access to basic quality animal healthcare and medication
                        </p>
                    </div>                
                </div>
                <div class="col-lg-4 col-md-4 col-12 my-auto col-hoina-feature">
                    <div class="col-hoina-feature-content">
                        <img src="{{asset('livestock247-template/img/hoina/online market.svg')}}">
                        <h5 class="hoina-feature-title">ONLINE MARKET</h5>
                        <p class="hoina-feature-content">
                            Provision of access to an online market
                        </p>
                    </div>                                
                </div>
                <div class="col-lg-4 col-md-4 col-12 my-auto col-hoina-feature">
                    <div class="col-hoina-feature-content">
                        <img src="{{asset('livestock247-template/img/hoina/farmgate.svg')}}">
                        <h5 class="hoina-feature-title">FARM GATE</h5>
                        <p class="hoina-feature-content">
                            Farm gate management services
                        </p>
                    </div>                 
                </div>
            </div>
            <div class="row row-hoina-feature">
                <div class="col-lg-4 col-md-4 col-12 my-auto col-hoina-feature">
                    <div class="col-hoina-feature-content">
                        <img src="{{asset('livestock247-template/img/hoina/convenience.svg')}}">
                        <h5 class="hoina-feature-title">CONVENIENCE</h5>
                        <p class="hoina-feature-content">
                            Providing convenience
                        </p>
                    </div>                
                </div>
                <div class="col-lg-4 col-md-4 col-12 my-auto col-hoina-feature">
                    <div class="col-hoina-feature-content">
                        <img src="{{asset('livestock247-template/img/hoina/finance.svg')}}">
                        <h5 class="hoina-feature-title">FINANCE</h5>
                        <p class="hoina-feature-content">
                            Promoting financial inclusion
                        </p>
                    </div>                                 
                </div>
                <div class="col-lg-4 col-md-4 col-12 my-auto col-hoina-feature">
                    <div class="col-hoina-feature-content">
                        <img src="{{asset('livestock247-template/img/hoina/production.svg')}}">
                        <h5 class="hoina-feature-title">PRODUCTION</h5>
                        <p class="hoina-feature-content">
                            Encouraging sedentary production
                        </p>
                    </div>                 
                </div>
            </div>                            
        </div>
    </div>
    <div class="wrapper-gallery">
        <div class="wrapper-gallery-content">
            <h5 class="text-success text-center main-title">GALLERY</h5>
            <h2 class="wrapper-gallery-title text-center font-weight-bold">In the heart of the action</h2>
            <div class="row row-gallery-content">
                <div class="col-lg-6 col-md-6 col-12 my-auto col-gallery-content">
                    <div class="text-center">
                        <img src="{{asset('livestock247-template/img/gallery/gallery-1.png')}}" class="w-100 h-100 img-gallery-1" alt="" />
                    </div>   
                </div>            
                <div class="col-lg-6 col-md-6 col-12 my-auto col-gallery-content">
                    <div class="row row-gallery">
                        <div class="col-lg-12 col-md-12 col-12 col-gallery">
                            <div class="text-center">
                                <img src="{{asset('livestock247-template/img/gallery/gallery-2.png')}}" class="w-100 img-fluid img-gallery-2">
                            </div>  
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 col-gallery">
                            <div class="text-center">
                                <img src="{{asset('livestock247-template/img/gallery/gallery-3.png')}}" class="w-100 img-fluid img-gallery-3">
                            </div> 
                        </div>
                    </div>
                
                </div>                                        
            </div>                   
        </div>
    </div>
@endsection       