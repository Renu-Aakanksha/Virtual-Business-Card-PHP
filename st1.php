<!DOCTYPE html>
<html lang="en">
<head>

<title><?php print $cname;?> - <?php print $category;?></title>
	<?php $wurl = $_SESSION['wurl']; ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $fdisn;?>">
    <meta name="keywords" content="<?php echo $fkeywn;?>">

	<meta name="msapplication-TileImage" content="https://<?php print $wurl;?>/dash/images/<?php print $bimage;?>"> 
	<meta property="og:image" content="https://<?php print $wurl;?>/dash/images/<?php print $bimage;?>">
	<meta property="og:title" content="<?php print $cname;?> - <?php print $category;?>"/>
	<meta property="og:type" content="website" />
    <meta property="og:image:type" content="image/jpg">
	<meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
	<meta property="og:url" content="https://<?php print $wurl;?>/<?php print $url;?>">
	<meta property="og:site_name" content="<?php print $cname;?> - <?php print $category;?>">
    <meta property="og:description" content="<?php echo $fdisn;?>">

    <?php if (!(empty($pixel))){ echo $pixel; }?>

<!-- Favicons
================================================== -->
<link rel="shortcut icon" href="dash/assets-card/img/favicon.ico" type="image/x-icon">
<link rel="icon" href="dash/assets-card/img/favicon.ico" type="image/x-icon">
<!-- / Favicons
================================================== -->

<!-- >> CSS
============================================================================== -->
<link href="dash/assets-card/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Google Web Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- Font Awesome -->
<link href="dash/assets-card/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- Nivo Lightbox -->
<link href="dash/assets-card/vendor/nivo-lightbox/nivo-lightbox.css" rel="stylesheet">
<link rel="stylesheet" href="dash/assets-card/vendor/nivo-lightbox/themes/default/default.css" type="text/css" />
  <!-- /Nivo Lightbox -->
  <!-- Perfect ScrollBar -->
<link href="dash/assets-card/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
<!-- owl carousel -->
<link href="dash/assets-card/vendor/owl.carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="dash/assets-card/vendor/owl.carousel/owl-carousel/owl.theme.css" rel="stylesheet">
<!-- Main Styles -->

