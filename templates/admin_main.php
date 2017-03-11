<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Guru Tegh Bahadur Institute Of Technology | Home</title>

   <?php 
   include_once ('connection.php');
   session_start();
   $sql = $conn->prepare("SELECT * FROM adminlogin WHERE `idadminlogin` = ? ");
   $sql->bind_param('s', ($_SESSION['user_id']));
   
   $sql->execute();
   $query = $sql->get_result();
   if ($query->num_rows > 0) {
   	$row = $query->fetch_assoc();
   	$user_active = $row['adminactive'];
   }
   
   if (!(isset($_SESSION['user_id'])&& ($_SESSION['user_group']=='Administrator')&& ($_SESSION['user_active']==$user_active)))
   {
   	header('Location: admin_login.html');
   }
   else
   	 
   {   include("header.html");
   
   
   ?>

   <?php if($_POST) { if(isset($_POST['action']) && $_POST['action'] == 'delete')
{
    $sql = "DELETE FROM ".$_POST["table"]." WHERE id=".$_POST["id"];
    $conn->query($sql);}

    if(isset($_POST['action']) && $_POST['action'] == 'edit')
    {
      $sql = $conn->prepare("SELECT * FROM ".$_POST["table"]." WHERE id=?");
      $sql->bind_param('s', $_POST["id"]);
      $sql->execute() ;
      	$query=$sql->get_result();
     
      $row = $query->fetch_assoc();
      $title = $row['title'];
      $date = $row['date'];
      $shortdesc = $row['shortdesc'];
      $longdesc=$row['longdesc'];
      $table=$_POST["table"];
      $myid=$_POST["id"];
      echo '<script>
$(document).ready(function(){
      editmodal('.'"'.$title.'"'.','.'"'.$date.'"'.','.'"'.$shortdesc.'"'.','.'"'.$longdesc.'"'.','.'"'.$table.'"'.','.'"'.$myid.'"'.');
});
    </script>';
  }

  if(isset($_POST['action']) && $_POST['action'] == 'hide')
    {
      $sql = $conn->prepare("select * FROM ".$_POST["table"]."  WHERE id=?");
        $sql->bind_param('s', $_POST["id"]);

        if ($sql->execute() === TRUE) {
          $query=$sql->get_result();
          if($query->num_rows>0)
          {
            $row=$query->fetch_assoc();
            $hide=($row['hide']);
            if($hide==0)
            	$hide=1;
            else
            	$hide=0;
            $sql = $conn->prepare("UPDATE ".$_POST["table"]." SET hide=? WHERE id=?");
            $sql->bind_param('ss', $hide, $_POST["id"]);    
            if($sql->execute()==TRUE){}
            	//echo "successful";      
          }         
}

    }
 
   }


   ?>
   <div class="row setting_a">
    <div class="dropdown pull-right">
    <a href="#" class=" dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;My Account</a>
    <ul class="dropdown-menu">
      
      <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Logout</a></li>
    </ul>
  </div>
   </div>
  <div style="padding:80px 0 0px 0;" class="text-center">
  <h2>Guru Tegh Bahadur Institute of Technology</h2>
  <h3>Admin Dashboard</h3>
</div> 
  
<!--Start GTBIT notification, events, notice board tab-->
<div class="container notify">

  <div class="row ">
    <div class="col-lg-12">
          
          <section class="tab wow fadeInLeft">
            <header class="panel-heading tab-bg-dark-navy-blue">
              <ul class="nav nav-tabs nav-justified ">
                <li class="">
               <a href="javascript: addmodal('notice')" class="modal_box"> <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
                  <a data-toggle="tab" href="#notice-board">
                    Notice board
                  </a>
                </li>

                <li class="active">
                <a href="javascript: addmodal('news')" class="modal_box"> <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
                  <a data-toggle="tab" href="#news">
                    News
                  </a>
                </li>
                <li>
                <a href="javascript: addmodal('events')" class="modal_box"> <i class="fa fa-plus-circle" aria-hidden="true"></i> </a>
                  <a data-toggle="tab" href="#events">
                    Events
                  </a>
                </li>
              </ul>
            </header>
            <div class="panel-body">
              <div class="tab-content tasi-tab">
                <div id="news" class="tab-pane fade in active">
                <?php 
                $sql = "SELECT * FROM news ";
                $query = $conn->query($sql);
                if ($query->num_rows > 0) {
                
                while($row = $query->fetch_assoc()) {
                
                      $title = $row['title'];
                      $date = $row['date'];
                      $shortdesc = $row['shortdesc'];
                      $type="news";
                      $hide=$row['hide'];
                ?>
                <article class="media" onclick="editit('news_<?php echo $row['id']?>')">
                <div class="row">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                <a class="pull-left thumb p-thumb">
                  <img src="images/21.png" alt="">
                </a>
                <div class="media-body b-btm">
                     
                        <?php echo $title;?>
                      </a><i><?php echo date("d-m-Y", strtotime($row['date'])); ?></i>
                      <p>
                        <?php echo $shortdesc; ?>
                      </p>
                </div></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 edit_box">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="news_<?php echo $row['id']?>">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <input type="hidden" name="table" value="news">
                        <input type="hidden" name="action" value="delete">
                   <a href="javascript: hideit('news_<?php echo $row['id']?>')" class="delete_me"> <i class="fa <?php if($hide==0){echo "fa-eye";} else echo "fa-eye-slash" ?>" aria-hidden="true"></i> </a> 
                <a href="javascript: deleteit('news_<?php echo $row['id']?>')" class="delete_me" type="submit" name="B1" form="news_<?php echo $row['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </form>
                </div>
                </div>
                  </article>

                 <?php 
                  }
                }
                  ?>
                </div>
               
               
                <div id="events" class="tab-pane fade-in">
                <?php 
                $sql = "SELECT * FROM events";
                $query = $conn->query($sql);
                if ($query->num_rows > 0) {
                
                while($row = $query->fetch_assoc()) {
                
                      $title = $row['title'];
                      $date = $row['date'];
                      $shortdesc = $row['shortdesc'];
                      $hide=$row['hide'];
                      $type="events";
                ?>
                <article class="media" onclick="editit('events_<?php echo $row['id']?>')">
                <div class="row">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                <a class="pull-left thumb p-thumb">
                  <img src="images/21.png" alt="">
                </a>
                <div class="media-body b-btm">
                    
                       <?php echo $title;?>
                      </a>
                      <p style="font-size:15px;"><i class="fa fa-calendar">
                        </i> <?php echo date("d-m-Y", strtotime($row['date']));?>
                      </p>
                    </div></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 edit_box">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="events_<?php echo $row['id']?>">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <input type="hidden" name="table" value="events">
                        <input type="hidden" name="action" value="delete">
                          <a href="javascript: hideit('events_<?php echo $row['id']?>')" class="delete_me"> <i class="fa <?php if($hide==0){echo "fa-eye";} else echo "fa-eye-slash" ?>" aria-hidden="true"></i> </a> 
                    
                <a href="javascript: deleteit('events_<?php echo $row['id']?>')" class="delete_me" form="events_<?php echo $row['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </form>
                </div>
                </div>
                  </article>

                 <?php 
                  }
                }
                  ?>
                </div>
                
                <div id="notice-board" class="tab-pane fade">
                <!-- start --> 
                 <?php 
                $sql = "SELECT * FROM notices";
                $query = $conn->query($sql);
                if ($query->num_rows > 0) {
                
                while($row = $query->fetch_assoc()) {
                
                      $title = $row['title'];
                      $date = $row['date'];
                      $file=$row['file'];
                     
                      $hide=$row['hide'];
                      $type="notices";
                ?>
                <article class="media" >
                <div class="row">
                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                <a class="pull-left thumb p-thumb">
                  <img src="images/21.png" alt="">
                </a>
                <div class="media-body b-btm">
                        <a href="<?php echo $file;?>">
                       <?php echo $title;?>
                      </a>
                      <p style="font-size:15px;"><i class="fa fa-calendar">
                        </i> <?php echo date("d-m-Y", strtotime($row['date']));?>
                      </p>
                    </div></div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 edit_box">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="notices_<?php echo $row['id']?>">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <input type="hidden" name="table" value="notices">
                        <input type="hidden" name="action" value="delete">
                          <a href="javascript: hideit('notices_<?php echo $row['id']?>')" class="delete_me"> <i class="fa <?php if($hide==0){echo "fa-eye";} else echo "fa-eye-slash" ?>" aria-hidden="true"></i> </a> 
                    
                <a href="javascript: deleteit('notices_<?php echo $row['id']?>')" class="delete_me" form="events_<?php echo $row['id']?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </form>
                </div>
                </div>
                  </article>

                 <?php 
                  }
                }
                  ?>
                 
                 
                 
                 
                 
                  <!-- end --> 
                </div>
              </div>
            </div>
          </section>
    </div>
</div>
      </div>



  <div class="modal fade" id="myNews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add News</h4>
      </div>
      <div class="modal-body">
      <form method="POST" action="addnew.php">
  <div class="form-group">
    <label for="Title">Title</label>
    <input type="text" class="form-control" name ="title" id="Title" placeholder="Enter Title for event">
  </div>
  <div class="form-group">
    <label for="date">Date</label>&nbsp;&nbsp;<i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Default Value is Today's date, Only Notices and News can be added on Past Days." ></i>
    <input type="date" class="form-control" name="date" id="date" value="<?php echo date('Y-m-d'); ?>">
  </div>
  <div class="form-group">
    <label for="short-desc">Short Description</label>&nbsp;&nbsp;<i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="This Description will appear on Box, try not to exceed 180 characters" ></i>
    <textarea name="shortdesc" placeholder="Enter Short Description here"></textarea>
  </div>
  <div class="form-group">
    <label for="short-desc">Long Description</label>&nbsp;&nbsp;<i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="This Description will be visible after clicking and opening the whole notice/event/news" ></i>
    <textarea name="longdesc" placeholder="Enter Long Description here"></textarea>
  </div>
  <input type="hidden" id="type" name="type" value="news"> 
<input type="hidden" id="id" name="id" value="NULL">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>




 <div class="modal fade" id="myEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Event</h4>
      </div>
      <div class="modal-body">
      <form method="POST" action="addnew.php">
  <div class="form-group">
    <label for="Title">Title</label>
    <input type="text" class="form-control" name ="title" id="Title" placeholder="Enter Title for event">
  </div>
  <div class="form-group">
    <label for="date">Date</label>&nbsp;&nbsp;<i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Default Value is Today's date, Only Notices and News can be added on Past Days." ></i>
    <input type="date" class="form-control" name="date" id="date" value="<?php echo date('Y-m-d'); ?>">
  </div>
  <div class="form-group">
    <label for="short-desc">Short Description</label>&nbsp;&nbsp;<i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="This Description will appear on Box, try not to exceed 180 characters" ></i>
    <textarea name="shortdesc" placeholder="Enter Short Description here"></textarea>
  </div>
  <div class="form-group">
    <label for="short-desc">Long Description</label>&nbsp;&nbsp;<i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="This Description will be visible after clicking and opening the whole notice/event/news" ></i>
    <textarea name="longdesc" placeholder="Enter Long Description here"></textarea>
  </div>
  <input type="hidden" id="type" name="type" value="events"> 
  <input type="hidden" id="id" name="id" value="NULL">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>



 <div class="modal fade" id="myNotice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Notice</h4>
      </div>
      <div class="modal-body">
      <form method="POST" action="upload.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="Title">Title</label>
    <input type="text" class="form-control" name ="title" id="Title" placeholder="Enter Title for event">
  </div>
  <div class="form-group">
    <label for="date">Date</label>&nbsp;&nbsp;<i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Default Value is Today's date, Only Notices and News can be added on Past Days." ></i>
    <input type="date" class="form-control" name="date" id="date" value="<?php echo date('Y-m-d'); ?>">
  </div>
  <div class="form-group">
    <label for="short-desc">Add file to upload</label>&nbsp;&nbsp;<i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="This Description will appear on Box, try not to exceed 180 characters" ></i>
    <input type="file" name="image" id="image">
  </div>
  


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>


  
<?php include("footer.html"); 
   }
