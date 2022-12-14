@extends('layout.main')

<x-base-layout>

    <div class="card card-flush">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin:::Tabs-->
            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15"
                role="tablist">
                <!--begin:::Tab item-->
              
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                {{-- <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab"
                        href="#kt_ecommerce_settings_store" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm004.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M18 10V20C18 20.6 18.4 21 19 21C19.6 21 20 20.6 20 20V10H18Z"
                                    fill="currentColor"></path>
                                <path opacity="0.3"
                                    d="M11 10V17H6V10H4V20C4 20.6 4.4 21 5 21H12C12.6 21 13 20.6 13 20V10H11Z"
                                    fill="currentColor"></path>
                                <path opacity="0.3" d="M10 10C10 11.1 9.1 12 8 12C6.9 12 6 11.1 6 10H10Z"
                                    fill="currentColor"></path>
                                <path opacity="0.3" d="M18 10C18 11.1 17.1 12 16 12C14.9 12 14 11.1 14 10H18Z"
                                    fill="currentColor"></path>
                                <path opacity="0.3" d="M14 4H10V10H14V4Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M17 4H20L22 10H18L17 4Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M7 4H4L2 10H6L7 4Z" fill="currentColor"></path>
                                <path
                                    d="M6 10C6 11.1 5.1 12 4 12C2.9 12 2 11.1 2 10H6ZM10 10C10 11.1 10.9 12 12 12C13.1 12 14 11.1 14 10H10ZM18 10C18 11.1 18.9 12 20 12C21.1 12 22 11.1 22 10H18ZM19 2H5C4.4 2 4 2.4 4 3V4H20V3C20 2.4 19.6 2 19 2ZM12 17C12 16.4 11.6 16 11 16H6C5.4 16 5 16.4 5 17C5 17.6 5.4 18 6 18H11C11.6 18 12 17.6 12 17Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Email
                    </a>
                </li> --}}
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                {{-- <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab"
                        href="#kt_ecommerce_settings_localization" aria-selected="false" role="tab" tabindex="-1">
                        <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Mobile
                    </a>
                </li> --}}
             
                <li class="nav-item" role="presentation" class="active">
                    <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab" href="#kt_jobs"
                        aria-selected="false" tabindex="-1" role="tab">
                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm005.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M20 22H4C3.4 22 3 21.6 3 21V2H21V21C21 21.6 20.6 22 20 22Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M12 14C9.2 14 7 11.8 7 9V5C7 4.4 7.4 4 8 4C8.6 4 9 4.4 9 5V9C9 10.7 10.3 12 12 12C13.7 12 15 10.7 15 9V5C15 4.4 15.4 4 16 4C16.6 4 17 4.4 17 5V9C17 11.8 14.8 14 12 14Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Service
                    </a>
                </li>
            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                <div class="tab-pane fade active show" id="kt_ecommerce_settings_general" role="tabpanel">
                    <input type="text" id="id" name="id" value="" hidden
                        class="form-control form-control-solid" placeholder="id " />
                    <input type="text" id="email_id" name="email_id" value="" hidden
                        class="form-control form-control-solid" placeholder="id " />
                    <input type="text" id="mobile_id" name="mobile_id" value="" hidden
                        class="form-control form-control-solid" placeholder="id " />
                    <input type="text" id="tender_id" name="tender_id" value="" hidden
                        class="form-control form-control-solid" placeholder="id " />
                    <input type="text" id="job_id" name="job_id" value="" hidden
                        class="form-control form-control-solid" placeholder="id " />

                    <!--begin::Form-->
                    <!--end::Form-->
                </div>
                <!--end:::Tab pane-->
                <!--begin:::Tab pane-->
               
                <!--end:::Tab pane-->
                <!--begin:::Tab pane-->
                
                <div class="tab-pane fade active show" id="kt_jobs" role="tabpanel">
                    <!--begin::Form-->
                    @include('pages.service.create')
                    <!--end::Form-->
                </div>
                <!--end:::Tab pane-->
                <!--begin:::Tab pane-->

                <!--end:::Tab pane-->
            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script src="{{ asset('new_js/crud.js') }}"></script>
