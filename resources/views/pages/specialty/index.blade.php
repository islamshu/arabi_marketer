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
                        <!--end::Svg Icon-->الرئيسية
                    </a>

                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary pb-5 active">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.3" d="M5 8.04999L11.8 11.95V19.85L5 15.85V8.04999Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M20.1 6.65L12.3 2.15C12 1.95 11.6 1.95 11.3 2.15L3.5 6.65C3.2 6.85 3 7.15 3 7.45V16.45C3 16.75 3.2 17.15 3.5 17.25L11.3 21.75C11.5 21.85 11.6 21.85 11.8 21.85C12 21.85 12.1 21.85 12.3 21.75L20.1 17.25C20.4 17.05 20.6 16.75 20.6 16.45V7.45C20.6 7.15 20.4 6.75 20.1 6.65ZM5 15.85V7.95L11.8 4.05L18.6 7.95L11.8 11.95V19.85L5 15.85Z"
                                    fill="currentColor"></path>
                            </svg> </span>
                        <!--end::Svg Icon-->التخصيصات
                    </a>

                </li>


            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->

                <button id="slide-toggle-button" class="btn btn-primary">
                    اضف جديد
                </button>
                <div class="col-md-8" id="form_toshow" style="display: none;margin-top:5px">
                    <form id="sendmemessage">
                        @csrf

                        <div class="form-group">
                            <label data-error="wrong" data-success="right" for="form3">الصورة <span
                                    class="required"></span></label>
                            <input type="file" id="imagestore" required name="icon" class="form-control image">
                        </div>
                        <div class="form-group">
                            <img src="{{ asset('uploads/product_images/default.png') }}" style="width: 100px"
                                class="img-thumbnail image-preview" alt="">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email"> الاسم بالعربية: <span class="required"></span></label>
                                <input type="text" name="title_ar" required class="form-control"
                                    value="{{ old('title_ar') }}" id="title_ar">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email"> الاسم بالانجليزية : <span class="required"></span></label>
                                <input type="text" name="title_en" required class="form-control"
                                    value="{{ old('title_en') }}" id="title_en">
                            </div>






                        </div>
                        <br>


                        <button class="btn btn-info" type="submit">اضافة</i></button>
                    </form>
                </div>
                <div class="tab-pane fade active show" id="kt_ecommerce_settings_general" role="tabpanel">

                    <!--begin::Form-->
                    @include('pages.specialty._index')
                    <!--end::Form-->
                </div>

            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="direction: rtl">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> اضف تخصيص جديد </h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>

            </div>

            <!-- Modal body -->
            <div class="modal-body ">
                <div id="form-errors" class="text-center"></div>
                <div id="success" class="text-center"></div>
                <form id="sendmemessage">
                    @csrf

                    <div class="form-group">
                        <label data-error="wrong" data-success="right" for="form3">الصورة <span
                                class="required"></span></label>
                        <input type="file" id="imagestore" required name="icon" class="form-control image">
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('uploads/product_images/default.png') }}" style="width: 100px"
                            class="img-thumbnail image-preview" alt="">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="email"> الاسم بالعربية: <span class="required"></span></label>
                            <input type="text" name="title_ar" required class="form-control"
                                value="{{ old('title_ar') }}" id="title_ar">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email"> الاسم بالانجليزية : <span class="required"></span></label>
                            <input type="text" name="title_en" required class="form-control"
                                value="{{ old('title_en') }}" id="title_en">
                        </div>






                    </div>
                    <br>


                    <button class="btn btn-info" type="submit">اضافة</i></button>
                </form>

            </div>



            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
            </div>

        </div>
    </div>
