<form action="{{ url()->current() }}" method="get">
    <div class="form-row">
        <div class="col-md-4 form-group" >
            <label for="">Search Keywords </label>
            <input type="text" class="form-control" name="keywords" placeholder="Search....." value="{{ ($query['keywords'] ?? '') }}">
        </div>
        <div class="form-group col-md-2">
            <label for="">Category </label>
            <select name="category_id" class="form-control" id="" >
                <option value=""  selected>Select Category</option>
                @foreach ($postCategories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == ($query["category_id"] ?? "") ? 'selected' : '' }}>{{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="">Type </label>
            <select name="type" class="form-control" id="" >
                <option value=""  selected>Select Type</option>
                @foreach ($types as $type)
                    <option value="{{ $type }}" {{ $type == ($query["type"] ?? "") ? 'selected' : '' }}>
                        {{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="">Is Sponsored </label>
            <select name="is_sponsored" class="form-control" id="" >
                <option value=""  selected>Select Option</option>
                @foreach ($boolOptions as $key => $value)
                    <option value="{{ $key }}" {{ "$key" === ($query["is_sponsored"] ?? "") ? 'selected' : '' }}>
                        {{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-2">
            <label for="">Is Top Story </label>
            <select name="is_top_story" class="form-control" id="" >
                <option value=""  selected>Select Option</option>
                @foreach ($boolOptions as $key => $value)
                    <option value="{{ $key }}" {{ "$key" === ($query["is_top_story"] ?? "") ? 'selected' : '' }}>
                        {{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-2">
            <label for="">Is Featured </label>
            <select name="is_featured" class="form-control" id="" >
                <option value=""  selected>Select Option</option>
                @foreach ($boolOptions as $key => $value)
                    <option value="{{ $key }}" {{ "$key" === ($query["is_featured"] ?? "") ? 'selected' : '' }}>
                        {{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-2">
            <label for="">Is Published </label>
            <select name="is_published" class="form-control" id="" >
                <option value=""  selected>Select Option</option>
                @foreach ($boolOptions as $key => $value)
                    <option value="{{ $key }}" {{ "$key" === ($query["is_published"] ?? "") ? 'selected' : '' }}>
                        {{ $value }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group col-md-2">
            <label for="">Enable Comments </label>
            <select name="can_comment" class="form-control" id="" >
                <option value=""  selected>Select Option</option>
                @foreach ($boolOptions as $key => $value)
                    <option value="{{ $key }}" {{ "$key" === ($query["can_comment"] ?? "") ? 'selected' : '' }}>
                        {{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-auto mt-4">
            <button type="submit" class="btn btn-success btn-lg">Filter</button>
        </div>
    </div>
</form>

