<div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>صورة الاداة</th>
                <th>اسم الاداة</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tools as $item)
            <tr>
             <td><img src="{{ URL::to('/') }}/public/uploads/{{ $item->image }}" width="50" height="50" alt=""></td>
             <td>{{ $item->title }}</td>
             <td>
                <a href="{{ route('tools.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                <form style="display: inline"
                    action="{{ route('tools.destroy', $item->id) }}"
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
