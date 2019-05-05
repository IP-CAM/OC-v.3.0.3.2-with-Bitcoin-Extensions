<head>
<?php
$json=file_get_contents("merchant.txt");
$json=json_decode($json,true);
?>
</head>
<div style="display:inline-block; width:400px;vertical-align:top;font-size:32px;">
Merchant:<br>
Merchant Id:<br>
Current Balance:
</div>
<div style="display:inline-block;vertical-align;top;font-size:32px;">
  Jewelry<br>
  Jewelry<br>
  <?php
  echo(number_format($json["balance"],2));
  ?>
</div>
<?php
$table=$json["table"];
echo("<table border='1'");
echo("<tr>
<th>Timestamp</th>
<th>Customer ID</th>
<th>Type</th>
<th>Amount</th>
<th>Balance</th>");
for($i=count($table)-1;$i>=0;$i--){
  echo("<tr>");
  echo("<th>".date("Ymd-His",$table[$i]["timestamp"])."</th>");
  echo("<th>".$table[$i]["customerid"]."</th>");
  echo("<th>".$table[$i]["type"]."</th>");
  echo("<th>".number_format($table[$i]["amount"],2)."</th>");
  echo("<th>".number_format($table[$i]["balance"],2)."</th>");
  echo("</tr>");
}
echo("</table>")
?>
