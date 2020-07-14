@extends('backend.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if ($registeredUser->user_type == 0)
            <form>
                <input type="hidden" value="{{ $registeredUser->id }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->name }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->email }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->age }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Height</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->height }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Gender</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->gender }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Occupation</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->occupation }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email Varification</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->email_verified_at }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Weight</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->weight }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Bodytype</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->bodytype }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Blood</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->blood }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Smoke</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->smoke }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Complexion</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->complexion }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->dob }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Marital Status</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->maritalstatus }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Religion</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->religion }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->location }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Country Now Live In</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->country }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mother Tongue</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->mothertongue }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Grew Up</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->grewup }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Father Status</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->fatherstatus }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mother Status</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->motherstatus }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Brothers</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->brothers }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sisters</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->sisters }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>University</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->university }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Education</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->education }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Profession</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->profession }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Income</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->income }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Working</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->workingwith }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->userphone }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Facebook Id</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->userfacebook }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>About Details</label>
                            <textarea type="text" class="form-control" readonly>{{ $registeredUser->details }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Testimonial</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->testimonial }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Payment Date</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->payment_date }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Payment Experied</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->payment_exp }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Picture</label>
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img style="height: 150px; width:150px" src="{{ asset($registeredUser->avatar) }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img style="height: 150px; width:150px" src="{{ asset($registeredUser->gimage1) }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img style="height: 150px; width:150px" src="{{ asset($registeredUser->gimage2) }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img style="height: 150px; width:150px" src="{{ asset($registeredUser->gimage3) }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img style="height: 150px; width:150px" src="{{ asset($registeredUser->gimage4) }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            @endif

            @if ($registeredUser->user_type == 5)
            <form>
                <input type="hidden" value="{{ $registeredUser->id }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->name }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->email }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" value="{{ $registeredUser->userphone }}" readonly>
                        </div>
                    </div>
                </div>
            <form>
            @endif
        </div>
    </div>
</div>
@endsection
