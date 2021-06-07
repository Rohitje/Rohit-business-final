@extends('admin.admin_master')

@section('admin')

    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Verander Passwoord</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}" class="form-pill">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput3">Huidige passwoord</label>
                    <input type="password" class="form-control" id="current_password" name="oldpassword" placeholder="Enter huidige passwoord">
                    @error('oldpassword')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword3">Nieuwe Passwoord</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter nieuwe passwoord">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword3">Bevestig Passwoord</label>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Bevestig passwoord">
                </div>
                <button type="submit" class="btn btn-primary btn-default">Bewaar</button>
            </form>
        </div>
    </div>

@endsection