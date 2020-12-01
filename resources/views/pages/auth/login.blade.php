@extends('adm::layouts.adm')

@section('main')
    
    <section id="content_wrapper">
        
        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>
        
        <section id="content">
            
            <div class="admin-form theme-info" id="login1" style="max-width: 500px; margin-top: 8%">
    
                <div class="row mb15 table-layout">
                    <div class="col-xs-6 va-m pln"><a href="{{ route('adm.home') }}" style="color: white">{!! config('adm.logo') !!}</a></div>
                    <div class="col-xs-6 text-right va-b pr5">
                        <div class="login-links">
                            <a href="{{ route('adm.home') }}" class="" title="Register">
                                {!! config('adm.logo-mini') !!}
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-info mt10 br-n">
    
                    <div class="panel-heading heading-border bg-white">
                        <span class="panel-title hidden"><i class="fa fa-sign-in"></i></span>
                        <div class="section row mn">
                            <div class="col-sm-12 text-center">
                                <img src="{{ adm_asset('skin/img/logos/logo_red.png') }}" height="50" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                    </div>
                    
                    <form method="post" action="{{ route('adm.login.store') }}" id="contact">
                        @csrf
                        <div class="panel-body bg-light p30">
                            <div class="row">
                                <div class="col-sm-12 pr30">
                                    
                                    <div class="section">
                                        <label for="name" class="field-label text-muted fs18 mb10">
                                            {{ trans('adm::adm.admin_user') }}{{ trans('adm::adm.account') }}
                                        </label>
                                        <label for="name" class="field prepend-icon {{ $errors->has('name') ? 'state-error' : '' }}">
                                            
                                            <input type="text" name="name" id="name" class="gui-input"
                                                   placeholder="{{ trans('adm::adm.input') }} {{ trans('adm::adm.admin_user').trans('adm::adm.account') }}"
                                                   required oninvalid="setCustomValidity('{{ trans('adm::adm.input').trans('adm::adm.admin_user').trans('adm::adm.account') }}')" oninput="setCustomValidity('')">
                                            
                                            <label for="name" class="field-icon">
                                                <i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                        @if($errors->has('name'))
                                            <em class="state-error">{{ $errors->first('name') }}</em>
                                        @endif
                                    </div>
                                    
                                    <div class="section">
                                        <label for="username" class="field-label text-muted fs18 mb10">
                                            {{ trans('adm::adm.admin_user') }}{{ trans('adm::adm.password') }}
                                        </label>
                                        <label for="password" class="field prepend-icon {{ $errors->has('password') ? 'state-error' : '' }}">
                                            
                                            <input type="password" name="password" id="password" class="gui-input"
                                                   placeholder="{{ trans('adm::adm.input') }} {{ trans('adm::adm.admin_user').trans('adm::adm.password') }}"
                                                   required oninvalid="setCustomValidity('{{ trans('adm::adm.input').trans('adm::adm.admin_user').trans('adm::adm.password') }}')" oninput="setCustomValidity('')">
                                            
                                            <label for="password" class="field-icon">
                                                <i class="fa fa-lock"></i>
                                            </label>
                                        </label>
                                        @if($errors->has('password'))
                                            <em class="state-error">{{ $errors->first('password') }}</em>
                                        @endif
                                    </div>
                                    
                                    <div class="section">
                                        @if(session('danger'))
                                            <div class="alert alert-danger pastel alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="fa fa-remove pr10"></i>
                                                {{ session('danger') }}
                                            </div>
                                        @endif
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer clearfix p10 ph15">
                            <button type="submit" class="button btn-primary mr10 pull-right">{{ trans('adm::adm.login') }}</button>
                            <label class="switch ib switch-primary pull-left input-align mt10">
                                <input type="checkbox" name="remember" id="remember" checked>
                                <label for="remember" data-on="YES" data-off="NO"></label>
                                <span>{{ trans('adm::adm.remember_me') }}</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        
        </section>
    
    </section>
    
@stop

@section('scripts')
    <script>
        $(function () {
	        CanvasBG.init({
		        Loc: {
			        x: window.innerWidth / 2,
			        y: window.innerHeight / 3.3
		        },
	        });
        })
    </script>
@stop
