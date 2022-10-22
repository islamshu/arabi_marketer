@extends('layout.main')

<x-base-layout>

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Private Chat</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="/metronic8/demo1/../demo1/index.html" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Chat</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <!--begin::Filter menu-->
                        <div class="m-0">
                            <!--begin::Menu toggle-->
                            <a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-6 svg-icon-muted me-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Filter</a>
                            <!--end::Menu toggle-->
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_6353b74bafaa7">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Menu separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Menu separator-->
                                <!--begin::Form-->
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Status:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div>
                                            <select class="form-select form-select-solid select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_6353b74bafaa7" data-allow-clear="true" data-select2-id="select2-data-7-tuiu" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                <option data-select2-id="select2-data-9-pq5d"></option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-7qru" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-gcmr-container" aria-controls="select2-gcmr-container"><span class="select2-selection__rendered" id="select2-gcmr-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Member Type:</label>
                                        <!--end::Label-->
                                        <!--begin::Options-->
                                        <div class="d-flex">
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" value="1">
                                                <span class="form-check-label">Author</span>
                                            </label>
                                            <!--end::Options-->
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="2" checked="checked">
                                                <span class="form-check-label">Customer</span>
                                            </label>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Notifications:</label>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked">
                                            <label class="form-check-label">Enabled</label>
                                        </div>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                        <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                        </div>
                        <!--end::Filter menu-->
                        <!--begin::Secondary button-->
                        <!--end::Secondary button-->
                        <!--begin::Primary button-->
                        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>
                        <!--end::Primary button-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-lg-row">
                        <!--begin::Sidebar-->
                        <div class="flex-column flex-lg-row-auto w-30 w-lg-300px w-xl-400px mb-10 mb-lg-0">
                            <!--begin::Contacts-->
                            <div class="card card-flush">
                                <!--begin::Card header-->
                                <div class="card-header pt-7" id="kt_chat_contacts_header">
                                    <!--begin::Form-->
                                    <form class="w-100 position-relative" autocomplete="off">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid px-15" name="search" value="" placeholder="Search by username or email...">
                                        <!--end::Input-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-5" id="kt_chat_contacts_body">
                                    <!--begin::List-->
                                    <div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_toolbar, #kt_app_toolbar, #kt_footer, #kt_app_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px">
                                        @foreach ($users as $item)
                                            
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-4">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-45px symbol-circle">
                                                    <img alt="Pic" src="{{ asset('public/uploads/' . $item->image) }}">
                                                    <div class=" start-100 top-100 border-4 h-8px w-8px ms-n2 mt-n2"></div>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{ $item->name }}</a>
                                                    <div class="fw-semibold text-muted">{{ $item->email }}</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Lat seen-->
                                            <div class="d-flex flex-column align-items-end ms-2">
                                                <span class="text-muted fs-7 mb-1">1 day</span>
                                            </div>
                                            <!--end::Lat seen-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed d-none"></div>
                                        @endforeach

                                        
                                        <!--end::User-->
                                    </div>
                                    <!--end::List-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Contacts-->
                        </div>
                        <!--end::Sidebar-->
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                            <!--begin::Messenger-->
                            <div class="card" id="kt_chat_messenger">
                                <!--begin::Card header-->
                                <div class="card-header" id="kt_chat_messenger_header">
                                    <!--begin::Title-->
                                    <div class="card-title">
                                        <!--begin::User-->
                                        <div class="d-flex justify-content-center flex-column me-3">
                                            <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{ $sender->name }}</a>
                                            <!--begin::Info-->
                                            
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Card toolbar-->
                                  
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body" id="kt_chat_messenger_body">
                                    <!--begin::Messages-->
                                    <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px">
                                        <!--begin::Message(in)-->
                                        <div class="d-flex justify-content-start mb-10">
                                                
                                            <!--begin::Wrapper-->
                                            @foreach ($messages as $item)
                                            @if($item->receiver_id != $sender ) 
                                            <div class="d-flex flex-column align-items-start" >
                                                @else
                                                <div class="d-flex flex-column align-items-end" >
                    @endif
                                                <!--begin::User-->

                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src=" {{ asset('public/uploads/' . $item->receiver->image)  }}">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-3">
                                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">{{ $item->receiver->name }}</a>
                                                        <span class="text-muted fs-7 mb-1">2 mins</span>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Text-->
                                                <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start" data-kt-element="message-text">{{$item->message}}</div>
                                                <!--end::Text-->

                                            </div>
                                            @endforeach



                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Message(in)-->
                                        <!--begin::Message(out)-->
                                      
                                        <!--end::Message(in)-->
                                        <!--begin::Message(out)-->
                                      
                                        <!--end::Message(template for in)-->
                                    </div>
                                    <!--end::Messages-->
                                </div>
                                <!--end::Card body-->
                                <!--begin::Card footer-->
                              
                                <!--end::Card footer-->
                            </div>
                            <!--end::Messenger-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Layout-->
                    <!--begin::Modals-->
                    <!--begin::Modal - View Users-->
                    <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header pb-0 border-0 justify-content-end">
                                    <!--begin::Close-->
                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--begin::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                                    <!--begin::Heading-->
                                    <div class="text-center mb-13">
                                        <!--begin::Title-->
                                        <h1 class="mb-3">Browse Users</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-semibold fs-5">If you need more info, please check out our 
                                        <a href="#" class="link-primary fw-bold">Users Directory</a>.</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Users-->
                                    <div class="mb-15">
                                        <!--begin::List-->
                                        <div class="mh-375px scroll-y me-n7 pe-7">
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-6.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Emma Smith 
                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">Art Director</span></a>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="fw-semibold text-muted">smith@kpmg.com</div>
                                                        <!--end::Email-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Stats-->
                                                <div class="d-flex">
                                                    <!--begin::Sales-->
                                                    <div class="text-end">
                                                        <div class="fs-5 fw-bold text-dark">$23,000</div>
                                                        <div class="fs-7 text-muted">Sales</div>
                                                    </div>
                                                    <!--end::Sales-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Melody Macy 
                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">Marketing Analytic</span></a>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="fw-semibold text-muted">melody@altbox.com</div>
                                                        <!--end::Email-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Stats-->
                                                <div class="d-flex">
                                                    <!--begin::Sales-->
                                                    <div class="text-end">
                                                        <div class="fs-5 fw-bold text-dark">$50,500</div>
                                                        <div class="fs-7 text-muted">Sales</div>
                                                    </div>
                                                    <!--end::Sales-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-1.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Max Smith 
                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">Software Enginer</span></a>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="fw-semibold text-muted">max@kt.com</div>
                                                        <!--end::Email-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Stats-->
                                                <div class="d-flex">
                                                    <!--begin::Sales-->
                                                    <div class="text-end">
                                                        <div class="fs-5 fw-bold text-dark">$75,900</div>
                                                        <div class="fs-7 text-muted">Sales</div>
                                                    </div>
                                                    <!--end::Sales-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-5.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Sean Bean 
                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">Web Developer</span></a>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="fw-semibold text-muted">sean@dellito.com</div>
                                                        <!--end::Email-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Stats-->
                                                <div class="d-flex">
                                                    <!--begin::Sales-->
                                                    <div class="text-end">
                                                        <div class="fs-5 fw-bold text-dark">$10,500</div>
                                                        <div class="fs-7 text-muted">Sales</div>
                                                    </div>
                                                    <!--end::Sales-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-25.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Brian Cox 
                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">UI/UX Designer</span></a>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="fw-semibold text-muted">brian@exchange.com</div>
                                                        <!--end::Email-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Stats-->
                                                <div class="d-flex">
                                                    <!--begin::Sales-->
                                                    <div class="text-end">
                                                        <div class="fs-5 fw-bold text-dark">$20,000</div>
                                                        <div class="fs-7 text-muted">Sales</div>
                                                    </div>
                                                    <!--end::Sales-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span class="symbol-label bg-light-warning text-warning fw-semibold">C</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Mikaela Collins 
                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">Head Of Marketing</span></a>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="fw-semibold text-muted">mik@pex.com</div>
                                                        <!--end::Email-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Stats-->
                                                <div class="d-flex">
                                                    <!--begin::Sales-->
                                                    <div class="text-end">
                                                        <div class="fs-5 fw-bold text-dark">$9,300</div>
                                                        <div class="fs-7 text-muted">Sales</div>
                                                    </div>
                                                    <!--end::Sales-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Francis Mitcham 
                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">Software Arcitect</span></a>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="fw-semibold text-muted">f.mit@kpmg.com</div>
                                                        <!--end::Email-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Stats-->
                                                <div class="d-flex">
                                                    <!--begin::Sales-->
                                                    <div class="text-end">
                                                        <div class="fs-5 fw-bold text-dark">$15,000</div>
                                                        <div class="fs-7 text-muted">Sales</div>
                                                    </div>
                                                    <!--end::Sales-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span class="symbol-label bg-light-danger text-danger fw-semibold">O</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Olivia Wild 
                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">System Admin</span></a>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="fw-semibold text-muted">olivia@corpmail.com</div>
                                                        <!--end::Email-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Stats-->
                                                <div class="d-flex">
                                                    <!--begin::Sales-->
                                                    <div class="text-end">
                                                        <div class="fs-5 fw-bold text-dark">$23,000</div>
                                                        <div class="fs-7 text-muted">Sales</div>
                                                    </div>
                                                    <!--end::Sales-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span class="symbol-label bg-light-primary text-primary fw-semibold">N</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Neil Owen 
                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">Account Manager</span></a>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="fw-semibold text-muted">owen.neil@gmail.com</div>
                                                        <!--end::Email-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Stats-->
                                                <div class="d-flex">
                                                    <!--begin::Sales-->
                                                    <div class="text-end">
                                                        <div class="fs-5 fw-bold text-dark">$45,800</div>
                                                        <div class="fs-7 text-muted">Sales</div>
                                                    </div>
                                                    <!--end::Sales-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-23.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Dan Wilson 
                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">Web Desinger</span></a>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="fw-semibold text-muted">dam@consilting.com</div>
                                                        <!--end::Email-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Stats-->
                                                <div class="d-flex">
                                                    <!--begin::Sales-->
                                                    <div class="text-end">
                                                        <div class="fs-5 fw-bold text-dark">$90,500</div>
                                                        <div class="fs-7 text-muted">Sales</div>
                                                    </div>
                                                    <!--end::Sales-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span class="symbol-label bg-light-danger text-danger fw-semibold">E</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Emma Bold 
                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">Corporate Finance</span></a>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="fw-semibold text-muted">emma@intenso.com</div>
                                                        <!--end::Email-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Stats-->
                                                <div class="d-flex">
                                                    <!--begin::Sales-->
                                                    <div class="text-end">
                                                        <div class="fs-5 fw-bold text-dark">$5,000</div>
                                                        <div class="fs-7 text-muted">Sales</div>
                                                    </div>
                                                    <!--end::Sales-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-12.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Ana Crown 
                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">Customer Relationship</span></a>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="fw-semibold text-muted">ana.cf@limtel.com</div>
                                                        <!--end::Email-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Stats-->
                                                <div class="d-flex">
                                                    <!--begin::Sales-->
                                                    <div class="text-end">
                                                        <div class="fs-5 fw-bold text-dark">$70,000</div>
                                                        <div class="fs-7 text-muted">Sales</div>
                                                    </div>
                                                    <!--end::Sales-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <div class="d-flex flex-stack py-5">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span class="symbol-label bg-light-info text-info fw-semibold">A</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-6">
                                                        <!--begin::Name-->
                                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Robert Doe 
                                                        <span class="badge badge-light fs-8 fw-semibold ms-2">Marketing Executive</span></a>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="fw-semibold text-muted">robert@benko.com</div>
                                                        <!--end::Email-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Stats-->
                                                <div class="d-flex">
                                                    <!--begin::Sales-->
                                                    <div class="text-end">
                                                        <div class="fs-5 fw-bold text-dark">$45,500</div>
                                                        <div class="fs-7 text-muted">Sales</div>
                                                    </div>
                                                    <!--end::Sales-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::List-->
                                    </div>
                                    <!--end::Users-->
                                    <!--begin::Notice-->
                                    <div class="d-flex justify-content-between">
                                        <!--begin::Label-->
                                        <div class="fw-semibold">
                                            <label class="fs-6">Adding Users by Team Members</label>
                                            <div class="fs-7 text-muted">If you need more info, please check budget planning</div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="" checked="checked">
                                            <span class="form-check-label fw-semibold text-muted">Allowed</span>
                                        </label>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - View Users-->
                    <!--begin::Modal - Users Search-->
                    <div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header pb-0 border-0 justify-content-end">
                                    <!--begin::Close-->
                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--begin::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                                    <!--begin::Content-->
                                    <div class="text-center mb-13">
                                        <h1 class="mb-3">Search Users</h1>
                                        <div class="text-muted fw-semibold fs-5">Invite Collaborators To Your Project</div>
                                    </div>
                                    <!--end::Content-->
                                    <!--begin::Search-->
                                    <div id="kt_modal_users_search_handler" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline" data-kt-search="true">
                                        <!--begin::Form-->
                                        <form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
                                            <!--begin::Hidden input(Added to disable form autocomplete)-->
                                            <input type="hidden">
                                            <!--end::Hidden input-->
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-lg form-control-solid px-15" name="search" value="" placeholder="Search by username, full name or email..." data-kt-search-element="input">
                                            <!--end::Input-->
                                            <!--begin::Spinner-->
                                            <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
                                                <span class="spinner-border h-15px w-15px align-middle text-muted"></span>
                                            </span>
                                            <!--end::Spinner-->
                                            <!--begin::Reset-->
                                            <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none" data-kt-search-element="clear">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <!--end::Reset-->
                                        </form>
                                        <!--end::Form-->
                                        <!--begin::Wrapper-->
                                        <div class="py-5">
                                            <!--begin::Suggestions-->
                                            <div data-kt-search-element="suggestions">
                                                <!--begin::Heading-->
                                                <h3 class="fw-semibold mb-5">Recently searched:</h3>
                                                <!--end::Heading-->
                                                <!--begin::Users-->
                                                <div class="mh-375px scroll-y me-n7 pe-7">
                                                    <!--begin::User-->
                                                    <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle me-5">
                                                            <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-6.jpg">
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Info-->
                                                        <div class="fw-semibold">
                                                            <span class="fs-6 text-gray-800 me-2">Emma Smith</span>
                                                            <span class="badge badge-light">Art Director</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </a>
                                                    <!--end::User-->
                                                    <!--begin::User-->
                                                    <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle me-5">
                                                            <span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Info-->
                                                        <div class="fw-semibold">
                                                            <span class="fs-6 text-gray-800 me-2">Melody Macy</span>
                                                            <span class="badge badge-light">Marketing Analytic</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </a>
                                                    <!--end::User-->
                                                    <!--begin::User-->
                                                    <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle me-5">
                                                            <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-1.jpg">
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Info-->
                                                        <div class="fw-semibold">
                                                            <span class="fs-6 text-gray-800 me-2">Max Smith</span>
                                                            <span class="badge badge-light">Software Enginer</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </a>
                                                    <!--end::User-->
                                                    <!--begin::User-->
                                                    <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle me-5">
                                                            <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-5.jpg">
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Info-->
                                                        <div class="fw-semibold">
                                                            <span class="fs-6 text-gray-800 me-2">Sean Bean</span>
                                                            <span class="badge badge-light">Web Developer</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </a>
                                                    <!--end::User-->
                                                    <!--begin::User-->
                                                    <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle me-5">
                                                            <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-25.jpg">
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Info-->
                                                        <div class="fw-semibold">
                                                            <span class="fs-6 text-gray-800 me-2">Brian Cox</span>
                                                            <span class="badge badge-light">UI/UX Designer</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </a>
                                                    <!--end::User-->
                                                </div>
                                                <!--end::Users-->
                                            </div>
                                            <!--end::Suggestions-->
                                            <!--begin::Results(add d-none to below element to hide the users list by default)-->
                                            <div data-kt-search-element="results" class="d-none">
                                                <!--begin::Users-->
                                                <div class="mh-375px scroll-y me-n7 pe-7">
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="0">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='0']" value="0">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-6.jpg">
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma Smith</a>
                                                                <div class="fw-semibold text-muted">smith@kpmg.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-10-e2ne" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1">Guest</option>
                                                                <option value="2" selected="selected" data-select2-id="select2-data-12-36rq">Owner</option>
                                                                <option value="3">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-6mp4" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-97bi-container" aria-controls="select2-97bi-container"><span class="select2-selection__rendered" id="select2-97bi-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="1">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='1']" value="1">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Melody Macy</a>
                                                                <div class="fw-semibold text-muted">melody@altbox.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-13-u7dc" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1" selected="selected" data-select2-id="select2-data-15-787u">Guest</option>
                                                                <option value="2">Owner</option>
                                                                <option value="3">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-14-o8bp" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-brbw-container" aria-controls="select2-brbw-container"><span class="select2-selection__rendered" id="select2-brbw-container" role="textbox" aria-readonly="true" title="Guest">Guest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="2">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='2']" value="2">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-1.jpg">
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Max Smith</a>
                                                                <div class="fw-semibold text-muted">max@kt.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-16-692l" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1">Guest</option>
                                                                <option value="2">Owner</option>
                                                                <option value="3" selected="selected" data-select2-id="select2-data-18-o7ba">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-17-x5az" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-rbh1-container" aria-controls="select2-rbh1-container"><span class="select2-selection__rendered" id="select2-rbh1-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="3">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='3']" value="3">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-5.jpg">
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Sean Bean</a>
                                                                <div class="fw-semibold text-muted">sean@dellito.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-19-1ysq" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1">Guest</option>
                                                                <option value="2" selected="selected" data-select2-id="select2-data-21-jlqp">Owner</option>
                                                                <option value="3">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-20-zhu2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-as18-container" aria-controls="select2-as18-container"><span class="select2-selection__rendered" id="select2-as18-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="4">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='4']" value="4">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-25.jpg">
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Brian Cox</a>
                                                                <div class="fw-semibold text-muted">brian@exchange.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-22-12es" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1">Guest</option>
                                                                <option value="2">Owner</option>
                                                                <option value="3" selected="selected" data-select2-id="select2-data-24-nwlk">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-23-u2fu" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ehji-container" aria-controls="select2-ehji-container"><span class="select2-selection__rendered" id="select2-ehji-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="5">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='5']" value="5">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <span class="symbol-label bg-light-warning text-warning fw-semibold">C</span>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Mikaela Collins</a>
                                                                <div class="fw-semibold text-muted">mik@pex.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-25-4fjm" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1">Guest</option>
                                                                <option value="2" selected="selected" data-select2-id="select2-data-27-z3v1">Owner</option>
                                                                <option value="3">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-26-mfrc" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-7szu-container" aria-controls="select2-7szu-container"><span class="select2-selection__rendered" id="select2-7szu-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="6">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='6']" value="6">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Francis Mitcham</a>
                                                                <div class="fw-semibold text-muted">f.mit@kpmg.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-28-dxss" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1">Guest</option>
                                                                <option value="2">Owner</option>
                                                                <option value="3" selected="selected" data-select2-id="select2-data-30-0zr9">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-29-f49o" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-t54r-container" aria-controls="select2-t54r-container"><span class="select2-selection__rendered" id="select2-t54r-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="7">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='7']" value="7">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <span class="symbol-label bg-light-danger text-danger fw-semibold">O</span>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Olivia Wild</a>
                                                                <div class="fw-semibold text-muted">olivia@corpmail.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-31-gxc2" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1">Guest</option>
                                                                <option value="2" selected="selected" data-select2-id="select2-data-33-y8z9">Owner</option>
                                                                <option value="3">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-32-nc5v" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-9lsp-container" aria-controls="select2-9lsp-container"><span class="select2-selection__rendered" id="select2-9lsp-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="8">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='8']" value="8">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <span class="symbol-label bg-light-primary text-primary fw-semibold">N</span>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Neil Owen</a>
                                                                <div class="fw-semibold text-muted">owen.neil@gmail.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-34-wlj8" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1" selected="selected" data-select2-id="select2-data-36-fusz">Guest</option>
                                                                <option value="2">Owner</option>
                                                                <option value="3">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-35-221v" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-yzhd-container" aria-controls="select2-yzhd-container"><span class="select2-selection__rendered" id="select2-yzhd-container" role="textbox" aria-readonly="true" title="Guest">Guest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="9">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='9']" value="9">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-23.jpg">
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dan Wilson</a>
                                                                <div class="fw-semibold text-muted">dam@consilting.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-37-erx9" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1">Guest</option>
                                                                <option value="2">Owner</option>
                                                                <option value="3" selected="selected" data-select2-id="select2-data-39-0fz0">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-38-5d39" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-l87u-container" aria-controls="select2-l87u-container"><span class="select2-selection__rendered" id="select2-l87u-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="10">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='10']" value="10">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <span class="symbol-label bg-light-danger text-danger fw-semibold">E</span>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma Bold</a>
                                                                <div class="fw-semibold text-muted">emma@intenso.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-40-nr3f" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1">Guest</option>
                                                                <option value="2" selected="selected" data-select2-id="select2-data-42-kf9t">Owner</option>
                                                                <option value="3">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-41-zjco" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-22yt-container" aria-controls="select2-22yt-container"><span class="select2-selection__rendered" id="select2-22yt-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="11">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='11']" value="11">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-12.jpg">
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ana Crown</a>
                                                                <div class="fw-semibold text-muted">ana.cf@limtel.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-43-sk2z" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1" selected="selected" data-select2-id="select2-data-45-qptx">Guest</option>
                                                                <option value="2">Owner</option>
                                                                <option value="3">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-44-czph" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-lfc8-container" aria-controls="select2-lfc8-container"><span class="select2-selection__rendered" id="select2-lfc8-container" role="textbox" aria-readonly="true" title="Guest">Guest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="12">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='12']" value="12">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <span class="symbol-label bg-light-info text-info fw-semibold">A</span>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Robert Doe</a>
                                                                <div class="fw-semibold text-muted">robert@benko.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-46-7cxu" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1">Guest</option>
                                                                <option value="2">Owner</option>
                                                                <option value="3" selected="selected" data-select2-id="select2-data-48-k55j">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-47-pfyh" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-czkl-container" aria-controls="select2-czkl-container"><span class="select2-selection__rendered" id="select2-czkl-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="13">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='13']" value="13">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-13.jpg">
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">John Miller</a>
                                                                <div class="fw-semibold text-muted">miller@mapple.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-49-cpr9" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1">Guest</option>
                                                                <option value="2">Owner</option>
                                                                <option value="3" selected="selected" data-select2-id="select2-data-51-2jcz">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-50-17hc" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-n5tx-container" aria-controls="select2-n5tx-container"><span class="select2-selection__rendered" id="select2-n5tx-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="14">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='14']" value="14">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <span class="symbol-label bg-light-success text-success fw-semibold">L</span>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Lucy Kunic</a>
                                                                <div class="fw-semibold text-muted">lucy.m@fentech.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-52-nyvl" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1">Guest</option>
                                                                <option value="2" selected="selected" data-select2-id="select2-data-54-1n2h">Owner</option>
                                                                <option value="3">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-53-p3pn" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ear0-container" aria-controls="select2-ear0-container"><span class="select2-selection__rendered" id="select2-ear0-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="15">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='15']" value="15">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/metronic8/demo1/assets/media/avatars/300-21.jpg">
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ethan Wilder</a>
                                                                <div class="fw-semibold text-muted">ethan@loop.com.au</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-55-dl8u" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1" selected="selected" data-select2-id="select2-data-57-zysy">Guest</option>
                                                                <option value="2">Owner</option>
                                                                <option value="3">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-56-8eai" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-8fxk-container" aria-controls="select2-8fxk-container"><span class="select2-selection__rendered" id="select2-8fxk-container" role="textbox" aria-readonly="true" title="Guest">Guest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Separator-->
                                                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::User-->
                                                    <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="16">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='16']" value="16">
                                                            </label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Melody Macy</a>
                                                                <div class="fw-semibold text-muted">melody@altbox.com</div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Access menu-->
                                                        <div class="ms-2 w-100px">
                                                            <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-58-442b" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                                <option value="1">Guest</option>
                                                                <option value="2">Owner</option>
                                                                <option value="3" selected="selected" data-select2-id="select2-data-60-b2qv">Can Edit</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-59-wl1u" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-gkyy-container" aria-controls="select2-gkyy-container"><span class="select2-selection__rendered" id="select2-gkyy-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                        <!--end::Access menu-->
                                                    </div>
                                                    <!--end::User-->
                                                </div>
                                                <!--end::Users-->
                                                <!--begin::Actions-->
                                                <div class="d-flex flex-center mt-15">
                                                    <button type="reset" id="kt_modal_users_search_reset" data-bs-dismiss="modal" class="btn btn-active-light me-3">Cancel</button>
                                                    <button type="submit" id="kt_modal_users_search_submit" class="btn btn-primary">Add Selected Users</button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Results-->
                                            <!--begin::Empty-->
                                            <div data-kt-search-element="empty" class="text-center d-none">
                                                <!--begin::Message-->
                                                <div class="fw-semibold py-10">
                                                    <div class="text-gray-600 fs-3 mb-2">No users found</div>
                                                    <div class="text-muted fs-6">Try to search by username, full name or email...</div>
                                                </div>
                                                <!--end::Message-->
                                                <!--begin::Illustration-->
                                                <div class="text-center px-5">
                                                    <img src="/metronic8/demo1/assets/media/illustrations/sketchy-1/1.png" alt="" class="w-100 h-200px h-sm-325px">
                                                </div>
                                                <!--end::Illustration-->
                                            </div>
                                            <!--end::Empty-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - Users Search-->
                    <!--end::Modals-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-semibold me-1">2022©</span>
                    <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
                </div>
                <!--end::Copyright-->
                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                    <li class="menu-item">
                        <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                    </li>
                    <li class="menu-item">
                        <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                    </li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>

</x-base-layout>




@section('scripts')
    <script>
        $(document).ready(function() {
            $("#example").on("change", ".js-switch", function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let userId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('users.update.status') }}',
                    data: {
                        'status': status,
                        'user_id': userId
                    },
                    success: function(data) {
                        console.log(data.message);
                    }
                });
            });
        });
    </script>
   
@endsection
