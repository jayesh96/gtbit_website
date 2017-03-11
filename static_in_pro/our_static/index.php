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
   include("header.html");
   
   
   ?>
  <!--START SCROLL TOP BUTTON -->
    
  <!-- end GTBIT GTBIT search box -->
  <!-- Start GTBIT  Slider -->
  <section id="ad-slider">
    <!-- Start GTBIT  single slider item -->
    <div class="ad-slider-single">
      <div class="ad-slider-img">
        <figure>
          <img src="assets/img/slider/1.jpg" alt="img">
        </figure>
      </div>
      <div class="ad-slider-content">
        <h4>Welcome To GTBIT</h4>
        <span></span>
        <h2>We Will Help You To Learn</h2>
        <p>Guru Tegh Bahadur Institute of Technology (GTBIT) aims to be among the premier institutes of engineering and technology in the country, recognised for excellence in Teaching, R&D, Sports, Cultural and Social Arena.</p>
        <a href="aboutus.php" class="ad-read-more-btn">Read More</a>
      </div>
    </div>
    <!-- Start GTBIT  single slider item -->
    <!-- Start GTBIT  single slider item -->
    <div class="ad-slider-single">
      <div class="ad-slider-img">
        <figure>
          <img src="assets/img/slider/1.jpg" alt="img">
        </figure>
      </div>
      <div class="ad-slider-content">
        <h4>Welcome To GTBIT</h4>
        <span></span>
        <h2>We Will Help You To Learn</h2>
        <p>Guru Tegh Bahadur Institute of Technology (GTBIT) aims to be among the premier institutes of engineering and technology in the country, recognised for excellence in Teaching, R&D, Sports, Cultural and Social Arena.</p>
        <a href="#" class="ad-read-more-btn">Read More</a>
      </div>
    </div>
    <!-- Start GTBIT  single slider item -->
    <!-- Start GTBIT  single slider item -->
    <div class="ad-slider-single">
      <div class="ad-slider-img">
        <figure>
          <img src="assets/img/slider/1.jpg" alt="img">
        </figure>
      </div>
      <div class="ad-slider-content">
        <h4>Welcome To GTBIT</h4>
        <span></span>
        <h2>We Will Help You To Learn</h2>
        <p>Guru Tegh Bahadur Institute of Technology (GTBIT) aims to be among the premier institutes of engineering and technology in the country, recognised for excellence in Teaching, R&D, Sports, Cultural and Social Arena.</p>
        <a href="#" class="ad-read-more-btn">Read More</a>
      </div>
    </div>
    <!-- Start GTBIT  single slider item -->    
  </section>
  <!-- end GTBIT GTBITSlider -->
  <!-- Start GTBIT  GTBIT heading-->
  <div style="padding:80px 0 30px 0;" class="text-center">
  <h2>Why Guru Tegh Bahadur Institute of Technology</h2>
  <p>At GTBIT we are passionate about grooming leaders who are not only thorough professionals but also good human beings with values and sanskars.</p>
</div>
<!-- end GTBIT GTBITGTBIT heading-->
  <!-- Start GTBIT  counter -->
  <section id="ad-abtus-counter">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="ad-abtus-counter-area">
            <div class="row">
              <!-- Start GTBIT  counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="ad-abtus-counter-single">
                  <span class="fa fa-book"></span>
                  <h4 class="counter">5986</h4>
                  <p>Books in Library</p>
                </div>
              </div>
              <!-- end GTBIT GTBITcounter item -->
              <!-- Start GTBIT  counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="ad-abtus-counter-single">
                  <span class="fa fa-users"></span>
                  <h4 class="counter">3500</h4>
                  <p>Students</p>
                </div>
              </div>
              <!-- end GTBIT GTBITcounter item -->
              <!-- Start GTBIT  counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="ad-abtus-counter-single">
                  <span class="fa fa-flask"></span>
                  <h4 class="counter">65</h4>
                  <p>Modern Lab</p>
                </div>
              </div>
              <!-- end GTBIT GTBITcounter item -->
              <!-- Start GTBIT  counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="ad-abtus-counter-single no-border">
                  <span class="fa fa-user-secret"></span>
                  <h4 class="counter">250</h4>
                  <p>Teachers</p>
                </div>
              </div>
              <!-- end GTBIT GTBITcounter item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end GTBIT GTBITcounter -->
  
  
