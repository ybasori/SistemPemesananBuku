<style type="text/css">
		.alert {
			font-family: Arial;
			padding: 15px;
			margin-bottom: 20px;
			border: 1px solid transparent;
			border-radius: 4px;
			width: 30%;
			margin: auto;
		}
		.alert-success {
			color: #3c763d;
			background-color: #dff0d8;
			border-color: #d6e9c6;
		}
		.alert-danger {
			color: #a94442;
			background-color: #f2dede;
			border-color: #ebccd1;
		}
	</style>
<?php
switch($_POST["formaction"]){
	case "register":
		include "action/login_register.php";
	break;
	case "login":
		include "action/login_login.php";
	break;
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".alert-satu").fadeOut(10000);
	});
</script>