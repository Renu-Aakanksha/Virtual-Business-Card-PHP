<?php

date_default_timezone_set("Asia/Kolkata");
session_start();
if($_SERVER['HTTP_HOST']=="localhost"){$connect=mysqli_connect("localhost","root","","site101") or die ('Database not available...');}else {$connect=mysqli_connect("localhost","vsitein_site101","site101db@5","vsitein_site101") or die ('Connection issue #567844 Error');}
$date=date('Y-m-d H:i:s');


$query=mysqli_query($connect,'SELECT * FROM digi_card WHERE  card_id="'.$_GET['n'].'" ');

    
$row=mysqli_fetch_array($query);
?>



<head>

 
        <!-- HTML Meta Tags -->
        <title><?php if(!empty($row['d_comp_name'])){echo $row['d_comp_name'];} ?> || Digital Visiting Card Online </title>
       

        <!-- Facebook Meta Tags -->
		 <meta property="og:image:secure_url" itemprop="image" content="<?php if(!empty($row['d_logo_location'])){echo 'https://'.$_SERVER['HTTP_HOST'].'/'.str_replace('../','',$row['d_logo_location']);} ?>">
<meta property="image" itemprop="image" content="<?php if(!empty($row['d_logo_location'])){echo 'https://'.$_SERVER['HTTP_HOST'].'/'.str_replace('../','',$row['d_logo_location']);} ?>">
<meta property="og:image"  content="<?php if(!empty($row['d_logo_location'])){echo 'https://'.$_SERVER['HTTP_HOST'].'/'.str_replace('../','',$row['d_logo_location']);} ?>">
        <meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'].'/'.$row['card_id']; ?>">
        <meta property="og:type" content="website">
        <meta property="og:title" content="<?php if(!empty($row['d_comp_name'])){echo $row['d_comp_name'];} ?> || Digital Visiting Card Online">
        <meta property="og:description" content=" <?php if(!empty($row['d_f_name'])){echo $row['d_f_name'].' '.$row['d_l_name'];} ?><?php if(!empty($row['d_position'])){echo ' ('.$row['d_position'].')';} ?><?php if(!empty($row['d_about_us'])){echo ' '.$row['d_about_us'].'';} ?>">
       
        <!-- Twitter Meta Tags -->
		 <meta name="twitter:image" content="<?php if(!empty($row['d_logo'])){echo 'https://'.$_SERVER['HTTP_HOST'].'/'.str_replace('../','',$row['d_logo_location']);} ?>">

        <meta property="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'].'/'.$row['card_id']; ?>">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="<?php if(!empty($row['d_comp_name'])){echo $row['d_comp_name'];} ?> || Digital Visiting Card Online">
        <meta name="twitter:description" content=" <?php if(!empty($row['d_f_name'])){echo $row['d_f_name'].' '.$row['d_l_name'];} ?><?php if(!empty($row['d_position'])){echo ' ('.$row['d_position'].')';} ?><?php if(!empty($row['d_about_us'])){echo ' '.$row['d_about_us'];} ?>">
       
        <!-- Meta Tags Generated via -->
      
		<link rel="icon" href="<?php if(!empty($row['d_logo'])){echo 'data:image/x-icon;base64,'.base64_encode($row['d_logo']);} ?>" type="image/*" sizes="16x16"/>

<link rel="manifest" href="manifest.json">
 

  <!-- Required meta tags -->
		  <meta charset="utf-8" />
		  <!-- Required meta tags -->
		  <meta charset="utf-8" />
		  <link rel='stylesheet' href='panel/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		  <link rel="stylesheet" href="panel/awesome.min.css">
  
 <!-- Required css  -->
		 <meta      name='viewport'      content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />

		<link rel="stylesheet" href="css.css" >
		<link rel="stylesheet" href="mobile_css.css" >
		<script src="master_js.js"></script>





<?php
$query=mysqli_query($connect,'SELECT * FROM digi_card WHERE  card_id="'.$_GET['n'].'" ');

if(mysqli_num_rows($query)==0){
	
	echo '<meta http-equiv="refresh" content="100;URL=../index.php">';
}else {
	$row=mysqli_fetch_array($query);
}


