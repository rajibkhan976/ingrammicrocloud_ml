<?php
/**
 * Template Name: Subpage
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package summit
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<section class="sub-panel1 why-attend-banner">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="logo">
						<a href="<?php echo get_bloginfo('url'); ?>"><img class="img-responsive" src="/wp-content/uploads/2016/11/cloud-summit-2017-logo2.png"></img></a>    
					</div>
				</div>
                	<div class="col-sm-4 pull-right">
                 <a href="http://www.cvent.com/d/3fqj0t/8C?ct=b352e06e-1055-4907-9c5c-a2c67385b62d&RefID=Attendee" target="_blank" class="btn btn-outline-gray" role="button">REGISTER NOW</a>
                 </div>
			</div>
		</div>
	</section>
	<hr class="cloud-blue-border">
		<section class="why-attend">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2><?php the_title();?></h2>
					</div>
					<!--div class="col-sm-6">
						
					</div-->
				</div>
			</div>
		</section>
		
		<section class="whyattend-panel3">
        	<div class="light-grey">
            	<div class="container">
                	<h3>Everyone who’s anyone in cloud innovation will be there. Will you?</h3>
                    <div class="row">
					<div class="col-md-6">
                    	<div class="row">
                        	<div class="col-md-1 col-sm-1"></div>
                        	<div class="col-md-5 col-sm-5">
                            	<img src="/wp-content/themes/summit/img/pie-chart.png" class="img-responsive" />
                            </div>
                            <div class="col-md-6 col-sm-6">
                            	<div class="stat">96%</div>
								<div class="stat-subtitle">Overall satisfaction</div>
                            </div>
						
                        </div>
					</div>
					<div class="col-md-6">
                    	<div class="row">
                        	<div class="col-md-1 col-sm-1"></div>
                        	<div class="col-md-5 col-sm-5">
                            	<img src="/wp-content/themes/summit/img/pie-chart.png" class="img-responsive" />
                            </div>
                            <div class="col-md-6 col-sm-6">
                            	<div class="stat">97%</div>
								<div class="stat-subtitle">Would recommend to others</div>
                            </div>
						
                        </div>
						
					</div>
				</div>
                </div>
            </div>
            <div class="light-blue">
            	<div class="container">
                	<p>97% of those who have attended the Ingram Micro Cloud Summit in the past call it “a must.” And the 2017 Summit will be no exception. It promises to be one of the most valuable and impactful IT events of the year.</p>
                </div>
            </div>
            
            </section>	
            <section class="light-grey learn-cloud">
            	<div class="container">
                	<h3>There’s huge profit potential in the cloud. Learn how to make the most of it.</h3>
                    <div class="row">
                    	<div class="col-md-9 col-sm-9">
                            <p><sub>‘‘</sub>$111 billion worth of IT spending will shift to cloud this year – and that number will almost double to $216 billion by 2020.<sub>’’</sub></p>
                            <p style="margin-left:50px;">– Gartner, 2016</p>
                    	</div>
                        <div class="col-md-3 col-sm-3">
                        	<img src="/wp-content/themes/summit/img/gartner.jpg" class="img-responsive" />
                        </div>
                    </div>
                </div>
            	
            </section>
              <section class="light-blue vieo-sc">
            	<div class="container">
                	<div class="row">
                    	<div class="col-md-5">
                        	<p>Not only will the world’s leading cloud technologies will be on display at the Summit, you’ll also have direct access to experts who can share the latest product updates and insights. </p>
                            <p>Help your customers make more informed decisions to maximize their cloud investment. And grow your business by becoming their essential cloud expert and go-to resource. </p>
                        </div>
                        <div class="col-md-4">
                        	 <div class="leadership-list">
							<p>Learn everything you need to know to optimize your cloud business – including how to:</p>
                            <ul>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Choose the right vendors</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Implement the best practices</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Bundle the right products</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Develop the right pricing strategy</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Optimize operational costs in a cloud model</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Transition from the data center to IaaS</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Use marketing strategy, sales, training, and more to grow your cloud business
                                </li>
                            </ul>
                        
                        </div>
                        
                    </div>
                    <div class="col-md-3 video">
                        	<img src="/wp-content/themes/summit/img/video.jpg" class="img-responsive" data-toggle="modal" data-target="#Modal-video"/>
                            <p class="text-center"><strong>Renee Bergeron, SVP, Global Cloud Channe</strong>l</p>
                            <p class="text-center">Keynote, Cloud Summit 2016</p>
                            <div class="modal fade" id="Modal-video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                   
                                  </div>
                                  <div class="modal-body">
                                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/PRY3EjpLu6I" frameborder="0" allowfullscreen class="img-responsive"></iframe>
                                  </div>
                                 
                                </div>
                              </div>
							</div>
                        </div>
                </div>
                </div>
            </section>
			 <section class="light-grey">
            	<div class="container">
                	<div class=" register">
                        <h4>3 days, 1,500+ cloud innovators, 100+ educational sessions, One event you can’t afford to miss.</h4>
                        <a href="#" target="_blank" class="btn btn-outline-gray register-n" role="button">REGISTER TODAY</a>
                        <p>Need help convincing your boss?</p>
                        <a href="/wp-content/uploads/2017/03/Convince-Your-Boss-Letter-for-Why-Attend.docx" target="_blank" class="btn btn-outline-gray" role="button">DOWNLOAD THIS LETTER</a>
                    </div>
                </div>
            	
            </section>

	
<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
