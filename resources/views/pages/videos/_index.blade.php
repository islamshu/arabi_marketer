<div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>الصورة </th>

                <th>عنوان الفيديو</th>
                <th>اضيف بواسطة</th>
                <th>رابط على اليوتيوب</th>
                <th>تاريخ الاضافة</th>
                <th>الحالة</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $item)
            <tr>
                <td><img src="{{ asset('public/uploads/'.$item->image) }}" width="80" height="50" alt=""></td>

             <td>{{ $item->title }}</td>
             <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>

             <th><a href="{{ $item->url }}" target="_blacnk"><i class="fa fa-eye"></i></a></th>
             <td>{{ date('Y-m-d', strtotime($item->created_at)); }}</td>
             <td>
                <select class="target btn" book_id="{{ $item->id }}" class="worker_status" id="worker_status_{{ $item->id }}" onchange="myFunction('{{ $item->id }}')"
                    style="background:{{ get_color_new($item->status) }} "
                    data-id="{{ $item->id }}">
                    <option value="1" class="btn  btn-success"
                        @if ($item->status == 1) selected @endif>
                        @lang('مقبول')</option>
                    <option value="0" class="btn btn-dark"
                        @if ($item->status == 0) selected @endif>@lang('تحت المراجعة')
                    </option>
                    <option value="2" class="btn btn-danger "
                        @if ($item->status == 2) selected @endif>@lang('رفض')</option>
                </select>
             </td>
             <td>
                <a href="{{ route('videos.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                <form style="display: inline"
                    action="{{ route('videos.destroy', $item->id) }}"
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