?>
  <!-- end GTBIT footer -->
  
  <!-- jQuery library -->
  <script src="assets/js/jquery.min.js"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>  
  <!-- Mixit slider -->
  <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>
  
  
  <!-- Custom js -->
  <script src="assets/js/custom.js"></script> 
  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

<script type="text/javascript"> 
var tdate = '<?php echo date('Y-m-d'); ?>'

function deleteit(kl){
  kl='#'+kl; 
  $('input[name="action"]').val('delete');
  $(kl).submit();
}

function addmodal(ch1){
if(ch1=='news'){
  var modal1 = $('#myNews');
    modal1.find('.modal-title').text('Add News');
    modal1.find('#Title').val('');
    modal1.find('#id').val('NULL');
    modal1.find("textarea[name='shortdesc']").val('');
    modal1.find("textarea[name='longdesc']").val('');
    modal1.find("#date").val(tdate);
    modal1.find("button[type='submit']").text("Add");
    $('#myNews').modal('show');
}
    if(ch1=='events'){
  var modal1 = $('#myEvent');
    modal1.find('.modal-title').text('Add Event');
    modal1.find('#Title').val('');
    modal1.find('#id').val('NULL');
    modal1.find("textarea[name='shortdesc']").val('');
    modal1.find("textarea[name='longdesc']").val('');
    modal1.find("#date").val(tdate);
    modal1.find("button[type='submit']").text("Add");
    $('#myEvent').modal('show');
}
    if(ch1=='notice'){
    $('#myNotice').modal('show');
}


}