</div> --}}
<div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="direction: rtl">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">
                    تعديل التخصيص</h5>

                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="edit_form">
                <div class="c-preloader text-center p-3">
                    <i class="las la-spinner la-spin la-3x"></i>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            "use strict";
            var read_specialty = "{{ auth()->user()->can('read-specialty') }}";
            var delete_specialty = "{{ auth()->user()->can('read-specialty') }}";

            // Class definition
            var KTDatatablesServerSide = function() {
                // Shared variables
                var table;
                var dt;
                var filterPayment;
                // Private functions
                var initDatatable = function() {
                    if ($.fn.DataTable.isDataTable('#kt_datatable_example_2')) {
                        $('#kt_datatable_example_2').DataTable().ajax.reload();
                        return;
                    }

                    dt = $("#kt_datatable_example_2").DataTable({
                        searchDelay: 500,
                        processing: true,
                        serverSide: true,
                        stateSave: true,


                        select: {
                            style: 'multi',
                            selector: 'td:first-child input[type="checkbox"]',
                            className: 'row-selected'
                        },
                        ajax: {
                            url: "{{ route('specialty.getDat') }}",
                        },
                        columns: [{
                                data: 'id'
                            },
                            {
                                data: null
                            },
                            {

                                data: 'title.en'
                            },


                            {
                                data: null
                            }
                        ],
                        columnDefs: [

                            {
                                targets: 1,
                                data: null,
                                orderable: false,
                                className: 'text-end',
                                render: function(data, type, row) {
                                    var url = window.location.origin + '/uploads/' + data
                                        .image;
                                    return '\<img src="' + url + '" width="30" hight="30">';
                                },
                            },
                            {
                                targets: -1,
                                data: null,
                                orderable: false,
                                className: 'text-end',
                                render: function(data, type, row) {
                                    var url = data.id;
                                    var url_delete = "specialtys/" + url;
                                    if(read_specialty == true){
                                        var edit =
                                        '\<a  onclick = SelectedPeopleRecord("' + url +
                                        '") class="btn btn-sm btn-clean btn-icon btn-info" title="Edit details">\
                                     <i class="la la-edit"></i>\</a>';  
                                    }else{
                                        var edit = '';
                                    }

                                    if(read_specialty == true){

                                    var delete_d = '<a href="javascript:;" data-id="' +
                                        url +
                                        '" onclick = delete_record("' + url + '","' +
                                        url_delete +
                                        '") data-route="route("specialtys.destroy",' + url + ')" class="btn btn-sm btn-clean btn-icon btn-danger deleteRecord" title="Delete">\
                                     <i class="la la-trash"></i>\
                                               </a>\
                                            ';
                                    }else{
                                        var delete_d ='';
                                    }
                                    return edit + ' ' + delete_d;
                                },
                            },


                        ],

                    });

                    table = dt.$;
                    // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                    dt.on('draw', function() {
                        KTMenu.createInstances();
                    });
                }
                return {
                    init: function() {
                        initDatatable();
                    }
                }
            }();
            // On document ready
            KTUtil.onDOMContentLoaded(function() {
                KTDatatablesServerSide.init();
            });






        });
    </script>
    <script type="text/javascript">
        var SelectedPeopleRecord = function(id) {

            $("#exampleModaledit").modal('show');
            $.ajax({
                type: 'post',
                url: "{{ route('get_form_specialty') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },
                beforeSend: function() {},
                success: function(data) {
                    $('#edit_form').html(data);


                }
            });


        }
        var delete_record = function(id, route) {


            $.ajax({
                url: route,
                type: 'delete',
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function() {
                    swal("Deleted successfully", {
                        buttons: false,
                        timer: 2000,
                        icon: "success"
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            });


        }


        $('#sendmemessage').on('submit', function(e) {
            e.preventDefault();
            var frm = $('#sendmemessage');
            var formData = new FormData(frm[0]);
            formData.append('file', $('#imagestore')[0].files[0]);
            storefile("{{ route('specialtys.store') }}", 'post', formData, '#kt_datatable_example_2',
                'sendmemessage', '#exampleModal', 'Added successfully');
            $("#sendmemessage")[0].reset();


        });
        $("#slide-toggle-button").click(function() {
            $("#form_toshow").slideToggle("slow");
        });
    </script>
@endsection
