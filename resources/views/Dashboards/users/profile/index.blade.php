@extends('Dashboards.users.profile.layout.app')
@section('content')

    <div class="tg-dashboardbanner">
        <h1>Profile Settings</h1>
        <ol class="tg-breadcrumb">
            <li><a href="javascript:void(0);">Home</a></li>
            <li><a href="javascript:void(0);">Dashboard</a></li>
            <li class="tg-active">Profile Setting</li>
        </ol>
    </div>

    <main id="tg-main" class="tg-main tg-haslayout">

        <section class="tg-dbsectionspace tg-haslayout">
            @include("notifications.flash_messages")
            <div class="row">
                <form class="tg-formtheme tg-formdashboard" action="{{ route('user.update_profile') }}" method="POST"
                    enctype="multipart/form-data">@csrf <fieldset>

                        <div class="col-md-3 tg-lgcolwidthhalf">
                            <div class="tg-dashboardbox">
                                <div class="tg-dashboardboxtitle">
                                    <h2>Profile Photo</h2>
                                </div>
                                <div class="tg-dashboardholder">
                                    <label class="tg-fileuploadlabel" for="tg-photogallery">
                                        <img src="{{ $user->avatarUrl() }}" alt="">
                                    </label>
                                    <div class="form-group">
                                        <label for="">Clear passport photograph</label>
                                        <input type="file" name="avatar_id" class="form-control"
                                            {{ empty($user->avatar_id) ? 'required' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 tg-lgcolwidthhalf">
                            <div class="tg-dashboardbox">
                                <div class="tg-dashboardboxtitle">
                                    <h2>Profile Detail</h2>
                                </div>
                                <div class="tg-dashboardholder">

                                    <div class="form-group">
                                        <strong>I’m a:</strong>
                                        <div class="tg-selectgroup">
                                            <span class="tg-radio">
                                                <input id="tg-male" type="radio" name="gender" value="Male"
                                                    {{ $user->gender == 'Male' ? 'checked' : '' }}>
                                                <label for="tg-male">Male</label>
                                            </span>
                                            <span class="tg-radio">
                                                <input id="tg-female" type="radio" name="gender" value="Female"
                                                    {{ $user->gender == 'Female' ? 'checked' : '' }}>
                                                <label for="tg-female">Female</label>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Business Name (Optional)</label>
                                        <input type="text" name="display_name" class="form-control"
                                            placeholder="Business Name" value="{{ $user->display_name }}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">First Name</label>
                                                <input type="text" name="first_name" class="form-control"
                                                    placeholder="First Name*" required value="{{ $user->first_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Last Name</label>
                                                <input type="text" name="last_name" class="form-control"
                                                    placeholder="Last Name*" required value="{{ $user->last_name }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input readonly class="form-control" placeholder="Username"
                                            value="{{ $user->username }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input readonly class="form-control" placeholder="Email*"
                                            value="{{ $user->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number*"
                                            required value="{{ $user->phone }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <div class="form-group">
                                            <textarea rows="2" class="form-control" name="address" placeholder="address*" style="height: auto"
                                                required> {{ $user->address }} </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 tg-lgcolwidthhalf">
                            <div class="tg-dashboardbox">
                                <div class="tg-dashboardboxtitle">
                                    <h2>KYC Information</h2>
                                </div>
                                <div class="tg-dashboardholder">
                                    <div class="form-group">
                                        <label for="">Valid ID Card (International Passport/Drivers Licence/Voters Card or
                                            NIN)</label>
                                        <input type="file" name="valid_card_id" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <div class="col-md-12 text-center mt-2">
                        <button class="tg-btn" type="submit">Save</button>
                    </div>
                </form>

            </div>
        </section>

    </main>

@endsection
