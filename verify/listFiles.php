<?php
class RecursiveDotFilterIterator extends  RecursiveFilterIterator
{
    public function accept()
    {
        return '.' !== substr($this->current()->getFilename(), 0, 1);
    }
}
//echo getcwd()."\n";
//$top= $_GET["top"];
$top = "/home/rulemlso/public_html";
  
//echo "$top\n";

$iterator = new RecursiveIteratorIterator(
    new RecursiveDotFilterIterator(
        new RecursiveDirectoryIterator("$top")
    )
);
foreach($iterator as $file){
    $path_parts = pathinfo($file);
    $base = trim(preg_replace('/\s+/', '', $path_parts['basename']));
    echo "$base";
    echo "\t";
    echo trim(preg_replace('/\s+/', '', substr($path_parts['dirname'], 27)));
    echo "\t";
    echo filesize($file);
    echo "\t";
    echo filemtime($file);
    echo "\n";
}



 ?>