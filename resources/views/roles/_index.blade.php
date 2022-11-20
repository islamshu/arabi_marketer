<div>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th># </th>
                <th>اسم الدور</th>
     
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
            <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $role->name }}</td>
            <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i></a>
            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
       
            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            </td>
            </tr>
            @endforeach
        </tfoot>
    </table>
</div>
