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
    /* .fc-timegrid-slot-label-frame,
    .fc-scrollgrid-shrink-frame {
        height: 100%;
    } */

    /* .fc-event-time {
        display: none;
    } */

    /* .fc-event-main {
        overflow: hidden;
    } */

    /* .fc .fc-toolbar.fc-header-toolbar {
        margin: none;
    } */

    .fc .fc-toolbar-title {
        font-size: 30px;
    }

    /* .fc-event-resizer.fc-event-resizer-end {
        display: none;
    } */

    /* .content-event {
        align-items: center;
        flex-direction: column;
        display: flex;
    } */

    /* .fc-highlight,
    .fc-timegrid-slot-label-frame {
        height: 47.5px;
        display: flex;
    } */

    .fc .fc-toolbar.fc-header-toolbar {
        margin: 10px 20px;
    }

    /* .fc .fc-daygrid-body-unbalanced .fc-daygrid-day-events {
        display: flex;
        flex-wrap: wrap;
    } */

    /* .image-event {
        width: 15px;
    } */

    /* .box-event {
        width: 15px;
        height: 15px;
        border: white 0.1px solid
    }

    .flag-event {
        width: 15px;
    } */

    /* .swal2-actions {
        justify-content: space-around !important;
        margin: 1.25em 70px 0 !important;
    } */

    /* .content table tbody tr td thead tr th,
    .content table tbody,
    .content table td,
    .content table th {
    border: none !important;
    padding: 3px !important;
    } */
</style>

    <div class="container1">
        <div class="" id="calendar"></div>
    </div>
@endsection