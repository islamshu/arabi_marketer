<?php
    // List items
    $listRows = array(
        array(
            'color' => 'success',
            'title' => 'Create FireStone Logo',
            'text' => 'Due in 2 Days',
        ),
        array(
            'color' => 'primary',
            'title' => 'Stakeholder Meeting',
            'text' => 'Due in 3 Days'
        ),
        array(
            'color' => 'warning',
            'title' => 'Scoping & Estimations',
            'text' => 'Due in 5 Days'
        ),
        array(
            'color' => 'primary',
            'title' => 'KPI App Showcase',
            'text' => 'Due in 2 Days'
        ),
        array(
            'color' => 'danger',
            'title' => 'Project Meeting',
            'text' => 'Due in 12 Days'
        ),
        array(
            'color' => 'success',
            'title' => 'Customers Update',
            'text' => 'Due in 1 week'
        )
    );
?>


<!--begin::List Widget 3-->
<div class="card {{ $class }}">
    <!--begin::Header-->
    <div class="card-header border-0">
        <div class="col-md-6">
        <h3 class="card-title fw-bolder text-dark">Pending Cart</h3>
        <table id="eexdample"  class="display example" style="width:100%">
            <thead>
                <tr>
                    <th>الخدمة </th>

                    <th>السعر </th>
                    <th>اضيفة بواسطة</th>
                    <th>تاريخ الاضافة</th>
    
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Cart::take(10)->get() as $item)
                <tr>
                 <td>{{ @$item->service->title }}</td>
                 <td>{{ $item->price }}</td>
                 <td>{{ date('Y-m-d', strtotime($item->created_at)); }}</td>

                 <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>
           
               
                </tr>
                    
                @endforeach
            </tfoot>
        </table>
    </div>
    <div class="col-md-6">
        <h3 class="card-title fw-bolder text-dark">Pending orders</h3>
        <table id="eexdample"  class="display example" style="width:100%">
            <thead>
                <tr>
                    <th>صورة </th>
                    <th>اسم الخدمة</th>
                    <th>اضيفة بواسطة</th>
                    <th>تاريخ الاضافة</th>
    
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Service::take(10)->get() as $item)
                <tr>
                 <td><img src="{{ asset('public/uploads/'.$item->image) }}" width="50" height="50" alt=""></td>
                 <td>{{ $item->title }}</td>
                 <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>
                 <td>{{ date('Y-m-d', strtotime($item->created_at)); }}</td>
           
                </tr>
                    
                @endforeach
            </tfoot>
        </table>
    </div>
      
    </div>
    <!--end::Header-->

    <!--begin::Body-->
   
    <!--end::Body-->
</div>
<!--end:List Widget 3-->
