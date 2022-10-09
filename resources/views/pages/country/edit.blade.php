@extends('layout.main')
<div class="modal-body ">
    <div id="form-errors" class="text-center"></div>
    <div id="success" class="text-center"></div>
    <form id="edit_edit">
        @csrf

        <div class="form-group">
            <label data-error="wrong" data-success="right" for="form3">علم الدولة <span
                    class="required"></span></label>
            <input type="file" id="imageedit"  name="flag" class="form-control image">
        </div>
        <div class="form-group">
            <img src="{{ asset('uploads/' . $country->flag) }}" style="width: 100px" class="img-thumbnail image-preview"
                alt="">
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="email">الاسم بالعربية <span class="required"></span></label>
                <input type="text" name="title_ar" required class="form-control"
                    value="{{ $country->getTranslation('title', 'ar') }}" id="title_ar">
            </div>
            <div class="form-group col-md-6">
                <label for="email"> الاسم بالانجليزية <span class="required"></span></label>
                <input type="text" name="title_en" required class="form-control"
                    value="{{ $country->getTranslation('title', 'en') }}" id="title_en">
            </div>

            <div class="form-group col-md-6">
                <label for="commercial_register">كود الدولة :</label>
                <input type="text" name="code" value="{{ $country->code }}"
                    class="form-control" id="code">
            </div>
         
        </div>


        <button class="btn btn-info" type="submit">تعديل</i></button>
    </form>

</div>
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
 
 $('#edit_edit').on('submit', function(e) {
    e.preventDefault();

        var frm = $('#edit_edit');
        var token = "{{ csrf_token() }}";

        var formData = new FormData(frm[0]);
        formData.append('file', $('#imageedit')[0].files[0]);

        var data = $(this).serialize();

        $.ajax({
            url: "{{ route('update_country', $country->id) }}",
            type: "post",
            data: formData,
            processData: false,
            contentType: false,

            success: function(data) {

                swal("Edit successfully", {
                    buttons: false,
                    timer: 2000,
                    icon: "success"
                });
                setTimeout(function() {
                    window.location.reload();
                }, 1000);






            },
            error: function(data) {
                var errors = data.responseJSON;
                var errors = data.responseJSON;
                errorsHtml = '<div class="alert alert-danger"><ul>';
                $.each(errors.errors, function(k, v) {
                    errorsHtml += '<li>' + v + '</li>';
                });
                errorsHtml += '</ul></di>';
                $('#form-errors').html(errorsHtml);
            },
        });


    });  

        
        


</script>
@endsection

