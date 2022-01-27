@extends('admin.layouts.app')

@section('style')

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
                                        <h4>Posts
                                            <span class="fr">
                                                <a href="{{ route('admin.post.create') }}"
                                                    class="btn btn-primary btn-sm">New
                                                    Post</a>
                                            </span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                                        <thead>
                                            <tr>
                                                {{-- <th class="">S/N</th> --}}
                                                <th class="">Post By</th>
                                                <th class="">Post Type</th>
                                                <th class="">The Role</th>
                                                <th class="">Cover Image</th>
                                                <th class="">Cover Video</th>
                                                <th class="">Bebrooms</th>
                                                <th class="">sittingrooms</th>
                                                <th class="">Description</th>
                                                <th class="">Created At</th>
                                                <th class="">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                            <tr>
                                                @foreach ($posts as $post)
                                                    {{-- <td>{{ $sn++ }}</td> --}}
                                                    <td>{{ $post->id }}</td>
                                                    <td>{{ $post->content_type }}
                                                    <td>{{ $post->user->name }}</td>
                                                    <td><img style="width:80px; height:80px;" class="img-fluid"
                                                            src="{{ asset('propertyimages/' . $post->cover_image) }}"
                                                            alt="..." /></td>
                                                    <td>
                                                        <a href="" target="_blank" rel="noopener noreferrer">
                                                            <video controls class="img-fluid">
                                                                <source class="img-fluid"
                                                                    src="{{ asset('postVideos/' . $post->cover_video) }}"
                                                                    type="video/mp4">
                                                            </video></a>
                                                    </td>
                                                    <td>{{ $post->no_of_bedrooms }}</td>
                                                    <td>{{ $post->no_of_sittingrooms }}</td>
                                                    <td>{{ $post->content_desccription }}</td>
                                                    <td>{{ $post->created_at }}
                                                    <td>
                                                        <a href="{{ route('admin.post.edit', $post->id) }}"
                                                            class="btn btn-primary">Edit</a>
                                                            
                                                        <form action="{{ route('admin.post.destroy', [$post->id]) }}"
                                                            method="post"
                                                            onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onClick="$(this).parent().trigger('submit')">Delete</button>
                                                        </form>
                                                       
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
