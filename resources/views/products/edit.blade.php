@extends('master')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('products.update',$product->id)}}">
                @method('PUT')
            @csrf
            <div class="form-group">
                <label>Ürün Adı</label>
                <input type="text" name="name" class="form-control" required value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label>Ürün Açıklama</label>
                <input type="text" name="description" class="form-control" required value="{{$product->description}}">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                    @if ($category->id == $product->category_id)
                    <option selected value={{$category->id}}>{{$category->name}}</option>
                    @else
                    <option value={{$category->id}}>{{$category->name}}</option>
                    @endif
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
                <label>Marka</label>
                <select class="form-select" name="brand_id">
                    @foreach ($brands as $brand)
                    @if ($brand->id == $product->brand_id)
                    <option selected value={{$brand->id}}>{{$brand->name}}</option>
                    @else
                    <option value={{$brand->id}}>{{$brand->name}}</option>
                    @endif
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm btn-block mt-3">Kategori Güncelle</button>
            </div>
            </form>
        </div>
    </div>
@endsection