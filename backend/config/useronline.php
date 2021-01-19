<?php @session_start(); require("connect.php");

$Session_name = "default";
$table = "useronline"; // ชื่อ Table



if ($Session_name == "default") {
@session_start();
}
else {
session_name("$Session_name");
session_start("$Session_name");
}

$SID = session_id();
$time = time();
$dag = date("z");
$nu = time()-900; // Keep for 15 mins

$sidcheck = $conn->query("SELECT SID FROM $table WHERE SID='$SID'");
$sid_check = $sidcheck->fetch_assoc();

if ($sid_check['SID'] != $SID) {

$conn->query("INSERT INTO $table VALUES ('$SID','$time','$dag')");
} else {

$conn->query("UPDATE $table SET time='$time' WHERE SID='$SID'");
}


$count_users = $conn->query("SELECT count(*) as online FROM $table WHERE time>$nu AND day=$dag");
$users_online = $count_users->fetch_assoc();
echo $users_online['online']; // echo จำนวนผู้ online ออกมาก


$conn->query("DELETE FROM $table WHERE time<$nu");
$conn->query("DELETE FROM $table WHERE day != $dag");

?>