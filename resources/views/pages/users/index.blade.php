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
                    <a class="nav-link text-active-primary pb-5 active" data-bs-toggle="tab"
                        href="#kt_ecommerce_settings_general" aria-selected="true" role="tab">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->General
                    </a>
                </li>

            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                <div class="tab-pane fade active show" id="kt_ecommerce_settings_general" role="tabpanel">

                    <!--begin::Form-->
                    <div class="card-body">
                        <table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الاكتروني</th>
                                    <th>نوع المستخدم </th>
                    
                                    <th class="text-end min-w-50px">الاجراءات</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach ($users as $key=> $user)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $user->mention }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>
                                        <form style="display: inline"
                                            action="{{ route('users.destroy', $user->id) }}"
                                            method="post">
                                            @method('delete') @csrf
                                            <button type="submit" class="btn btn-danger delete-confirm"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                    <!--end::Form-->
                </div>

            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>
<div class="modal fase " id="myModal4" data-backdrop="static" data-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">

            <h5 class="modal-title" id="staticBackdropLabel">
                تعديل بيانات المجال</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="company_edit">
            <div class="c-preloader text-center p-3">
                <i class="las la-spinner la-spin la-3x"></i>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">اغلاق</button>
        </div>
    </div>
</div>
</div>
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

{{-- <script src="{{ asset('crudjs/crud.js') }}"></script> --}}
<link href="{{ asset('demo1/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('demo1/plugins/custom/datatables/datatables.bundle.js') }}"></script>
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
                if ($.fn.DataTable.isDataTable('#kt_datatable_example_1')) {
                    $('#kt_datatable_example_1').DataTable().ajax.reload();
                    return;
                }
                dt = $("#kt_datatable_example_1").DataTable({
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
                        url: "{{ route('users.getDat') }}",
                    },
                    columns: [{
                            data: 'id'
                        },
                        {

                            data: 'mention'
                        },

                        {
                            data: 'email'
                        },
                        {
                            data: 'type'
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
                                    var url = '/cms/admin/city/:id/edit';
                               var urll =  data.id;
                                return '\
                                                   <a  onclick = SelectedPeopleRecord("' +
                                                   urll +
                                    '") class="btn btn-sm btn-clean btn-icon" title="Edit details">\
                                                         <i class="la la-edit"></i>\
                                                           </a>\
                                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
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
    var SelectedPeopleRecord = function(url) {


        $("#myModal4").show();

    }
</script>
@endsection


