@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Admin Berichten</h4>
                    <div class="card">
                        <div class="card-header">Alle Berichten Data</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">Serie Nr.</th>
                                    <th scope="col" width="10%">Naam</th>
                                    <th scope="col" width="15%">E-mail</th>
                                    <th scope="col" width="20%">Onderwerp</th>
                                    <th scope="col" width="25%">Bericht</th>
                                    <th scope="col" width="5%">Actie</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($messages as $message)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $message -> name }}</td>
                                        <td>{{ $message -> email }}</td>
                                        <td>{{ $message -> subject }}</td>
                                        <td>{{ $message -> message }}</td>
                                        <td>
                                            <a href="{{ url('admin/delete/'.$message -> id) }}" onclick="return confirm('Are you sure you want to delete the message?')" class="btn btn-danger">Verwijder</a>
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