<!--Start GTBIT notification, events, notice board tab-->
<div class="container notify" id="info_gtbit">

  <div class="row ">
    <div class="col-lg-10 col-md-offset-1">
          
          <section class="tab wow fadeInLeft">
            <header class="panel-heading tab-bg-dark-navy-blue">
              <ul class="nav nav-tabs nav-justified ">
              <li class="">
                  <a data-toggle="tab" href="#notice-board">
                    Notice board
                  </a>
                </li>
                <li class="active">
                  <a data-toggle="tab" href="#news">
                    News
                  </a>
                </li>
                <li>
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
                $sql = "SELECT * FROM news where hide='0'";
                $query = $conn->query($sql);
                if ($query->num_rows > 0) {
                
                while($row = $query->fetch_assoc()) {
                
                      $title = $row['title'];
                      $date = $row['date'];
                      $shortdesc = $row['shortdesc'];
                      $type="news";
                ?>
                <article class="media"  onclick="submitform('news_<?php echo $row['id']?>')">
                <a class="pull-left thumb p-thumb">
                  <img src="images/21.png" alt="">
                </a>
                <div class="media-body b-btm">
                <a class="p-head">
                      
                        <?php echo $title;?>
                      </a><i><?php echo date("d-m-Y", strtotime($row['date'])); ?></i>
                      <p>
                        <?php echo $shortdesc; ?>
                      </p>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF'].'#info_gtbit'; ?>" method="post" id="news_<?php echo $row['id']?>">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <input type="hidden" name="table" value="news"></form>

                  </article>
                    <?php 
                  }
                }
                  ?>
                </div>


                <div id="events" class="tab-pane fade">
                <?php 
                $sql = "SELECT * FROM events where hide='0'";
                $query = $conn->query($sql);
                if ($query->num_rows > 0) {
                
                while($row = $query->fetch_assoc()) {
                
                      $title = $row['title'];
                      $date = $row['date'];
                      $shortdesc = $row['shortdesc'];
                      $type="events";
                ?>
                  <article class="media" onclick="submitform('events_<?php echo $row['id']?>')">
                    <a class="pull-left thumb p-thumb">
                      <img src="images/21.png" alt="">
                    </a>
                    <div class="media-body b-btm">
                    <a class="cmt-head"> 
                      
                      
                       <?php echo $title;?>
                      </a>
                      <p><i class="fa fa-calendar">
                        </i> <?php echo date("d-m-Y", strtotime($row['date']));?>
                      </p>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF'].'#info_gtbit'; ?>" method="post" id="events_<?php echo $row['id']?>">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <input type="hidden" name="table" value="events"></form>
                  </article>
                  <?php 
                  }
                }
                  ?>          
                </div>
                <div id="notice-board" class="tab-pane fade">
                 <?php 
                $sql = "SELECT * FROM notices where hide='0'";
                $query = $conn->query($sql);
                if ($query->num_rows > 0) {
                
                while($row = $query->fetch_assoc()) {
                
                      $title = $row['title'];
                      $date = $row['date'];
                      $file=$row['file'];
                      $type="notices";
                ?>
                 <article class="media">
                    <a class="pull-left thumb p-thumb">
                      <img src="images/21.png" alt="">
                    </a>
                    <div class="media-body b-btm">
                    <?php 
                    
                    
                    
                     ?>
                      <a href="<?php echo $file;?>">
                       <?php echo $title;?>
                      </a>
                      <p>

                        <i class="fa fa-time">
                        </i>
                        <?php echo $date;?>
                      </p>
                    </div>
                  </article>
                  <?php 
                  }
                }
                  ?>
                  
                </div>
              </div>
            </div>
          </section>
    </div>
