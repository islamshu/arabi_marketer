<x-base-layout>

    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xxl-4">
            {{ theme()->getView('partials/widgets/mixed/_widget-2', array('class' => 'card-xxl-stretch', 'chartColor' => 'danger', 'chartHeight' => '200px')) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xxl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-5', array('class' => 'card-xxl-stretch')) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xxl-4">
            {{ theme()->getView('partials/widgets/mixed/_widget-7', array('class' => 'card-xxl-stretch-50 mb-5 mb-xl-8', 'chartColor' => 'primary', 'chartHeight' => '150px')) }}

            {{ theme()->getView('partials/widgets/mixed/_widget-10', array('class' => 'card-xxl-stretch-50 mb-5 mb-xl-8', 'chartColor' => 'primary', 'chartHeight' => '175px')) }}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gy-5 gx-xl-8">
        <!--begin::Col-->
        <div class="col-xxl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-3', array('class' => 'card-xxl-stretch mb-xl-3')) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-8">
            {{ theme()->getView('partials/widgets/tables/_widget-9', array('class' => 'card-xxl-stretch mb-5 mb-xl-8')) }}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-2', array('class' => 'card-xl-stretch mb-xl-8')) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-6', array('class' => 'card-xl-stretch mb-xl-8')) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-4', array('class' => 'card-xl-stretch mb-5 mb-xl-8', 'items' => '5')) }}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 gx-xxl-8">
        <!--begin::Col-->
        <div class="col-xxl-4">
            {{ theme()->getView('partials/widgets/mixed/_widget-5', array('class' => 'card-xxl-stretch mb-xl-3', 'chartColor' => 'success', 'chartHeight' => '150px')) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xxl-8">
            {{ theme()->getView('partials/widgets/tables/_widget-5', array('class' => 'card-xxl-stretch mb-5 mb-xxl-8')) }}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

</x-base-layout>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('ecfcb8c328a3a23a2978', {
        cluster: 'ap2'
    });
</script>
<script>
    var notificationsWrapper = $('.dropdown-notifications');
    // var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsWrapper.find('span[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('li.scrollable-container');

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('new-user');
    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\NewUser', function(data) {
        // alert(data.title);

        var existingNotifications = notifications.html();

        var newNotificationHtml = `<a href="` + data.url + `"><span class="table-img msg-user">
                                        <img src="` + `{{ asset('uploads/user/deflut.png') }}` + `" alt="">
                                    </span><span class="menu-info"><span class="menu-title">` + data.title + `</span><span class="menu-desc">
                                            <i class="material-icons"></i> 
                                        </span>
                                    </span>
                                </a>`;
        notifications.html(newNotificationHtml + existingNotifications);
        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
        $('.delll').empty();

    });
</script>
<script>
    
$("#selUser").keyup(function() {


$.ajax({
    url: "{{ route('dashabord_search') }}",
    post: "get",
    data: {

        'query': $("#selUser").val(),
        'queddry': $("#selUser").val(),
    },

    success: function(data) {
        $("#mydiv").css({
            display: "block"
        });

        $('#mylist').empty();

        $("#mylist").append(data);


    }
});
});
$(document).ready(function() {




var down = false;

$('.bell').click(function(e) {

    var color = $(this).text();
    if (down) {

        $('#box').css('height', '0px');
        $('#box').css('opacity', '0');
        down = false;
    } else {

        $('#box').css('height', 'auto');
        $('#box').css('opacity', '1');
        down = true;

    }

});

});
</script>

