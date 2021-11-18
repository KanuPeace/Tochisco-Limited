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
                                    <label for="">Type<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="type">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Category<span class="required">*</span></label>
                                    <select name="category_id" class="form-control" id="">
                                        <option value="" disabled selected>Select Category</option>
                                       
                                        <option value="">select</option>
                                       
                                    </select>
                                </div>

                               
                                

                                <div class="form-group col-md-12">
                                    <label for="">Body <span class="">*</span></label>
                                    <textarea rows="10"  id="body" type="text" name="body" class="form-control"></textarea>
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
    <!--  END CONTENT PART  -->

</div>
</div>
@endsection