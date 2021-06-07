@extends('admin.admin_master')

@section('admin')

  <div class="py-12">
      <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">Bewerk Categorie</div>
                <div class="card-body">
                <form action="{{ url('category/update/'.$categories -> id) }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Update Categorie Naam</label>
                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $categories -> category_name }}">
                      @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Update Categorie</button>
                </form>
              </div>
              </div>
            </div>
          </div>
      </div>
  </div>
@endsection