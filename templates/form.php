<div class="form-contact"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
    <div class="input-group input-group-sm"><span class="input-group-addon"><em class="fa fa-user"></em> Name: </span>
    <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" required>
    </div>
    <div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-envelope"></i> E-Mail:</span>
    <input type="email" name="email" id="email" class="form-control" placeholder="abd@xyz.com" required>
    </div>
    <div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-phone "></i> Contact Number</span>
    <input type="number" name="contact" id="contact" class="form-control" placeholder="+91-xxxxxxxxxx" required>
    </div>
    <textarea name="comment" id="comment" placeholder="Type your message here" style="width:100%; height: 6em; padding:0px 0px 0px 10px; font-size:14px;"></textarea>
    <input type="submit" id="subbut"  name="Submit" value="Send" class="btn-default btn form-control">
   
    </form></div>
    <?php if($_POST) {
$ToEmail  = '' . ', '; // note the comma
$ToEmail .= '';

$EmailSubject = 'REPLY FROM GTBIT WEBSITE FORM';
$mailheader = "From: GTBIT "."\r\n";
//$mailheader = "From: ".$_POST["email"]."\r\n"; 
$mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$MESSAGE_BODY = '
<html>
<body>
<div style="width:100%; background-color:#23416A;"><h1 style="font-family:Arial, sans-serif; text-align:center; color:#fff; padding:20px;">GTBIT QUERY FORM REPLY</h1></div>
<div style="background-color:#dedede; font-family:Segoe, Segoe UI, DejaVu Sans,Trebuchet MS, Verdana, sans-serif">
<div style="padding:30px 60px 30px 60px; color:#35688E;">
<h3 style="padding:5px 20px 5px 20px; background-color:#fdfdfd; border-radius:5px;"><b>Name: <span style="color:#555;">'.$_POST['name'].'</span></b></h3>
<h3 style="padding:5px 20px 5px 20px; background-color:#fdfdfd; border-radius:5px;"><b>Contact Number: <span style="color:#555;">'.$_POST['contact'].'</span></b></h3>
<h3 style="padding:5px 20px 5px 20px; background-color:#fdfdfd; border-radius:5px;"><b>E-Mail: <span style="color:#555;"><a href="mailto:'.$_POST['email'].'?Subject=Reply to Your QUERY">'.$_POST['email'].'</a></span></b></h3>
<h3 style="padding:5px 20px 5px 20px; background-color:#fdfdfd; border-radius:5px;"><b>Comments: <span style="color:#555;">'.$_POST['comment'].'</span></b></h3>
</div></div>
</body>
</html>
 ';
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure");
      echo '<script>$(document).ready(function(){
  swal("Thank You","we will contact you soon", "success");
});</script>';}?>