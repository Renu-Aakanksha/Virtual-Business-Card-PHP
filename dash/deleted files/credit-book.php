<?php 
include('session.php');
include('db.php');
/*if (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $userdel = $_SESSION['user'];

    $qd = "DELETE FROM `product` WHERE `id`='$delid'";
    $data_del = $con->query($qd);
    if ($data_del) {
        echo "<script>alert('Product Deleted Successfully!'); window.location='product';</script>";
    }
    else {
        echo "<script>alert('Failed To Delete Product!'); window.location='product';</script>";
    }
}*/
if (isset($_POST['subcr'])) {
	$cpname = $_POST['name'];
	$cpnumber = $_POST['number'];
	$cpaddress = $_POST['address'];
	$cpamount = $_POST['amount'];
	$cpuser = $_SESSION['user'];
	$cpdate = date("d/m/Y");
	$amount2 = 0;

	$inq = "INSERT INTO `credit`(`name`, `number`, `address`, `amount`, `amount2`, `cust`, `datee`) VALUES ('$cpname','$cpnumber','$cpaddress','$cpamount','$amount2','$cpuser','$cpdate')";
	$indata = $con->query($inq);
	if ($indata) {
		echo "<script>alert('Credit Added Successfully!'); window.location='credit-book';</script>";
	}
	else {
		echo "<script>alert('Failed To Add Credit!'); window.location='credit-book';</script>";
	}
}
if (isset($_POST['usubcr'])) {
	$cid = $_POST['uid'];
	$camoun = $_POST['uamount'];

        $qew = "SELECT * FROM `credit` WHERE `id`='$cid'";
        $dataw = $con->query($qew);
        if($dataw->num_rows > 0){
           $rowsw = $dataw->fetch_assoc();
           $camoun1 = $rowsw['amount2'];
           $camount = $camoun1+$camoun;
        }

	$inq = "UPDATE `credit` SET `amount2`='$camount' WHERE `id`='$cid'";
	$indata = $con->query($inq);
	if ($indata) {
		echo "<script>alert('Credit Updated Successfully!'); window.location='credit-book';</script>";
	}
	else {
		echo "<script>alert('Failed To Update Credit!'); window.location='credit-book';</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <?php include('links.php');?>
    <style type="text/css">
    	.dataTables_length {
    		display: none;
    	}
    	.feather-search {
    		display: none;
    	}
    	.svgs {
    		margin-left: 30px;
    	}
    </style>
</head>
<body>
    
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <?php include('header.php');?>
    </div>
    <!--  END NAVBAR  -->


    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <?php include('nav.php');?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing">

	                <div class="widget-content widget-content-area text-center" style="width: 100%;">
	                	<nav class="breadcrumb-two" aria-label="breadcrumb">
						    <ol class="breadcrumb">
						        <li class="breadcrumb-item"><a href="index">Home</a></li>
						        <li class="breadcrumb-item active"><a href="javascript:void(0);">Credit Book</a></li>
						    </ol>
						</nav>
					</div>
					<br>

					<button data-toggle="modal" data-target="#addc" class="btn btn-primary"  style="width: 90%; margin: 20px;">Add Credit</button>

					<!-- Modal -->
<div class="modal fade" id="addc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Credit</h5>
            </div>

            <div class="modal-body">
                <p class="modal-text">
                    
                	<form method="post">
					    <div class="form-group mb-4">
					        <input type="text" class="form-control" id="rEmail" placeholder="Customer Name *" name="name" required="true">
					    </div>

					    <div class="form-group mb-4">
					        <input type="number" class="form-control" id="rEmail" placeholder="Customer Number" name="number">
					    </div>

					    <div class="form-group mb-4">
					        <input type="text" class="form-control" id="rEmail" placeholder="Customer Address" name="address">
					    </div>

					    <div class="form-group mb-4">
					        <input type="number" class="form-control" id="rEmail" placeholder="Credit Amount *" name="amount" required="true">
					    </div>

					    
						<br>
					    <button type="submit" class="btn btn-primary" style="width: 100%;" name="subcr">Save</button>

					</form>

                    
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user = $_SESSION['user'];
                                        $qe = "SELECT * FROM `credit` WHERE `cust`='$user'";
                                        $data = $con->query($qe);
                                        if($data->num_rows > 0){
                                            while($rows = $data->fetch_assoc()){
                                                $id = $rows['id'];
                                                $name = $rows['name'];
                                                $number = $rows['number'];
                                                $address = $rows['address'];
                                                $amount = $rows['amount'];
                                                $amount2 = $rows['amount2'];
                                                $datee = $rows['datee'];
                                                $famount = $amount-$amount2;

                                                echo '

                                                <tr>
                                                    <td>'.$name.'</td>
                                                    <td style="color: red;">';
                                                    if($famount == 0 || $amount2 > $amount){
                                                		echo '<span style="color: green;">Paid</span>';
	                                                }
	                                                else {
	                                                	echo "-".$famount;
	                                                }

                                                    echo '</td>
                                                    <td><center><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye" data-toggle="modal" data-target="#g'.$id.'"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></center>
                                                    </td>
                                                </tr>



<!-- Modal -->
<div class="modal fade" id="g'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #fff;">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #fff;">
            <div class="modal-header" style="background-color: #fff;">
                <h5 class="modal-title" id="exampleModalLabel">'.$name.'</h5>
            </div>

            <div class="modal-body" style="background-color: #fff;">
                <p class="modal-text">
                    <h6><strong>Name : </strong>'.$name.'</h6><hr>
                    <h6><strong>Number : </strong>'.$number.'</h6><hr>
                    <h6><strong>Address : </strong>'.$address.'</h6><hr>
                    <h6><strong>Amount : </strong><span style="color: red;">'.$amount.'</span></h6><hr>
                    <h6><strong>Paid Amount : </strong><span style="color: green;">'.$amount2.'</span></h6><hr>
                    <h6><strong>Date : </strong>'.$datee.'</h6><hr>

                    <a target="_blank" href="https://wa.me/91'.$number.'?text=Hello, '.$name.'%0a%0aYour Rs.'.$famount.' is Pending to pay.%0aYour credit date is '.$datee.' kindly complete your payment at '.$cname.'. %0aआपका '.$famount.' रु भुगतान करने के लिए लंबित है।%0a
आपकी क्रेडिट तिथि '.$datee.' है कृपया '.$cname.' में अपना भुगतान पूरा करें।%0a%0a

Regards,%0a
'.$cname.'">
                    <svg class="svgs" height="40pt" viewBox="-1 0 512 512" width="40pt" xmlns="http://www.w3.org/2000/svg"><path d="m10.894531 512c-2.875 0-5.671875-1.136719-7.746093-3.234375-2.734376-2.765625-3.789063-6.78125-2.761719-10.535156l33.285156-121.546875c-20.722656-37.472656-31.648437-79.863282-31.632813-122.894532.058594-139.941406 113.941407-253.789062 253.871094-253.789062 67.871094.0273438 131.644532 26.464844 179.578125 74.433594 47.925781 47.972656 74.308594 111.742187 74.289063 179.558594-.0625 139.945312-113.945313 253.800781-253.867188 253.800781 0 0-.105468 0-.109375 0-40.871093-.015625-81.390625-9.976563-117.46875-28.84375l-124.675781 32.695312c-.914062.238281-1.84375.355469-2.761719.355469zm0 0" fill="#e5e5e5"/><path d="m10.894531 501.105469 34.46875-125.871094c-21.261719-36.839844-32.445312-78.628906-32.429687-121.441406.054687-133.933594 109.046875-242.898438 242.976562-242.898438 64.992188.027344 125.996094 25.324219 171.871094 71.238281 45.871094 45.914063 71.125 106.945313 71.101562 171.855469-.058593 133.929688-109.066406 242.910157-242.972656 242.910157-.007812 0 .003906 0 0 0h-.105468c-40.664063-.015626-80.617188-10.214844-116.105469-29.570313zm134.769531-77.75 7.378907 4.371093c31 18.398438 66.542969 28.128907 102.789062 28.148438h.078125c111.304688 0 201.898438-90.578125 201.945313-201.902344.019531-53.949218-20.964844-104.679687-59.09375-142.839844-38.132813-38.160156-88.832031-59.1875-142.777344-59.210937-111.394531 0-201.984375 90.566406-202.027344 201.886719-.015625 38.148437 10.65625 75.296875 30.875 107.445312l4.804688 7.640625-20.40625 74.5zm0 0" fill="#fff"/><path d="m19.34375 492.625 33.277344-121.519531c-20.53125-35.5625-31.324219-75.910157-31.3125-117.234375.050781-129.296875 105.273437-234.488282 234.558594-234.488282 62.75.027344 121.644531 24.449219 165.921874 68.773438 44.289063 44.324219 68.664063 103.242188 68.640626 165.898438-.054688 129.300781-105.28125 234.503906-234.550782 234.503906-.011718 0 .003906 0 0 0h-.105468c-39.253907-.015625-77.828126-9.867188-112.085938-28.539063zm0 0" fill="#64b161"/><g fill="#fff"><path d="m10.894531 501.105469 34.46875-125.871094c-21.261719-36.839844-32.445312-78.628906-32.429687-121.441406.054687-133.933594 109.046875-242.898438 242.976562-242.898438 64.992188.027344 125.996094 25.324219 171.871094 71.238281 45.871094 45.914063 71.125 106.945313 71.101562 171.855469-.058593 133.929688-109.066406 242.910157-242.972656 242.910157-.007812 0 .003906 0 0 0h-.105468c-40.664063-.015626-80.617188-10.214844-116.105469-29.570313zm134.769531-77.75 7.378907 4.371093c31 18.398438 66.542969 28.128907 102.789062 28.148438h.078125c111.304688 0 201.898438-90.578125 201.945313-201.902344.019531-53.949218-20.964844-104.679687-59.09375-142.839844-38.132813-38.160156-88.832031-59.1875-142.777344-59.210937-111.394531 0-201.984375 90.566406-202.027344 201.886719-.015625 38.148437 10.65625 75.296875 30.875 107.445312l4.804688 7.640625-20.40625 74.5zm0 0"/><path d="m195.183594 152.246094c-4.546875-10.109375-9.335938-10.3125-13.664063-10.488282-3.539062-.152343-7.589843-.144531-11.632812-.144531-4.046875 0-10.625 1.523438-16.1875 7.597657-5.566407 6.074218-21.253907 20.761718-21.253907 50.632812 0 29.875 21.757813 58.738281 24.792969 62.792969 3.035157 4.050781 42 67.308593 103.707031 91.644531 51.285157 20.226562 61.71875 16.203125 72.851563 15.191406 11.132813-1.011718 35.917969-14.6875 40.976563-28.863281 5.0625-14.175781 5.0625-26.324219 3.542968-28.867187-1.519531-2.527344-5.566406-4.046876-11.636718-7.082032-6.070313-3.035156-35.917969-17.726562-41.484376-19.75-5.566406-2.027344-9.613281-3.035156-13.660156 3.042969-4.050781 6.070313-15.675781 19.742187-19.21875 23.789063-3.542968 4.058593-7.085937 4.566406-13.15625 1.527343-6.070312-3.042969-25.625-9.449219-48.820312-30.132812-18.046875-16.089844-30.234375-35.964844-33.777344-42.042969-3.539062-6.070312-.058594-9.070312 2.667969-12.386719 4.910156-5.972656 13.148437-16.710937 15.171875-20.757812 2.023437-4.054688 1.011718-7.597657-.503906-10.636719-1.519532-3.035156-13.320313-33.058594-18.714844-45.066406zm0 0" fill-rule="evenodd"/></g></svg></a>


                    <a href="tel:'.$number.'">
                    <svg class="svgs" id="Layer_1" enable-background="new 0 0 512.021 512.021" height="40" viewBox="0 0 512.021 512.021" width="40" xmlns="http://www.w3.org/2000/svg"><g><path d="m496.02 367.6c0 36.62-15 68.72-38.49 91.66-33.43 32.66-84.04 46.78-133.02 28.98-139.43-50.65-250.08-161.3-300.73-300.73-24.719-68.03 12.12-139.2 74.71-163.12 14.13-5.4 29.58-8.39 45.93-8.39l.03.15 25.09 117.05-7.55 7.55-43.42 43.42c43.14 91.83 117.45 166.14 209.28 209.28l50.97-50.97z" fill="#acebe2"/><g fill="#98d7ce"><path d="m118.107 74.529c-3.544-16.537-20.051-26.87-36.48-22.858-5.192 1.268-10.243 2.849-15.136 4.719-9.77 3.73-18.91 8.62-27.28 14.46 14.439-20.67 34.909-37.15 59.279-46.46 14.13-5.4 29.58-8.39 45.93-8.39l.03.15 25.09 117.05-7.55 7.55-24.45 24.45z"/><path d="m327.85 393.45-16.692 16.692c-9.38 9.38-23.783 11.44-35.479 5.183-75.905-40.609-138.374-103.078-178.983-178.983-6.258-11.697-4.197-26.099 5.183-35.48l16.692-16.692c43.139 91.83 117.449 166.14 209.279 209.28z"/><path d="m496.02 367.6c0 36.62-15 68.72-38.49 91.66-5.08 4.96-10.56 9.5-16.36 13.56 8.816-12.639 15.447-27.015 19.236-42.661 3.958-16.345-6.468-32.72-22.912-36.244l-90.674-19.435 32-32z"/></g><g><path d="m367.988 512.021c-16.528 0-32.916-2.922-48.941-8.744-70.598-25.646-136.128-67.416-189.508-120.795s-95.15-118.91-120.795-189.508c-8.241-22.688-10.673-46.108-7.226-69.612 3.229-22.016 11.757-43.389 24.663-61.809 12.963-18.501 30.245-33.889 49.977-44.5 21.042-11.315 44.009-17.053 68.265-17.053 7.544 0 14.064 5.271 15.645 12.647l25.114 117.199c1.137 5.307-.494 10.829-4.331 14.667l-42.913 42.912c40.482 80.486 106.17 146.174 186.656 186.656l42.912-42.913c3.837-3.837 9.36-5.466 14.667-4.331l117.199 25.114c7.377 1.581 12.647 8.101 12.647 15.645 0 24.256-5.738 47.224-17.054 68.266-10.611 19.732-25.999 37.014-44.5 49.977-18.419 12.906-39.792 21.434-61.809 24.663-6.899 1.013-13.797 1.518-20.668 1.519zm-236.349-479.321c-31.995 3.532-60.393 20.302-79.251 47.217-21.206 30.265-26.151 67.49-13.567 102.132 49.304 135.726 155.425 241.847 291.151 291.151 34.641 12.584 71.867 7.64 102.132-13.567 26.915-18.858 43.685-47.256 47.217-79.251l-95.341-20.43-44.816 44.816c-4.769 4.769-12.015 6.036-18.117 3.168-95.19-44.72-172.242-121.772-216.962-216.962-2.867-6.103-1.601-13.349 3.168-18.117l44.816-44.816z"/></g><g><path d="m496.02 272c-8.836 0-16-7.164-16-16 0-123.514-100.486-224-224-224-8.836 0-16-7.164-16-16s7.164-16 16-16c68.381 0 132.668 26.628 181.02 74.98s74.98 112.639 74.98 181.02c0 8.836-7.163 16-16 16z"/></g><g><path d="m432.02 272c-8.836 0-16-7.164-16-16 0-88.224-71.776-160-160-160-8.836 0-16-7.164-16-16s7.164-16 16-16c105.869 0 192 86.131 192 192 0 8.836-7.163 16-16 16z"/></g><g><path d="m368.02 272c-8.836 0-16-7.164-16-16 0-52.935-43.065-96-96-96-8.836 0-16-7.164-16-16s7.164-16 16-16c70.58 0 128 57.42 128 128 0 8.836-7.163 16-16 16z"/></g></g></svg></a>


                    <a href="sms:+91'.$number.'?body=Hello, '.$name.'%0a%0aYour Rs.'.$famount.' is Pending to pay.%0aYour credit date is '.$datee.' kindly complete your payment at '.$cname.'. %0aआपका '.$famount.' रु भुगतान करने के लिए लंबित है।%0a
आपकी क्रेडिट तिथि '.$datee.' है कृपया '.$cname.' में अपना भुगतान पूरा करें।%0a%0a

Regards,%0a
'.$cname.'">
                    <svg class="svgs" height="40" viewBox="0 0 60 53" width="40" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" fill="none" fill-rule="evenodd"><g id="014---Conversation-Settings" fill-rule="nonzero"><path id="Shape" d="m54.7 39.11 3.741 11.214c.1141054.3417339.0355647.7184293-.2055989.9860899-.2411637.2676606-.6076637.3849031-.9594011.3069101l-14.436-3.207c-4.0603856 1.7241321-8.4287497 2.6052897-12.84 2.59-16.02 0-29-11.19-29-25s12.98-25 29-25 29 11.19 29 25c-.01861 4.7135207-1.523312 9.3011121-4.3 13.11z" fill="#02a9f4"/><path id="Shape" d="m54.7 39.11c2.776688-3.8088879 4.28139-8.3964793 4.3-13.11 0-13.81-12.98-25-29-25-.5033333 0-1.0033333.011-1.5.033 15.322.673 27.5 11.591 27.5 24.967-.01861 4.7135207-1.523312 9.3011121-4.3 13.11l3.741 11.214c.0968125.2889378.0535617.6064799-.117.859l1.952.434c.3517374.077993.7182374-.0392495.9594011-.3069101.2411636-.2676606.3197043-.644356.2055989-.9860899z" fill="#0377bc"/><rect id="Rectangle-path" fill="#f5f5f5" height="6" rx="3" width="34" x="13" y="12"/><path id="Shape" d="m44 12h-3c1.6568542 0 3 1.3431458 3 3s-1.3431458 3-3 3h3c1.6568542 0 3-1.3431458 3-3s-1.3431458-3-3-3z" fill="#cfd8dc"/><rect id="Rectangle-path" fill="#f5f5f5" height="6" rx="3" width="34" x="13" y="23"/><path id="Shape" d="m44 23h-3c1.6568542 0 3 1.3431458 3 3s-1.3431458 3-3 3h3c1.6568542 0 3-1.3431458 3-3s-1.3431458-3-3-3z" fill="#cfd8dc"/><rect id="Rectangle-path" fill="#f5f5f5" height="6" rx="3" width="34" x="13" y="34"/><path id="Shape" d="m44 34h-3c1.6568542 0 3 1.3431458 3 3s-1.3431458 3-3 3h3c1.6568542 0 3-1.3431458 3-3s-1.3431458-3-3-3z" fill="#cfd8dc"/><g fill="#000"><path id="Shape" d="m44 19h-28c-2.209139 0-4-1.790861-4-4s1.790861-4 4-4h28c2.209139 0 4 1.790861 4 4s-1.790861 4-4 4zm-28-6c-1.1045695 0-2 .8954305-2 2s.8954305 2 2 2h28c1.1045695 0 2-.8954305 2-2s-.8954305-2-2-2z"/><path id="Shape" d="m44 30h-28c-2.209139 0-4-1.790861-4-4s1.790861-4 4-4h28c2.209139 0 4 1.790861 4 4s-1.790861 4-4 4zm-28-6c-1.1045695 0-2 .8954305-2 2s.8954305 2 2 2h28c1.1045695 0 2-.8954305 2-2s-.8954305-2-2-2z"/><path id="Shape" d="m44 41h-28c-2.209139 0-4-1.790861-4-4s1.790861-4 4-4h28c2.209139 0 4 1.790861 4 4s-1.790861 4-4 4zm-28-6c-1.1045695 0-2 .8954305-2 2s.8954305 2 2 2h28c1.1045695 0 2-.8954305 2-2s-.8954305-2-2-2z"/><path id="Shape" d="m30 0c-16.542 0-30 11.664-30 26s13.458 26 30 26c4.4378199.0193392 8.8350398-.8454871 12.935-2.544l14.123 3.137c.1461076.0324824.2953253.0489131.445.049.6414351-.0031569 1.2424348-.313782 1.6159958-.8352234.3735611-.5214413.4743494-1.1904184.2710042-1.7987766l-3.582-10.737c2.7126105-3.8953127 4.1747912-8.5242726 4.192-13.271 0-14.336-13.458-26-30-26zm23.887 38.527c-.1871516.2607855-.2377397.5955598-.136.9l3.741 11.215-14.435-3.208c-.0712406-.0158957-.1440075-.0239437-.217-.024-.1354358.0003101-.2694259.0278563-.394.081-3.9344377 1.6754251-8.1697352 2.5292225-12.446 2.509-15.439 0-28-10.766-28-24s12.561-24 28-24 28 10.767 28 24c-.0207315 4.5040991-1.4598412 8.8872079-4.113 12.527z"/></g></g></g></svg></a>


                    <hr>
                    
                    <form method="post">
					    <div class="form-group mb-4">
					        <input type="number" class="form-control" id="rEmail" placeholder="Credit Payment *" name="uamount" required="true">
					    </div>
					    <input type="hidden" name="uid" value="'.$id.'">

					    <button type="submit" class="btn btn-primary" style="width: 100%;" name="usubcr">Update</button>

					</form>

                    <br>
                    <br>
                    
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

                                                ';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <?php include('footer.php');?>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="plugins/table/datatable/datatables.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>