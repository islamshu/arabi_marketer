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
            <div class="row">
                <div class="col-md-4">
                    <h2><legend class="scheduler-border"> الخدمات/الطلبات </legend></h2> 

                    <canvas id="kt_chartjs_3"  style="height: 200px !important;width: 200px !important;"></canvas>
                </div>
                <div class="col-md-4">
                    <h2><legend class="scheduler-border"> افضل الفائات</legend></h2> 
                    <canvas id="kt_chartjs_4" ></canvas>

                 

                    <br>
                </div>
           
                


            </div>

            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_4">الخدمات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_5">خدمات المسوقين</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_6">اضف جديد</a>
                </li>
                
            </ul>

            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
                    @include('pages.service._index')
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
                    @include('pages.service._marketer')

                </div>
                <div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel">
                    @include('pages.service._create')
                </div>
              
            </div>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            
            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>
@php
    $array  = array();
    $array_count  = array();

    foreach ($category_most as $key => $value) {
        array_push($array,$value->title);
        array_push($array_count,\App\Models\ServiceCategory::where('category_id',$value->id)->count());
    }
    $rlp = str_replace('"', '', ($array));
        

    
    
@endphp

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

@section('scripts')

    <script>
            $(".btnnlock").click(function(){ 
                $('#management_ratio').prop('disabled', false);
                $(".btnnlock").css("display", "none");
                $(".btnlock").css("display", "block");
            });
            $(".btnlock").click(function(){ 
                $('#management_ratio').prop('disabled', true);
                $(".btnnlock").css("display", "block");
                $(".btnlock").css("display", "none");
            });
            $("#type_service").change(function(){
                var selecttt = $( this ).val();
                if(selecttt == 'digital'){
                    $("#addrequired").prop('required',true);
                    $("#has_file").prop('required',false);
                    $('#has_file_class').css("display", "none");
                    $('.show_file').css("display", "block");

                }else{
                    $("#addrequired").prop('required',false);
                    $('#has_file_class').css("display", "block");
                    $("#has_file").prop('required',true);

                    
                    $('.show_file').css("display", "none");
                }
            });
           $('#send_form').on('submit', function(e) {
            e.preventDefault();
            var frm = $('#send_form');
            var formData = new FormData(frm[0]);
            let TotalFiles = $('#file-upload-demo')[0].files.length; //Total files
            let files = $('#file-upload-demo')[0];
            for (let i = 0; i < TotalFiles; i++) {
            formData.append('images' + i, files.files[i]);
            }
            formData.append('TotalFiles', TotalFiles);
            formData.append('file', $('.fileservice')[0].files[1]);

            storefile("{{ route('services.store') }}",'post', formData,'#kt_datatable_example_2','send_form','#exampleModal','Added successfully');
           $("#send_form")[0].reset();
           setTimeout(function () {
        location.reload(true);
      }, 3000);


            




            // $.ajax({
            //     url: "{{ route('specialtys.store') }}",
            //     type: "post",
            //     data: formData,
            //     processData: false,
            //     contentType: false,
            //     success: function(data) {
            //         // var table = $('#stores').DataTable();

            //         var t = $('#kt_datatable_example_2').DataTable();
            //         const tr = $(data);
            //         t.row.add(tr).draw(false);


            //         document.getElementById("sendmemessage").reset();
            //         $('#exampleModal').modal('hide')
            //         swal(
            //             '',
            //             'Added successfully',
            //             'success'
            //         )


            //     },
            //     error: function(data) {
            //         var errors = data.responseJSON;
            //         var errors = data.responseJSON;
            //         errorsHtml = '<div class="alert alert-danger"><ul>';
            //         $.each(errors.errors, function(k, v) {
            //             errorsHtml += '<li>' + v + '</li>';
            //         });
            //         errorsHtml += '</ul></di>';
            //         $('#form-errors').html(errorsHtml);
            //     },
            // });
        });
        $(".files").click(function(){ 
         var html = $(".clone").html();
         $(".increment").after(html);
     });
     $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
        $('#has_file').change(function(){
            alert('dd');
            if($(this).val() == 'نعم'){
                $('.show_file').css({display: "block"});
                $('.addrequired').attr('required', true);   

            }else{
                $('.show_file').css({display: "none"});
                $('.addrequired').attr('required', false);   

            }
        });
        function getRandom(min = 1, max = 100) {
        return Math.floor(Math.random() * (max - min) + min);
    }
      
        function generateRandomData(min = 1, max = 100, count = 10) {
        var arr = [];
        for (var i = 0; i < count; i++) {
            arr.push(getRandom(min, max));
        }
        return arr;
    }
        // Define chart element
        var ctx = document.getElementById('kt_chartjs_3');

        // Define colors
        var primaryColor = KTUtil.getCssVariableValue('--kt-primary');
        var dangerColor = KTUtil.getCssVariableValue('--kt-danger');
        var successColor = KTUtil.getCssVariableValue('--kt-success');
        var warningColor = KTUtil.getCssVariableValue('--kt-warning');
        var infoColor = KTUtil.getCssVariableValue('--kt-info');

        // Chart labels
        const labels = ['الخدمات', 'طلبات المستخدمين'];
        const totalservice = "{{ $services->count() }}";

        // Chart data
        const data = {
            labels: labels,
            datasets: [
                {
                    label: 'Dataset 1',
                    data: [totalservice,{{ $orders_count }}],
                    backgroundColor: [primaryColor, dangerColor]
                },
            ]
        };

        // Chart config
        const config = {
            type: 'pie',
            data: data,
            options: {
                plugins: {
                    title: {
                        display: false,
                    }
                },
                responsive: true,
            }
        };

        // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
        var myChart = new Chart(ctx, config);
    


        var ctx = document.getElementById('kt_chartjs_4');

        // Define colors
        var primaryColor = KTUtil.getCssVariableValue('--kt-primary');
        var dangerColor = KTUtil.getCssVariableValue('--kt-danger');
        var successColor = KTUtil.getCssVariableValue('--kt-success');
        var warningColor = KTUtil.getCssVariableValue('--kt-warning');
        var infoColor = KTUtil.getCssVariableValue('--kt-info');

        // Chart labels
        
        const labels_cat = @json($array);
