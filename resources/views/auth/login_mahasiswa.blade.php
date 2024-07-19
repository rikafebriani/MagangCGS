@extends('auth.layouts.master_auth')

@section('content')
    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h1 class="h3">Mahasiswa Login</h1>
                    <p>Sign In to your account</p>
                </div>
                <form action="{{ route('mahasiswa.authenticate') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control @error('mahasiswa_nim') is-invalid @enderror"
                            id="mahasiswa_nim" name="mahasiswa_nim" value="{{ old('mahasiswa_nim') }}"
                            placeholder="Enter Your Mahasiswa Nim" autofocus required>
                        @if ($errors->has('mahasiswa_nim'))
                            <span class="text-danger">{{ $errors->first('mahasiswa_nim') }}</span>
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