// check if more then 1 year 
if(strlen($row['f_user_email']) > 3){

if($row['d_card_status']=="Active" && $row['d_payment_status']=="Success"){
			 $old_date=strtotime($row['d_payment_date']);
			 $today_date=strtotime($date);
			 // 31536000 is one year
			 	 $renew_date=($today_date-$old_date)/31536000;
			
			if($renew_date>$old_date){
				mysqli_query($connect,'UPDATE digi_card SET d_payment_status="Pending", d_card_status="Inactive" WHERE id="'.$row['id'].'"');
				
			}else {
				mysqli_query($connect,'UPDATE digi_card SET d_payment_status="Success", d_card_status="Active" WHERE id="'.$row['id'].'"');
			}
}
	// check if trial avtive 

	if($row['d_payment_status']=="Created" && $row['d_card_status']=="Active" ){
		//604800 is 7 days
			  $today=strtotime($date);
			  $card_created=strtotime($row['uploaded_date']);
			 $f_date=($today-$card_created)/86400;
			
		
			
			if($f_date > 1){
				mysqli_query($connect,'UPDATE digi_card SET d_payment_status="Created", d_card_status="Inactive" WHERE id="'.$row['id'].'"');
				
			}else {
				mysqli_query($connect,'UPDATE digi_card SET d_payment_status="Created", d_card_status="Active" WHERE id="'.$row['id'].'"');
			}
	}
	

	
	// check if card avtive

	
}else {
	
}
if($row['d_card_status']=="Inactive"){
	
	echo '<div class="full_page_alert"><a href="https://'.$_SERVER['HTTP_HOST'].'/panel/login/payment_page/pay.php?id='.$row['id'].'"><div class="alert danger">Card is Deactiveted. </div>If this is your card. Click here to activate your card.<div class="btn2">Activate Now</div></div>';
}


?>
<link rel="stylesheet" href="<?php if(!empty($row['d_css'])){echo 'panel/'.$row['d_css'];}else {echo 'panel/card_css1.css';} ?>" >

<script>

$(document).ready(function(){
	$('.mobile_home').on('click',function(){
		$('#header').toggleClass('add_height');
		
	})
})

</script>

<style>
.full_page_alert {position: fixed;
    width: -webkit-fill-available;
    height: -webkit-fill-available;
    background: white;
    top: 0;
    z-index: 9999999;
    padding: 63px;
    text-align: center;}

</style>


<script>
	

</script>
<!----------------------copy from here ------------------------->


	<div class="card" id="home" >
	
	<?php
//view counter
			
			$query_views=mysqli_query($connect,'SELECT * FROM views WHERE ip="'.$_SERVER['REMOTE_ADDR'].'" AND card_id="'.$row['id'].'"');
		// count views 
			
			
			if(mysqli_num_rows($query_views) >> 0){}
			else {
				$insert_view=mysqli_query($connect,'INSERT INTO views (ip,uploaded_date,card_id) VALUES ("'.$_SERVER['REMOTE_ADDR'].'","'.$date.'","'.$row['id'].'")');
			}
			$query_views_count=mysqli_query($connect,'SELECT * FROM views WHERE card_id="'.$row['id'].'"');
			// count views 
			echo '<div class="view_counter"><i class="fa fa-eye"></i> <br>'.mysqli_num_rows($query_views_count).'</div>';
