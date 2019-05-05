<head>
<link rel="stylesheet" type="text/css" href="kanipay.css">
<?php
$arr=json_decode(file_get_contents("https://api.kraken.com/0/public/Ticker?pair=XXBTZUSD"));
$time=time();
$rate=(float)$arr->result->XXBTZUSD->c[0];
?>
</head>
<div style="display:inline-block;vertical-align:top;">
  <div class="rate">
    <?php
     echo (date("Y/m/d H:i",$time));
     echo("<br>");
     echo("rate ".$rate." USD/BTC");
    ?>
  </div>
<h1>SEND BITCOIN</h1>
</div>
<div style="display:inline-block; vertical-align:top;">
  <img src="bitcoin.png" width=105 height=80>
</div>
<h3 style="font-weight:normal;">To address</h3>
<div class="price"style="width:800px;height:50px;">
  <input type="text" name="name"style="width:100%;border:0px;height:100%;font-size:32px;text-align;center;">
</div>
<h3 style="font-weight:normal;">Amount</h3>
<div class="price"style="width:200px;height:50px;display:inline-block;">
  <input id="amount" type="number" name="name"style="width:100%;border:0px;height:100%;font-size:32px;text-align;center;"onchange="buy()">
</div>
<div style="display:inline-block">
BTC
</div>
<div style="width:200;height:20;color:silver;text-align:center;"id="usd">

</div>
<div  style=" position:absolute;top:350px;height:50px;left:500px;width:500px;height:100px;">
  <form action='btc-result.php' method='post' name='form1'>
    <div class='buttons'>
      <div class='pull-right'>
        <div style="display:inline-block;">
        <input type='hidden' name='deposit'>
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
<script type="text/javascript">
function buy(){
var rate='<?php echo $rate ?>';
var amount=document.getElementById("amount").value;
document.form1.deposit.value=(amount*rate).toFixed(2);
document.getElementById("usd").innerHTML=(amount*rate).toFixed(2)+" USD";
}
</script>
