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
                                    d="M21 22H14C13.4 22 13 21.6 13 21V3C13 2.4 13.4 2 14 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M10 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H10C10.6 2 11 2.4 11 3V21C11 21.6 10.6 22 10 22Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->الواجهة الرئيسة
                    </a>

                </li>


            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <form class="form" method="POST" action="{{ route('general_info.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>{{ __(' الصورة') }}:</label>
                            <input type="file" class="form-control image" name="general_file[home_image_section]" id="">
                        </div>
                        <div class="form-group">
                            <img src="{{ asset('public/uploads/'.get_general_value('home_image_section')) }}" style="width: 100px"
                                class="img-thumbnail image-preview" alt="">
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>{{ __('العنوان في حالة التسجيل') }}:</label>
                            <textarea name="general[auth_title]" class="form-control" id="" cols="20" rows="5">{{ get_general_value('auth_title') }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('الموضوع في حالة التسجيل') }}:</label>
                            <textarea name="general[auth_body]" class="form-control" id="" cols="20" rows="5">{{ get_general_value('auth_body') }}</textarea>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>{{ __('العنوان في حالة عدم التسجيل') }}:</label>
                            <textarea name="general[not_auth_title]" class="form-control" id="" cols="20" rows="5">{{ get_general_value('not_auth_title') }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('الموضوع في حالة عدم التسجيل') }}:</label>
                            <textarea name="general[not_auth_body]" class="form-control" id="" cols="20" rows="5">{{ get_general_value('not_auth_body') }}</textarea>
                        </div>
                    </div>



                    <div class="card-footer">
                        <button type="submit" onclick="performStore()"
                            class="btn btn-primary mr-2">{{ __('Submit') }}</button>


            </form>
            <!--end:::Tab content-->
        </div>
        
        <!--end::Card body-->
    

</x-base-layout>


@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

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
                            url: "{{ route('getBlogData') }}",
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
                        columnDefs: [{
                                targets: -1,
                                data: null,
                                orderable: false,
                                className: 'text-end',
                                render: function(data, type, row) {
                                    var url = data.id;
                                    var url_delete = "service_category_delete/" + url;
                                    return '\
                                                                   <a  onclick = SelectedPeopleRecord("' +
                                        url +
                                        '") class="btn btn-sm btn-clean btn-icon btn-info" title="Edit details">\
                                                                         <i class="la la-edit"></i>\
                                                                           </a>\
                                                                        <a href="javascript:;" data-id="' + url +
                                        '" onclick = delete_record("' + url + '","' +
                                        url_delete +
                                        '") data-route="route("specialtys.destroy",' + url + ')" class="btn btn-sm btn-clean btn-icon btn-danger deleteRecord" title="Delete">\
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
                url: "{{ route('get_form_city') }}",
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


            var data = $(this).serialize();
            store("{{ route('city.store') }}", 'post', data, '#kt_datatable_example_4', 'sendmemessage',
                '#exampleModal', 'Added successfully');
            $("#sendmemessage")[0].reset();


        });
        $("#slide-toggle-button").click(function() {
            $("#form_toshow").slideToggle("slow");
        });
    </script>
@endsection
