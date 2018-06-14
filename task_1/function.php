<?php

function getListOfFile($dir)
{
	if(permissionValidator($dir))
	{
		return $result = glob($dir . '*.*');
	}
	echo glob($dir . '*.*');
}

function uploadFile($uploadPath)
{   
	if(permissionValidator($uploadPath))
	{   
		$uploadfile = $uploadPath . basename($_FILES['userfile']['name']);
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
		{
		    return $uploadfile;
		}
	}
	else
	{
        return false;
 	}
}

function removeFile($fileName)
{   
	if(file_exists($fileName))
	{
		if(permissionValidator($fileName))
		{	
			$result = unlink($fileName);
			if($result) 
			{
 		   		return true; 
			}
		}
		else
    	{
	    	return false;
    	}
	}	
	
}

function getSizeOfFile($dir)
{
	if(permissionValidator($dir))
	{
	$nameOfDir = $dir;
	$result = glob($nameOfDir.'*.*');

	foreach ($result as $key)
    {
		$fileSize[] = (filesize($key) . "\n");
	}
  	return $fileSize;
	}
}

function sizeConverter($size)
{
	if($size >= 1024 && $size < 1024 * 1024)
	{
		$size = round($size / 1024, 2) . ' KB';

	}
	elseif ($size >= 1024 * 1024)
	{
		$size = round($size / 1024 / 1024, 1) . ' MB';
	}
	else
	{
		$size = $size . ' B';
	}
	return $size;
}

function permissionValidator($path)
{
	if("0777" === substr(sprintf("%o",fileperms($path)),-4))
	{
  	return true;
    }
	else
    {
  	return false;
    }
}
?>
