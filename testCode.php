<?
session_start();
		set_time_limit(0);
		include("includes/config.php");
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>TEST CODE Check โอนเงิน row เบิ้ล
<?
		$a=1;
$sqlSelect1="select  CustNum, PhotoLocation,count(PhotoLocation) as COUNT_photo
  FROM st_photo_detail
  group by CustNum, PhotoLocation
  having count(PhotoLocation) >1
  order by  count(PhotoLocation)  desc
";
$qrySelect1 =sqlsrv_query($con,$sqlSelect1);
while($Select1=sqlsrv_fetch_array($qrySelect1)){
	echo '<br>'.$a.' '.$Select1['CustNum'].'  = '.$Select1['PhotoLocation'].'  = '.$Select1['COUNT_photo'];
	$COUNT_photo=$Select1['COUNT_photo']-1;
	
	$sqlDel="set rowcount $COUNT_photo
	delete st_photo_detail where PhotoLocation='$Select1[PhotoLocation]' and CustNum='$Select1[CustNum]' ";
	//$qtyDel =sqlsrv_query($con,$sqlDel);if($qtyDel){echo '  ==  Del แล้ว';};
	$a++;}//วน PRODUCT
?>
























<?
//echo substr("KK5812-580011-0056",1,-5)."<br>";
?>
</body>
</html>