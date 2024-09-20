<?php
  $db_name='mysql:host=localhost;dbname=e-learning';
  $user_name='root';
  $password='';
  $con=new PDO($db_name,$user_name,$password);
  if(!$con)
  {
  echo "connection";
}
function unique_id(){
    $str='abcdefghijklmnopqrstuvwxyzABCDEFGHIZKLMNOPQRSTUVWXYZ1234567890';
    $rand=array();
    $length=strlen($str)-1;
    for ($i=0;$i<20;$length){
        $n=mt_rand(0,$length);
        $rand[]=$str[$n];
    }
    return implode($rand);
}
?>
