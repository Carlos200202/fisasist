@extends('layouts.app')
@section('content')
<style>
    h2 {
        font-size: 20px !important;
    }

    a {
        text-decoration: none;
    }

    .fc-col-header-cell-cushion {
        font-size: 10px;
    }

    .tooltip, .bs-tooltip-top{
        z-index: 10000 !important;
    }
    .fc-popover-body{
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }
    .fc-popover-header{
        background-color: #db3838;
        color: white
    }
    .bi-x-lg{
        color: white !important;
    }
    .fc .fc-toolbar-title {
        font-size: 30px;
    }
    .fc .fc-toolbar.fc-header-toolbar {
        margin: 10px 20px;
    }
</style>

    <div class="container1">
        <div class="" id="calendar"></div>
    </div>
@endsection