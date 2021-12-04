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
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
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
                                <div class="row mt-2">
                                    <div class="col-md-6"><label for="fullName" class="profile-labels">Full Name</label><input name="fullName" id="fullName" type="text" class="form-control" placeholder="Full Name" value="{{ $user->user_profile->full_name ?? '' }}"></div>
                                    <div class="col-md-6"><label for="name" class="profile-labels">User Name</label><input name="name" id="name" type="text" class="form-control" value="{{ $user->name ?? '' }}" placeholder="User Name"></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label for="email" class="profile-labels">Email</label><input name="email" id="email" type="email" class="form-control" placeholder="Email" value="{{ $user->email ?? '' }}"></div>
                                    <div class="col-md-6"><label for="contactNumber" class="profile-labels">Contact Number</label><input name="contactNumber" id="contactNumber" type="text" class="form-control" value="{{ $user->contact_number ?? '' }}" placeholder="+8801683201359"></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label for="fatherName" class="profile-labels">Father Name</label><input name="fatherName" id="fatherName" type="text" class="form-control" placeholder="Father Name" value="{{ $user->user_profile->father_name ?? '' }}"></div>
                                    <div class="col-md-6"><label for="motherName" class="profile-labels">Mother Name</label><input name="motherName" id="motherName" type="text" class="form-control" value="{{ $user->user_profile->mother_name ?? '' }}" placeholder="Mother Name"></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label for="dob" class="profile-labels">Date Of Birth</label><input name="dob" id="dob" type="text" class="form-control" placeholder="2021-01-18" value="{{ $user->user_profile->dob ?? '' }}"></div>
                                    <div class="col-md-6"><label for="gender" class="profile-labels">Gender</label><input name="gender" id="gender" type="text" class="form-control" value="{{ $user->user_profile->gender ?? '' }}" placeholder="Gender"></div>
                                </div>
                                <div class="mt-5 text-center">
                                    <button class="btn btn-primary" type="button">Save Profile</button>
                                </div>
                            </div>
                        </div>
                        {{--Tab Start--}}
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                        </div>
                        {{--Tab Start--}}
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                        </div>
                        {{--Tab Start--}}
                        <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                            Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
