{{-- @extends('layout.main') --}}
<div class="modal-body ">
    <div id="form-errors" class="text-center"></div>
    <div id="success" class="text-center"></div>
    <form method="post" action="{{ route('update_country',$country->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label data-error="wrong" data-success="right" for="form3">علم الدولة <span
                    class="required"></span></label>
            <input type="file" id="imageedit"  name="flag" class="form-control image">
        </div>
        <div class="form-group">
            <img src="{{ asset('public/uploads/' . $country->flag) }}" style="width: 100px" class="img-thumbnail image-preview"
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

