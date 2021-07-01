@extends('master')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('productstocks.store')}}">
            @csrf
            <div class="form-group mt-2">
                <label>Ürün</label>
                <select class="form-select mt-2" name="product_id">
                    @foreach ($products as $product)
                    <option value={{$product->id}}>{{$product->name}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group mt-2">
                <label>Renk</label>
                <select class="form-select mt-2" name="color_id">
                    @foreach ($colors as $color)
                    <option value={{$color->id}}>{{$color->name}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group mt-2">
                <label>Özellik</label>
                <select class="form-select mt-2" name="attribute_id">
                    @foreach ($attributes as $attribute)
                    <option value={{$attribute->id}}>{{$attribute->name}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group mt-2">
                <label>Platform</label>
                <select class="form-select mt-2" name="platform_id">
                    @foreach ($platforms as $platform)
                    <option value={{$platform->id}}>{{$platform->name}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group mt-2">
                <label>Stok</label>
                <input type="number" name="stock" class="form-control mt-2" required>
            </div>
            <div class="form-group mt-2">
                <label>Fiyat</label>
                <input type="number" name="price" class="form-control mt-2" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm btn-block mt-3">Stok Ekle</button>
            </div>
            </form>
        </div>
    </div>
@endsection