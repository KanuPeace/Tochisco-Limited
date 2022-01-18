@extends("dashboards.admin.layouts.app")
@section('style')
    <link rel="stylesheet" href="{{ $admin_assets }}/plugins/suneditor/css/sample.css" media="all">
@endsection
@section('content')

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
                <form enctype="multipart/form-data" class="form-row" action="{{ route("admin.blog.posts.store") }}" method="POST"> @csrf
                    <div class="form-group col-md-3">
                        <label for="">Category <span class="required">*</span></label>
                        <select name="category_id" class="form-control" id="" required>
                            <option value="" disabled selected>Select Category</option>
                            @foreach ($postCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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

                    <div class="form-group col-md-3">
                        <label for="">Cover Image <span class="required">*</span></label>
                        <input class="form-control" type="file" name="cover_image">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="">Cover Video <span class="required">*</span></label>
                        <input class="form-control" type="file" name="cover_video">
                    </div>


                    <div class="form-group col-md-12">
                        <label for="">Title <span class="required">*</span></label>
                        <input class="form-control" type="text" required name="title"
                            placeholder="Buhari don lock border......">
                    </div>


                    <div class="form-group col-md-12">
                        <label for="">Body <span class="required">*</span></label>
                        <textarea id="sun_editor" type="text" name="body" class="form-control"
                            required>{!! old('body') !!}</textarea>
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

                    <hr class="col-12">
                    <h5 class="col-12 mb-3">Seo Data</h5>
                    <div class="form-group col-md-5">
                        <label for="">Meta Title <span class="required">*</span></label>
                        <input class="form-control" type="text" name="meta_title" required
                            placeholder="Describe the post. if empty it uses the blog title...">
                    </div>
                    <div class="form-group col-md-7">
                        <label for="">Meta Keywords <span class="required">*</span></label>
                        <input class="form-control" type="text" name="meta_keywords" required
                            placeholder="Enter search keywords...">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">Meta Description <span class="required">*</span></label>
                        <input class="form-control" type="text" name="meta_description" required
                            placeholder="Summarize the blog post">
                    </div>

                    <div class="form-group col-12">
                        <button class="btn btn-primary btn-lg">Submit</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
