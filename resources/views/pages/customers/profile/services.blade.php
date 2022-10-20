<div>
    <table  class="example display" style="width:100%">
        <thead>
            <tr>
                <th>صورة الخدمة</th>
                <th>اسم الخدمة</th>
                <th>اضيفة بواسطة</th>
                <th>سعر الشراء</th>
                <th>تاريخ الشراء</th>
                <th>رقم الطلبية </th>


            </tr>
        </thead>
        <tbody>
            @foreach ($services as $item)
            <tr>
                <td><img src="{{ asset('public/uploads/'.$item->service->image) }}" width="50" height="50" alt=""></td>
                <td>{{ $item->service->title }}</td>
                <th><a href="{{ route('marketer.show',$item->service->user->id) }}">{{ $item->service->user->name }}</a></th>
                <th>{{ $item->price }}</th>
                <th>{{ date('Y-m-d', strtotime($item->created_at)) }}</th>
                <th><a target="_blank" href="{{ route('order.show',$item->order->id) }}"></a> #{{$item->order->code }}</th>

               </tr>
                
            @endforeach
        </tfoot>
    </table>
</div>
