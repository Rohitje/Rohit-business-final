@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Maak Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.contact') }}" method="POST">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                 @endif
                <div class="form-group">
                    <label for="exampleFormControlInput1">E-mail</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Telefoon</label>
                    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Telefoon Number">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Adres</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Verzend</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection