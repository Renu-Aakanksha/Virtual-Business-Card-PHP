<style>

.color1 {
  color: <?php echo $hoverc; ?>; 
}

.color2 {
  color: <?php echo $themec; ?>;
}
.color3 {
  color: #d9212a;
}
.font1 {
  font-family: 'Montserrat', sans-serif;
}
.bold {
  font-weight: bold;
}
.bg-cover {
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.box-shadow {
  -webkit-box-shadow: 0px 2px 6px 0px rgba(50, 50, 50, 0.3);
  -moz-box-shadow: 0px 2px 6px 0px rgba(50, 50, 50, 0.3);
  box-shadow: 0px 2px 6px 0px rgba(50, 50, 50, 0.3);
}
.responsive-image {
  width: 100%;
}
.section {
  padding-top: 20px;
  padding-bottom: 20px;
}
/* ==========================================================
! 02. GENERAL 
========================================================== */
body {
  font-family: 'Montserrat', sans-serif;
  -webkit-font-smoothing: subpixel-antialiased;
  <?php if ($custombg == '0'){ ?>
        background: url('dash/assets-card/img/bg/bg<?php echo $cbg; ?>.png') repeat center center fixed;
  <?php }else { ?>
        background: url('dash/images/<?php echo $bgimage; ?>') repeat center center fixed;
  <?php } ?>
}
/* ==========================================================
! 03. Buttons
========================================================== */
a:focus {
  outline: none;
}
.btn {
  font-weight: bold;
  color: #ffffff;
  background: <?php echo $hoverc; ?>;
  border-radius: 0;
  font-size: 12px;
  padding: 10px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  margin-bottom: 2px;
}
.btn:hover {
  background: #000000;
  color: #ffffff;
}
.btn-default {
  display: inline-block;
  padding: 20px;
  padding-top: 10px;
  padding-bottom: 10px;
  background: <?php echo $hoverc; ?> !important;
  color: #ffffff;
  font-weight: bold;
  text-transform: uppercase;
  border-radius: 0;
  -moz-border-radius: 0;
  -webkit-border-radius: 0;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  border: 0px solid transparent!important;
  position: relative;
  overflow: hidden;
  /*z-index: 1;*/
}
.btn-default:before {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 0;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  background: <?php echo $themec; ?>;
  z-index: -1;
}
.btn-default:hover {
  color: #ffffff;
  border: 0px solid transparent!important;
}
.btn-default:hover:before {
  width: 100%;
}
.btn-default3 {
  background: #d9212a;
  color: #ffffff;
  border: 0;
  text-transform: uppercase;
}
.btn-default3:hover {
  background: #009d9b;
  color: #ffffff;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.btn-default2 {
  font-size: 9px;
  background: <?php echo $themec; ?>;
  font-weight: lighter;
}
.btn-nobg {
  background-color: transparent;
  border: 1px solid <?php echo $themec; ?>;
  border-radius: 0;
  -moz-border-radius: 0;
  -webkit-border-radius: 0;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  font-size: 18px;
  height: 46px;
  padding-top: 10px;
  padding-left: 20px;
  padding-right: 20px;
  color: <?php echo $themec; ?>;
}
.btn-nobg:hover {
  background: <?php echo $themec; ?>;
  color: #ffffff;
}
iframe {
  width: 100%;
}
.btn-fluid {
  width: 100%;
}
/* ==========================================================
! . 04. Page loader
========================================================== */
#page-loader {
  width: 100%;
  height: 100%;
  background: #008c8a;
  color: <?php echo $hoverc; ?>;
  opacity: 0.99;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 9999;
}
.loading-wrapper {
  width: 250px;
  position: fixed;
  top: 40%;
  left: 50%;
  margin-left: -125px;
}
.tp-loader {
  z-index: 10000;
  position: relative;
}
.tp-loader.spinner {
  width: 30px;
  height: 30px;
  margin: 0 auto;
  margin-bottom: 10px;
  background-color: #fff;
  box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.15);
  -webkit-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.15);
  -webkit-animation: tp-rotateplane 1.2s infinite ease-in-out;
  animation: tp-rotateplane 1.2s infinite ease-in-out;
  border-radius: 3px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
}
.loader-name {
  color: #fafafa;
  opacity: 0.9;
  text-align: center;
  font-size: 32px;
  letter-spacing: -2px;
  padding-left: 2px;
  padding-right: 2px;
  font-weight: 200;
  margin-top: 12px;
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}
.loader-job {
  margin-bottom: 40px;
  text-align: center;
  font-weight: 200;
  margin-top: 5px;
  color: #d8d8d8;
  font-size: 12px;
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}
.loader-left {
  -webkit-transform: translateX(-40px);
  -moz-transform: translateX(-40px);
  -o-transform: translateX(-40px);
  transform: translateX(-40px);
  opacity: 0;
}
.loader-right {
  -webkit-transform: translateX(40px);
  -moz-transform: translateX(40px);
  -o-transform: translateX(40px);
  transform: translateX(40px);
  opacity: 0;
}
.loader-up {
  -webkit-transform: translateY(-80px);
  -moz-transform: translateY(-80px);
  -o-transform: translateY(-80px);
  transform: translateY(-80px);
  opacity: 0!important;
}
.loader-down {
  -webkit-transform: translateY(80px);
  -moz-transform: translateY(80px);
  -o-transform: translateY(80px);
  transform: translateY(80px);
  opacity: 0;
}
.loader-hide {
  opacity: 0;
}
.loader {
  display: inline-block;
  text-align: center;
  margin: 0 auto;
  width: 30px;
  height: 30px;
  position: relative;
  border: 4px solid #Fff;
  top: 50%;
  animation: loader 2s infinite ease;
}
.loader-inner {
  vertical-align: top;
  display: inline-block;
  width: 100%;
  background-color: #fff;
  animation: loader-inner 2s infinite ease-in;
}
.loader-animation {
  text-align: center;
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}
@keyframes loader {
  0% {
    transform: rotate(0deg);
  }
  25% {
    transform: rotate(180deg);
  }
  50% {
    transform: rotate(180deg);
  }
  75% {
    transform: rotate(360deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@keyframes loader-inner {
  0% {
    height: 0%;
  }
  25% {
    height: 0%;
  }
  50% {
    height: 100%;
  }
  75% {
    height: 100%;
  }
  100% {
    height: 0%;
  }
}
/* ==========================================================
! 05. FOOTER
========================================================== */
.social-icons {
  font-size: 28px;
  text-align: right;
  display: none;
}
@media (min-width: 768px) {
  .social-icons {
    display: block;
  }
}
.social-icons a {
  color: #ffffff;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  opacity: 1;
}
.social-icons a:hover {
  opacity: 0.7;
}
.footer-social-icons {
  text-align: center;
}
.footer-social-icons a {
  color: #ffffff;
  display: inline-block;
  width: 30px;
  height: 30px;
  text-align: center;
  background: <?php echo $linksc; ?>;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  font-size: 14px;
  line-height: 30px;
  border-radius: 50px;
  -moz-border-radius: 50px;
  -webkit-border-radius: 50px;
}
.footer-social-icons a:hover {
  color: #ffffff;
  background: <?php echo $linksc; ?>;
}
/* ==========================================================
! 06. SECTION: vCard Body
========================================================== */
.container {
  position: relative;
  padding-bottom: 0px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
@media (min-width:992px) {
  .container {
    min-height: 680px;
  }
}
<?php  if ($customtx ==  '0'){ ?>
    .section-vcardbody {
    background: url('dash/assets-card/img/vcard/bg-home<?php echo $texture; ?>.png') repeat-x right top #f4f4f4;
    }
    .section-vcardbody2 {
    background: url('dash/assets-card/img/vcard/bg-inner<?php echo $texture; ?>.png') repeat-x right top #f4f4f4;
    }

<?php }else{?>
    .section-vcardbody {
    background: url('dash/images/<?php echo $tximage; ?>') repeat-x right top #f4f4f4;
    }
    .section-vcardbody2 {
    background: url('dash/assets-card/img/vcard/bg-inner5.png') repeat-y right top #f4f4f4;
    }
<?php }?>
.section-vcardbody, .section-vcardbody2 {
  width: 99%;
  margin: 0 auto;
  overflow-y: scroll;
  margin-top: 20px;
  margin-bottom: 20px;
  padding: 20px;
  border-top: 6px solid #111;
  -webkit-transition: all 0.6s ease-in-out;
  -moz-transition: all 0.6s ease-in-out;
  transition: all 0.6s ease-in-out;
  border-radius: 0px;
  -moz-border-radius: 0px;
  -webkit-border-radius: 0px;
  -webkit-box-shadow: 0px 6px 18px 0px rgba(0, 0, 0, 0.46);
  -moz-box-shadow: 0px 6px 18px 0px rgba(0, 0, 0, 0.46);
  box-shadow: 0px 6px 18px 0px rgba(0, 0, 0, 0.46);
}
@media (min-width:992px) {
  .section-vcardbody, .section-vcardbody2 {
    position: absolute;
    margin-top: 40px;
    left: 30%;
    height: 585px;
    width: 40%;
    padding: 15px;
    padding-bottom: 20px;
  }
}
@media (min-width: 1400px) {
  .section-vcardbody, .section-vcardbody2 {
    margin-top: 180px;
  }
}
.section-vcardbody-pgactive {
  left: 15%;
}
@media (min-width:992px) {
  .section-page-single {
    left: 55%;
    transform: translateY(-200px);
    -moz-transform: translateY(-200px);
    -webkit-transform: translateY(-200px);
    visibility: hidden;
    padding: 20px;
    padding-top: 0px;
  }
}
@media (min-width:992px) {
  .section-page {
    z-index: 11;
    opacity: 0;
  }
}
@media (min-width:992px) {
  .page-mask {
    position: absolute;
    top: 605px;
    left: 30%;
    display: block;
    width: 40%;
    height: 20px;
    background: #333;
    z-index: 77;
    opacity: 0;
    -webkit-transition: all 0.6s ease-in-out;
    -moz-transition: all 0.6s ease-in-out;
    transition: all 0.6s ease-in-out;
  }
}
.page-mask-active {
  left: 55%;
  opacity: 1;
  margin-left: 10px;
}
.section-page-active {
  opacity: 1;
  z-index: 22;
  left: 55%;
  visibility: visible;
  transform: translateY(0px);
  -moz-transform: translateY(0px);
  -webkit-transform: translateY(0px);
}
@media (min-width:992px) {
  .section-page-active {
    margin-top: 40px;
    margin-left: 10px;
  }
}
@media (min-width: 1400px) {
  .section-page-active {
    margin-top: 180px;
  }
}
.ps-scrollbar-y-rail {
  opacity: 0.9 !important;
  right: 4px!important;
}
/* ==========================================================
! 07. SECTION: Main Menu
========================================================== */
.main-menu {
  width: 15%;
  position: absolute;
  top: 0;
  left: 15%;
  padding-right: 10px;
  margin-top: 46px;
  -webkit-transition: all 0.6s ease-in-out;
  -moz-transition: all 0.6s ease-in-out;
  transition: all 0.6s ease-in-out;
  display: none;
}
@media (min-width:992px) {
  .main-menu {
    display: block;
  }
}
@media (min-width: 1400px) {
  .main-menu {
    margin-top: 186px;
  }
}
.main-menu-pgactive {
  left: 0%;
}
.main-menu-list {
  margin: 0;
  padding: 0;
}
.main-menu-list li {
  padding: 0;
  margin: 0;
  margin-bottom: 5px;
  list-style: none;
}
.main-menu-list a {
  display: block;
  background: <?php echo $themec; ?>;
  padding: 10px;
  color: #ffffff;
  text-transform: uppercase;
  font-size: 12px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  position: relative;
  overflow: hidden;
  z-index: 1;
}
.main-menu-list a:active,
.main-menu-list a:visited {
  text-decoration: none;
}
.main-menu-list a:before {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 0;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  background: <?php echo $hoverc; ?>;
  z-index: -1;
}
.main-menu-list a:hover {
  color: #ffffff;
  border: 0px solid transparent!important;
  text-decoration: none;
  padding-left: 15px;
}
.main-menu-list a:hover:before {
  width: 100%;
}
.main-menu-list a.menuActive {
  text-decoration: none;
  background: <?php echo $hoverc; ?>;
  padding-left: 15px;
}
/* ==========================================================
! 08. Home
========================================================== */
.section-home {
  z-index: 88;
  opacity: 1;
  overflow-y: auto;
}
.vcard-profile-pic {
  width: 150px; /* Logo Radius Size */
  height: 150px; /* Logo Radius Size */
  overflow: hidden;
  margin: 0 auto;
  margin-bottom: 0px;
  position: relative;
}
.vcard-profile-pic img {
  width: 100%;
  border-radius: 100%;
  -moz-border-radius: 100%;
  -webkit-border-radius: 100%;
  border: 6px solid <?php echo $hoverc; ?>;
  -webkit-transition: all 0.6s ease-in-out;
  -moz-transition: all 0.6s ease-in-out;
  transition: all 0.6s ease-in-out;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.profileActive {
  opacity: 1!important;
}
.vcard-profile-description {
  text-align: center;
}
.profile-title {
  text-align: center;
  font-weight: bold;
  margin-top: 0;
  font-size: 22px; /* Profile Title Size*/
  letter-spacing: -2px;
  margin-bottom: 8px;
  color: <?php echo $themec; ?>;
  margin-top: 12px;
}
.profile-subtitle {
  text-align: center;
  margin-top: 0;
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 20px;
}
.vcard-profile-description-text {
  padding: 05px;
  padding-top: 1px;
  margin-bottom: 5px;
}
.vcard-profile-description-text p {
  font-size: 13px;
}
.hr1 {
  border: none;
  height: 1px;
  width: 100%;
  background: url('dash/assets-card/img/hr1.png') no-repeat center center;
  margin-top: 10px;
  margin-bottom: 10px;
}
.vcard-profile-description-ft-item {
  margin-bottom: 15px;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  padding: 10px;
  background: url('dash/assets-card/img/bg-btn.png') no-repeat center center <?php echo $hoverc; ?>;
}
.vcard-profile-description-ft-item p {
  margin-bottom: 0;
  color: #ffffff;
  font-size: 12px;
}
/* ==========================================================
! 09. Content
========================================================== */
.section-title {
  color: <?php echo $themec; ?>;
  text-transform: uppercase;
  font-size: 22px;
  line-height: 26px;
  font-weight: bold;
  margin-top: 0;
  border-bottom: 1px solid <?php echo $themec; ?>;
  padding-bottom: 10px;
  margin-bottom: 0px;
}
.title-gallery {
    color: <?php echo $themec; ?>;;
    text-transform: uppercase;
    font-size: 18px;
    line-height: 26px;
    font-weight: bold;
    margin-top: 0;
    border-bottom: 1px solid <?php echo $themec; ?>;
    padding-bottom: 10px;
    margin-bottom: 0px;
}

.section-title2 {
  font-weight: bold;
  color: <?php echo $hoverc; ?>;
  font-size: 20px;
  line-height: 24px;
  letter-spacing: -1px;
  padding-bottom: 10px;
  padding-left: 15px;
  padding-top: 5px;
  padding-bottom: 5px;
  border-left: 4px solid <?php echo $hoverc; ?>;
}
.resume-item {
  padding: 15px;
  border: 4px double #ccc;
  margin-bottom: 15px;
}
.section-item-title-1 {
  font-weight: bold;
  color: <?php echo $themec; ?>;
  color: #333;
  padding-left: 0;
  margin-left: 0;
  font-size: 18px;
  line-height: 22px;
  margin: 0;
  margin-bottom: 8px;
  letter-spacing: -1px;
}
.section-item-title-2 {
  font-weight: bold;
  color: <?php echo $themec; ?>;
  color: #333;
  padding-left: 0;
  margin-left: 0;
  font-size: 18px;
  line-height: 22px;
  margin: 0;
  margin-bottom: 8px;
  letter-spacing: -1px;
  border-bottom: 1px dotted <?php echo $themec; ?>;
  padding-bottom: 5px;
  font-size: 15px;
}
.graduation-time,
.job {
  line-height: 15px;
  font-style: italic;
  color: #555;
  font-size: 10px;
  margin-top: 5px;
  border-bottom: 1px solid #ccc;
  padding-bottom: 5px;
}
.graduation-description p {
  font-size: 12px;
}
/*============================================================================
  >>  10. SECTION: Resume
  ============================================================================
*/
.section-education {
  margin-bottom: 40px;
}
.resume-buttons {
  margin-bottom: 30px;
}
.header-page-buttons {
  margin-top: -20px;
}
.page-footer {
  border-top: 1px solid #ccc;
  padding-top: 20px;
}
.footer-quote {
  color: #444;
  font-size: 11px;
  border-top: 1px solid #ccc;
  padding-top: 10px;
}
.testimonials {
  text-align: center;
  font-size: 18px;
}
.testimonial-item {
  width: 100%;
  margin: 0 auto;
}
@media (min-width: 768px) {
  .testimonial-item {
    padding: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
  }
}
.quote-text {
  font-style: italic;
}
.testimonial-credits {
  margin-top: 30px;
}
.testimonial-author {
  font-size: 15px;
  margin-bottom: 0;
  margin-top: 15px;
  font-weight: bold;
}
.testimonial-content {
  background: url('dash/assets-card/img/bgmask2.png') no-repeat center center <?php echo $hoverc; ?>;
  color: #ffffff;
  padding: 20px;
  border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  width: 100%;
  position: relative;
}
.testimonial-content p {
  font-size: 13px;
  line-height: 16px;
}
.testimonial-content:after {
  content: '';
  display: block;
  width: 10px;
  height: 10px;
  position: absolute;
  left: 50%;
  bottom: -5px;
  margin-left: -5px;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  z-index: 888;
  background: <?php echo $hoverc; ?>;
}
.testimonial-picture {
  width: 110px;
  height: 110px;
  overflow: hidden;
  margin: 0 auto;
}
.testimonial-picture img {
  width: 100%;
  border-radius: 100%;
  -moz-border-radius: 100%;
  -webkit-border-radius: 100%;
  border: 6px solid #ddd;
}
.testimonial-firm {
  font-size: 10px;
  margin-bottom: 0;
  text-transform: uppercase;
  font-style: italic;
  font-weight: lighter;
}
.owl-carousel {
  cursor: -webkit-grab;
  cursor: -moz-grab;
}
.owl-carousel:focus {
  cursor: -webkit-grab;
  cursor: -moz-grab;
}
.owl-carousel:active {
  cursor: -webkit-grab;
  cursor: -moz-grab;
}
.owl-carousel:hover {
  cursor: -webkit-grab;
  cursor: -moz-grab;
}
/*============================================================================
  >>  11. Owl Carousel
  ============================================================================
*/
.owl-carousel .owl-item {
  cursor: -webkit-grab;
}
.owl-carousel .owl-item:focus {
  cursor: -webkit-grabbing;
  cursor: -moz-grabbing;
}
.owl-carousel .owl-item:active {
  cursor: -webkit-grabbing;
  cursor: -moz-grabbing;
}
.owl-carousel .owl-item img {
  width: 100%;
}
.grabbing {
  cursor: -webkit-grabbing !important;
  cursor: -moz-grabbing !important;
}
.owl-controls-wrapper2:hover .owl-controls {
  opacity: 1;
}
.owl-controls-wrapper2 .owl-controls {
  opacity: 0.4;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  width: 100%;
  position: absolute;
  top: auto;
  bottom: 0;
  left: 0;
  padding: 5px;
  padding-left: 20px;
  padding-right: 20px;
  background: rgba(0, 0, 0, 0.4);
  color: #ffffff !important;
  border-radius: 0 0 20px 20px;
  -moz-border-radius: 0 0 20px 20px;
  -webkit-border-radius: 0 0 20px 20px;
}
.owl-controls-wrapper2 .owl-controls a {
  color: #ffffff !important;
}
.owl-controls-wrapper2 .owl-controls .owl-page {
  background-color: #ffffff;
}
.owl-controls-wrapper2 .owl-controls .owl-page.active {
  background: <?php echo $themec; ?>;
}
.owl-controls-wrapper2 .owl-pagination,
.owl-controls-wrapper2 .owl-buttons {
  width: 50%;
  float: left;
}
.owl-controls-wrapper2 .owl-buttons {
  text-align: right;
}
.owl-controls-wrapper2 .owl-buttons > div {
  display: inline-block;
  margin-left: 5px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  font-size: 14px;
}
.owl-controls-wrapper2 .owl-buttons > div:hover {
  color: <?php echo $themec; ?>;
}
.owl-controls-wrapper2 .owl-mtop .owl-wrapper-outer {
  padding-top: 40px;
}
.owl-controls-wrapper2 .owl-wrapper-outer {
  position: relative;
}
.owl-controls-wrapper2 .owl-controls {
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
}
.owl-controls-wrapper2 .owl-controls .owl-page {
  cursor: pointer;
  width: 8px;
  height: 8px;
  border-radius: 100%;
  -moz-border-radius: 100%;
  -webkit-border-radius: 100%;
  margin-right: 3px;
  display: inline-block;
  background: #333;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.owl-controls-wrapper2 .owl-controls .owl-page:hover {
  opacity: 0.8;
}
.owl-controls-wrapper2 .owl-controls .owl-page.active {
  background: <?php echo $themec; ?>;
}
.owl-pagination .owl-page span {
  background: <?php echo $themec; ?>;
}
.owl-pagination .active span {
  background: <?php echo $themec; ?> !important;
}
/* ==========================================================
! 12. SECTION: SKILLS
========================================================== */
.skills-list {
  padding-left: 0;
  margin-left: 0;
}
.progress {
  position: relative;
  height: 25px;
  margin-bottom: 10px;
}
.progress > .progress-type {
  position: absolute;
  left: 0px;
  font-size: 13px;
  padding: 3px 30px 2px 10px;
  color: #ffffff;
  background-color: rgba(25, 25, 25, 0.2);
}
.progress > .progress-completed {
  position: absolute;
  right: 0px;
  font-weight: 800;
  padding: 3px 10px 2px;
  color: #888;
  font-size: 14px;
}
.skills-list {
  list-style: none;
  margin-bottom: 40px;
}
.progress-bar {
  background: <?php echo $hoverc; ?>;
  width: 20%;
}
.progress-bar-2 {
  background: <?php echo $themec; ?>;
}
.progress-bar-3 {
  background: #d9212a;
}
/* ==========================================================
! 13. SECTION: Portfolio
========================================================== */
.project-item {
  padding: 0;
  width: 100%;
  overflow: hidden;
  margin-bottom: 10px;
  position: relative;
  opacity: 1;
  -webkit-transition: all 0.8s ease-in-out;
  -moz-transition: all 0.8s ease-in-out;
  transition: all 0.8s ease-in-out;
  transform: translateY(0px);
  -webkit-transform: translateY(0px);
  -moz-transform: translateY(0px);
}
.project-item a {
  cursor: url('dash/assets-card/img/projects2.cur'), projetos !important;
  border-radius: 6px;
  -moz-border-radius: 6px;
  -webkit-border-radius: 6px;
}
.project-thumbnail {
  display: block;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  background-position: center center;
  height: 250px;
  text-align: center;
  color: #ffffff;
  padding: 15px;
}
.project-thumbnail:hover {
  color: #ffffff;
}
.project-thumbnail:hover .project-description-wrapper {
  opacity: 1;
  transform: translateY(0px);
  -webkit-transform: translateY(0px);
  -moz-transform: translateY(0px);
}
.project-thumbnail:hover .project-title,
.project-thumbnail:hover span.see-more {
  transform: translateY(0px);
  -webkit-transform: translateY(0px);
  -moz-transform: translateY(0px);
}
.project-description-wrapper {
  display: block;
  width: 100%;
  height: 100%;
  opacity: 0;
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
  color: #ffffff;
  position: relative;
  background: rgba(0, 0, 0, 0.7);
}
.project-description {
  position: absolute;
  top: 50%;
  margin-top: -55px;
  width: 100%;
}
.project-title {
  text-transform: uppercase;
  font-size: 20px;
  transform: translateY(10px);
  -webkit-transform: translateY(10px);
  -moz-transform: translateY(10px);
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}
.project-title:after {
  content: '';
  display: block;
  height: 1px;
  border-bottom: 1px solid #ffffff;
  width: 50%;
  margin: 0 auto;
  opacity: 0.5;
  margin-top: 10px;
  margin-bottom: 10px;
}
.project-thumbnail {
  display: block;
  color: #ffffff;
  position: relative;
}
span.see-more {
  font-style: italic;
  text-transform: lowercase;
  letter-spacing: 3px;
  font-size: 12px;
  -webkit-transition: all 0.4s ease-in-out;
  -moz-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
  transform: translateY(10px);
  -webkit-transform: translateY(10px);
  -moz-transform: translateY(10px);
}
/* ==========================================================
! 14. BLOG
========================================================== */
.blog-item {
  margin-bottom: 15px;
  padding: 9px;
  border-top: 4px solid #132644;
  padding-top: 20px;
  padding: 15px;
  background: rgba(255, 255, 255, 0.6);
}
.blog-item-wrapper {
  /* border: 1px solid #ddd;
  border-top: 3px solid @color1;
  padding: 15px;
  padding-top: 20px;
  padding-bottom: 5px;*/
  padding-bottom: 20px;
  border-bottom: 1px solid #ccc;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.blog-item-title {
  font-size: 18px;
  line-height: 26px;
  padding-bottom: 0;
  margin-bottom: 6px;
  color: <?php echo $themec; ?>;
 /* border-bottom: 1px dotted <?php echo $themec; ?>; */
  padding-bottom: 4px;
  font-weight: bold;
}
.blog-item-title a {
  color: <?php echo $themec; ?>;
}
.blog-item-title a:hover {
  text-decoration: none;
}
.blog-item-thumb a {
  cursor: url('dash/assets-card/img/projects.cur'), projetos !important;
  -moz-cursor: url('dash/assets-card/img/projects.cur'), projetos !important;
}
.blog-item-thumb img {
  width: 100%;
}
.blog-item-title-hr {
  border: 0;
  border-top: 3px solid <?php echo $themec; ?>;
  width: 20%;
  margin-top: 15px;
  margin-bottom: 15px;
  margin-left: 0;
}
.blog-item-description p {
  font-size: 12px;
}
.blog-item-description a {
  color: #555555 !important;
}
.blog-item-description a:hover {
  text-decoration: none;
}
.blog-item-link {
  margin-top: 20px;
  margin-bottom: 10px;
}
.blog-item-link .btn-default {
  font-size: 11px !important;
}
.section-header-image {
  margin-bottom: 40px;
}
.section-header-image img {
  width: 100%;
}
.section-pagination {
  font-size: 12px;
  padding-bottom: 20px;
}
.section-pagination a {
  display: inline-block;
  padding: 5px;
  padding-left: 10px;
  padding-right: 10px;
  color: #ffffff;
  background: <?php echo $hoverc; ?>;
  font-weight: bold;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  transition: all 0.2s;
}
.section-pagination a:hover {
  background: <?php echo $themec; ?>;
  text-decoration: none;
}
/* ==========================================================
! 15. SECTION: Blog - Single
========================================================== */
.vcard-header-single {
  width: 100%;
  background: rgba(0, 0, 0, 0.9);
  z-index: 888;
}
@media (min-width:992px) {
  .vcard-header-single {
    width: 40%;
    left: 30%;
    position: absolute;
    top: 61px;
    overflow-x: hidden;
  }
}
@media (min-width: 1400px) {
  .vcard-header-single {
    top: 180px;
  }
}
.blog-single-post {
  display: block;
  margin: 0 auto;
  max-width: 100%;
  padding: 10px;
  padding-top: 0;
  padding-right: 20px;
}
.blog-single-content p {
  font-size: 13px;
  line-height: 23px;
}
.blog-comments-title {
  border-bottom: 1px dotted <?php echo $hoverc; ?>;
  padding-bottom: 10px;
  margin-bottom: 10px;
}
@media (min-width:992px) {
  .post-header-image {
    margin-left: -30px;
    margin-right: -40px;
  }
}
.post-header-image img {
  width: 100%;
}
.blog-single-title {
  font-size: 18px;
  line-height: 26px;
  padding-bottom: 0;
  margin-bottom: 6px;
  border-bottom: 1px dotted <?php echo $themec; ?>;
  padding-bottom: 4px;
  font-size: 24px;
  line-height: 28px;
  font-weight: bold;
  color: <?php echo $themec; ?>;
  border-bottom: 1px solid <?php echo $themec; ?>;
  padding-bottom: 8px;
  margin-bottom: 20px;
  text-transform: uppercase;
}
.blog-single-title a {
  color: <?php echo $themec; ?>;
}
.blog-single-title a:hover {
  text-decoration: none;
}
/*! Blog Comments */
.blog-comments-title {
  margin-bottom: 20px;
  margin-top: 40px;
  font-size: 18px;
  color: <?php echo $hoverc; ?>;
}
.media-heading {
  font-weight: bold;
}
.media-heading small {
  font-size: 9px;
  display: block;
  color: #132644;
  margin-top: 8px;
}
.media-body {
  font-size: 12px;
}
.well {
  background-color: transparent!important;
}
.blog-comments > .media {
  border-bottom: 1px dotted #000000;
  padding-bottom: 20px;
  padding-top: 20px;
  margin-bottom: 0;
  margin-top: 0;
}
.media {
  margin-top: 25px;
}
.media img {
  width: 64px!important;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
}
/* ==========================================================
! 16. SECTION: Map
========================================================== */
.map {
  position: relative;
  z-index: 1;
  margin-bottom: 20px;
}
.map-overlay {
  background: transparent;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  cursor: url('dash/assets-card/img/projects.cur'), projetos !important;
}
/* ==========================================================
! 17. SECTION: Contact
========================================================== */
.contact-subtitle-1 {
  color: <?php echo $hoverc; ?>;
  font-size: 14px;
  letter-spacing: -1px;
  font-weight: bold;
  margin-bottom: 8px;
  margin-top: 25px;
  padding-bottom: 5px;
  border-bottom: 1px dotted <?php echo $hoverc; ?>;
}
.contact-subtitle-1:first-child {
  margin-top: 0;
}
.contact-infos p {
  font-size: 13px;
  line-height: 16px;
}
.form-group {
  margin-bottom: 8px;
}
.form-send {
  width: 100%;
}
.form-send:hover {
  background: #d9212a !important;
}
.form-control {
  border-radius: 0;
  -moz-border-radius: 0;
  -webkit-border-radius: 0;
  height: 50px;
}
::-webkit-input-placeholder {
  font-style: italic;
  color: #999999 !important;
}
:-moz-placeholder {
  font-style: italic;
  color: #999999 !important;
}
::-moz-placeholder {
  font-style: italic;
  color: #999999 !important;
}
:-ms-input-placeholder {
  font-style: italic;
  color: #999999 !important;
}
.modal-wrap {
  display: none;
}
.modal-bg {
  background: #333;
  opacity: 0.9;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 999;
}
.modal-content {
  background: #fafafa;
  font-size: 18px;
  position: fixed;
  top: 40%;
  left: 50%;
  margin-left: -125px;
  width: 250px;
  z-index: 9999;
  padding: 10px 20px;
}
.modal-content .modal-title {
  color: <?php echo $themec; ?>;
  font-size: 22px;
  border-bottom: 1px solid #ccc;
  margin-bottom: 5px;
  font-weight: bold;
}
.modal-content p {
  font-size: 14px;
  margin-bottom: 0;
}
#contactError .modal-title {
  color: #fff;
}
/* ==========================================================
! 18. CROSSBROWSER FALLBACKS
========================================================== */
.safari .vcard-profile-pic img {
  border: 0px solid #ddd;
}
.safari .testimonial-picture img {
  border: 0px solid #ddd;
}

/* Footer Menu CSS Starts */
.footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    text-align: center;
}

.footer-menu {
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(255, 251, 251, 0.1) inset;
    width: 100%;
    height: auto;
    padding: 0px;
    margin: 0;
    list-style-type: none;
    overflow: auto;
    position: relative;
    background: white;
    /* border-radius: 20px 20px 0 0; */
    display: flex;

    background-image: linear-gradient(to right, white, white), linear-gradient(to right, white, white), linear-gradient(to right, rgba(0, 0, 20, .50), rgba(255, 255, 255, 0)), linear-gradient(to left, rgba(0, 0, 20, .50), rgba(255, 255, 255, 0));
    /* Shadows */
    /* Shadow covers */
    background-position: left center, right center, left center, right center;
    background-repeat: no-repeat;
    background-color: white;
    background-size: 20px 100%, 20px 100%, 20px 100%, 20px 100%;
    background-attachment: local, local, scroll, scroll;
}

.footer-menu li {
    flex: 1;
    min-width: 80px;
}

.footer-menu .footer-menu-link {
    display: inline-block;
    width: 100%;
    text-align: center;
    padding: 8px;
    box-sizing: border-box;
    color: #555555;
}

.footer-menu .footer-menu-icon {
    font-size: 24px;
    margin-bottom: 10px;
    color: var(--theme-color);
}

.footer-menu .footer-menu-text {
    font-size: 12px;
}

/* Footer Menu CSS Completed */

/* About us info classes start */
.about-us-table {
    font-size: 14px;
    margin-top: 15px;
    border-collapse: separate;
    border-spacing: 0 5px;
}

.about-us-table .table-row-label {
    text-align: left;
    min-width: 150px;
    vertical-align: top;
}

.about-us-table .table-row-label .table-row-label-text {
    display: inline-block;
    margin: 0;
    font-family: 'Montserrat';
    font-size: 14px;
}

.about-us-table .table-row-label .table-row-label-separator {
    float: right;
}

.speciality-label {
    font-family: 'Uniform Medium';
}

.about-us-text {
    text-align: justify;
    max-width: 95%;
}

.document-wrapper {
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    border: 2px solid #555555;
    border-radius: 6px;
    margin-bottom: 10px;
    color: #555555;
}

.document-wrapper .pdf-icon {
    padding: 12px;
    padding-right: 5px;
    font-size: 18px;
}

.document-wrapper .pdf-number {
    padding: 10px;
    flex: 1;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.document-wrapper .download-icon {
    font-size: 18px;
    padding: 12px;
    border-left: 2px solid #555555;
    color: var(--theme-color);
}

.other-links-wrapper .other-links-header {
    font-family: 'Uniform Medium';
}

.other-links-wrapper .other-links-link {
    display: block;
    line-height: 20px;
    margin-bottom: 10px;
    word-break: break-all;
}

.other-links-wrapper .other-links-link i {
    margin-right: 10px;
}

/* About us info classes completed */

/* Product css starts */
.product-description {
    text-align: justify;
    max-width: 100%;
}

.product-enquiry-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.product-price {
    font-size: 18px;
    font-family: "Arial";
    color: var(--theme-color);
}

.product-enquiry-btn {
    padding: 7px 15px;
    color: #ffffff;
    font-size: 14px;
    display: inline-block;
    background: linear-gradient(to right, var(--theme-color) 0%, var(--theme-color) 100%);
    border: 3px solid #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}
/* Product css completed */






/* ==========================================================
		Colours
		<?php echo $hoverc; ?> = Brick Red 
		#03449D = Blue
        <?php echo $themec; ?> = Dark Blue	
========================================================== */
</style>