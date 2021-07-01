@extends('master')
@section('head-style')
<style>
    .product-images img {
      padding: 6px;
      max-width: 100px;
    }
  </style>
@endsection
@section('content')
    
<a href="{{route("products.create")}}" class="btn btn-info btn-md btn-block"> <span
    class="glyphicon glyphicon-plus"></span>Ürün Ekle</a>
<br>
<table class="table">
<thead>
<tr>
<th scope="col">Id</th>
<th scope="col">Adı</th>
<th scope="col">Acıklama</th>
<th scope="col">Resimler</th>
<th scope="col">Kategori</th>
<th scope="col">Marka</th>
<th scope="col">İşlemler</th>
</tr>
</thead>
<tbody>
@foreach ($products as $product)
<tr>
    <td>{{$product->id}}</td>
    <td>{{$product->name}}</td>
    <td>{{$product->description}}</td>
    @if (count($product->images)>0)
    <td>
        <div class="product-images">
            @foreach ($product->images as $image)
            <img src="{{URL::asset($image->path)}}" alt="">    
            @endforeach   
        </div>
    </td>
    @else
    <td></td>
    @endif
    <td>{{$product->category->name}}</td>
    <td>{{$product->brand->name}}</td>

    <td>
        <a href="{{route('products.edit',$product->id)}}"
           class="btn btn-block btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span>
            Güncelle</a>
            <a data-url="{{route('products.destroy',$product->id)}}"
        class="btn btn-block btn-danger btn-xs delete-confirm"><span class="glyphicon glyphicon-pencil"></span>
         Sil</a>
    </td>
</tr>
@endforeach
</tbody>
</table>
@endsection