@extends('auth.layouts.master_auth')

@section('content')
    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h1 class="h3">Jurusan Login</h1>
                    <p>Sign In to your account</p>
                </div>
                <form action="{{ route('jurusan.authenticate') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name"
                            name="user_name" value="{{ old('user_name') }}" placeholder="Enter Your Username" autofocus
                            required>
                        @if ($errors->has('user_name'))
                            <span class="text-danger">{{ $errors->first('user_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group" style="margin-bottom: 30px">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="Enter Your Password" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                </form>
            </div>
        </div>
    </div>
@endsection
