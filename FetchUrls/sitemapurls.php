<?php


$serverName = "";
$uid = "Mustafa";   
$pwd = "";  
$databaseName = "websitestat"; 

$connectionInfo = array( "UID"=>$uid,                            
                         "PWD"=>$pwd,                            
                         "Database"=>$databaseName); 

/* Connect using SQL Server Authentication. */  
$conn = sqlsrv_connect( $serverName, $connectionInfo); 
if($conn)
{
    echo "Connection Eastablished";
}

// $user_name = "bahadurbbc";
// $password = "0311bahadur";
// $host = "localhost";
// if(($conn=mysqli_connect($host, $user_name, $password)) !== false)
// {
//     echo"connection successful<br>";
// }
// if(($db = mysqli_select_db($conn,"urlinspection")) !== false)
// {
//     echo "DB Found<br>";
// }

$SQL = "truncate table suburls";

$result = sqlsrv_query($conn, $SQL);

$SQL = "SELECT * FROM sitemap";

//echo $SQL;
$result = sqlsrv_query($conn, $SQL);

while ($row = sqlsrv_fetch_array($result))
{

    $sitemap = $row['sitemapurls'];

    


    //get sitemap content
     $content = file_get_contents($row['sitemapurls']);

    // // parse the sitemap content to object
     $xml = simplexml_load_string($content);
     // retrieve properties from the sitemap object
       // print_r($xml);
    
    foreach ($xml->url as $urlElement) {
        // get properties
        $url = $urlElement->loc;
        
        $sql="INSERT INTO suburls(records,tags) VALUES('$url','autofetched')";
        if(sqlsrv_query($conn, $sql))
        {
            echo "Record Inserted Successfully";
        }
        else{
            echo "Not inserted";
        }
    }
}



?>