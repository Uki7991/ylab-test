@extends('admin')

@section('admin-section')

    <form action="{{ route('task.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="form-group col">
                <label for="name">Title</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ old('name') }}" required>

                @if($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col">
                <label for="statuses">Status</label>
                <select name="status_id" class="form-control {{ $errors->has('status_id') ? 'is-invalid' : '' }}" id="statuses" required>
                    <option value="" disabled selected>Select status...</option>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ old('status_id') === $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                    @endforeach
                </select>

                @if($errors->has('status_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('status_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col">
                <label for="deadline">Deadline</label>
                <input class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="date" id="deadline" name="end_date" value="{{ old('end_date') }}" required>

                @if($errors->has('end_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('end_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="desc">Description</label>
            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="desc" cols="30" rows="10" required>{{ old('description') }}</textarea>

            @if($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection