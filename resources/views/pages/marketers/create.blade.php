<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Multistep Livewire Form Example</title>
    @livewireStyles
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap">
    {{-- <link href="{{ asset('multiform.css') }}" rel="stylesheet" id="bootstrap"> --}}
    <style>
        .display-none {
    display: none;
}
.multi-wizard-step p {
    margin-top: 12px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    position: relative;
    width: 100%;
}
.multi-wizard-step button[disabled] {
    filter: alpha(opacity=100) !important;
    opacity: 1 !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    content: " ";
    width: 100%;
    height: 1px;
    z-order: 0;
    position: absolute;
    background-color: #fefefe;
}
.multi-wizard-step {
    text-align: center;
    position: relative;
    display: table-cell;
}
    </style>
</head>
<body class="mt-5">
    <div class="container">
        <div class="text-center">
            Laravel Form Wizard Example
        </div>
        <livewire:markter />
    </div>
</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
@livewireScripts
</html>
