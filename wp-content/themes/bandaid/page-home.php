<?php
/**
 * Template Name: Home
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bandaid
 */
get_header();
?>
<div id="home">
    <section id="panel-hero">
        <div class="container">
            <div class="bn-txt">
                <h1><strong>Transform your business with Cloud.</strong></h1>
                <p>Security. Business Applications. Cloud Management Services.</p>
                <p>Communication &amp; Collaboration. Infrastructure.</p>
                <h3><strong>We’ve got you covered.</strong></h3>
                <a href="/become-a-partner/" class="page-scroll btn btn-outline-gray" role="button">BECOME A PARTNER</a>
            </div>
        </div>
    </section>

    <section>
        <div style="height:90px;">&nbsp;</div>
        <div id="panel-promotions" class="container"></div>
    </section>

    <section id="panel-cloud-services">
        <div class="container">
            <h2>Cloud Services</h2>
            <h3>Ingram Micro offers a full range of business technology solutions.  Partners can use our convenient category list to explore cloud solutions, and then drill down to assemble and purchase unique product and service offerings.</h3>
            <div id="category-list" class="seven-cols text-center"></div>
            <div id="category-description">
                <p>Streamline business processes, improve organizational workflows and efficiencies, and drive project deliverables with popular cloud business applications including Microsoft Office 365, AutoCAD, BitTitan, Dun & Bradstreet, LawToolBox, Microsoft Enterprise Mobility Suite and more.</p>
            </div>
            <div id="category-solutions" class="text-center"></div>
            <div id="cta-section" class="row">
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div id="see-all-button-container"></div>
                </div>
                <div class="col-lg-7  col-md-7 col-sm-7">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <a href="/general-enquiry-form/" rel="nofollow" data-modal="#enquirey-modal" class="btn btn-outline-white" id="request-pricing-form" role="button">More Information</a>
                        </div>
                        
                        <div class="col-lg-8 col-md-8 col-sm-6 moble-margin" style="margin-top: 10px;">
                            Lifting your business into the cloud? Need help choosing the right solutions? Our team of experts is here to help.
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </section>

    <section id="panel-delivery-models">
        <div class="container">
            <div id="header-text" class="row text-center">
                <h2>Cloud Services Platforms</h2>
                <h3>Choose from six flexible and scalable options with the most advanced technologies for bundling, cross-selling and upselling cloud solutions with other product and service offerings through the web.</h3>
            </div>
            <div id="content" class="row">
                <div id="legend-top" class="row text-center">
                    <p id="saas"> SaaS&nbsp;<i class="fa fa-circle-o" aria-hidden="true"></i></p>
                    <p id="software-licensing"><i class="fa fa-circle-o" aria-hidden="true"></i> Software Licensing</p>
                </div>
                <div id="spectrum" class="row text-center">
                    <hr class="spectrum-hr hidden-sm hidden-xs">
                    <div class="col-lg-2 col-md-2 col-sm-4">                        
                        <a href="/cloud-marketplace" class="a-no-underline">
                            <div id="marketplace-icon-container">
                                <div id="marketplace-icon" class="icon platform saas delivery-model-saas-active">
                                    <div class="icons-in"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4">                        
                        <a href="/cloud-referral-program" class="a-no-underline">
                            <div id="marketplace-icon-container">
                                <div id="referral-icon" class="icon platform saas delivery-model-saas-active"><div class="icons-in"></div></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4">                        
                        <a href="/cloud-store" class="a-no-underline">
                            <div id="marketplace-icon-container">
                                <div id="store-icon" class="icon platform saas delivery-model-saas-active"><div class="icons-in"></div></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4">                        
                        <a href="/odin-automation-essentials" class="a-no-underline">
                            <div id="marketplace-icon-container">
                                <div id="oae-icon" class="icon platform software-licensing delivery-model-software-licensing-active"><div class="icons-in"></div></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4">                        
                        <a href="/ensim-automation-suite" class="a-no-underline">
                            <div id="marketplace-icon-container">
                                <div id="ensim-icon" class="icon platform software-licensing delivery-model-software-licensing-active"><div class="icons-in"></div></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4">                        
                        <a href="/odin-automation-premium" class="a-no-underline">
                            <div id="marketplace-icon-container">
                                <div id="oap-icon" class="icon platform software-licensing delivery-model-software-licensing-active"><div class="icons-in"></div></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div id="legend-bottom" class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 pull-left">

                        <div class="arrow_box" id="blue-arrow"> 
                            <strong>Ingram Micro Cloud hosted/managed</strong><br>
                            Simple management - Fast deployment - Core services portfolio  
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 pull-right">

                        <div class="arrow_box arrow_box_orange" id="orange-arrow"> 
                            <strong>Provider self-hosted/managed</strong><br />
                            High scalability - Full control - Broad services portfolio
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section id="panel-testimonials">
        <div class="container">
            <div class="testimonial-slider hidden-xs hidden-sm">
                <div class="testimonial">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/david-smith.jpg" alt="David Smith" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>David Smith</h5>
                                        <h6>Vice President, Worldwide Microsoft SMB</h6>  
                                    </div>                           
                                </div>
                                <p>"Together with leading Cloud Solution Providers like Ingram Micro, we continue to build on our commitment of providing our mutual channel partners and their customers with the best-in-breed solutions and resources needed to fully thrive in the cloud."
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/kevin-mccarthy.jpg" class="img-circle center-block img-responsive" alt ="Kevin Mccarthy"/>
                                    <div class="text-div">
                                        <h5>Kevin J. McCarthy</h5>
                                        <h6>President & COO, Afinety, Inc.</h6>
                                    </div>
                                </div>
                                <p>"Partnering with Ingram Micro Cloud has helped us broaden our reach in the cloud service market by providing the tools, resources and infrastructure we need to quickly and successfully grow our practice, and continuously exceed customer expectations."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/patrick-vardeman.jpg" alt="Patrick Vardeman" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>Patrick Vardeman</h5>
                                        <h6>President & CEO, Accudata Systems</h6>
                                    </div>
                                </div>
                                <p style="padding-top:15px;">"Ingram Micro Cloud has been a key strategic partner, helping us with our cloud offering, pricing, sales plan, marketing programs and service delivery. Ingram has helped us to expand our customer relationships and bring more value to our customers."</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/brian-dipaolo.jpg" alt="Brian Dipaolo" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>Brian DiPaolo</h5>
                                        <h6>Director, Integrated Managed <br> Services, Accudata Systems, Inc.</h6>
                                    </div>
                                </div>
                                <p style="padding-top: 45px;">"Ingram Micro simplifies remote management and gives us greater flexibility."</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="testimonial">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/steve-bargiacchi.jpg" alt="Steve Bargiacchi" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>Steve Bargiacchi</h5>
                                        <h6>CEO, ProTech</h6>
                                    </div>
                                </div>
                                <p>"There's no question Ingram has helped us to move quickly and to lower the barriers of entry to the cloud. It's really nice to walk into a customer and know there's almost nothing we can't offer them working with Ingram as our partner."</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/hank-humphreys.jpg" alt="Hank Humphreys" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>Hank Humphreys</h5>
                                        <h6>Channel Chief at Dropbox</h6>
                                    </div>
                                </div>
                                <p>"Ingram Micro's impressive commitment to the channel has set the pace for a great partnership and we look forward to driving new business opportunities for our mutual channel partners. We're excited at the ease with which all channel segments, such as MSPs, SIs, VARs, resellers, telcos, and hosters can now access our services through Ingram Micro. By working together, we can help channel partners deliver an affordable offering that allows companies to speed up collaboration and increase productivity."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/Juan-Manuel.jpg" alt="Juan Manuel.jpg" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>Juan Manuel Moreno</h5>
                                        <h6>Global Cloud Director at Telefonica</h6>
                                    </div>
                                </div>
                                <p>“We have been very impressed by the commitment shown by Odin in making their Odin Automation offering relevant and effective for telecoms operators. Their willingness to adapt their solutions to our requirements, however complex, delivers real value for us.”</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <div id="video-row" class="text-center">
                                        <a href="/craig-fulton-testimonial-video/" rel="nofollow" data-modal="#popup-modal" id="video-testimonial-desktop"><img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/Craig-Fulton.jpg" class="img-circle img-responsive center-block" alt="Craig Fulton video"></a>
                                    </div>

                                    <div class="text-div">
                                        <h5>Craig Fulton</h5>
                                        <h6>Head of Engineering - Telstra</h6>
                                    </div>                 
                                </div>
                                <p>“Telstra implemented Odin Service Automation to replace a custom-developed cloud services portal. With Odin Automation Premium, Telstra customers can now access a range of leading cloud solutions. Partnering with Odin has dramatically reduced total cost of ownership – specifically, cost related to system updates and maintenance – while reducing time-to-market.”
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="testimonial-slider hidden-lg hidden-md">
                <div class="testimonial">
                    <div class="col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/david-smith.jpg" alt="David Smith" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>David Smith</h5>
                                        <h6>Vice President, Worldwide Microsoft SMB</h6>
                                    </div>
                                </div>
                                <p>"Together with leading Cloud Solution Providers like Ingram Micro, we continue to build on our commitment of providing our mutual channel partners and their customers with the best-in-breed solutions and resources needed to fully thrive in the cloud."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/kevin-mccarthy.jpg" class="img-circle center-block img-responsive" alt ="Kevin Mccarthy"/>
                                    <div class="text-div">
                                        <h5>Kevin J. McCarthy</h5>
                                        <h6>President & COO, Afinety, Inc.</h6>
                                    </div>
                                </div>
                                <p>"Partnering with Ingram Micro Cloud has helped us broaden our reach in the cloud service market by providing the tools, resources and infrastructure we need to quickly and successfully grow our practice, and continuously exceed customer expectations."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/patrick-vardeman.jpg" alt="Patrick Vardeman" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>Patrick Vardeman</h5>
                                        <h6>President & CEO, Accudata Systems</h6>
                                    </div>
                                </div>
                                <p style="padding-top:15px;">"Ingram Micro Cloud has been a key strategic partner, helping us with our cloud offering, pricing, sales plan, marketing programs and service delivery. Ingram has helped us to expand our customer relationships and bring more value to our customers."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/brian-dipaolo.jpg" alt="Brian Dipaolo" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>Brian DiPaolo</h5>
                                        <h6>Director, Integrated Managed <br> Services, Accudata Systems, Inc.</h6>
                                    </div>
                                </div>
                                <p style="margin-top: 30px;">"Ingram Micro simplifies remote management and gives us greater flexibility."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/steve-bargiacchi.jpg" alt="Steve Bargiacchi" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>Steve Bargiacchi</h5>
                                        <h6>CEO, ProTech</h6>
                                    </div>
                                </div>
                                <p>"There's no question Ingram has helped us to move quickly and to lower the barriers of entry to the cloud. It's really nice to walk into a customer and know there's almost nothing we can't offer them working with Ingram as our partner."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/hank-humphreys.jpg" alt="Hank Humphreys" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>Hank Humphreys</h5>
                                        <h6>Channel Chief at Dropbox</h6>
                                    </div>
                                </div>
                                <p>"Ingram Micro's impressive commitment to the channel has set the pace for a great partnership and we look forward to driving new business opportunities for our mutual channel partners. We're excited at the ease with which all channel segments, such as MSPs, SIs, VARs, resellers, telcos, and hosters can now access our services through Ingram Micro. By working together, we can help channel partners deliver an affordable offering that allows companies to speed up collaboration and increase productivity."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/duncan-mcgregor.jpg" alt="Duncan McGregor" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>Duncan McGregor</h5>
                                        <h6>VP of Engineering & Managed IT Cogeco Data Services</h6>
                                    </div>
                                </div>
                                <p>"We were looking for a platform that would support geo-redundant data centers, advanced VM management, network connectivity and security with virtual data centers across a wide range of technologies. It was also important that we offer our customers access to virtual platforms from both VMware and Microsoft through a single platform and management portal. Ensim's fully integrated platform allows us to offer our customers a seamless end to end experience."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/peter-heath.jpg" alt="Peter Heath" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>Peter Heath</h5>
                                        <h6>CIO, Westcoast Group</h6>
                                    </div>
                                </div>
                                <p style="margin-top: 55px;">"Being able to deliver automated service offerings via the cloud is critical for success in today's highly competitive landscape. The Ensim Automation Suite not only gives us all the functionality we need to support our business, but also the flexibility to support all types of offerings and transactions in the cloud now and in the future, and share these capabilities with each of our reseller partners so they, too, can compete more effectively."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/Juan-Manuel.jpg" alt="Juan Manuel.jpg" class="img-circle center-block img-responsive" />
                                    <div class="text-div">
                                        <h5>Juan Manuel Moreno</h5>
                                        <h6>Global Cloud Director at Telefonica</h6>
                                    </div>
                                </div>
                                <p>“We have been very impressed by the commitment shown by Odin in making their Odin Automation offering relevant and effective for telecoms operators. Their willingness to adapt their solutions to our requirements, however complex, delivers real value for us.”</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="testimonial">
                    <div class="col-sm-12">
                        <div class="v-center testimonial-person-info-div">
                            <div class="v-in">
                                <div class="image-div">
                                    <div id="video-row" class="text-center">
                                        <a href="/craig-fulton-testimonial-video/" rel="nofollow" data-modal="#popup-modal" id="testimonial-video"><img src="<?php echo get_template_directory_uri(); ?>/img/page-home/testimonials/Craig-Fulton.jpg" class="img-circle img-responsive center-block" alt="Craig Fulton video"></a>
                                    </div>

                                    <div class="text-div">
                                        <h5>Craig Fulton</h5>
                                        <h6>Head of Engineering - Telstra</h6>
                                    </div>                 
                                </div>
                                <p>“Telstra implemented Odin Service Automation to replace a custom-developed cloud services portal. With Odin Automation Premium, Telstra customers can now access a range of leading cloud solutions. Partnering with Odin has dramatically reduced total cost of ownership – specifically, cost related to system updates and maintenance – while reducing time-to-market.”</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="panel-about">
        <div class="container">
            <div class="row text-center">
                <h2>About Ingram Micro Cloud</h2>
                <h3>Ingram Micro Cloud is a global division of Ingram Micro. With more than 1,500 dedicated cloud specialists, we've built the largest cloud ecosystem in the world to empower organizations to monetize and manage the entire lifecycle of cloud services.</h3>
            </div>
            <div id="video-row" class="row">
                <a href="/about-ingram-micro-cloud-video/" data-modal="#popup-modal" rel="nofollow" id="video"><img src="<?php echo get_template_directory_uri(); ?>/img/page-home/video-image.png" alclass="center-block img-responsive" alt="About Ingram Micro Cloud Video"></a>
            </div>
            <div id="cta" class="row text-center">
                <a href="/about" class="btn btn-outline-gray" role="button">Learn more</a>                
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>