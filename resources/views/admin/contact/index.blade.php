@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Contact Pagina</h4>
                    <a href="{{ route('add.contact') }}"><button class="btn btn-info">Voeg Contact Toe</button></a>
                    <br><br>
                    <div class="card">
                        {{-- @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif --}}
                        <div class="card-header">Alle Contact Data</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">Serie Nr.</th>
                                    <th scope="col" width="10%">Adres</th>
                                    <th scope="col" width="10%">E-mail</th>
                                    <th scope="col" width="5%">Telefoon</th>
                                    <th scope="col" width="5%">Actie</th>
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
                                            <a href="{{ url('contact/edit/'.$contact -> id) }}" class="btn btn-info">Bewerk</a>
                                            <a href="{{ url('contact/delete/'.$contact -> id) }}" class="btn btn-danger">Verwijder</a>
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