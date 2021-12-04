@extends('web.user.profile.index')
@section('title', 'Profile - ' . $user->name)

@push('styles')

@endpush

@section('profile_content')

    <div class="container rounded bg-white mt-2 mb-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">{{ $user->name ?? 'Not Found' }}</span>
                    <span class="text-black-50">{{ $user->email ?? 'Not Found' }}</span><span></span>
                </div>
            </div>
            <div class="col-md-8 border-right">
            <div class="row">
                <div class="col-12 p-0">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Basic Info</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Documents</a>
                            <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        {{--Tab Start--}}
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile Settings</h4>
                                    <div class="text">
                                        <a href="#" class="btn btn-light btn-sm">Edit</a>
                                    </div>
                                </div>
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.profiles.update', $user->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    {{method_field('PATCH')}}
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="fullName" class="profile-labels">Full Name<small class="text-danger">*</small></label>
                                            <input name="fullName" id="fullName" type="text" class="form-control" placeholder="Full Name" value="{{ !empty($user->user_profile->full_name) ? $user->user_profile->full_name : old('fullName') }}">
                                            @if($errors->has('fullName'))
                                                <small class="text-danger">{{ $errors->first('fullName') }}</small>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name" class="profile-labels">Name<small class="text-danger">*</small></label>
                                            <input name="name" id="name" type="text" class="form-control" value="{{ !empty($user->name) ? $user->name : old('name') }}" placeholder="Name">
                                            @if($errors->has('name'))
                                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="email" class="profile-labels">Email<small class="text-danger">*</small></label>
                                            <input name="email" id="email" type="email" class="form-control" placeholder="Email" value="{{ !empty($user->email) ? $user->email : old('email') }}">
                                            @if($errors->has('email'))
                                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="contactNumber" class="profile-labels">Contact Number<small class="text-danger">*</small></label>
                                            <input name="contactNumber" id="contactNumber" type="text" class="form-control" value="{{ !empty($user->contact_number) ? $user->contact_number : old('contactNumber') }}" placeholder="+8801683201359">
                                            @if($errors->has('contactNumber'))
                                                <small class="text-danger">{{ $errors->first('contactNumber') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="fatherName" class="profile-labels">Father Name</label>
                                            <input name="fatherName" id="fatherName" type="text" class="form-control" placeholder="Father Name" value="{{ !empty($user->user_profile->father_name) ? $user->user_profile->father_name : old('fatherName') }}">
                                            @if($errors->has('fatherName'))
                                                <small class="text-danger">{{ $errors->first('fatherName') }}</small>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="motherName" class="profile-labels">Mother Name</label>
                                            <input name="motherName" id="motherName" type="text" class="form-control" value="{{ !empty($user->user_profile->mother_name) ? $user->user_profile->mother_name : old('motherName') }}" placeholder="Mother Name">
                                            @if($errors->has('motherName'))
                                                <small class="text-danger">{{ $errors->first('motherName') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="dob" class="profile-labels">Date Of Birth<small class="text-danger">*</small></label>
                                            <input name="dob" id="dob" type="text" class="form-control" placeholder="2021-01-18" value="{{ !empty($user->user_profile->dob) ? $user->user_profile->dob : old('dob') }}">
                                            @if($errors->has('dob'))
                                                <small class="text-danger">{{ $errors->first('dob') }}</small>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="gender" class="profile-labels">Gender<small class="text-danger">*</small></label>
                                            <select class="form-control" name="gender" id="gender">
                                                <option value="" @if(empty($user->user_profile->gender)) selected @endif>Select One</option>
                                                <option value="male" @if($user->user_profile->gender === 'male') selected @endif>Male</option>
                                                <option value="female" @if($user->user_profile->gender === 'female') selected @endif>Female</option>
                                                <option value="others" @if($user->user_profile->gender === 'others') selected @endif>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-right">
                                        <button class="btn btn-primary" type="submit">Save To Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{--Tab Start--}}
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                        </div>
                        {{--Tab Start--}}
                        <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
