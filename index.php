<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");


include('dash/db.php');
include('session.php');

//GETTING URL NAME==========================================
$usern = $_GET['name'];

if(empty($usern)){
   $usern = "none"; 
}
//GETTING URL NAME END======================================

$qus = "SELECT * FROM `owners` WHERE `url`='$usern'";
$datas = $con->query($qus);
if ($datas->num_rows > 0) {
	$rowsd = $datas->fetch_assoc();
	$id = $rowsd['id'];
	$name = $rowsd['name'];
	$address = $rowsd['address'];
	$cname = $rowsd['cname'];
	$url = $rowsd['url'];
    $category = $rowsd['category'];
    $tagline = $rowsd['tagline'];
	$mobile = $rowsd['mobile'];
	$wmobile = $rowsd['whatsapp'];
	$email = $rowsd['email'];
    $status = $rowsd['status'];
    $pixel = $rowsd['pixel'];
	
	//VISITOR TRACING========================================
    $visitorip = $_SERVER['REMOTE_ADDR'];
    $storeusern = $id;
    $dateofvisit = date("d/m/Y");
    $visiqe = "SELECT * FROM `visitor` WHERE `cust`='$storeusern' AND `cip`='$visitorip'";
    $visidata = $con->query($visiqe);
    if($visidata->num_rows > 0){
        
    }
    else {
        $visiqei = "INSERT INTO `visitor`(`cip`, `date`, `cust`) VALUES ('$visitorip','$dateofvisit','$storeusern')";
        $visidatai = $con->query($visiqei);
    }
    
    $visiqec = "SELECT * FROM `visitor` WHERE `cust`='$storeusern'";
    $visidatac = $con->query($visiqec);
    if($visidatac->num_rows > 0){
        $visiterfe = $visidatac->num_rows;
    }
    else {
        $visiterfe = 0;
    }
    //VISITOR TRACING END====================================
    
    //PAYMENT===============================================
	$qef = "SELECT * FROM `online_payment` WHERE `cust`='$id'";
	$dataf = $con->query($qef);
	if($dataf->num_rows > 0){
	    $rowsf = $dataf->fetch_assoc();
        $catidv = $rowsf['id'];
        $gbank = $rowsf['bank'];
        $dwallet = $rowsf['wallet'];
        $ionline = $rowsf['online'];
        
	}
	//PAYMENT END===========================================
	
	//BANNER AND PROFILE 1=================================
	$qu = "SELECT * FROM `banner` WHERE `cust`='$id' AND `display`=2";
	$data = $con->query($qu);
	if ($data->num_rows > 0) {
		while ($rows = $data->fetch_assoc()) {
			$bid = $rows['id'];
			$bimage = $rows['image'];
			$bdisplay = $rows['display'];
		}
	}else{
	    $bdisplay = 2;
	    $bimage = '3135715.png';
	}
	//BANNER AND PROFILE 1 END =============================
	
	//BANNER AND PROFILE 2==================================
	$quf = "SELECT * FROM `banner` WHERE `cust`='$id' AND `display`=3";
	$dataf = $con->query($quf);
	if ($dataf->num_rows > 0) {
		while ($rowsf = $dataf->fetch_assoc()) {
			$bidf = $rowsf['id'];
			$bimagef = $rowsf['image'];
			$bdisplayf = $rowsf['display'];
		}
	}else{
	    if ($bdisplay) {$bdisplayf = $bdisplay; $bimagef = $bimage;}
	}
	//BANNER AND PROFILE 2 END =============================
	
	//BACKGROUND IMAGE===================================
	$qufV = "SELECT * FROM `banner` WHERE `cust`='$id' AND `display`=4";
	$datafV = $con->query($qufV);
	if ($datafV->num_rows > 0) {
		while ($rowsfV = $datafV->fetch_assoc()) {
			$bidfV = $rowsfV['id'];
			$bgimage = $rowsfV['image'];
			$bdisplayfV = $rowsfV['display'];
		}
	}
	else {
	    $bgimage = '417048867WhatsAppImage2020-10-26at11.41.30AM.jpeg';
	}
	//BACKGROUND IMAGE END================================
	
	
	//PRODUCT ============================================
    $qe = "SELECT * FROM `product` WHERE `cust`='$id'";
    $data = $con->query($qe);
    if($data->num_rows > 0){
        while($rows = $data->fetch_assoc()){
            $pid = $rows['id'];
            $pproduct = $rows['product'];
            $psellprice = $rows['sellprice'];
            $pdis = $rows['dis'];
            $pimage = $rows['image'];
            $pcust = $rows['cust'];
            $pdatee = $rows['datee'];
            $puni = $rows['uni'];
            $ptax = $rows['tax'];
        }
    }
	//PRODUCT END ========================================
	
	//SCHEMA =============================================
	$qef = "SELECT * FROM `schemaa` WHERE `cust`='$id'";
	$dataf = $con->query($qef);
	if($dataf->num_rows > 0){
	    while($rowsf = $dataf->fetch_assoc()){
	        $fid = $rowsf['id'];
	        $fmobile = $rowsf['mobile'];
	        $fstreet = $rowsf['street'];
	        $fcity = $rowsf['city'];
	        $fstate = $rowsf['state'];
	        $fpin = $rowsf['pin'];
	        $fcountry = $rowsf['country'];
	        $ffacebook = $rowsf['facebook'];
	        $ftwitter = $rowsf['twitter'];
	        $flinkedin = $rowsf['linkedin'];
	        $finstagram = $rowsf['instagram'];
	        $fyoutube = $rowsf['youtube'];
	    }
	}
	//SCHEMA END==========================================
	
	//META ===============================================
	$qefn = "SELECT * FROM `meta` WHERE `cust`='$id'";
	$datafn = $con->query($qefn);
	if($datafn->num_rows > 0){
	    while($rowsfn = $datafn->fetch_assoc()){
	        $fidn = $rowsfn['id'];
	        $fkeywn = $rowsfn['keyw'];
	        $fdisn = $rowsfn['dis'];
	    }
	}
	//META END============================================
	
	//ABOUT===============================================

    $dataqu = $con->query("SELECT * FROM `iabout` WHERE `cust`='$id'");
    if($dataqu->num_rows > 0){
        while($rowd = $dataqu->fetch_assoc()){
            $cnamem = $rowd['cname'];
            $yearofe = $rowd['yearofe'];
            $btype = $rowd['btype'];
            $intro = $rowd['intro'];
            $speci = $rowd['speci'];
            $product = $rowd['product'];
            $resume = $rowd['resume'];
            $btnname = $rowd['btn'];
        }
    }
    else {
        $cnamem = "";
        $yearofe = "";
        $btype = "";
        $intro = "";
        $speci = "";
        $product = "";
        $resume = "";
        $btnname = "";
    }
    
	//ABOUT END===========================================
	
	//Color-Theme=========================================
	
	$dataqu = $con->query("SELECT * FROM `layout` WHERE `cust`='$id' limit 1");
	if($dataqu->num_rows > 0){
	    $rowsf = $dataqu->fetch_assoc();
	    
        $hoverc = $rowsf['hover'];
        $linksc = $rowsf['links'];
        $themec = $rowsf['theme'];
        $texture = $rowsf['texture'];
        $customtx = $rowsf['custom'];
        $custombg = $rowsf['bg_c'];
        $cbg = $rowsf['bg'];
        $sound = $rowsf['sound'];
        
	}else{
	    
	    $themec = '#021533';
	    $linksc = '#FC4119';
        $hoverc = '#FC4119';
        $texture = '';
        $sound = '';
	    
	    //$theme = '#5b19fc';
    }
    
    if (empty($texture)){
        $texture = '5';
    }

    if (empty($customtx)){
        $customtx = '0';
    }elseif ($customtx == "1"){
        $data = $con->query("SELECT * FROM `banner` WHERE `id`='$texture' AND `display`= 5 limit 1");
        if ($data->num_rows > 0) {
            $rows = $data->fetch_assoc();
            $tximage = $rows['image'];
        }else{
            $customtx = '0';
        }
    }
    
    if (empty($cbg)){
        
    }
    
    if (empty($custombg)){
        $custombg = '0';
    }elseif ($custombg == '1' and (!empty($cbg)) ){
        $datafV = $con->query("SELECT * FROM `banner` WHERE `id`='$cbg' AND `display`=4");
        if ($datafV->num_rows > 0) {
            $rows = $datafV->fetch_assoc();
            $bgimage = $rows['image'];
        }
        else {
            $custombg = '0';
        }
    }
    
    if(!empty($sound)){
        $datafV = $con->query("SELECT * FROM `banner` WHERE `id`='$sound' AND `display`=6");
        if ($datafV->num_rows > 0) {
            $rows = $datafV->fetch_assoc();
            $sound = $rows['image'];
        }
        else {
            $sound = '';
        }
    }

	
	$dataqu = $con->query("SELECT * FROM `navigation` WHERE `cust`='$id' limit 1");
	if($dataqu->num_rows > 0){
	    $rowsf = $dataqu->fetch_assoc();
	    
        $nav1 = $rowsf['nav1'];
        $nav2 = $rowsf['nav2'];
        $nav3 = $rowsf['nav3'];
        $nav4 = $rowsf['nav4'];
        $nav5 = $rowsf['nav5'];
        $nav6 = $rowsf['nav6'];
        
	}else{
	    
	    $nav1 = 'HOME';
	    $nav2 = 'ABOUT';
	    $nav3 = 'PRODUCTS';
	    $nav4 = 'GALLERY';
	    $nav5 = 'FEEDBACK';
	    $nav6 = 'CONTACT';
	    
	}
	
	//RENEWAL=============================================
	$qcb = "SELECT * FROM `renewal` WHERE `cust`='$id'";
	$datacb = $con->query($qcb);
	if ($datacb->num_rows > 0) {
		$rowcb = $datacb->fetch_assoc();
		$ren = $rowcb['rdatee'];
		
	}
	//RENEWAL END=========================================
	
	//POCKET WEBSITE STYLE 1 =============================
	if(date('Y-m-d', strtotime( (str_replace('/', '-', $ren) ) )) > date('Y-m-d')){
	    if($status == 1){
    	    if ($_GET['frame']){
    	        include('st2.php');
    	    }else{
    	        include('st1.php');
    	    }
    	}else {
    	    echo "Aaccount Expired! Please contact to support team.";
    	}
	}else {
    	    echo "Aaccount Expired! Please contact to support team.";
    	}
	//POCKET WEBSITE STYLE 1 =============================
	
}
else {
    //echo "<script>window.location='dash/register'</script>";
    include('home.php');
}
?>