@extends("admin.layouts.app")
@section('style')



    <div class="container scrollable-area">
        <div class="head">
            <h4>Edit User</h4>
        </div>
        <div class="content-body">

            <div class="mt-5">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ asset(auth()->user()->avatar) }}" target="_blank">
                                <img src="{{ asset(auth()->user()->avatar) }}" alt="avatar" class="img-fluid">
                            </a>
                            <div class="form-group">
                                <label for="avatar">Logo (Optional)</label>
                                <input type="file" class="form-control" name="avatar" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="username">User-name</label>
                                <input type="text" class="form-control" required name="username"
                                    placeholder="Name" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" required name="email"
                                    placeholder="E-mail" value="{{$user->email}}" />
                            </div>

                            <div class="form-group">
                                <button value="Submit" type="submit" class="btn btn-lg btn-success">Submit</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
