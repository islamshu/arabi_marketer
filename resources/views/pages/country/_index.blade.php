<div class="card-body">
    <table id="kt_datatable_example_2" class="table align-middle table-row-dashed fs-6 gy-5 example">
        <thead>
            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                <th>#</th>
                <th>Flag</th>
                <th>العنوان</th>

                <th class="text-end min-w-50px">الاجراءات</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 fw-semibold">
            @foreach ($country as $item)
                
            <tr>
                <td>#</td>
                <td><img src="{{ asset('public/uploads/'.$item->flag) }}" width="100" height="70" alt=""></td>
                <td>{{ $item->title }}</td>
                <td></td>
            </tr>
            @endforeach

            
        </tbody>
    </table>
    <!--end: Datatable-->
</div>
