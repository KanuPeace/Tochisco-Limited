@extends('Dashboards.users.layouts.app')

@section('contents')

<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>
    @include('Dashboards.users.layouts.navbar')
    @include('Dashboards.users.layouts.sidebar')
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
                                            <th class="">Property Type</th>
                                            <th class="">Post By</th>
                                            <th class="">Cover Image</th>
                                            <th class="">Bebrooms</th>
                                            <th class="">sittingrooms</th>
                                            <th class="">Title</th>
                                            <th class="">Created At</th>
                                            <th class="">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->type}}</td>
                                            <td>myname</td>
                                            <td><img style="width:80px; height:80px;" class="img-fluid" src="{{asset('propertyimages/' . $post->cover_image)}}" alt="..." /></td>
                                            <td>{{$post->no_of_bedrooms}}</td>
                                            <td>{{$post->no_of_sittingrooms}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->created_at->diffForHumans()}}</td>
                                            
                                            <td>
                                                <form action="{{route('admin.post.destroy' , [ $post->id] )}}" method="post" onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onClick="$(this).parent().trigger('submit')">Delete</button>
                                                </form>
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