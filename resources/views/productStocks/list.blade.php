@extends('master')
@section('content')
    
<a href="{{route("productstocks.create")}}" class="btn btn-info btn-md btn-block"> <span
    class="glyphicon glyphicon-plus"></span>Stok Bilgisi Ekle</a>
<br>
@if (count($productStocks)>0)
<table class="table">
    <thead>
    <tr>
    <th scope="col">Id</th>
    <th scope="col">Adı</th>
    <th scope="col">İşlemler</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($productStocks as $productStock)
    <tr>
        <td>{{$productStock->id}}</td>
        <td>{{$productStock->name}}</td>
    
        <td>
            <a href="{{route('colors.edit',$productStock->id)}}"
               class="btn btn-block btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span>
                Güncelle</a>
                <a data-url="{{route('brands.destroy',$productStock->id)}}"
            class="btn btn-block btn-danger btn-xs delete-confirm"><span class="glyphicon glyphicon-pencil"></span>
             Sil</a>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
@else
    <div class="mt-4"><h4>Herhangi bir platforma kayıtlı ürününüz bulunmamakta...</h4></div>
@endif

@endsection