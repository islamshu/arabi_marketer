<div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>صورة المقال</th>
                <th>عنوان</th>
                <th>اضيف بواسطة</th>
                <th>عدد التعليقات</th>
                <th>الحالة</th>
                                <th>تاريخ الاضافة</th>

                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $item)
            <tr>
             <td><img src="{{ asset('public/uploads/'.$item->image) }}" width="50" height="50" alt=""></td>
             <td>{{ $item->title }}</td>
             <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>
             <th><a href="{{ route('show_comments',$item->id) }}">{{ $item->comments->count() }}</a> </th>

             <td>
                <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch"
                    {{ $item->status == 1 ? 'checked' : '' }}>
            </td>
            <td>{{ $item->created_at->format('Y-m-d') }}</td>

             <td>
                <a href="{{ route('blogs.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                <form style="display: inline"
                    action="{{ route('blogs.destroy', $item->id) }}"
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
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#example").on("change", ".js-switch", function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let userId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('blogs.update.status') }}',
                    data: {
                        'status': status,
                        'blog_id': userId
                    },
                    success: function(data) {
                        console.log(data.message);
                    }
                });
            });
        });
    </script>
   
@endsection
