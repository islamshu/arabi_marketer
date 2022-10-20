<table id="" class="example display" style="width:100%">
    <thead>
        <tr>
            <th>عنوان الاستشارة </th>
            <th>اسم المستخدم</th>
            <th>تاريخ الاضافة </th>

            <th>العمليات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($consls as $item)
        <tr>
         <td>{{ $item->title }}</td>
         <td>{{ $item->user->name }}</td>
         <td>{{ $item->created_at->format('Y-m-d') }}</td>

         <td>
            <a href="{{ route('consloution.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
            <form style="display: inline"
                action="{{ route('consloution.destroy', $item->id) }}"
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