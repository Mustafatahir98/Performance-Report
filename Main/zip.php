<?php

function create_zip($zipFullPath, $zipSourcePath)
{
    $zip = new \ZipArchive();
    if ($zip->open($zipFullPath, \ZIPARCHIVE::CREATE) !== TRUE)
    {
        throw new \Exception("Cannot open <$zipFullPath>\n", 500);
    }
    foreach (glob($zipSourcePath . '\*') as $file)
    {
        $zip->addFile($file, basename($file));
    }
    $zip->close();
}

$arr = array('www.growselfgrowbusiness.com', 'www.makecustomersforlife.com', 'www.personaldrivers.com');
for ($i = 0; $i < count($arr); $i++)
{
    $zipFilePath = 'C:\xampp\htdocs\performanceReports\DailyPerformanceReports\Main\zip\\' . $arr[$i] . date('m-d-y') . '.zip';
    $sourcePath = 'C:\xampp\htdocs\performanceReports\DailyPerformanceReports\Main\logs\\' . $arr[$i];
    create_zip($zipFilePath, $sourcePath);
    echo "Created zip: $zipFilePath\n";
}

?>
