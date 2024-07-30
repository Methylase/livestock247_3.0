<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Livestock247 - {{$title}}</title>
    <link rel="icon" href="{{asset('livestock247-template/img/desktop logo.png')}}" type="image/icon type" sizes ="25x25">
    <link rel="stylesheet" href="{{asset('livestock247-template/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('livestock247-template/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('livestock247-template/font-awesome/css/font-awesome.min.css')}}">
    <script src="{{asset('livestock247-template/js/jquery.js')}}"></script> 
    <script src="{{asset('livestock247-template/js/bootstrap.min.js')}}"></script> 

  </head>
  <body>
    <div class="wrapper-menu fixed-top">
      <div class="wrapper-menu-content">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('livestock247-template/img/desktop logo.png')}}" width="100%" height="25" ></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse adjust-menu navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link {{(request()->is('meat247')) ? 'active': ''}}" href="{{route('meat247')}}">Meat247</a>
              <a class="nav-item nav-link {{(request()->is('hoina')) ? 'active': ''}}" href="{{route('hoina')}}">Hoina</a>
              <a class="nav-item nav-link {{(request()->is('aims')) ? 'active': ''}}" href="{{route('aims')}}">Aims</a>
              <a class="nav-item nav-link {{(request()->is('livestalk')) ? 'active': ''}}" href="{{route('livestalk')}}">Livestalk</a>
              <a class="btn btn-primary touch-btn" href="{{route('get-in-touch')}}" role="button">Get in touch</a>
            </div>
          </div>
        </nav>
      </div>

    </div>
    <div class="content-wrapper"> 
        @yield('content')  

        <div class="wrapper-footer">
    <div class="wrapper-footer-content">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-12 my-auto">
          <a href=""><img src="{{asset('livestock247-template/img//footer logo.svg')}}" width="50px" height="25" class="mb-2 img-footer"></a>
          <p class="footer-content">
            Mitigating the spread of zoonotic diseases through the provision of 
            fit-for-slaughter and traceable livestock to our customers.
          </p>
        </div>
        <div class="col-lg-6 col-md-6 col-12 my-auto col-footer-content">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12">  
              <ul class="list-footer">
                <li><h5 class="font-weight-bold">Product</h5></li>
                <li><a href="{{route('meat247')}}">Meat247</a></li>
                <li><a href="{{route('aims')}}">Aims</a></li>
                <li><a href="{{route('hoina')}}">Hoina</a></li>
              </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
              <ul class="list-footer">
                <li><h5 class="font-weight-bold">Company</h5></li>
                <li><a href="{{route('about-us')}}">About</a></li>
                <li><a href="{{route('get-in-touch')}}">Contact us</a></li>
              </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
              <ul class="list-footer">
                <li><h5 class="font-weight-bold" >Publications</h5></li>
                <li><a href="{{route('faq')}}">FAQs</a></li>
                <li><a href="{{route('blogs')}}">Blog</a></li>

              </ul>
            </div>
          </div>                
        </div>
        <div class="col-lg-3 col-md-3 col-12 connect-container">
          <h5 class="mb-3 connect font-weight-bold">Connect with Us</h5>
          <p class="mb-2 connect">
            <a href="https://www.facebook.com/livestock247ng"><i class="fa fa-facebook social-media-icon text-center"></i></a> 
            <a href="https://www.twitter.com/in/livestock247ng"><i class="fa fa-twitter social-media-icon"></i></a>
            <a href="https://www.linkedin.com/in/livestock247/"><i class="fa fa-linkedin social-media-icon"></i></a>
            <a href="https://www.youtube.com/channel/UCYSw3HTXyWbc1rFKhlifK8Q"><i class="fa fa-youtube social-media-icon"></i></a>
            <a href="https://www.instagram.com/livestock247ng/"><i class="fa fa-instagram social-media-icon"></i></a>
          </p>
          <div class="connect">
            <label>Lagos Office:</label>
            <label>4th Floor Valley View Plaza 99, Opebi Road Ikeja, Lagos - Nigeria.</label>
            <label>Abuja Office:</label>
            <label>28A Ganges Maitama Abuja</label>
            <label>0906-290-3550 support@livestock247.com</label>
          </div>

        </div>            
      </div>
      <hr class="out-line">
      <div class="footer-bottom">
        <span class="all-right">
          copy ©  {{$date}} All Right Reserved
        </span>
        <span class="back-to-top btn" >
        <svg viewBox="0 0 1024 1024" width="12px" height=12px class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#D0D0D0">
          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
          <g id="SVGRepo_iconCarrier"><path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="#D0D0D0"></path></g>
        </svg>
          Back to Top
        </span>
      </div>
    </div>
  </div>
