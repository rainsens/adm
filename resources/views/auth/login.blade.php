@extends('adm::layouts.adm')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('adm.home') }}"><b>Administration - </b>ADM</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                
                <form action="{{ route('adm.login') }}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                               placeholder="Name">
                        @if($errors->has('name'))
                            <span class="error invalid-feedback">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="password"
                               name="password"
                               value="{{ old('password') }}"
                               class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                               placeholder="Password">
                        @if($errors->has('password'))
                            <span class="error invalid-feedback">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox"
                                       name="remember"
                                       id="remember">
                                <label for="remember">
                                    {{ trans('adm::adm.remember_me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
