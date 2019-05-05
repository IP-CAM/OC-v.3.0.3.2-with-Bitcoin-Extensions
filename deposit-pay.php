<head>
<link rel="stylesheet" type="text/css" href="kanipay.css">
</head>
<body>
<?php
$json=file_get_contents("usd.txt");
$json=json_decode($json,true);
$arr=json_decode(file_get_contents("https://api.kraken.com/0/public/Ticker?pair=XXBTZUSD"));
$rate=(float)$arr->result->XXBTZUSD->c[0];
$time=time();
?>
<h1>Welcome Customer Y</h1>
<div class="rate">
  <?php
  $time=time();
   echo (date("Y/m/d H:i",$time));
   echo("<br>");
   echo("rate ".$rate." USD/BTC");
  ?>
</div>
<div class="fourth">
<div  style="display:inline-block;font-size:32px;width:300px;">
  Your Balance
</div>
<div class="price" style="display:inline-block;">
  <?php echo($json["balance"]);?>
</div>
<div  style="display:inline-block;">
USD
</div>
</div>
<div class="fifth">
<div  style="display:inline-block;font-size:32px;width:300px;">
  This Payment
</div>
<div class="price" style="display:inline-block;">
  <?php echo $_POST['total_amount']?>
</div>
<div  style="display:inline-block;">
USD
</div>
</div>
<div  style=" position:absolute;top:350px;height:50px;left:500px;width:500px;height:100px;">
  <form action='deposit-callback.php' method='post' name='form1'>
    <div class='buttons'>
      <div class='pull-right'>
        <div style="display:inline-block;">
          <input type='hidden' name='return_url' value=<?php echo $_POST['return_url']?>>
          <input type='hidden' name='pay' value=<?php echo $_POST['total_amount']?>>
        <input type='hidden' name='time' value=<?php echo $time ?>>
        <input type='hidden' name='rate' value=<?php echo $rate ?>>
        <input  type='submit' value='CONFIRM' class="button"/>
      </div>
      <div style="display:inline-block;">
      <input  type='submit' value='CANCEL' class="button"/>
    </div>
      </div>
    </div>
  </form>
</div>
