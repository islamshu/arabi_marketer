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
    
    @php
        $notifications = auth()->user()->unreadNotifications;
        $count = auth()
            ->user()
            ->unreadNotifications->count();
    @endphp
    <div class="d-flex align-items-center {{ $itemClass }}">
        <!--begin::Menu toggle-->

      
    </div>
    <div class="d-flex align-items-center dropdown-notifications {{ $itemClass }}"> <span class="cc notif-count" style="    color: red;font-size: 11px;">{{ $count }}</span>

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
        <div class="d-flex align-items-center d-lg-none ms-2 me-n3" data-bs-toggle="tooltip" title="Show header menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                id="kt_header_menu_mobile_toggle">
                {!! theme()->getSvgIcon('icons/duotune/text/txt001.svg', 'svg-icon-1') !!}
            </div>
        </div>
    @endif
    <!--end::Header menu toggle-->
</div>

<!--end::Toolbar wrapper-->
