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

                <div id="tableCheckbox" class="">

                    @include('notifications.flash_messages')
                    <a href="{{route('users.category.index')}}" class="btn btn-primary d-flex justify-content-end">New Category</a>

                </div>
            </div>

        </div>
    </div>



</div>
<!--  END CONTENT PART  -->

</div>
</div>
@endsection