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
                        <!--end::Svg Icon-->التعليقات الخاصة بمقال {{ $blog->title }}
                    </a>

                </li>


            </ul>





            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th># </th>
                        <th>عنوان التدوينة </th>
                        <th>التعليق </th>
                        @can('status-comment-blog')
                            <th>الحالة</th>
                        @endcan
                        <th>الاجراءات </th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->blog->title }}</td>
                            <td>{!! $item->body !!}</td>
                            @can('status-comment-blog')
                                <td>
                                    <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch"
                                        {{ $item->status == 1 ? 'checked' : '' }}>
                                </td>
                            @endcan



                            @can('delete-comment-blog')
                                <form style="display: inline" action="{{ route('comments.destroy', $item->id) }}"
                                    method="post">
                                    @method('delete') @csrf
                                    <button type="submit" class="btn btn-danger delete-confirm"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            @endcan
                        </tr>
                        @endforeach

                        </tfoot>
            </table>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->

            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>


@section('scripts')
    <script>
        $(document).ready(function() {
            $("#example").on("change", ".js-switch", function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let comment_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('comment.update.status') }}',
                    data: {
                        'status': status,
                        'comment_id': comment_id
                    },
                    success: function(data) {
                        console.log(data.message);
                    }
                });
            });
        });
    </script>
@endsection
