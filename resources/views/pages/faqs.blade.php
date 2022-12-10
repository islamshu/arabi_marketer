@extends('layout.main')

<x-base-layout>

    <div class="card card-flush">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin:::Tabs-->
            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15"
                role="tablist">
           
             
                <li class="nav-item" role="presentation" class="active">
                    <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab" href="#kt_jobs"
                        aria-selected="false" tabindex="-1" role="tab">
                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm005.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M20 22H4C3.4 22 3 21.6 3 21V2H21V21C21 21.6 20.6 22 20 22Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M12 14C9.2 14 7 11.8 7 9V5C7 4.4 7.4 4 8 4C8.6 4 9 4.4 9 5V9C9 10.7 10.3 12 12 12C13.7 12 15 10.7 15 9V5C15 4.4 15.4 4 16 4C16.6 4 17 4.4 17 5V9C17 11.8 14.8 14 12 14Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->سياسة الدفع 
                    </a>
                </li>
            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div id="form-errors"></div>
            <table class="datatable table datatable-bordered datatable-head-custom  table-row-bordered gy-5 gs-7"
            >
            <thead>
                <tr class="fw-bold fs-6 text-gray-800">
                    <th>{{ __('sort') }}</th>
                    <th>{{ __('question') }}</th>
                    <th>{{ __('Answer') }}</th>
                  
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="sort_menu">
                @foreach ($faqs as $key => $item)
                    <tr data-id="{{ $item->id }}">
                        {{-- {{ dd($item) }} --}}
        
                        <td> <i class="fa fa-bars handle" aria-hidden="true"></i></td>
                    @if(app()->getLocale() == 'ar')
        
                    <td>{{$item->qus_ar}}</td>
                    <td>{!! $item->answer_ar !!}</td>
                    @else 
                    <td>{{$item->qus_en}}</td>
                    <td>{!! $item->answer_en !!}</td>
                    @endif
                    <td>
        
                        <form method="post" style="display: inline">
                            <button type="button" onclick="performdelete({{ $item->id }})"
                                class="btn btn-icon btn-light btn-hover-primary btn-sm"><span
                                    class="svg-icon svg-icon-md svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                            <path
                                                d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </button>
                        </form>
                       </td>
                   
               
                    @endforeach
        
        
            </tbody>
         
        </table>

        <form class="form" method="post" method="{{ route('faqs.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                   
                    <div class="form-group col-md-12">
                        <label> {{ __('السؤال') }} :</label>
                        <input type="text" name="qus" id="qus" class="form-control form-control-solid"
                            placeholder="اضف سؤال" required />
                    </div>
               
                    <div class="form-group col-md-12">
                        <label>{{ __('الاجابة') }} :</label>
                        <textarea name="answer" class="form-control" required id="" cols="30" rows="5"></textarea>
                    </div>
                 
                   
    
    
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">{{ __('حفظ') }}</button>
                </div>
        </form>

        </div>

            <!--end:::Tab content-->
        </div>
        <!--end::Card body-->
    </div>

</x-base-layout>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script src="{{ asset('new_js/crud.js') }}"></script>
<link href="{{ asset('demo1/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('demo1/plugins/custom/datatables/datatables.bundle.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
