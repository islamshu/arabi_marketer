<div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>صورة المقال</th>
                <th>عنوان</th>
                <th>اضيف بواسطة</th>
                @permission('red-comment-blog')
                    
                <th>عدد التعليقات</th>
                @endpermission

                @permission('status-blog')
                    
                <th>الحالة</th>
                @endpermission

                                <th>تاريخ الاضافة</th>

                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $item)
            <tr>
             <td><img src="{{ asset('public/uploads/'.$item->image_blog->image) }}" width="50" height="50" alt=""></td>
             <td>{{ $item->title }}</td>
             <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>
             @permission('red-comment-blog')

             <th><a href="{{ route('show_comments',$item->id) }}">{{ $item->comments->count() }}</a> </th>
             @endpermission
             @permission('status-blog')

             <td>
                <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch"
                    {{ $item->status == 1 ? 'checked' : '' }}>
            </td>
            @endpermission

            <td>{{ $item->created_at->format('Y-m-d') }}</td>

             <td>

                @permission('edit-blog')
                <a href="{{ route('blogs.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                @endpermission
                @permission('delete-blog')

                <form style="display: inline"
                    action="{{ route('blogs.destroy', $item->id) }}"
                    method="post">
                    @method('delete') @csrf
                    <button type="submit" class="btn btn-danger delete-confirm"><i
                            class="fa fa-trash"></i></button>
                </form>
                @endpermission
            </td>
            </tr>
                
            @endforeach
        </tfoot>
    </table>
</div>
