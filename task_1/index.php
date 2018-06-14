<?php

require 'config.php';
require 'function.php';

if(isset($_FILES['userfile']))
{
  $errors = array();
  $message = '';
  $file_name = $_FILES['userfile']['name'];

if($_FILES['userfile']['error'] > 0)
{
  switch ($_FILES['userfile']['error'])
  {
  	case 1:
      $errors[] = ERR_INI_SIZE;
      break;
  	case 2:
      $errors[] = ERR_FORM_SIZE;
      break;
  	case 3:
      $errors[] = ERR_PARTIAL;
      break;
  	case 4:
      $errors[] = ERR_NO_FILE;
      break;
  	case 6:
      $errors[] = ERR_NO_TMP_DIR;
      break;
  	default:
    	$errors[] = 'Unknown errors.';
  }
}

if(file_exists(UPLOADDIR . $file_name))
{
    $errors[] = 'The file already exists.';
}

if(empty($errors))
{
	$uploadfile = uploadFile(UPLOADDIR);
	if($uploadfile)
	{
  	chmod($uploadfile, 0777);
  	$message = "Success. " . basename($uploadfile) . " has been uploaded.";
	} 
	else
	{
  		$errors[] = "Permission denied.";
	}
}
}

if(isset($_POST["fname"]))
{
	$fname = $_POST["fname"];
	if(removeFile($fname))
    {
		$message = "Success. The file deleted.";
	} 
	else
   	{
		$errors[] = "You don't have permission to delete this file or file not found.";
	}
}
include 'tmpl/indexTmp.php';
?>
