<div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>صورة المقال</th>
                <th>عنوان</th>
                <th>اضيف بواسطة</th>
                <th>عدد التعليقات</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $item)
            <tr>
             <td><img src="{{ asset('public/uploads/'.$item->image) }}" width="50" height="50" alt=""></td>
             <td>{{ $item->title }}</td>
             <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>
             <th>{{ $item->comments->count() }}</th>

            
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
