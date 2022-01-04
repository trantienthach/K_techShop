<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
        <div class="flash-message">
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          @if(session('fail'))
          <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
          @endif
      </div>
				<h2 class="text-center">Đăng nhập</h2>
			</div>
			<div class="panel-body">
				<form action="{{ route('admin.store_login') }}" method="POST">
                    @csrf
                      <div class="form-group">
                        <label for="username ">Username :</label>
                        <input  type="text" name="username" class="form-control"
                        value="{{ old('username') }}@if (Cookie::has('adminUser')){{ Cookie::get('adminUser') }}@endif" id="username">@error('username')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="password">Password:</label>
                        <input  type="text" name="password" class="form-control"
                        value="{{ old('password') }}@if (Cookie::has('adminPass')){{ Cookie::get('adminPass') }}@endif" id="password">
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input  type="checkbox" name="remember_token" class="form-checkbox"
                        value="" id="remember_token">
                        <label class="form-label" for="remember_token">Ghi nhớ</label>

                      </div>
                      <a href="{{ route('admin.forgot') }}" class="btn btn-danger">forgot pass</a>
                      <button  name="btn-admin_login" value="admin_login" class="btn btn-success">Login</button>
                      <a href="{{ route('admin.register') }}" class="btn btn-primary">Register</a>
                </form>
			</div>
		</div>
	</div>
</body>
</html>