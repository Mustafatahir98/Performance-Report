<?php

// This is the database Write Work
$serverName = "";
$uid = "Mustafa";   
$pwd = "";  
$databaseName = "websitestat"; 

$connectionInfo = array( "UID"=>$uid,                            
                         "PWD"=>$pwd,                            
                         "Database"=>$databaseName); 

/* Connect using SQL Server Authentication. */  
$conn = sqlsrv_connect( $serverName, $connectionInfo);  

$SQL = "truncate table logsPD";

if(sqlsrv_query($conn, $SQL))
{
    echo "Query Executed";
}
?>
<h1>
	html table code for displaying
	in tabular format and store in
	database
</h1>

<table align="center" width="800"
	border="1" style=
	"border-collapse: collapse;
	border:1px solid #ddd;"
	cellpadding="5"
	cellspacing="0">

	<thead>
		<tr bgcolor="#FFCC00">
			<th>
				<center>Url_Tested</center>
			</th>
			<th>
				<center>Mobile_Diagnostics</center>
			</th>
			<th>
				<center>Desktop_Diagnostics</center>
			</th>
			<th>
				<center>MobilePerformance</center>
			</th>
			<th>
				<center>MobileAccessibility</center>
			</th>
            <th>
				<center>MobileBestPractices</center>
			</th>
			<th>
				<center>MobileSeo</center>
			</th>
			<th>
				<center>Mobile FCP</center>
			</th>
			<th>
				<center>Mobile LCP</center>
			</th>
			<th>
				<center>Mobile CLS</center>
			</th>
			<th>
				<center>Mobile TBT</center>
			</th>
			<th>
				<center>Mobile TTI</center>
			</th>
			<th>
				<center>Mobile SI</center>
			</th>
			<th>
				<center>MDOM Size</center>
			</th>
			<th>
				<center>DesktopPerformance</center>
			</th>
            <th>
				<center>DesktopAccessibility</center>
			</th>
			<th>
				<center>DesktopBestPractices</center>
			</th>
			<th>
				<center>DesktopSeo</center>
			</th>
			<th>
				<center>Desktop FCP</center>
			</th>
			<th>
				<center>Desktop LCP</center>
			</th>
			<th>
				<center>Desktop CLS</center>
			</th>
			<th>
				<center>Desktop TBT</center>
			</th>
			<th>
				<center>Desktop TTI</center>
			</th>
			<th>
				<center>Desktop SI</center>
			</th>
			<th>
				<center>DDOM Size</center>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php

		// Get csv file
		if(($handle = fopen("C:/xampp/htdocs/performanceReports/DailyPerformanceReports/Main/lhreport.csv", "r")) !== FALSE) {
			$n = 1;
			while(($row = fgetcsv($handle)) !== FALSE) {

				// SQL query to store data in
				// database our table name is
				// table2
				$SQL = "INSERT INTO logsPD (Url_Tested, Mobile_Diagnostics, Desktop_Diagnostics, MobilePerformance, MobileAccessibility, MobileBestPractices, MobileSeo, M_FCP, M_LCP, M_CLS, M_TBT, M_TTI, M_SI, MDOM_Size, DesktopPerformance, DesktopAccessibility, DesktopBestPractices, DesktopSeo, D_FCP, D_LCP, D_CLS, D_TBT, D_TTI, D_SI, DDOM_Size)
				VALUES ('$row[1]', '$row[24]', '$row[25]', ".$row[2].", ".$row[3].", ".$row[4].", ".$row[5].", '$row[6]', '$row[7]', '$row[8]', '$row[9]', '$row[10]', '$row[11]', ".$row[12].", ".$row[13].", ".$row[14].", ".$row[15].", ".$row[16].", '$row[17]', '$row[18]', '$row[19]', '$row[20]', '$row[21]', '$row[22]', '$row[23]')";

                if(sqlsrv_query($conn, $SQL))
                {
                    echo "Query Executed";
                }

				if($n > 1) {
				?>
				<tr>
					<td>
						<center>
							<?php echo $row[1]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[24]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[25]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[2]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[3]; ?>
						</center>
					</td>
                    <td>
						<center>
							<?php echo $row[4]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[5]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[6]; ?>
						</center>
					</td>
                    <td>
						<center>
							<?php echo $row[7]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[8]; ?>
						</center>
					</td>
					<td>
						<center>
							 <?php echo $row[9]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[10]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[11]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[12]; ?>
						</center>
					</td>
                    <td>
						<center>
							<?php echo $row[13]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[14]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[15]; ?>
						</center>
					</td>
                    <td>
						<center>
							<?php echo $row[16]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[17]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[18]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[19]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[20]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[21]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[22]; ?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[23]; ?>
						</center>
					</td>
				</tr>
					<?php
				}

				$n++;
			}

			fclose($handle);
		}
	?>
	</tbody>
</table>
<?php
echo json_encode(['status' => 'success', 'message' => 'Query Executed']);
?>