<link href="{{ asset('demo1/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('demo1/plugins/custom/datatables/datatables.bundle.js') }}"></script>

<script>
    $(".files").click(function(){ 
         var html = $(".clone").html();
         $(".increment").after(html);
     });
     var input1 = document.querySelector("#kt_tagify_3");
     new Tagify(input1);

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
    

    

  


   


    function dataTableContractorJobs() {
        var KTDatatablesServerSide = function() {
            // Shared variables
            var table;
            var dt;

            // Private functions
            var initDatatable = function() {
                let data_ = document.getElementById('id').value

                if ($.fn.DataTable.isDataTable('#kt_datatable_example_5')) {
                    $('#kt_datatable_example_5').DataTable().ajax.reload();
                    return;
                }
                dt = $("#kt_datatable_example_5").DataTable({
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
                        url: "{{ route('service.getData') }}",
                    },
                    columns: [
                        {
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
                        },
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
                                var edit_url ="services/"+url+"/edit";
                                var url_delete = "services/"+url;

                                return '\
                                   <a  onclick = SelectedJobs("' +
                                   edit_url + '") class="btn btn-sm btn-clean btn-icon" title="Edit details">\ <i class="la la-edit"></i>\
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

        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesServerSide.init();
        });
    }


   

    function performStoreJobs(id) {
        $('#submitform').click();
    }
    $('#send_form').on('submit', function(e) {
            e.preventDefault();
            var frm = $('#send_form');
            var formData = new FormData(frm[0]);
            formData.append('file', $('#imageedit')[0].files[0]);
            formData.append('file', $('.fileservice')[0].files[1]);

            storefile("{{ route('services.store') }}",'post', formData,'#kt_datatable_example_2','#send_form','resetform','Added successfully');

           
        });
      

   

   
</script>

<script type="text/javascript">
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
    var SelectedPeopleRecord = function(url, type = "GET") {


        if (window.location.href.includes("/cms/admin/contractor/create")) {
            var test = localStorage.getItem("ParentSelect");
            if (test == 'false') {

                $("#indexContractors").modal("hide");
                $.get(url, (response) => {
                    $('#id').val(response.id);
                    var first_name = JSON.parse(response.first_name, true);
                    var first_name_ar = first_name['ar'];
                    var first_name_hb = first_name['hb'];
                    $('#first_name').val(first_name_ar);
                    $('#first_name_hb').val(first_name_hb);
                    var father_name = JSON.parse(response.father_name, true);
                    var father_name_ar = father_name['ar'];
                    var father_name_hb = father_name['hb'];
                    $('#father_name').val(father_name_ar);
                    $('#father_name_hb').val(father_name_hb);
                    var grand_name = JSON.parse(response.grand_name, true);
                    var grand_name_ar = grand_name['ar'];
                    var grand_name_hb = grand_name['hb'];
                    $('#grand_name').val(grand_name_ar);
                    $('#grand_name_hb').val(grand_name_hb);
                    var family_name = JSON.parse(response.family_name, true);
                    var family_name_ar = family_name['ar'];
                    var family_name_hb = family_name['hb'];
                    $("#workerName").text(first_name_ar + " " + family_name_ar + " " + family_name_ar);
                    $("#workerEmail").text(response.email);
                    $('#last_name').val(family_name_ar);
                    $('#last_name_hb').val(family_name_hb);

                    $('#email').val(response.email);
                    $("#workerMobile").text(response.mobile);
                    $('#mobile').val(response.mobile);
                    $('#id_number').val(response.id_number);
                    $('#license').val(response.license);

                    $('#city_id').val(response.city_id);
                    $('#city_id').trigger('change');
                    $('#status').val(response.status);
                    $('#status').trigger('change');

                    swal.fire("success", 'Your Data has been Found ', 'success')
                });

            }
        }

    }
    var SelectedWorkersEmail = function(url, type = "GET") {
        if (window.location.href.includes("/cms/admin/contractor/create")) {
            
            $("#dataTableWorkerEmails").modal("hide");
            $.get(url, (response) => {
                $('#ContractorsEmails').val(response.email);
                $('#email_id').val(response.id);
                swal.fire("success", 'Your Data has been Found ', 'success')
            });

        }

    }
    var SelectedWorkersMobile = function(url, type = "GET") {
        if (window.location.href.includes("/cms/admin/contractor/create")) {
            
            $("#indexWorkersMobiles").modal("hide");
            $.get(url, (response) => {
                $('#WorkerMobiles').val(response.mobile);
                $('#mobile_id').val(response.id);
                swal.fire("success", 'Your Data has been Found ', 'success')
            });

        }

    }
    var SelectedTenders = function(url, type = "GET") {
        if (window.location.href.includes("/cms/admin/contractor/create")) {
            
            $("#indexTenders").modal("hide");
            $.get(url, (response) => {
                var name = JSON.parse(response.name, true);
                $('#name').val(name['ar']);
                $('#name_hb').val(name['hb']);

                var desc = JSON.parse(response.desc, true);
                $('#desc').val(desc['ar']);
                $('#desc_hb').val(desc['hb']);

                $('#city_id_tender').val(response.city_id);
                $('#city_id_tender').trigger('change');

                $('#status_tender').val(response.status);
                $('#status_tender').trigger('change');
                $('#tender_id').val(response.id);



                var filePath = response.file;
                $('.image-input-placeholder').css('background-image', 'url(' + filePath + ')');


                $('#mobile_id').val(response.id);
                swal.fire("success", 'Your Data has been Found ', 'success')
            });

        }

    }
    var SelectedJobs = function(url) {
  
        $("#indexJobsContractors").modal("hide");

            
        //     $("#indexJobsContractors").modal("hide");
            $.get(url, (response) => {
                var id_servce = JSON.parse(JSON.stringify(response.id));
                $('#title_ar').val(JSON.parse(JSON.stringify(response.title.ar)));
                $('#title_en').val(JSON.parse(JSON.stringify(response.title.en)));
                $('#description_ar').val(JSON.parse(JSON.stringify(response.description.ar)));
                $('#description_en').val(JSON.parse(JSON.stringify(response.description.en)));
                $('#price').val(JSON.parse(JSON.stringify(response.price)));
                $('#url').val(JSON.parse(JSON.stringify(response.url)));
                var img = window.location.origin + '/uploads/' + JSON.parse(JSON.stringify(response.image));
                $('.image-preview').attr('src', img);
                $.ajax({
                    url: "{{ route('get_speclis_service') }}",
                    type: "get",
                    data: {
                    'id': id_servce
                },
                
                    success: function(data) {
                        $( data ).each(function(i,val) {
                            $('#specialty option[value='+val+']').attr('selected', true);
                        });

                    }
                
                });
                $.ajax({
                    url: "{{ route('get_type_service') }}",
                    type: "get",
                    data: {
                    'id': id_servce
                },
                
                    success: function(data) {
                        $( data ).each(function(i,val) {
                            $('#type option[value='+val+']').attr('selected', true);
                        });

                    }
                
                });
                $.ajax({
                    url: "{{ route('get_keywords_service') }}",
                    type: "get",
                    data: {
                    'id': id_servce
                },
                
                    success: function(data) {
                        $('.keywords').val(data);
                   

                    }
                
                });

                

    });
        }


    function performStoreTenders() {
        let formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('name_hb', document.getElementById('name_hb').value);
        formData.append('desc_hb', document.getElementById('desc_hb').value);
        formData.append('desc', document.getElementById('desc').value);
        formData.append('city_id', document.getElementById('city_id_tender').value);
        formData.append('contractor_id', document.getElementById('id').value);
        formData.append('status', document.getElementById('status_tender').value);
        formData.append('file', document.getElementById('file').files[0]);
        var id = document.getElementById('tender_id').value;

        if (id != '') {
            let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('name_hb', document.getElementById('name_hb').value);
            formData.append('desc_hb', document.getElementById('desc_hb').value);
            formData.append('desc', document.getElementById('desc').value);
            formData.append('city_id', document.getElementById('city_id_tender').value);
            formData.append('status', document.getElementById('status_tender').value);
            formData.append('file', document.getElementById('file').files[0]);
            store('/cms/admin/update/tenders/ajax/' + id, formData);
        } else {
            store('/cms/admin/tenders', formData)
        }

    }
</script>
