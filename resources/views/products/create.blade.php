@extends('master')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('products.store')}}">
            @csrf
            <div class="form-group">
                <label>Ürün Adı</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Ürün Açıklama</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                    <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
                <label>Marka</label>
                <select class="form-select" name="brand_id">
                    @foreach ($brands as $brand)
                    <option value={{$brand->id}}>{{$brand->name}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm btn-block mt-3">Ürün Ekle</button>
            </div>
            </form>
        </div>
    </div>
@endsection