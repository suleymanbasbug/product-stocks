@extends('master')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('colors.update',$color->id)}}">
                @method('PUT')
            @csrf
            <div class="form-group">
                <label>Renk Adı</label>
                <input type="text" name="name" class="form-control" required value="{{$color->name}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm btn-block mt-3">Renk Güncelle</button>
            </div>
            </form>
        </div>
    </div>
@endsection