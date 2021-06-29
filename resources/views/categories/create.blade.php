@extends('master')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('categories.store')}}">
            @csrf
            <div class="form-group">
                <label>Kategori Adı</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm btn-block mt-3">Kategori Ekle</button>
            </div>
            </form>
        </div>
    </div>
@endsection