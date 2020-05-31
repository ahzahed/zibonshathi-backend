@extends('frontend.app')

@include('frontend.menu')

<section>
    <div class="container emp-profile mt-4">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('update_user_basics/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="text" class="form-control @error('dob') is-invalid @enderror" name="dob"
                            value="{{ $user->dob }}">
                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Grew Up In</label>
                        <input type="text" class="form-control @error('grewup') is-invalid @enderror" name="grewup"
                            value="{{ $user->grewup }}">
                        @error('grewup')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Blood</label>
                        <input type="text" class="form-control @error('blood') is-invalid @enderror" name="blood"
                            value="{{ $user->blood }}">
                        @error('blood')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Weight</label>
                        <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight"
                            value="{{ $user->weight }}">
                        @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Smoke</label>
                        <input type="text" class="form-control @error('smoke') is-invalid @enderror" name="smoke"
                            value="{{ $user->smoke }}">
                        @error('smoke')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Body Type</label>
                        <select name="bodytype" class="form-control @error('bodytype') is-invalid @enderror">
                            <option value="{{ $user->bodytype }}">{{ $user->bodytype }}</option>
                            <option value="Average">Average</option>
                            <option value="Slim">Slim</option>
                            <option value="Athletic">Athletic</option>
                            <option value="Heavy">Heavy</option>
                        </select>
                        @error('bodytype')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Complexion</label>
                        <select name="complexion" class="form-control @error('complexion') is-invalid @enderror">
                            <option value="{{ $user->complexion }}">{{ $user->complexion }}</option>
                            <option value="Very Fair">Very Fair</option>
                            <option value="Fair">Fair</option>
                            <option value="Wheatish">Wheatish</option>
                            <option value="Dark">Dark</option>
                        </select>
                        @error('complexion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="country">Country Now Live In</label>
                        <select class="form-control @error('country') is-invalid @enderror" name="country">
                            <option value="{{ $user->country }}">{{ $user->country }}</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="Canada">Canada</option>
                        </select>
                        @error('country')
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
