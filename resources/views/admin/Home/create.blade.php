@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Maak Over</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.about') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Titel</label>
                    <input type="text" name="title_about" class="form-control" id="exampleFormControlInput1" placeholder="Titel">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Korte Beschrijving</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="short_desc"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Lange Beschrijving</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="long_desc"></textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Verzend</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection