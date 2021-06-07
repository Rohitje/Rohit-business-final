@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Dia's</h4>
                    <a href="{{ route('add.slider') }}"><button class="btn btn-info">Voeg Dia Toe</button></a>
                    <br><br>
                <div class="card">
                    <div class="card-header">Alle Dia's</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">Serie Nr.</th>
                                <th scope="col" width="5%">Dia Titel</th>
                                <th scope="col" width="20%">Dia Beschrijving</th>
                                <th scope="col" width="5%">Foto</th>
                                <th scope="col" width="10%">Actie</th>
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
                                        <a href="{{ url('slider/delete/'.$slider -> id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Verwijder</a>
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
