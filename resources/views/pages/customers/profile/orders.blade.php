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
             <td>{{ $item->total }}</td>
             <td>{{ $item->payment_status }}</td>
             <td>{{ date('Y-m-d', strtotime($item->created_at)); }}</td>
             <td>
                <a href="{{ route('services.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                <form style="display: inline"
                    action="{{ route('services.destroy', $item->id) }}"
                    method="post">
                    @method('delete') @csrf
                    <button type="submit" class="btn btn-danger delete-confirm"><i
                            class="fa fa-trash"></i></button>
                </form>
            </td>
            </tr>
                
            @endforeach
        </tfoot>
    </table>
</div>
