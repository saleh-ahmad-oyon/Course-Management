<?php
$filepath = $_GET['file'];

// block any attempt to the filesystem
if (isset($_GET['file'])) {
    $filename = end(explode('/', $filepath));
} else {
    $filename = NULL;
    $err = 'Sorry, the file you are requesting is unavailable.';
}

if (!$filename) {
    // if variable $filename is NULL or false display the message
    echo $err;
} else {
    // define the path to your download folder plus assign the file name
    $path = $filepath;
    // check that file exists and is readable
    if (file_exists($path) && is_readable($path)) {
        // get the file size and send the http headers
        $size = filesize($path);

        header("Content-Type: application/force-download");
        //header('Content-Type: application/octet-stream');
        header('Content-Length: '.$size);
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        // open the file in binary read-only mode

        //The three lines below basically make the download non-cacheable
        header("Cache-control: private");
        header('Pragma: private');
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        // multipart-download and download resuming support
        if(isset($_SERVER['HTTP_RANGE'])) {
            list($a, $range)         = explode("=",$_SERVER['HTTP_RANGE'],2);
            list($range)             = explode(",",$range,2);
            list($range, $range_end) = explode("-", $range);
            $range=intval($range);
            if(!$range_end) {
                $range_end = $size-1;
            } else {
                $range_end = intval($range_end);
            }

            $new_length = $range_end-$range+1;
            header("HTTP/1.1 206 Partial Content");
            header("Content-Length: $new_length");
            header("Content-Range: bytes $range-$range_end/$size");
        } else {
            $new_length = $size;
            header("Content-Length: ".$size);
        }

        // display the error messages if the file can´t be opened
        $file = @ fopen($path, 'rb');
        if ($file) {
            // stream the file and exit the script when complete
            fpassthru($file);
            exit;
        } else {
            echo $err;
        }
    } else {
        echo $err;
    }
}
