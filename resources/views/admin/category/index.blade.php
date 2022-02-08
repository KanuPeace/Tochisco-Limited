@extends("dashboards.admin.layouts.app")
@section('content')

    <div id="tableCheckbox" class="">
        <div class="statbox widget box box-shadow mt-5">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Category
                            <span class="fr">
                                <a href="{{ route('admin.blog.category.create') }}" class="btn btn-primary btn-sm">New
                                    Category</a>
                            </span>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                            <tr>
                                <th class="">S/N</th>
                                <th class="">Category Name</th>
                                <th class="">Picture</th>
                                <th class="">Posts Count</th>
                                <th class="">Trending</th>
                                <th class="">Active</th>
                                <th class="text-center">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ $category->coverImageUrl() }}" target="_blank">
                                            <img src="{{ $category->coverImageUrl() }}" class="img-fluid" width="100"
                                                alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.blog.posts.index', ['category_id' => $category->id]) }}">
                                            {{ optional($category->posts)->count() }}
                                        </a>
                                    </td>
                                    <td>{{ $boolOptions[$category->is_trending] }}</td>
                                    <td>{{ $boolOptions[$category->is_active] }}
                                    <td class="text-center">
                                        <ul class="table-controls">
                                            <li><a href="{{ route('admin.blog.category.edit', $category->id) }}"
                                                    data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                            <i data-feather="edit-2" class="text-info"></i></a> </li> 
                                            <li>
                                                <form action="{{ route('admin.blog.category.destroy', $category->id) }}"
                                                    method="post"
                                                    onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" data-feather="trash-2" class="text-danger"
                                                        onClick="$(this).parent().trigger('submit')"></button>

                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    {!! $categories->links('pagination::bootstrap-4') !!}
@endsection
