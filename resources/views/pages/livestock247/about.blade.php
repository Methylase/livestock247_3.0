@extends('layouts.app')
  @section('content')
    <div class="wrapper-about">
        <div class="wrapper-about-content">
            <div class="row row-about-us">
                <div class="col-lg-6 col-md-6 col-12 my-auto col-about-us">
                    <div class="col-about-us-content">
                        <h5 class="text-success mb-2 about-us-main">ABOUT US</h5>
                        <h2 class="about-us-title">We are everything livestock</h2> 
                    </div>
                    
                </div>            
                <div class="col-lg-6 col-md-6 col-12 my-auto col-about-us">
                    <p class="about-us-content text-left">
                        This is a livestock247 powered initiative implemented in rural livestock communities
                        designed to bring convenient, qualitative primary healthcare to these communities
                        and their owners. Through our community sensitization and advocacy we are constantly
                        engaging with our beneficiaries for capacity building and knowledge sharing improvement.
                    </p>            
                </div>                                          
            </div>
            <div class="img-about-us">
                <div class="about-us-statistics">
                    <div class="statistics d-flex justify-content-around">
                        <div class="projects">
                            <h2 class="title display-5">5</h2>
                            <p class="content">
                                Projects
                            </p>  
                        </div>
                        <div class="traceable-animals">
                            <h2 class="title display-5">78K+</h2>
                            <p class="content">
                                Traceable animals
                            </p>  
                        </div>
                        <div class="total-vaccination">
                            <h2 class="title display-5">114+</h2>
                            <p class="content">
                                Total Vaccinations
                            </p>  
                        </div>
                    </div>
                    <div class="impression">
                        <div class="impression-1"></div>
                        <div class="impression-2"></div>
                    </div>
                </div>
            </div> 
            <div class="mission-vision-content">
                <div class="row row-mission-vsion">
                    <div class="col-lg-6 col-md-6 col-12 col-mission-vision">
                        <div class="our-mission">
                            <h5 class="our-mission-title text-success">OUR MISSION</h5>
                            <p class="our-mission-content">
                                To leverage technology to mitigate the spread of Zoonotic diseases
                                while also mainstreaming Africa's cattle business.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 col-mission-vison">
                        <div class="our-vision">
                            <h5 class="our-vision-title text-success">OUR VISION</h5>
                            <p class="our-vision-content">
                                To mitigate the spread of zoonotic diseases through the provision of 
                                fit-for-slaughter and traceable livestock to our customers.
                            </p>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="core-values-content">
                <h5 class="core-values-title">CORE VALUES</h5>
                <div class="row row-core">
                    <div class="col-lg-4 col-md-4 col-12 my-auto col-core-value">
                        <img src="{{asset('livestock247-template/img/core values/Innovation.svg')}}" class="img-core-value">
                        <h5 class="core-value-title">Team work</h5>
                        <p class="core-value-content">
                            We believe in strength of coming together as people to achieve a common goal.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 my-auto col-core-value">
                        <img src="{{asset('livestock247-template/img/core values/Safety.svg')}}" class="img-core-value">
                        <h5 class="core-value-title">Innovation</h5>
                        <p class="core-value-content">
                            We Innovate by taking intelligent risks toward the commitment of better service delivery.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 my-auto col-core-value-2">
                        <img src="{{asset('livestock247-template/img/core values/teamwork.svg')}}" class="img-core-value">
                        <h5 class="core-value-title">Safety</h5>
                        <p class="core-value-content">
                            In all our project and service, at all times, safety is our top priority.
                        </p>
                    </div>
                </div>
            </div> 
            <div class="our-team-content">
                <div class="row team-members-content">
                    <div class="col-lg-6 col-md-6 col-12 my-auto col-our-team">
                        <h5 class="our-team-title text-success">MEET OUR TEAM</h5>
                        <h2 class="our-team-subtitle">Meet our creative mindset team impacting Livestock value chain</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 my-auto col-our-team">
                        <p class="our-team-content">
                            To be a company our customers want us to be, it takes an electric and passionate
                            group of people. Get to know people leading the way at Livestock247.
                        </p>
                    </div>
                </div>
                <div class="row team-members-content-1">
                    <div class="team-member-content my-auto col-lg-4 col-md-4 col-12">                    
                        <img src="{{asset('livestock247-template/img/meet the team/Ayomide Oni.png')}}" class="w-100 img-fluid img-team">
                        <h5 class="team-title">Ayomide Oni</h5>
                        <p class="team-content">
                            Head of sales & marketing
                        </p>
                    </div>
                    <div class="team-member-content my-auto col-lg-4 col-md-4 col-12">                    
                        <img src="{{asset('livestock247-template/img/meet the team/Ugochi Izuora.png')}}" class="w-100 img-fluid img-team">
                        <h5 class="team-title">Ugochi Izuora</h5>
                        <p class="team-content">
                            Head of projects
                        </p>
                    </div>
                    <div class="team-member-content my-auto col-lg-4 col-md-4 col-12">                    
                        <img src="{{asset('livestock247-template/img/meet the team/Deborah Dairo.png')}}" class="w-100 img-fluid img-team">
                        <h5 class="team-title">Deborah Dairo</h5>
                        <p class="team-content">
                            Content strategist
                        </p>
                    </div>                
                </div>
                <div class="row team-members-content-2">
                    <div class="offset-md-2 offset-lg-2 col-lg-8 col-md-8 col-12">
                        <div class="row">
                            <div class="team-member-content my-auto col-lg-6 col-md-6 col-12">                    
                                <img src="{{asset('livestock247-template/img/meet the team/Blessing Aniekan.png')}}" class="w-100 img-fluid img-team">
                                <h5 class="team-title">Blessing Aniekan</h5>
                                <p class="team-content">
                                    Graphics designer
                                </p>
                            </div>
                            <div class="team-member-content my-auto col-lg-6 col-md-6 col-12">                    
                                <img src="{{asset('livestock247-template/img/meet the team/Gloria Paul.png')}}" class="w-100 img-fluid img-team">
                                <h5 class="team-title">Gloria Paul</h5>
                                <p class="team-content">
                                    Sales executive
                                </p>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>              
        </div>
    </div>   
@endsection              