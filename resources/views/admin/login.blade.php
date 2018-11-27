<!DOCTYPE html>
<html>
    <head>
        <title>Test for junior position</title>

        
    </head>
    <body>
        <h1> Login to admin page </h1>
    
    <!--    <form method="POST" action="">
        {{ csrf_field() }}
            Username:<br>
            <input type="text" name="username">
            <br>
            Password:<br>
            <input type="password" name="password">
            <br><br>
            <button type="submit">Login</button>
        </form> -->

        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <label for="username" class="col-sm-4 col-form-label text-md-right">Username</label>

                <div class="col-md-6">
                    <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <br>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
    </body>
</html>
