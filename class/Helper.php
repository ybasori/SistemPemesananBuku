<?php
class Helper
{
	public function jquery_ajaxform($idform, $url, $idtarget)
	{
		return "
		$(document).ready(function(e){
			$(\"#".$idform."\").on(\"submit\",function(e){
				e.preventDefault();
				$.ajax({
					url: \"".$url."\",
					type: \"POST\",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					beforeSend: function(){
						$(\"#".$idtarget."\").html(\"Loading ...\");
					},
					success: function(data){
						$(\"#".$idtarget."\").html(data);
					},
					error: function(){
						$(\"#".$idtarget."\").html(\"Fail to Send.\");
					}
				});
			});
		})
		";
	}
}
?>