@extends('users.layouts.app')

@section('content')




    <!--  BEGIN CONTENT PART  -->
    {{-- <div id="tableCheckbox" class="">
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
                        <table
                            class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
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
                                    @foreach ($posts as $post)
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->content_type }}
                                        <td>{{ $post->user->name }}</td>
                                        <td> <img class="img-fluid"
                                                src="{{ asset('postImages/' . $post->cover_image) }}" alt="..." />
                                        </td>
                                        <td>
                                            <a href="" target="_blank" rel="noopener noreferrer">
                                                <video controls class="img-fluid">
                                                    <source class="img-fluid"
                                                        src="{{ asset('postVideos/' . $post->cover_video) }}"
                                                        type="video/mp4">
                                                </video></a>
                                        </td>
                                        <td>{{ $post->content_desccription }}</td>
                                        <td>{{ $post->created_at }}


                                        <td>

                                            <a href="{{ route('admin.post.edit', $post->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div> --}}
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-spacing">
                {{-- <div class="row"> 
                    <div class="col-md-auto col-12 text-center">
                        <h4 class="mt-3">Welcome {{ $user->name }}</h4>
                    </div>
                </div> --}}
                <!-- Content -->
                {{-- <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                    <div class="row">
                        <div class="col-md-auto col-6 text-center">
                            <img src="{{ $user->avatarUrl() }}" alt="avatar" class="img-fluid profile mt-5">
                            <div><a href="{{ route('user.edit_profile') }}" class="badge badge-pill badge-danger">Edit</a>
                            </div>
                        </div>
                        <div class="col-md-auto col-12 text-center">
                            <h4 class="mt-3">Welcome {{ $user->first_name }}</h4>
                        </div>
                    </div>

                </div> --}}

                {{-- <div class="col-lg-12` layout-top-spacing"> --}}
                {{-- <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
                    <section class="property-section latest-property-section spad">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="section-title">
                                        <h4>LATEST PROPERTY</h4>
                                    </div>
                                </div>
    
                                <div class="row property-filter">
                                    @foreach ($posts as $post)
                                        <div class="col-lg-12 col-md-6 mix all house">
                                            <div class="property-item">
                                                <div class="pi-pic set-bg" data-setbg="{{ asset($post->cover_image) }}">
                                                </div>
                                                <div class="label">{{ $post->type }}</div>
                                                <div class="pi-text">
                                                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                                                    <div class="pt-price">{{ $post->price }}<span>/month</span></div>
                                                    <h5><a href="#">{{ $post->title }}</a></h5>
                                                    <p><span class="icon_pin_alt"></span>{{ $post->address }}</p>
                                                    <ul>
                                                        <li><i class="fa fa-object-group"></i> 2, 283</li>
                                                        <li><i class="fa fa-bathtub"></i>{{ $post->no_of_sittingrooms }}</li>
                                                        <li><i class="fa fa-bed"></i> {{ $post->no_of_bedrooms }}</li>
                                                        <li><i class="fa fa-automobile"></i> 01</li>
                                                    </ul>
                                                    <div class="pi-agent">
                                                        <div class="pa-item">
                                                            <div class="pa-info">
                                                                <img src="web_assets/img/property/posted-by/pb-1.jpg" alt="">
                                                                <h6></h6>
                                                            </div>
                                                            <div class="pa-text">
                                                                123-455-688
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
    
                                </div>
                            </div>
                    </section>
                </div> --}}

            </div>


        </div>
    </div>


    <!--  END CONTENT PART  -->

    </div>
    </div>

@endsection
