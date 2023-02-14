<div class="col-md-6">
    <div>
        <table id="eexdample"  class="display example" style="width:100%">
            <thead>
                <tr>
                    <th>صورة </th>
                    <th>اسم الخدمة</th>
                    <th>اضيفة بواسطة</th>
                    <th>تاريخ الاضافة</th>
    
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Service::take(10)->get() as $item)
                <tr>
                 <td><img src="{{ asset('public/uploads/'.$item->image) }}" width="50" height="50" alt=""></td>
                 <td>{{ $item->title }}</td>
                 <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>
                 <td>{{ date('Y-m-d', strtotime($item->created_at)); }}</td>
           
                 <td>
                    <a href="{{ route('services.show', $item->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
    
                    {{-- <a href="{{ route('services.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> --}}
                 
                </td>
                </tr>
                    
                @endforeach
            </tfoot>
        </table>
    </div>
    
</div>
<div class="col-md-6">
    <div>
        <table id="eexdample"  class="display example" style="width:100%">
            <thead>
                <tr>
                    <th>صورة الخدمة</th>
                    <th>اسم الخدمة</th>
                    <th>اضيفة بواسطة</th>
                    <th>تاريخ الاضافة</th>
    
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Service::take(10)->get() as $item)
                <tr>
                 <td><img src="{{ asset('public/uploads/'.$item->image) }}" width="50" height="50" alt=""></td>
                 <td>{{ $item->title }}</td>
                 <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>
                 <td>{{ date('Y-m-d', strtotime($item->created_at)); }}</td>
              
                 <td>
                    <a href="{{ route('services.show', $item->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
    
                    {{-- <a href="{{ route('services.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> --}}
                  
                </td>
                </tr>
                    
                @endforeach
            </tfoot>
        </table>
    </div>
    
</div>