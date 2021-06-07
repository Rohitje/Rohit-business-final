@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Over</h4>
                    <a href="{{ route('add.about') }}"><button class="btn btn-info">Voeg Over Toe</button></a>
                    <br><br>
                    <div class="card">
                        <div class="card-header">Alle Dia's</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="2%">Serie Nr.</th>
                                    <th scope="col" width="2%">Titel</th>
                                    <th scope="col" width="5%">Korte Beschrijving</th>
                                    <th scope="col" width="10%">Lange Beschrijving</th>
                                    <th scope="col" width="5%">Actie</th>
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
                                            <a href="{{ url('about/edit/'.$about -> id) }}" class="btn btn-info">Bewerk</a>
                                            <a href="{{ url('about/delete/'.$about -> id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Verwijder</a>
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