<?php
switch ($_POST["formaction"]) {
	case 'update':
	if($_POST["level"]=="member"){
		$check=$member->count_master()-1;
		if($check!=0){
			$member->updateMemberLevel($_POST["id_member"], $_POST["level"]);
			$sys->redirect($sys->base_url()."/Member");
		}
		else{
			?>
			<div class="alert alert-danger">Setidaknya ada 1 member dengan level master. </div>
			<?php
		}
	}
	else{
		$member->updateMemberLevel($_POST["id_member"], $_POST["level"]);
		$sys->redirect($sys->base_url()."/Member");
	}
	break;
}
?>