;
        const totalserviced = "{{ $services->count() }}";
        let total_cat =  "{{ count($array) }}";
        var cccat = 0;

        if(total_cat == 1){
            var cccat = [primaryColor];
        }else if(total_cat == 2){
            var cccat = [successColor,primaryColor];
        }else if(total_cat == 3){
            var cccat = [primaryColor,dangerColor,successColor];
        }else if(total_cat == 4){
            var cccat = [primaryColor, dangerColor,successColor,warningColor];
        }else if(total_cat == 5){
            var cccat = [primaryColor, dangerColor,successColor,warningColor,infoColor];
        }

        // Chart data
        const data2 = {
            labels: labels_cat,
            datasets: [
                {
                    label: 'Dataset 1',
                    data: @json($array_count),
                    backgroundColor: cccat
                },
            ]
        };

        // Chart config
        const config2 = {
            type: 'pie',
            data: data2,
            options: {
                plugins: {
                    title: {
                        display: false,
                    }
                },
                responsive: true,
            }
        };

        // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
        var myChart = new Chart(ctx, config2);
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
                initialPreview: [
                    
                ],
                initialPreviewConfig: [
          
                ]
            });
    
        });
        /*!
 * bootstrap-fileinput v4.3.9
 * http://plugins.krajee.com/file-input
 *
 * Author: Kartik Visweswaran
 * Copyright: 2014 - 2017, Kartik Visweswaran, Krajee.com
 *
 * Licensed under the BSD 3-Clause
 * https://github.com/kartik-v/bootstrap-fileinput/blob/master/LICENSE.md
 */

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var i = 0;
        $('.add_row').on('click',function(){
            addRow();
        });
        
        function addRow(){
        ++i;
        
        
        
        let form = '<fieldset>'+'<ul>'+'<li class="lix remove_button">'+'<button type="button" class="remove_button" title="Remove field">'+'close'+'</button>'+'</li>'+'</ul>'+'<div class="input-container">'+'<label for="time" class="rl-label required form-control">  اسم الاضافة </label>'+'<input type="text" id="time" name="addmore['+i+'][title_extra]" class="form-control" placeholder="Enter them item time here...">'+'</div>'+
    '<div class="input-container half">'+'<label for="time" class="rl-label  required">السعر المضاف   </label>'+'<input  type="text" id="priceff" class="form-control" name="addmore['+i+'][price_extra]" placeholder="Enter them item time here...">'+'</div>'+'<div class="input-container form-control half">'+'<label for="more_time" half class="rl-label required"> الوقت المضاف </label>'+'<input type="text" id="time" name="addmore['+i+'][more_time]" class="form-control" placeholder="Enter them item time here...">'+'</div>'+'</fieldset>';
           $('#extra').append(form);
           var wrapper = $('#extra');
        $(wrapper).on('click', '.remove_button', function (e) {
                e.preventDefault();
        $(this).parent('ul').parent('fieldset').remove();
        
                     });
        }
        });
        </script>
@endsection
