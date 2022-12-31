<form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data" >
    @csrf
    <div class="row">

        <div class="form-group col-md-6">

            <br><label> نوع الخدمة :</label>

           <select name="type_service" id="type_service" required class="form-control">
            <option value="">يرجى اختيار نوع الخدمة</option>
            <option value="digital">رقمي</option>
            <option value="service">خدمة</option>
           </select>

        </div>
        <div class="form-group col-md-6">

            <br><label> عنوان الخدمة :</label>

            <input type="text" id="title_ar" name="title_ar" required class="form-control form-control-solid"
                placeholder="العنوان بالعربية" />

        </div>

        <div class="form-group col-md-8">

            <br><label> الوصف :</label>
            <textarea name="description_ar"  class="editor" id="kt_docs_ckeditor_classic"></textarea>

        </div>

        <div class="form-group col-md-6">

            <br> <label>التصنيف:</label>
            <select class="form-select form-control form-select-solid " id="specialty" name="specialty[]" multiple
                required data-control="select2" data-close-on-select="false" data-placeholder="اختر"
                data-allow-clear="true">
                <option value=""></option>
                @foreach ($specialty as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>


        </div>
        <div class="form-group col-md-6">

            <br> <label>نوع الخدمة:</label>
            <select class="form-select form-control form-select-solid  typeee" id="type" name="type[]" multiple required
                data-control="select2" data-close-on-select="false" data-placeholder="اختر" data-allow-clear="true">
                <option value=""></option>
               
            </select>

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
    </div>
    <div class="row">
        
        <div class="form-group col-md-6">

            <br> <label>سعر الخدمة:</label>
            <select name="price" required class="form-control form-control-solid" id="">
                <option value="">يرجى اختيار سعر الخدمة</option>
                @foreach (App\Models\PriceService::get() as $item)
                <option value="{{ $item->price }}">{{ $item->price }}$</option>
                    
                @endforeach
            </select>
         
        </div>
        <div class="form-group col-md-6">

            <br> <label>مدة الخدمة:</label>
            <select name="time" required class="form-control form-control-solid" id="">
                <option value="">يرجى اختيار مدة الخدمة</option>
                @foreach (App\Models\TimeService::get() as $item)
                <option value="{{ $item->day }}">{{ $item->title }}</option>
                @endforeach
            </select>
         
        </div>
        <div class="form-group col-md-4">
            <br> <label>نسبة الادارة من الخدمة:</label>
            <input type="number" id="management_ratio" readonly value="{{ get_general_value('admin_service') }}" required name="management_ratio" class="form-control form-control-solid"
                placeholder="نسبة الادارة من الخدمة" />
        </div>
        
        <div class="form-group col-md-2">
           <button type="button" style="margin-top: 22%;" class="btn btn-info btnnlock"><i class="fa fa-unlock-alt"></i> </button>
           <button type="button" style="margin-top: 22%;display: none" class="btn btn-info btnlock"><i class="fa fa-lock"></i> </button>
        </div>
        <div class="form-group col-md-8">

            <br><label> تعليمات المشتري :</label>
            <textarea name="buyer_instructions" class="editor"  id="kt_docs_ckeditor_classic"></textarea>

        </div>


        <div class="form-group col-md-6">

            <br> <label>رابط الخدمة:</label>
            <input type="url" name="url" id="url"  class="form-control form-control-solid"
                placeholder="رابط الخدمة" />
        </div>

        <div class="form-group col-md-6">

            <br> <label>الكلمات المفتاحية:</label>
            <input class="form-control form-control-sm form-control-solid keywords" required name="keywords"
                placeholder="اضف كلمات مفتاحية" id="kt_tagify_3" />


        </div>
        <div class=" col-md-12">
            <div class="form-group">
                <br> <label data-error="wrong" data-success="right" for="form3"> صور عن الخدمة <span
                        class="required"></span></label>
                {{-- <input type="file" multiple id="imageupload" name="images[]" class="form-control"> --}}
                <input id="file-upload-demo" required type="file" name="images[]" multiple><br />
     

            </div>

        </div>
        <div class=" col-md-6" id="has_file_class">

            <label>هل يوجد ملفات تابعة للخدمة :</label>

            <select class="form-select form-control form-select-solid " name="has_file" id="has_file" >
                <option value="" selected disabled>يرجى الاختيار</option>
                <option value="نعم">نعم</option>
                <option value="لا">لا</option>


            </select>
        </div>
    </div>
    <div class="row show_file" style="display: none">
        <div class="col-md-6">
            <br><label>Upload Files </label>

            <div class="input-group control-group increment">
                <input type="file" name="files[]"  id="addrequired" class="form-control fileservice addrequired">
                <div class="input-group-btn">

                    <button style="margin-right: 20px;" class="btn btn-success files" type="button"><i
                            class="glyphicon glyphicon-plus"></i>اضف جديد </button>
                </div>
            </div>
        </div>
        <div class="clone hide" style="display: none">
            <div class="control-group input-group" style="margin-top:10px">
                <input type="file" name="files[]" class="form-control addrequired">
                <div class="input-group-btn">
                    <button style="margin-right: 20px;" class="btn btn-danger" type="button"><i
                            class="glyphicon glyphicon-remove"></i> حذف</button>
                </div>
            </div>
        </div>
    </div>


      <fieldset>

                    <div id="extra">





                    </div>
                    <fieldset>
                    <button style="margin-top: 3%;margin-bottom: 3%" type="button" name="add"  class="btn btn-success add_row for-more">{{__('اضف اضافات للخدمة')}}</button>
     <br>
    <button class="btn btn-info" id="submitform" style="" type="submit">اضف جديد </i></button>
</form>
