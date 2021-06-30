@extends('master')
@section('content')
    
<a href="{{route("brands.create")}}" class="btn btn-info btn-md btn-block"> <span
    class="glyphicon glyphicon-plus"></span>Marka Ekle</a>
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
@foreach ($brands as $brand)
<tr>
    <td>{{$brand->id}}</td>
    <td>{{$brand->name}}</td>

    <td>
        <a href="{{route('brands.edit',$brand->id)}}"
           class="btn btn-block btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span>
            Güncelle</a>
            <a data-url="{{route('brands.destroy',$brand->id)}}"
        class="btn btn-block btn-danger btn-xs delete-confirm"><span class="glyphicon glyphicon-pencil"></span>
         Sil</a>
    </td>
</tr>
@endforeach
</tbody>
</table>
@endsection