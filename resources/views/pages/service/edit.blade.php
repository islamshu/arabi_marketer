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


            </ul>
            <form action="{{ route('services.update',$service->id) }}" method="post" enctype="multipart/form-data">
                @csrf 
                @method('put')
                <div class="row">
                    <div class="form-group col-md-6">

                        <br><label> نوع الخدمة :</label>
            
                       <select name="type_service"  id="type_service" required class="form-control">
                        <option value="">يرجى اختيار نوع الخدمة</option>
                        <option value="digital" @if($service->type == 'digital') selected @endif>رقمي</option>
                        <option value="service"  @if($service->type == 'service') selected @endif>خدمة</option>
                       </select>
            
                    </div>
            
                    <div class="form-group col-md-6">
            
                        <br><label> عنوان الخدمة :</label>
            
                        <input type="text" id="title_ar" name="title_ar" value="{{ $service->title}}" required class="form-control form-control-solid"
                            placeholder="العنوان بالعربية" />
            
                    </div>
                    
                    <div class="form-group col-md-8">
            
                        <br><label> الوصف :</label>
                        <textarea name="description_ar" class="editor" id="kt_docs_ckeditor_classic">{{ $service->description }}</textarea>
            
                    </div>
                    
                    <div class="form-group col-md-6">
            
                        <label>التصنيف:</label>
                        <select class="form-select form-control form-select-solid " id="specialty" name="specialty[]" multiple required
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
                        <select class="form-select form-control form-select-solid " id="type" name="type[]" multiple required
                            data-control="select2" data-close-on-select="false" data-placeholder="Select an option"
                            data-allow-clear="true">
                            <option value=""></option>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}" @if(in_array($item->id,$type_array)) selected @endif>{{ $item->title }}</option>
                            @endforeach
                        </select>
            
                    </div>
                    <div class="form-group col-md-6">
            
                        <label>سعر الخدمة:</label>
                        <select name="price" required class="form-control form-control-solid" id="">
                            <option value="">يرجى اختيار سعر الخدمة</option>
                            @foreach ($price_service as $item)
                            <option value="{{ $item['price'] }}" @if($service->price ==  $item['price'] ) selected @endif>{{ $item['price'] }}$</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <br> <label>نسبة الادارة من الخدمة:</label>
                        <input type="number" id="management_ratio" readonly value="{{ $service->management_ratio }}" required name="management_ratio" class="form-control form-control-solid"
                            placeholder="نسبة الادارة من الخدمة" />
                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" style="margin-top: 22%;" class="btn btn-info btnnlock"><i class="fa fa-unlock-alt"></i> </button>
                        <button type="button" style="margin-top: 22%;display: none" class="btn btn-info btnlock"><i class="fa fa-lock"></i> </button>
                     </div>
                    <div class="form-group col-md-8">

                        <br><label> تعليمات المشتري :</label>
                        <textarea name="buyer_instructions" class="editor"  id="kt_docs_ckeditor_classic">{{ $service->buyer_instructions }}</textarea>
            
                    </div>
                    
                    
                    <div class="form-group col-md-6">
            
                        <label>رابط الخدمة:</label>
                        <input type="url" name="url" value="{{ $service->url }}" id="url"  class="form-control form-control-solid"
                            placeholder="Url" />
                    </div>
            
                    <div class="form-group col-md-6">
                        <label>الكلمات المفتاحية:</label>
                        <input class="form-control form-control-sm form-control-solid keywords" required value="{{ json_encode($keywords_array) }}" name="keywords" placeholder="Enter tags"
                            id="kt_tagify_3" />
            
            
                    </div>
                    {{-- <div class=" col-md-6">
                        <div class="form-group">
                            <label data-error="wrong" data-success="right" for="form3"> صور عن الخدمة <span
                                    class="required"></span></label>
                                    <input type="file" multiple id="imageupload" name="images[]" class="form-control">
                            
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
                            {{-- <input type="file" multiple id="imageupload" name="images[]" class="form-control"> --}}
                            <input id="file-upload-demo"  type="file" name="images[]" multiple><br />
                 
            
                        </div>
            
                    </div>
                </div>
              
                <br>
                <button class="btn btn-info" id="submitform" style="" type="submit">تعديل </i></button>
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
         $(".btnnlock").click(function(){ 
                $('#management_ratio').prop('readonly', false);
                $(".btnnlock").css("display", "none");
                $(".btnlock").css("display", "block");
            });
            $(".btnlock").click(function(){ 
                $('#management_ratio').prop('readonly', true);
                $(".btnnlock").css("display", "block");
                $(".btnlock").css("display", "none");
            });
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

