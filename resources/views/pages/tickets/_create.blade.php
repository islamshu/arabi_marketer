<div id="form-errors"></div>
<form method="post" action="{{ route('videos.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="form-group col-md-6">

            <br><label> عنوان الفيديو :</label>

            <input type="text" id="title_ar" name="title" required class="form-control form-control-solid"
                placeholder="العنوان " />

        </div>
        <div class=" col-md-6">
            <div class="form-group">
                <br> <label data-error="wrong" data-success="right" for="form3"> صورة الفيديو (800*470)  <span
                        class="required"></span></label>
                {{-- <input type="file" multiple id="imageupload" name="images[]" class="form-control"> --}}
                <input id="imagestore" class="form-control image" required type="file" name="image" ><br />
     

            </div>
            <div class="form-group">
                <img src="" style="width: 100px"
                    class="img-thumbnail image-preview" alt="">
            </div>

        </div>
        <div class="form-group col-md-8">

            <br><label> الوصف :</label>
            <textarea name="description" class="form-control form-control-solid" ></textarea>

        </div>

       
        <div class="form-group col-md-6">

            <br> <label>نوع الفيديو:</label>
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
       
        <div class="form-group col-md-6">

            <br> <label>المستخدم:</label>
            <select class="form-select" required name="user_id"  data-control="select2" data-placeholder="اختر المستخدم">
                <option value="" selected disabled>يرجى الاختيار</option>
                @foreach (App\Models\User::get() as $item)
                <option value="{{ $item->id }}" >{{ $item->name }}</option>

                @endforeach
            </select>
          


        </div>
        <div class="form-group col-md-6">

            <br> <label>نوع الفيديو :</label>
            <select name="type_video" class="form-control"  required id="type_file">
                <option value="" selected disabled>يرحى الاختيار</option>
                <option value="file">ملف</option>
                <option value="url">رابط</option>

            </select>
          


        </div>
        <div class=" col-md-6 video"  style="display: none;">
            <div class="form-group">
                <br> <label data-error="wrong" data-success="right" for="form3"> الفيديو  <span
                        class="required"></span></label>
                {{-- <input type="file" multiple id="imageupload" name="images[]" class="form-control"> --}}
                <input id="video" class="form-control "  type="file" name="video" ><br />
     

            </div>
           

        </div>
        <div class=" col-md-6 url" style="display: none;">
            <div class="form-group">
                <br> <label data-error="wrong" data-success="right" for="form3"> الرابط  <span
                        class="required"></span></label>
                {{-- <input type="file" multiple id="imageupload" name="images[]" class="form-control"> --}}
                <input id="url" class="form-control"  type="url" name="url" ><br />
     

            </div>
           

        </div>
        
    </div>
    
     <br>
    <button class="btn btn-info" id="submitform" style="" type="submit">اضف جديد </i></button>
</form>

