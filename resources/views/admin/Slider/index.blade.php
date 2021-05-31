@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Home Slider</h4>
                    <a href="{{ route('add.slider') }}"><button class="btn btn-info">Add Slider</button></a>
                    <br><br>
                <div class="card">
                    <div class="card-header">All Sliders</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">Serial No.</th>
                                <th scope="col" width="5%">Slider Title</th>
                                <th scope="col" width="20%">Slider Description</th>
                                <th scope="col" width="5%">Image</th>
                                <th scope="col" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($sliders as $slider)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $slider -> title }}</td>
                                    <td>{{ $slider -> description }}</td>
                                    <td><img src="{{ asset($slider -> image) }}" alt="" style="height:40px; width:70px;"></td>
                                    <td>
                                        <a href="{{ url('slider/edit/'.$slider -> id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('slider/delete/'.$slider -> id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
