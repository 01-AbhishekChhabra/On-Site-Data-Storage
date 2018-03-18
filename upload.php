<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';
include_once 'UserSign.php';


if(isset($_SESSION['userData']))
{
	;
}
$user = new User();

$userData = $user->checkUser($_SESSION['userData']);

$name = '' . $userData['first_name'].' '.$userData['last_name'];
$email = '' . $userData['email'];
$picture = '<img class="circle" src="'.$userData['picture'].'" alt="7" width=175px>';
$google_id = '' . $userData['oauth_uid'];


if(!empty($_FILES['files']['name'][0]))
{

	$files = $_FILES['files'];

	$uploaded = array();
	$failed = array();
	$file_sizes = array();

	$allowed = array('jpg','png','gif','txt','doc','rar','exe','pdf');

	foreach($files['name'] as $position => $file_name)
	{

		$file_tmp = $files['tmp_name'][$position];
		$file_size =$files['size'][$position];
		$file_error = $files['error'][$position];

		$file_ext = explode('.',$file_name);
		$file_ext = strtolower(end($file_ext));
		
		if(in_array($file_ext,$allowed))
		{
				if($file_error === 0 )
				{
					if($file_size <= 2097152)
					{
						$file_name_new = uniqid('',true).'.'.$file_ext;
						$file_destination='uploads/'.$file_name_new;

						if(move_uploaded_file($file_tmp, $file_destination))
						{
							$uploaded[$position] = $file_destination;
							$file_sizes[$position] = $file_size ;
						}
						else
						{
							$failed[$position] = "[{$file_name}] failed too upload";
						}
					}
					else
					{
						$failed[$position] = "[{$file_name}] is too large";
					}
				}
				else
				{
					$failed[$position] = "[{$file_name}] errored with code";
				}
		}
		else
		{
			$failed[$position] = "[$file_name] file extension '{$file_ext}' is not allowed.";

		}

	}
	//Uploaded Files
	if(!empty($uploaded))
	{
		$sizeU=sizeof($uploaded);
		echo 'Uploaded Files are ','<br />';
		for($i=0;$i<$sizeU;++$i)
		{
			echo '<pre>', $uploaded[$i],'</pre>','<br />';
			$user->storeUserFiles($uploaded[$i],$file_sizes[$i],$google_id);
		}
	}
	if(!empty($failed))
	{
		print_r($failed);
	}
	}

	header('Location: upload3.php');
?>