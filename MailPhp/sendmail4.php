<?php

function getm_fcpcolor($number)
{  
    if($number >= 0 && $number <= 1.8)
    {    
    return '#63BE7B';
    }
    if($number > 1.8 && $number <= 3)
    {    
    return '#FFB305';
    }
    if($number > 3)
    {    
    return '#F8766D';
    }
}

function getd_fcpcolor($number)
{   //echo $number."<br>";
    if($number >= 0 && $number <= 0.9)
    {    
    return '#63BE7B';
    }
    if($number > 0.9 && $number <= 1.6)
    {    
    return '#FFB305';
    }
    if($number > 1.6)
    {    
    return '#F8766D';
    }
}



function getd_sicolor($number)
{   //echo $number."<br>";
    if($number >= 0 && $number <= 1.0)
    {    
    return '#63BE7B';
    }
    if($number > 1.0 && $number <= 3.5)
    {    
    return '#FFB305';
    }
    if($number > 3.5)
    {    
    return '#F8766D';
    }
}

function getm_sicolor($number)
{   //echo $number."<br>";
    if($number >= 0 && $number <= 1.0)
    {    
    return '#63BE7B';
    }
    if($number > 1.0 && $number <= 1.5)
    {    
    return '#FFB305';
    }
    if($number > 1.5)
    {    
    return '#F8766D';
    }
}


function getm_Lcpcolor($number)
{   //echo $number."<br>";
    if($number >= 0 && $number <= 2.5)
    {    
    return '#63BE7B';
    }
    if($number > 2.5 && $number <= 4)
    {    
    return '#FFB305';
    }
    if($number > 4)
    {    
    return '#F8766D';
    }
}

function getd_Lcpcolor($number)
{   //echo $number."<br>";
    if($number >= 0 && $number <= 1.2)
    {    
    return '#63BE7B';
    }
    if($number > 1.2 && $number <= 2.4)
    {    
    return '#FFB305';
    }
    if($number > 2.4)
    {    
    return '#F8766D';
    }
}



function getm_tticolor($number)
{   //echo $number."<br>";
    if($number >= 0 && $number <= 3.8)
    {    
    return '#63BE7B';
    }
    if($number > 3.8 && $number <= 7.3)
    {    
    return '#FFB305';
    }
    if($number > 7.3)
    {    
    return '#F8766D';
    }
}

function getd_tticolor($number)
{   //echo $number."<br>";
    if($number >= 0 && $number <= 2.5)
    {    
    return '#63BE7B';
    }
    if($number > 2.5 && $number <= 4.5)
    {    
    return '#FFB305';
    }
    if($number > 4.5)
    {    
    return '#F8766D';
    }
}


function getm_tbtcolor($number)
{   //echo $number."<br>";
    if($number >= 0 && $number <= 200)
    {    
    return '#63BE7B';
    }
    if($number > 200 && $number <= 600)
    {    
    return '#FFB305';
    }
    if($number > 600)
    {    
    return '#F8766D';
    }
}

function getd_tbtcolor($number)
{   //echo $number."<br>";
    if($number >= 0 && $number <= 150)
    {    
    return '#63BE7B';
    }
    if($number > 150 && $number <= 350)
    {    
    return '#FFB305';
    }
    if($number > 350)
    {    
    return '#F8766D';
    }
}




function get_clscolor($number)
{   //echo $number."<br>";
    if($number >= 0 && $number <= 0.10)
    {    
    return '#63BE7B';
    }
    if($number > 0.10 && $number <= 0.25)
    {    
    return '#FFB305';
    }
    if($number > 0.25)
    {    
    return '#F8766D';
    }
}


