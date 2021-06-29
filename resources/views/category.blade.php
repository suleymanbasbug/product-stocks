@extends('master')
@section('content')
    
<a href="{{route("categories.create")}}" class="btn btn-info btn-md btn-block"> <span
    class="glyphicon glyphicon-plus"></span>Kategori Ekle</a>
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
@foreach ($categories as $category)
<tr>
    <td>{{$category->id}}</td>
    <td>{{$category->name}}</td>

    <td>
        <a href="{{route('categories.edit',$category->id)}}"
           class="btn btn-block btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span>
            Güncelle</a>
            <a href=""
        class="btn btn-block btn-danger btn-xs"><span class="glyphicon glyphicon-pencil"></span>
         Sil</a>
    </td>
</tr>
@endforeach
</tbody>
</table>
@endsection 