</div>  
<script>
    window.scrollY
    $(window).scroll(function() {
      //var solutions = document.getElementsByClassName("wrapper-solutions");
      const observer = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
              if (entry.isIntersecting) {
                  entry.target.classList.add('in-view');
                  entry.target.classList.remove('not-in-view');
              }else {
                  entry.target.classList.remove('in-view');
                  entry.target.classList.add('not-in-view');
              }
              
          })
        },{ 
          rootMargin: "0px",
          threshold: [0,0.1,1]
        }
      );  

      //const tags = document.querySelectorAll('div,img,p,h2,h3,h5,a,i,label,select,input,textarea');
      const tags = document.querySelectorAll(
        '.wrapper-hero,.wrapper-hero-content,.row-hero,'+
        '.col-hero,.hero-title,.hero-content,'+
        '.img-container,.img-hero,.wrapper-solutions-content,'+
        '.solution-content-title-1,.solution-content-title-2,'+
        '.row-solution,.col-solution,.img-consultancy,.col-solution-content,'+
        '.img-platform,.img-technology,.wrapper-products,'+
        '.wrapper-products-content,.main-title,.wrapper-product-title,'+
        '.row-product,.col-product,.product-title,.product-content,.img-product,'+
        '.col-product-content,.read-more,.wrapper-everything,.wrapper-everything-content,'+
        '.wrapper-everything-main,.wrapper-everything-main,.wrapper-everything-title,'+
        '.row-everything,.col-everything,.everything-content-1,.everything-content-2,'+
        '.everything-content-2 > li,.img-everything,.mt-1,.sensitization,'+
        '.sensitization-content,.sensitization-title,.wrapper-impact-series,'+
        '.wrapper-impact-series-content,.wrapper-impact-series-main,.wrapper-impact-series-title,'+
        '.row-impact,.col-impact,.col-impact-series-content,.img-impact-series,'+
        '.impact-series-title,.impact-series-content,.wrapper-statistics,.wrapper-statistics-content,'+
        '.wrapper-statistics-main,.wrapper-statistics-title,.row-statistics,.col-statistics,'+
        '.statistics-content,.statistics-title,.wrapper-partners-content,.wrapper-partners-content,'+
        '.wrapper-partners,.wrapper-partners-content,.partners-title,.row-partner-content,'+
        '.row-partner-content-1,.col-partner,.img-partner,.wrapper-about,.wrapper-about-content,'+
        '.col-about-us,.col-about-us-content,.about-us-main,.about-us-title,.about-us-content,.img-about-us,'+
        '.about-us-statistics,.statistics,.project,.traceable-animals,.total-vaccination,.title,.content'+
        '.mission-vision-content,.row-mission-vision,.col-mission-vision,.our-missison,.our-mission-title,'+
        '.our-mission-content,.our-vision,.our-vision-title,.our-vision-content,.core-values-content,'+
        'core-values-title,.row-core,.col-core-value,.col-core-value-2,.img-core-value,.core-value-title,'+
        '.core-value-content,.our-team-content,.team-members-content,.team-members-content-1,'+
        '.team-members-content-2,.col-our-team,.our-team-title,.our-team-subtitle,.our-team-content,'+
        '.team-member-content,team-title,.team-content,.img-team,.wrapper-aims,.wrapper-aims-content,'+
        '.row-aims-content,.col-aims-content,.main-aims,.wrapper-aims-title,.aims-content,.row-aims,'+
        '.col-aims,.aims-statistics-title,.aims-statistics-content,.col-focus-content,.img-aims,'+
        '.wrapper-aims-hero,.wrapper-aims-hero-content,.aims-hero-title,.wrapper-aims-features,'+
        '.wrapper-aims-features-content,.row-aims-features,.col-aims-features,.col-aims-feature-content,'+
        '.aims-feature-title,.aims-feature-content,.wrapper-blog-post-hero,.wrapper-blog-post-content,'+
        '.blog-post-subtitle,.blog,.blog > svg,.blog-post-main-title,.wrapper-blog-post-content > p,'+
        '.posted-date,.dot,.last-read-time,.blog-post-content,.blog-post-author,.author-content,'+
        '.social-media,.related-article-title,.view-all-post,.wrapper-blog-hero,.wrapper-blog-content,'+
        '.blog-title,.blog-content,.wrapper-article,wrapper-hoina-features-content,.wrapper-article-title,'+
        '.row-article-1,.col-article,.col-article-content,.img-article,.article-subtitle,.article-main-title,'+
        '.article-content,.author,.col-article,.pagination,.wrapper-faq-hero,.wrapper-blog-content,.faq-title,'+
        '.faq-content,.wrapper-faq,.wrapper-faq-features-content,.header,.faq-h-1,.faq-content-1,.wrapper-get-in-touch,'+
        '.wrapper-how-content,.row-how,.col-how,.main-title,.wrapper-get-in-touch-title,.get-in-touch-content,'+
        '.get-in-touch-container,.apper-hoina-content,.row-hoina-content,.col-hoina-content,.wrapper-hoina-title,'+
        '.hoina-content,.contact-us,.col-focus-content,.img-hoina,.wrapper-hoina-features,.wrapper-hoina-features-content,'+
        '.row-hoina-feature,.col-hoina-feature,.col-hoina-feature-content,.img-hoina,.hoina-feature-title,.hoina-feature-content,'+
        '.wrapper-gallery,.wrapper-gallery-content,.main-title,.wrapper-gallery-title,.row-gallery-content,.col-gallery-content,'+
        '.img-gallery-1,.img-gallery-2,.img-gallery-3,.row-gallery,.col-gallery,.wrapper-livestalk-hero,.wrapper-livestalk,'+
        '.wrapper-livestalk-content,.main-title,.wrapper-livestalk-series-title,.col-livestalk-content,.livestalk-content,.watch-series,'+
        '.wrapper-livestalk-series,.wrapper-livestalk-series-content,.wrapper-livestalk-series-title,.livestalk-series,.row-livestalk-series,'+
        '.img-livestalk-series,.wrapper-meat247-hero,.wrapper-hero-content,.row-meat-hero,.col-meat-hero,.meat247-hero-title,.hero-content,'+
        '.btn-meat247,.wrapper-features,.wrapper-features-content,.row-features-content,.col-features-content,.features-content,.col-feature-content,'+
        '.img-feature,.feature-title,.feature-content'
      );

      tags.forEach ((tag) => {
        observer.observe(tag);
      });
    });


    var mobileButton = document.getElementsByClassName("navbar-toggler");
        mobileButton[0].onclick = function(){
          var mobileMenu = document.getElementsByClassName("collapse");
          var wrapper = document.getElementsByClassName("content-wrapper");
         
          if(mobileMenu[0].classList.contains("show")){
            wrapper[0].style.marginTop = "85px";
            
          }else{
            wrapper[0].style.marginTop = "305px";
            
          }
          
        }

        var body = document.getElementsByTagName("body");
        body[0].onresize = function(){
          var widthScreen =window.screen.width;
          var mobileMenu = document.getElementsByClassName("collapse");
          var wrapper = document.getElementsByClassName("content-wrapper");
      
          if(widthScreen <="478"){
            if(mobileMenu[0].classList.contains("show")){
              wrapper[0].style.marginTop = "305px";
            }else{
              wrapper[0].style.marginTop = "85px";
            }
          }else if(widthScreen <="575"){
            if(mobileMenu[0].classList.contains("show")){
              wrapper[0].style.marginTop = "305px";
            }else{
              wrapper[0].style.marginTop = "85px";
            }
          }else if(widthScreen <="991"){
            if(mobileMenu[0].classList.contains("show")){
              wrapper[0].style.marginTop = "305px";
            }else{
              wrapper[0].style.marginTop = "85px";
            }
          }else if(widthScreen >="992"){
            if(mobileMenu[0].classList.contains("show")){
              wrapper[0].style.marginTop = "85px";
            }else{
              wrapper[0].style.marginTop = "85px";
            }
          }
        }


        var back_to_top = document.getElementsByClassName("back-to-top");
        back_to_top[0].onclick = function(){
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
    
        window.addEventListener('scroll', function(){
          var menu = document.getElementsByClassName('wrapper-menu')[0];
          if(window.scrollY > 650){
             menu.style.backgroundColor= "white";
             menu.style.color= "black";
             menu.style.zIndex ="5001";
           
          }
        });


      let startTime;
        let totalTimeSpentInSeconds = 0; 
        let totalTimeSpentInSeconds_result = 0; 
        function startTracking() {

              startTime =new Date().getTime();
       
            setInterval(updateTimeSpent, 1000);
        }

        function updateTimeSpent() {
           
            let currentTime = new Date().getTime();
            let elapsedTime = currentTime - startTime;
           
            let secondsSpent = Math.floor(elapsedTime / 1000);
            totalTimeSpentInSeconds = formatTime(secondsSpent);
            sendTimeSpent(totalTimeSpentInSeconds);
        }

        function sendTimeSpent(totalSeconds) {
         
          let blog_post = document.getElementsByClassName("last-read-time")[0];
          let blog_post_id =blog_post.getAttribute('id');
          var token =$("meta[name='csrf-token']").attr("content");
          $.ajax({
              type: 'POST',
              url: '/time-spent',
              data: { time_spent: totalSeconds,post_id :blog_post_id, _token:token },
              success: function(response) {
                console.log(response);
                $('.show'+blog_post_id).html(response);
              },
              error: function(xhr, status, error) {
                  console.error('Error recording time spent:', error);
              }
          });
        }

        function formatTime(totalSeconds) {
            let hours = Math.floor(totalSeconds / 3600);
            let minutes = Math.floor((totalSeconds % 3600) / 60);
            let seconds = totalSeconds % 60;

            let formattedTime = '';
            if (hours > 0) {
                formattedTime += hours + ' hours ';
            }
            if (minutes > 0 || hours > 0) {
                formattedTime += minutes + ' minutes ';
            }
            formattedTime += seconds + ' seconds';
            return formattedTime.trim();
        }

        startTracking();      
  </script>      
</body>
</html>
    