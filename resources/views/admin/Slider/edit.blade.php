@extends('admin.admin_master')

@section('admin')

    @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    @endif

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Slider</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('slider/update/' . $slider -> id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Slider Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $slider -> title }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Slider Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">
                        {{ $slider -> description }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Slider Image</label>
                    <input type="file" name="image" value="{{ $slider -> image }}" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection