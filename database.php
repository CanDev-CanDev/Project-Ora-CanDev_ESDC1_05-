<?php
//error_reporting(E_ALL);
//var_dump($_SERVER);

$post_data = $_POST['data'];
if (!empty($post_data)) {
    $file = 'output';
    $filename = $file.'.xml';
    
   
$fc = fopen($filename, "r");
while (!feof($fc)) {
    $buffer = fgets($fc, 4096);
    $lines[] = $buffer;
}

fclose($fc);

//open same file and use "w" to clear file 
$f = fopen($filename, "w") or die("couldn't open $file");

$lineCount = count($lines);
//loop through array writing the lines until the secondlast
for ($i = 0; $i < $lineCount- 1; $i++) {
    fwrite($f, $lines[$i]);
}
fwrite($f, $post_data .PHP_EOL);

//write the last line
fwrite($f, $lines[$lineCount-1]);
fclose($f);
    
    
}
?>