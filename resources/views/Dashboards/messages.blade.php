@extends('Dashboards.admin.layouts.app')

@section('contents')

<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="helpdesk container">

            <div class="helpdesk layout-spacing">

                <div class="hd-header-wrapper">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4 class="">See All Messages</h4>
                            <p class="">Welcome</p>

                           
                            </div>
                        </div>
                    </div>
                </div>

             

                <div class="hd-contact-section">
                    <div class="hd-slider">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                   
                                    <div class="carousel-inner">
                                        <div class="carousel-item active community-help">
                                            <div class="carousel-item-content">
                                                <h4 class="hd-slide-header">Toggle any arrow to see all messages.</h4>
                                               
                                            </div>
                                            
                                        </div>
                                        @foreach($contact as $contact)
                                        <div class="carousel-item news-updates ">
                                            <div class="carousel-item-content">
                                                <h4 class="hd-slide-header">Messages</h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="media">
                                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                            <div class="media-body">
                                                                <h5>{{$contact->subject}}</h5>
                                                                <b>{{$contact->email}}</b>
                                                                <p class="">{{$contact->message}}.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                                                <polyline points="15 18 9 12 15 6"></polyline>
                                            </svg></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2021 <a target="_blank" href="">Media Downloader</a>, All rights reserved.</p>
        </div>
       
    </div>
</div>

@endsection