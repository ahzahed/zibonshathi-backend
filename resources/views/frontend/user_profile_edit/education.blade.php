@extends('frontend.app')

@include('frontend.menu')

<section>
    <div class="container emp-profile mt-4">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('update_user_education/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Education</label>
                        <input type="text" class="form-control @error('education') is-invalid @enderror"
                            name="education" value="{{ $user->education }}">
                        @error('education')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>University</label>
                        <input type="text" class="form-control @error('university') is-invalid @enderror"
                            name="university" value="{{ $user->university }}">
                        @error('university')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Annual Income</label>
                        <input type="text" class="form-control @error('income') is-invalid @enderror"
                            name="income" value="{{ $user->income }}">
                        @error('income')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Working With</label>
                        <input type="text" class="form-control @error('workingwith') is-invalid @enderror"
                            name="workingwith" value="{{ $user->workingwith }}">
                        @error('workingwith')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Profession</label>
                        <input type="text" class="form-control @error('profession') is-invalid @enderror"
                            name="profession" value="{{ $user->profession }}">
                        @error('profession')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
