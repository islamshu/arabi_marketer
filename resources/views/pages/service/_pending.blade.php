<table id="example_service" class="display example" style="width:100%">
    <thead>
        <tr>
            <th>صورة الخدمة</th>
            <th>اسم الخدمة</th>
            <th>اضيفة بواسطة</th>
            <th>تاريخ الاضافة</th>
            <th>نوع المستخدم</th>
            <th> الحالة</th>

            <th>العمليات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($services as $item)
            <tr>
                <td><img src="{{ asset('public/uploads/' . $item->image) }}" width="50"
                        height="50" alt=""></td>
                <td>{{ $item->title }}</td>
                <th><a
                        href="{{ route('marketer.show', $item->user->id) }}">{{ $item->user->name }}</a>
                </th>
                <td>{{ date('Y-m-d', strtotime($item->created_at)) }}</td>
                <td> {{ $item->user->type }}</td>
                <td>
                    <input type="checkbox" data-id="{{ $item->id }}" name="status"
                        class="js-switch testswitch"  {{ $item->status == 1 ? 'checked' : '' }}>
                </td>
                <td>
                    <a href="{{ route('services.show', $item->id) }}" class="btn btn-success"><i
                            class="fa fa-eye"></i></a>

                    {{-- <a href="{{ route('services.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> --}}
                    <form style="display: inline"
                        action="{{ route('services.destroy', $item->id) }}" method="post">
                        @method('delete') @csrf
                        <button type="submit" class="btn btn-danger delete-confirm"><i
                                class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tfoot>
</table>