<?php
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');

$pathData="reports/DATA";

$arraySectionsSts=$_GET['arr'];

$nameSecList=array();
$nameFiles=array();

// echo gettype ( $arraySectionsSts);
$arraySections = explode(",", $arraySectionsSts);
if (is_dir($pathData))
{
    dirDel($pathData);
}
mkdir($pathData, 0777, true);

//массив с названием всех секций
$nameSecList=Base::select("SELECT id_sectionName, name_sectionName FROM sectionsName"); 

//массив со всеми докладами
$nameFiles=Base::select("SELECT id_sections, reportFilePDF, reportFileDOC FROM reports WHERE  id_sections IN ($arraySectionsSts) and del=0 ORDER BY id_sections ASC ");

//цикл создания папок
foreach ($arraySections as $idS) {
    $nameSec=$nameSecList[$idS-1]['name_sectionName'];
    mkdir($pathData."/".$nameSec, 0777, true);
}


foreach ($nameFiles as $nF) {
    // print_r($nF);
    $curFol="reports/".$nameSecList[$nF[id_sections]-1]['name_sectionName']."/";
    // echo $curFol.'<br>';
    if (file_exists($curFol.$nF['reportFilePDF'])) {
        copy($curFol.$nF['reportFilePDF'], 'reports/DATA/'.$nameSecList[$nF[id_sections]-1]['name_sectionName'].'/'.$nF['reportFilePDF']);
    }
    if (file_exists($curFol.$nF['reportFileDOC'])) {
        copy($curFol.$nF['reportFileDOC'], 'reports/DATA/'.$nameSecList[$nF[id_sections]-1]['name_sectionName'].'/'.$nF['reportFileDOC']);
    }
}

$path = pathinfo(__FILE__,PATHINFO_DIRNAME).'/';
$zip_name = $path.'reports/zip1.zip';
Zip($path.'reports/DATA/', $path.'reports/zip1.zip');

if(file_exists($path.'reports/zip1.zip'))
{
    $zipName="Archive-".time().".zip";
    header('Content-type: application/zip');
    header('Content-Disposition: attachment; filename="'.$zipName.'"');

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