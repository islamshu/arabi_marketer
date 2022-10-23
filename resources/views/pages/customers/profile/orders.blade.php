<div>
    <table  class="example display" style="width:100%">
        <thead>
            <tr>
                <th>كود الطلب </th>
                <th>الاجمالي </th>
                <th>حالة الدفع </th>
                <th>تاريخ </th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $item)
            <tr>
             <td>#{{ $item->code }}</td>
             <td>{{ $item->total }}$</td>
             <td> <button @if($item->payment_status == 'paid') class="btn btn-success" @else  class="btn btn-warning" @endif>{{ $item->payment_status }}</button></td>
             <td>{{ date('Y-m-d', strtotime($item->created_at)); }}</td>
             <td>
                <a href="{{ route('order.show', $item->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
               
            </td>
            </tr>
                
            @endforeach
        </tfoot>
    </table>
</div>