// view counter
			?>
			
			<div class="card_content"><img src="<?php if(!empty($row['d_logo'])){echo 'data:image/*;base64,'.base64_encode($row['d_logo']);} ?>" alt="Logo"></div>
			<div class="card_content2">
				<h2><?php if(!empty($row['d_comp_name'])){echo $row['d_comp_name'];} ?></h2>
				<p><?php if(!empty($row['d_f_name'])){echo $row['d_f_name'].' '.$row['d_l_name'];} ?></p>
				<p><?php if(!empty($row['d_position'])){echo $row['d_position'];} ?></p>
				
			</div>
			<div class="dis_flex">
				<?php if(!empty($row['d_contact'])){echo '<a href="tel:+91'.$row['d_contact'].'" target="_blank"><div class="link_btn"><i class="fa fa-phone"></i> Call</div></a>';} ?>
				<?php if(!empty($row['d_whatsapp'])){echo '<a href="https://api.whatsapp.com/send?phone='.str_replace(array('+91','+'),array('91',''),$row['d_whatsapp']).'&text=Hi, '.$row['d_comp_name'].'" target="_blank"><div class="link_btn"><i class="fa fa-whatsapp"></i> WhatsApp</div></a>';} ?>
				
				
				
				<?php if(!empty($row['d_location'])){echo '<a href="'.$row['d_location'].'" target="_blank"><div class="link_btn"><i class="fa fa-map-marker"></i> Direction</div></a>';} ?>
				<?php if(!empty($row['d_email'])){echo '<a href="Mailto:'.$row['d_email'].'" target="_blank"><div class="link_btn"><i class="fa fa-envelope"></i> Mail</div></a>';} ?>
				<?php if(!empty($row['d_website'])){echo '<a href="'.$row['d_website'].'" target="_blank"><div class="link_btn"><i class="fa fa-globe"></i> Website</div></a>';} ?>
			
			</div>
	
			<div class="contact_details">
				<?php if(!empty($row['d_contact'])){echo '<div class="contact_d"><i class="fa fa-phone"></i><p>'.$row['d_contact'].'</p></div>';} ?>
				<?php if(!empty($row['d_contact2'])){echo '<div class="contact_d"><i class="fa fa-phone"></i><p>'.$row['d_contact2'].'</p></div>';} ?>
				<?php if(!empty($row['d_email'])){echo '<div class="contact_d"><i class="fa fa-envelope"></i><p>'.$row['d_email'].'</p></div>';} ?>
				<?php if(!empty($row['d_address'])){echo '<div class="contact_d"><i class="fa fa-map-marker" ></i><p>'.$row['d_address'].'</p></div>';} ?>
				
			</div>
			
			<div class="dis_flex">
				<div class="share_wtsp">
					<form action="https://api.whatsapp.com/send" id="wtsp_form" target="_blank"><input type="text"  name="phone" placeholder="WhatsApp Number with Country code	" value="+91"><input type="hidden" name="text" value="https://<?php echo $_SERVER['HTTP_HOST']; ?>/<?php echo $row['card_id']; ?>"><div class="wtsp_share_btn" onclick="subForm()"><i class="fa fa-whatsapp"></i> Share</div></form>
					
					<script>
					
					$(document).ready(function(){
						$('.wtsp_share_btn').on('click',function(){
							$('#wtsp_form').submit();
						})
						
					})
					</script>
				</div>
			</div>
			
			<div class="dis_flex">
			
			<?php if(!empty($row['d_contact'])){echo '<a href="contact_download.php?id='.$row['id'].'"><div class="big_btns">Save to Contacts <i class="fa fa-download"></i></div></a>';} ?>
				
				<div class="big_btns" id="share_box_pop">Share <i class="fa fa-share-alt"></i></div>
			
				<div class="share_box">
				
				
				<div class="close" id="close_sharer">&times;</div>
				<p>Share My Digital Card </p>
						<a href="https://api.whatsapp.com/send?text=https://<?php echo $_SERVER['HTTP_HOST']; ?>/<?php echo $row['card_id']; ?>"><div class="shar_btns"><i class="fa fa-whatsapp" id="whatsapp2"  target="_blank"></i><p>WhatsApp</p></div></a>
					<a href="sms:?body=https://<?php echo $_SERVER['HTTP_HOST']; ?>/<?php echo $row['card_id']; ?>" target="_blank"><div class="shar_btns"><i class="fa fa-comment" ></i><p>SMS</p></div></a>
					
					<a href="https://www.facebook.com/sharer/sharer.php?u=https://<?php echo $_SERVER['HTTP_HOST']; ?>/<?php echo $row['card_id']; ?>" target="_blank"><div class="shar_btns"><i class="fa fa-facebook" ></i><p>Facebook</p></div></a>
					<a href="https://twitter.com/intent/tweet?text=https://<?php echo $_SERVER['HTTP_HOST']; ?>/<?php echo $row['card_id']; ?>" target="_blank"><div class="shar_btns"><i class="fa fa-twitter"></i><p>Twitter</p></div></a>
					<a href="" target="_blank"><div class="shar_btns"><i class="fa fa-instagram"></i><p>Instagram</p></div></a>
					<a href="https://www.linkedin.com/cws/share?url=https://<?php echo $_SERVER['HTTP_HOST']; ?>/<?php echo $row['card_id']; ?>" target="_blank"><div class="shar_btns"><i class="fa fa-linkedin"></i><p>Linkedin</p></div></a>
				</div>
			
				<script>
					$(document).ready(function(){
						$('#close_sharer,#share_box_pop').on('click',function(){
							$('.share_box').slideToggle();
						});
					})
				
				
				</script>
			
			</div>
			<div class="dis_flex">
			
				<?php if(!empty($row['d_fb'])){echo '<a href="'.$row['d_fb'].'" target="_blank"><div class="social_med" ><i class="fa fa-facebook"></i></div></a>';} ?>
				<?php if(!empty($row['d_youtube'])){echo '<a href="'.$row['d_youtube'].'" target="_blank"><div class="social_med"><i class="fa fa-youtube"></i></div></a>';} ?>
				<?php if(!empty($row['d_twitter'])){echo '<a href="'.$row['d_twitter'].'" target="_blank"><div class="social_med"><i class="fa fa-twitter"></i></div></a>';} ?>
				<?php if(!empty($row['d_instagram'])){echo '<a href="'.$row['d_instagram'].'" target="_blank"><div class="social_med"><i class="fa fa-instagram"></i></div></a>';} ?>
				<?php if(!empty($row['d_linkedin'])){echo '<a href="'.$row['d_linkedin'].'" target="_blank"><div class="social_med"><i class="fa fa-linkedin"></i></div></a>';} ?>
				<?php if(!empty($row['d_pinterest'])){echo '<a href="'.$row['d_pinterest'].'" target="_blank"><div class="social_med"><i class="fa fa-pinterest"></i></div></a>';} ?>
			</div>
			
			
			
	
	</div>
	
	

