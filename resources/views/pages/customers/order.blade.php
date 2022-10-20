@extends('layout.main')

<x-base-layout>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Order details page-->
            <div class="d-flex flex-column gap-7 gap-lg-10">
                <div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-lg-n2 me-auto"
                        role="tablist">
                        <!--begin:::Tab item-->
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#kt_ecommerce_sales_order_summary" aria-selected="true" role="tab">Order
                                Summary</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item" role="presentation">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#kt_ecommerce_sales_order_history" aria-selected="false" tabindex="-1"
                                role="tab">Order History</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Button-->
                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/listing.html"
                        class="btn btn-icon btn-light btn-sm ms-auto me-lg-n7">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Button-->
                    <!--begin::Button-->

                </div>
                <!--begin::Order summary-->
                <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                    <!--begin::Order details-->
                    <div class="card card-flush py-4 flex-row-fluid">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Order Details</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        <!--begin::Date-->

                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                    <span class="svg-icon svg-icon-2 me-2">
                                                        <svg width="20" height="21" viewBox="0 0 20 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Invoice
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end"> #{{ $order->code }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                    <span class="svg-icon svg-icon-2 me-2">
                                                        <svg width="20" height="21" viewBox="0 0 20 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Payment Date
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                {{ date('Y-m-d', strtotime($order->created_at)) }}</td>
                                        </tr>


                                        <!--end::Date-->
                                        <!--begin::Payment method-->
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                                    <span class="svg-icon svg-icon-2 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                                                                fill="currentColor"></path>
                                                            <path opacity="0.3"
                                                                d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Payment Method
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">Paypal
                                        </tr>
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                                    <span class="svg-icon svg-icon-2 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                                                                fill="currentColor"></path>
                                                            <path opacity="0.3"
                                                                d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Payment Status
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end"><button
                                                    @if ($order->payment_status == 'paid') class="btn btn-success" @else  class="btn btn-warning" @endif>{{ $order->payment_status }}</button>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                                    <span class="svg-icon svg-icon-2 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                                                                fill="currentColor"></path>
                                                            <path opacity="0.3"
                                                                d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Total
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                              {{ $order->total }}
                                                   
                                        </tr>
                                        <!--end::Payment method-->
                                        <!--begin::Date-->

                                        <!--end::Date-->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Order details-->
                    <!--begin::Customer details-->
                    <div class="card card-flush py-4 flex-row-fluid">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Customer Details</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        <!--begin::Customer name-->
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                    <span class="svg-icon svg-icon-2 me-2">
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                                                fill="currentColor"></path>
                                                            <rect x="7" y="6" width="4"
                                                                height="4" rx="2" fill="currentColor">
                                                            </rect>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Customer
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <!--begin:: Avatar -->

                                                    <!--end::Avatar-->
                                                    <!--begin::Name-->
                                                    <a href="{{ route('customer.show', $order->user->id) }}"
                                                        class="text-gray-600 text-hover-primary">{{ $order->user->name }}</a>
                                                    <!--end::Name-->
                                                </div>
                                            </td>

                                        </tr>
                                        <!--end::Customer name-->
                                        <!--begin::Customer email-->
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                    <span class="svg-icon svg-icon-2 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Email
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                {{ $order->user->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                    <span class="svg-icon svg-icon-2 me-2">
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                                                fill="currentColor"></path>
                                                            <rect x="7" y="6" width="4"
                                                                height="4" rx="2" fill="currentColor">
                                                            </rect>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->User Type
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <!--begin:: Avatar -->

                                                    <!--end::Avatar-->
                                                    <!--begin::Name-->
                                                    {{ $order->user->type }}
                                                    <!--end::Name-->
                                                </div>
                                            </td>

                                        </tr>
                                        <!--end::Payment method-->
                                        <!--begin::Date-->

                                        <!--end::Date-->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <div class="card card-flush py-4 flex-row-fluid">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>User Bank Infomation</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                    <!--begin::Table body-->
                                    <tbody class="fw-semibold text-gray-600">
                                        <!--begin::Date-->

                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                    <span class="svg-icon svg-icon-2 me-2">
                                                        <svg width="20" height="21" viewBox="0 0 20 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Bank name
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end"> Islamic Bank
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                    <span class="svg-icon svg-icon-2 me-2">
                                                        <svg width="20" height="21" viewBox="0 0 20 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Account Name
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                               Islamsh</td>
                                        </tr>


                                        <!--end::Date-->
                                        <!--begin::Payment method-->
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                                    <span class="svg-icon svg-icon-2 me-2">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                                                                fill="currentColor"></path>
                                                            <path opacity="0.3"
                                                                d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Account Nubmer
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">542665
                                        </tr>
                                   
                                        <!--end::Payment method-->
                                        <!--begin::Date-->

                                        <!--end::Date-->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Customer details-->
                    <!--begin::Documents-->
                   
                    <!--end::Documents-->
                </div>
                <!--end::Order summary-->
                <!--begin::Tab content-->
                <div class="tab-content">
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_ecommerce_sales_order_summary" role="tab-panel">
                        <!--begin::Orders-->
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                                <!--begin::Payment address-->
                                <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                    <!--begin::Background-->
                                    <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                                        <img src="/metronic8/demo1/assets/media/icons/duotune/ecommerce/ecm001.svg"
                                            class="w-175px">
                                    </div>
                                    <!--end::Background-->
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Payment Address</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">Unit 1/23 Hastings Road,
                                        <br>Melbourne 3000,
                                        <br>Victoria,
                                        <br>Australia.
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Payment address-->
                                <!--begin::Shipping address-->
                                <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                    <!--begin::Background-->
                                    <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                                        <img src="/metronic8/demo1/assets/media/icons/duotune/ecommerce/ecm006.svg"
                                            class="w-175px">
                                    </div>
                                    <!--end::Background-->
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Shipping Address</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">Unit 1/23 Hastings Road,
                                        <br>Melbourne 3000,
                                        <br>Victoria,
                                        <br>Australia.
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Shipping address-->
                            </div>
                            <!--begin::Product List-->
                            <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Order #14534</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="min-w-175px">Product</th>
                                                    <th class="min-w-100px text-end">SKU</th>
                                                    <th class="min-w-70px text-end">Qty</th>
                                                    <th class="min-w-100px text-end">Unit Price</th>
                                                    <th class="min-w-100px text-end">Total</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                                <!--begin::Products-->
                                                <tr>
                                                    <!--begin::Product-->
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Thumbnail-->
                                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                                class="symbol symbol-50px">
                                                                <span class="symbol-label"
                                                                    style="background-image:url(/metronic8/demo1/assets/media//stock/ecommerce/1.gif);"></span>
                                                            </a>
                                                            <!--end::Thumbnail-->
                                                            <!--begin::Title-->
                                                            <div class="ms-5">
                                                                <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                                    class="fw-bold text-gray-600 text-hover-primary">Product
                                                                    1</a>
                                                                <div class="fs-7 text-muted">Delivery Date: 20/10/2022
                                                                </div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                    </td>
                                                    <!--end::Product-->
                                                    <!--begin::SKU-->
                                                    <td class="text-end">02564003</td>
                                                    <!--end::SKU-->
                                                    <!--begin::Quantity-->
                                                    <td class="text-end">2</td>
                                                    <!--end::Quantity-->
                                                    <!--begin::Price-->
                                                    <td class="text-end">$120.00</td>
                                                    <!--end::Price-->
                                                    <!--begin::Total-->
                                                    <td class="text-end">$240.00</td>
                                                    <!--end::Total-->
                                                </tr>
                                                <tr>
                                                    <!--begin::Product-->
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Thumbnail-->
                                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                                class="symbol symbol-50px">
                                                                <span class="symbol-label"
                                                                    style="background-image:url(/metronic8/demo1/assets/media//stock/ecommerce/100.gif);"></span>
                                                            </a>
                                                            <!--end::Thumbnail-->
                                                            <!--begin::Title-->
                                                            <div class="ms-5">
                                                                <a href="/metronic8/demo1/../demo1/apps/ecommerce/catalog/edit-product.html"
                                                                    class="fw-bold text-gray-600 text-hover-primary">Footwear</a>
                                                                <div class="fs-7 text-muted">Delivery Date: 20/10/2022
                                                                </div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                    </td>
                                                    <!--end::Product-->
                                                    <!--begin::SKU-->
                                                    <td class="text-end">02983007</td>
                                                    <!--end::SKU-->
                                                    <!--begin::Quantity-->
                                                    <td class="text-end">1</td>
                                                    <!--end::Quantity-->
                                                    <!--begin::Price-->
                                                    <td class="text-end">$24.00</td>
                                                    <!--end::Price-->
                                                    <!--begin::Total-->
                                                    <td class="text-end">$24.00</td>
                                                    <!--end::Total-->
                                                </tr>
                                                <!--end::Products-->
                                                <!--begin::Subtotal-->
                                                <tr>
                                                    <td colspan="4" class="text-end">Subtotal</td>
                                                    <td class="text-end">$264.00</td>
                                                </tr>
                                                <!--end::Subtotal-->
                                                <!--begin::VAT-->
                                                <tr>
                                                    <td colspan="4" class="text-end">VAT (0%)</td>
                                                    <td class="text-end">$0.00</td>
                                                </tr>
                                                <!--end::VAT-->
                                                <!--begin::Shipping-->
                                                <tr>
                                                    <td colspan="4" class="text-end">Shipping Rate</td>
                                                    <td class="text-end">$5.00</td>
                                                </tr>
                                                <!--end::Shipping-->
                                                <!--begin::Grand total-->
                                                <tr>
                                                    <td colspan="4" class="fs-3 text-dark text-end">Grand Total
                                                    </td>
                                                    <td class="text-dark fs-3 fw-bolder text-end">$269.00</td>
                                                </tr>
                                                <!--end::Grand total-->
                                            </tbody>
                                            <!--end::Table head-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Product List-->
                        </div>
                        <!--end::Orders-->
                    </div>
                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_sales_order_history" role="tab-panel">
                        <!--begin::Orders-->
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <!--begin::Order history-->
                            <div class="card card-flush py-4 flex-row-fluid">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Order History</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="min-w-100px">Date Added</th>
                                                    <th class="min-w-175px">Comment</th>
                                                    <th class="min-w-70px">Order Status</th>
                                                    <th class="min-w-100px">Customer Notifed</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                                <tr>
                                                    <!--begin::Date-->
                                                    <td>20/10/2022</td>
                                                    <!--end::Date-->
                                                    <!--begin::Comment-->
                                                    <td>Order completed</td>
                                                    <!--end::Comment-->
                                                    <!--begin::Status-->
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Completed</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <!--end::Status-->
                                                    <!--begin::Customer Notified-->
                                                    <td>No</td>
                                                    <!--end::Customer Notified-->
                                                </tr>
                                                <tr>
                                                    <!--begin::Date-->
                                                    <td>19/10/2022</td>
                                                    <!--end::Date-->
                                                    <!--begin::Comment-->
                                                    <td>Order received by customer</td>
                                                    <!--end::Comment-->
                                                    <!--begin::Status-->
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-success">Delivered</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <!--end::Status-->
                                                    <!--begin::Customer Notified-->
                                                    <td>Yes</td>
                                                    <!--end::Customer Notified-->
                                                </tr>
                                                <tr>
                                                    <!--begin::Date-->
                                                    <td>18/10/2022</td>
                                                    <!--end::Date-->
                                                    <!--begin::Comment-->
                                                    <td>Order shipped from warehouse</td>
                                                    <!--end::Comment-->
                                                    <!--begin::Status-->
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-primary">Delivering</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <!--end::Status-->
                                                    <!--begin::Customer Notified-->
                                                    <td>Yes</td>
                                                    <!--end::Customer Notified-->
                                                </tr>
                                                <tr>
                                                    <!--begin::Date-->
                                                    <td>17/10/2022</td>
                                                    <!--end::Date-->
                                                    <!--begin::Comment-->
                                                    <td>Payment received</td>
                                                    <!--end::Comment-->
                                                    <!--begin::Status-->
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-primary">Processing</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <!--end::Status-->
                                                    <!--begin::Customer Notified-->
                                                    <td>No</td>
                                                    <!--end::Customer Notified-->
                                                </tr>
                                                <tr>
                                                    <!--begin::Date-->
                                                    <td>16/10/2022</td>
                                                    <!--end::Date-->
                                                    <!--begin::Comment-->
                                                    <td>Pending payment</td>
                                                    <!--end::Comment-->
                                                    <!--begin::Status-->
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-warning">Pending</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <!--end::Status-->
                                                    <!--begin::Customer Notified-->
                                                    <td>No</td>
                                                    <!--end::Customer Notified-->
                                                </tr>
                                                <tr>
                                                    <!--begin::Date-->
                                                    <td>15/10/2022</td>
                                                    <!--end::Date-->
                                                    <!--begin::Comment-->
                                                    <td>Payment method updated</td>
                                                    <!--end::Comment-->
                                                    <!--begin::Status-->
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-warning">Pending</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <!--end::Status-->
                                                    <!--begin::Customer Notified-->
                                                    <td>No</td>
                                                    <!--end::Customer Notified-->
                                                </tr>
                                                <tr>
                                                    <!--begin::Date-->
                                                    <td>14/10/2022</td>
                                                    <!--end::Date-->
                                                    <!--begin::Comment-->
                                                    <td>Payment method expired</td>
                                                    <!--end::Comment-->
                                                    <!--begin::Status-->
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-danger">Failed</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <!--end::Status-->
                                                    <!--begin::Customer Notified-->
                                                    <td>Yes</td>
                                                    <!--end::Customer Notified-->
                                                </tr>
                                                <tr>
                                                    <!--begin::Date-->
                                                    <td>13/10/2022</td>
                                                    <!--end::Date-->
                                                    <!--begin::Comment-->
                                                    <td>Pending payment</td>
                                                    <!--end::Comment-->
                                                    <!--begin::Status-->
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-warning">Pending</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <!--end::Status-->
                                                    <!--begin::Customer Notified-->
                                                    <td>No</td>
                                                    <!--end::Customer Notified-->
                                                </tr>
                                                <tr>
                                                    <!--begin::Date-->
                                                    <td>12/10/2022</td>
                                                    <!--end::Date-->
                                                    <!--begin::Comment-->
                                                    <td>Order received</td>
                                                    <!--end::Comment-->
                                                    <!--begin::Status-->
                                                    <td>
                                                        <!--begin::Badges-->
                                                        <div class="badge badge-light-warning">Pending</div>
                                                        <!--end::Badges-->
                                                    </td>
                                                    <!--end::Status-->
                                                    <!--begin::Customer Notified-->
                                                    <td>Yes</td>
                                                    <!--end::Customer Notified-->
                                                </tr>
                                            </tbody>
                                            <!--end::Table head-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Order history-->
                            <!--begin::Order data-->
                            <div class="card card-flush py-4 flex-row-fluid">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Order Data</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5">
                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold text-gray-600">
                                                <!--begin::IP address-->
                                                <tr>
                                                    <td class="text-muted">IP Address</td>
                                                    <td class="fw-bold text-end">172.68.221.26</td>
                                                </tr>
                                                <!--end::IP address-->
                                                <!--begin::Forwarded IP-->
                                                <tr>
                                                    <td class="text-muted">Forwarded IP</td>
                                                    <td class="fw-bold text-end">89.201.163.49</td>
                                                </tr>
                                                <!--end::Forwarded IP-->
                                                <!--begin::User agent-->
                                                <tr>
                                                    <td class="text-muted">User Agent</td>
                                                    <td class="fw-bold text-end">Mozilla/5.0 (Windows NT 10.0; Win64;
                                                        x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110
                                                        Safari/537.36</td>
                                                </tr>
                                                <!--end::User agent-->
                                                <!--begin::Accept language-->
                                                <tr>
                                                    <td class="text-muted">Accept Language</td>
                                                    <td class="fw-bold text-end">en-GB,en-US;q=0.9,en;q=0.8</td>
                                                </tr>
                                                <!--end::Accept language-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Order data-->
                        </div>
                        <!--end::Orders-->
                    </div>
                    <!--end::Tab pane-->
                </div>
                <!--end::Tab content-->
            </div>
            <!--end::Order details page-->
        </div>
        <!--end::Content container-->
    </div>
</x-base-layout>
