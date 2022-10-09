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
                            <path opacity="0.3"
                                d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
                                fill="currentColor"></path>
                            <rect x="7" y="17" width="6" height="2" rx="1"
                                fill="currentColor"></rect>
                            <rect x="7" y="12" width="10" height="2" rx="1"
                                fill="currentColor"></rect>
                            <rect x="7" y="7" width="6" height="2" rx="1"
                                fill="currentColor"></rect>
                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->الكلمات المفتاحية للخدمات
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
    
                       
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email"> العنوان بالعربية: <span class="required"></span></label>
                                <input type="text" name="title_ar" required class="form-control"
                                    value="{{ old('title_ar') }}" id="title_ar">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email"> العنوان بالانجليزية : <span class="required"></span></label>
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
                    @include('pages.keyword_service._index')
                    <!--end::Form-->
                </div>

            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>

<div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="direction: rtl">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">
                 تعديل الكلمات المفتاحية</h5>

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
                            url: "{{ route('getKeywordServiceData') }}",
                        },
                        columns: [{
                                data: 'id'
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
                                targets: -1,
                                data: null,
                                orderable: false,
                                className: 'text-end',
                                render: function(data, type, row) {
                                    var url = data.id;
                                    var url_delete = "service_keyword_delete/"+url;
                                    return '\
                                                           <a  onclick = SelectedPeopleRecord("' +
                                        url +
                                        '") class="btn btn-sm btn-clean btn-icon btn-info" title="Edit details">\
                                                                 <i class="la la-edit"></i>\
                                                                   </a>\
                                                                <a href="javascript:;" data-id="'+url+'" onclick = delete_record("'+url +'","'+url_delete+'") data-route="route("specialtys.destroy",'+url+')" class="btn btn-sm btn-clean btn-icon btn-danger deleteRecord" title="Delete">\
                                                             		<i class="la la-trash"></i>\
                                                                           </a>\
                                                                        ';
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
                url: "{{ route('get_form_keyword') }}",
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
        var delete_record = function(id,route) {


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
                }, 1000);                }
            });


            }
                    
       
        $('#sendmemessage').on('submit', function(e) {
            e.preventDefault();
            var frm = $('#sendmemessage');

            var data = $(this).serialize();
            store("{{ route('store_service_keyword') }}",'post', data,'#kt_datatable_example_2','sendmemessage','#exampleModal','Added successfully');

            $("#sendmemessage")[0].reset();
            });
            $("#slide-toggle-button").click(function() {
                $("#form_toshow").slideToggle("slow");
            });
    </script>
@endsection
