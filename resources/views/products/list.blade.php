@extends('master')
@section('content')
    
<a href="{{route("products.create")}}" class="btn btn-info btn-md btn-block"> <span
    class="glyphicon glyphicon-plus"></span>Ürün Ekle</a>
<br>
<table class="table">
<thead>
<tr>
<th scope="col">Id</th>
<th scope="col">Adı</th>
<th scope="col">İşlemler</th>
</tr>
</thead>
<tbody>
@foreach ($products as $product)
<tr>
    <td>{{$product->id}}</td>
    <td>{{$product->name}}</td>

    <td>
        <a href=""
           class="btn btn-block btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span>
            Güncelle</a>
            <a data-url=""
        class="btn btn-block btn-danger btn-xs delete-confirm"><span class="glyphicon glyphicon-pencil"></span>
         Sil</a>
    </td>
</tr>
@endforeach
</tbody>
</table>
@endsection