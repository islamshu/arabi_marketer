<table id="" class="example display" style="width:100%">
    <thead>
        <tr>
            <th>صورة المستخدم  </th>

            <th>اسم المستخدم  </th>

            <th>العمليات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users_follows as $item)
        <tr>
            <td><img alt="Pic" src="{{ asset('public/uploads/' . $item->image) }}" width="50" height="50" ></td>

         <td>{{ $item->name }}</td>

         <td>
            @if($item->type == 'user')
            <a href="{{ route('marketer.show', [$item->id]) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
            @else
            <a href="{{ route('customer.show', [$item->id]) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>

            @endif
            
        </td>
        </tr>
            
        @endforeach
    </tfoot>
</table>