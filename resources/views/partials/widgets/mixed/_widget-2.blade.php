@php
    $chartColor = $chartColor ?? 'primary';
    $chartHeight = $chartHeight ?? '175px';
@endphp

<!--begin::Mixed Widget 2-->
<div class="card {{ $class }}">
    <!--begin::Header-->
    <div class="card-header border-0 bg-{{ $chartColor }} py-5">
        <h3 class="card-title fw-bolder text-white">Sales Statistics</h3>

        <div class="card-toolbar">
            <!--begin::Menu-->
            <button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color-{{ $color ?? '' }} border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                {!! theme()->getSvgIcon("icons/duotune/general/gen024.svg", "svg-icon-2") !!}
            </button>
            {{ theme()->getView('partials/menus/_menu-3') }}
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body p-0">
        <!--begin::Chart-->
        <div class="mixed-widget-2-chart card-rounded-bottom bg-{{ $chartColor }}" data-kt-color="{{ $chartColor }}" data-kt-chart-url="{{ route('profits') }}" style="height: {{ $chartHeight }}"></div>
        <!--end::Chart-->
        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
            <li class="nav-item">
                <a class="nav-link " data-bs-toggle="tab" href="#kt_tab_pane_4">الخدمات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_5">خدمات صناع المحتوى</a>
            </li>
           
            
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade " id="kt_tab_pane_4" role="tabpanel">
                <div>
                    <table id="eexdample"  class="display example" style="width:100%">
                        <thead>
                            <tr>
                                <th>صورة الخدمة</th>
                                <th>اسم الخدمة</th>
                                <th>اضيفة بواسطة</th>
                                <th>تاريخ الاضافة</th>
                
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Service::take(10)->get() as $item)
                            <tr>
                             <td><img src="{{ asset('public/uploads/'.$item->image) }}" width="50" height="50" alt=""></td>
                             <td>{{ $item->title }}</td>
                             <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>
                             <td>{{ date('Y-m-d', strtotime($item->created_at)); }}</td>
                            
                             <td>
                                <a href="{{ route('services.show', $item->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                
                                {{-- <a href="{{ route('services.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> --}}
                               
                            </td>
                            </tr>
                                
                            @endforeach
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade " id="kt_tab_pane_5" role="tabpanel">
                <div>
                    <table id="eexdample"  class="display example" style="width:100%">
                        <thead>
                            <tr>
                                <th>صورة </th>
                                <th>اسم الخدمة</th>
                                <th>اضيفة بواسطة</th>
                                <th>تاريخ الاضافة</th>
                
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Service::take(10)->get() as $item)
                            <tr>
                             <td><img src="{{ asset('public/uploads/'.$item->image) }}" width="50" height="50" alt=""></td>
                             <td>{{ $item->title }}</td>
                             <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>
                             <td>{{ date('Y-m-d', strtotime($item->created_at)); }}</td>
                            
                             <td>
                                <a href="{{ route('services.show', $item->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                
                                {{-- <a href="{{ route('services.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> --}}
                               
                            </td>
                            </tr>
                                
                            @endforeach
                        </tfoot>
                    </table>
                </div>
            </div>
           
           
          


            
          
        </div>
        <!--begin::Stats-->
    
        <!--end::Stats-->
    </div>
    <!--end::Body-->
</div>
<!--end::Mixed Widget 2-->
