<?php
//error_reporting(0);
header("content-type: text/html; charset=UTF-8");
/* 数据库配置 */
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "12345678";
$dbname = "root";
/* 连接MySQL数据库 */
$link = mysqli_connect(
    $dbhost,   /* The host to connect to */
    $dbuser,   /* The user to connect as */
    $dbpass,   /* The md5_pass to use */
    $dbname);  /* The default database to query */
/* 检查连接 */
if (mysqli_connect_errno()) {
    printf("Can't connect to MySQL Server. Errorcode: %s ", mysqli_connect_error());
    exit();
}

/* 设置utf8字符集 */
if (!mysqli_set_charset($link, "utf8")) {
    printf("Error loading character set utf8: %s", mysqli_error($link));
}
/* 获取客户端IP */
function get_client_ip() {
    $client_ip = "unknown";

    if($_SERVER['HTTP_CLIENT_IP']){
        $client_ip=$_SERVER['HTTP_CLIENT_IP'];
    }elseif($_SERVER['HTTP_X_FORWARDED_FOR']){
        $client_ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $client_ip=$_SERVER['REMOTE_ADDR'];
    }

    return $client_ip;
}
?>