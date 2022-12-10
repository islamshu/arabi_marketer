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
                        <!--end::Svg Icon-->من نحن
                    </a>
                </li>
            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div id="form-errors"></div>
<form method="post" action="{{ route('videos.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">

      
   
        <div class="form-group col-md-8">

            <br><label> من نحن :</label>
            <textarea name="body" required class=" editor" ></textarea>

        </div>

   
        
        

       
        
    </div>
    
     <br>
    <button class="btn btn-info" id="submitform" style="" type="submit">حفظ  </i></button>
</form>


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


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('.editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
 
</script>