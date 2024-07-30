@extends('layouts.app')
  @section('content')
    <div class="wrapper-blog-hero">
        <div class="wrapper-blog-content text-center">
            <h5 class="text-success text-center main-title">OUR BLOG</h5>
            <h2 class="blog-title font-weight-bold">Welcome to Livestock247 Blog</h2>
            <p class="blog-content">The latest industry news, interviews, technologies, and resources.</p>
        </div>
    </div>
    <div class="wrapper-article">  
        <div class="wrapper-hoina-features-content">  
            <h2 class="wrapper-article-title">Latest articles</h2> 
            <div class="row row-article-1">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-4 col-12 col-article">
                        <div class="col-article-content">
                            <img src="{{asset('uploads/'.$post->post_image)}}" class="w-100 img-fluid img-article">
                            <h5 class="article-subtitle"><a href="{{route('blog',$post->id)}}">{{strtoupper($post->link_post_title)}}</a></h5>
                            <h2 class="article-main-title">{{ucwords($post->post_title)}}</h2>
                            <p class="article-content">
                                {{ucfirst($post->post_description)}}
                            </p>
                            <div class="author d-flex align-items-start">
                                <div class="author-content d-flex align-items-center justify-content-center">
                                    <span class="author-tag">{{strtoupper(substr($post->firstname,0,1)).''.strtoupper(substr($post->lastname,0,1))}}</span>
                                    <span class="author-details mt-3 ml-3">
                                        <h6 class="author-name">{{ucfirst($post->firstname).' '.ucfirst($post->lastname)}}</h6>
                                        <p><span class="date-posted">{{date('d  M Y',strtotime($post->created_at))}}</span><br><span class="last-read-time"> {{($post->last_read_time !=NULL ? 'Last read time '.$post->last_read_time :'')}}</span></p>
                                    </span>
                                </div> 
                            </div>                    
                        </div>               
                    </div>
                @endforeach
            </div> 
            <div class="pagination">
            {{$posts->links()}}
            </div>                                         
        </div>
    </div>
@endsection   