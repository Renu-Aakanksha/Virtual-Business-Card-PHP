<?php    
/*
 * PHP QR Code encoder
 *
 * Exemplatory usage
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */
  
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) { 
    
        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');
            
        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } else {    
    
        //default data
        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    
        
    //display generated file
      
 ?>
 <html>
 <head>
     <style type="text/css" media="print">
        @page {
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }
        @media print {
            #printbtn {
                display :  none;
            }
            .div1 {
                background-color: #ff6500;
            }
            .div2 {
                background-color: #118aea;
            }
        }
        </style>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
 </head>
 <body style="margin: 0px; padding: 0px;">
     <div  style="width: 100%; height: 110px; background-color: #118aea;" class="div2">
             <center>
                 <h1 style="font-size: 80px; color: #fff; padding-top: 6px;"><?php print $_POST['cname'];?></h1>
             </center>
         </div>
         <div class="div1" style="width: 100%; height: 8px; background-color: #ff6500;"></div>
         <br><br>
         <?php echo '<center><img style="width: 65%;" src="'.$PNG_WEB_DIR.basename($filename).'" /></center>';?>
         <br>
         
         <p style="font-size: 35px; padding-right: 35px; padding-left: 35px;">अब जरुरत नही लंबी लाइन के साथ खडे रेहनेकी. बस स्कॅन करे ये QR कोड और ऑर्डर करे अपने पसंदीदा प्रोडक्ट ऑनलाईन.</p>
         <div style="width: 100%; background-color: #ff6500; padding: 5px;">
         <h1 style="font-size: 40px; color: #fff; padding: 0 25px; text-align: justify;">Now, No need to stay with log boring lines. Just scan this QR code and order your favorite items online.</h1>
         </div>
         <!--<br id="printbtn"><center><button id="printbtn" style="width: 90%; height: 80px; border: none; background-color: #118aea; font-size: 50px; color: #fff;" onclick = "window.print()">Download OR Print</button></center>
         <br id="printbtn">-->
     
 </body>
 </html>
 