<?php
/**
 * Template Name: Page Resources
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
<div id="resources" class="platform-page" xmlns="http://www.w3.org/1999/html">
    <section id="panel-header">
        <div class="container">
            <div class="row">
                <div id="left-column" class="col-md-3 col-sm-3 text-center">
                    <div class="v-center">
                        <div class="v-in">
                            <h1 class="bs-ap-title platform">Reseller Resources</h1>
                        </div>
                    </div>
                </div>
                <div id="right-column" class="col-md-9 col-sm-9"></div>
            </div>
        </div>
    </section>
    <div id="panel-tabs" class="container">
        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li role="presentation" class="active"><a href="#case-studies" id="case-studies-tab" role="tab" data-toggle="tab" aria-controls="case-studies" aria-expanded="true"><strong>Case Studies</strong></a>
                </li>
                <li role="presentation" class=""><a href="#cloud-primers" role="tab" id="cloud-primers-tab" data-toggle="tab" aria-controls="cloud-primers" aria-expanded="false"><strong>Cloud Primers</strong></a>
                </li>
                <!--li role="presentation" class=""><a href="#cloud-playbooks" role="tab" id="cloud-playbooks-tab" data-toggle="tab" aria-controls="cloud-playbooks" aria-expanded="false"><strong>Cloud Playbooks</strong></a>
                </li-->
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in" role="tabpanel" id="case-studies" aria-labelledby="case-studies-tab">
                    <h3>Highlighted Case Studies</h3>

                    <div class="row">
                        <div class="col-md-6">
                            <ul class="resources-bullet-points">
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="http://www.ingrammicrocloud.com/wp-content/uploads/sites/2/2016/02/VaultLogix-Case-Study.pdf" target="_blank">Challenge - Entering the Cloud</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Vendor_Uploads_Education/axcient+case+study+template+8-7.pdf" target="_blank">Axcient Gives ITsavvy Competitive Advantage</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Playbooks/CentreTechnologies_2014.pdf" target="_blank">Secrets of an Outsourced CIO</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Playbooks/DatasmithNetworkSolutions_2014.pdf" target="_blank">How a Small MSP Lands International Cloud Deals With Ingram Micro</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/Veeam/cdi.pdf" target="_blank">CDI Managed Services - 2 Secrets to Cloud Sales Success</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Playbooks/SimplifiedInnovations.pdf" target="_blank">Simplified Innovations - Take a Phased Approach to Selling DaaS</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/Symantec/symanteccasestudy_networkmedics.pdf" target="_blank">2 Ways to Avoid Managed Services Mediocrity -Network Medics</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Playbooks/f8+Tech.pdf" target="_blank">f8 Tech - Meeting Audit Requirements with RMM Services</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/AwarenessTechnologies/awarenessti_conversantgroup_casestudy.pdf" target="_blank">Create a Network Security Niche-Conversant Group</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Playbooks/LIBANGA.pdf" target="_blank">Turning a medical office break-fix call into a double-digit cloud revenue stream</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="http://www.ingrammicrocloud.com/wp-content/uploads/sites/2/2015/04/CaseStudy_snp_040915_BW_JMc.pdf?38a6e8" target="_blank">Find New Revenue Streams Selling Cloud Migration and Configuration Services</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/RingCentral/case_study_amerivest_final.pdf" target="_blank">Amerivest Realty - simplicity and savings with RingCentral</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/RingCentral/case_study_paragonlegal_final.pdf" target="_blank">In search of flexibility and remote connectivity, Paragon Legal embraces RingCentral</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/RingCentral/case_study_truste_final.pdf" target="_blank">TRUSTe finds time savings and independence with RingCentral</a></div></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="resources-bullet-points">
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/RingCentral/mrinetwork_case_study_dec_2012.pdf" target="_blank">RingCentral offers a flexible solution that helps Connector Team Recruiting stay connected with clients.</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/RingCentral/mrinetwork_case_study_jan_2013.pdf" target="_blank">RingCentral provides Odin Search Group with a sensible solution that offers mobility, a professional image and cost savings</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/Adobe/adobe_echosign_case_study_lumension_security.pdf" target="_blank">Adobe&reg; EchoSign&reg; &amp; Lumension Security, Inc.</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/Adobe/adobe_echosign_case_study_sunflower_electric_power.pdf" target="_blank">Adobe&reg; EchoSign&reg; &amp; Sunflower Electric Power Corporation</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/Adobe/adobe_echosign_case_study_targetcw.pdf" target="_blank">Adobe&reg; EchoSign&reg; &amp; TargetCW</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/RingCentral/applebees_case_study_final.pdf" target="_blank">Applebee's Saves $7000 per month</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Playbooks/LIBANGA.pdf" target="_blank">LIBANGA Computer Systems - Make Double-Digit Cloud Revenue Growth A Reality</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Vendor_Uploads_Education/IM+Link+Recent+Successes.pdf" target="_blank">IM Link Recent Successes</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Vendor_Uploads_Marketplace/Veeam/Veeam+-+VCP+Partner+Profile+-+Bit+Refinery.pdf" target="_blank">Veeam: Bit Refinery</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Vendor_Uploads_Education/Autotask_masterIT_Case_Study.pdf" target="_blank">Autotask Service Level</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="http://www.ingrammicrocloud.com/wp-content/uploads/sites/2/2015/04/CaseStudy_perspicuity_040915_BW_JMc.pdf?38a6e8" target="_blank">Earn Double-Digit Cloud Revenue the Unconventional Way</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="http://www.ingrammicrocloud.com/wp-content/uploads/sites/2/2015/04/CaseStudy_boice_031815.pdf" target="_blank">The Smart Integrator's Guide to
                                            Using Cloud Support Services</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/Symantec/symanteccasestudy_snptechnologies1.pdf" target="_blank">Symantec and SNP Technologies</a></div></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--                    Case study end-->
                <div class="tab-pane fade" role="tabpanel" id="cloud-primers" aria-labelledby="cloud-primers-tab">
                    <h3>White Papers</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="resources-bullet-points">
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Playbooks/10_ways_autotask_automates.pdf" target="_blank">10 Ways Autotask Automates Your IT Business</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/TrendMicro/sb_worryfree_services_labtech_integration_guide.pdf" target="_blank">Trend Micro Worry-Free Security Services Integration with Labtech</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/N_able/mdmbsm.pdf" target="_blank">Managing Mobile Devices</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/Nextgen/NextGen_NewPueblo.pdf" target="_blank">New Pueblo Medicine - Leading Healthcare’s Transformation in the Primary Practice</a></div></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="resources-bullet-points">
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Vendor_Uploads_Education/Dispelling_the_Vapor_Around_Cloud_Computing.pdf" target="_blank">IBM Dispelling the Vapor Around Cloud Computing</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Vendor_Uploads_Education/Alert_Logic_WP-Keeping_Up_With_Consumers_09162010.pdf" target="_blank">Alert Logic Keeping Up With Consumers and Congress</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Vendor_Uploads_Education/Ingram_Micro_-_Sponsor_Account_Complete_Internal_Threat_Solution_on_the_Endpoint_Delivered_as_a_Service.pdf" target="_blank">Awareness Technologies: Complete Internal Threat Solution on the Endpoint Delivered as a Service</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/TrendMicro/wp_kaseya_integration_guide.pdf" target="_blank">Trend Micro Worry-Free Security Services Integration with Kaseya</a></div></li>
                            </ul>
                        </div>
                    </div>
                    <h3 style="margin-top:40px">Thought Leadership</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="resources-bullet-points">
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/ProfessionalServices/proservices__gigabit_article_october_2013.pdf" target="_blank">Gigabit Wi-Fi</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/ProfessionalServices/ProServicesDontLetITStaffingShortageStuntYourBusinessGrowth.pdf" target="_blank">Don't Let IT Staffing Shortage Stunt Your Business Growth</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Playbooks/4+Steps+to+MDM+Success.pdf" target="_blank">4 Steps to Mobile Device Management Success</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Playbooks/Dont+Miss+The+Cloud+Virtualization+Upturn.pdf" target="_blank">Don't Miss The Cloud Virtualization Upturn</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Playbooks/5+VM+Backup+and+Recovery+Pitfalls+to+Avoid.pdf" target="_blank">Don't Get Burned By a Second Rate VM Backup Product</a></div></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="resources-bullet-points">
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/Playbooks/Why+Now+Is+The+Right+Time+to+See+DaaS.pdf" target="_blank">Why Now Is the Right Time To Start Selling DaaS</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/ProfessionalServices/im_wireless_network_assessment_october_2013.pdf" target="_blank">Boost Your Trusted Advisor Status with an IM Wireless Network Assessment</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/VendorDocs/IM+Link.pdf" target="_blank">Ingram Micro Link: 3 Safeguards To Help Overcome Your Partnering Objections</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11"><a href="https://s3.amazonaws.com/IMC3/CloudServices/Cisco/putting_cloudbased_communication_to_the_test.pdf" target="_blank">boice.net - Putting Cloud-Based Communication to the Test</a></div></li>
                            </ul>
                        </div>
                    </div>
                    <h3 style="margin-top:40px">Recorded Webinars</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="resources-bullet-points">
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11">Cloud Management Services 101<br /><a href="https://ingrammicroevents.webex.com/ingrammicroevents/lsr.php?RCID=8cb3e0bb3d913ce19da79e323539c23c" target="_blank">View Recording</a> | &nbsp;<a href="https://s3.amazonaws.com/Vendor_Uploads_Education/Ingram+Micro+CMS+101.pdf" target="_blank">View PowerPoint deck</a></div></li>
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11">Cloud Management Services 201<br /><a href="https://ingrammicroevents.webex.com/ingrammicroevents/lsr.php?RCID=e94a74981d812f639d4962b7982a5159" target="_blank">View Recording</a> | &nbsp;<a href="https://s3.amazonaws.com/Vendor_Uploads_Education/Ingram+Micro/Ingram+Micro+CMS+201_1.pdf" target="_blank">View PowerPoint deck</a></div></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="resources-bullet-points">
                                <li class="row"><div class="col-xs-2 col-md-1"><i class="fa fa-check-circle" aria-hidden="true"></i></div><div class="col-xs-10 col-md-11">Ingram Micro Cloud Security<br /><a href="https://ingrammicroevents.webex.com/ingrammicroevents/lsr.php?RCID=4d0be5acc1dade6faa8e314d192d6121" target="_blank">View Recording</a> | <a href="https://s3.amazonaws.com/Vendor_Uploads_Education/Ingram+Micro/Webinar+Security+Preso+6_17_15_1.pdf" target="_blank">View PowerPoint deck</a></div></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--                    Cloud premers end-->
                <div class="tab-pane fade" role="tabpanel" id="cloud-playbooks" aria-labelledby="cloud-playbooks-tab">
                    <h3>Recommended Cloud Playbooks</h3>
                    <h4>Your Guide to Sourcing Cloud & IT Services</h4>
                    <p>The Ingram Micro Cloud Playbooks are hosted digital publications delivering our Cloud services vendor specifications, collateral, videos, datasheets, case studies, testimonials and more. You can quickly find information and easily learn about our vendor's cloud service offerings individually and by category.</p>
                    <div class="row">
                        <div class="border-bottom">
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/Amazon-Playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/AWS-230x300.jpg" alt="Amazon Web Services" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/Amazon-Playbook/index.html" target="_blank">
                                            <strong>Amazon Web Services</strong>
                                        </a>
                                        <br> Amazon Web Services (AWS) offers a complete set of infrastructure and application services that enable you to run virtually everything in the cloud: from enterprise applications and big data projects to social games and mobile apps.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/awareness-playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/awareness+technologies+playbook-231x300.jpg" alt="Awareness Technologies" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/awareness-playbook/index.html" target="_blank">
                                            <strong>Awareness Technologies</strong>
                                        </a>
                                        <br> Awareness Technologies understands the value of your customers' data and the need to keep that data secure; that is why we offer a unique endpoint internal threat prevention platform. Awareness Technologies endpoint solution can either be accessed in the cloud or hosted by your customer and allows for the monitoring of end user activities regardless of network location.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="border-bottom">
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/axcient-playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/Axcientplaybook-230x300.jpg" alt="Axcient Backup, Disaster Recovery & Business Continuity" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/axcient-playbook/index.html" target="_blank">
                                            <strong>Axcient Backup, Disaster Recovery & Business Continuity</strong>
                                        </a>
                                        <br> Explore the Axcient cloud continuity solution eliminating application downtime and data loss. Ensure your client's businesses are always on, always protected and always up and running with Axcient cloud solutions.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/bdr-playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/BDRplaybook-232x300.jpg" alt="Awareness Technologies">
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p>
                                        <a href="http://digital.leadmagz.com/publications/ingrammicro/bdr-playbook/index.html" target="_blank">
                                            <strong>Awareness Technologies</strong>
                                        </a>
                                        <br> Awareness Technologies understands the value of your customers' data and the need to keep that data secure; that is why we offer a unique endpoint internal threat prevention platform. Awareness Technologies endpoint solution can either be accessed in the cloud or hosted by your customer and allows for the monitoring of end user activities regardless of network location.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-bottom: 30px;">
                        <div class="border-bottom">
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/dincloud-playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/dinCloudplaybook-232x300.jpg" alt="dinCloud Virtual Hosted Desktop as a Service" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/dincloud-playbook/index.html" target="_blank">
                                            <strong>dinCloud Virtual Hosted Desktop as a Service</strong>
                                        </a>
                                        <br> Learn how dinCloud provides business provisioning in the cloud including desktops, the applications that run on them, the servers that power the applications, and storage.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/cyrus-one-playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/CyrusOnePlaybook-231x300.jpg" alt="Cyrus One playbook" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/cyrus-one-playbook/index.html" target="_blank">
                                            <strong>CyrusOne</strong>
                                        </a>
                                        <br> Data Center Solutions that are highly reliable enterprise-class, carrier-neutral data center properties with the security that customers require.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="border-bottom">
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/IaaS-Playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/IaaSplaybook-232x300.jpg" alt="Infrastructure as a Service" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/IaaS-Playbook/index.html" target="_blank">
                                            <strong>Infrastructure as a Service</strong>
                                        </a>
                                        <br> Infrastructure-as-a-Service (laaS) is the fastest growing segment of the public cloud market. It is expected to grow 47.3% this year, reaching $9 billion. Small businesses are adopting the cloud at a more rapid clip than companies of other sizes. Organizations with five to 99 employees are the fastest growing segment for public cloud computing and will increase public cloud spending from $2.5 billion in 2010 to $6.6 billion in 2015.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/ibm-playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/IBMplaybook-231x300.jpg" alt="IBM Managed Security Services" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/ibm-playbook/index.html" target="_blank">
                                            <strong>IBM Managed Security Services</strong>
                                        </a>
                                        <br> Harness the power of IBM's Cloud Solutions by reducing your customer's total cost of ownership utilizing: IBM Managed Security Services, IBM Datacenter, IBM Smartcloud Enterprise and IBM Software.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="border-bottom">
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/PGI-Playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/PGiplaybookcover-231x300.jpg" alt="PGi" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/PGI-Playbook/index.html" target="_blank">
                                            <strong>PGi</strong>
                                        </a>
                                        <br> Infrastructure-as-a-Service (laaS) is the fastest growing segment of the public cloud market. It is expected to grow 47.3% this year, reaching $9 billion. Small businesses are adopting the cloud at a more rapid clip than companies of other sizes. Organizations with five to 99 employees are the fastest growing segment for public cloud computing and will increase public cloud spending from $2.5 billion in 2010 to $6.6 billion in 2015.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/Learn-About-Cloud/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/LearnAboutCloudplaybook-231x300.jpg" alt="Learn About Cloud" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/Learn-About-Cloud/index.html" target="_blank">
                                            <strong>Learn About Cloud</strong>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-bottom: 30px;">
                        <div class="border-bottom">
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/RingCentral-Playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/RingCentralplaybookcover-231x300.jpg" alt="Ring Central" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/RingCentral-Playbook/index.html" target="_blank">
                                            <strong>RingCentral</strong>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/rmm-playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/RMM-230x300.png" alt="Remote Monitoring and Management Vendors" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/rmm-playbook/index.html" target="_blank">
                                            <strong>Remote Monitoring and Management Vendors</strong>
                                        </a>
                                        <br> Offering Remote Monitoring and Management (RMM) services as a base tier of client care programs is a great way to make your relationship with your clients stickier and solidify your role as their "trusted advisor".
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-bottom: 30px;">
                        <div class="border-bottom">
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/SoftLayer-Playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/SoftLayer-Playbook.png" alt="SoftLayer" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/SoftLayer-Playbook/index.html" target="_blank">
                                            <strong>SoftLayer</strong>
                                        </a>
                                        <br> No two clouds are built the same way. SoftLayer gives you the highest performing cloud infrastructure available. One platform that takes data centers around the world that are full of the widest range of cloud computing options, and then integrates and automates everything.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/sherweb-playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/SherWebplaybook-300x231.jpg" alt="SherWeb" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/sherweb-playbook/index.html" target="_blank">
                                            <strong>SherWeb</strong>
                                        </a>
                                        <br> SherWeb offers a thorough step-by-step process in place to ensure a smooth migration to hosted Exchange or SharePoint services over the cloud.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-bottom: 30px;">
                        <div class="border-bottom">
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://www.itepubs.com/ingram-onboarding-training-playbook/page/1" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/trend-micro-playbook-new.png" alt="Trend Micro" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://www.itepubs.com/ingram-onboarding-training-playbook/page/1" target="_blank">
                                            <strong>Trend Micro</strong>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/Symantec-Playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/SymantecPlaybookIcon-232x300.jpg" alt="Symantec" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/Symantec-Playbook/index.html" target="_blank">
                                            <strong>Symantec</strong>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-bottom: 30px;">
                        <div class="border-bottom">
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/VaultLogix-Playbook/index.html#?page=0" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/VaultLogix-Playbook.png" alt="VaultLogix" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/VaultLogix-Playbook/index.html#?page=0" target="_blank">
                                            <strong>VaultLogix</strong>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://www.ingrammicroplaybook.com/training-na/" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/Ingram-Micro-Training-NA-Playbook-Winter-2014.png" alt="Ingram Micro Training" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://www.ingrammicroplaybook.com/training-na/" target="_blank">
                                            <strong>Ingram Micro Training</strong>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="border-bottom">
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://digital.leadmagz.com/publications/ingrammicro/vCloud-Air-Reseller-Playbook/index.html" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/VMware_vCloud_Air_Playbook.png" alt="VMware vCloud Air" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://digital.leadmagz.com/publications/ingrammicro/vCloud-Air-Reseller-Playbook/index.html" target="_blank">
                                            <strong>VMware vCloud Air</strong>
                                        </a>
                                        <br> Built on vSphere - the world's most trusted cloud infrastructure, VMware now provides a common platform that spans private and public cloud enabling organizations to dynamically scale their IT infrastructure without changing the way they run it. VMware vCloud Air offers automated replication, monitoring, and high availability of applications without requiring any code changes.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <a href="http://www.itepubs.com/dropbox-business-playbook/page/1" target="_blank">
                                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/page-resources/dropbox-playbook-cover.png" alt="Dropbox Business" />
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <p><a href="http://www.itepubs.com/dropbox-business-playbook/page/1" target="_blank">
                                            <strong>Dropbox Business</strong>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>