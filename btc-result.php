<head>
<link rel="stylesheet" type="text/css" href="kanipay.css">
<?php
$rate=$_POST["rate"];
$time=$_POST["time"];
$json=file_get_contents("usd.txt");
$json=json_decode($json,true);
$balance=$json["balance"];
$new=array("timestamp"=>$_POST["time"],"type"=>"btcsend","amount"=>$_POST["deposit"],"balance"=>$balance+$_POST["deposit"]);
$json["balance"]=$balance+$_POST["deposit"];
array_push($json["table"],$new);
file_put_contents("usd.txt",json_encode($json));
?>
</head>
<div style="display:inline-block;vertical-align:top;">
<h1>SEND BITCOIN</h1>
</div>
<div style="display:inline-block; vertical-align:top;">
  <img src="bitcoin.png" width=105 height=80>
</div>
<div class="rate">
  <?php
   echo (date("Y/m/d H:i",$time));
   echo("<br>");
   echo("rate ".$rate." USD/BTC");
  ?>
</div>
<div style="top:100px;height:150px;">
<div style="display:inline-block;text-align:center;width:300px;">
<img src="check.jpg" width="150" height="150">
</div>
<div style="display:inline-block; font-size:32px;vertical-align:top;height:150px;">
<div style="display:table-cell;text-align:center;vertical-align:middle;height:150px;">
  PAYMENT<br>SUCCESSFUL!
</div>
</div>
</div>
