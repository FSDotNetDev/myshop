<?php
include"config.php";
$con=mysql_connect($host,$username,$password);
if (!$con)
	{	die('Could not connect: ' . mysql_error());		}
mysql_select_db($database, $con);
mysql_query("SET NAMES UTF8");
$id=$_GET["id"];
$name=$_POST["name"];  
$desc=$_POST["desc"]; 
$price=$_POST["price"]; 
$weight=$_POST["weight"]; 
$available=$_POST["available"]; 
$on_hand=$_POST["on_hand"]; 
$product_full_image=$_POST["nameimages"]; 
$vendor_id=$_POST["vendor_id"]; 
$product_parent_id=$_POST["product_parent_id"];
$SAVE_PATH=$_SERVER['DOCUMENT_ROOT']."/fay/product/";
if($_FILES["fileupload"]["tmp_name"])
	{	$currenttime=time();
		$images=$_FILES["fileupload"]["tmp_name"];
		$typeupload=($_FILES["fileupload"]["type"]);
		$nameimages=$currenttime.$_FILES["fileupload"]["name"];
		copy($_FILES["fileupload"]["tmp_name"],"product/".$nameimages);
		$newfilename=uploadResizeTo($_FILES["fileupload"],$SAVE_PATH,"thumb".$nameimages,200,200);
	} 
$sql="UPDATE product SET product_name='$name',product_desc='$desc',product_price='$price',product_weight='$weight',product_available='$available',product_on_hand='$on_hand',product_full_image='$nameimages',vendor_id='$vendor_id',product_parent_id='$product_parent_id' WHERE product_id='$id'";
if (!mysql_query($sql,$con))
	{	die('Error: ' . mysql_error());	}
mysql_close($con);
header("Location: product_list.php"); 
exit();
?>

<?php
function uploadResizeTo($file_obj,$save_path,$save_filename,$ww=200,$hh=200)
	{	$file_name=$file_obj['name'];
		$file_type=$file_obj['type'];
		$tmp_name=$file_obj['tmp_name'];
switch($file_type)
	{	case"image/pjpeg" :
		case"image/jpeg" :
		$images_orig=ImageCreateFromJPEG($tmp_name);
		break;
		case"image/gif":
		$images_orig=ImageCreateFromGIF($tmp_name);
		break;
		case"image/png":
		case"image/x-png":
		$images_orig=ImageCreateFromPNG($tmp_name);
		break;
		case"image/bmp":
		$images_orig = ImageCreateFromWBMP($tmp_name);
		break;
		default:
		return(false);
	}
$orig_width=ImagesX($images_orig);
$orig_height=ImagesY($images_orig);
if($orig_width>$ww || $orig_height>$hh)
	{	if($orig_width>$orig_height)
		{	$hh=($ww/$orig_width)*$orig_height;	}
		else
		{	$ww=($hh/$orig_height)*$orig_width;	}
	}
	else
	{	$hh=$orig_height;
		$ww=$orig_width;	
	}
$images_fin=ImageCreateTrueColor($ww,$hh);
@imagecopyresized($images_fin,$images_orig,0,0,0,0,$ww,$hh,$orig_width,$orig_height);$ext=end(explode(".",$file_name));
$newfilename=$save_filename;
$save=$save_path.$newfilename;
switch($file_type)
	{	case"image/pjpeg" :
		case"image/jpeg" :
		case"image/jpg" :
		ImageJPEG($images_fin,$save,90); // image quality=90
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
?>
