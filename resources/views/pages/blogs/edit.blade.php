@extends('layout.main')
@section('style')
    <style>
        .activeimage{
            border-radius: 3% !important;
            border: 5px solid #d2cece !important;
        }
        .fileInput1 {
            border: var(--darkColor) 2px solid;
            padding: 6px;
            background-color: transparent;
            color: var(--darkColor);
            margin-left: 10px;
            font-weight: 600;
            margin-top: 5px;
        }

        .modal-dialog {
            max-width: 1200px;
        }

        .modal {}

        .modal .head {}

        .modal .head form {
            display: flex;
            justify-content: space-between;
        }

        .modal form .selects {
            display: flex;
        }

        .modal .main-content {
            height: 540px;
            width: 75%;
            overflow-y: scroll;
            overflow-x: hidden;
            margin: 10px;
        }

        .modal .img-info {
            width: 25% !important;
            padding: 10px;
            margin: 10px;
            padding-top: 20px;
            background-color: #f6f6f6;
        }

        .modal .main-content .item {
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            /* padding: 10px; */
            border-radius: 5px;
            margin: 10px;
            text-align: right;
            overflow: hidden;
            width: 100%;
            height: 208px;
            cursor: pointer;
        }

        .modal .main-content .item .img-box {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .modal .main-content .item .img-box img {
            width: 100%;
            height: 100%;
        }

        .modal .main-content .item p {
            margin-bottom: 5px;
            font-size: 16px;
            font-weight: 600;
        }

        .modal .main-content .item span {
            font-size: 12px;
        }

        .modal-footer {
            justify-content: space-between;
        }

        .modal-header .btn-close {
            margin: 0;
        }

        .btn-close:focus {
            box-shadow: none;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .img-preview {
            width: 150px;
            height: 150px;
            display: block;
            margin: auto;
            margin-top: 30px;
        }
    </style>
@endsection

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
                        <!--end::Svg Icon-->المفالات
                    </a>

                </li>


            </ul>
            <form action="{{ route('blogs.update',$blog->id) }}" method="post" enctype="multipart/form-data">
                @csrf 
                @method('put')
                <div class="row">
            
                    <div class="form-group col-md-6">
                        <button
                        type="button"
                        class="fileInput1"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModaldd"
                      >
                        اضغط هنا لتحميل الصورة الرئيسية للتدوينة
                      </button>
               <div class="form-group">
                <img src="{{ asset('public/uploads/'. $blog->image_blog->image ) }}" id="src_image" style="width: 100px"
                    class="img-thumbnail image-preview" alt="">
            </div>
            <input type="hidden" value="{{ $blog->image_blog->id }}" name="image_id" id="image_idd">
            
                    </div>
                    <div class="form-group col-md-6">
            
                        <br><label> عنوان المقال :</label>
            
                        <input type="text" id="title_ar" name="title_ar" value="{{ $blog->getTranslation('title', 'ar') }}" required class="form-control form-control-solid"
                            placeholder="العنوان بالعربية" />
            
                    </div>
                   
                    
                    <div class="form-group col-md-6">
            
                        <br><label> الوصف :</label>
                        <textarea name="description_ar" class="editor" id="kt_docs_ckeditor_classic">{{ $blog->getTranslation('description', 'ar') }}</textarea>
            
                    </div>
                    <div class="form-group col-md-6">

                        <br><label> وصف مصغر  :</label>
                        <textarea name="small_description" class="editor form-control" >{{ $blog->small_description}}</textarea>
            
                    </div>
                 
                    
                    
                    <div class="form-group col-md-6">
            
                        <label>النوع:</label>
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
                        <label>الكلمات المفتاحية:</label>
                        <input class="form-control form-control-sm form-control-solid keywords" required value="{{ json_encode($keywords_array) }}" name="keywords" placeholder="Enter keywords"
                            id="kt_tagify_3" />
            
            
                    </div>
                    <div class="form-group col-md-6">
                        <label>tags :</label>
                        <input class="form-control form-control-sm form-control-solid keywords" required value="{{ json_encode($tags) }}" name="tags" placeholder="Enter tags"
                            id="kt_tagify_77" />
            
            
                    </div>
                    
                  
                    
                </div>
              
           
                <br>
                <button class="btn btn-info" id="submitform" style="" type="submit">تعديل </i></button>
            </form>
        </div>

</x-base-layout>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

@section('scripts')
<script>
    ClassicEditor
            .create( document.querySelector( '.editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
            var input1 = document.querySelector("#kt_tagify_3");
            new Tagify(input1);
            var input111 = document.querySelector("#kt_tagify_77");
            new Tagify(input111);

            
</script>
@endsection

