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
                        <!--end::Svg Icon-->الخدمات
                    </a>

                </li>


            </ul>
            <form method="post" action="{{ route('tools.update', $tool->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">

                    <div class="form-group col-md-6">

                        <br><label> عنوان الادة :</label>

                        <input type="text" id="title" name="title" value="{{ $tool->title }}" required
                            class="form-control form-control-solid" placeholder="العنوان الاداة" />

                    </div>

                    <div class="form-group col-md-8">

                        <br><label> الوصف :</label>
                        <textarea name="description" required class="form-control" id="">{{ $tool->description }}</textarea>

                    </div>

                    <div class="form-group col-md-6">

                        <br> <label>التصنيف:</label>
                        <select class="form-select form-control form-select-solid " required id="specialty" name="specialty[]" multiple
                            required data-control="select2" data-close-on-select="false" data-placeholder="اختر"
                            data-allow-clear="true">
                            <option value=""></option>
                            @foreach ($specialty as $item)
                                <option value="{{ $item->id }}" @if(in_array($item->id,$type_array)) selected @endif>{{ $item->title }}</option>
                            @endforeach
                        </select>
            
            
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-6">

                        <br> <label>روابط الاداة :</label>
                        {{--   <input type="url" name="link" id="link"  class="form-control form-control-solid"
                            placeholder="رابط الاداة" /> --}}
                        <table class="table table-bordered" id="dynamicAddRemove">
                            <tr>
                                <th>الرابط</th>
                                <th>النوع</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($tool->links as $key => $item)
                                <td><input type="text" value="{{ $item->url }}" required
                                        name="moreFields[{{ $key }}][url]" placeholder="اضف الرابط"
                                        class="form-control" /></td>
                                <td>
                                    <select name="moreFields[{{ $key }}][type]" required class="form-control">
                                        <option value="apple" @if ($item->type == 'apple')  @endif>Apple</option>
                                        <option value="google" @if ($item->type == 'google')  @endif>Google</option>
                                        <option value="url" @if ($item->type == 'url')  @endif>Url</option>
                                    </select>
                                <td>
                                    <button type="button" class="btn btn-danger remove-tr">Remove</button>
                                </td>
                            @endforeach
                            <tr>
                                <td><input type="text" required name="moreFields[0][url]" placeholder="اضف الرابط"
                                        class="form-control" /></td>
                                <td>
                                    <select name="moreFields[0][type]" required class="form-control">
                                        <option value="apple">Apple</option>
                                        <option value="google">Google</option>
                                        <option value="url">Url</option>
                                    </select>
                                <td>
                                    <button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button>


                                </td>
                            </tr>
                        </table>
                    </div>


                    <div class=" col-md-12">
                        <div class="form-group">
                            <br> <label data-error="wrong" data-success="right" for="form3"> صور عن الخدمة <span
                                    class="required"></span></label>
                            {{-- <input type="file" multiple id="imageupload" name="images[]" class="form-control"> --}}
                            <input id="imagestore" class="form-control image" required type="file"
                                name="image"><br />
                            <div class="form-group">
                                <img src="{{ asset('public/uploads/' . $tool->image) }}" style="width: 100px"
                                    class="img-thumbnail image-preview" alt="">
                            </div>


                        </div>

                    </div>

                </div>

                <br>
                <button class="btn btn-info" id="submitform" style="" type="submit">اضف جديد </i></button>
            </form>
        </div>

</x-base-layout>
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

@section('scripts')
    <script>
        var input1 = document.querySelector("#kt_tagify_3");
        new Tagify(input1);
    </script>
    <script type="text/javascript">
        var i = {{ $tool->links->count() +1 }};
        $("#add-btn").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input required type="text" name="moreFields[' + i +
                '][url]" placeholder="أضف رابط" class="form-control" /></td><td><select required name="moreFields[' +
                i +
                '][type]" class="form-control"><option value="apple">Apple</option><option value="google">Google</option><option value="url">Url</option></select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
                );
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
