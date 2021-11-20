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
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Create New Category</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form enctype="multipart/form-data" class="form-row" action="{{route('users.category.create')}}" method="POST"> @csrf


                                <div class="form-group col-md-3">
                                    <label for="">Category <span class="required">*</span></label>
                                    <input class="form-control" type="text" name="name">

                                </div>

                                <div class="form-group col-12">
                                    <button class="btn btn-primary btn-lg">Submit</button>
                                </div>


                            </form>
                        </div>
                    </div>


                    <div class="statbox widget box box-shadow mt-5">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Create New Post</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form enctype="multipart/form-data" class="form-row" action="{{route('users.post.store')}}" method="POST"> @csrf


                                <div class="form-group col-md-6">
                                    <label for="">Cover Image <span class="required">*</span></label>
                                    <input class="form-control" type="file" name="cover_image">
                                </div>


                                @foreach($posts as $post)
                                <div class="form-group col-md-6">
                                    <td> <img class="img-fluid" src="{{asset('propertyimages/' . $post->cover_image)}}" alt="..." />
                                </div>
                                @endforeach

                                <div class="form-group col-md-6">
                                    <label for="">Title <span class="required">*</span></label>
                                    <input class="form-control" type="text" name="title">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Price<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="price">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">No Of Bedrooms<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="no_of_bedrooms">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">No Of sitting Rooms<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="no_of_sittingrooms">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Location<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="location">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="">Category<span class="required">*</span></label>
                                    <select name="category_id" class="form-control" id="">
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-md-3">
                                    <label for="">Type <span class="required">*</span></label>
                                    <select name="type" class="form-control" id="" required>
                                        <option value="" disabled selected>Select Type</option>
                                        @foreach ($types as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                        </div>





                        <div class="form-group col-md-12">
                            <label for="">Body <span class="">*</span></label>
                            <textarea rows="10" id="body" type="text" name="body" class="form-control"></textarea>
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-text">Mauris mi tellus, pharetra vel mattis sed, tempus ultrices eros. Phasellus egestas sit amet velit sed luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Vivamus ultrices sed urna ac pulvinar. Ut sit amet ullamcorper mi. </p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>


</div>
<!--  END CONTENT PART  -->

</div>
</div>
@endsection