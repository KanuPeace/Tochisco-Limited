@extends('admin.layouts.app')

@section('style')



<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                @include('notifications.flash_messages')


                <div id="tableCheckbox" class="">
                    <div class="statbox widget box box-shadow mt-5">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Users Information</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                                    <thead>
                                        <tr>
                                            <th class="">S/N</th>
                                            <th class="">User Email</th>
                                            <th class="">Role</th>
                                            <th class="">Username</th>
                                            <th class="">Profile</th>
                                            <th class="">Status</th>
                                            <th class="">Created At</th>
                                            <th class="">no. of post</th>
                                            <th class="">.....</th>
                                            <th class="">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user )
                                        @php
                                        $statusColor = "";
                                        $status = $user->status;
                                        if($status == "Pending"){
                                        $statusColor = "text-info";
                                        }
                                        if($status == "Approved"){
                                        $statusColor = "text-success";
                                        }
                                        if($status == "Suspended"){
                                        $statusColor = "text-danger";
                                        }
                                        @endphp
                                        <tr>

                                            <td>{{$user->id}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role}}</td>
                                            <td>{{$user->username}}</td>
                                            <td>
                                                <a href="{{ asset(auth()->user()->avatar) }}" target="_blank" rel="noopener noreferrer">
                                                    <img class="img-fluid" src="{{ asset(auth()->user()->avatar) }}" alt="avatar">
                                                </a>
                                            </td>
                                            <td class="{{$statusColor}}">{{$user->status }}</td>
                                            <td>{{$user->created_at}}
                                            <td>
                                                <h3>
                                                    
                                                </h3>
                                            </td>
                                            <td>
                                                <ul class="table-controls">
                                                    <li class="mb-3">
                                                        <div class="dropdown">
                                                            <button class="btn dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Change Status
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                @foreach (['Pending', 'Approved' , 'Suspended'] as $status)
                                                                <a class="dropdown-item" onclick="return  confirm ('Are you sure of the action?')" href="{{ route('admin.users_status', ['id' => $user->id, 'status' => $status]) }}">
                                                                    Mark as {{ ucfirst($status) }}
                                                                </a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            <td>
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onClick="$(this).parent().trigger('submit')">Delete</button>
                                                </form>
                                                {{-- <button class="btn btn-primary">Edit</button> --}}
                                                <a href="{{ route('admin.users.edit',$user->id ) }}" class="btn btn-success btn-block disable" data-toggle="tooltip" data-placement="top" title="Edit"><i><i data-feather="edit-2" class="text-info"></i>Edit
                                                </a>
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                        @endforeach

                                        {{$users->links () }}
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                <!--  END CONTENT PART  -->

            </div>
        </div>

        @endsection