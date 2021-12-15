@extends('Dashboards.admin.layouts.app')


@section('contents')

<!-- add navbar -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!-- add sidebar -->
    @include('Dashboards.admin.layouts.fragments.sidebar')

    <!-- end sidebar -->

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <!-- put content here -->

            </div>

        </div>
        <!-- add footer -->
    </div>
    <!--  END CONTENT PART  -->

</div>
<!-- END MAIN CONTAINER -->


@endsection