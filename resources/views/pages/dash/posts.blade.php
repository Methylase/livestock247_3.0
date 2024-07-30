@extends('layouts.dash')
  @section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> All Blog Post</h1>

          </div>
        </div>
            <!-- Content Column -->
            <div class="col-lg-12 mb-4" style="height:820px">

              <!-- Approach -->
              <div class="card shadow mb-4">
                
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold"> All Blog Post </h6>
                  <div class="float-right text-default" id="blogPostsToggle"><i class="fas fa-plus" id="close"></i></div>
                </div>
                <div class="card-body" id="blog-posts-body">
                  <div class="text-right">
                    <a href="{{route('create-post')}}" class="btn btn-sm btn-warning float-right mb-3">Create Blog Post</a>
                  </div> 
                  <div class="table-responsive">
                    
                    @if(isset($posts) && $posts != '')
                      <table class="table table-bordered border-bottom-info table-striped" id="dataTablePost"  style="width:100%" cellspacing="0">
                        
                        
                          <thead>
                            <tr>
                              <th>S/N</th>
                              <th>Link Title</th>
                              <th>Post Title</th>
                              <th>Post Description</th>
                              <th>Post Date</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                            @php $i=1
                            @endphp
                            <tbody>
                            @foreach($posts as $post)
                                  <tr>
                                      <td>{{$i}}</td>
                                      <td>{{ucfirst($post->link_post_title)}}</td>
                                      <td>{{ucfirst($post->post_title)}}</td>
                                      <td>{{ucfirst($post->post_description)}}</td>
                                      <td>{{date('d D F Y',strtotime($post->created_at))}}</td>
                                      <td>
                                        @can('update',$post) 
                                        <a href="{{route('post',$post->id)}}" class="btn btn-sm btn-info" title="Edit"><span class="fa fa-edit"></span></a> 
                                        @endcan
                                        @can('delete',$post)                                        
                                        <a href="" class="btn btn-sm btn-danger deletePost"  id='del {{$post->id}}' data-title="Delete" data-toggle="modal" data-target="#confirm-delete"><span class="fa fa-trash" title="Delete"></span></a>
                                        @endcan
                                      </td>  
                                  </tr>
                                
                            @php $i++
                            @endphp
                            @endforeach
                      
                        </tbody>
                      </table>
                    @else
                      <p class="text-center">No blog post found</p>
                    @endif
                    <!-- modal for delete post -->
                    <div class="modal col-md-10 offset-md-2  col-sm-10 offset-sm-2 " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">                  
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                          <h4 class="modal-title text-info" id="Heading">Delete this post</h4>
                          </div>
                          <div class="modal-body">
                            <div class="alert alert-danger  format"><span class="fa fa-warning text-danger"></span> Are you sure you want to delete this post?</div>
                          </div>
                          <div class="modal-footer">
                            <button  class="btn btn-sm btn-info del_post"><span class="fa fa-check-circle"></span> Yes</button>
                            <button type="button" class="btn-sm btn btn-danger" data-dismiss="modal"><span class="fa fa-remove"></span> No</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end of modal for delete post -->
                  </div>                  
                </div>
              </div>
            </div>
          </div>

        <!-- /.container-fluid -->
      <!-- End of Main Content -->
@endsection
