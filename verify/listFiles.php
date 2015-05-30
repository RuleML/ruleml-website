<?php
class RecursiveDotFilterIterator extends  RecursiveFilterIterator
{
    public function accept()
    {
        return '.' !== substr($this->current()->getFilename(), 0, 1);
    }
}
echo "hello\n";
echo getcwd()."\n";
//$top= $_GET["top"];
$top = "~/public_html/ruleml.org/verify";
  
echo "$top\n";

$iterator = new RecursiveIteratorIterator(
    new RecursiveDotFilterIterator(
        new RecursiveDirectoryIterator("$top")
    )
);
foreach($iterator as $file){
    $path_parts = pathinfo($file);
    $base = $path_parts['basename'];
    echo "$base";
    echo " ";
    echo $path_parts['dirname'];
    echo " ";
    echo filesize($file);
    echo " ";
    echo filemtime($file);
    echo "\n";
}



 ?>