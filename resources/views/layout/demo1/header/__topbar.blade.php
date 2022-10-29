@php
    $itemClass = "ms-1 ms-lg-3";
    $btnClass = "btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px";
    $userAvatarClass = "symbol-30px symbol-md-40px";
    $btnIconClass = "svg-icon-1";
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
    width: 50px;
    height: 50px;
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
    {{-- <div class="d-flex align-items-center {{ $itemClass }}">
        <!--begin::Menu- wrapper-->
        <div class="{{ $btnClass }}" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            {!! theme()->getSvgIcon("icons/duotune/general/gen022.svg", $btnIconClass) !!}
        </div>
    {{ theme()->getView('partials/topbar/_notifications-menu') }}
    <!--end::Menu wrapper-->
    </div> --}}
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
          $count = auth()->user()->unreadNotifications->count();
        @endphp
    <div class="d-flex align-items-center {{ $itemClass }}">
        <!--begin::Menu toggle-->
        
        <!--begin::Menu toggle-->
        <!--begin::Menu-->
        <div class="bell" id="bell"> <i class="fa fa-bell"></i> </div>
        <div class="notifications" id="box" style="max-height: 300px;overflow: auto">
            <h2>الاشعارات - <span>{{ $count }}</span></h2>
            @foreach ( $notifications as $item)
            <a href="{{ route('show.notification',$item->id) }}">
            <div class="notifications-item">
               
                 <img src="https://img.icons8.com/flat_round/64/000000/vote-badge.png" alt="img">
                <div class="text">
                    <h4>{{$item->data['title'] }}</h4>
                </div>
           
            </div>
        </a>
            @endforeach
         
         
           
        </div>
        {{-- <div class="bell" id="bell"> <img src="https://i.imgur.com/AC7dgLA.png" alt=""> </div>            
            @foreach ( $notifications as $item)
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

    <input type="text" id="selUser" class="form-control form-control-solid h-40px bg-body ps-13 fs-7" name="search" value="" placeholder="Search..." data-kt-search-element="input">
  
    <div id="mydiv" style="display :none;overflow:auto; position: absolute;margin-top: 27%;width: 20%;background: #fff;z-index: 5;max-height: 300px;text-align:left">
        <ul id="mylist">
       </ul>
    </div>
</div>
    <div class="d-flex align-items-center {{ $itemClass }}">
        {{ theme()->getView('partials/theme-mode/_main', ['params' => [
            'toggle-btn-class' => $btnClass
        ]]) }}
    </div>
    <!--end::Theme mode-->

    @if (auth()->check())
        <!--begin::User menu-->
        <div class="d-flex align-items-center {{ $itemClass }}" id="kt_header_user_menu_toggle">
            <!--begin::Menu wrapper-->
            <div class="cursor-pointer symbol {{ $userAvatarClass }}" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="{{ (theme()->isRtl() ? "bottom-start" : "bottom-end") }}">
                <img src="{{ auth()->user()->avatarUrl }}" alt="user"/>
            </div>
            {{ theme()->getView('partials/topbar/_user-menu') }}
            <!--end::Menu wrapper-->
        </div>
        <!--end::User menu-->
    @endif

    <!--begin::Header menu toggle-->
    @if(theme()->getOption('layout', 'header/left') === 'menu')
        <div class="d-flex align-items-center d-lg-none ms-2 me-n3" data-bs-toggle="tooltip" title="Show header menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
                {!! theme()->getSvgIcon("icons/duotune/text/txt001.svg", "svg-icon-1") !!}
            </div>
        </div>
    @endif
<!--end::Header menu toggle-->
</div>

<!--end::Toolbar wrapper-->
