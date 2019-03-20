@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group">
                        You are logged in! Now, you can generate you access token. 
                        Please enter your password and click on Generate.
                    </div>

                    <div class="form-group">
                        <form name="frmdata" id="frmdata" method="POST" class="ui large form col-xs-12">
                            
                            <div class="ui fluid input ui attached segment">
                                <input type="password" name="u_user_password" id="u_user_password" placeholder="Your password" maxlength="190">
                            </div>

                            <button id="btnGenerateToken" class="ui bottom attached fluid icon labeled button">
                                <i class="cog icon"></i> Generate
                            </button>

                            <div class="ui segment">
                                <textarea name="u_access_token" id="u_access_token" placeholder="Your access token">{{ $currentToken }}</textarea>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
