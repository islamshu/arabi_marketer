<script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@livewireStyles

<style>
    fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow: 0px 0px 0px 0px #000;
        box-shadow: 0px 0px 0px 0px #000;
    }

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
    }

    /*!
 * bootstrap-fileinput v4.3.9
 * http://plugins.krajee.com/file-input
 *
 * Krajee default styling for bootstrap-fileinput.
 *
 * Author: Kartik Visweswaran
 * Copyright: 2014 - 2017, Kartik Visweswaran, Krajee.com
 *
 * Licensed under the BSD 3-Clause
 * https://github.com/kartik-v/bootstrap-fileinput/blob/master/LICENSE.md
 */
    .file-loading {
        top: 0;
        right: 0;
        width: 25px;
        height: 25px;
        font-size: 999px;
        text-align: right;
        color: #fff;
        background: transparent url('../img/loading.gif') top left no-repeat;
        border: none;
    }

    .file-object {
        margin: 0 0 -5px 0;
        padding: 0;
    }

    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        text-align: right;
        opacity: 0;
        background: none repeat scroll 0 0 transparent;
        cursor: inherit;
        display: block;
    }

    .file-caption-name {
        display: inline-block;
        overflow: hidden;
        height: 20px;
        word-break: break-all;
    }

    .input-group-lg .file-caption-name {
        height: 25px;
    }

    .file-zoom-dialog {
        text-align: left;
    }

    .file-error-message {
        color: #a94442;
        background-color: #f2dede;
        margin: 5px;
        border: 1px solid #ebccd1;
        border-radius: 4px;
        padding: 15px;
    }

    .file-error-message pre,
    .file-error-message ul {
        margin: 0;
        text-align: left;
    }

    .file-error-message pre {
        margin: 5px 0;
    }

    .file-caption-disabled {
        background-color: #EEEEEE;
        cursor: not-allowed;
        opacity: 1;
    }

    .file-preview {
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 5px;
        width: 100%;
        margin-bottom: 5px;
    }

    .krajee-default.file-preview-frame {
        position: relative;
        display: table;
        margin: 8px;
        border: 1px solid #ddd;
        box-shadow: 1px 1px 5px 0 #a2958a;
        padding: 6px;
        float: left;
        text-align: center;
    }

    .krajee-default.file-preview-frame:not(.file-preview-error):hover {
        box-shadow: 3px 3px 5px 0 #333;
    }

    .krajee-default.file-preview-frame .kv-file-content {
        height: 170px;
    }

    .krajee-default.file-preview-frame .file-thumbnail-footer {
        height: 70px;
    }

    .krajee-default .file-preview-image {
        vertical-align: middle;
        image-orientation: from-image;
    }

    .krajee-default .file-preview-text {
        display: block;
        color: #428bca;
        border: 1px solid #ddd;
        font-family: Menlo, Monaco, Consolas, "Courier New", monospace;
        outline: none;
        padding: 8px;
        resize: none;
    }

    .krajee-default .file-preview-html {
        border: 1px solid #ddd;
        padding: 8px;
        overflow: auto;
    }

    .krajee-default[data-template="audio"] .file-preview-audio {
        display: table-cell;
        vertical-align: middle;
        height: 170px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .krajee-default .file-preview-audio audio {
        vertical-align: middle;
    }

    .krajee-default .file-zoom-dialog .file-preview-text {
        font-size: 1.2em;
    }

    .krajee-default .file-preview-other {
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        text-align: center;
        vertical-align: middle;
        padding: 10px;
    }

    .krajee-default .file-preview-other:hover {
        opacity: 0.8;
    }

    .krajee-default .file-actions,
    .krajee-default .file-other-error {
        text-align: left;
    }

    .krajee-default .file-other-icon {
        font-size: 8em;
    }

    .krajee-default .file-actions {
        margin-top: 15px;
    }

    .krajee-default .file-footer-buttons {
        float: right;
    }

    .krajee-default .file-footer-caption {
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 160px;
        text-align: center;
        padding-top: 4px;
        font-size: 11px;
        color: #777;
        margin: 5px auto;
    }

    .krajee-default .file-preview-error {
        opacity: 0.65;
        box-shadow: none;
    }

    .krajee-default .file-preview-frame:not(.file-preview-error) .file-footer-caption:hover {
        color: #000;
    }

    .krajee-default .file-drag-handle,
    .krajee-default .file-upload-indicator {
        position: absolute;
        text-align: center;
        bottom: -6px;
        left: -6px;
        padding: 8px 8px 1px 3px;
        border-left: none;
        border-bottom: none;
        border-right: 1px solid #8a6d3b;
        border-top: 1px solid #8a6d3b;
        border-top-right-radius: 24px;
        font-size: 12px;
    }

    .krajee-default .file-drag-handle {
        background-color: #d9edf7;
        border-color: #bce8f1;
    }

    .krajee-default .file-upload-indicator {
        font-size: 13px;
        background-color: #fcf8e3;
        border-color: #faebcc;
        padding-bottom: 0;
    }

    .krajee-default.file-preview-error .file-upload-indicator {
        background-color: #f2dede;
        border-color: #ebccd1;
    }

    .krajee-default.file-preview-success .file-upload-indicator {
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }

    .krajee-default.file-preview-loading .file-upload-indicator {
        background-color: #e5e5e5;
        border-color: #777;
    }

    .krajee-default .file-thumb-progress {
        height: 10px;
    }

    .krajee-default .file-thumb-progress .progress,
    .krajee-default .file-thumb-progress .progress-bar {
        height: 10px;
        font-size: 9px;
        line-height: 10px;
    }

    .krajee-default .file-thumbnail-footer {
        position: relative;
    }

    .krajee-default .file-thumb-progress {
        position: absolute;
        top: 35px;
        left: 0;
        right: 0;
    }

    .krajee-default.kvsortable-ghost {
        background: #e1edf7;
        border: 2px solid #a1abff;
    }

    /* noinspection CssOverwrittenProperties */
    .file-zoom-dialog .file-other-icon {
        font-size: 22em;
        font-size: 50vmin;
    }

    .file-input-new .file-preview,
    .file-input-new .close,
    .file-input-new .glyphicon-file,
    .file-input-new .fileinput-remove-button,
    .file-input-new .fileinput-upload-button,
    .file-input-ajax-new .fileinput-remove-button,
    .file-input-ajax-new .fileinput-upload-button {
        display: none;
    }

    .file-caption-main {
        width: 100%;
    }

    .file-input-ajax-new .no-browse .input-group-btn,
    .file-input-new .no-browse .input-group-btn {
        display: none;
    }

    .file-input-ajax-new .no-browse .form-control,
    .file-input-new .no-browse .form-control {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }

    .file-thumb-loading {
        background: transparent url('../img/loading.gif') no-repeat scroll center center content-box !important;
    }

    .file-sortable .file-drag-handle {
        cursor: move;
        cursor: -webkit-grabbing;
        opacity: 1;
    }

    .file-sortable .file-drag-handle:hover {
        opacity: 0.7;
    }

    .file-drop-zone {
        border: 1px dashed #aaa;
        border-radius: 4px;
        height: 100%;
        text-align: center;
        vertical-align: middle;
        margin: 12px 15px 12px 12px;
        padding: 5px;
    }

    .file-drop-zone-title {
        color: #aaa;
        font-size: 1.6em;
        padding: 85px 10px;
        cursor: default;
    }

    .file-preview .clickable,
    .clickable .file-drop-zone-title {
        cursor: pointer;
    }

    .file-drop-zone.clickable:hover {
        border: 2px dashed #999;
    }

    .file-drop-zone.clickable:focus {
        border: 2px solid #5acde2;
    }

    .file-drop-zone .file-preview-thumbnails {
        cursor: default;
    }

    .file-highlighted {
        border: 2px dashed #999 !important;
        background-color: #f0f0f0;
    }

    .file-uploading {
        background: url('../img/loading-sm.gif') no-repeat center bottom 10px;
        opacity: 0.65;
    }

    .file-zoom-fullscreen.modal {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .file-zoom-fullscreen .modal-dialog {
        position: fixed;
        margin: 0;
        width: 100%;
        height: 100%;
        padding: 0;
    }

    .file-zoom-fullscreen .modal-content {
        border-radius: 0;
        box-shadow: none;
    }

    .file-zoom-fullscreen .modal-body {
        overflow-y: auto;
    }

    .file-zoom-dialog .modal-body {
        position: relative !important;
    }

    .file-zoom-dialog .btn-navigate {
        position: absolute;
        padding: 0;
        margin: 0;
        background: transparent;
        text-decoration: none;
        outline: none;
        opacity: 0.7;
        top: 45%;
        font-size: 4em;
        color: #1c94c4;
    }

    .file-zoom-dialog .floating-buttons {
        position: absolute;
        top: 5px;
        right: 10px;
    }

    .floating-buttons,
    .floating-buttons .btn {
        z-index: 3000;
    }

    .file-zoom-dialog .kv-zoom-actions .btn,
    .floating-buttons .btn {
        margin-left: 3px;
    }

    .file-zoom-dialog .btn-navigate:not([disabled]):hover,
    .file-zoom-dialog .btn-navigate:not([disabled]):focus {
        outline: none;
        box-shadow: none;
        opacity: 0.5;
    }

    .file-zoom-dialog .btn-navigate[disabled] {
        opacity: 0.3;
    }

    .file-zoom-dialog .btn-prev {
        left: 1px;
    }

    .file-zoom-dialog .btn-next {
        right: 1px;
    }

    .file-zoom-content {
        height: 480px;
        text-align: center;
    }

    .file-zoom-content .file-preview-image,
    .file-preview- .file-zoom-content .file-preview-video {
        max-height: 100%
    }

    .file-preview-initial.sortable-chosen {
        background-color: #d9edf7;
    }

    /* IE 10 fix */
    .btn-file ::-ms-browse {
        width: 100%;
        height: 100%;
    }
</style>
@yield('style')

{{-- <script src="{{ asset('crudjs/crud.js') }}"></script> --}}
<link href="{{ asset('demo1/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('demo1/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('new_js/crud.js') }}"></script>
<script src="{{ asset('new_js/upload_file.js') }}"></script>

<script>
    $(".image").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }

    });
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('.example').DataTable();

    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>
@livewireScripts
<x-livewire-range-slider::scripts />


@yield('scripts')
<script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });
</script>

<script>
    $('.delete-confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `هل متأكد من حذف العنصر ؟`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
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
