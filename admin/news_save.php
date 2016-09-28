<?php
include("../conn/config.php");

	function uploadResizeTo($file_obj, $save_path, $save_filename, $ww = 200, $hh = 200) {
		$file_name = $file_obj['name'];
		$file_type = $file_obj['type'];
		$tmp_name = $file_obj['tmp_name'];
		
		switch ($file_type) {
			case"image/pjpeg" :
			case"image/jpeg" :
				$images_orig = ImageCreateFromJPEG($tmp_name);
				break;
			case"image/gif":
				$images_orig = ImageCreateFromGIF($tmp_name);
				break;
			case "image/png":
			case"image/x-png":
				$images_orig = ImageCreateFromPNG($tmp_name);
				break;
			case"image/bmp":
				$images_orig = ImageCreateFromWBMP($tmp_name);
				break;
			default:
			return(false);
		}
		$orig_width = ImagesX($images_orig);
		$orig_height = ImagesY($images_orig);
		if ($orig_width > $ww || $orig_height>$hh) {
			if ($orig_width > $orig_height) {
				$hh = ($ww / $orig_width) * $orig_height;	
			} else {
				$ww = ($hh/$orig_height)*$orig_width;	}
			} else {
				$hh = $orig_height;
				$ww = $orig_width;
			}
			$images_fin = ImageCreateTrueColor($ww, $hh);
			@imagecopyresized($images_fin, $images_orig, 0, 0, 0, 0, $ww, $hh, $orig_width, $orig_height);$ext = end(explode(".", $file_name));
			$newfilename = $save_filename;
			$save = $save_path.$newfilename;
		switch ($file_type) {
			case"image/pjpeg" :
			case"image/jpeg" :
			case"image/jpg" :
				ImageJPEG($images_fin, $save ,90);	// image quality = 90
				break;
			case"image/gif":
				ImageGIF($images_fin,$save);
				break;
			case"image/png":
			case"image/x-png":
				ImagePNG($images_fin,$save);
				break;
			case"image/bmp":
				imageWBMP($images_fin,$save);
			default:
			return(false);
		}
	}

$id = $_GET["id"];
$news_name = $_POST["news_name"];
$content = $_POST["content"];
$news_full_image = $_POST["news_full_image"];
$SAVE_PATH = $_SERVER['DOCUMENT_ROOT']."/fay/news/";

if ($_FILES["fileupload"]["tmp_name"]) {
	$currenttime=time();
	$images = $_FILES["fileupload"]["tmp_name"];
	$typeupload = ($_FILES["fileupload"]["type"]);
	$nameimages = $currenttime.$_FILES["fileupload"]["name"];
	copy($_FILES["fileupload"]["tmp_name"],"news/".$nameimages);
	$newfilename = uploadResizeTo($_FILES["fileupload"],$SAVE_PATH,"thumb".$nameimages,200,200);
} 

$sql = "UPDATE news 
		SET 
			news_name ='$news_name',
			content = '$content',
			news_full_image = '$news_full_image' 
		WHERE news_id = '$id'";

mysql_close($conn);
header("Location: news_list.php");
exit();

?>