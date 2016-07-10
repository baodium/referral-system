 <?php 
 class Mail{
  public function __construct()
        {
		}
		
		

public function send_mail($to,$subject,$headers){	
 try {
    @mail($to, $subject, $body, $headers);
	//var_dump("yes");
return true;
} catch (InvalidArgumentException $e) {
//var_dump("no");
 return false;
}
}

function send_sms($phone,$id,$pass){
$message="You have been successfully registered on fourfold integrated resources. Your membership ID=".$id." and your temporary password is: ".$pass.". Go to www.fourfold.com to access your dashboard";
    $message=str_replace(" ","%20",$message);
     $url="http://thrillhousesms.com/components/com_spc/smsapi.php?username=oauifesu&password=Confidence@2&sender=GreatIfeApp@&recipient=@@+234".$phone."@@&message=".$message;
   
return $send_sms=file_get_contents($url);
}


}
?>