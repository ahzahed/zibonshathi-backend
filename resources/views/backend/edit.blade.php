@extends('backend.app')

@section('content')

    <div class="sl-mainpanel">



        <div class="sl-pagebody">

            <div class="sl-page-title">
                <h5>Category Table</h5>
            </div><!-- sl-page-title -->


            <div class="row">
                <div class="col-md-6">
                    <div class="card pd-20 pd-sm-40">
                        <form action="{{ url('category/'.$edit->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <laebl for="categoryName"><h6>Category Name</h6></laebl>
                                <input type="text" name="category_name" class="form-control" value="{{ $edit->category_name }}" required>
                            </div>
                            <div class="form-group">
                                <laebl for="categoryStatus">Change Status</laebl>
                                <br>
                                @if($edit->status == 1)
                                    <input type="radio" name="status" value="1" checked> <span class="badge badge-success">active</span>
                                    <input type="radio" name="status" value="0"> <span class="badge badge-warning">inactive</span>
                                @else
                                    <input type="radio" name="status" value="1"> <span class="badge badge-success">active</span>
                                    <input type="radio" name="status" value="0" checked> <span class="badge badge-warning">inactive</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- sl-pagebody -->



@endsection
