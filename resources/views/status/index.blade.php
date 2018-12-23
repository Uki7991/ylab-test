@extends('admin')

@section('admin-section')

    @include('partials.create-btn', ['route' => 'status'])

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered" id="statuses-table">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Title</th>
                    <th>Sort</th>
                    <th>Color</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

@push('stylesheets')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

@endpush

@push('scripts')
    <script>
        $(function() {
            $('#statuses-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatable.getstatuses') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'sort', name: 'sort' },
                    { data: 'color', name: 'color' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>

    <script>
        $(function () {
            $('#delete-confirmation').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).attr('data-id');
                $(this).find('form#delete-form').attr('action', '/admin/product/' + id);
            })
        });
    </script>
@endpush