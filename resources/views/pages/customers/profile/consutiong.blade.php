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
         <td>{{ $item->consult->title }}</td>
         <th><a href="{{ route('marketer.show',$item->consult->user->id) }}">{{ $item->consult->user->name }}</a></th>
         <th>{{ $item->price }}</th>
         <th>{{ date('Y-m-d', strtotime($item->created_at)) }}</th>
         <th><a target="_blank" href="{{ route('order_consulting.show',$item->order->id) }}"><i class="fa fa-eye"></i></a> </th>
     
        </tr>
            
        @endforeach
    </tfoot>
</table>