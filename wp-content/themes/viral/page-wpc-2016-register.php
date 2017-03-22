<?php get_header();
/*
 Template name: WPC 2016 Register Template
 */
?>
<?php
get_template_part('navigation');
?>

<?php while (have_posts()) : the_post(); ?>
<!-- <div id="page-content"> -->


<style>

@font-face {
    font-family: 'DIN Alternate Bold';
    src: url('https://s3.amazonaws.com/ingrammicrocloud/fonts/din_alternate_bold-webfont.woff');
}

h1, h2, h3, h4, h5, h6, p, span, a, small, li, div {
  font-family: 'DIN Alternate Bold', Arial, sans-serif !important;
}

.upper-nav-bar, .nav-bar.sticky, .footer-section, .footer-widgetized-section {
    display: none !important;
}

.content, .wpb_content_element {
    margin-top: 0;
    margin-bottom: 0;
}

.full-width-image {
    width: 100%;
}

.text-uppercase {
    text-transform: uppercase;
}

.img-responsive {
    max-width: 100%;
    height: auto;
}

.no-gutter > [class*='col-'] {
    padding-right:0;
    padding-left:0;
}

@media (max-width: 1200px) {
  .visible-lg {
    display: none !important;
  }
}

@media (max-width: 767px) {
  .hidden-xs {
    display: none !important;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  .hidden-sm {
    display: none !important;
  }
}
@media (min-width: 992px) and (max-width: 1199px) {
  .hidden-md {
    display: none !important;
  }
}
@media (min-width: 1200px) {
  .hidden-lg {
    display: none !important;
  }
}


.nav-bar.sticky, .upper-nav-bar, .footer-widgetized-section, .footer-section {
  display: none !important;
}


/*******************************************************************************
Panel 4
*******************************************************************************/

#panel4 {
    position: relative;
    margin: 100px 0;
}

#panel4 h5 {
  font-size: 30px;
  margin-bottom: 20px;
  line-height: 120%;
}

#panel4 .form-container {
  background-color: #fff;
  -webkit-box-shadow: 0px 0px 97px -32px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 0px 0px 97px -32px rgba(0, 0, 0, 0.75);
  box-shadow: 0px 0px 97px -32px rgba(0, 0, 0, 0.75);
  z-index: 2;
  padding: 50px 50px 20px;
  margin-left: 25%;
}

#panel4 .form-container p {
  font-size: 18px;
  margin-bottom: 20px;
}

#panel4 iframe {
    width: 500px;
    height: 420px;
}

#panel4 .smart-vector-image {
  position: absolute;
  width: 550px;
  z-index: 1;
  top: -50px;
  right: 24%;
  opacity: .5;
}

@media (max-width: 1200px) {
  #panel4 {
    margin-top: 0px;
  }

  #panel4 .form-container {
    float: left;
    margin-top: 40px;
  }

  #panel4 .smart-vector-image {
    top: 500px;
    right: 250px;
  }

}

/*******************************************************************************
Panel 8
*******************************************************************************/

#panel8 {
  background-image: url('/us/wp-content/uploads/sites/2/2016/06/footer-background.png');
  min-height: 250px;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  position: relative;
  z-index: 1;
  color: #fff;
  padding-top: 20px;
  overflow: hidden;
}

#panel8 small {
  color: #fff;
}

#panel8 .jellyfish-left, #panel8 .jellyfish-right {
  position: absolute;
}

#panel8 .jellyfish-left {
    width: 800px;
    top: -80px;
    left: -20%;
}

#panel8 .jellyfish-right {
  right: -24%;
  width: 800px;
  top: -270px;
}

#panel8 .content .logo-container .logo-ingram {
  width: 125px;
  margin-right: 20px;
}

#panel8 .content .logo-container .logo-odin {
  width: 60px;
  margin-right: 20px;
}


#panel8 .content .logo-container .logo-ensim {
  width: 80px;
}

#panel8 .blue-text, #panel8 h3 {
  color: #00aeef;
}

#panel8 .text {
  border-top: 1px solid rgba(255, 255, 255, .1);
  border-bottom: 1px solid rgba(255, 255, 255, .1);
  width: 400px;
  margin: 20px auto 0;
}

#panel8 h2 {
  font-size: 42px;
  color: #fff;
}

#panel8 h2 span {
  font-size: 42px;
}

#panel8 h3 {
  font-size: 18px;
}

#panel8 .logo-container {
  margin-top: 20px;
  text-align: center;
}

@media (max-width: 1700px) {
  .jellyfish-right {
    right: -28%;
  }
}


@media (max-width: 1450px) {
  .jellyfish-left {
    left: -30%;
  }
  .jellyfish-right {
    right: -29%;
  }
}

@media (max-width: 1268px) {
  .jellyfish-left {
    left: -40%;
  }
  .jellyfish-right {
    right: -40%;
  }
}

</style>


<!-- --------------------------------------
  Panel 8
  -------------------------------------- -->
		<div id="panel8">
			<img class="jellyfish-left" src="/us/wp-content/uploads/sites/2/2016/06/Vector-Smart-Object-copy-27.png"></img>
			<img class="jellyfish-right" src="/us/wp-content/uploads/sites/2/2016/06/Vector-Smart-Object-copy-27.png"></img>
			<div class="content">
				<div class="text text-center">
					<h2 class="text-uppercase"><span class="blue-text">Eco</span>system <small>of</small> C<span class="blue-text">loud</span></h2>
					<h3 class="text-uppercase">Engineered to Simplify Your Cloud Success</h3>
				</div>
				<div class="logo-container text-center">
					<img class="logo-ingram" src="/us/wp-content/uploads/sites/2/2016/06/INGRAM_Wordmark-white-small.png"></img>
					<img class="logo-odin" src="/us/wp-content/uploads/sites/2/2016/06/header-odin-logo-white.png"></img>
					<img class="logo-ensim" src="/us/wp-content/uploads/sites/2/2016/06/Ensim_IM-Acq_logo_rev.png"></img>
				</div>
			</div>
		</div>



<!-- --------------------------------------
  Panel 4
  -------------------------------------- -->
<div id="panel4">
  <div class="container">
    <div class="col-md-7 col-lg-5 form-container">
      <h5>Thank you for visiting us at WPC</h5>
      <p>To request more information about any of our products or services, please submit the form below.</p>
      <iframe src="https://ingrammicro.marketing.dynamics.com/LeadManagement/MaintainLeadForm.aspx?SOURCEKEYOID=101894&amp;LANGUAGECODE=en-US" width="300" height="150"></iframe>
    </div>
  </div>
  <img class="smart-vector-image" src="/us/wp-content/uploads/sites/2/2016/06/Vector-Smart-Object.png" />
</div>






	<?php the_content(); endwhile; ?>

<?php get_footer(); ?>