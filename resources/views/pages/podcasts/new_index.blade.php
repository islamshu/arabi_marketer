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
                        <!--end::Svg Icon-->البودكاست
                    </a>

                </li>


            </ul>
        

            <div class="card card-docs mb-2">
                <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
                    <div class="mt-10">
        
                        <div class="row">
                       
             
                    
                        <div class="col-md-6 bg-light-info px-6 py-8 rounded-2 mb-7 mr-7 ml-7">
                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                            <span class="svg-icon svg-icon-3x text-center svg-icon-danger d-block my-2">
                                {{-- <i class="fa fa-user fa-4x"></i> --}}
                               <img src="https://cdn-icons-png.flaticon.com/512/124/124033.png" height="80" alt="">
                            </span>
                            <!--end::Svg Icon-->
                            <button type="button" style="font-weight: bold;margin-left: 40%" class="svg-icon svg-icon-3x text-center svg-icon-danger d-block my-2 btn"data-bs-toggle="modal" data-bs-target="#kt_modal_2">
                                Import Rss
                            </button>
                        </div>
        
                        <div class="col-md-6 bg-light-warning px-6 py-8 rounded-2 mb-7 mr-7 ml-7">
                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                            <span class="svg-icon svg-icon-3x text-center svg-icon-danger d-block my-2">
                                {{-- <i class="fa fa-user fa-4x"></i> --}}
                               <img src="https://www.pngitem.com/pimgs/m/97-972731_podcast-podcasting-icon-hd-png-download.png" height="80" alt="">
                            </span>
                            <!--end::Svg Icon-->
                            <button type="button" style="font-weight: bold;margin-left: 40%" class="svg-icon svg-icon-3x text-center svg-icon-danger d-block my-2 btn"data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                                Create Podcast
                            </button>
                                                </div>
        
        
                        
             
                
                
                </div>

            
            <div class="tab-content" id="myTabContent">
                <div class="modal fade" tabindex="-1" id="kt_modal_2">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content shadow-none">
                            <div class="modal-header">
                                <h3 class="modal-title">Import RSS</h3>
                                <div class="row">

                                        <div class="form-group col-md-6">
                            
                            
                                            <br><label> User  :</label>

                                            <select class="form-select" required name="user_id"  data-control="select2" data-placeholder="اختر المستخدم">
                                                <option value="" selected disabled>يرجى الاختيار</option>
                                                @foreach (App\Models\User::get() as $item)
                                                <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                
                                                @endforeach
                                            </select>
                            
                                        </div>
                                        <div class="form-group col-md-6">
                            
                                            <br><label>  Rss link:</label>
                            
                                            <input type="url" id="url" name="url" required class="form-control form-control-solid"
                                                placeholder="Rss link" />
                            
                                        </div>
                                </div>
                
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <span class="svg-icon svg-icon-1"></span>
                                </div>
                                <!--end::Close-->
                            </div>
                
                            <div class="modal-body">
                                <p>Modal body text goes here.</p>
                            </div>
                
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
             
                            
            </div>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            
            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Modal title</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

@section('scripts')
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
    <script>
        $('#send_form').on('submit', function(e) {
            
            e.preventDefault();
            var frm = $('#send_form');
            var formData = new FormData(frm[0]);
            formData.append('file', $('#imagestore')[0].files[0]);
            storefile("{{ route('podcasts.store') }}",'post', formData,'#kt_datatable_example_2','sendmemessage','#exampleModal','Added successfully');
            $("#send_form")[0].reset();
           setTimeout(function () {
        location.reload(true);
      }, 3000);

        });

    </script>
   
@endsection
