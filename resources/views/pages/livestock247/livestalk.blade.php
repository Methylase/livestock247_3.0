@extends('layouts.app')
  @section('content')
  <div class="wrapper-livestalk-hero">
  </div>
  <div class="wrapper-livestalk">
      <div class="wrapper-livestalk-content">
          <h5 class="text-success text-center main-title">LIVESTALK</h5>
          <h2 class="wrapper-livestalk-series-title text-center font-weight-bold">Let <span class="text-success">Talk</span> Livestock</h2>
              <div class="col-livestalk-content">
                  <p class="livestalk-content text-center">
                      This is our online conference and continuing education forum where issues
                      affecting the agricultural, especially livestock industry are discussed.
                      LivesTALK is an online, educational, peer to peer platform that serves to
                      answer livestock or agricultural related questions. It is a community of
                      engagement for livestock professionals, farmers, merchants and enthusiasts to engage in qualitative discussions.
                  </p>
                  <div class="text-center watch-series">
                  <a href="" class="btn btn-primary">Watch series</a>
                  </div>  
              </div>                                                              
      </div>
  </div>
  <div class="wrapper-livestalk-series">
      <div class="wrapper-livestalk-series-content">
        <h5 class="text-success mb-4 main-title">LIVETALK SERIES</h5>
        <h2 class="wrapper-livestalk-series-title font-weight-bold">Our most recent live talk series</h2>            
        <div class="row row-livestalk-series">
          <div class="col-lg-4 col-md-4 col-12 my-auto livestalk-series">
            <div class="col-livestalk-series">
              <img src="{{asset('livestock247-template/img/livestalk/livetalk 1.0.png')}}" class="img-livestalk-series">               
              <h5 class="pl-4 mb-2 impact-series-title">LIVETALK 1.0</h5>
              <p class="pl-4 livestalk-series-content">
                  There were various topics covered during the zoom conference.
              </p>
              <a href="" class="btn btn-primary btn-series">Watch</a>
            </div>               
          </div>
          <div class="col-lg-4 col-md-4 col-12 my-auto livestalk-series">
            <div class="col-livestalk-series">
              <img src="{{asset('livestock247-template/img/livestalk/livetalk 2.0.png')}}" class="img-livestalk-series">
              <h5 class="pl-4 mb-2 impact-series-title">LIVETALK 2.0</h5>
              <p class="pl-4 livestalk-series-content">
                  Provision of financial services in rural area and it impact on
                  security and economic development of small holder farmers in NIgeria.
              </p>
              <a href="" class="btn btn-primary btn-series">Watch</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12 my-auto livestalk-series">
            <div class="col-livestalk-series">
              <img src="{{asset('livestock247-template/img/livestalk/livetalk 3.0.png')}}" class="img-livestalk-series">
              <h5 class="pl-4 mb-2 impact-series-title">LIVETALK 3.0</h5>
              <p class="pl-4 livestalk-series-content">
                  Economic Development of Women in Africa: The role of Agriculture.
              </p>
              <a href="" class="btn btn-primary btn-series">Watch</a>
            </div>                
          </div>
        </div>
      </div>
    </div> 
@endsection    