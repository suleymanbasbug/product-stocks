@extends('master')
@section('content')
    
<a href="{{route("attributes.create")}}" class="btn btn-info btn-md btn-block"> <span
    class="glyphicon glyphicon-plus"></span>Özellik Ekle</a>
<br>
@if (count($attributes)>0)
<table class="table">
    <thead>
    <tr>
    <th scope="col">Id</th>
    <th scope="col">Adı</th>
    <th scope="col">İşlemler</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($attributes as $attribute)
    <tr>
        <td>{{$attribute->id}}</td>
        <td>{{$attribute->name}}</td>
    
        <td>
            <a href="{{route('attributes.edit',$attribute->id)}}"
               class="btn btn-block btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span>
                Güncelle</a>
                <a data-url="{{route('attributes.destroy',$attribute->id)}}"
            class="btn btn-block btn-danger btn-xs delete-confirm"><span class="glyphicon glyphicon-pencil"></span>
             Sil</a>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
@else
    <div class="mt-4"><h2>Kayıtlı özellik bulunamadı. Lütfen özellik ekleyiniz...</h2></div>
@endif

@endsection