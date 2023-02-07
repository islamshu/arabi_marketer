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
                        <!--end::Svg Icon-->طرق الدفع الخاصة بالنظام
                    </a>

                </li>


            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                {{-- @can('create-payments') --}}
                    <button id="slide-toggle-button" class="btn btn-primary">
                        اضف جديد
                    </button>
                {{-- @endcan --}}
                <div class="col-md-8" id="form_toshow" style="display: none;margin-top:5px">
                    <form id="sendmemessage">
                        @csrf

                        <div class="form-group">
                            <label data-error="wrong" data-success="right" for="form3">الصورة <span
                                    class="required"></span></label>
                            <input type="file" id="imagestore" required name="icon" class="form-control image">
                        </div>
                        <div class="form-group">
                            <img src="{{ asset('uploads/product_images/default.png') }}" style="width: 100px"
                                class="img-thumbnail image-preview" alt="">
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="email"> العنوان بالعربية: <span class="required"></span></label>
                                <input type="text" name="title_ar" required class="form-control"
                                    value="{{ old('title_ar') }}" id="title_ar">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email"> العنوان بالانجليزية : <span class="required"></span></label>
                                <input type="text" name="title_en" required class="form-control"
                                    value="{{ old('title_en') }}" id="title_en">
                            </div>






                        </div>
                        <br>


                        <button class="btn btn-info" type="submit">اضافة</i></button>
                    </form>
                </div>
                <div class="tab-pane fade active show" id="kt_ecommerce_settings_general" role="tabpanel">

                    <!--begin::Form-->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>صورة المقال</th>
                                <th>عنوان</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $item)
                                <tr>
                                    <td><img src="{{ asset('public/uploads/' . $item->logo) }}" width="50"
                                            height="50" alt=""></td>
                                    <td>{{ $item->title }}</td>

                                    <td>
                                        {{-- @can('edit-payments') --}}
                                            <button class="btn btn-info" data-toggle="modal" data-target="#myModal4"
                                                onclick="SelectedPeopleRecord('{{ $item->id }}')"><i
                                                    class="fa fa-edit"></i></button>
                                        {{-- @endcan --}}
                                        {{-- @can('delete-payments') --}}
                                            <form style="display: inline"
                                                action="{{ route('payments.destroy', $item->id) }}" method="post">
                                                @method('delete') @csrf
                                                <button type="submit" class="btn btn-danger delete-confirm"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        {{-- @endcan --}}
                                    </td>
                                </tr>
                            @endforeach
                            </tfoot>
                    </table>
                    <!--end::Form-->
                </div>

            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>
<div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="direction: rtl">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">
                    تعديل طريقة الدفع</h5>

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
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>


    <script type="text/javascript">
        var SelectedPeopleRecord = function(id) {

            $("#exampleModaledit").modal('show');
            $.ajax({
                type: 'post',
                url: "{{ route('get_form_payment') }}",
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
        $('#sendmemessage').on('submit', function(e) {
            e.preventDefault();
            var frm = $('#sendmemessage');
            var formData = new FormData(frm[0]);
            formData.append('file', $('#imagestore')[0].files[0]);
            storefile("{{ route('payments.store') }}", 'post', formData, '#kt_datatable_example_2', 'sendmemessage',
                '#exampleModal', 'Added successfully');
            $("#sendmemessage")[0].reset();
            setTimeout(function() {
                location.reload();
            }, 2000)
        });
        $("#slide-toggle-button").click(function() {
            $("#form_toshow").slideToggle("slow");
        });
    </script>
@endsection
