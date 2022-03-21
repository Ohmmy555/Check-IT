<?php $file=$_FILES['meetfile'];
	$filename=$_FILES["meetfile"]["name"];
	$filTmpename= $_FILES["meetfile"]["tmp_name"];
	$fileExt= explode(".",$filename);
	$fileAcExt= strtolower(end($fileExt));
	$newFilename= time() . "." . $fileAcExt;
	$fileDes= 'upload_img/'.$newFilename;
	move_uploaded_file($filTmpename,$fileDes);
	$meetfilelocation=$fileDes;?>