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
        

            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_4">بودكاست</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_6">اضف جديد</a>
                </li>
                
            </ul>

            
            <div class="tab-content" id="myTabContent">
                <div>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>عنوان البودكاست</th>
                                <th>اضيفت بواسطة</th>
                                <th>تاريخ الاضافة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($podcasts as $item)
                            <tr>
                             <td>{{ get_title_rss($item->url) }}</td>
                             <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>
                             <td>{{ date('Y-m-d', strtotime($item->created_at)); }}</td>
                             <td>
                                <a target="_blacnk" href="{{ route('media_rss',$item->url) }}"><i class="fa fa-eye">c</i></a>
                                <form style="display: inline"
                                    action="{{ route('destort_new', $item->id) }}"
                                    method="post">
                                    @method('delete') @csrf
                                    <button type="submit" class="btn btn-danger delete-confirm"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            </tr>
                                
                            @endforeach
                        </tfoot>
                    </table>
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
