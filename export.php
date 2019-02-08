<?php
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');

$pathData="reports/DATA";
$arraySections=$_POST['arrIDsS'];
if (is_dir($pathData))
{
    dirDel($pathData);
    mkdir($pathData, 0777, true);
}
foreach ($arraySections as $idS) {
    $nameSec=Base::select("SELECT name_sectionName FROM sectionsName WHERE id_sectionName = '$idS'"); 
    mkdir($pathData."/".$nameSec[0]['name_sectionName'], 0777, true);
    $nameFiles=Base::select("SELECT reportFilePDF, reportFileDOC FROM reports WHERE  id_sections = '$idS'");
    foreach ($nameFiles as $k => $curRep) {
        $curFol="reports/".$nameSec[0]['name_sectionName']."/";
        // echo $curFol.$nameFiles[$k]['reportFilePDF'];
        if (file_exists($curFol.$nameFiles[$k]['reportFilePDF'])) {
            copy($curFol.$nameFiles[$k]['reportFilePDF'], 'reports/DATA/'.$nameSec[0]['name_sectionName'].'/'.$nameFiles[$k]['reportFilePDF']);
        }
        if (file_exists($curFol.$nameFiles[$k]['reportFileDOC'])) {
            copy($curFol.$nameFiles[$k]['reportFileDOC'], 'reports/DATA/'.$nameSec[0]['name_sectionName'].'/'.$nameFiles[$k]['reportFileDOC']);
        }
    }
}

$path = pathinfo(__FILE__,PATHINFO_DIRNAME).'/';
$zip_name = $path.'reports/zip1.zip';
Zip($path.'reports/DATA/', $path.'reports/zip1.zip');

if(file_exists($path.'reports/zip1.zip'))
{
    header('Content-type: application/zip');
    header('Content-Disposition: attachment; filename="'.$zip_name.'"');

    readfile($zip_name);
    unlink($zip_name);
}




function Zip($source, $destination){
  if (!extension_loaded('zip')) {
    return false;
  }
 
  $zip = new ZipArchive();
  if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
    return false;
  }
 
  $source = str_replace('\\', '/', realpath($source));
 
  if (is_dir($source) === true){
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
 
    foreach ($files as $file){
        $file = str_replace('\\', '/', $file);
 
        // Ignore "." and ".." folders
        if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
            continue;
 
        $file = realpath($file);
        $file = str_replace('\\', '/', $file);
         
        if (is_dir($file) === true){
            $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
        }else if (is_file($file) === true){
            $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
        }
    }
  }else if (is_file($source) === true){
    $zip->addFromString(basename($source), file_get_contents($source));
  }
  return $zip->close();
}
      


//Ф-я удаления вложенности в папке
function dirDel ($dir)
{
    $d=opendir($dir);
    while(($entry=readdir($d))!==false)
    {
        if ($entry != "." && $entry != "..")
        {
            if (is_dir($dir."/".$entry))
            {
                dirDel($dir."/".$entry);
            }
            else
            {
                unlink ($dir."/".$entry);
            }
        }
    }
    closedir($d);
    rmdir ($dir);
}
?>