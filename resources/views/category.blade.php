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
            <button onclick="catdel(this.id)" id="{{$category->id}}"
        class="btn btn-block btn-danger btn-xs"><span class="glyphicon glyphicon-pencil"></span>
         Sil</button>
    </td>
</tr>
@endforeach
</tbody>
</table>
@endsection 
@section('script')
    <script>
        function catdel (sd) {
            Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
    console.log(sd)
    window.location.href = "{{URL::to('categories/')}}"
  }
})
        }
        var id = '123';
    </script>
@endsection