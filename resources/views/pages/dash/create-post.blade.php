@extends('layouts.dash')
  @section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Create Blog Post</h1>

          </div>
        </div>
            <!-- Content Column -->
            <div class="col-lg-12 mb-4" style="height:820px">
                @if(session()->has('failureMessage'))
                    <div class='offset-md-1 col-md-10 offset-sm-1 col-sm-10 alert
                    alert-danger alert-dismissable text-center' style='margin-top:20px'>
                    <a href='' class='close' data-dismiss='alert' aria-label='close'> &times</a>
                    <strong>
                        Danger
                    </strong>
                    {{session('failureMessage')}}
                    </div>
                @endif
                @if(session()->has('successMessage'))
                    <div class='offset-md-1 col-md-10 offset-sm-1 col-sm-10 alert
                    alert-success alert-dismissable text-center' style='margin-top:20px'>
                    <a href='' class='close' data-dismiss='alert' aria-label='close'> &times</a>
                    <strong>
                        Success
                    </strong>
                    {{session('successMessage')}}
                    </div>
                @endif
            
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold"> Create Blog Post </h6>
                  <div class="float-right text-default" id="createBlogPostToggle"><i class="fas fa-plus" id="close"></i></div>
                </div>
                <div class="card-body" id="create-blog-post-body">
                  <form class="form" action="{{route('create-post')}}" enctype="multipart/form-data" method="POST">
                      <input type="hidden" name="userId" value="{{$userId}}">                  
                     {{csrf_field()}}
                     <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">                       
                                <input type="file" id="file" name="file" class="form-control">
                                <label for="create-post-image" class="control-label"> Select post image</label> 
                                <p class="text-danger">
                                    @if($errors->has('file'))
                                        {{ $file= $errors->first('file')}}
                                    @else
                                        {{$file=''}}                            
                                    @endif
                                </p>                        
                            </div>
                        </div>                       
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="link-post-title" class="control-label">Link post title</label>
                                <input type="text" id="link-post-title" name="link-post-title" class="form-control" placeholder="Enter link post title" >
                                <span class="text-danger">
                                    @if($errors->has('link-post-title'))
                                        {{ $link_post_title= $errors->first('link-post-title')}}
                                    @else
                                        {{$link_post_title=''}}                            
                                    @endif                                    
                                </span>                      
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="post-title" class="control-label">Post title</label>
                                <input type="text" id="post-title" name="post-title" class="form-control" placeholder="Enter post title">
                                <span class="text-danger">
                                    @if($errors->has('post-title'))
                                        {{ $post_title= $errors->first('post-title')}}
                                    @else
                                        {{$post_title=''}}                            
                                    @endif                                    
                                </span>                      
                            </div>
                        </div>                      
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="post-description" class="control-label"> Post description</label>
                                <textarea  id="post-description" name="post-description" class="form-control" placeholder="Enter post description" ></textarea>
                                <span class="text-danger">
                                    @if($errors->has('post-description'))
                                        {{ $post_description= $errors->first('post-description')}}
                                    @else
                                        {{$post_description=''}}                            
                                    @endif                                    
                                </span>                         
                            </div>
                        </div>                      
                    </div>  
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group text-right">
                                <button type="submit"  id="create-post"  class="btn btn-warning" ><i class="fa fa-save"></i> Create Post </button>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        <!-- /.container-fluid -->
      <!-- End of Main Content -->
@endsection
