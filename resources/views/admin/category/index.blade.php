@extends('admin.admin_master')

@section('admin')

  <div class="py-12">
      <div class="container">
          <div class="row">

            <div class="col-md-8">
              <div class="card">
                {{-- @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif --}}
                <div class="card-header">Alle Categorieën</div>
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Serie Nr.</th>
                      <th scope="col">Categorie Naam</th>
                      <th scope="col">Gebruiker</th>
                      <th scope="col">Gemaakt Op</th>
                      <th scope="col">Actie</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                    {{-- @php($i = 1) --}}
                    @foreach ($categories as $category)
                      <tr>
                        <th scope="row">{{ $categories -> firstItem() + $loop -> index }}</th>
                        <td>{{ $category -> category_name }}</td>
                        <td>{{ $category -> user -> name }}</td> {{-- user_id veranderen naar naam van de user --}}
                        <td>
                          @if ($category -> created_at == NULL)
                          <span class="text-danger">Geen datum gezet</span>
                          @else
                          {{ Carbon\Carbon::parse($category -> created_at) -> diffForHumans() }}
                          @endif
                        </td>
                        <td>
                          <a href="{{ url('category/edit/'.$category -> id) }}" class="btn btn-info">Edit</a>
                          <a href="{{ url('softdelete/category/'.$category -> id) }}" class="btn btn-danger">Verwijder</a>
                        </td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                {{ $categories -> links() }}
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">Voeg Categorie Toe</div>
                <div class="card-body">
                <form action="{{ route('store.category') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Categorie Naam</label>
                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Voeg Categorie Toe</button>
                </form>
              </div>
              </div>
            </div>
          </div>
      </div>


{{-- Thrash Part --}}
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">Vuilbak Lijst</div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Serie Nr.</th>
                    <th scope="col">Categorie Naam</th>
                    <th scope="col">Gebruiker</th>
                    <th scope="col">Gemaakt Op</th>
                    <th scope="col">Actie</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($trashCat as $category)
                    <tr>
                      <th scope="row">{{ $categories -> firstItem() + $loop -> index }}</th>
                      <td>{{ $category -> category_name }}</td>
                      <td>{{ $category -> user -> name }}</td> {{-- user_id veranderen naar naam van de user --}}
                      <td>
                        @if ($category -> created_at == NULL)
                          <span class="text-danger">Geen datum gezet</span>
                        @else
                          {{ Carbon\Carbon::parse($category -> created_at) -> diffForHumans() }}
                        @endif
                      </td>
                      <td>
                        <a href="{{ url('category/restore/'.$category -> id) }}" class="btn btn-info">Herstel</a>
                        <a href="{{ url('pdelete/category/'.$category -> id) }}" class="btn btn-danger">Verwijder Voorgoed</a>
                      </td>
                    </tr>
                  @endforeach
                  
                </tbody>
              </table>
              {{ $trashCat -> links() }}
            </div>
          </div>
        </div>
    </div>        

{{-- End Thrash Part --}}

  </div>
@endsection
