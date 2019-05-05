<head>
<link rel="stylesheet" type="text/css" href="kanipay.css">
<?php
$json=file_get_contents("btc.txt");
$json=json_decode($json,true);
$balance=$json["balance"];
$arr=json_decode(file_get_contents("https://api.kraken.com/0/public/Ticker?pair=XXBTZUSD"));
$rate=(float)$arr->result->XXBTZUSD->c[0];
 ?>
</head>
<body>
<h1>Welcome Customer X</h1>
<div class="rate">
  <?php
   echo (date("Y/m/d H:i",$_POST["time"]));
   echo("<br>");
   echo("rate ".$_POST["rate"]." USD/BTC");
  ?>
</div>
<div class="big">
<div style="display:inline-block;text-align:center;width:300px;">
<img src="check.jpg" width="150" height="150">
</div>
<div style="display:inline-block; font-size:32px;vertical-align:top;height:150px;">
<div style="display:table-cell;text-align:center;vertical-align:middle;height:150px;">
  PAYMENT<br>SUCCESSFUL!
</div>
</div>
</div>
<div class="fifth">
<div style="font-size:32px; display:inline-block;width:300px;">
Your BTC balance
</div>
<div class="price"style="display:inline-block;">
<?php
echo(number_format($balance+$_POST["deposit"],2));
$new=array("timestamp"=>$_POST["time"],"type"=>"credit","amount"=>$_POST["deposit"],"balance"=>$balance+$_POST["deposit"]);
array_push($json["table"],$new);
$json["balance"]=$balance+$_POST["deposit"];
file_put_contents("btc.txt",json_encode($json));
?>
</div>
 <div style="font-size:16px; display:inline-block;">BTC</div>
</div>
</body>
