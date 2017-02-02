<?php
class Rules
{
	public $site;
	public function __construct($folder){
		$this->site=$folder;
	}
	public function uri($data){
			$uri=(isset($_GET["uri"]))?$_GET["uri"]:"/";
			
			if (strpos($uri, '?') == true) {
				$uri=explode("?",$uri);
				$uri=$uri[0];
			}
			$uri=explode("/",$uri);
			return $uri[$data];
	}
	public function get($data){
		$uri=$_SERVER["REQUEST_URI"];
		if (strpos($uri, '?') == true) {
			$uri=explode("?",$uri);
			$uris=explode("&",$uri[1]);
			foreach($uris as $uriz){
				$uriz=explode("=",$uriz);
				$dataz[$uriz[0]]=$uriz[1];
			}
			return $dataz[$data];
		}
	}
	public function rewrite($data){
		$uri=$_SERVER["REQUEST_URI"];
		if (strpos($uri, '?') == true) {
			$uri=explode("?",$uri);
			if(substr($uri[0], -1)!="/"){
				$uri=$uri[0]."/?".$uri[1];
			}
			else{
				$uri=$uri[0]."?".$uri[1];
			}
		}
		else{
			if(substr($uri, -1)!="/"){
				$uri=$uri."/";
			}
		}
		if($data!=$uri){
			?>
			<script type="text/javascript">
				window.location.href="<?php echo "http://$_SERVER[HTTP_HOST]$uri"; ?>"
			</script>
			<?php
		}
	}
	public function base_url(){
		return "http://$_SERVER[HTTP_HOST]/".$this->site;
	}
	public function site_url($data){
		return "http://$_SERVER[HTTP_HOST]/".$this->site.$data;
	}
	public function dir(){
		return $this->site;
	}
	public function dir_imgProduct(){
		return "gambar_produk";
	}
	public function dir_imgMember(){
		return $this->dir()."/foto_member";
	}
	public function redirect($data){
		?>
		<script type="text/javascript">
			window.location.href="<?php echo $data; ?>"
		</script>
		<?php
	}
	public function img_rules($data){
		if(!empty($data["tmp_name"])){
			$check = getimagesize($data["tmp_name"]);
		}
		else{
			$check =false;
		}
		$empty=1;
		if($check !== false) {
			$ext= pathinfo($data["name"])["extension"]; // extension file
			$name = str_replace(".".$ext, "", $data["name"]);
			$newname= $name."-".date("YmdHis").".".$ext; // rename file
			$target_file = $this->dir_imgProduct() ."/". basename($newname); // target directory image
			$empty=0;
			$gambar=array(
				"target" => $target_file,
				"empty" => $empty
				);
		}
		else{
			$gambar=array(
				"target" => "",
				"empty" => 1
				);
		}
		return $gambar;
	}
	
}
?>