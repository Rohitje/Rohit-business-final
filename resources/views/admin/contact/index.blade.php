@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Contact Page</h4>
                    <a href="{{ route('add.contact') }}"><button class="btn btn-info">Add Contact</button></a>
                    <br><br>
                    <div class="card">
                        {{-- @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif --}}
                        <div class="card-header">All Contact Data</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">Serial No.</th>
                                    <th scope="col" width="20%">Address</th>
                                    <th scope="col" width="20%">Email</th>
                                    <th scope="col" width="5%">Phone</th>
                                    <th scope="col" width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $contact -> address }}</td>
                                        <td>{{ $contact -> email }}</td>
                                        <td>{{ $contact -> phone }}</td>
                                        <td>
                                            <a href="{{ url('contact/edit/'.$contact -> id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('contact/delete/'.$contact -> id) }}" class="btn btn-danger">Delete</a>
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