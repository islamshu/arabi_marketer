<form id="send_form">
    @csrf
    <div class="row">

        <div class="form-group col-md-6">

            <br><label> عنوان المقال :</label>

            <input type="text" id="title_ar" name="title_ar" required class="form-control form-control-solid"
                placeholder="العنوان بالعربية" />

        </div>
        <div class=" col-md-6">
            <div class="form-group">
                <br> <label data-error="wrong" data-success="right" for="form3"> صورة عن المقال <span
                        class="required"></span></label>
                <input type="file"  id="imageupload" name="images" class="form-control image">

            </div>
            <div class="form-group">
                <img src="" style="width: 100px"
                    class="img-thumbnail image-preview" alt="">
            </div>

        </div>

        <div class="form-group col-md-6">

            <br><label> الوصف :</label>
            <textarea name="description_ar" class="editor" id="kt_docs_ckeditor_classic"></textarea>

        </div>
        <div class="form-group col-md-6">

            <br><label> وصف مصغر  :</label>
            <textarea name="small_description" class="editor" id="kt_docs_ckeditor_classic"></textarea>

        </div>
        <div class="form-group col-md-6">
            
            <br><label> المستخدم :</label>
            <select class="form-select" required name="user_id"  data-control="select2" data-placeholder="اختر المستخدم">
                <option value="" selected disabled>يرجى الاختيار</option>
                @foreach (App\Models\User::get() as $item)
                <option value="{{ $item->id }}" >{{ $item->name }}</option>

                @endforeach
            </select>

        </div>
        <div class="form-group col-md-6">

            <br> <label>نوع المقال:</label>
            <select class="form-select form-control form-select-solid " id="type" name="type[]" multiple required
                data-control="select2" data-close-on-select="false" data-placeholder="اختر" data-allow-clear="true">
                <option value=""></option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>

        </div>
    

        <div class="form-group col-md-6">

            <br> <label>الكلمات المفتاحية:</label>
            <input class="form-control form-control-sm form-control-solid keywords" required name="keywords"
                placeholder="اضف كلمات مفتاحية" id="kt_tagify_3" />


        </div>
        
        
    </div>
    
     <br>
    <button class="btn btn-info" id="submitform" style="" type="submit">اضف جديد </i></button>
</form>
