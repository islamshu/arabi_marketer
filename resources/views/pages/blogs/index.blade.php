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
                        <!--end::Svg Icon-->المقالات
                    </a>

                </li>


            </ul>
        

            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">المقالات</a>
                </li>
                   <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab" href="#kt_tab_pane_3"> المقالات المعلقة</a>
                </li>
             
             
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">اضف جديد</a>
                </li>
                
            </ul>

            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                    @include('pages.blogs._index')
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                    @include('pages.blogs.bending')
                </div>

                
               
                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                    @include('pages.blogs._create')
                </div>
              
            </div>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            
            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>


@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


@section('scripts')
<script>
    ( document ).ready(function() {
    alert('ready');
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
            var formData = new FormData(frm[0]);
            formData.append('file', $('#imageupload')[0].files[0]);
            formData.append('_token', token);
            
            storefile("{{ route('blogs.store') }}",'post', formData,'#kt_datatable_example_2','send_form','#exampleModal','Added successfully');
           $("#send_form")[0].reset();
        //    location.reload(true);
        setTimeout(function() {
         window.location.reload();
      }, 3000);
        });
   </script>
   <script>
    ClassicEditor
            .create( document.querySelector( '.editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
            var input1 = document.querySelector("#kt_tagify_3");
            new Tagify(input1);
</script>
@endsection