<!--<link href="dash/assets-card/css/styles.css" rel="stylesheet">-->
<?php include('theme.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- >> /CSS
============================================================================== -->
</head>

<body>
<!-- Main Content
================================================== -->
<section id="body">

	<div class="container">

		<!-- MAIN MENU -->
		<div class="main-menu" id="main-menu">
			<ul class="main-menu-list">
				<li><a href="#page-home" class="link-home"><?php echo $nav1; ?></a></li>
				<li><a href="#page-about" class="link-page"><?php echo $nav2; ?></a></li>
                <li><a href="#page-products" class="link-page"><?php echo $nav3; ?></a></li>
				<!--<li><a href="#page-shop" class="link-page"><?php echo $nav7; ?></a></li>-->
				<li><a href="#page-portfolio" class="link-page"><?php echo $nav4; ?></a></li>
				<li><a href="#page-feedback" class="link-page"><?php echo $nav5; ?></a></li>
				<li><a href="#page-contact" class="link-page"><?php echo $nav6; ?></a></li>
				<!--<li><a href="#page-payment" class="link-page">Payment</a></li>-->
			</ul>
		</div>
		<!-- /MAIN MENU -->
		
		<!-- SECTION: Portable Website Body  -->	
		<div class="section-vcardbody section-home" id="section-home">
			<!-- Profile pic-->
			<center><h5 style="color: <?php echo $hoverc; ?>;">[ Total Views : <?php echo $visiterfe;?> ]</h5></center>
			
			<div class="vcard-profile-pic">
			    <img src="dash/images/<?php print $bimagef;?>" id="profile2"  alt="Profile Picture"/>
				<img src="dash/images/<?php print $bimage;?>" id="profile1" class="profileActive" alt="Profile Picture"/>
			</div>
			<!-- /Profile pic -->
			<!-- Description -->
			<div class="vcard-profile-description">
				<!-- Profile title -->
			<!--<h1 class="profile-title">Hi, i'm <span class="color1">John Rex!</span></h1>-->
			    <h1 class="profile-title"><?php print $cname;?></h1>
				<h2 class="profile-subtitle"><?php print $tagline;?></h2>
				<!-- /Profile Title -->
				<!-- Description Text -->
				<hr class="hr1">
				<div class="vcard-profile-description-text">
				<h5><span class="color1"><?php print $name;?></span></h5>
				</div>	
				<!--/ Description Text -->	
						
			</div>
			<!-- /Description -->	
			<!-- Footer -->		
			<div class="vcard-footer">
				<!-- Social Icons -->
				<div class="footer-social-icons">
					<a href="tel:<?php print $mobile;?>"><i class="fa fa-phone"></i></a>
					<a href="https://wa.me/<?php print $wmobile;?>?text=*It's%20feedback%20from%20Portable%20Website.%20I'm%20interested%20in%20your%20service*" target="_blank"><i class="fa fa-whatsapp"></i></a>
					<a href="mailto:<?php print $email;?>"><i class="fa fa-envelope"></i></a>
					<a href="<?php print $fcountry;?>" target="_blank"><i class="fa fa-map-marker"></i></a>
				</div>
				<!-- /Social Icons -->
			</div>
			<br>
			<!-- Description feature -->
			
			<?php
                            if(isset($_POST['wsend'])){
                                $wnumbe = $con->real_escape_string($_POST['wnum']);
                                
                                $date = date("d/m/Y");
                                $que = "INSERT INTO `whatsapp`(`whatsapp`, `cust`, `date`) VALUES ('$wnumbe','$id','$date')";
                                $data_insert = $con->query($que);
                                
                                echo "<script>window.location='https://api.whatsapp.com/send?phone=91".$wnumbe."&text=I love to share you this website : https://$wurl/$url'</script>";
                            }
                            ?>
                            
				<div class="vcard-profile-description-feature">
					<!-- item -->
					<h5 style="padding-top: 10px; color:#000;"><strong>Share your B-Card</strong> </h5>
					<form method="post">
                        <input type="text" name="wnum" placeholder="Whatsapp No." style="width: 70%; border: 1px solid gray; display: inline-block; height: 35px; padding-left: 10px; border-right: none;">
                        <button type="submit" name="wsend"  style="width: 30%; border: 1px solid #03449D; display: inline-block; height: 35px; float: right; background-color: <?php echo $themec; ?>; color: white;">Whatsapp</button>
                    </form>
					<!-- item -->
				</div>	
				<!-- /Description feature -->
				<br>
				<div class="vcard-footer">
				<!-- Social Icons -->
				<div class="footer-social-icons">
					<a style="background-color:#3b5998;" target="_blank" href="<?php print $ffacebook;?>"><i class="fa fa-facebook"></i></a>
					<a style="background-color:#2ba9e1;" target="_blank" href="<?php print $ftwitter;?>"><i class="fa fa-twitter"></i></a>
					<a style="background-color:#007bb6;" target="_blank" href="<?php print $flinkedin;?>"><i class="fa fa-linkedin"></i></a>
					<a style="background-color:#BB095D;" target="_blank" href="<?php print $finstagram;?>"><i class="fa fa-instagram"></i></a>
					<a style="background-color:#FC0000;" target="_blank" href="<?php print $fyoutube;?>"><i class="fa fa-youtube"></i></a>
				</div>
				<!-- /Social Icons -->
				<div>
				<?php $wcname = $_SESSION['wcname']; ?>
				    <h6 style="margin-top: 15px; color: gray;" align="center">Credit : <a href="https://<?php echo $wurl; ?>" target="_blank" style="color: gray;"><?php echo $wcname; ?></a></h6>
				</div>
			</div>
		</div>
		<!-- /SECTION: Portable Website Body  -->	

		<!-- PAGE: ABOUT -->
		<div class="section-vcardbody2 section-page" id="page-about">
            <div>
                
				<!-- Section title -->
	            <h2 class="section-title">ABOUT</h2>
	            
	            <?php
                    if (!empty($sound)){
                        echo '<audio preload="auto" src="dash/'.$sound.'"></audio>';
                    }
                ?>
	            
	            <!-- /Section title -->

				<table class="about-us-table">
                    <tbody>
                        <tr>
                            <td class="table-row-label">
                                <h3 class="table-row-label-text"><strong>Company Name </strong></h3><b class="table-row-label-separator">: &nbsp;</b>
                            <td>
                            <td class="table-row-value">
                                <?php echo $cnamem;?>
                            <td>
                        </tr>
                        <tr>
                                <td class="table-row-label">
                                    <h3 class="table-row-label-text"><strong>Year of Estd.</strong></h3><b class="table-row-label-separator">:&nbsp;</b>
                                <td>
                                <td class="table-row-value">
                                    <?php echo $yearofe;?>
                                <td>
                            </tr>
                            <tr>
                                <td class="table-row-label">
                                    <h3 class="table-row-label-text"><strong>Nature of Business</strong></h3><b class="table-row-label-separator">:&nbsp;</b>
                                <td>
                                <td class="table-row-value">
                                    <?php echo $btype;?>
                                <td>
                            </tr>
                    </tbody>
                </table>
                  
	        </div>
	        
           <!-- SECTION: INTRODUCTION -->
			<div class="section-education">
			
			    <h2 class="section-title2">Introduction</h2>
				<div class="graduation-description">
              	  <p align="justify"><?php echo $intro;?></p>
              	</div>

	            <h2 class="section-title2">Our Specialities</h2>
                <div class="graduation-description">
				<?php echo $speci;?>
				</div>
				
				<h2 class="section-title2">Our Products</h2>
                <div class="graduation-description">
				<?php echo $product;?>
				</div>
				
				<?php if(!empty($resume)){ ?>

                    <h2 class="section-title2">Brochure</h2>
                    <div class="graduation-description">
                        <a href="<?php echo $resume;?>" target="_blank" class="btn" style="background-color: #269e2a;"><?php echo $btnname;?></a>
                    </div>

                <?php } ?>
                
			</div>
			
			
			<!-- Section title -->
            <h2 class="section-title">ABOUT PAYMENT</h2>
            <!-- /Section title -->
			<br>
            <div class="contact-infos">
            	<h4 class="contact-subtitle-1"><i class="fa fa-bank"></i>&nbsp; Bank Transfer</h4>
            	<p><strong>Our Bank Details :</strong><br>
                <?php echo $gbank;?>
            	<h4 class="contact-subtitle-1"><i class="fa fa-google-wallet"></i>&nbsp; Wallet</h4>
            	<?php echo $dwallet;?>
            	
            	<?php 
            	if(!empty($ionline)){
            	    echo '
            	        <h4 class="contact-subtitle-1"><i class="fa fa-cc-visa"></i>&nbsp; Online Payment</h4>
            	        <a href="'.$ionline.'" target="_blank" class="btn" style="background-color: #269e2a;">Online Payment</a>
            	    ';
            	}
            	?>
            	
            </div>
           <!-- Contact infos -->                 
            <!-- /Poayment infos -->
		</div>
		<!-- /PAGE: ABOUT  -->	
		
		<!-- SECTION: PRODUCTS-->
		<div class="section-vcardbody2 section-page" id="page-products">
			<div class="section-blog">

				<!-- Section title -->
	            <h2 class="section-title">Products / Services</h2>
	            <!-- /Section title -->          
				<!-- PRODUCT POSTS -->
				<div class="blog-posts">
				    
		<?php
		$qe = "SELECT * FROM `product` WHERE `cust`='$id'";
        $data = $con->query($qe);
        if($data->num_rows > 0){
            while($rows = $data->fetch_assoc()){
                $pid = $rows['id'];
                $pproduct = $rows['product'];
                $psellprice = $rows['sellprice'];
                $pprice = $rows['price'];
                $purl = $rows['url'];
                $pdis = $rows['dis'];
                $pimage = $rows['image'];
                $pcust = $rows['cust'];
                $pdatee = $rows['datee'];
                $puni = $rows['uni'];
                $ptax = $rows['tax'];
                $ptitle = $rows['title'];
                //if((empty($purl))){
                    echo '
                    <!-- product-item -->
                    <div >
                        <div class="blog-item-wrapper">
                        <!-- product-item-title -->
                        <div class="blog-item-title-wrapper">
                        <h2 class="blog-item-title title-border">'.$pproduct.'</h2>
                        </div>
                        <!-- /product-item-title -->
                        <!-- product item thumbnail -->
                        <div class="blog-item-thumb">
                        <img src="dash/images/'.$pimage.'" alt="Product Image">
                        </div>
                        <p style="font-size:80%;">'.$pdis.'</p>
                        <div class="product-enquiry-section">';
                        
                        if($psellprice > 0){
                            echo' <div class="product-price">
                            <strong>Price :</strong> '; if(!empty($pprice) || $pprice != 0){ echo '<i class="fa fa-inr"></i><del>'.$pprice.'</del>';} echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-inr"></i>&nbsp;'.$psellprice.'
                            </div>
                            <a class="btn btn-default btn-default2" href="https://wa.me/'.$wmobile.'?text=*Its%20feedback%20from%20Portable%20Website.%20Im%20interested%20in%20your%20Full-Fledged%20or%20Portable%20Static-Websites*" target="blank" >
                            <i class="fa fa-paper-plane"></i>&nbsp; SEND ENQUIRY</a>';
                            
                        }else{
                            echo'
                            <a class="btn btn-default btn-default2" style="width:100%" href="https://wa.me/'.$wmobile.'?text=*Its%20feedback%20from%20Portable%20Website.%20Im%20interested%20in%20your%20Full-Fledged%20or%20Portable%20Static-Websites*" target="blank" >
                            <i class="fa fa-paper-plane"></i>&nbsp;  SEND ENQUIRY</a>';
                            
                        }
                        

                        echo '
                            </div><br>';
                            
                            if(!empty($purl)){
                            echo '<a class="btn btn-danger btn-default3" style="width:100%" href="'.$purl.'" target="blank" >
                            <i class="fa fa-paper-plane"></i>&nbsp; '; if(!empty($ptitle)){ echo $ptitle;}else{ echo 'Buy Now'; } echo '</a>';
                        }
                        echo'
                        </div>
                    </div>
                <!-- /product-item -->';
               // }
            }
        }
		?>
			
	</div>
	<!-- /PRODUCT POSTS -->
	</div>			
	</div>
	<!-- /SECTION: PRODUCTS  -->

	
	<!-- SECTION: PORTFOLIO-->
		<div class="section-vcardbody2 section-page" id="page-portfolio">
			<div class="section-portfolio">
			    <h4 class="contact-subtitle-1"><a href="#"> IMAGE GALLERY </a>&nbsp; | &nbsp;<a href="#video">VIDEO GALLERY</a></h4>
               <!-- Section title -->
	            <h2 class="section-title">Image Gallery</h2>
	            <!-- /Section title -->
                <br>
	            <!-- Projects list -->
				<div class="projects-list">
                        <?php          
                        $qu = "SELECT * FROM `banner` WHERE `cust`='$id' AND `display`=1";
                    	$data = $con->query($qu);
                    	if ($data->num_rows > 0) {
                    		while ($rows = $data->fetch_assoc()) {
                    			$bid = $rows['id'];
                    			$bimage = $rows['image'];
                    			$bdisplay = $rows['display'];
                    			
                    			?>
                    			<!-- item -->
                    			<div class="project-item">
                    				<!-- ==> Put your thumbnail as a background -->
                    				<a href="dash/images/<?php print $bimage;?>" class="project-thumbnail nivobox" data-lightbox-gallery="portfolio" style="background-image: url('dash/images/<?php print $bimage;?>');">
                    					
                    				</a>
                    			</div>			
                    			<!-- /item -->
                    			<?php
                    		}
                    	}
                    	?>
					
                  
	
				</div>
				<!-- /projects list -->	

               <div id="video">
                <!-- Video Section -->
                
                        <?php          
                            $qu = "SELECT * FROM `video` WHERE `cust`='$id' ORDER BY id DESC";
                        	$data = $con->query($qu);
                        	if ($data->num_rows > 0) {
                        	    
                                echo "<h2 class='section-title'>Video Gallery</h2>";
                                echo "<br>";
                                while ($rows = $data->fetch_assoc()) { 
                        			$burl= $rows['url'];
                    			    $bti= $rows['name'];
                    			
            			?>
                    			<!-- item -->
                    			<h5 class='title-gallery'><?php echo $bti; ?></h5>
                    			<div class="project-item">
                    				<!-- ==> Put your thumbnail as a background -->
                    				
                    				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php print $burl;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    			</div>			
                    			<!-- /item -->
        			    <?php
                            }
                    	}
                    	?>
					
                  
	
				<!--</div>-->
				<!-- Video Section Ends -->	

              </div>
			</div>			
		</div>
		<!-- /SECTION: PORTFOLIO  -->	
 

		<!-- SECTION: SKILLS-->
		<div class="section-vcardbody2 section-page" id="page-feedback">
			<div class="section-skills">

				<!-- Section title -->
	            <h2 class="section-title">FEEDBACK</h2>
	            <!-- /Section title -->
				<br>
				
				<h2 class="section-title2"><i class="fa fa-commenting"></i>&nbsp; Testimonials</h2>

			<!-- Testimonials -->
			<div class="testimonials">
				<!-- Testimonial Slides -->
				<div class="testimonial-slides" id="testimonial-carousel">
				    
			<?php          
            $quv = "SELECT * FROM `feedback` WHERE `cust`='$id'";
        	$datav = $con->query($quv);
        	if ($datav->num_rows > 0) {
        		while ($rowsv = $datav->fetch_assoc()) {
        			$bidv = $rowsv['id'];
        			$bidvname = $rowsv['name'];
        			$bidvdesi = $rowsv['desi'];
        			$bidvemail = $rowsv['email'];
        			$bidvmessage = $rowsv['message'];
        			
        			?>
        			<!-- item -->
					<div class="testimonial-item">
						<!-- Testimonial Content -->
						<div class="testimonial-content">
							<p>"<?php print $bidvmessage;?>"</p>
						</div>						
						<!-- /Testimonial Content -->	
						<!-- Testimonial Author -->
						<div class="testimonial-credits">
							<p class="testimonial-author"><?php print $bidvname;?></p>
							<p class="testimonial-firm"><?php print $bidvdesi;?></p>
						</div>
						<!-- /Testimonial Author -->								
					</div>
					<!-- /item -->
        			<?php
        		}
        	}
        	?>
					
				</div>
				<!-- Testimonial Slides -->
			</div>
			<!-- /testimonials -->
				<?php
				if(isset($_POST['subd'])){
				    $ccname = $_POST['cperson'];
				    $ccdesign = $_POST['design'];
				    $ccfemail = $_POST['femail'];
				    $ccmsg = $_POST['msg'];
				    
				    $quei = "INSERT INTO `feedback`(`name`, `desi`, `email`, `message`, `cust`) VALUES (?, ?, ?, ?, ?)";
				    $stmt = $con->prepare($quei);
				    $stmt->bind_param("sssss",$ccname,$ccdesign,$ccfemail,$ccmsg,$id);
				    if($stmt->execute()){
				        echo "<script>alert('Submited Successfully!');</script>";
				    }
				    $stmt->close();
				}
				?>
				<br>
                   <form method="post">
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" name="cperson" placeholder="Name" type="text" required />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" name="design" placeholder="Company Name" type="text" required />
		            </div>
		            <!-- /Form Field -->
		              <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" name="femail" placeholder="Email" type="email" required />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<textarea class="form-control required" name="msg" placeholder="Message" rows="5" required></textarea>
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input type="submit" class="btn btn-default form-send" name="subd" value="Send Feedback">
		            </div>  
		            <!-- /Form Field -->
		        </form>
		        <!-- /Feedback Form -->
				 
			</div>	
			
	<?php
    if(isset($_POST['fghdfghdfg'])){
        $contact_person = $_POST['cperson'];
        $desig = $_POST['design'];
        $email = $_POST['femail'];
        $message = $_POST['msg'];
        
        
        $to = 'industrialinfotechweb@gmail.com'; 
        $from = 'sender@example.com'; 
        $fromName = 'Customer Feedback'; 
         
        $subject = "Customer Feedback"; 
         
        $htmlContent = ' 
            <html> 
            <head> 
                <title>Customer Feedback</title> 
            </head> 
            <body> 
                <h1>Customer Feedback</h1> 
                 <p>
                 <strong>Contact Person :</strong> '.$contact_person.' <br>
                 <strong>Designation :</strong> '.$desig.' <br>
                 <strong>Email :</strong> '.$email.' <br>
                 <strong>Message :</strong> '.$message.' <br>
                 
                 </p>
            </body> 
            </html>'; 
         
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
         
        // Additional headers 
        $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
        $headers .= '' . "\r\n"; 
        $headers .= '' . "\r\n"; 
         
        // Send email 
        if(mail($to, $subject, $htmlContent, $headers)){ 
            echo "<script>alert('Request has sent successfully.');</script>"; 
        }else{ 
           echo "<script>alert('Failed To Send.');</script>"; 
        }
    }
    ?>
			
			
			
		</div>
		<!-- /SECTION: SKILLS  -->	

		<!-- SECTION: CONTACT-->
		<div class="section-vcardbody2 section-page" id="page-contact">
			<div class="section-contact">

				<!-- Section title -->
	            <h2 class="section-title">Contact</h2>
	            <!-- /Section title -->
				<br>
               <!-- Contact infos --> 
                <!--<div style="width: 100%;">
                   <iframe src="<?php print $fcountry;?>" width="100%" height="200" frameborder="0" style="border:0"></iframe>
                </div>-->
                <div class="contact-infos">
                    <h4 class="contact-subtitle-1"><i class="fa fa-map"></i>&nbsp;   Address</h4>
                    <p><?php print $address;?></p>
                    <h4 class="contact-subtitle-1"><i class="fa fa-qrcode"></i>&nbsp;   QR - Code</h4>
                    <img src="https://chart.googleapis.com/chart?cht=qr&amp;chs=150x150&amp;chl=https://<?php print $wurl;?>/<?php print $usern;?>" id="qr_code_d">
                    
                    <h4 class="contact-subtitle-1"><i class="fa fa-phone-square"></i>&nbsp; Contact</h4>
                    <p><strong>Call :</strong> +<?php print $mobile;?> <a href="tel:+<?php print $mobile;?>"> 
                    <i style="font-size:25px"class="fa fa-phone-square"></i> </a> <br><br>
                    
                    <strong>WhatsApp :</strong> +<?php print $wmobile;?> <a href="https://api.whatsapp.com/send?phone=<?php print $wmobile;?>"> 
                    <i style="font-size:25px; color:#075e54" class="fa fa-whatsapp"></i> </a></p>
                    
                    <h4 class="contact-subtitle-1"><i class="fa fa-arrow-down"></i>&nbsp; Save Contacts to Phone</h4>
                    <a href="VcardExport.php?name=<?php print $cnamem;?>&num=<?php print $mobile;?>&email=<?php print $email;?>" class="btn" style="background-color: #269e2a;">Click to Save</a>
                    
                    <h4 class="contact-subtitle-1"> <i class="fa fa-envelope"></i>&nbsp; E - Mail</h4>
                    <p><?php print $email;?></p>
                </div>
                <!-- /Contact infos --> 

	            <!-- Contact form -->
	            <h4 class="contact-subtitle-1"><i class="fa fa-paper-plane-o"></i>&nbsp; Send Me a Message</h4>
		        <form method="post">
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="name" name="contactp" placeholder="Name" type="text" required />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="email" name="cemail" placeholder="Email" type="email" required />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="subject" type="text" name="csubject" placeholder="Subject" required>
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<textarea class="form-control required" id="message" name="cmsg" placeholder="Message" rows="5" required></textarea>
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input type="submit" class="btn btn-default form-send" name="subt" value="Send Message" style="margin-bottom:50px;">
		            </div>  
		            <!-- /Form Field -->
		        </form>
		        <!-- /Contact Form -->

			</div>	
			<?php
    if(isset($_POST['subt'])){
        $c_person = $_POST['contactp'];
        $c_email = $_POST['cemail'];
        $c_sub = $_POST['csubject'];
        $c_message = $_POST['cmsg'];
        
        $wemail = $_SESSION['wemail'];
        $to = $email; 
        $from = 'sender@'.$wemail; 
        $fromName = 'Contact from Portable Website'; 
         
        $subject = "Contact from Portable Website"; 
         
        $htmlContent = ' 
            <html> 
            <head> 
                <title>Contact from Portable Website</title> 
            </head> 
            <body> 
                <h1>Contact from Portable Website</h1> 
                 <p>
                 <strong>Contact Person :</strong> '.$c_person.' <br>
                 <strong>Email :</strong> '.$c_email.' <br>
                 <strong>Subject :</strong> '.$c_sub.' <br>
                 <strong>Message :</strong> '.$c_message.' <br>
                 
                 </p>
            </body> 
            </html>'; 
         
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
         
        // Additional headers 
        $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
        $headers .= '' . "\r\n"; 
        $headers .= '' . "\r\n"; 
         
        // Send email 
        if(mail($to, $subject, $htmlContent, $headers)){ 
            echo "<script>alert('Request has sent successfully.');</script>"; 
        }else{ 
           echo "<script>alert('Failed To Send.');</script>"; 
        }
    }
    ?>
			
			
		</div>
		<!-- /SECTION: CONTACT  -->
		
		
		<!-- SECTION: PAYMENT-->
		<!--<div class="section-vcardbody2 section-page" id="page-payment">
			<div class="section-contact">-->
                <!-- this content is transfered to about section-->
			<!--</div>			
		</div>-->
		<!-- /SECTION: PAYMENT  -->	
		
		
	</div>
</section>
<!-- /Main Content -->

<!-- ================================================== -->

<style type="text/css">
  .mobileShow {display: none;}

  /* Smartphone Portrait and Landscape */
  @media only screen
    and (min-device-width : 320px)
    and (max-device-width : 800px){ 
      .mobileShow {display: inline;}
  }
</style>

   <div class="footer mobileShow">
            <ul class="footer-menu">
                <li>
                    <a  style="text-decoration: none;" class="footer-menu-link" href="#section-home">
                        <i style="color:<?php echo $hoverc; ?>; font-size:200%;" class="fa fa-home"></i>
                        <div class="footer-menu-text"><?php echo $nav1; ?></div>
                    </a>
                </li>
                <li>
                        <a  style="text-decoration: none;" class="footer-menu-link" href="#page-about">
							<i style="color:<?php echo $hoverc; ?>; font-size:200%;"  class="fa fa-briefcase"></i>
                        <div class="footer-menu-text"><?php echo $nav2; ?></div>
                        </a>
                    </li>
                <li>
                        <a  style="text-decoration: none;" class="footer-menu-link" href="#page-products">
							<i style="color:<?php echo $hoverc; ?>; font-size:200%;"  class="fa fa-dropbox"></i>
                        <div class="footer-menu-text"><?php echo $nav3; ?></div>
                        </a>
                    </li>
                
                <li>
                        <a  style="text-decoration: none;" class="footer-menu-link" href="#page-portfolio">
							<i style="color:<?php echo $hoverc; ?>; font-size:200%;"  class="fa fa-file-image-o"></i>
                            <div class="footer-menu-text"><?php echo $nav4; ?></div>
                        </a>
                    </li>
                
                <li>
                        <a  style="text-decoration: none;" class="footer-menu-link" href="#page-feedback">
							<i style="color:<?php echo $hoverc; ?>; font-size:200%;"  class="fa fa-star-half-o"></i>
                            <div class="footer-menu-text"><?php echo $nav5; ?></div>
                        </a>
                    </li>
                <li>
                        <a  style="text-decoration: none;" class="footer-menu-link" href="#page-contact">
							<i style="color:<?php echo $hoverc; ?>; font-size:200%;"  class="fa fa-comment"></i>
                            <div class="footer-menu-text"><?php echo $nav6; ?></div>
                        </a>
                    </li>
            </ul>
        </div>

		
<!-- >> JS
============================================================================== -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="dash/assets-card/vendor/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="dash/assets-card/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="dash/assets-card/vendor/validate.js"></script>
<!-- Holder JS -->
<script src="dash/assets-card/vendor/holder.js"></script>
<!-- Modal box-->
<script src="dash/assets-card/vendor/nivo-lightbox/nivo-lightbox.min.js"></script>
<!-- /Modal Box -->
<!-- Perfect ScrolBar -->
<script src="dash/assets-card/vendor/perfect-scrollbar/js/min/perfect-scrollbar.jquery.min.js"></script>
<!-- /Perfect ScrolBar -->
<!-- Owl Caroulsel -->
<script src="dash/assets-card/vendor/owl.carousel/owl-carousel/owl.carousel.js"></script>
<!-- Google Maps -->
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!-- Cross-browser -->
<script src="dash/assets-card/vendor/cross-browser.js"></script>
<!-- Main Scripts -->

<script src="assets/js/audio.min.js"></script>

<script>
    $('audio').initAudioPlayer();
</script>


<script src="dash/assets-card/js/main.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="vendor/html5shiv.js"></script>
  <script src="vendor/respond.min.js"></script>
<![endif]-->
<!-- >> /JS
============================================================================= -->
</body>
</html>

<style>
.ppq-audio-player {
    line-height: 111px;
    position: relative;
    overflow: hidden;
    height: 111px;
    margin: 0 auto;
    background: none; 
}

.ppq-audio-player .play-pause-btn .play-pause-icon {
    position: relative;
    display: block;
    width: 47px;
    height: 47px;
    border: 3px solid <?php echo $themec; ?>;
    border-radius: 100%;
    background: none; 
}
.ppq-audio-player .player-bar .player-bar-played {
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    border-radius: 3px;
    background: <?php echo $hoverc; ?>;
}
</style>