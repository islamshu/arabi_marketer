<?php
    // Table rows
    $tableRows = array(
        array(
            'user' => array(
                'image' => 'avatars/300-14.jpg',
                'name' => 'Ana Simmons',
                'skills' => 'HTML, JS, ReactJS'
            ),
            'company' => array(
                'name' => 'Intertico',
                'skills' => 'Web, UI/UX Design'
            ),
            'progress' => array(
                'value' => '50',
                'color' => 'primary'
            )
        ),
        array(
            'user' => array(
                'image' => 'avatars/300-2.jpg',
                'name' => 'Jessie Clarcson',
                'skills' => 'C#, ASP.NET, MS SQL'
            ),
            'company' => array(
                'name' => 'Agoda',
                'skills' => 'Houses & Hotels'
            ),
            'progress' => array(
                'value' => '70',
                'color' => 'danger'
            )
        ),
        array(
            'user' => array(
                'image' => 'avatars/300-5.jpg',
                'name' => 'Lebron Wayde',
                'skills' => 'PHP, Laravel, VueJS'
            ),
            'company' => array(
                'name' => 'RoadGee',
                'skills' => 'Transportation'
            ),
            'progress' => array(
                'value' => '60',
                'color' => 'success'
            )
        ),
        array(
            'user' => array(
                'image' => 'avatars/300-20.jpg',
                'name' => 'Natali Goodwin',
                'skills' => 'Python, PostgreSQL, ReactJS'
            ),
            'company' => array(
                'name' => 'The Hill',
                'skills' => 'Insurance'
            ),
            'progress' => array(
                'value' => '50',
                'color' => 'warning'
            )
        ),
        array(
            'user' => array(
                'image' => 'avatars/300-23.jpg',
                'name' => 'Kevin Leonard',
                'skills' => 'HTML, JS, ReactJS'
            ),
            'company' => array(
                'name' => 'RoadGee',
                'skills' => 'Art Director'
            ),
            'progress' => array(
                'value' => '90',
                'color' => 'info'
            )
        ),
    );
?>

<!--begin::Tables Widget 9-->
<div class="card {{ $class }}">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bolder fs-3 mb-1">Consultion Pending</span>

		</h3>

      
    </div>
    <!--end::Header-->

	<!--begin::Body-->
	<div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted">
                    

                        <th class="min-w-150px">صورة </th>
                        <th class="min-w-150px">الكود </th>
                        <th class="min-w-150px">عنوان الاستشارة </th>
                        <th class="min-w-150px">السعر  </th>
                        <th class="min-w-150px">اضيف بواسطة </th>
                        <th class="min-w-150px">تاريخ الاجتماع</th>


                    </tr>
                </thead>
                <!--end::Table head-->

                <!--begin::Table body-->
                <tbody>
                    @foreach (App\Models\BookingConsultion::wherehas('user',function($q){
                        $q->where('deleted_at',null);
                    })->where('booking_status',0)->where('paid_status','paid')->take(10)->orderby('id','desc')->get() as $item)
                    <tr>
                        <td><img src="{{ asset('public/uploads/'.@$item->user->image) }}" width="50" height="50" alt=""></td>
                    
                        <td><a href="{{ route('order_consulting.show', $item->id) }}">#{{ $item->code }}</a></td>
                         <td> {{ $item->consult->title }}</td>
                         <td>{{ $item->price }}$</td>
                         <th><a href="{{ route('marketer.show',$item->user->id) }}">{{ $item->user->name }}</a></th>
                         <td> {{ $item->date }}</td>
                       
                    
                     
                        </tr>
                        
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <a href="{{ route('order_consulting') }}" class="btn btn-success">Show all</a>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
	</div>
	<!--begin::Body-->
</div>
<!--end::Tables Widget 9-->
