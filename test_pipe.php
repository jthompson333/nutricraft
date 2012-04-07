<?php

error_reporting(E_ALL);

    $inFile  = '/qmdata/pipes/testin.in';
    $outFile = '/qmdata/pipes/testout.out';

    $mode = 0777;
    posix_mkfifo($inFile, $mode);  //Make the in pipe
    posix_mkfifo($outFile, $mode); //Make the out pipe
    

    echo 'Pipes created' . '<br>';
    
    
    chmod($inFile,0777);
    chmod($outFile,0777);
    
    echo 'Permissions changed hopefully' . '<br>';
    
    $user_input = 'This is some test input data.';
    $inPipe = fopen($inFile, 'r+');
    fwrite($inPipe, $user_input);
    fclose($inPipe);
    
    echo 'Data written to in pipe I hope.' . '<br>';
    
    
    $inPipe = fopen($inFile, 'r+');

    $pipesize = stat($inPipe);
    $result = fread($inPipe, 4096);
    fclose($inPipe);
    echo $result;
    

?>