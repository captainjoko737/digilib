@extends('layouts.app')
<style type="text/css">

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}

.rounded {
    border-radius:4px;
}
</style>

@section('content')
<section id="wrapper">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

            <div class="login">
                <div class="login-box card rounded ">
                    <div class="card-body ">
                        
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login_admin') }}">
                            {{ csrf_field() }}

                            <h3 class="box-title m-b-20 text-center font-weight-bold">LOGIN ADMIN</h3>
                            
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <input required class="form-control" id="username" type="text" class="form-control" name="username" placeholder="Username"> 
                                    
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <input required class="form-control" id="password" type="password" class="form-control" name="password" placeholder="Kata Sandi">
                                   
                                </div>
                            </div>
                            @if (session('error'))
                                <center>
                                    <span class="help-block">
                                        <strong style="color:red;">{{ session('error') }}</strong>
                                    </span>
                                </center>
                            @endif
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="checkbox checkbox-info pull-left p-t-0">
                                        
                                    </div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class=""></i> </a> </div>
                            </div>
                            <div class="form-group text-center">
                                <div class="col-xs-12 p-b-20">
                                    <button class="btn btn-block btn-outline-info btn-rounded" type="submit">Masuk</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

<script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>

@endsection
