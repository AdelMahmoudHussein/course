

<?php
$fromemail = "sendfrom@sujeetkrsingh.com";
$subject="Uploaded file attachment";  
$body="Please find the attachment";
$strSid = md5(uniqid(time()));
$headers ="From: $fromemail" . "\n";
$headers .="MIME-Version: 1.0\n";
$headers .="Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n"; 
$headers .="--".$strSid."\n";  
$headers .="Content-type: text/html; charset=utf-8\n";  
$headers .="Content-Transfer-Encoding: 7bit\n\n";  
$headers .=$body."\n";

if($_FILES["file"]["name"]!= ""){
  $strFilesName = $_FILES["file"]["name"];  
  $strContent = chunk_split(base64_encode(file_get_contents($_FILES["file"]["tmp_name"])));  
  $headers .= "--".$strSid."\n";  
  $headers .= "Content-Type: application/octet-stream; name=\"".$strFilesName."\"\n";  
  $headers .= "Content-Transfer-Encoding: base64\n";  
  $headers .= "Content-Disposition: attachment; filename=\"".$strFilesName."\"\n";  
  $headers .= $strContent."\n";  
}
$toemail="sendto@sujeetkrsingh.com";  
if(mail($toemail, $subject, $body, $headers))
   echo "Email send successfully with attachment";