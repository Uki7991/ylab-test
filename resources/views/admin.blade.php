@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">
            @include('partials.admin-side-menu')
        </div>
        <div class="col-md-10">
            @yield('admin-section')
        </div>
    </div>
</div>

@include('partials.delete-modal')
@endsection

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/datatables.min.js') }}"></script>

    <script>
        $('#delete-modal').on('show.bs.modal', function (e) {
            let btn = $(e.relatedTarget);
            let url = btn.data('url');
            let id = btn.data('id');

            let deleteForm = $('#delete-form');
            let item = $('#item-id');

            deleteForm.attr('action', url);
            item.html(id);

        })
    </script>
@endpush