<?php
$host='rds48z5k409g0753v62j.mysql.rds.aliyuncs.com';
$user='r0gbqnbc4x';
$password='19760209';
$db='r0gbqnbc4x';
$connect=mysql_connect($host,$user,$password);
mysql_select_db($db);
mysql_query("set names 'utf8'");
$ip=getenv('REMOTE_ADDR');

echo '<html lang="zh-CN"> <meta charset="utf-8" http-equiv="Content-Type" content="text/html;"><title>留言修改</title><head><link rel="shortcut icon" href="/favicon.ico"></head><body bgcolor="#FFFFF4" align="center" style="background-attachment: fixed">';
$id = $_GET["id"];
$note = str_replace('
  ','<br/><br/>',@$_POST['note']);
$note = str_replace('<br/><br/><br/>','<br/>',@$_POST['note']);
$topic = $_POST['topic'];
$sql = "UPDATE note SET topic='$topic', note='$note' WHERE id = '$id' LIMIT 1;";
$result=mysql_query($sql);

if ($result){
    echo "<script>window.location.replace('/stock1/user_note.php');</script>";
}else{
    echo "<html lang='zh-CN'><meta charset='utf-8'><body>";
    echo "修改失败，可能服务器暂时不能连接。请返回重试。</body></html>";
}
?>
