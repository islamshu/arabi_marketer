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
<div class="modal fade" id="exampleModaldd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="direction: rtl">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="closeeee"></button>
                    <div class="btns">
                        <!-- <button type="button" class="btn btn-primary">select files</button> -->
                    </div>
                </div>
                <div class="modal-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab"
                                aria-controls="home-tab-pane" aria-selected="true">
                                رفع صورة
                            </button>
                        </li>
                        <li class="nav-item" @click.prevent="imagehandel" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="false">
                                عرض الصور
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <form action="" class="mt-4 mb-4" id="uploadimage_modal"
                                style="text-align: center">
                                <p>رفع ملفات</p>
                                <input type="file" class="image" id="imageuploadmodal" onchange="myFunction()">
                                <div class="form-group">
                                    <img src="" style="width: 100px" class="img-thumbnail image-preview"
                                        alt="">
                                </div>
                            </form>

                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                            aria-labelledby="profile-tab" tabindex="0" style="display: flex">
                            <div class="main-content">
                                <div class="row  blogsimage">

                                    @include('pages.blogs.all_image')
                                </div>
                            </div>

                            <div class="img-info" style="width: 20%;display: none">
                                <h5>image info</h5>
                                <p> </p>
                                <form action="" id="uplodimageinfo">
                                    <label for="" class="mb-2">Alt iamge</label>
                                    <input type="hidden" name="" class="form-control mb-3"
                                        id="image_id_info" />
                                    <input type="text" name="" class="form-control mb-3" id="alt_image" />
                                    <label for="" class="mb-2">Title</label>
                                    <input type="text" name="" class="form-control mb-3"
                                        v-model="image.imgTitle" id="title_image" />
                                    <label for="" class="mb-2">Description</label>
                                    <textarea name="" id="description_image" cols="30" class="form-control mb-3" rows="10"
                                        v-model="image.imgDescription"></textarea>

                                    <button class="btn btn-primary" onclick="storedata_image()" type="button">
                                        حفظ
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</div>
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
<script>
    var token = "{{ csrf_token() }}";
</script>
<script>
    function myImage(id) {
       var imagee = '.item'+id;
        $(".img-info").css("display", "block");
        const boxes = document.querySelectorAll('.imges');

            boxes.forEach(box => {
            // ✅ Remove class from each element
            box.classList.remove('activeimage');

            // ✅ Add class to each element
            // box.classList.add('small');
            });
        $( imagee ).addClass( "activeimage" );



        var url = '{{ route("get_image", ":id") }}';
        get_url = url.replace(':id', id);
        $.ajax({
            url: get_url,
            type: 'get',
            success: function(data) {
                $('#alt_image').val(data.alt);
                $('#title_image').val(data.title);
                $('#description_image').val(data.description);
                $('#image_id_info').val(data.id);

                
            }
        });
    }
    function storedata_image(){
        var image_id =  $('#image_id_info').val();
        var title_image =  $('#title_image').val();
        var description_image =  $('#description_image').val();
        var alt_image =  $('#alt_image').val();
        

        $.ajax({
            url: "{{ route('update_data_image') }}",
            type: 'post',
            data:{"image_id":image_id, "title_image":title_image, "description_image":description_image,"alt_image":alt_image},
        

            success: function(data) {
  
                swal(
                    '',
                    'Updated successfully',
                    'success'
                )


            },
            error: function(data) {
                alert('error');
            },
        });

    }
    function saveimage(id){
        var url = '{{ route("get_image", ":id") }}';
        get_url = url.replace(':id', id);
        $.ajax({
            url: get_url,
            type: 'get',
            success: function(data) {
                $('#image_idd').val(data.id)
                var src1 =`https://dashboard.arabicreators.com/public/uploads/` + data.image ;
                $('#src_image').attr("src", src1);
                $( "#closeeee" ).click();

                
            }
        });
    }

    function myFunction() {
        var frm = $('#uploadimage_modal');
        var formData = new FormData(frm[0]);
        formData.append('image', $('#imageuploadmodal')[0].files[0]);
        formData.append('_token', token);

        $.ajax({
            url: "{{ route('upload_image') }}",
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,

            success: function(data) {
                var text = `<div class="col-md-3 blogsimage" >
                                <div class="item` + data.id + ` item ">
                                    <div class="img-box">
                                        <img src="https://dashboard.arabicreators.com/public/uploads/` + data.image + `" ondblclick="saveimage(` + data
                                                    .id + `)"  onclick="myImage(` + data
                                                    .id + `)" width="150" height="150" alt="" />
                                    </div>
                                </div>
                            </div>`;
                $(".blogsimage").prepend(text);

                // var table = $('#stores').DataTable();



                // document.getElementById(fromname).reset();
                swal(
                    '',
                    'Added successfully',
                    'success'
                )


            },
            error: function(data) {
                alert('error');
            },
        });





    }
</script>
@endsection

