<?
function save_image($img,$fullpath){
    $ch = curl_init ($img);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    $rawdata=curl_exec($ch);
    curl_close ($ch);
    if(file_exists($fullpath)){
        unlink($fullpath);
    }
    $fp = fopen($fullpath,'x');
    fwrite($fp, $rawdata);
    fclose($fp);
}


$img ='https://chart.googleapis.com/chart?chs=350x150&chd=t:40.5882352941,59.4117647059&cht=p3&chl=Close%20Friends%20(41%20%)|Not%20Close%20friends%20(59%20%)&chs=410x100';
$dir='/home/greenpor/public_html/fb/apps/';
$path ='images/image'.time().'.jpg';
echo $path ; 
$fullpath=$dir.$path;
save_image($img,$fullpath)
?>