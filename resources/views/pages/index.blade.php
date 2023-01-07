<x-base-layout>

    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xxl-4">
            {{ theme()->getView('partials/widgets/mixed/_widget-2', ['class' => 'card-xxl-stretch', 'chartColor' => 'danger', 'chartHeight' => '200px']) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xxl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-5', ['class' => 'card-xxl-stretch']) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xxl-4">
            {{ theme()->getView('partials/widgets/mixed/_widget-7', ['class' => 'card-xxl-stretch-50 mb-5 mb-xl-8', 'chartColor' => 'primary', 'chartHeight' => '150px']) }}

            {{ theme()->getView('partials/widgets/mixed/_widget-10', ['class' => 'card-xxl-stretch-50 mb-5 mb-xl-8', 'chartColor' => 'primary', 'chartHeight' => '175px']) }}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gy-5 gx-xl-8">
        <!--begin::Col-->
        <div class="col-xxl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-3', ['class' => 'card-xxl-stretch mb-xl-3']) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-8">
            {{ theme()->getView('partials/widgets/tables/_widget-9', ['class' => 'card-xxl-stretch mb-5 mb-xl-8']) }}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-2', ['class' => 'card-xl-stretch mb-xl-8']) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-6', ['class' => 'card-xl-stretch mb-xl-8']) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-4">
            {{ theme()->getView('partials/widgets/lists/_widget-4', ['class' => 'card-xl-stretch mb-5 mb-xl-8', 'items' => '5']) }}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 gx-xxl-8">
        <!--begin::Col-->
        <div class="col-xxl-4">
            {{ theme()->getView('partials/widgets/mixed/_widget-5', ['class' => 'card-xxl-stretch mb-xl-3', 'chartColor' => 'success', 'chartHeight' => '150px']) }}
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xxl-8">
            {{ theme()->getView('partials/widgets/tables/_widget-5', ['class' => 'card-xxl-stretch mb-5 mb-xxl-8']) }}
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

</x-base-layout>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<button id="play-button"></button>
<audio controls="" muted id="notification-sound" class="audio-element-payment" style="position: absolute; z-index: -999; top: -500px;">
    <source src="https://cdn.pixabay.com/audio/2021/08/04/audio_12b0c7443c.mp3">
    <source src="https://cdn.pixabay.com/audio/2021/08/04/audio_12b0c7443c.mp3">
</audio>

<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('ecfcb8c328a3a23a2978', {
        cluster: 'ap2'
    });
</script>
<script>
    var notificationsWrapper = $('.dropdown-notifications');

    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsWrapper.find('span[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('.scrollable-container');

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('new-user');
    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\NewUser', function(data) {

        var existingNotifications = notifications.html();

        var newNotificationHtml = `<div class="d-flex flex-stack py-4">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-35px me-4">
                                <span class="symbol-label bg-light-Direct">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen044.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-Direct">
                                        <i class="fa fa-bell"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Symbol-->

                            <!--begin::Title-->
                            <div class="mb-0 me-2">
                                <a href="` + data.url + `" class="fs-6 text-gray-800 text-hover-primary fw-bolder">` +
            data.title + `
                                    </a>
                                {{-- <div class="text-gray-400 fs-7">يوجد لديك رسالة جديدة من </div> --}}
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Label-->
                        <span class="badge badge-light fs-8">` + data.time + `</span>
                        <!--end::Label-->
                    </div>`;


        notifications.html(newNotificationHtml + existingNotifications);
        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
        $('.delll').empty();
        playAudio();


        });

</script>
<script>
  
  function playAudio()
    {
        alert('test');

        // appending HTML5 Audio Tag in HTML Body
        $('.notifications_sounds').html(`<iframe width="10" height="10" src="https://www.youtube.com/embed/PkYRoWztD2c?&autoplay=1&loop=1&rel=0&showinfo=0&color=white&iv_load_policy=3&playlist=PkYRoWztD2c"  frameborder="0" allow="accelerometer; allow="autoplay"; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`);
        return;
    }
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
