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
                        <!--end::Svg Icon-->الدول
                    </a>

                </li>


            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                @can('read-countires')
                    
                <button id="slide-toggle-button" class="btn btn-primary">
                    اضف جديد
                </button>
                @endcan

                <div class="col-md-8" id="form_toshow" style="display: none;margin-top:5px">
                    <form method="post" action="{{ route('countires.store_data') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <label>اسم الدولة </label>
                                    <input type="text" required name="title_en" autocomplete="off" data-country-id="0"
                                        class="form-control" id="country" placeholder="اسم الدولة">
                                </div>
                                <div id="full_data"></div>
    
    
                            </div>
    
                            <br>
                            <div class="col-md-3" id="country_info"></div>
    
                            <br>
    
    
                        </div>
    
    
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i>اضافة
                        </button>
    
    
    
                    </form>
    
                </div>
              
                <div class="tab-pane fade active show" id="kt_ecommerce_settings_general" role="tabpanel">

                    <!--begin::Form-->
                    @include('pages.country._index')
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
                <h4 class="modal-title"> اضف دولة جديدة </h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>

            </div>

            <!-- Modal body -->
            <div class="modal-body ">
                <div id="form-errors" class="text-center"></div>
                <div id="success" class="text-center"></div>
                <form id="sendmemessage">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-8">
                                <label>اسم الدولة </label>
                                <input type="text" required name="title_en" autocomplete="off" data-country-id="0"
                                    class="form-control" id="country" placeholder="Added Country">
                            </div>
                            <div id="full_data"></div>


                        </div>

                        <br>
                        <div class="col-md-3" id="country_info"></div>

                        <br>


                    </div>


                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i>اضافة
                    </button>



                </form>


            </div>



            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
            </div>
        </div>

    </div>
</div> --}}
</div>
<div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="direction: rtl">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">
                    تعديل الدولة</h5>

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
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    {{-- <script>
        $(document).ready(function() {
            "use strict";
            var read_specialty = "{{ auth()->user()->can('edit-countires') }}";
            var delete_specialty = "{{ auth()->user()->can('delete-countires') }}";

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
                            url: "{{ route('country.getData') }}",
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
                                        .flag;
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
                                    var url_delete = "countires/" + url;
                                    if(read_specialty == true){
                                        var edit = '<a  onclick = SelectedPeopleRecord("' +
                                        url +
                                        '") class="btn btn-sm btn-clean btn-icon btn-info" title="Edit details">\
                                                                             <i class="la la-edit"></i>\
                                                                               </a>';
                                    }else{
                                        return ' ';
                                    }
                                    if(delete_specialty == true){
                                        var deletee = ' <a href="javascript:;" data-id="' + url +
                                        '" onclick = delete_record("' + url + '","' +
                                        url_delete +
                                        '") data-route="route("specialtys.destroy",' + url + ')" class="btn btn-sm btn-clean btn-icon btn-danger deleteRecord" title="Delete">\
                                                                         		<i class="la la-trash"></i>\
                                                                                       </a>\
                                                                                    ';
                                    }else{
                                        return ' ';
                                    }
                                    
                                      return edit + ' ' + deletee;
                                       
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
    </script> --}}
    <script type="text/javascript">
        var SelectedPeopleRecord = function(id) {

            $("#exampleModaledit").modal('show');
            $.ajax({
                type: 'get',
                url: "{{ route('get_form_country') }}",
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


            store("{{ route('countires.store_data') }}", 'get', data, '#kt_datatable_example_2', 'sendmemessage',
                '#exampleModal', 'Added successfully');
                $("#sendmemessage")[0].reset();





        });
    </script>
    <script>
        function autocomplete(inp, arr, fullarr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) {
                    return false;
                }
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /*create a DIV element for each matching element:*/

                        b = document.createElement("a");
                        /*make the matching letters bold:*/
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' data-country-id=" + i + " value='" + arr[i] + "'>";
                        b.innerHTML += "<br>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function(e) {
                            // $('#country').data('country-id', 200);

                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            inp.dataset.countryId = this.getElementsByTagName("input")[0].dataset
                                .countryId;

                            var txt = document.getElementById("full_data");
                            txt.innerHTML = '';
                            var country_info = document.getElementById("country_info");
                            country_info.innerHTML = '';


                            txt.innerHTML += "<input type='hidden' name='flag' value='" + fullarr[inp
                                .dataset.countryId].flag + "'>";
                            txt.innerHTML += "<input type='hidden' name='alpha2Code' value='" + fullarr[
                                inp.dataset.countryId].alpha2Code + "'>";
                            txt.innerHTML += "<input type='hidden' name='nativeName' value='" + fullarr[
                                inp.dataset.countryId].nativeName + "'>";

                            txt.innerHTML += "<input type='hidden' name='alpha3Code' value='" + fullarr[
                                inp.dataset.countryId].alpha3Code + "'>";
                            txt.innerHTML += "<input type='hidden' name='code' value='" +
                                fullarr[inp.dataset.countryId].callingCodes[0] + "'>";
                            txt.innerHTML += "<input type='hidden' name='title_ar' value='" + fullarr[
                                inp.dataset.countryId].nativeName + "'>";
                            txt.innerHTML += "<input type='hidden' name='lat' value='" + parseFloat(
                                fullarr[inp.dataset.countryId].latlng[0]) + "'>";
                            txt.innerHTML += "<input type='hidden' name='lng' value='" + fullarr[inp
                                .dataset.countryId].latlng[1] + "'>";
                            txt.innerHTML += "<input type='hidden' name='name' value='" + fullarr[inp
                                .dataset.countryId].name + "'>";

                            country_info.innerHTML += `
                            <div class="body text-center">
                            <div class="circle">
                                <img style="max-width: 150px;" src="` + fullarr[inp.dataset.countryId].flag + `" alt="">
                            </div>
                            <h6 class="mt-3 mb-0">` + fullarr[inp.dataset.countryId].name + ` | ` + fullarr[inp.dataset
                                .countryId].nativeName + `</h6>
                            <div>country code ` + fullarr[inp.dataset.countryId].alpha2Code + `</div>
                            <div>phone code ` + fullarr[inp.dataset.countryId].callingCodes[0] + `</div>
                            <div>lat ` + (fullarr[inp.dataset.countryId].latlng[0]) + `</div>
                            <div>lat ` + fullarr[inp.dataset.countryId].latlng[1] + `</div>
                        </div>`;


                            inp.parentNode.insertBefore(txt, inp.nextSibling);

                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });

            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
            }

            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }

            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function(e) {
                closeAllLists(e.target);
            });
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            var allData = null;

            $.ajax({
                'type': "GET",
                'dataType': 'json',
                'async': false,
                'url': "https://restcountries.com/v2/all",
                'success': function(data) {
                    allData = data;
                }
            });
            console.log(allData);
            countries = [];
            $.each(allData, function(i) {
                countries[i] = allData[i].nativeName;
            });

            // /*An array containing all the country names in the world:*/
            // var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

            // /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
            autocomplete(document.getElementById("country"), countries, allData);

            $('body form').on('submit', function() {

            });
            var msg = "{{ Session::get('success_msg') }}";
            var exist = "{{ Session::has('success_msg') }}";
            if (exist) {
                alertify.success(msg);
            }
        });
        $("#slide-toggle-button").click(function() {
            $("#form_toshow").slideToggle("slow");
        });
    </script>
@endsection
