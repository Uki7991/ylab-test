@extends('admin')

@section('admin-section')

    <form action="{{ route('status.update', $status) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col">
                <label for="name">Title</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ $status->name }}" required>

                @if($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col">
                <label for="sort">Sort number</label>
                <input type="text" class="form-control {{ $errors->has('sort') ? 'is-invalid' : '' }}" id="sort" name="sort" value="{{ $status->sort }}" required>

                @if($errors->has('sort'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('sort') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col">
                <label for="color">Color</label>
                <input type="color" class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" id="color" name="color" value="{{ $status->color }}" required>

                @if($errors->has('color'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('color') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

@endsection