<!------------------------->
	<div class="card2" id="scan_qr">
	
	<h3>Scan QR Code to download the contact details</h3>
	
	
	<img src="https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=https://<?php echo $_SERVER['HTTP_HOST'];?>/<?php echo $row['card_id']; ?>" id="qr_code_d">
	
	</div>
	
	
<!--------------about us --------------------------->	
	
	<div class="card2" id="about_us">
		<h3>About Us</h3>
	<?php if(!empty($row['d_comp_est_date'])){echo '<p>'.$row['d_comp_est_date'].'</p>';} ?>
	<?php if(!empty($row['d_about_us'])){echo '<p>'.$row['d_about_us'].'</p>';} ?>
			
		
	
	</div>
	
<!------------shopping online-------------------------->


<?php 
if(isset($row['id'])){
			
	$query3=mysqli_query($connect,'SELECT * FROM products WHERE id="'.$row['id'].'" ');
	$row3=mysqli_fetch_array($query3);
		}

	if(!empty($row3["pro_name1"]) || !empty($row3["pro_name2"]) || !empty($row3["pro_name3"]) || !empty($row3["pro_name4"]) || !empty($row3["pro_name5"])|| !empty($row3["pro_name6"])|| !empty($row3["pro_name7"])|| !empty($row3["pro_name8"])|| !empty($row3["pro_name9"])|| !empty($row3["pro_name10"])){ ?>
	<div class="card2" id="shop_online">
		<h3>Shop Online </h3><h3>From Our Store</h3>
		
		
		<?php 
		for($x=0;$x<=20;$x++){
			if(!empty($row3["pro_name$x"])){
				
				echo '<div class="order_box">';
				
				echo '<img src="data:image/*;base64,'.base64_encode($row3["pro_img$x"]).'" alt="Product">';
				echo '<h2>'.$row3["pro_name$x"].'</h2>';
				echo '<p><del>'.$row3["pro_mrp$x"].' <i class="fa fa-rupee"></i></del></p>';
				echo '<h4>'.$row3["pro_price$x"].' <i class="fa fa-rupee"></i></h4>';
				echo "<a href='".$row3["d_pro_url$x"]."' target='_blank'><div class='btn_buy'>".$row3["d_pro_btn$x"]."</div></a>";
				echo '</div>';
			} 
		}
			
		?>
		
		
	</div>
<?php } ?>
	
		
	
	
<!--------------youtube videos--------------------------->	

<?php 	if(!empty($row["d_youtube1"]) || !empty($row["d_youtube2"]) || !empty($row["d_youtube3"]) || !empty($row["d_youtube4"]) || !empty($row["d_youtube5"])){ ?>
	<div class="card2" id="youtube_video">
		<h3>Youtube Videos</h3>
		
		
		<?php 
		for($x=0;$x<=10;$x++){
			if(!empty($row["d_youtube$x"])){
				
					
				$array1=array('youtu.be/','watch?v=','&feature=youtu.be');
				$array2=array('www.youtube.com/embed/','embed/','');
				
				$youtubelink=str_replace($array1,$array2,$row["d_youtube$x"]);
			
				echo '<iframe src="'.$youtubelink.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
			} 
		}
			
		?>
		
		
	</div>
<?php } ?>
	
	
		
