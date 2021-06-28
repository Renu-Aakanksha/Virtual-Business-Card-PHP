<style>
.hide{
    display: none;
}

.badge {
  position: absolute;
  top: -8px;
  right: -8px;
  padding: 2px 5px;
  border-radius: 100%;
  background-color: red;
  color: white;

}

.dropdown-menu {
    width: 300px !important;
}

</style>

<?php
if(isset($_POST['read'])) {
    $nnid = $_POST['hidden-noti'];
    $qusv = "Update `notification` Set `status` = 0 Where `id`='$nnid' limit 1";
    $data_update = $con->query($qusv);
}
?>

<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm" style="background-color: #fff;">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
            <line style="color: #000;" x1="3" y1="12" x2="21" y2="12"></line>
            <line style="color: #000;" x1="3" y1="6" x2="21" y2="6"></line>
            <line style="color: #000;" x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    <div class="page-title">
                    	<?php
                            $usernv = $_SESSION['user'];
                            $qusv = "SELECT name FROM `owners` WHERE  `id`='$usernv' ";
                            $datasv = $con->query($qusv);
                            $rowsdv = $datasv->fetch_assoc()
                            
                        ?>	  
                    	<h4 style="margin-left: 30px;"><strong>Customer Panel</strong></h4>
                    </div>
                </div>
            </li>
        </ul>
        <div class="navbar-collapse collapse order-3 dual-collapse2 pr-5">
            <ul class="navbar-nav ml-auto">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    <span class="badge hide" id='badge'>3</span>
                    </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                             <?php
                                    $usernv = $_SESSION['user'];
                                    $qusv = "SELECT * FROM `notification` WHERE  `cust`='$usernv' AND `status` = 1 AND `flag` = 0 ORDER BY id DESC limit 5";
                                    $datasv = $con->query($qusv);
                                    
                                echo '<script>var t_noti = 0</script>';
                                if ($datasv->num_rows > 0) {
                                    
                                echo '<script>t_noti = '.$datasv->num_rows.'</script>
                                <h6 class="font-weight-bold">✉ Notifications</h6>
                                
                                ';
                                	while($rowsdv = $datasv->fetch_assoc()){
                                	    echo '<li>';    
                                	    
                                ?>	    
                                    	    <a class="noti_link" href="javascript:;" onclick="mynoti('<?php echo $rowsdv["message"]; ?>','<?php echo $rowsdv["title"]; ?>', '<?php echo $rowsdv["id"]; ?>')">
                                <?php	  	    
                                    	    echo '
                                    	    <li class="dropdown-divider"></li>
                                        	    <h6 class="font-weight-bold">'.$rowsdv['title'].'</h6>
                                        	    <small>➥'.$rowsdv["message"].'</small>
                                        	</a>
                                        </li>
                                        <li class="dropdown-divider"></li>'
                                    	;   
                                	}
    
                                }else{
                                  echo '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
                                }
                                echo '</div>';
                             ?>
                        </ul>
                </li>
            </ul>
        </div>
    </header>
</div>

<div class="modal fade" id="notify" tabindex="-1" role="dialog" aria-labelledby="notify" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notify-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id ="msg_msg"></p>
      </div>
      <div class="modal-footer">
            <form method="post">
                <input type="hidden" id="hidden-noti" name="hidden-noti"/>
                <button type="submit" class="btn btn-primary mt-3" name="read" style="width: 100%;">Mark As Read</button>
            </form>
      </div>
    </div>
  </div>
</div>


<script>
$(document).ready(function() {
    $(".noti_link").click(function(){
        
        $('#notify').modal('show');
    });
});

function mynoti(msg, title, id) {
    document.getElementById("hidden-noti").value = id;
    document.getElementById("msg_msg").innerHTML = msg;
    document.getElementById("notify-title").innerHTML = title;
}

if (t_noti > 0){
    document.getElementById("badge").innerHTML = t_noti;
    document.getElementById("badge").classList.remove("hide")
}
</script>