
<html>
<head>
<title>CCAvenue Payment</title>
</head>
<body>
<center>

<?php include 'Crypto.php';?>

<?php 

	error_reporting(0);
	
	$merchant_data='';
	$working_key='28177749CE3784F5BECC20C6A20DBF1B';//Shared by CCAVENUES
	$access_code='AVJW01FC55BA81WJAB';//Shared by CCAVENUES

	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}
	//===========================
	echo '<script language="javascript">';
	echo 'alert("'.$merchant_data.'");';
	echo 'alert("'.$working_key.'");';
	echo 'alert("'.$encrypted_data.'");';
	echo '</script>';
	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
	echo '<script>';
	echo 'alert("'.$encrypted_data.'")';
	echo '</script>';
	//============================
?>
<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>

</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>
