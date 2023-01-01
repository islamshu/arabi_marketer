@extends('layout.main')

<x-base-layout>

    <div class="card card-flush">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin:::Tabs-->
            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15"
                role="tablist">
                <!--begin:::Tab item-->
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary pb-5 " href="/" >
                        <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->الرئيسية
                    </a>

                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary pb-5 active" >
                        <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21 22H14C13.4 22 13 21.6 13 21V3C13 2.4 13.4 2 14 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
                                <path d="M10 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H10C10.6 2 11 2.4 11 3V21C11 21.6 10.6 22 10 22Z" fill="currentColor"></path>
                                </svg>
                        </span>
                        <!--end::Svg Icon-->الخدمات
                    </a>

                </li>
                <div class="d-flex flex-column flex-grow-1 pe-8" >
                    <div class="row">

                    <form action="{{  route('change_status_markter',$service->id) }}" method="post" >
                        @csrf
                        <div class="col-md-8">
                            <label for="" class="">حالة الطلب</label>
                            <select required id="select_change" class="form-control " name="status"  >
                                <option value="1">تحت التدقيق</option>
                                <option value="2">قبول</option>
                                <option value="0">رقض</option>
                            </select>
                        </div>
                        <div class="col-md-8" >
                            <label  class="">الرسالة (غير ضرورية) </label>
                           <textarea name="message" class="form-control" id="" cols="30" rows="3">

                           </textarea>
                        </div>
                        <div class="col-md-6 mt-10" style="display: none" id="btn_submit">
                            <button class="btn btn-info">تأكيد</button>
                        </div>
                       

                    </div>
                    </form>
                </div>


            </ul>
            <div style="direction: rtl;margin-right: 12%;">
            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-success"><i class="fa fa-edit"></i>انقر للتعديل</a>
            </div>
            <form >
                @csrf 
                <div class="row">
                    <div class="form-group col-md-6">

                        <br><label> نوع الخدمة :</label>
            
                       <select name="type_service" disabled id="type_service" required class="form-control">
                        <option value="">يرجى اختيار نوع الخدمة</option>
                        <option value="digital" @if($service->type == 'digital') selected @endif>رقمي</option>
                        <option value="service"  @if($service->type == 'service') selected @endif>خدمة</option>
                       </select>
            
                    </div>
                    <div class="form-group col-md-6">
            
                        <br><label> عنوان الخدمة :</label>
            
                        <input type="text" id="title_ar" disabled name="title_ar" value="{{ $service->getTranslation('title', 'ar') }}" required class="form-control form-control-solid"
                            placeholder="العنوان بالعربية" />
            
                    </div>
                    
                    <div class="form-group col-md-8">
            
                        <br><label> الوصف :</label>
                        <textarea disabled readonly name="description_ar" rows="10" cols="5" class="form-control" id="kt_docs_ckeditor_classic">{!! strip_tags($service->getTranslation('description', 'ar')) !!}</textarea>
            
                    </div>
                    
                    <div class="form-group col-md-6">
            
                        <label>التصنيف:</label>
                        <select class="form-select form-control form-select-solid " id="specialty" disabled name="specialty[]" multiple required
                            data-control="select2" data-close-on-select="false" data-placeholder="Select an option"
                            data-allow-clear="true">
                            <option value=""></option>
                            @foreach ($specialty as $item)
                                <option value="{{ $item->id }}" @if(in_array($item->id,$specialty_array) )selected @endif>{{ $item->title }}</option>
                            @endforeach
                        </select>
            
            
                    </div>
                    <div class="form-group col-md-6">
            
                        <label>نوع الخدمة:</label>
                        <select class="form-select form-control form-select-solid " id="type" disabled name="type[]" multiple required
                            data-control="select2" data-close-on-select="false" data-placeholder="Select an option"
                            data-allow-clear="true">
                            <option value=""></option>

                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}" @if(in_array($item->id,$type_array)) selected @endif>{{ $item->title }}</option>
                            @endforeach
                        </select>
                        
            
                    </div>
                    <div class="form-group col-md-6">
            
                        <br><label> المستخدم :</label>
            
                        <select disabled class="form-select" required name="user_id"  data-control="select2" data-placeholder="اختر المستخدم">
                            <option value="" selected disabled>يرجى الاختيار</option>
                            @foreach (App\Models\User::get() as $item)
                            <option value="{{ $item->id }}" @if($service->user->id == $item->id ) selected @endif >{{ $item->name }}</option>
            
                            @endforeach
                        </select>
            
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group col-md-6">
            
                        <label>سعر الخدمة:</label>
                        <select disabled name="price" required class="form-control form-control-solid" id="">
                            <option value="">يرجى اختيار سعر الخدمة</option>
                            @foreach (App\Models\PriceService::get() as $item)
                            <option value="{{ $item->price }}" @if($service->price == $item->price) selected @endif>{{ $item->price }}$</option>
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">

                         <label>مدة الخدمة:</label>
                        <select name="time" disabled required class="form-control form-control-solid" id="">
                            <option value="">يرجى اختيار مدة الخدمة</option>
                            @foreach (App\Models\TimeService::get() as $item)
                            <option value="{{ $item->day }}" @if($service->time == $item->day) selected @endif>{{ $item->title }}</option>
                            @endforeach
                        </select>
                     
                    </div>
                    <div class="form-group col-md-6">

                    <label>نسبة الادارة من الخدمة:</label>
                        <input type="number" id="management_ratio"  value="{{ $service->management_ratio }}"  required disabled name="management_ratio" class="form-control form-control-solid"
                            placeholder="نسبة الادارة من الخدمة" />
                    </div>
                    <div class="form-group col-md-8">

                        <br><label> تعليمات المشتري :</label>
                        <textarea disabled name="buyer_instructions" class="form-control"  rows="10" cols="5"  id="kt_docs_ckeditor_classic">{!! strip_tags($service->buyer_instructions) !!}</textarea>
            
                    </div>
                    <div class="form-group col-md-6">
            
                        <label>رابط الخدمة:</label>
                        <input type="url" disabled name="url" value="{{ $service->url }}" id="url" required class="form-control form-control-solid"
                            placeholder="Url" />
                    </div>
            
                    <div class="form-group col-md-6">
                        <label>الكلمات المفتاحية:</label>
                        <input class="form-control form-control-sm form-control-solid keywords" required value="{{ json_encode($keywords_array) }}" disabled name="keywords" placeholder="Enter tags"
                            id="kt_tagify_3" />
            
            
                    </div>
                    {{-- <div class=" col-md-6">
                        <div class="form-group">
                            <label data-error="wrong" data-success="right" for="form3"> صور عن الخدمة <span
                                    class="required"></span></label>
                                    <input type="file" multiple id="imageupload" disabled name="images[]" class="form-control">
                            
                        </div>
                        @foreach (json_decode($service->images) as $item)
                        <div class="form-group">
                            <img src="{{ asset('public/uploads/'.$item) }}" style="width: 100px"
                                class="img-thumbnail image-preview" alt="">
                        </div>
                        @endforeach
                      
                       
                    </div> --}}
                    
                    <div class=" col-md-12">
                        <div class="form-group">
                            <br> <label data-error="wrong" data-success="right" for="form3"> صور عن الخدمة <span
                                    class="required"></span></label>

                                    @foreach (json_decode($service->images) as $item)
                                        <img src="{{ asset('uploads/'.$item) }}" width="100" height="70" alt="">
                                    @endforeach
                            {{-- <input type="file" multiple id="imageupload" disabled name="images[]" class="form-control"> --}}
                            {{-- <input id="file-upload-demo" required type="file" disabled name="images[]" multiple><br /> --}}
                 
            
                        </div>
            
                    </div>
                </div>
                <div class=" col-md-6">
        
                <label> ملفات الخدمة    :</label>
                @forelse ($service->files as $key=> $item)
                    <a href="{{ asset('uploads/'.$item->file) }}" target="_blank">الملف {{ $key +1 }}</a> {{ ' ,' }}
                @empty
                لا يوجد ملفات
                @endforelse
              
                </div>
                <br>
                <div class="row">
                
                <div class=" col-md-8">

                    <label>  الاضافات    :</label>

                <table id="example" class="display" style="width:100%">
                    <thead>
                <tr>
                    <th>اسم الاضافة</th>
                    <th>سعر الاضافة</th>
                    <th>مدة الاضافة</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($service->extra as $item)
                    <tr>
                       <th> {{ $item->title }}</th>
                       <th> {{ $item->price }}</th>
                       <th> {{ $item->time }}</th>
                    </tr>   
                    @empty
                    <th></th>
                    <th>لا يوجد ملفات</th>
                    <th></th>
                    @endforelse
                   

                </tbody>

                </table>
                </div>
            </div>


          
                <br>
            </form>
        </div>

