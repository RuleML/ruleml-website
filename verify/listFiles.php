<?php
echo "hello\n";
echo getcwd()."\n";
$top = getcwd();
foreach(array_filter(glob($top.'/*'), 'is_file') as $file) {
    echo "$file\n";
}
?>