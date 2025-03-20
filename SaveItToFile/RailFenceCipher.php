<?php

$fileTemp = tempnam(sys_get_temp_dir(), 'temp_file');
$fileContent = [
    'Message'           => $_POST['msg'],
    'Number_of_Rails'   => $_POST['num'],
    'Encrypted'         => $_POST['result']
];
$file = fopen($fileTemp, 'w');

foreach ($fileContent as $key => $content) {
    fwrite($file, "$key : $content\n");
}

fclose($file);

$fileName =  'DES_Result.txt';

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($fileTemp));

readfile($fileTemp);
unlink($fileTemp);
exit();