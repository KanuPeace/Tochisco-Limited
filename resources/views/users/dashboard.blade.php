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

                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-one">
                        <div class="widget-heading">
                            <h6 class="">Statistics</h6>
        
                            <div class="task-action">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="pendingTask"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </a>
        
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask"
                                        style="will-change: transform;">
                                        <a class="dropdown-item" href="javascript:void(0);">View</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                        <div class="w-chart">
        
                            <div class="w-chart-section total-visits-content">
                                <div class="w-detail">
                                    <p class="w-title">Total Visits</p>
                                    <p class="w-stats">423,964</p>
                                </div>
                                <div class="w-chart-render-one">
                                    <div id="total-users"></div>
                                </div>
                            </div>
        
        
                            <div class="w-chart-section paid-visits-content">
                                <div class="w-detail">
                                    <p class="w-title">Paid Visits</p>
                                    <p class="w-stats">7,929</p>
                                </div>
                                <div class="w-chart-render-one">
                                    <div id="paid-visits"></div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-account-invoice-two">
                        <div class="widget-content">
                            <div class="account-box">
                                <div class="info">
                                    <div class="inv-title">
                                        <h5 class="">Total Balance</h5>
                                    </div>
                                    <div class="inv-balance-info">
        
                                        <p class="inv-balance">$ 41,741.42</p>
        
                                        <span class="inv-stats balance-credited">+ 2453</span>
        
                                    </div>
                                </div>
                                <div class="acc-action">
                                    <div class="">
                                        <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-plus">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg></a>
                                        <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-credit-card">
                                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                <line x1="1" y1="10" x2="23" y2="10"></line>
                                            </svg></a>
                                    </div>
                                    <a href="javascript:void(0);">Upgrade</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-header">
                                <div class="w-info">
                                    <h6 class="value">Expenses</h6>
                                </div>
                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="pendingTask"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-more-horizontal">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg>
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask"
                                            style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="w-content">
        
                                <div class="w-info">
                                    <p class="value">$ 45,141 <span>this week</span> <svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trending-up">
                                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                            <polyline points="17 6 23 6 23 12"></polyline>
                                        </svg></p>
                                </div>
        
                            </div>
        
                            <div class="w-progress-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar"
                                        style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
        
                                <div class="">
                                    <div class="w-icon">
                                        <p>57%</p>
                                    </div>
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        <div class="widget-heading">
                            <div class="">
                                <h5 class="">Unique Visitors</h5>
                            </div>
        
                            <div class="dropdown ">
                                <a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-more-horizontal">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </a>
        
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="uniqueVisitors">
                                    <a class="dropdown-item" href="javascript:void(0);">View</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                </div>
                            </div>
                        </div>
        
                        <div class="widget-content">
                            <div id="uniqueVisits"></div>
                        </div>
                    </div>
                </div>
        
              
            </div>


        </div>
    </div>


    <!--  END CONTENT PART  -->

    </div>
    </div>

@endsection