</x-base-layout>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
@php
    $array_key = array();
        $array = array();

    $url= "/uploads/";
    foreach(json_decode($service->images) as $key=> $image){
        array_push($array,$url.$image);
       $item =  "{caption: '$image',  width: '120px', url: '$url.$image',key: '$key' },";
       array_push($array_key,$item);
    }
@endphp
@section('scripts')
    <script>
        //    $('#send_form_edit').on('submit', function(e) {
        //     e.preventDefault();
        //     var frm = $('#send_form_edit');
        //     var formData = new FormData(frm[0]);
        //     let TotalFiles = $('#imageupload')[0].files.length; //Total files
        //     let files = $('#imageupload')[0];
        //     for (let i = 0; i < TotalFiles; i++) {
        //     formData.append('images' + i, files.files[i]);
        //     }
        //     formData.append('TotalFiles', TotalFiles);
        //     formData.append('file', $('.fileservice')[0].files[1]);
        //     if($('.fileservice')[0].files[1] == undefined && TotalFiles == 0){
        //         var data = $(this).serialize();

        //         update("{{ route('services_update',$service->id) }}",'get', data,'Edited successfully');

        //     }else{

        //         updatefile("{{ route('services_update',$service->id) }}",'get', formData,'Edited successfully');

        //     }
        // });
       
        $(".files").click(function(){ 
         var html = $(".clone").html();
         $(".increment").after(html);
     });
     $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
     
     
        $('#has_file').change(function(){
            if($(this).val() == 'نعم'){
                $('.show_file').css({display: "block"});
                // $('.addrequired').attr('required', true);   

            }else{
                $('.show_file').css({display: "none"});
                // $('.addrequired').attr('required', false);   

            }
        });
        
    </script>
    <script>
              
                var input1 = document.querySelector("#kt_tagify_3");
                new Tagify(input1);
    </script>
    <script>
        
        $(document).ready(function () {
       
   

$("#file-upload-demo").fileinput({
    'theme': 'explorer',
    'uploadUrl': '#',
    overwriteInitial: false,
    initialPreviewAsData: true,
    initialPreview: 
        @json($array)
    ,
    initialPreviewConfig: 
    @json($array_key)
});

});
    </script>
@endsection

