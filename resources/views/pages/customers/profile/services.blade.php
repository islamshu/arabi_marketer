<div>
    <table  class="example display" style="width:100%">
        <thead>
            <tr>
                <th>صورة الخدمة</th>
                <th>اسم الخدمة</th>
                <th>اضيفة بواسطة</th>
          
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $item)
            <tr>
                <td><img src="{{ asset('public/uploads/'.$item->image) }}" width="50" height="50" alt=""></td>
                <td>{{ $item->title }}</td>
                <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>
             
               </tr>
                
            @endforeach
        </tfoot>
    </table>
</div>
