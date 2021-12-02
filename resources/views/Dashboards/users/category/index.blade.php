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

                    <div class="statbox widget box box-shadow mt-5">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h4>Create New Category</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form enctype="multipart/form-data" class="form-row" action="{{route('users.category.store')}}" method="POST"> @csrf


                                <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <label for="">Category <span class="required">*</span></label>
                                    <input class="form-control" type="text" name="name">

                                </div>

                                <div class="form-group col-12">
                                    <button class="btn btn-primary btn-lg">Submit</button>
                                </div>


                            </form>
                        </div>
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