</div>
</div>


<?php if($_POST) {

  $id = $_POST['id'];
$table = $_POST['table'];

$sql = "select * from $table where id='$id'";
$query = $conn->query($sql);

if ($query->num_rows > 0) {
    while($row = $query->fetch_assoc()) {
    $title=$row["title"];
    $date=$row["date"];
    $shortdesc=$row["shortdesc"];
      $longdesc=$row["longdesc"];
  
   }
  
 }
$conn->close();

                      echo "<script>$(document).ready(function(){
  $('#view_modal').modal('show');
});</script>";
}
   ?>
      <div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="view_modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="view_modalLabel"><?php echo htmlentities($title);?></h3>
        <p>DATE</p>
      </div>
      <div class="modal-body">
      <p>
        <?php echo htmlentities($shortdesc);?>
      </p>
      <br/>
      <p>
        <?php echo ($longdesc);?>
      </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



  <!-- Start GTBIT  testimonial -->
  <section id="ad-testimonial">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="ad-testimonial-area">
            <div id="ad-testimonial-slide" class="ad-testimonial-content">
              <!-- Start GTBIT  testimonial single item -->
              <div class="ad-testimonial-item">
                <div class="ad-testimonial-quote">
                  <blockquote>
                    <p>Joining an engineering college is pretty boring but GTBIT is totally opposite of that. You surely have the academic learning as per the curriculum but in GTBIT there is a lot more to do and to learn.</p>
                  </blockquote>
                </div>
                <div class="ad-testimonial-img">
                  <img src="assets/img/gaurav.jpg" alt="Gaurav">
                </div>
                <div class="ad-testimonial-info">
                  <h4>Gaurav Sharma</h4>
                  <span>GTBIT Alumni <br/>System Engineer At Computer Sciences Corporation</span>
                </div>
              </div>
              <!-- end GTBIT GTBITtestimonial single item -->
              <!-- Start GTBIT  testimonial single item -->
              <div class="ad-testimonial-item">
                <div class="ad-testimonial-quote">
                  <blockquote>
                    <p>I believe it is in the student's hand how well he can shape up his academics. College will certainly be a pillar of support, but it's upto the student to notch up his grades.</p>
                  </blockquote>
                </div>
                <div class="ad-testimonial-img">
                  <img src="assets/img/shourya.jpg" alt="shourya">
                </div>
                <div class="ad-testimonial-info">
                  <h4>Shourya Malik</h4>
                  <span>Quality Engineer - schneider Electric</span>
                </div>
              </div>
              <!-- end GTBIT GTBITtestimonial single item -->
              <!-- Start GTBIT  testimonial single item -->
              <div class="ad-testimonial-item">
                <div class="ad-testimonial-quote">
                  <blockquote>
                    <p>GTBIT has transformed me. I was able to discover the hidden treasure within me. The company of great friends I got in college here is the biggest asset of my life.</p>
                  </blockquote>
                </div>
                <div class="ad-testimonial-img">
                  <img src="assets/img/gursimrat.jpg" alt="gursimrat">
                </div>
                <div class="ad-testimonial-info">
                  <h4>Gursimrat Bawa</h4>
                  <span>Persuing Aero Space Engineering from University of Sydney</span>
                </div>
              </div>
              <!-- end GTBIT GTBITtestimonial single item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end GTBIT GTBITtestimonial -->
  
<?php include("footer.html"); ?>
  <!-- end GTBIT footer -->
  
  <!-- jQuery library -->
   
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
  <script type="text/javascript">
  
   $('#view_modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('id') 
  var table = button.data('table')
  <?php
  $sql = "select * from $table where id='$id'";
$query = $conn->query($sql);


  ?>

  var modal = $(this)
  modal.find('.modal-title').text('')
  modal.find('.modal-body input').val(recipient)
});

  </script>

  <script type="text/javascript"> 
        function submitform(ch) { 
        ch='#'+ch;  $(ch).submit(); } 
   </script>

  </body>
</html>