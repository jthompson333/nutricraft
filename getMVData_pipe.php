<?php

//This will not work... I don't understand how to make the in file and out file pipes instead of txt files.

error_reporting(E_ALL);

//Setup the params and user data to pass to QM.
$QMSubName   = "GRAB.CUST.DATA";
$user_input  = $_REQUEST['custid'];
//$user_input = '1';
//
$qm_acct_path = '/qmdata/accts/TEST';
$server       = $_SERVER['REMOTE_ADDR'];

//$QM_params_data = array();
//$QM_params_data['qm_acct_path'] = '/qmdata/accts/TEST';
//$QM_params_data['qm_cmd']       = $QMSubName;
//$QM_params_data['user_input']   = $user_input;

////Safe way of extracting info from an associative array.
//function rowValue($row,$key,$default = "")
//{
//	return(isset($row[$key]) ? $row[$key] : $default);
//}

if(chdir($qm_acct_path))
{
    $dir_pipe_path = '/qmdata/pipes';
    $fileName = 'QMWEB_' . $server . '_' . time();           
    $inFile   = $dir_pipe_path . '/' . $fileName . '.in';
    $outFile  = $dir_pipe_path . '/' . $fileName . '.out';
    
    $mode = 0774;
    posix_mkfifo($inFile, $mode);  //Make the in pipe
    posix_mkfifo($outFile, $mode); //Make the out pipe
    chmod($inFile,0774);
    chmod($outFile,0774);
    
//Apparently this not only tests to see if the file is there, but, it also writes the file out?               
if(file_put_contents($inFile,$user_input,LOCK_EX) !== false)
{
    putenv('QM_WEB_SUBNAME=' . $QMSubName);
    putenv('QM_WEBWINDOW_FILE=' . $fileName);
    exec("/usr/qmsys/bin/qm WEB.CALLER.PIPE");			

    $result = file_get_contents($outFile);
    echo $result;
    //unlink($inFile);
    //unlink($outFile);
}
else
{
    $error = array('error' => 'Unable to connect to the server at this time.');
    echo json_encode($error);
}
}
else
{
    $error = array('error' => 'Unable to connect to the server at this time.');
    echo json_encode($error);
}


?>