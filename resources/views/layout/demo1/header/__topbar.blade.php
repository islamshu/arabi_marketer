@php
    $itemClass = 'ms-1 ms-lg-3';
    $btnClass = 'btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px';
    $userAvatarClass = 'symbol-30px symbol-md-40px';
    $btnIconClass = 'svg-icon-1';
@endphp
<style>
    .bell {
        cursor: pointer;
        margin-right: 50px;
        line-height: 60px
    }

    .bell span {
        background: #f00;
        padding: 7px;
        border-radius: 50%;
        color: #fff;
        vertical-align: top;
        margin-left: -25px
    }

    .bell img {
        display: inline-block;
        width: 26px;
        margin-top: 4px
    }

    .bell:hover {
        opacity: .7
    }

    .logo {
        flex: 1;
        margin-left: 50px;
        color: #eee;
        font-size: 20px;
        font-family: monospace
    }

    .notifications {
        width: 300px;
        height: 0px;
        opacity: 0;
        position: absolute;
        top: 63px;
        right: 62px;
        border-radius: 5px 0px 5px 5px;
        background-color: #fff;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }

    .notifications h2 {
        font-size: 14px;
        padding: 10px;
        border-bottom: 1px solid #eee;
        color: #999
    }

    .notifications h2 span {
        color: #f00
    }

    .notifications-item {
        display: flex;
        border-bottom: 1px solid #eee;
        padding: 6px 9px;
        margin-bottom: 0px;
        cursor: pointer
    }

    .notifications-item:hover {
        background-color: #eee
    }

    .notifications-item img {
        display: block;
        width: 40px;
        height: 40px;
        margin-right: 9px;
        border-radius: 50%;
        margin-top: 2px
    }

    .notifications-item .text h4 {
        color: #777;
        font-size: 16px;
        margin-top: 3px
    }

    .notifications-item .text p {
        color: #aaa;
    }
</style>

<!--begin::Toolbar wrapper-->
<div class="d-flex align-items-stretch flex-shrink-0">
    <!--begin::Search-->
    {{-- <div class="d-flex align-items-stretch {{ $itemClass }}">
        {{ theme()->getView('partials/search/_base') }}
    </div> --}}
    <!--end::Search-->

    <!--begin::Activities-->
    {{-- <div class="d-flex align-items-center {{ $itemClass }}">
        <!--begin::Drawer toggle-->
        <div class="{{ $btnClass }}" id="kt_activities_toggle">
            {!! theme()->getSvgIcon("icons/duotune/general/gen032.svg", $btnIconClass) !!}
        </div>
        <!--end::Drawer toggle-->
    </div> --}}
    <!--end::Activities-->

    <!--begin::Notifications-->
    <div class="d-flex align-items-center {{ $itemClass }}">
        <!--begin::Menu- wrapper-->
        <div class="{{ $btnClass }}" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            {!! theme()->getSvgIcon("icons/duotune/general/gen022.svg", $btnIconClass) !!}
        </div>
    {{ theme()->getView('partials/topbar/_notifications-menu') }}
    <!--end::Menu wrapper-->
    </div>
    <!--end::Notifications-->

    <!--begin::Chat-->
    {{-- <div class="d-flex align-items-center {{ $itemClass }}">
        <!--begin::Menu wrapper-->
        <div class="{{ $btnClass }} position-relative" id="kt_drawer_chat_toggle">
            {!! theme()->getSvgIcon("icons/duotune/communication/com012.svg", $btnIconClass) !!}

            <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink">
            </span>
        </div>
        <!--end::Menu wrapper-->
    </div> --}}
    <!--end::Chat-->

    <!--begin::Quick links-->
    {{-- <div class="d-flex align-items-center {{ $itemClass }}">
        <!--begin::Menu wrapper-->
        <div class="{{ $btnClass }}" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            {!! theme()->getSvgIcon("icons/duotune/general/gen025.svg", $btnIconClass) !!}
        </div>
    {{ theme()->getView('partials/topbar/_quick-links-menu') }}
    <!--end::Menu wrapper-->
    </div> --}}
    <!--end::Quick links-->

    <!--begin::Theme mode-->
    @php
        $notifications = auth()->user()->unreadNotifications;
        $count = auth()
            ->user()
            ->unreadNotifications->count();
    @endphp
    <div class="d-flex align-items-center {{ $itemClass }}">
        <!--begin::Menu toggle-->

        <!--begin::Menu toggle-->
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px show" data-kt-menu="true"
            data-popper-placement="bottom-end"
            style="z-index: 105; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-137.6px, 55.2px, 0px);">
            <!--begin::Heading-->
            <div class="d-flex flex-column bgi-no-repeat rounded-top"
                style="background-image:url('https://dashboard.digitalgo.net/demo1/media/misc/pattern-1.jpg')">
                <!--begin::Title-->
                <h3 class="text-white fw-bold px-9 mt-10 mb-6">
                    Notifications
                </h3>
                <!--end::Title-->

                <!--begin::Tabs-->
                <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-bold px-9">
                    <li class="nav-item">
                        <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab"
                            href="#kt_topbar_notifications_1">Alerts</a>
                    </li>
                </ul>
                <!--end::Tabs-->
            </div>
            <!--end::Heading-->

            <!--begin::Tab content-->
            <div class="tab-content">
                <!--begin::Tab panel-->
                <!--begin::Items-->
                <div class="scroll-y mh-325px my-5 px-8">
                    <!--begin::Item-->
                    <div class="d-flex flex-stack py-4">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-35px me-4">
                                <span class="symbol-label bg-light-Direct">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen044.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-Direct"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                height="20" rx="10" fill="currentColor"></rect>
                                            <rect x="11" y="14" width="7" height="2"
                                                rx="1" transform="rotate(-90 11 14)" fill="currentColor"></rect>
                                            <rect x="11" y="17" width="2" height="2"
                                                rx="1" transform="rotate(-90 11 17)" fill="currentColor"></rect>
                                        </svg></span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Symbol-->

                            <!--begin::Title-->
                            <div class="mb-0 me-2">
                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">رسالة
                                    جديدة</a>
                                <div class="text-gray-400 fs-7">يوجد لديك رسالة جديدة من مستخدم</div>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Label-->
                        <span class="badge badge-light fs-8">2022-11-13 11:29:32</span>
                        <!--end::Label-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex flex-stack py-4">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-35px me-4">
                                <span class="symbol-label bg-light-Direct">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen044.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-Direct"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                height="20" rx="10" fill="currentColor"></rect>
                                            <rect x="11" y="14" width="7" height="2"
                                                rx="1" transform="rotate(-90 11 14)" fill="currentColor"></rect>
                                            <rect x="11" y="17" width="2" height="2"
                                                rx="1" transform="rotate(-90 11 17)" fill="currentColor"></rect>
                                        </svg></span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Symbol-->

                            <!--begin::Title-->
                            <div class="mb-0 me-2">
                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">رسالة
                                    جديدة</a>
                                <div class="text-gray-400 fs-7">يوجد لديك رسالة جديدة من مستخدم</div>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Label-->
                        <span class="badge badge-light fs-8">2022-11-13 09:44:05</span>
                        <!--end::Label-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex flex-stack py-4">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-35px me-4">
                                <span class="symbol-label bg-light-Direct">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen044.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-Direct"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                height="20" rx="10" fill="currentColor"></rect>
                                            <rect x="11" y="14" width="7" height="2"
                                                rx="1" transform="rotate(-90 11 14)" fill="currentColor">
                                            </rect>
                                            <rect x="11" y="17" width="2" height="2"
                                                rx="1" transform="rotate(-90 11 17)" fill="currentColor">
                                            </rect>
                                        </svg></span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Symbol-->

                            <!--begin::Title-->
                            <div class="mb-0 me-2">
                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">رسالة
                                    جديدة</a>
                                <div class="text-gray-400 fs-7">يوجد لديك رسالة جديدة من مستخدم</div>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Label-->
                        <span class="badge badge-light fs-8">2022-11-07 10:39:40</span>
                        <!--end::Label-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex flex-stack py-4">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-35px me-4">
                                <span class="symbol-label bg-light-General">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen044.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-General"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                height="20" rx="10" fill="currentColor"></rect>
                                            <rect x="11" y="14" width="7" height="2"
                                                rx="1" transform="rotate(-90 11 14)" fill="currentColor">
                                            </rect>
                                            <rect x="11" y="17" width="2" height="2"
                                                rx="1" transform="rotate(-90 11 17)" fill="currentColor">
                                            </rect>
                                        </svg></span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Symbol-->

                            <!--begin::Title-->
                            <div class="mb-0 me-2">
                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">رسالة
                                    جديدة</a>
                                <div class="text-gray-400 fs-7">يوجد لديك رسالة جديدة من مستخدم</div>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Label-->
                        <span class="badge badge-light fs-8">2022-11-07 10:11:27</span>
                        <!--end::Label-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Items-->

                <!--begin::View more-->
                <div class="py-3 text-center border-top">
                    <a href="https://dashboard.digitalgo.net/pages/profile/activity"
                        class="btn btn-color-gray-600 btn-active-color-primary">
                        View All
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr064.svg-->
                        <span class="svg-icon svg-icon-5"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="18" y="13" width="13" height="2"
                                    rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
                                <path
                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                    fill="currentColor"></path>
                            </svg></span>
                        <!--end::Svg Icon-->
                    </a>
                </div>
                <!--end::View more-->
            </div>



            <!--end::Tab panel-->
            <!--end::Tab content-->
        </div>
        {{-- <div class="bell" id="bell"> <i class="fa fa-bell"></i>{{ $count }} </div>
        <div class="notifications" id="box" style="max-height: 300px;overflow: auto">
            <h2>الاشعارات - <span>{{ $count }}</span></h2>
            @foreach ($notifications as $item)
                <a href="{{ route('show.notification', $item->id) }}">
                    <div class="notifications-item">

                        <img src="https://cdn.pixabay.com/photo/2015/12/16/17/41/bell-1096280_1280.png" alt="img">
                        <div class="text">
                            <h4>{{ $item->data['title'] }}</h4>
                        </div>

                    </div>
                </a>
            @endforeach



        </div> --}}
        {{-- <div class="bell" id="bell"> <img src="https://i.imgur.com/AC7dgLA.png" alt=""> </div>            
            @foreach ($notifications as $item)
            <div class="notifications" id="box" style="height: auto; opacity: 1;">
                <h2>الاشعارات - <span>{{ $count }}</span></h2>
               
             <a href="{{ route('show.notification',$item->id) }}">   <div class="notifications-item"> <img src="https://img.icons8.com/flat_round/64/000000/vote-badge.png" alt="img">
                    <div class="text">
                        <h4>{{$item->data['title'] }}</h4>
                    </div>
                </div>
            </a>
            </div>
         
           
            @endforeach
     
          
            <!--end::Menu item-->
            <!--begin::Menu item-->
          
            <!--end::Menu item-->
        </div> --}}
        <!--end::Menu-->
    </div>
    <div class="d-flex align-items-center {{ $itemClass }}">

        <input type="text" id="selUser" class="form-control form-control-solid h-40px bg-body ps-13 fs-7"
            name="search" value="" placeholder="Search..." data-kt-search-element="input">

        <div id="mydiv"
            style="display :none;overflow:auto; position: absolute;margin-top: 27%;width: 20%;background: #fff;z-index: 5;max-height: 300px;text-align:left">
            <ul id="mylist">
            </ul>
        </div>
    </div>
    <div class="d-flex align-items-center {{ $itemClass }}">
        {{ theme()->getView('partials/theme-mode/_main', [
            'params' => [
                'toggle-btn-class' => $btnClass,
            ],
        ]) }}
    </div>
    <!--end::Theme mode-->

    @if (auth()->check())
        <!--begin::User menu-->
        <div class="d-flex align-items-center {{ $itemClass }}" id="kt_header_user_menu_toggle">
            <!--begin::Menu wrapper-->
            <div class="cursor-pointer symbol {{ $userAvatarClass }}" data-kt-menu-trigger="click"
                data-kt-menu-attach="parent"
                data-kt-menu-placement="{{ theme()->isRtl() ? 'bottom-start' : 'bottom-end' }}">
                <img src="{{ auth()->user()->avatarUrl }}" alt="user" />
            </div>
            {{ theme()->getView('partials/topbar/_user-menu') }}
            <!--end::Menu wrapper-->
        </div>
        <!--end::User menu-->
    @endif

    <!--begin::Header menu toggle-->
    @if (theme()->getOption('layout', 'header/left') === 'menu')
        <div class="d-flex align-items-center d-lg-none ms-2 me-n3" data-bs-toggle="tooltip"
            title="Show header menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                id="kt_header_menu_mobile_toggle">
                {!! theme()->getSvgIcon('icons/duotune/text/txt001.svg', 'svg-icon-1') !!}
            </div>
        </div>
    @endif
    <!--end::Header menu toggle-->
</div>

<!--end::Toolbar wrapper-->