function editit(ch){
  ch='#'+ch; 
  $('input[name="action"]').val('edit');
  $(ch).submit();
} 

function hideit(ch){
  ch='#'+ch; 
  $('input[name="action"]').val('hide');
  $(ch).submit();
} 

function editmodal(title,date,shortd,longd,table,myid)
{
  if(table=='events')
  {
    var modal1 = $('#myEvent')
    modal1.find('.modal-title').text('Update Event');
    modal1.find('#Title').val(title);
    modal1.find('#id').val(myid);
    modal1.find("textarea[name='shortdesc']").val(shortd);
    modal1.find("textarea[name='longdesc']").val(longd);
    modal1.find("#date").val(date);
    modal1.find("button[type='submit']").text("Update Event");
    $('#myEvent').modal('show');
  }
  if(table=='news')
  {
    var modal1 = $('#myNews')
    modal1.find('.modal-title').text('Update News');
    modal1.find('#Title').val(title);
    modal1.find('#id').val(myid);
    modal1.find("textarea[name='shortdesc']").val(shortd);
    modal1.find("textarea[name='longdesc']").val(longd);
    modal1.find("#date").val(date);
    modal1.find("button[type='submit']").text("Update News");
    $('#myNews').modal('show');
  }
}

   </script>

  </body>
</html>