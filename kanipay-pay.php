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
  <div class="left box">
   <div class="first">Your BTC balance</div>
   <div class="second">This payment will cost you</div>
   <div class="fourth" style="width:360px;text-align:center;">
       <img src="watch.jpeg" width="75" height="75"class="watch">
   </div>
   <div id=time class="fifth"></div>
  </div>
  <div class="middle box">
   <div class="first price">
    <?php echo(number_format($balance,2)); ?>
   </div>
   <div class="second price">
    <?php echo(number_format($_POST['total_amount']/$rate,6)); ?>
   </div>
   <div class="third small-price"><?php echo(number_format($_POST['total_amount'],2)." USD");?></div>
   <div id=output class="fifth">
     <form action='kanipay-callback.php' method='post'>
       <div class='buttons'>
         <div class='pull-right'>
           <input type='hidden' name='balance' value=<?php echo $balance ?>>
           <input type='hidden' name='return_url' value=<?php echo $_POST['return_url']?>>
           <input type='hidden' name='pay' value=<?php echo $_POST['total_amount']/$rate ?>>
           <input type='hidden' name='time' value=<?php echo $time ?>>
           <input type='hidden' name='rate' value=<?php echo $rate ?>>
           <input  type='submit' value='CONFIRM' class="button"/>
         </div>
       </div>
     </form>
   </div>
  </div>
<div class="right box">
<div class="first">BTC</div>
<div class="second">BTC</div>
</div>
  <script type="text/javascript">
  var start=new Date();
   var cl=function(){
    var nowtime=new Date();
    var interval=(Math.floor((nowtime.getTime()-start.getTime())/1000));
    if(interval>60){
      document.getElementById("output").innerHTML="Please reload!!!";
      document.getElementById("time").innerHTML="Time limit Exceeded!";
    }
    else{document.getElementById("time").innerHTML="Please confirm in <strong>"+(60-interval)+"</strong> s.";}
  }
  setInterval(cl,500);
  </script>
</body>
