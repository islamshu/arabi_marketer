@extends('layout.main')
<div class="modal-body ">
    <div id="form-errors" class="text-center"></div>
    <div id="success" class="text-center"></div>
<form id="edit_form_new">
    @csrf

    <div class="form-group">
        <label data-error="wrong" data-success="right" for="form3">الصورة <span
                class="required"></span></label>
        <input type="file" id="imagestore_edit"  name="icon" class="form-control image">
    </div>
    <div class="form-group">
        <img src="{{ asset('public/uploads/'.$place->logo) }}" style="width: 100px"
            class="img-thumbnail image-preview" alt="">
    </div>
    <div class="row">
        
        <div class="form-group col-md-6">
            <label for="email"> العنوان بالعربية: <span class="required"></span></label>
            <input type="text" name="title_ar" required class="form-control"
                value="{{ $place->getTranslation('title', 'ar') }}" id="title_ar">
        </div>
        <div class="form-group col-md-6">
            <label for="email"> العنوان بالانجليزية : <span class="required"></span></label>
            <input type="text" name="title_en" required class="form-control"
                value="{{ $place->getTranslation('title', 'en') }}" id="title_en">
        </div>
        <div class="form-group col-md-6">
            <label for="email"> فئة العرض  : <span class="required"></span></label>
            <select name="type" class="form-control" required id="">
                <option value=""  disabled>اختر </option>
                <option value="free" @if($place->type == 'free') selected @endif>Free</option>
                <option value="premium"@if($place->type != 'free') selected @endif>Premium</option>
            </select>                      
        </div>






    </div>
    <br>


    <button class="btn btn-info" type="submit">تعديل</i></button>
</form>
</div>
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
   
    $('#edit_form_new').on('submit', function(e) {
        e.preventDefault();
        var frm = $('#edit_form_new');
        var formData = new FormData(frm[0]);
        formData.append('file', $('#imagestore_edit')[0].files[0]);

        var data = $(this).serialize();

        updatefile("{{ route('update_places', $place->id) }}", 'post', formData, 'Edit successfully') ;

     


    });
</script>
@endsection
