@extends('layouts.login')

@section('content')
<div class="row">
    <div class="col-sm-8 col-sm-offset-2 text shadow">
        <img src="{{ asset('img/TaipeiEduLogo.png') }}" class="img-fluid logo" alt="Responsive image">
        <h1></h1>
        <div class="description">
    	    <p><strong><font style="color:white;font-size:24pt;">{{ config('app.name') }}</font></strong></p>
    	</div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4 form-box">
	    <div class="form-top">
            <div class="form-top-left">
                <h3>歡迎使用</h3>
		        @if (session('error') || session('success'))
		            <p style="color:red">{{ session('error') }}{{ session('success') }}</p>
		        @else
                    <p>請輸入您的單一身分驗證帳號與密碼：</p>
		        @endif
            </div>
        </div>
	    <div class="form-bottom">
            <form role="form" method="POST" action="{{ route('login') }}" class="login-form" data-stage="DataStore1">
                @csrf
                @if(isset($_GET['SAMLRequest']))
        			<input type="hidden" id="SAMLRequest" name="SAMLRequest" value="{{ $_GET['SAMLRequest'] }}">
    			@endif
                @if(isset($_GET['RelayState']))
        			<input type="hidden" id="RelayState" name="RelayState" value="{{ $_GET['RelayState'] }}">
    			@endif
                <div class="form-group">
                    <label for="username" class="sr-only">登入名稱</label>
                    <input id="username" type="text" placeholder="自訂帳號、電子郵件或手機號碼..." class="form-username form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" autocomplete="off" required autofocus>
                    @if ($errors->has('username'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">登入密碼</label>
                    <input id="password" type="password" placeholder="密碼..." class="form-password form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autocomplete="off" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="remember" class="col-sm-6 pull-left btn-link">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> 記住我<br>
                    </label>
            	    <a class="btn-link pull-right" href="{{ route('password.request') }}">忘記帳號、密碼？</a>
                </div>
                <button type="submit" index="0" role="button" class="btn btn-warning" onclick="$('.login-form').submit();$(this).attr('disabled', true);">登入</button>
            </form>
            <div class="row">
                <div class="col-sm-12 social-login-buttons" style="text-align:center;">
                    <a href="/login/google"><i style="color:FireBrick" class="fab fa-2x fa-google" title="使用 Google 登入"></i></a>　
                    <a href="/login/facebook"><i style="color:blue" class="fab fa-2x fa-facebook" title="使用 Facebook 登入"></i></a>　
                    <a href="/login/yahoo"><i style="color:RebeccaPurple" class="fab fa-2x fa-yahoo" title="使用 Yahoo 登入"></i></a>　
                    <a href="/login/line"><i style="color:green" class="fab fa-2x fa-line" title="使用 Line 登入"></i></a>　　
                    <a href="/3party"><i style="color:gray" class="fa fa-2x fa-users" title="申請介接專案"></i></a>
                </div>
            </div>
        </div>
    </div>
{{--
    <div class="col-sm-4 col-sm-offset-4 form-box">
	    <div class="form-top"></div>
        <div class="form-bottom">
            <form>
            <button type="button" index="1" role="button" class="btn btn-primary" onclick="location='{{ route('register') }}';">註冊家長帳號</button>
            </form>
        </div>
    </div>
--}}
</div>
<div class="row">					  
    <div class="col-sm-6 col-sm-offset-3 credits">        
	<p>臺北市政府教育局</p>
	<p>地址：臺北市信義區市府路1號8樓</p>
    <p>電話：1999（外縣市請撥02-27208889）#1234</p>
    <p>信箱：<a href="mailto:edu_ict.19@mail.taipei.gov.tw" target="_top" rel="noreferrer">edu_ict.19@mail.taipei.gov.tw</a></p>
	<!--<p>網頁版型設計：<a href="http://www.fhps.tp.edu.tw" title="臺北市福星國小">臺北市福星國小</a> 黃永銘</p>-->
    </div>
</div>
@endsection
