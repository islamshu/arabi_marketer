{{-- @extends('layout.main') --}}
<div class="modal-body ">
    <div id="form-errors" class="text-center"></div>
    <div id="success" class="text-center"></div>
    <form method="post" action="{{ route('update_specialty', $specialty->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label data-error="wrong" data-success="right" for="form3">  الصورة <span
                    class="required"></span></label>
            <input type="file" id="imageedit" name="icon" class="form-control image">
        </div>
        <div class="form-group">
            <img src="{{ asset('public/uploads/' . $specialty->image) }}" style="width: 100px"
                class="img-thumbnail image-preview" alt="">
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="email"> العنوان  <span class="required"></span></label>
                <input type="text" name="title_ar" required class="form-control"
                    value="{{ $specialty->getTranslation('title', 'ar') }}" id="title_ar">
            </div>
         



        </div>
        <br>


        <button class="btn btn-info" type="submit">تعديل</i></button>
    </form>

</div>
<script src="{{ asset('new_js/crud.js') }}"></script>
<script src="{{ asset('new_js/upload_file.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>

