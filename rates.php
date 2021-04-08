<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
li {
    display:inline;
    width: 160%;
    flex-wrap:nowrap;
    background:#fff;
    padding:30px 30px;
    font-size:20px;
    overflow-y: scroll;
    color:green
    margin:10px;
}
marquee{
    margin:10px;
    /* width:60%; */
    /* height: 15vh; */
    /* overflow: scroll; */


}
</style>
<body>


<marquee> <?php

$url = "https://bitpay.com/api/rates";
$json = json_decode(file_get_contents($url));
$dollar = $btc = 0;
foreach($json as $obj)
{
    echo '<li> 1 Bitcoin = $', $obj->rate, ' ', $obj->name .' ('. $obj->code .') </li>';
}

?>
</marquee>
</body>
</html>