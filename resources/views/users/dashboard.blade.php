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

                <!-- Content -->
                <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                    <div class="user-profile layout-spacing">
                        <div class="widget-content widget-content-area">
                            <div class="d-flex justify-content-between">
                                <h3 class="">Profile</h3>
                                <a href="{{ route('user.profile.edit', auth()->user()->id) }}" class="mt-2 edit-profile">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-edit-3">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                    </svg></a>
                            </div>
                            <div class="text-center user-info ">
                                <img class="image img-fluid" src="{{ asset(auth()->user()->avatar) }}" alt="">
                                <p class="">{{ auth()->user()->name }}</p>
                            </div>
                            <div class="user-info-list">

                                <div class="">
                                    <ul class="contacts-block list-unstyled">
                                        <li class="contacts-block__item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-coffee">
                                                <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                                <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z">
                                                </path>
                                                <line x1="6" y1="1" x2="6" y2="4"></line>
                                                <line x1="10" y1="1" x2="10" y2="4">

                                                </line>
                                                <line x1="14" y1="1" x2="14" y2="4"></line>
                                            </svg>{{ Auth::user()->username }}
                                        </li>
                                        <li class="contacts-block__item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-calendar">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>{{ Auth::user()->role }}
                                        </li>
                                        <li class="contacts-block__item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-map-pin">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>New York, USA
                                        </li>
                                        <li class="contacts-block__item">
                                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-mail
                                                    ">
                                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z
                                                            "></path>
                                                    <polyline points="22,6 12,13 2,6"></polyline>
                                                </svg>{{ auth()->user()->email }}</a>
                                        </li>
                                        <li class="contacts-block__item">
                                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-phone
                                                    ">
                                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z
                                                            "></path>
                                                    <polyline points="22,6 12,13 2,6"></polyline>
                                                </svg>{{ auth()->user()->phone }}</a>
                                        </li>

                                        <li class="contacts-block__item">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <div class="social-icon">
                                                        <a href="" target="_blank" rel="noopener noreferrer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-facebook">
                                                                <path
                                                                    d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </div>

                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="social-icon">
                                                        <a href="http://" target="_blank" rel="noopener noreferrer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-twitter">
                                                                <path
                                                                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="social-icon">
                                                        <a href="http://" target="_blank" rel="noopener noreferrer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-linkedin">
                                                                <path
                                                                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                                                </path>
                                                                <rect x="2" y="9" width="4" height="12"></rect>
                                                                <circle cx="4" cy="4" r="2"></circle>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- <div class="col-lg-12` layout-top-spacing"> --}}
                    <section class="property-section latest-property-section spad">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="section-title">
                                        <h4>Latest PROPERTY</h4>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                    <div class="property-controls">
                                        <ul>
                                            @foreach ($posts as $Post)
                                                <a href="{{ route('category.post', $Post->category) }}">
                                                    <li data-filter="all">{{ $Post->category->name }}</li>
                                                </a>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row property-filter">
                                @foreach ($posts as $post)
                                    <div class="col-lg-12 col-md-6 mix all house">
                                        <div class="property-item">
                                            <div class="pi-pic set-bg" data-setbg="{{ asset($post->cover_image) }}">
                                            </div>
                                            <div class="label">{{ $post->type }}</div>
                                            <div class="pi-text">
                                                <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                                                <div class="pt-price">${{ $post->price }}<span>/month</span></div>
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
                </div>


            </div>
        </div>


        <!--  END CONTENT PART  -->

    </div>
    </div>

@endsection
