@extends('master')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('products.store')}}" method="post" id="upload-image-form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Ürün Adı</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Ürün Açıklama</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                    <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
                <label>Marka</label>
                <select class="form-select" name="brand_id">
                    @foreach ($brands as $brand)
                    <option value={{$brand->id}}>{{$brand->name}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
                <input type="file" name="file" class="form-control" id="image-input">
                <span class="text-danger" id="image-input-error"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm btn-block mt-3">Ürün Ekle</button>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script>
    console.log('asd')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $('#upload-image-form').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: {{route('products.store')}},
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             if (response) {
               this.reset();
               alert('Image has been uploaded successfully');
             }
           },
           error: function(response){
              console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
           }
       });
  });

</script>
@endsection
