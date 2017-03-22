<?php get_header();
/*
 Template name: Free Margin Assessment UK Template
 */
?>
<?php
get_template_part('navigation');
?>

<?php while (have_posts()) : the_post(); ?>

<!-- Don't edit above this line -->


<div id="headerimage"><img src="<?php echo bloginfo('template_url') ?>/images/margin-calculator-header.jpg" alt="Four times the margin on Office 365 renewals.*" width="1330" height="auto" class="headerimage" /></div>

<div id="wrapper">
  <div class="row">
	<h2>Request your free <strong>Margin Builder Assessment.</strong></h2>
	<h3>Move your Microsoft Advisor seats to the Microsoft CSP program and earn four times the margin.*</h3>
	<p class="intro">The Ingram Micro Cloud CSP Margin Builder Assessment has been developed to help Microsoft partners gain additional margin on their customer's Office 365 renewals. This can give up to four times the margin from just 3% on Advisor seats to a massive 12%* through the CSP program.<br />
	  <br />
    Each assessment will provide an accurate report on margin potential for the conversion of Office 365 Advisor seats under the CSP program &mdash; clearly highlighting how additional profitability can be gained on CSP and Open.</p>
	<hr />
    	<div class="main">
          <h4>The benefits of buying on the CSP program</h4>
          <p>There are many benefits associated with buying and renewing Office 365 through the Cloud Service Provider (CSP) program;</p>
          <ul>
            <li>Get up to four times more margin on Advisor seats when converting to CSP</li>
            <li>Take control of the customer relationship</li>
            <li>Benefit from monthly auto-renew option</li>
            <li>Manage customers in the Ingram Micro Cloud Marketplace</li>
            <li>Bundle additional services including your own offerings and other cloud solutions on the Cloud Marketplace</li>
          </ul>
          <h4>Things we'll need to know for the assessment</h4>
          <p>We've made the process as simple as possible, but there are just a few things we'll need to know before we get started;</p>
<ul>
        <li> What is your Ingram Micro Customer Number?</li>
         <li>How many Office 365 seats are ready for renewal?</li>
        <li>Are the seats in their 1st or 2nd year?</li>
        <li>Are you Advisor Gold or Silver certified?</li>
        <li>Are you a Microsoft Managed Partner?</li>
        </ul>
        <hr />
        <p class="smallprint">* Based on a typical example. Ingram Micro does not guarantee resellers margin.</p>
        <h5><strong>Don't like filling forms in? Why not call our Cloud team on 0871 973 3060 or email <a href="mailto:cloud@ingrammicro.co.uk" target="_blank">cloud@ingrammicro.co.uk</a></strong></h5>
    </div>
        <div class="rail">
            	  <h3><strong>Request</strong> a FREE Margin Builder Assessment with a Cloud specialist</h3>
		<div class="form"><iframe src="https://ingrammicro.marketing.dynamics.com/LeadManagement/MaintainLeadForm.aspx?SOURCEKEYOID=101625&LANGUAGECODE=en-US" width="100%" height="550px" style=""></iframe></div>
          <div class="clear"></div>        
    </div>
        <div class="clear"></div>
</div>
</div>
<!-- Don't edit below this line -->

<?php endwhile; ?>

<?php get_footer(); ?>