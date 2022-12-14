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
                    <a class="nav-link text-active-primary pb-5 " href="/">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->????????????????
                    </a>

                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary pb-5 active">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.3"
                                    d="M21 22H14C13.4 22 13 21.6 13 21V3C13 2.4 13.4 2 14 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M10 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H10C10.6 2 11 2.4 11 3V21C11 21.6 10.6 22 10 22Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->????????????????
                    </a>

                </li>


            </ul>


            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">????????????????</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab" href="#kt_tab_pane_3"> ???????????????? ??????????????</a>
                </li>

                @can('create-blog')
                    
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">?????? ????????</a>
                </li>
                @endcan


            </ul>


            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                    @include('pages.blogs._index')
                </div>
                
                <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                    @include('pages.blogs.bending')
                </div>


                @can('create-blog')

                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                    @include('pages.blogs._create')
                </div>
                @endcan


            </div>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->

            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>


@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


@section('scripts')
    <script>
        $(document).ready(function() {
            $("#example").on("change", ".js-switch", function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let userId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('blogs.update.status') }}',
                    data: {
                        'status': status,
                        'blog_id': userId
                    },
                    success: function(data) {
                        console.log(data.message);
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        var token = "{{ csrf_token() }}";
    </script>

    <script>
        $('#send_form').on('submit', function(e) {
            e.preventDefault();
            var frm = $('#send_form');
            var data = $(this).serialize();
       

            store("{{ route('blogs.store') }}", 'post', data, '#kt_datatable_example_4', 'sendmemessage',
                '#exampleModal', 'Added successfully');
            //    location.reload(true);
            $("#sendmemessage")[0].reset();

            setTimeout(function() {
                window.location.reload();
            }, 3000);
        });
    </script>
  
    <script>
        function myImage(id) {
           var imagee = '.item'+id;
            $(".img-info").css("display", "block");
            const boxes = document.querySelectorAll('.imges');

                boxes.forEach(box => {
                // ??? Remove class from each element
                box.classList.remove('activeimage');

                // ??? Add class to each element
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
