@extends('layout.main')
<style>
    .count {
        background: #689258;
        border-radius: 21px;
        padding: 6px;
        color: beige;
    }

    .cur {
        font-size: 15px
    }
</style>
<x-base-layout>

    <div class="card card-flush">
        <!--begin::Card body-->
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                <!--begin: Pic-->
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        <img src="{{ asset('public/uploads/' . $user->image) }}" alt="image">

                    </div>
                </div>
                <!--end::Pic-->

                <!--begin::Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <!--begin::User-->
                        <div class="d-flex flex-column">
                            <!--begin::Name-->
                            <div class="d-flex align-items-center mb-2">
                                <a href="#"
                                    class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">{{ $user->name }}</a>
                                <a href="#">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen026.svg-->
                                    @if ($user->status == 1)
                                        <span class="svg-icon svg-icon-1 svg-icon-primary"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                    fill="white"></path>
                                            </svg></span>
                                    @endif
                                    <!--end::Svg Icon-->
                                </a>

                            </div>
                            <!--end::Name-->

                            <!--begin::Info-->
                            <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                <a href="#"
                                    class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com006.svg-->
                                    <span class="svg-icon svg-icon-4 me-1"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path opacity="0.3"
                                                d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                                fill="currentColor"></path>
                                            <rect x="7" y="6" width="4" height="4"
                                                rx="2" fill="currentColor"></rect>
                                        </svg></span>
                                    <!--end::Svg Icon-->
                                    {{ $user->type }}
                                </a>

                                <a href="#"
                                    class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com011.svg-->
                                    <span class="svg-icon svg-icon-4 me-1"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                fill="currentColor"></path>
                                        </svg></span>
                                    <!--end::Svg Icon-->
                                    {{ $user->email }}
                                </a>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->

                        <!--begin::Actions-->

                        <!--end::Actions-->
                    </div>
                    <!--end::Title-->

                    <!--begin::Stats-->
                    <div class="d-flex flex-wrap flex-stack">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1 pe-8">
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap">
                                <!--begin::Stat-->
                                <div
                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr066.svg-->

                                        <!--end::Svg Icon-->
                                        <div class="fs-2 fw-bolder counted" data-kt-countup="true"
                                            data-kt-countup-value="4500" data-kt-countup-prefix="$"
                                            data-kt-initialized="1"><span class="cur"> ريال
                                            </span>{{ $user->total }}</div>
                                    </div>
                                    <!--end::Number-->

                                    <!--begin::Label-->
                                    <div class="fw-bold fs-6 text-gray-400">Total</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->

                                <!--begin::Stat-->
                                <div
                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr065.svg-->

                                        <!--end::Svg Icon-->
                                        <div class="fs-2 fw-bolder counted" data-kt-countup="true"
                                            data-kt-countup-value="75" data-kt-initialized="1"><span class="cur">
                                                ريال </span>{{ $user->available }}</div>
                                    </div>
                                    <!--end::Number-->

                                    <!--begin::Label-->
                                    <div class="fw-bold fs-6 text-gray-400">Available</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->

                                <!--begin::Stat-->
                                <div
                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr066.svg-->

                                        <!--end::Svg Icon-->
                                        <div class="fs-2 fw-bolder counted" data-kt-countup="true"
                                            data-kt-countup-value="60" data-kt-countup-prefix="%"
                                            data-kt-initialized="1"><span class="cur"> ريال
                                            </span>{{ $user->pending }} </div>
                                    </div>
                                    <!--end::Number-->

                                    <!--begin::Label-->
                                    <div class="fw-bold fs-6 text-gray-400">Pending</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Wrapper-->

                        <!--end::Progress-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Info-->
            </div>


        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_4">الخدمات <span
                            class="count">{{ $user->services->count() }}</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_5">المقالات <span
                            class="count">{{ $user->blogs->count() }}</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_6">الفيديوهات <span
                            class="count">{{ $user->videos->count() }}</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_7">البودكاست <span
                            class="count">{{ $user->podcasts->count() }}</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_8">الاستشارات<span
                            class="count">{{ $user->consutiong->count() }}</span></a>
                </li>

            </ul>


            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
                    @include('pages.marketers.profile.services')
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
                    @include('pages.marketers.profile.blogs')

                </div>
                <div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel">
                    @include('pages.marketers.profile.videos')
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_7" role="tabpanel">
                    @include('pages.marketers.profile.podcasts')
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
                    @include('pages.marketers.profile.consutiong')
                </div>

            </div>
        </div>

        <!--end::Card body-->
    </div>

</x-base-layout>
@section('scripts')
<script>
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
</script>
@endsection
