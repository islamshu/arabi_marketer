@extends('layout.main')
<div class="modal-body ">
    <div id="form-errors" class="text-center"></div>
    <div id="success" class="text-center"></div>
    <form id="edit_form_new" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="email"> الدولة : <span class="required"></span></label>
                <select name="country_id" required class="form-control">
                    <option value="" selected disabled>اختر الدولة</option>
                    @foreach (App\Models\Country::get() as $item)
                    <option value="{{ $item->id }}" @if($city->country_id == $item->id) selected @endif >{{ $item->title }} </option>

                    @endforeach
                </select>
            </div>
        </div>

         <div class="row">
            <div class="form-group col-md-6">
                <label for="email"> العنوان بالعربية <span class="required"></span></label>
                <input type="text" name="title_ar" required class="form-control"
                    value="{{ $city->getTranslation('title', 'ar') }}" id="title_ar">
            </div>
            <div class="form-group col-md-6">
                <label for="email"> العنوان بالانجليزية <span class="required"></span></label>
                <input type="text" name="title_en" required class="form-control"
                    value="{{ $city->getTranslation('title', 'en') }}" id="title_en">
            </div>



        </div>
        <br>


        <button class="btn btn-info" type="submit">تعديل</i></button>
    </form>

</div>
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
    $(".image").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }

    });
    $('#edit_form_new').on('submit', function(e) {
        e.preventDefault();
        var frm = $('#edit_form_new');
        var data = $(this).serialize();
         update("{{ route('update_city', $city->id) }}", 'post', data, 'Edit successfully') ;

      


    });
</script>
@endsection
