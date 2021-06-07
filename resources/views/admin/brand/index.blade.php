@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

              <div class="col-md-8">
                <div class="card">
                  <div class="card-header">Alle Merken</div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Serial Nr.</th>
                        <th scope="col">Merk Name</th>
                        <th scope="col">Merk Image</th>
                        <th scope="col">Gemaakt Op</th>
                        <th scope="col">Actie</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                      {{-- @php($i = 1) --}}
                      @foreach ($brands as $brand)
                        <tr>
                          <th scope="row">{{ $brands -> firstItem() + $loop -> index }}</th>
                          <td>{{ $brand -> brand_name }}</td>
                          <td><img src="{{ asset($brand -> brand_image) }}" alt="" style="height:40px; width:70px;"></td>
                          <td>
                            @if ($brand -> created_at == NULL)
                              <span class="text-danger">No date set</span>
                            @else
                              {{ Carbon\Carbon::parse($brand -> created_at) -> diffForHumans() }}
                            @endif
                          </td>
                          <td>
                            <a href="{{ url('brand/edit/'.$brand -> id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ url('brand/delete/'.$brand -> id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $brands -> links() }}
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">Voeg Merk Toe</div>
                  <div class="card-body">
                  <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Merknaam</label>
                      <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('brand_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Merk Foto</label>
                      <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('brand_image')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Voeg Merk Toe</button>
                  </form>
                </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
