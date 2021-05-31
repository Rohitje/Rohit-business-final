@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Home About</h4>
                    <a href="{{ route('add.about') }}"><button class="btn btn-info">Add About</button></a>
                    <br><br>
                    <div class="card">
                        <div class="card-header">All Sliders</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">Serial No.</th>
                                    <th scope="col" width="10%">Title</th>
                                    <th scope="col" width="5%">Short descscription</th>
                                    <th scope="col" width="10%">Long Description</th>
                                    <th scope="col" width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($homeAbout as $about)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $about -> title_about }}</td>
                                        <td>{{ $about -> short_desc }}</td>
                                        <td>{{ $about -> long_desc }}</td>
                                        <td>
                                            <a href="{{ url('about/edit/'.$about -> id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('about/delete/'.$about -> id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
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