function getProperColor($number)
{   //echo $number."<br>";
    if($number == 85)
    {    
    return '#F8766D';
    }   
    elseif($number == 86)
    {
        return '#F98370';
    }
    elseif($number == 87)
    {
        return '#FA9072';
    }
    elseif($number == 88)
    {
        return '#FA9D75';
    }
    elseif($number == 89)
    {
        return '#FBAA77';
    }
    elseif($number == 90)
    {
        return '#FDB77B';
    }
    elseif($number == 91)
    {
        return '#FCC47C';
    }
    elseif($number == 92)
    {
        return '#FDD27F';
    }
    elseif($number == 93)
    {
        return '#FEDE81';
    }
    elseif($number == 94)
    {
        return '#FFEB84';
    }
    elseif($number == 95)
    {
        return '#E5E484';
    }
    elseif($number == 96)
    {
        return '#CCDD82';	
    }
    elseif($number == 97)
    {
        return '#B1D580';
    }
    elseif($number == 98)
    {
        return '#98CE7F';
    }
    elseif($number == 99)
    {
        return '#7EC77C';
    }
    elseif($number == 100)
    {
        return '#63BE7B';
    }
    else
    {
        return '#F8696B';
    }
    

    
}



function getProperColor2($number)
{   //echo $number."<br>";
    if($number == 80)
    {    
    return '#F8766D';
    }   
    elseif($number == 81)
    {
        return '#F98370';
    }
    elseif($number == 82)
    {
        return '#FA9072';
    }
    elseif($number == 83)
    {
        return '#FA9D75';
    }
    elseif($number == 84)
    {
        return '#FBAA77';
    }
    elseif($number == 85)
    {
        return '#FDB77B';
    }
    elseif($number == 86)
    {
        return '#FCC47C';
    }
    elseif($number == 87)
    {
        return '#FDD27F';
    }
    elseif($number == 88)
    {
        return '#FEDE81';
    }
    elseif($number == 89)
    {
        return '#FFEB84';
    }
    elseif($number == 90)
    {
        return '#E5E484';
    }
    elseif($number == 91)
    {
        return '#CCDD82';	
    }
    elseif($number == 92)
    {
        return '#B1D580';
    }
    elseif($number == 93)
    {
        return '#98CE7F';
    }
    elseif($number == 94)
    {
        return '#7EC77C';
    }
    elseif($number >= 95)
    {
        return '#63BE7B';
    }
    else
    {
        return '#F8696B';
    }
    

    
}
function getm_mdomcolor($number)
{   //echo $number."<br>";
    if($number >= 0 && $number <= 799)
    {    
    return '#63BE7B';
    }
    if($number >= 800 && $number <= 1400)
    {    
    return '#FFB305';
    }
    if($number > 1400)
    {    
    return '#F8766D';
    }
}
function getd_ddomcolor($number)
{   //echo $number."<br>";
    if($number >= 0 && $number <= 820)
    {    
    return '#63BE7B';
    }
    if($number > 820 && $number <= 1400)
    {    
    return '#FFB305';
    }
    if($number > 1400)
    {    
    return '#F8766D';
    }
}

function getMobileDiagnosticsColor($status) {
    if ($status === 'Issue') {
        return '#F8766D'; // Red color for issues
    } elseif ($status === 'Fixed') {
        return '#63BE7B'; // Green color for fixed
    } else {
        return '#FFFFFF'; // Default to white if the status is unknown
    }
}

function getDesktopDiagnosticsColor($status) {
    if ($status === 'Issue') {
        return '#F8766D'; // Red color for issues
    } elseif ($status === 'Fixed') {
        return '#63BE7B'; // Green color for fixed
    } else {
        return '#FFFFFF'; // Default to white if the status is unknown
    }
}




