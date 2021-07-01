@extends('master')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('platforms.update',$platform->id)}}">
                @method('PUT')
            @csrf
            <div class="form-group">
                <label>Platform Adı</label>
                <input type="text" name="name" class="form-control" required value="{{$platform->name}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm btn-block mt-3">Platform Güncelle</button>
            </div>
            </form>
        </div>
    </div>
@endsection