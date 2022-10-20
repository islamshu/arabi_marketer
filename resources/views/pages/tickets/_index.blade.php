<div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>صورة المستخدم </th>

                <th>اسم المستخدم </th>
                <th>عنوان التذكرة </th>
                <th>تاريخ اضافة التذكرة</th>
                <th>الحالة</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $item)
            <tr>
                <td><img src="{{ asset('public/uploads/'.$item->user->image) }}" width="80" height="50" alt=""></td>
                <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>

                 <td>{{ $item->title }}</td>

           
             <td>{{ date('Y-m-d', strtotime($item->created_at)); }}</td>
             <td>
                @if($item->status == 0)
                <button class="btn btn-danger">غير مقروء</button>
                @else
                <button class="btn btn-success"> مقروء</button>
                @endif
             </td>
             <td>
                <a href="{{ route('tickets.show', $item->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                <form style="display: inline"
                    action="{{ route('tickets.destroy', $item->id) }}"
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