function urlsfun($str)
    {
        $serverName = "DELAWALLADESK07\SQLEXPRESS";
        $uid = "Mustafa";   
        $pwd = "123";  
        $databaseName = "websitestat"; 
        
        $connectionInfo = array( "UID"=>$uid,                            
                                 "PWD"=>$pwd,                            
                                 "Database"=>$databaseName); 
        
        /* Connect using SQL Server Authentication. */  
        $conn = sqlsrv_connect( $serverName, $connectionInfo);  
        
        
            $inner_sql = "SELECT * FROM logsPD  WHERE Url_Tested LIKE '%{$str}%'";
            $query2 = sqlsrv_query($conn, $inner_sql);
        
     

            $urls = "";
            $urls .= "<table cellspacing='0' border='1' style='border-color:#666666;text-align:center; postion:sticky;'>";
            $urls .= "<tr>";
                $urls .= "<th style='padding:15px'>Tested Url</th>";
                $urls .= "<th style='padding:15px'>Mobile Diagnostics</th>";
                $urls .= "<th style='padding:15px'>Desktop Diagnostics</th>";
                $urls .= "<th style='padding:15px'>Mobile Performance</th>";
                $urls .= "<th style='padding:15px'>Mobile Accessibility</th>";
                $urls .= "<th style='padding:15px'>Mobile Best Practices</th>";
                $urls .= "<th style='padding:15px'>Mobile Seo</th>";
                $urls .= "<th style='padding:15px'>Mobile FCP</th>";
                $urls .= "<th style='padding:15px'>Mobile LCP</th>";
                $urls .= "<th style='padding:15px'>Mobile CLS</th>";
                $urls .= "<th style='padding:15px'>Mobile TBT</th>";
                $urls .= "<th style='padding:15px'>Mobile TTI</th>";
                $urls .= "<th style='padding:15px'>Mobile SI</th>";
				$urls .= "<th style='padding:15px'>Mobile DOM</th>";
                $urls .= "<th style='padding:15px'>Desktop Performance</th>";
                $urls .= "<th style='padding:15px'>Desktop Accessibility</th>";
                $urls .= "<th style='padding:15px'>Desktop Best Practices</th>";
                $urls .= "<th style='padding:15px'>Desktop Seo</th>";
                $urls .= "<th style='padding:15px'>Desktop FCP</th>";
                $urls .= "<th style='padding:15px'>Desktop LCP</th>";
                $urls .= "<th style='padding:15px'>Desktop CLS</th>";
                $urls .= "<th style='padding:15px'>Desktop TBT</th>";
                $urls .= "<th style='padding:15px'>Desktop TTI</th>";
                $urls .= "<th style='padding:15px'>Desktop SI</th>";
				$urls .= "<th style='padding:15px'>Desktop DOM</th>";
               
             
    
            $urls .= "</tr>";
    
            while ($row2 = sqlsrv_fetch_array($query2))
            {                
               $urls .= "<tr>";
                   $urls .= "<td style='padding:15px'>".$row2['Url_Tested']."</td>";
      
                       //$color = getProperColor($row2['MobilePerformance']);
                       $urls .= "<td style='padding:15px;background-color:".getMobileDiagnosticsColor($row2['Mobile_Diagnostics'])."'>".$row2['Mobile_Diagnostics']."</td>";

                       $urls .= "<td style='padding:15px;background-color:".getDesktopDiagnosticsColor($row2['Desktop_Diagnostics'])."'>".$row2['Desktop_Diagnostics']."</td>";
           
                       $urls .= "<td style='padding:15px;background-color:".getProperColor2($row2['MobilePerformance'])."'>".$row2['MobilePerformance']."</td>";
               
                       $urls .= "<td style='padding:15px;background-color:".getProperColor($row2['MobileAccessibility'])."'>".$row2['MobileAccessibility']."</td>";
                   
                       $urls .= "<td style='padding:15px;background-color:".getProperColor($row2['MobileBestPractices'])."'>".$row2['MobileBestPractices']."</td>";
                  
                       $urls .= "<td style='padding:15px;background-color:".getProperColor2($row2['MobileSeo'])."'>".$row2['MobileSeo']."</td>";
    
                       $urls .= "<td style='padding:15px;background-color:".getm_fcpcolor((float)preg_replace('/[^0-9\.]/ui','',$row2['M_FCP']))."'>".$row2['M_FCP']."</td>";
    
                       $urls .= "<td style='padding:15px;background-color:".getm_Lcpcolor((float)preg_replace('/[^0-9\.]/ui','',$row2['M_LCP']))."'>".$row2['M_LCP']."</td>";
    
                       $urls .= "<td style='padding:15px;background-color:".get_clscolor((float)preg_replace('/[^0-9\.]/ui','',$row2['M_CLS']))."'>".$row2['M_CLS']."</td>";
    
                       $urls .= "<td style='padding:15px;background-color:".getm_tbtcolor((float)preg_replace('/[^0-9\.]/ui','',$row2['M_TBT']))."'>".$row2['M_TBT']."</td>";
    
                       $urls .= "<td style='padding:15px;background-color:".getm_tticolor((float)preg_replace('/[^0-9\.]/ui','',$row2['M_TTI']))."'>".$row2['M_TTI']."</td>";
    
                       $urls .= "<td style='padding:15px;background-color:".getm_sicolor((float)preg_replace('/[^0-9\.]/ui','',$row2['M_SI']))."'>".$row2['M_SI']."</td>";
					   
					    $urls .= "<td style='padding:15px;background-color:".getm_mdomcolor($row2['MDOM_Size'])."'>".$row2['MDOM_Size']."</td>";

                   
                       $urls .= "<td style='padding:15px;background-color:".getProperColor2($row2['DesktopPerformance'])."'>".$row2['DesktopPerformance']."</td>";
                   
                       $urls .= "<td style='padding:15px;background-color:".getProperColor($row2['DesktopAccessibility'])."'>".$row2['DesktopAccessibility']."</td>";
                   
                       $urls .= "<td style='padding:15px;background-color:".getProperColor($row2['DesktopBestPractices'])."'>".$row2['DesktopBestPractices']."</td>";
                  
                       $urls .= "<td style='padding:15px;background-color:".getProperColor2($row2['DesktopSeo'])."'>".$row2['DesktopSeo']."</td>";
                   
                       $urls .= "<td style='padding:15px;background-color:".getd_fcpcolor((float)preg_replace('/[^0-9\.]/ui','',$row2['D_FCP']))."'>".$row2['D_FCP']."</td>";
    
                       $urls .= "<td style='padding:15px;background-color:".getd_Lcpcolor((float)preg_replace('/[^0-9\.]/ui','',$row2['D_LCP']))."'>".$row2['D_LCP']."</td>";
    
                       $urls .= "<td style='padding:15px;background-color:".get_clscolor((float)preg_replace('/[^0-9\.]/ui','',$row2['D_CLS']))."'>".$row2['D_CLS']."</td>";
    
                       $urls .= "<td style='padding:15px;background-color:".getd_tbtcolor((float)preg_replace('/[^0-9\.]/ui','',$row2['D_TBT']))."'>".$row2['D_TBT']."</td>";
    
                       $urls .= "<td style='padding:15px;background-color:".getd_tticolor((float)preg_replace('/[^0-9\.]/ui','',$row2['D_TTI']))."'>".$row2['D_TTI']."</td>";
    
                       $urls .= "<td style='padding:15px;background-color:".getd_sicolor((float)preg_replace('/[^0-9\.]/ui','',$row2['D_SI']))."'>".$row2['D_SI']."</td>";
					   
					    $urls .= "<td style='padding:15px;background-color:".getd_ddomcolor($row2['DDOM_Size'])."'>".$row2['DDOM_Size']."</td>";

                      
    
                    
               $urls .= "</tr>";
           }
           $urls .="</table>";
    
            return $urls;
    }



    

