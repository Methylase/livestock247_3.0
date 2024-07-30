@extends('layouts.app')
    @section('content')
    <div class="wrapper-aims-hero d-flex align-items-center">
        <div class="wrapper-aims-hero-content">
            <h2 class="aims-hero-title display-4"> ANIMAL IDENTIFICATION MANAGMENT SYSTEM</h2>
        </div>
    </div>
    <div class="wrapper-aims">
        <div class="wrapper-aims-content">
            <div class="row row-aims-content">
                <div class="col-lg-6 col-md-6 col-12 my-auto col-aims-content">
                    <h5 class="text-success text-left mb-4 main-aims">AIMS</h5>
                    <h2 class="wrapper-aims-title text-left font-weight-bold"><span class="text-success">Traceability</span> from farm to plate</h2>
                    <p class="aims-content text-left">
                        With our traceability system in place, we are rest assured that traceability 
                        in the livestock value chain will reduce fraud, and ensure that livestock Products
                        are safe for human consumption.
                    </p> 
                    <div class="row row-aims">
                        <div class="col-lg-6 col-md-6 col-6 col-aims">
                            <h2 class="aims-statistics-title display-5">78,676+</h2>
                            <p class="aims-statistics-content">
                                Traceable animals
                            </p>                       
                        </div>
                        <div class="col-lg-6 col-md-6 col-6 col-aims">
                            <h2 class="aims-statistics-title display-5">114k+</h2>
                            <p class="aims-statistics-content">
                                Total vaccinations
                            </p>                     
                        </div>                    
                    </div>
                    <div class="row row-aims">
                        <div class="col-lg-6 col-md-6 col-6 col-aims">
                            <h2 class="aims-statistics-title display-5">21,670kg</h2>
                            <p class="aims-statistics-content">
                                Meat production volume
                            </p>                       
                        </div>
                        <div class="col-lg-6 col-md-6 col-6 col-aims">
                            <h2 class="aims-statistics-title display-5">5</h2>
                            <p class="aims-statistics-content">
                                projects
                            </p>                     
                        </div>                    

                    </div>                                 
                </div>            
                <div class="col-lg-6 col-md-6 col-12 my-auto text-center col-focus-content">
                    <img src="{{asset('livestock247-template/img/aims.png')}}" class="w-100 img-fluid img-aims">              
                </div>                                          
            </div> 
        </div>
    </div>
    <div class="wrapper-aims-features">
        <div class="wrapper-aims-features-content">        
            <div class="row row-aims-features">
                <div class="col-lg-4 col-md-4 col-12 my-auto col-aims-features">
                    <div class="col-aims-feature-content">
                        <h5 class="aims-feature-title">Identification</h5>
                        <p class="aims-feature-content">
                            Our animal identification and management system (AIMS) involves using ear tags or 
                            microchips to mark and track livestock animals, ensuring that each animal's
                            identity is recorded and stored in our animal identification system.
                        </p>
                    </div>                
                </div>
                <div class="col-lg-4 col-md-4 col-12 my-auto col-aims-features">
                    <div class="col-aims-feature-content">
                        <h5 class="aims-feature-title">Traceability</h5>
                        <p class="aims-feature-content">
                            Our platform has been designed to track the life of the livestock from
                            the point of meeting the livestock to the point of exit from the platform.
                            This helps to ensure food safety and prevention of the spread of zoonotic disease.
                        </p>
                    </div>                                
                </div>
                <div class="col-lg-4 col-md-4 col-12 my-auto col-aims-features">
                    <div class="col-aims-feature-content">
                        <h5 class="aims-feature-title">Management</h5>
                        <p class="aims-feature-content">
                            Our animal identification and management system keep an up-to-date record of all
                            identified livestock, tracking their history from birth to the last date of slaughter
                        </p>
                    </div>                
                </div>
            </div>                            
        </div>
    </div>
@endsection       