{{-- @extends('layout.main') --}}
<div class="modal-body ">
    <div id="form-errors" class="text-center"></div>
    <div id="success" class="text-center"></div>
    <form id="edit_form_new" enctype="multipart/form-data">
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
                <label for="email"> العنوان بالعربية <span class="required"></span></label>
                <input type="text" name="title_ar" required class="form-control"
                    value="{{ $specialty->getTranslation('title', 'ar') }}" id="title_ar">
            </div>
            <div class="form-group col-md-6">
                <label for="email"> العنوان بالانجليزية <span class="required"></span></label>
                <input type="text" name="title_en" required class="form-control"
                    value="{{ $specialty->getTranslation('title', 'en') }}" id="title_en">
            </div>



        </div>
        <br>


        <button class="btn btn-info" type="submit">تعديل</i></button>
    </form>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
   
    $('#edit_form_new').on('submit', function(e) {
        e.preventDefault();
        var frm = $('#edit_form_new');
        var formData = new FormData(frm[0]);
        formData.append('file', $('#imageedit')[0].files[0]);

        var data = $(this).serialize();

        update("{{ route('update_specialty', $specialty->id) }}", 'post', formData, 'Edit successfully') ;

     


    });
</script>