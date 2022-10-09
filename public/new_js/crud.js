function store(url, method, data, replace_id, fromname, model_name, message) {
    $.ajax({
        url: url,
        type: method,
        data: data,


        success: function(data) {
            // var table = $('#stores').DataTable();
            if (model_name == 'resetform') {
                // $(fromname).trigger("reset");
                // document.fromname.reset();
                $.each($('input, select ,textarea', fromname), function(k) {
                    $(this).val('')
                });

            } else {
                var t = $(replace_id).DataTable();
                const tr = $(data);
                t.row.add(tr).draw(false);
            }


            // document.getElementById(fromname).reset();
            $(model_name).modal('hide')
            swal(
                '',
                message,
                'success'
            )


        },
        error: function(data) {
            var errors = data.responseJSON;
            var errors = data.responseJSON;
            errorsHtml = '<div class="alert alert-danger"><ul>';
            $.each(errors.errors, function(k, v) {
                errorsHtml += '<li>' + v + '</li>';
            });
            errorsHtml += '</ul></di>';
            $('#form-errors').html(errorsHtml);
        },
    });
}

function storefile(url, method, data, replace_id, fromname, model_name, message) {
    $.ajax({
        url: url,
        type: method,
        data: data,
        processData: false,
        contentType: false,

        success: function(data) {
            // var table = $('#stores').DataTable();
            if (model_name == 'resetform') {
                // $(fromname).trigger("reset");
                // document.fromname.reset();
                $.each($('input, select ,textarea', fromname), function(k) {
                    $(this).val('')
                });

            } else {
                var t = $(replace_id).DataTable();
                const tr = $(data);
                t.row.add(tr).draw(false);
            }


            // document.getElementById(fromname).reset();
            $(model_name).modal('hide');
            swal(
                '',
                message,
                'success'
            )


        },
        error: function(data) {
            var errors = data.responseJSON;
            var errors = data.responseJSON;
            errorsHtml = '<div class="alert alert-danger"><ul>';
            $.each(errors.errors, function(k, v) {
                errorsHtml += '<li>' + v + '</li>';
            });
            errorsHtml += '</ul></di>';
            $('#form-errors').html(errorsHtml);
        },
    });
}

function update(url, method, data, message) {
    $.ajax({
        url: url,
        type: method,
        data: data,

        success: function(data) {
            swal(message, {
                buttons: false,
                timer: 2000,
                icon: "success"
            });
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        },
        error: function(data) {
            var errors = data.responseJSON;
            var errors = data.responseJSON;
            errorsHtml = '<div class="alert alert-danger"><ul>';
            $.each(errors.errors, function(k, v) {
                errorsHtml += '<li>' + v + '</li>';
            });
            errorsHtml += '</ul></di>';
            $('#form-errors').html(errorsHtml);
        },
    });
}

function updatefile(url, method, data, message) {



    $.ajax({
        url: url,
        type: method,
        data: data,
        processData: false,
        contentType: false,

        success: function(data) {
            swal(message, {
                buttons: false,
                timer: 2000,
                icon: "success"
            });
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        },
        error: function(data) {
            var errors = data.responseJSON;
            var errors = data.responseJSON;
            errorsHtml = '<div class="alert alert-danger"><ul>';
            $.each(errors.errors, function(k, v) {
                errorsHtml += '<li>' + v + '</li>';
            });
            errorsHtml += '</ul></di>';
            $('#form-errors').html(errorsHtml);
        },
    });
}