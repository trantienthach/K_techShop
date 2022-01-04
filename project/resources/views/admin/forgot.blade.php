<!DOCTYPE html>
<html>
<head>
	<title>Đổi mật khẩu</title>
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
				<h2 class="text-center">Quên mật khẩu</h2>
			</div>
			<div class="panel-body">
				<form action="{{ route('admin.store_forgot') }}" method="POST">
                    @csrf
                      <div class="form-group">
                        <label for="gmail ">Gmail :</label>
                        <input  type="text" name="gmail" class="form-control"
                        value="{{ old('gmail') }}" id="gmail">@error('gmail')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      <input type="submit" name='btn_forgot' value="Forgot" class='btn btn-success'>
                      {{--  <button  name="btn_forgot" value="forgot" class="btn btn-success">Submit</button>  --}}
                      <a href="{{ route('admin.register') }}" class="btn btn-success">Register</a>
                </form>
			</div>
		</div>
	</div>
</body>
</html>