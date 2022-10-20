<table id="" class="example display" style="width:100%">
    <thead>
        <tr>
            <th>عنوان الاستشارة </th>
            <th>اضيف بواسطة </th>
            <th>سعر الشراء</th>
            <th>تاريخ الشراء</th>
            <th>رقم الطلبية </th>

        </tr>
    </thead>
    <tbody>
        @foreach ($consls as $item)
        <tr>
         <td>{{ $item->consultion->title }}</td>
         <td>{{ $item->consultion->user->name }}</td>
         <th>{{ $item->price }}</th>
         <th>{{ date('Y-m-d', strtotime($item->created_at)) }}</th>
         <th><a target="_blank" href="{{ route('order.show',$item->order->id) }}">#{{$item->order->code }}</a> </th>

     
        </tr>
            
        @endforeach
    </tfoot>
</table>