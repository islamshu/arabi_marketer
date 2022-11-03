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
                        <!--end::Svg Icon-->الاسئلة الخاصة بالبروفايل
                    </a>

                </li>


            </ul>


            <form id="edit_form_new" style="direction: rtl">
                @csrf
            
                
                <div class="row">
                    
                    <div class="form-group col-md-8">
                        <label for="email"> السؤال : <span class="required"></span></label>
                        <input type="text" name="title" required class="form-control"
                            value="{{ old('title')}}" id="title">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email"> نوع الاجبة  : <span class="required"></span></label>
                        <select name="type" class="form-control" id="">
                            <option value="" selected disabled>اختيار  </option>
                            <option value="single">اختيار خيار واحد</option>
                            <option value="multi">اختيار عدة خيارات </option>
                        </select>
                    </div>
                    <div id="car_parent">


                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label>الاجابة  :</label>
                                        <input type="text"
                                            class="form-control form-control-solid form-control-lg name_ar_offer"
                                            id="name_ar_offer" required name="addmore[0][answer]" required />

                                    </div>
                                </div>
                                <!--end::Input-->
                                <!--begin::Input-->
                               
                            </div>





                        </div>

                        <div id="extra">





                        </div>
                        <br>
                        <button type="button" name="add"
                            class="btn btn-success add_row for-more">{{ __('Add more') }}</button>


                       
                    </div>

            
            
            
            
            
            
                </div>
                <br>
            
            
                <button class="btn btn-info" type="submit">تعديل</i></button>
            </form>
           
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>
@section('scripts')
    
<script type="text/javascript">
    $(document).ready(function() {
        var i = 1;
        $('.add_row').on('click', function() {
            addRow();
        });

        function addRow() {
            ++i;
            const sum = i + 1;



            let form = `
                <span class="test">
                <div class="card-body" >
                    <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label>الاجابة :</label>
                            <input type="text"
                                class="form-control form-control-solid form-control-lg name_ar_offer"
                                id="name_ar_offer" name="addmore[` + i + `][answer]" required
                                />
                            
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <button type="button" class="remove_button btn btn-danger " title="Remove field">Remove</button>

                        </div>


                    
                </div>



                </div>
                </span>
                `;
            $('#extra').append(form);
            var wrapper = $('#extra');
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('div').remove();

            });

            // $(wrapper1).on('click', '.remove_button_old', function (e) {
            //     alert('d');
            //         e.preventDefault();
            // $(this).parent('span').remove();

            // });
        }
        var wrapper1 = $('#partent');
        $(wrapper1).on('click', '.remove_button_old', function(e) {
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
        });
    });
</script>
@endsection




