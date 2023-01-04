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
                        <!--end::Svg Icon-->الفيديوهات
                    </a>

                </li>


            </ul>
            

            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_4"> الفيديوهات</a>
                </li>
            
                
            </ul>

            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
                    <div>
                        <table id="eexdampleee"  class="display example" style="width:100%">
                            <thead>
                                <tr>
                                    <th>الصورة </th>

                                    <th>عنوان الفيديو</th>
                                    <th>اضيف بواسطة</th>
                                    <th>رابط على اليوتيوب</th>
                                    <th>تاريخ الاضافة</th>
                                    <th>الحالة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $item)
                                <tr>
                                 <td><img src="{{ asset('public/uploads/'.$item->image) }}" width="50" height="50" alt=""></td>
                                 <td>{{ $item->title }}</td>
                                 <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>
                                 <td>{{ date('Y-m-d', strtotime($item->created_at)); }}</td>
                               <td>  {{ $item->user->type }}</td>
                                 <td>
                                    <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch allsseeeee"
                                        {{ $item->status == 1 ? 'checked' : '' }}>
                                </td>
                                 <td>
                                    <a href="{{ route('services.show', $item->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                    
                                    {{-- <a href="{{ route('services.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> --}}
                                    <form style="display: inline"
                                        action="{{ route('services.destroy', $item->id) }}"
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
             
              
            </div>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            
            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>
{{-- @php
    $array  = array();
    $array_count  = array();

    foreach ($category_most as $key => $value) {
        array_push($array,$value->title);
        array_push($array_count,\App\Models\ServiceCategory::where('category_id',$value->id)->count());
    }
    $rlp = str_replace('"', '', ($array));
        

    
    
@endphp --}}

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
      $(document).ready(function() {
        function myFunction(id) {
            // alert('worker_status_'+id);
            // alert($('#worker_status_'+id).val());

            let status = $('#worker_status_' + id).val();

            let booked_id = id;
            $.ajax({
                type: 'post',
                url: "{{ route('update_status_video') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'status': status,
                    'booked_id': booked_id,
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data['status'] == true) {
                        if (status == 1) {
                            $('#worker_status_' + id).css("backgroundColor", "#5fc69e")
                        } else if (status == 0) {
                            $('#worker_status_' + id).css("backgroundColor", "#a1a5b7")
                        } else if (status == 2) {
                            $('#worker_status_' + id).css("backgroundColor", "#f1416c")
                        }
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success('{{ __('Updated successfully') }}');

                    } else {
                        alert('Whoops Something went wrong!!');
                    }

                }
            });
        }
                });
</script>

 
