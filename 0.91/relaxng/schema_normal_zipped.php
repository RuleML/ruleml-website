<?php $zip = new ZipArchive();
$zipname = "../relaxng/ruleml0-91_normal_rnc.zip";

if ($zip->open($zipname, ZIPARCHIVE::OVERWRITE)!==TRUE) {
    exit("cannot open <$zipname>\n");
}
$zip->addFromString("README.txt", "Downloaded from http://www.ruleml.org/0.91/relaxng");
addNormalRNCSchema("bindatagroundfact", $zip);
addNormalRNCSchema("bindatagroundlog", $zip);
addNormalRNCSchema("bindatalog", $zip);
addNormalRNCSchema("datalog", $zip);
addNormalRNCSchema("dishornlog", $zip);
addNormalRNCSchema("folog", $zip);
addNormalRNCSchema("fologeq", $zip);
addNormalRNCSchema("hornlog", $zip);
addNormalRNCSchema("hornlogeq", $zip);
addNormalRNCSchema("nafdatalog", $zip);
addNormalRNCSchema("naffolog", $zip);
addNormalRNCSchema("naffologeq", $zip);
addNormalRNCSchema("nafhornlog", $zip);
addNormalRNCSchema("nafnegdatalog", $zip);
addNormalRNCSchema("negdatalog", $zip);
addModules($zip);
//echo "numfiles: " . $zip->numFiles . "<br/>\n";
//echo "status:" . $zip->status . "<br/>\n";
$zip->close();

header('Content-Description: File Transfer');
    header('Content-type: application/zip');
    header('Content-Disposition: attachment; filename="'.basename($zipname).'"');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($zipname));
    ob_clean();
    flush();
    readfile($zipname);

function addNormalRNCSchema($langname, $zip){
$path = "relaxng/" . $langname . "_normal.rnc";
$url = "http://www.ruleml.org/0.91/" . $path;
$output = file_get_contents($url);
$zip->addFromString($path, $output) or die ("ERROR: Could not add file");
}

function addModules($zip){
  $path = "relaxng/modules";
  $base = "http://www.ruleml.org/0.91/";
  //print 'adding ' . $path . '<br>'; 
  $zip->addEmptyDir($path);
  // This is a HACK - caused by inability to apply glob to URL - don't know why it doesn't work
  // Necessary to have a mirror "modules" directory on the alt2is.com site for this to work properly
  $nodes = glob("../" . $path ."/*.rnc", GLOB_NOSORT);
  //print_r($nodes);
  //print '<br/>';

    foreach ($nodes as $node) { 
        //print 'exploring ' . $node .'<br/>';
        $nodepath = strstr($node, $path);
        //print 'adding ' . $nodepath . '<br/>'; 
        if (is_file($node))  { 
            $output = file_get_contents($node);
            $zip->addFromString($nodepath, $output) or die ("ERROR: Could not add file");
        } 
    } 
}
?>