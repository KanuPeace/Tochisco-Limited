@extends("dashboards.admin.layouts.app")
@section('content')
    <div id="tableCheckbox" class="">
        <div class="statbox widget box box-shadow mt-5">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Posts
                            <span class="fr">
                                <a href="{{ route('admin.blog.posts.create') }}" class="btn btn-primary btn-sm">New
                                    Post</a>
                            </span>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                @include("dashboards.admin.fragments.search_forms.posts")
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                            <tr>
                                <th class="">S/N</th>
                                <th class="">Cover</th>
                                <th class="">Category</th>
                                <th class="">Title</th>
                                <th class="">Type</th>
                                <th class="">Views</th>
                                <th class="">Top Story</th>
                                <th class="">Published</th>
                                <th class="">Can Comment</th>
                                <th class="">Sponsored</th>
                                <th class="">Edit</th>
                                <th class="">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>
                                        {{-- @if ($post->isBlog())
                                            <a href="{{ $post->coverImageUrl() }}" target="_blank">
                                                <img src="{{ $post->coverImageUrl() }}" class="img-fluid" alt="">
                                            </a>
                                        @else
                                            <a href="{{ $post->coverVideoUrl() }}" target="_blank">
                                                <video src="{{ $post->coverVideoUrl() }}" class="img-fluid"></video>
                                            </a>
                                        @endif --}}
                                    </td>
                                    <td>{{ optional($post->category)->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->type }}</td>
                                    <td>{{ $post->views_count }}</td>
                                    <td>{{ $boolOptions[$post->is_top_story] }}</td>
                                    <td>{{ $boolOptions[$post->is_published] }}</td>
                                    <td>{{ $boolOptions[$post->can_comment] }}</td>
                                    <td>{{ $boolOptions[$post->is_sponsored] }}</td>
                                    <td>
                                        <a href="{{ route('admin.blog.posts.edit', $post->id) }}" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                                <i data-feather="edit-2" class="text-info"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.blog.posts.destroy', $post->id) }}" method="post"
                                            onsubmit="return confirm('Are you sure you want to delete this record?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-feather="trash-2" class="text-danger"
                                                onClick="$(this).parent().trigger('submit')"></button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                    {!! $posts->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
