@extends('admin')

@section('admin-section')

    <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col">
                <label for="name">Username</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ $user->name }}" required>

                @if($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col">
                <label for="email">E-mail</label>
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ $user->email }}" required>

                @if($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-auto ml-3">
                <div style="display: inline-block; margin-bottom: .5rem;">Admin</div>
                <label class="switch">
                    <input type="checkbox" name="admin" id="admin" {{ $user->admin ? 'checked' : '' }}>
                    <span class="slider round"></span>
                </label>

                @if($errors->has('admin'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('admin') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

@endsection