require 'PHPMailerAutoload.php';

$serverName = "";
$uid = "Mustafa";   
$pwd = "";  
$databaseName = "websitestat"; 

$connectionInfo = array( "UID"=>$uid,                            
                         "PWD"=>$pwd,                            
                         "Database"=>$databaseName); 

/* Connect using SQL Server Authentication. */  
$conn = sqlsrv_connect( $serverName, $connectionInfo);  


$sql1="SELECT distinct LEFT(SUBSTRING(Url_Tested, 
(CASE WHEN CHARINDEX('//',Url_Tested)=0 
     THEN 5 
     ELSE  CHARINDEX('//',Url_Tested) + 2
     END), 35),
(CASE 
WHEN CHARINDEX('/', SUBSTRING(Url_Tested, CHARINDEX('//', Url_Tested) + 2, 35))=0 
THEN LEN(Url_Tested) 
else CHARINDEX('/', SUBSTRING(Url_Tested, CHARINDEX('//', Url_Tested) + 2, 35))- 1
END)
) AS 'Domain' from logsPD";

$query = sqlsrv_query($conn, $sql1);

while ($row1 = sqlsrv_fetch_array($query))
    {

        $sql2 = "SELECT * FROM logsPD WHERE Url_Tested LIKE '%{$row1['Domain']}%'";
        $result3 = sqlsrv_query($conn,$sql2);
    
    
    $filename2 = $row1['Domain'].date("m-d-y").'.csv';
    $filename3 = str_replace("www.",'',$row1['Domain']).date("m-d-y").'.zip';
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename='.$filename2);
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
    
    $csvoutput = fopen('C:\xampp\htdocs\performanceReports\DailyPerformanceReports\MailPhp\csvfiles3\\'.$filename2, 'w');
   
    // Set column headers 
    $fields = array('Url Tested', 'Mobile_Diagnostics', 'Desktop_Diagnostics','Mobile Performance','Mobile Accessibility','Mobile Best Practices','Mobile Seo','M FCP','M LCP','M CLS','M TBT','M TTI','M SI', 'MDOM_Size', 'Desktop Performance','Desktop Accessibility','Desktop Best Practices','Desktop Seo','D FCP','D LCP','D CLS','D TBT','D TTI','D SI','DDOM_Size','Date & Time');  
    fputcsv($csvoutput, $fields); 
    
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = sqlsrv_fetch_array($result3))
    { 
        $lineData = array($row['Url_Tested'],  $row['Mobile_Diagnostics'],  $row['Desktop_Diagnostics'], $row['MobilePerformance'], $row['MobileAccessibility'], $row['MobileBestPractices'], $row['MobileSeo'], $row['M_FCP'], $row['M_LCP'], $row['M_CLS'], $row['M_TBT'], $row['M_TTI'], $row['M_SI'] , $row['MDOM_Size']  , $row['DesktopPerformance'], $row['DesktopAccessibility'],$row['DesktopBestPractices'],$row['DesktopSeo'], $row['D_FCP'], $row['D_LCP'], $row['D_CLS'], $row['M_TBT'], $row['M_TTI'], $row['M_SI'], $row['DDOM_Size'] ,  $row['CreatedOn']->format('m/d/Y')); 
        fputcsv($csvoutput, $lineData); 
    } 


    fclose($csvoutput);
        
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host       = "smtp-mail.outlook.com";
        $mail->Port       = 587;
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "tls";
        $mail->Username   = '';
        $mail->Password   = '';
        $mail->setFrom('', '');
        
        
        $mail->addAddress('mustafa@delawallabiz.com', 'Mustafa');
		
        


if ((strpos($row1['Domain'], 'www.personaldrivers.com') !== false) || 
(strpos($row1['Domain'], 'www.makecustomersforlife.com') !== false) || 
(strpos($row1['Domain'], 'www.growselfgrowbusiness.com') !== false)) {
    
$mail->AddAttachment('C:\xampp\htdocs\performanceReports\DailyPerformanceReports\MailPhp\csvfiles3\\'.$filename2, $filename2);
 $mail->AddAttachment('C:\xampp\htdocs\performanceReports\DailyPerformanceReports\Main\zip\\www.'.$filename3, $filename3);
} else {
echo 'error';
}



        $mail->isHTML(true);
        $mail->WordWrap = 50;
        $mail->Subject    = "Daily(SERVER) Performance Report of ".$row1['Domain'];
        $mail->Body       = urlsfun($row1['Domain']);
        
        if($mail->Send())
        {
            echo "Message has been sent<br>";
        }
        else
        {
            echo "Error";
        }

    }

?>