<!----------product and services ----------------------->		
<?php 
if(isset($row['id'])){
			
	$query2=mysqli_query($connect,'SELECT * FROM digi_card2 WHERE id="'.$row['id'].'" ');
	$row2=mysqli_fetch_array($query2);
		}

	if(!empty($row2["d_pro_img1"]) || !empty($row2["d_pro_img2"]) || !empty($row2["d_pro_img3"]) || !empty($row2["d_pro_img4"]) || !empty($row2["d_pro_img5"]) || !empty($row2["d_pro_img6"])|| !empty($row2["d_pro_img7"])|| !empty($row2["d_pro_img8"])|| !empty($row2["d_pro_img9"])|| !empty($row2["d_pro_img10"])) { ?>
	
	<div class="card2" id="product_services">
		<h3>Products & Services</h3>
		
		
		<?php 
		
		
		for($x=0;$x<=10;$x++){
			if(!empty($row2["d_pro_img$x"])){
			echo '<div class="product_s"><p>'.$row2["d_pro_name$x"].'</p>';
			echo '<img src="data:image/*;base64,'.base64_encode($row2["d_pro_img$x"]).'" alt="Logo">';
			echo "<br><br><a href='https://api.whatsapp.com/send?phone=91".str_replace(array('+91','+'),array('',''),$row['d_whatsapp'])."&text=Enquiry for product: ".$row2["d_pro_name$x"]."' target='_blank'><div class='btn_buy'>Enquiry Now</div></a>";
			echo '</div>';
			} 
		}
			
		?>
		
	
	</div>
	
<?php } ?>


		
<!----------image gallery----------------------->		
<?php 
if(isset($row['id'])){
	$query3=mysqli_query($connect,'SELECT * FROM digi_card3 WHERE id="'.$row['id'].'" ');
	$row3=mysqli_fetch_array($query3);
		}
	if(!empty($row3["d_gall_img1"]) || !empty($row["d_gall_img2"]) || !empty($row["d_gall_img3"]) || !empty($row["d_gall_img4"]) || !empty($row["d_gall_img5"]) || !empty($row["d_gall_img6"])|| !empty($row["d_gall_img7"])|| !empty($row["d_gall_img8"])|| !empty($row["d_gall_img9"])|| !empty($row["d_gall_img10"])) { ?>


		<div class="card2" id="gallery">
		<h3>Image Gallery</h3>
		
		
		<?php 
		
		
		for($x=0;$x<=10;$x++){
			if(!empty($row3["d_gall_img$x"])){
			echo '<div class="img_gall">';
			echo '<img src="data:image/*;base64,'.base64_encode($row3["d_gall_img$x"]).'" alt="Gallery Image">';
			echo "<a href='https://api.whatsapp.com/send?phone=91".str_replace("+91","",$row['d_whatsapp'])."&text=I am interested in your Products.' target='_blank'><div class='btn_buy'>Enquiry Now</div></a>";
			echo '</div>';
			} 
		}
			
		?>

		
	</div>

<?php } ?>


		
<!----------payment info----------------------->	
<?php 	if(!empty($row["d_paytm"]) || !empty($row["d_account_no"]) ||!empty($row["d_qr_paytm"]) ||!empty($row["d_qr_phone_pay"]) ||!empty($row["d_qr_google_pay"]) || !empty($row["d_google_pay"]) || !empty($row["d_phone_pay"]) ){ ?>

	<div class="card2" id="payment">
		<h3>Payment Info</h3>
		
		
		<?php 	if(!empty($row["d_paytm"])){echo '<h2>Paytm</h2><p>'.$row['d_paytm'].'</p>';}	?>
		<?php 	if(!empty($row["d_google_pay"])){echo '<h2>Google Pay</h2><p>'.$row['d_google_pay'].'</p>';}?>
		<?php 	if(!empty($row["d_phone_pay"])){echo '<h2>PhonePe</h2><p>'.$row['d_phone_pay'].'</p>';}	?>
		
		<h3>Bank Account Details</h3>
		
		<?php 	if(!empty($row["d_ac_name"])){echo '<h2>Name:</h2><p>'.$row['d_ac_name'].'</p>';}	?>
		<?php 	if(!empty($row["d_account_no"])){echo '<h2>Account Number:</h2><p>'.$row['d_account_no'].'</p>';}?>
		<?php 	if(!empty($row["d_ifsc"])){echo '<h2>IFSC Code:</h2><p>'.$row['d_ifsc'].'</p>';	}?>
		<?php 	if(!empty($row["d_ac_type"])){echo '<h2>Account Type:</h2><p>'.$row['d_ac_type'].'</p>';	}?>
		<?php 	if(!empty($row["d_bank_name"])){echo '<h2>BANK Name:</h2><p>'.$row['d_bank_name'].'</p>';}	?>
		
		
		<?php if(!empty($row["d_qr_paytm"])){echo '<img src="data:image/*;base64,'.base64_encode($row["d_qr_paytm"]).'" alt="Paytm QR">';	}	?>
		<?php if(!empty($row["d_qr_google_pay"])){echo '<img src="data:image/*;base64,'.base64_encode($row["d_qr_google_pay"]).'" alt="Google Pay QR">';	}	?>
		<?php if(!empty($row["d_qr_phone_pay"])){echo '<img src="data:image/*;base64,'.base64_encode($row["d_qr_phone_pay"]).'" alt="PhonePe QR">';	}	?>
		
		
		
	</div>
	<?php } ?>	
	
	
