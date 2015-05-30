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
$top = "/Users/taraathan/Documents/RuleML/cPanel Backups/ballistic/ruleml-ballistic-backup";
  
//echo "$top\n";

$iterator = new RecursiveIteratorIterator(
    new RecursiveDotFilterIterator(
        new RecursiveDirectoryIterator("$top")
    )
);
foreach($iterator as $file){
    $path_parts = pathinfo($file);
    $base = trim(preg_replace('/\s+/', '', $path_parts['basename']));
    $dir = trim(preg_replace('/\s+/', '', substr($path_parts['dirname'],83)));
    if (
      !strstr($dir,"joomla")                             // deleted or made static
      && !strstr($dir,"2007.ruleml.org/gallery")         // modified
      && !strstr($dir,"ruleml.org/1.0/doc/img")          // modified schema docs for 1.0
      && !strstr($dir,"ruleml.org/1.0/xsng")             // deleted
      && !strstr($base,"~")                              //deleted temp files
      && !strstr($base,"Reaction-RuleM_tutorial06.pdf")  //name change          
      && file_exists($file)
    ){
      echo "$base";
      echo "\t";
      echo $dir;
      echo "\t";
      echo filesize($file);
      echo "\t";
      echo filemtime($file);
      echo "\n";
    }
}



 ?>