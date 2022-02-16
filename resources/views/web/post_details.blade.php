@extends('web.pages.layouts.app')
@section('contents')

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-content">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <div class="jumbotron bg-alert">
                <h4> feature ads</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Banner Ends Here -->


<div class="col-12">
  <a href="{{route('/')}}">
    <i class="fa fa-arrow-left d-flex w-50 " aria-hidden="true"></i></a>
</div>
<section class="blog-posts grid-system mt-1">
  <div class="container ">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">
            <div class="col-lg-12">
              <div class="blog-post">
                <div class="blog-thumb">
                  <img src="{{ $admin_assets}}/assets/images/blog-post-02.jpg" alt="">
                </div>
                <div class="down-content">

                  <h4 class="text-success">{{$post->name}}</h4>
                  </a>
                  <span>Post By <b><a href="{{route('user.post' , $post->user)}}">{{$post->user->name}}</a></b> <a href="#"></a>{{$post->created_at->diffForHumans()}}</span>

                  <div>
                    <img class="img-fluid " src="{{asset( $post->cover_image)}}" alt="..." />
                  </div>

                  <div class="post-options">
                    <div class="row">
                      <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12">
                        <a class="btn btn-success text-white btn-lg mt-3 " href="{{route('post.download' , $post->id)}}">Download</a>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 justify-content-center">
                        <audio style="width: 90%;" controls class="mt-3">
                          <source src="{{asset($post->cover_video)}}" type="audio/ogg">
                          <source src="{{asset($post->cover_video)}}" type="audio/mpeg">
                        </audio> 
                        <p>play audio only</p>
                      </div>
                      <!-- <div class="col-12">
                        <div class="">
                          <i style="padding-right: 10px;" class="fa fa-share-alt"></i>
                          <span style="padding-right: 10px; font-size :20px">
                            <a href="{{ route('media.share' , [ 'id' => $post->id , 'platform' => 'facebook' ])}}" target="blank"><i style="color:blue;" class="fa fa-facebook"></i></a>
                            <a href="{{ route('media.share' , [ 'id' => $post->id , 'platform' => 'whatsapp' ])}}" target="blank"><i style="color:green;" class="fa fa-whatsapp"></i></a>
                          </span>

                        </div>
                      </div> -->
                      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 justify-content-center">
                        <p style=" text-align:center">{{$post->content_desccription}}</p>

                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

           

          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection