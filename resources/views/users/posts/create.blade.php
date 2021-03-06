@extends('users.layouts.app')

@section('content')
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                @include('notifications.flash_messages')
                <div id="tableCheckbox" class="">
                    
                    {{-- <div class="statbox widget box box-shadow mt-5">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Create New Category</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form enctype="multipart/form-data" class="form-row" action="{{route('user.category.store')}}" method="POST"> @csrf


                                <div class="form-group col-md-3">
                                    <label for="">Category <span class="required">*</span></label>
                                    <input class="form-control" type="text" name="name">

                                </div>

                                <div class="form-group col-12">
                                    <button class="btn btn-primary btn-lg">Submit</button>
                                </div>


                            </form>
                        </div>
                    </div> --}}

                    <div class="statbox widget box box-shadow mt-5">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Create New Post</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form enctype="multipart/form-data" class="form-row" action="{{route('user.post.store')}}" method="POST"> @csrf


                                <div class="form-group col-md-4">
                                    <label for="">Cover Image <span class="required">*</span></label>
                                    <input class="form-control" type="file" name="cover_image" required value="{{old('cover_image')}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">Land or Luxury House <span class="required">*</span></label>
                                    <input class="form-control" type="file" name="cover_video" required value="{{old('cover_video')}}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for=""> Category<span class="required">*</span></label>
                                    <select name="category_id" class="form-control" id="" required>
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                </div>


                                <div class="form-group col-md-6">
                                    <label for="">Title <span class="required">*</span></label>
                                    <input class="form-control" type="text" name="name" placeholder="......" required value="{{old('name')}}">
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


                                <div class="form-group col-md-12">
                                    <label for="">Body <span class="required">*</span></label>
                                    <textarea id="content_desccription" type="text" name="content_desccription" class="form-control" required value="{{old('content_desccription')}}"></textarea>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Price<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="price" required value="{{old('price')}}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Bed-Room<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="no_of_bedrooms" required value="{{old('no_of_bedrooms')}}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Sitting-Room<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="no_of_sittingrooms" required value="{{old('no_of_sittingrooms')}}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Location<span class="required">*</span></label>
                                    <input class="form-control" type="text" name="location" required value="{{old('location')}}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Is Sponsored <span class="required">*</span></label>
                                    <select name="is_sponsored" class="form-control" id="" required>
                                        <option value="" disabled selected>Select Option</option>
                                        @foreach ($boolOptions as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Is Top Story <span class="required">*</span></label>
                                    <select name="is_top_story" class="form-control" id="" required>
                                        <option value="" disabled selected>Select Option</option>
                                        @foreach ($boolOptions as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Is Featured <span class="required">*</span></label>
                                    <select name="is_featured" class="form-control" id="" required>
                                        <option value="" disabled selected>Select Option</option>
                                        @foreach ($boolOptions as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Is Published <span class="required">*</span></label>
                                    <select name="is_published" class="form-control" id="" required>
                                        <option value="" disabled selected>Select Option</option>
                                        @foreach ($boolOptions as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="">Enable Comments <span class="required">*</span></label>
                                    <select name="can_comment" class="form-control" id="" required>
                                        <option value="" disabled selected>Select Option</option>
                                        @foreach ($boolOptions as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
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
{{-- 'category_id',
        'type',
        'name',
        'content_desccription',
        'title',
        'body',
        'location',
        'no_of_bedrooms',
        'no_of_sittingrooms',
        'price',
        'cover_image',
        'cover_video', --}}

@endsection