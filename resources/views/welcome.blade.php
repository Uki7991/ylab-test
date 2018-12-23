@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @include('partials.filter')


            @foreach($tasks as $task)
                <div class="col-4 my-2">
                    <div class="card">
                        <div class="card-header" style="border-top: 5px solid {{ $task->status->color }};">
                            Task #{{ $task->id }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $task->name }}</h5>
                            <p class="card-text">{{ str_limit($task->description, 130, '...') }}</p>
                            <div class="d-flex align-items-center">
                                <a href="#" onclick="event.preventDefault()" class="btn btn-sm btn-primary task" data-id="{{ $task->id }}" data-toggle="modal" data-target="#task-modal">Details</a>

                                <form class="col-auto ml-auto pr-0 form-inline" action="{{ route('task.update', $task) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="name" value="{{ $task->name }}">
                                    <input type="hidden" name="description" value="{{ $task->description }}">
                                    <input type="hidden" name="end_date" value="{{ $task->end_date }}">
                                    <input type="hidden" name="change_status" value="1">
                                    <select name="status_id" class="form-control form-control-sm">
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}" {{ $task->status->id === $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm ml-2">Change status</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

    @include('partials.task-modal')
@endsection

@push('stylesheets')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
@endpush

@push('scripts')
    <script>
        $('#task-modal').on('show.bs.modal', function (e) {
            let btn = $(e.relatedTarget);
            let id = btn.data('id');

            console.log(id);
            $.ajax({
                url: '/task/'+id,
                success: data => {
                    appendDataToModal(data.task)
                },
                error: () => {
                    console.log('error');
                }
            });

            function appendDataToModal(task) {
                console.log(task)
                $('#task-title').html(task.name);
                $('#status').html(task.status.name);
                $('#task-desc').html(task.description);
                $('#created-at').html(dateFormat(task.created_at));
                $('#deadline').html(dateFormat(task.end_date));
                $('.modal-header').css('border-bottom', '5px solid '+task.status.color);
            }

            function dateFormat(d) {
                let date = new Date(d);

                return date.getUTCDay()+'/'+date.getMonth()+'/'+date.getFullYear();
            }
        })
    </script>
@endpush