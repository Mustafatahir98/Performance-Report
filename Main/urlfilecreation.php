<?php

$serverName = "DELAWALLADESK07\SQLEXPRESS";
$uid = "Mustafa";   
$pwd = "123";  
$databaseName = "websitestat"; 

$connectionInfo = array( "UID"=>$uid,                            
                         "PWD"=>$pwd,                            
                         "Database"=>$databaseName); 

        $conn = sqlsrv_connect( $serverName, $connectionInfo);  

        $sql2 = "SELECT * FROM suburls";
        $result3 = sqlsrv_query($conn,$sql2);
    
    
    $filename2 = 'urls.csv';
    // force download csv - exports HTML to CSV!
    header("Content-type: application/force-download"); 
    header('Content-Disposition: inline; filename="'.$filename2.'"'); 
    header("Content-Transfer-Encoding: Binary"); 
   // header("Content-length: ". filesize($filename2)); 
    header('Content-Type: application/excel'); 
    header('Content-Disposition: attachment; filename="'.$filename2.'"');


    $csvoutput = fopen('C:\xampp\htdocs\performanceReports\DailyPerformanceReports\Main/'.$filename2, 'w');
   
    // Set column headers     
    // Output each row of the data, format line as csv and write to file pointer
    
    while($row = sqlsrv_fetch_array($result3))
    { 
        $lineData = array($row['records']); 
        fputcsv($csvoutput, $lineData);
    } 

    $stat = fstat($csvoutput);
    ftruncate($csvoutput, $stat['size']-1);



    fclose($csvoutput);

?>