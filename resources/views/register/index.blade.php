<!DOCTYPE html>
<html>
<head>
	@include('layouts.links')
	<title>Register</title>
</head>
<body>

	<div class="register-box">
	  <div class="register-logo">
	    <a href="{{ route('auth.index') }}"><b>Sar</b>Kop</a>
	    <br>
	    <small>Admin SarangKopi versi 0.0.1</small>
	  </div>

	  <div class="register-box-body">
	    <p class="login-box-msg">Register a new membership</p>

	    <form action="{{ route('user.store') }}" method="post">
	    	@csrf
	      <div class="form-group has-feedback">
	        <input type="text" class="form-control" name="name" placeholder="Full name" id="nama">
	        <span class="glyphicon glyphicon-user form-control-feedback"></span>
	        <span class="text-danger" id="textNama"></span>
	      </div>
	      <div class="form-group has-feedback">
	        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
	        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	        <span class="text-danger" id="textEmail"></span>
	      </div>
	      <div class="form-group has-feedback">
	        <input type="password" class="form-control" id="pass" placeholder="Password">
	        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	        <span class="text-danger" id="textPassword"></span>
	      </div>
	      <div class="form-group has-feedback">
	        <input type="password" class="form-control" id="konfirPass" name="password" placeholder="Retype password">
	        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
	        <span class="text-danger" id="textKonfirPass"></span>
	      </div>
	      <div class="row">
	        <div class="col-xs-8">
	          <div class="checkbox icheck">
	            <label for="agree">
	              <input type="checkbox" id="agree" required>I agree to the <a href="#">terms</a>
	            </label>
	          </div>
	        </div>
	        <!-- /.col -->
	        <div class="col-xs-4">
	          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
	        </div>
	        <!-- /.col -->
	      </div>
	    </form>

	    <a href="{{ route('auth.index') }}" class="text-center">I already have a membership</a>
	  </div>
	  <!-- /.form-box -->
	</div>

	@include('layouts.part.script')
	<script src="//cdnjs.cloudflare.com/ajax/libs/multiple-select/1.2.2/multiple-select.min.js"></script>
	<script type="text/javascript">
	  $(document).ready(function(){
	    // $('input').iCheck({
	    //   checkboxClass: 'icheckbox_square-blue',
	    //   radioClass: 'iradio_square-blue',
	    //   increaseArea: '20%' /* optional */
	    // })

		$("#nama").blur(function(){
			var nama   = $("#nama").val();
			if (nama == "") {
			  var pesan   = "Masukkan Nama";
			  $("#textNama").text(pesan);
			}else {
			  $("#textNama").text("");
			}
		})

		$("#email").blur(function(){
			var email   = $("#email").val();
			if (email == "") {
			  var pesan   = "Masukkan Email";
			  $("#textEmail").text(pesan);
			} else if (email.search('@') >= 0) {
			  $("#textEmail").text();
			}else {
			  var pesan3   = "Masukkan Email";
			  $("#textEmail").text(pesan3);
			}
		})

		$("#pass").blur(function(){
			var passNew   = $("#pass").val();
			var konfirPass  = $("#konfirPass").val();
			if (passNew == "" && konfirPass == "") {
			  $("#textPassword, #textKonfirPass").text("Isi Password Terlebih dahulu");
			} else if (passNew.length < 8) {
			  $("#textPassword").text("Masukkan minimal 8 Karakter");
			}else {
			  $("#textPassword").text("");
			}
		})

	  });
	</script>
</body>
</html>