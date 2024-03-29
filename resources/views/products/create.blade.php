@extends('master')
@section('head-style')
<style>
  .show-multiple-image-preview img {
    padding: 6px;
    max-width: 100px;
  }
</style>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form
          id="multiple-image-preview-ajax"
          method="POST"
          action="{{route('products.store')}}"
          accept-charset="utf-8"
          enctype="multipart/form-data"
        >
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
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input
                      type="file"
                      name="images[]"
                      id="images"
                      placeholder="Choose images"
                      multiple
                    />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mt-1 text-center">
                    <div class="show-multiple-image-preview"></div>
                  </div>
                </div>
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
    $(document).ready(function (e) {
      let images1 = [];
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });
      $(function () {
        var ShowMultipleImagePreview = function (
          input,
          imgPreviewPlaceholder
        ) {
          if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
              var reader = new FileReader();
              reader.onload = function (event) {
                $($.parseHTML("<img>"))
                  .attr("src", event.target.result)
                  .appendTo(imgPreviewPlaceholder);
              };
              reader.readAsDataURL(input.files[i]);
            }
          }
        };
        $("#images").on("change", function () {
          ShowMultipleImagePreview(this, "div.show-multiple-image-preview");
          images1.push($("#images")[0].files[0]);
        });
      });
      $("#multiple-image-preview-ajax").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        let TotalImages = images1.length;
        for (let i = 0; i < TotalImages; i++) {
          formData.append("images" + i, images1[i]);
        }
        formData.append("TotalImages", TotalImages);
        $.ajax({
          type: "POST",
          url: "{{ url('admin/products')}}",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: (data) => {
            window.location.href = "/admin/products";
          },
          error: function (data) {
            console.log(data);
          },
        });
      });
    });
  </script>
 
@endsection