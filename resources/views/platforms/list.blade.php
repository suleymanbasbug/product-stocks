@extends('master')
@section('content')
    
<a href="{{route("platforms.create")}}" class="btn btn-info btn-md btn-block"> <span
    class="glyphicon glyphicon-plus"></span>Platform Ekle</a>
<br>
@if (count($platforms)>0)
<table class="table">
    <thead>
    <tr>
    <th scope="col">Id</th>
    <th scope="col">Adı</th>
    <th scope="col">İşlemler</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($platforms as $platform)
    <tr>
        <td>{{$platform->id}}</td>
        <td>{{$platform->name}}</td>
    
        <td>
            <a href="{{route('platforms.edit',$platform->id)}}"
               class="btn btn-block btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span>
                Güncelle</a>
                <a data-url="{{route('brands.destroy',$platform->id)}}"
            class="btn btn-block btn-danger btn-xs delete-confirm"><span class="glyphicon glyphicon-pencil"></span>
             Sil</a>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
@else
    <div class="mt-4"><h2>Kayıtlı platform bulunamadı. Lütfen renk ekleyiniz...</h2></div>
@endif

@endsection