<?php
//Media stuff
//author: Mikhail Chernoskutov
//date: 14.11.2012
class media {
/*русо*/
	function post_file($src, $name, $description = ""){
		if($name==""){
			$name = basename($src);
		}else{
			$name = basename($name);
		}
		if(!is_string($src) || $src == ""){
			return;
		}
		
		global $mysql;
		$ext = "." . pathinfo($name, PATHINFO_EXTENSION);
		$filetypes = array(
			array("type"=>"application/pdf", "ext"=>".pdf"),
			array("type"=>"application/zip", "ext"=>".zip"),
			array("type"=>"application/vnd.ms-excel", "ext"=>".xls"),
			array("type"=>"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "ext"=>".xlsx"),
			array("type"=>"application/vnd.ms-powerpoint", "ext"=>".ppt"),
			array("type"=>"application/vnd.openxmlformats-officedocument.presentationml.presentation", "ext"=>".pptx"),
			array("type"=>"application/msword", "ext"=>".doc"),
			array("type"=>"application/vnd.openxmlformats-officedocument.wordprocessingml.document", "ext"=>".docx"),
			array("type"=>"application/x-rar-compressed", "ext"=>".rar"),
			array("type"=>"image/gif", "ext"=>".gif"),
			array("type"=>"image/jpeg", "ext"=>".jpg"),
			array("type"=>"image/jpeg", "ext"=>".jpeg"),
			array("type"=>"image/png", "ext"=>".png"),
			array("type"=>"audio/mpeg", "ext"=>".mp3"),
			array("type"=>"audio/midi", "ext"=>".mid"),
			array("type"=>"audio/midi", "ext"=>".midi"),
			array("type"=>"image/bitmap", "ext"=>".bmp"),
			array("type"=>"video/x-matroska", "ext"=>".mkv")
		);
		
		$found = false;
		for($i=0; $i<count($filetypes); $i++){
			if($ext == $filetypes[$i]['ext']){
				$found = true;
				break;
			}
		}
		if(!$found){
			return false;
		}
		$link = "/content/upload/" . preg_replace("/\+/", "%20", urlencode(basename($name)));
		$path = ABS_PATH . "/content/upload/" . iconv("UTF-8", "windows-1251", basename($name));
		if(file_exists($path)){
			return false;
		}
		if(!file_exists(ABS_PATH . "/content/upload/")){
			mkdir(ABS_PATH . "/content/upload/", 0777, true);
		}
		move_uploaded_file($src, $path);
		$size = filesize($path);
		$mysql->query("INSERT INTO `files` (
				`name`, `link`, `time`, `description`, `size`
			) VALUES (
				'" . $name . "',
				'" . $link . "',
				UNIX_TIMESTAMP(),
				'" . $description . "',
				'" . $size . "'
			)");
		return $mysql->last_id;
	}
	
	function exttoicon($filename){
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		return "/images/upload_icons/" . $ext . ".jpg";
	}
	
	function delete_file($id){
		global $mysql;
		if((int)$id<=0){
			return false;
		}
		$file = $mysql->result("SELECT `link` FROM `files` WHERE `id` = '" . $id . "'");
		if($file==false){
			return false;
		}
		@unlink(ABS_PATH . iconv("UTF-8", "windows-1251", urldecode($file['link'])));
		$mysql->query("DELETE FROM `files` WHERE `id` = '" . $id . "'");
		return true;
	}

	function imagecreatefromsrc($src, &$image){
		$src_size = getimagesize($src);
		$src_mime = $src_size['mime'];
		$image = null;
		switch($src_mime){
			case "image/gif" : {
				$image = imagecreatefromgif($src);
			break;
			}
			case "image/jpeg" : {
				$image = imagecreatefromjpeg($src);
			break;
			}
			case "image/png" : {
				$image = imagecreatefrompng($src);
			break;
			}
			default : {
				return false;
			}
		}
	}
	
	/** $src - source filename or url
	$sizes - array of sizes including names:  array( array("name"=>"image_sml", "fpre" => "sml", "width"=>640, "height"=>480));
	$folder - name of folder to download a new file
	$tbname - name of table to insert new link to image
	$tbowner_fname - name of field to place $tbowner
	$tbowner - id of the image owner
	*/
	function post_image($src, array $sizes, $folder, $tbname, $tbowner_fname, $tbowner){
		global $mysql;
		if( (int)$tbowner < 0 || !is_string($tbowner_fname) || $tbowner_fname == "" || !is_string($tbname) || $tbname == "" || !is_array($sizes) || count($sizes) == 0 || !is_array($sizes[0]) || $src == "" || !is_string($folder) || $folder == ""){
			return false;
		}
		$tbowner = (int) $tbowner;
		$src_size = getimagesize($src);
		if($src_size == false){
			return false;
		}
		
		$src_width = $src_size[0];
		$src_height = $src_size[1];
		
		$this->imagecreatefromsrc($src, $image);
		if($image == false){
			return false;
		}
		imageinterlace($image, true);
		$fieldlist = "`" . $tbowner_fname . "`";
		$valuelist = "'" . $tbowner . "'";
		
		$rand = rand(0, 9) . rand(0, 9)  . rand(0, 9) . rand(0, 9) . time() ;
		if(!file_exists(ABS_PATH . "/content/" . $folder . "/")){
			mkdir(ABS_PATH . "/content/" . $folder . "/", 0777, true);
		}
		for($i=0; $i<count($sizes); $i++){
			$name = $sizes[$i]['name'];
			$fpre = $sizes[$i]['fpre'];
			$width = ($sizes[$i]['width']>$src_width?$src_width:$sizes[$i]['width']);
			$height = ($sizes[$i]['height']>$src_height?$src_height:$sizes[$i]['height']);
			$src_ratio = $src_width/$src_height;
			if(!isset($sizes[$i]['mode'])){
				$sizes[$i]['mode'] = 'fit';
			}
			
			if($sizes[$i]['mode'] == 'fit'){
				if ($width/$height > $src_ratio) {
					$width = $height * $src_ratio;
				} else {
					$height = $width / $src_ratio;
				}
				$resampled = imagecreatetruecolor($width, $height);
				
				$check = imagecopyresampled($resampled, $image , 0 , 0, 0, 0, $width, $height, $src_width, $src_height);
			}elseif($sizes[$i]['mode'] == 'fill'){				
				$resampled = imagecreatetruecolor($width, $height);
				
				$crpX = 0;
				$crpY = 0;
				$crpW = 0;
				$crpH = 0;
				if ($width/$height > $src_ratio) {
					$crpH = $src_width * $height / $width;
					$crpW = $src_width;
					$crpY = ($src_height - $crpH)/2;
					
				} else {
					$crpW = $src_height * $width / $height;
					$crpH = $src_height;
					$crpX = ($src_width - $crpW)/2;
				}
				$check = imagecopyresampled($resampled, $image ,0 ,0, $crpX, $crpY, $width, $height, $crpW, $crpH);
				
			}elseif($sizes[$i]['mode'] == 'fullfill'){
				//TODO: do I need fullfill mode?
			}
			
			if(!$check){
				continue;
			}
			
			$link = "/content/" . $folder . "/" . $tbowner . "_" . $fpre . $rand . ".jpg" ;
			$path =  ABS_PATH . $link;

			imagejpeg($resampled, $path, 100);
			$fieldlist .= ", `" . $name . "`";
			$valuelist .= ", '" . $link . "'";
		}
		$mysql->query("INSERT INTO `" . $tbname . "` (" . $fieldlist . ") VALUES (" . $valuelist . ")");
		return $mysql->last_id;
	}
	
	/** $src - source filename or url
	$sizes - array of sizes including names:  array( array("name"=>"image_sml", "fpre" => "sml", "width"=>640, "height"=>480));
	$folder - name of folder to download a new file
	$tbname - name of table to insert new link to image
	$id - id of the image owner
	*/
	function post_image_asowner($src, array $sizes, $folder, $tbname, $id){
		global $mysql;
		//Проверка на правильность параметров
		if( (int)$id < 0 || !is_string($tbname) || $tbname == "" || !is_array($sizes) || count($sizes) == 0 || !is_array($sizes[0]) || $src == "" || !is_string($src) || !is_string($folder) || $folder == ""){
			return false;
		}
		//id должен быть обязательно int
		$id = (int) $id;
		//исходные размеры
		$src_size = getimagesize($src);
		if($src_size == false){
			return false;
		}
		
		$src_width = $src_size[0];
		$src_height = $src_size[1];
		
		//getting an image (from jpeg, gif or png
		$this->imagecreatefromsrc($src, $image);
		if($image == false){
			return false;
		}
		//turning on interlace (for jpeg = progressive jpeg)
		imageinterlace($image, true);

		//checking wether field with this id exists and images exist in this field
		$old_images = $mysql->results("SELECT * FROM `" . $tbname . "` WHERE `id` = '" . $id . "'");
		if($old_images!=false){
			for($i=0; $i<count($sizes); $i++){
				if(isset($old_images[$sizes[$i]["name"]])){
					@unlink(ABS_PATH . $old_images[$sizes[$i]["name"]]);
				}
			}
		}else{
			return false;
		}
		
		$rand = rand(0, 9) . rand(0, 9)  . rand(0, 9) . rand(0, 9) . time() ;
		if(!file_exists(ABS_PATH . "/content/" . $folder . "/")){
			mkdir(ABS_PATH . "/content/" . $folder . "/", 0777, true);
		}
		for($i=0; $i<count($sizes); $i++){
			$name = $sizes[$i]['name'];
			$fpre = $sizes[$i]['fpre'];
			$width = ($sizes[$i]['width']>$src_width?$src_width:$sizes[$i]['width']);
			$height = ($sizes[$i]['height']>$src_height?$src_height:$sizes[$i]['height']);
			$src_ratio = $src_width/$src_height;

			if(!isset($sizes[$i]['mode'])){
				$sizes[$i]['mode'] = 'fit';
			}
			
			if($sizes[$i]['mode'] == 'fit'){
				if ($width/$height > $src_ratio) {
					$width = $height * $src_ratio;
				} else {
					$height = $width / $src_ratio;
				}
				$resampled = imagecreatetruecolor($width, $height);
				
				$check = imagecopyresampled($resampled, $image , 0 , 0, 0, 0, $width, $height, $src_width, $src_height);
			}elseif($sizes[$i]['mode'] == 'fill'){				
				$resampled = imagecreatetruecolor($width, $height);
				
				$crpX = 0;
				$crpY = 0;
				$crpW = 0;
				$crpH = 0;
				if ($width/$height > $src_ratio) {
					$crpH = $src_width * $height / $width;
					$crpW = $src_width;
					$crpY = ($src_height - $crpH)/2;
					
				} else {
					$crpW = $src_height * $width / $height;
					$crpH = $src_height;
					$crpX = ($src_width - $crpW)/2;
				}
				$check = imagecopyresampled($resampled, $image ,0 ,0, $crpX, $crpY, $width, $height, $crpW, $crpH);
				
			}elseif($sizes[$i]['mode'] == 'fullfill'){
				//TODO: do I need fullfill mode?
			}
			
			if(!$check){
				continue;
			}
			
			$link = "/content/" . $folder . "/" . $id . "_" . $fpre . $rand . ".jpg" ;
			$path =  ABS_PATH . $link;

			imagejpeg($resampled, $path, 100);
			$mysql->query("UPDATE `" . $tbname . "` SET `" . $name . "` = '" . $link . "' WHERE `id` = '" . $id . "'");	
		}
		return true;
	}
	function delete_image($tbname, array $names, $id){
		global $mysql;
		$image = $mysql->result("SELECT * FROM `" . $tbname . "` WHERE `id` = '" . $id . "'");
		if($image!=false){
			for($i=0; $i<count($names); $i++){
				if($image[$names[$i]]!=""){
					@unlink(ABS_PATH . $image[$names[$i]]);
				}
			}
			$mysql->query("DELETE FROM `" . $tbname . "` WHERE `id` = '" . $id . "'");
		}
	}
	function delete_image_byowner($tbname, array $names, $owner_field, $owner){
		global $mysql;
		$images = $mysql->results("SELECT * FROM `" . $tbname . "` WHERE `" . $owner_field . "` = '" . $owner . "'");
		if($images!=false){
			for($i=0; $i<count($images); $i++){
				for($j=0; $j<count($names); $j++){
					if($images[$i][$names[$j]]!=""){
						@unlink(ABS_PATH . $images[$i][$names[$j]]);
					}
				}
			}
		}
		$mysql->query("DELETE FROM `" . $tbname . "` WHERE `" . $owner_field . "` = '" . $owner . "'");
	}
	function delete_image_asowner($tbname, array $names, $id){
		global $mysql;
		$image = $mysql->result("SELECT * FROM `" . $tbname . "` WHERE `id` = '" . $id . "'");
		if($image != false){
			for($i=0; $i<count($names); $i++){
				if($image[$names[$i]]!=""){
					@unlink(ABS_PATH . $image[$names[$i]]);
					$mysql->query("UPDATE `" . $tbname . "` SET `" . $names[$i] . "` = ''");
				}
			}
		}
	}
	function catalog_post_image($src, $item_id){
		if($src != ""){
			$this->post_image($src, array(
				array("name"=>"image_sml", "fpre" => "sml", "width" => 128, "height" => 128, "mode" => "fill"),
				array("name"=>"image_big", "fpre" => "big", "width" => 320, "height" => 480),
				array("name"=>"image_enomorous", "fpre" => "enomorous", "width" => 12800, "height" => 10240)
			), "catalog", "catalog_images", "id_owner", $item_id);
		}
	}
	function catalog_delete_image($id){
		$this->delete_image("catalog_images", array("image_sml", "image_big", "image_enomorous"), $id);
	}
	
	function catalog_delete_image_byowner($id_owner){
		$this->delete_image_id_byowner("catalog_images", array("image_sml", "image_big", "image_enomorous"), "id_owner", $id_owner);
	}
	
	function teaser_post_image($src, $item_id){
		$this->post_image_asowner($src, array(
				array("name"=>"image_sml", "fpre" => "sml", "width" => 320, "height" => 240),
				array("name"=>"image_big", "fpre" => "big", "width" => 1280, "height" => 1024)
			), "teasers", "teasers", $item_id);
	}
	function teaser_delete_image($id){
		$this->delete_image_asowner("teasers", array ("image_sml", "image_big"), $id);
	}
}
?>