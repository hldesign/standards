<?php

// Place the file in the current directory you want converted to UTF8, php will convert everything to htmlentities and then back to UTF-8
// This will write over the current file with the new encoding.
// Author: Kenneth Eriksson, kenneth@hldesign.se 2011

ini_set('default_charset', 'UTF-8');

// Add / Remove file extensions, Only files with this extension vill be converted
$allowed_ext = array("php","html","html","css","php5","js","sql","xml","tpl");

if (isset($argv[1]) && trim($argv[1]) != '') {
  $dirs = scandir($argv[1]);
  $directory = $argv[1];
} else {
  $dirs = scandir($_SERVER['PWD']);
  $directory = $_SERVER['PWD'];
}

walk_and_encode($dirs,$directory);


// This functions does all the work
function walk_and_encode($dirs = null,$directory = null) {
  global $allowed_ext;
  if (!is_array($dirs) && $directory == null) {
    return false;
  }
  echo "Scanning ".$directory."\n";
  foreach($dirs as $dir) {
    switch ($dir) {
      // We shall not check this
      case ".":
        break;
      case "..";
        break;
      case "encodings.php":
        break;
      // Convert
      default:
        if (is_dir($directory."/".$dir)) {
          echo "$directory/$dir\n";
          walk_and_encode(scandir($directory."/".$dir),$directory."/".$dir);
        } elseif(is_file($directory."/".$dir)) {
          $file_info = pathinfo($directory."/".$dir);
          if (isset($file_info['extension']) && in_array($file_info['extension'],$allowed_ext)) {
            $item = file_get_contents($directory."/".$dir);
            $item = preg_split('//', $item, -1, PREG_SPLIT_NO_EMPTY);
            $item = encoding($item);

            if (is_array($item)) {
              $item = implode('',$item);
            }
            if ($item != '') {
              file_put_contents($directory."/".$dir,$item);
              echo "Written ".$directory."/".$dir."\n";
            } else {
              echo "Empty content, ignore\n";
            }

          } else {
            echo "Ignored ".$directory."/".$dir."\n";
          }
        }
        break;
    }
  }
}

// Let's go UTF-8 with this shit we got!
function encoding(&$item, $key = '')
{
  // Let's check if we got a string
  if (is_string($item)) {
    // Convert all to htmlentities
    $item = htmlentities($item);
    // Convert to UTF-8
    $item  = mb_convert_encoding($item , 'UTF-8','HTML-ENTITIES');
  } elseif (is_array($item)) {
    foreach ($item as $key => $val) {
      $item[$key] = encoding($val);
    }
  }
  return $item;
}

?>