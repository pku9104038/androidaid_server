<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
if(!isset($_POST['order'])){
    $order = 'app_serial';
}
else{
    $order = $_POST['order'];
}
/*
$order = $_REQUEST['order'];

if ($order=="") { 
    $order = 'app_serial';
} 
*/
require_once "..\db_conn.php";
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Display <?php echo DB_TABLE_APP_REPOSITORY ?></title>
</head>

<body>



<h1>Display <?php echo DB_TABLE_APP_REPOSITORY; ?> data!</h1>

<form method="post" action="disp_app_repo.php">
	<input type="submit" name="order" value="app_serial">

	<input type="submit" name="order" value="app_category">

	<input type="submit" name="order" value="app_label">
</form>

<?php
mysql_select_db(DB_NAME,$con);


$table=DB_TABLE_APP_REPOSITORY;
#$order = DB_COLUMN_APP_STATE;
#$order1 = DB_COLUMN_APP_CATEGORY;
#$order2 = DB_COLUMN_APP_LABEL;
#$order3 = DB_COLUMN_APP_SERIAL;
$query="SELECT * FROM $table ORDER BY $order DESC";
$result=mysql_query($query,$con);

$num=mysql_numrows($result);

mysql_close();
?>


<table border="1" cellspacing="2" cellpadding="2">

<tr>

<?php
foreach($ArrayRepoColumns as $columns){
?>

<td><font face="Arial, Helvetica, sans-serif"><?php echo $columns; ?></font></td>

<?php
	}
?>
</tr>

<?php

$i=0;
while ($i < $num) {

?>
<tr>
<?php
	foreach($ArrayRepoColumns as $columns){
		$value=mysql_result($result,$i,$columns);
?>

<td><font face="Arial, Helvetica, sans-serif"><?php echo $value; ?></font></td>

<?php
	}
?>
</tr>

<?php
	$i++;
}
?>

</body>
</html>
