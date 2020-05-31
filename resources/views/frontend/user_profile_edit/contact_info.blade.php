@extends('frontend.app')

@include('frontend.menu')

<section>
    <div class="container emp-profile mt-4">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('update_user_contact/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" class="form-control @error('userphone') is-invalid @enderror" name="userphone"
                            value="{{ $user->userphone }}">
                        @error('userphone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Facebook Link</label>
                        <input type="text" class="form-control @error('userfacebook') is-invalid @enderror" name="userfacebook"
                            value="{{ $user->userfacebook }}">
                        @error('userfacebook')
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
