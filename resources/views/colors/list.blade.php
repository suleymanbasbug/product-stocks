@extends('master')
@section('content')
    
<a href="{{route("colors.create")}}" class="btn btn-info btn-md btn-block"> <span
    class="glyphicon glyphicon-plus"></span>Renk Ekle</a>
<br>
@if (count($colors)>0)
<table class="table">
    <thead>
    <tr>
    <th scope="col">Id</th>
    <th scope="col">Adı</th>
    <th scope="col">İşlemler</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($colors as $color)
    <tr>
        <td>{{$color->id}}</td>
        <td>{{$color->name}}</td>
    
        <td>
            <a href="{{route('colors.edit',$color->id)}}"
               class="btn btn-block btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span>
                Güncelle</a>
                <a data-url="{{route('brands.destroy',$color->id)}}"
            class="btn btn-block btn-danger btn-xs delete-confirm"><span class="glyphicon glyphicon-pencil"></span>
             Sil</a>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
@else
    <div class="mt-4"><h2>Kayıtlı renk bulunamadı. Lütfen renk ekleyiniz...</h2></div>
@endif

@endsection