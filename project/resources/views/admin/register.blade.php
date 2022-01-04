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
				<h2 class="text-center">Đăng ký thành viên</h2>
			</div>
			<div class="panel-body">
				<form action="{{ route('admin.store_register') }}" enctype="multipart/form-data"  method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="fullname">Fullname:</label>
                        <input  type="text" name="fullname" class="form-control"
                        value="{{ old('fullname') }}" id="fullname">
                        @error('fullname')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="username ">Username :</label>
                        <input  type="text" name="username" class="form-control"
                        value="{{ old('username') }}" id="username">
                        @error('username')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input  type="email" name="email" class="form-control"
                        value="{{ old('email') }}" id="email">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="password">Password:</label>
                        <input  type="text" name="password" class="form-control"
                        value="{{ old('password') }}" id="password">
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="confirmation_pwd">Confirmation Password:</label>
                          <input  type="text" name="confirmation_pwd" class="form-control"
                          value="{{ old('confirmation_pwd') }}" id="confirmation_pwd">
                          @error('password')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="user_avatar">Avatar</label>
                            <input  type="file"  name="user_avatar" class="form-control"
                            value="{{ old('user_avatar') }}" id="user_avatar">
                            @error('user_avatar')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                      <button name="btn-register" value="register" class="btn btn-success">Register</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>