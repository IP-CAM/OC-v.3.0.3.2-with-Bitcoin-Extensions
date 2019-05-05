<head>
<link rel="stylesheet" type="text/css" href="kanipay.css">
</head>
<body>
<?php
$json=file_get_contents("btc.txt");
$json=json_decode($json,true);
$balance=$json["balance"];
$arr=json_decode(file_get_contents("https://api.kraken.com/0/public/Ticker?pair=XXBTZUSD"));
$rate=(float)$arr->result->XXBTZUSD->c[0];
?>
<h1>Welcome Customer X</h1>
  <div class="rate">
    <?php
    $time=time();
     echo (date("Y/m/d H:i",$time));
     echo("<br>");
     echo("rate ".$rate." USD/BTC");
    ?>
  </div>
<div style="display:inline-block;vertical-align:top;width:400px;">
<div class="second">
<div style="display:inline-block;text-align:center;">
  Pay
</div>
<div style="display:inline-block;width=100px;font-size:32px;height:100%;vertical-align:top;"class="price">
<input type="number" name="pay"id="pay" style="width:100%;border:0px;height:100%;font-size:32px;text-align;center;"onchange="buy()">
</div>
<div style="display:inline-block;line-height:100%;">
  USD
</div>
</div>
<div class="fourth"style="line-height:50px;">
<div style="display:inline-block;vertical-align:top;">
  Buy
</div>
<div style="display:inline-block;width=100px;font-size:32px;height:100%;vertical-align:top;"class="price" id="buy">
</div>
<div style="display:inline-block;vertical-align:top;">
  BTC
</div>
</div>
</div>
<div style="display:inline-block;vertical-align:top;width:500px;">
  <div class="second">
    <div style="display:inline-block;">
      Name on card
    </div>
    <div style="display:inline-block;width=100px;font-size:32px;height:100%;vertical-align:top;"class="price">
    <input type="text" name="name"style="width:100%;border:0px;height:100%;font-size:32px;text-align;center;">
    </div>
  </div>
  <div class="fourth" style="line-height:50px;">
    <div style="display:inline-block;">
      Card Number
    </div>
    <div style="display:inline-block;width=100px;font-size:32px;height:100%;vertical-align:top;"class="price">
    <input type="number" name="number"style="width:100%;border:0px;height:100%;font-size:32px;text-align;center;">
    </div>
  </div>
  <div id=output class="fifth"style="width:500px;">
    <form action='credit-result.php' method='post' name='form1'>
      <div class='buttons'>
        <div class='pull-right'>
          <div style="display:inline-block;">
            <input type='hidden' name='time' value=<?php echo $time ?>>
            <input type='hidden' name='rate' value=<?php echo $rate ?>>
            <input type='hidden' name='deposit'>
          <input  type='submit' value='CONFIRM' class="button"/>
        </div>
        <div style="display:inline-block;">
        <input  type='submit' value='CANCEL' class="button"/>
      </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
function buy(){
  var rate=Number('<?php echo $rate?>');
  var pay=document.getElementById("pay").value;
  document.form1.deposit.value=(pay/rate);
  document.getElementById("buy").innerHTML=(pay/rate).toFixed(2);
}
</script>