<!----------email to  info----------------------->	
	<div class="card2" id="Enquiry">
		
		<form action="#" method="post">
			<h3>Contact Us</h3>
			
			<input type="" name="c_name" placeholder="Enter Your Name" required>
			<input type="" name="c_contact" maxlength="13"  placeholder="Enter Your Mobile No" required>
			<input type="email" name="c_email"  placeholder="Enter Your Email Address">
			<textarea name="c_msg" placeholder="Enter your Message or Query" required></textarea>
			<input type="submit" Value="Send!" name="email_to_client">
		
		</form>
		
<?php
if(isset($_POST['email_to_client'])){
        	$to = $row['user_email'];
        $subject = "Customer from DIGI card Online ".$_POST['c_name'];
        
        $message ='
        Name:'.$_POST['c_name'].'
        Contact Number: '.$_POST['c_contact'].'
        Message:'.$_POST['c_msg'];
        
        $headers .= 'From: <'.$_POST['c_email'].'>' . "\r\n";
        $headers .= 'Cc: <'.$_POST['c_email'].'>' . "\r\n";
        
        if(mail($to,$subject,$message,$headers)){
        	echo '<div class="alert success">Thanks! We have received your email.<br> We will get back to you with in 24hrs.</div>';
        }else {
        	echo '<div class="alert danger">Error Email! try again</div>';
        }
}






?>	<br>
	
		
				<a href="index.php"><div class="create_card_btn"><?php echo $_SERVER['HTTP_HOST']; ?>|| Create Your Card Now || <?php echo date('Y');?></div></a>
		
	<style>
	.create_card_btn {
		         background: linear-gradient(45deg, black, black);
    color: white;
    width: auto;
    padding: 20px;
    border-radius: 2px;
    line-height: 0.8;
    margin: 11px auto;
    font-size: 9px;
    text-align: center;
	}
	
	
	
#svg_down{position: fixed;
    bottom: 0;
    z-index: -1;
    left: 0;}

	
	</style>
	
	
	
	<br>
	<br>
	<br>
	<br>
	<div class="menu_bottom">
		<div class="menu_container">
			<div class="menu_item" onclick="location.href='#home'"><i class="fa fa-home"></i> Home</div>
			<div class="menu_item" onclick="location.href='#about_us'"><i class="fa fa-briefcase"></i>About Us</div>
			<div class="menu_item" onclick="location.href='#product_services'"><i class="fa fa-ticket"></i>Product & Services</div>
			<div class="menu_item" onclick="location.href='#shop_online'"><i class="fa fa-archive"></i>Shop Online</div>
			<div class="menu_item" onclick="location.href='#gallery'"><i class="fa fa-image"></i>Gallery</div>
			<div class="menu_item" onclick="location.href='#youtube_video'"><i class="fa fa-video-camera"></i>Youtube Videos</div>
			<div class="menu_item" onclick="location.href='#payment'"><i class="fa fa-money"></i>Payment</div>
			<div class="menu_item" onclick="location.href='#Enquiry'"><i class="fa fa-comment"></i>Enquiry</div>
		</div>
	</div>


