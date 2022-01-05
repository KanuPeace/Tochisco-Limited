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

                <!-- <div id="tableCheckbox" class="">

                    @include('notifications.flash_messages')
                    <a href="{{route('users.category.index')}}" class="btn btn-primary d-flex justify-content-end">New Category</a>

                </div> -->

                @include('notifications.flash_messages')
                <div id="tableCheckbox" class="">
                

                    <div class="statbox widget box box-shadow mt-5">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12  d-flex justify-content-between">
                                    <h4>Create New Post</h4>
                                    <a href="" class="btn btn-primary d-flex ">New Category</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form enctype="multipart/form-data" class="form-row" action="{{route('users.post.store')}}" method="POST"> @csrf


                                <div class="form-group col-md-4">
                                    <label for="">Cover Image <span class="required">*</span></label>
                                    <input class="form-control" type="file" name="cover_image">
                                </div>

                                

                                <div class="form-group col-md-4">
                                    <label for=""> Category<span class="required">*</span></label>
                                    <select name="category_id" class="form-control" id="">
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Type <span class="required">*</span></label>
                                    <select name="type" class="form-control" id="" required>
                                        <option value="" disabled selected>Select Type</option>
                                        @foreach ($types as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Price<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="price">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Bed-Room<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="no_of_bedrooms">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Sitting-Room<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="no_of_sittingrooms">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Location<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="location">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="">Title <span class="required">*</span></label>
                                    <input class="form-control" type="text" name="title" placeholder="......">
                                </div>

                                

                                <div class="form-group col-md-12">
                                    <label for="">Body <span class="">*</span></label>
                                    <textarea id="body" type="text" name="body" class="form-control"></textarea>
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



</div>
<!--  END CONTENT PART  -->

</div>
</div>
@endsection