<head>
<link rel="stylesheet" type="text/css" href="kanipay.css">
<?php
$json=file_get_contents("usd.txt");
$json=json_decode($json,true);
$balance=$json["balance"];
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
Your balance
</div>
<div class="price"style="display:inline-block;">
<?php
echo (number_format($balance-$_POST["pay"],2));
$customer=array("timestamp"=>$_POST["time"],"type"=>"purchase","amount"=>$_POST["pay"],"balance"=>$balance-$_POST["pay"]);
array_push($json["table"],$customer);
$json["balance"]=$balance-$_POST["pay"];
file_put_contents("usd.txt",json_encode($json));
?>
</div>
 <div style="font-size:16px; display:inline-block;">USD</div>
</div>
<div class="sixth" >
<form action=<?php echo $_POST["return_url"]; ?> method="post">
  <div class="buttons">
    <div class="pull-right" style="text-align:center;width:500px;">
      <input type="submit" value="OK" class="button" />
    </div>
  </div>
</div>
</form>
</body>
