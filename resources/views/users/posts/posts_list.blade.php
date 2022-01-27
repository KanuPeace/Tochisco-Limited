@extends('users.layouts.app')

@section('content')



<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                @include('notifications.flash_messages')


                <div id="tableCheckbox" class="">
                    <div class="statbox widget box box-shadow mt-5">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Post Information</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                                    <thead>
                                        <tr>
                                            <th class="">S/N</th>
                                            <th class="">Post Type</th>
                                            <th class="">Post By</th>
                                            <th class="">Cover Image</th>
                                            <th class="">Cover Video</th>
                                            <th class="">Description</th>
                                            <th class="">Created At</th>
                                            <th class="">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                        <tr>
                                            @foreach($posts as $post)
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->content_type}}
                                            <td>{{$post->user->name}}</td>
                                            <td> <img class="img-fluid" src="{{asset('postImages/' . $post->cover_image)}}" alt="..." />
                                            </td>
                                            <td>
                                                <a href="" target="_blank" rel="noopener noreferrer">
                                                    <video controls class="img-fluid">
                                                        <source class="img-fluid" src="{{asset('postVideos/' . $post->cover_video)}}" type="video/mp4">
                                                    </video></a>
                                            </td>
                                            <td>{{$post->content_desccription}}</td>
                                            <td>{{$post->created_at}}


                                            <td>
                                                
                                                <a href="{{route('admin.post.edit' , $post->id )}}" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                <!--  END CONTENT PART  -->

            </div>
        </div>

        @endsection