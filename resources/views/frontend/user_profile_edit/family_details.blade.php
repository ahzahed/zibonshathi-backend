@extends('frontend.app')

@include('frontend.menu')

<section>
    <div class="container emp-profile mt-4">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('update_user_family/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Father Status</label>
                        <select class="form-control @error('fatherstatus') is-invalid @enderror" name="fatherstatus" required="">
                            <option value="{{ $user->fatherstatus }}">{{ $user->fatherstatus }}</option>
                            <option value="Employed" label="Employed">Employed</option>
                            <option value="Business" label="Business">Business</option>
                            <option value="Retired" label="Retired">Retired</option>
                            <option value="Not Employed" label="Not Employed">Not Employed</option>
                            <option value="Passed Away" label="Passed Away">Passed Away</option>
                            <option value="Professional" label="Professional">Professional</option>
                        </select>
                        @error('fatherstatus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Mother Status</label>
                        <select class="form-control @error('motherstatus') is-invalid @enderror" name="motherstatus" required="">
                            <option value="{{ $user->motherstatus }}">{{ $user->motherstatus }}</option>
                            <option value="Employed" label="Employed">Employed</option>
                            <option value="Business" label="Business">Business</option>
                            <option value="Retired" label="Retired">Retired</option>
                            <option value="Not Employed" label="Not Employed">Not Employed</option>
                            <option value="Passed Away" label="Passed Away">Passed Away</option>
                            <option value="Professional" label="Professional">Professional</option>
                        </select>
                        @error('motherstatus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>No. of Brothers</label>
                        <input type="text" class="form-control @error('brothers') is-invalid @enderror"
                            name="brothers" value="{{ $user->brothers }}">
                        @error('brothers')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>No. of Sisters</label>
                        <input type="text" class="form-control @error('sisters') is-invalid @enderror"
                            name="sisters" value="{{ $user->sisters }}">
                        @error('sisters')
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
