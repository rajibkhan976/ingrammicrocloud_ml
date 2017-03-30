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

    <section class="sub-panel1">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo">
                        <a href="<?php echo get_bloginfo('url'); ?>"><img class="img-responsive" src="/wp-content/uploads/2016/11/cloud-summit-2017-logo2.png"></img></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="panel2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="left-border pull-left">
                        <h2><?php the_title();?></h2>
                    </div>
                    <div id="speakers_register_now">
						<a href="http://www.cvent.com/d/3fqj0t/8C?ct=b352e06e-1055-4907-9c5c-a2c67385b62d&amp;RefID=Attendee" target="_blank" class="btn btn-outline-gray" role="button">REGISTER NOW</a>
					</div>
                </div>
                <!--div class="col-sm-6">

                </div-->
            </div>
        </div>
    </section>

    <section class="speakers-panel3">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/marcrandolph.jpg"></img>
                </div>
                <div class="col-sm-9" id="marc-randolph">
                    <h2>Marc Randolph <span class="badge">Keynote</span></h2>
                    <h3>Co-Founder and Former CEO of Netflix and Co-Founder of Looker Data Sciences</h3>
                    <p style="text-align: justify;">Marc Randolph is the co-founder and former CEO of Netflix, and co-founder of Looker Data Sciences. Netflix has become the leading platform for entertainment consumption with more than 83 million subscribers worldwide. Randolph is not only the co-founder of over half a dozen other successful startups, but he also mentors hundreds of early stage entrepreneurs. As a co-founder of Looker Data Sciences, a leading software analytics and business intelligence firm, he helped put strategies in motion that have led the company to amass a current client list of over 450 high profile brands, including eBay, Intel and Kohler.</p>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-3">
                    <img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/nimesh-small.jpg"></img>
                </div>
                <div class="col-sm-9" id="nimesh-dave">
                    <h2>Nimesh Dav&eacute; <span class="badge">Keynote</span></h2>
                    <h3>EVP, Global Cloud, Ingram Micro</h3>
                    <p style="text-align: justify;">Nimesh Dav&eacute; serves as executive vice president, global business process and cloud computing of Ingram Micro Inc., the world's largest technology distributor and supply-chain services provider based in Irvine, Calif. As a member of the Ingram Micro worldwide executive team, Dav&eacute; is responsible for designing and implementing harmonized global business practices throughout the organization and architecting world class solutions to meet our diverse customer needs. He joined the company in September 2012. Prior to joining Ingram Micro, Dav&eacute; served most recently as senior vice president, commercial operations, strategy and supply-chain solutions for Tech Data Europe. While in this role he led several major transformation initiatives and spearheaded the formation of a supply chain services division. Prior to taking on the operations and strategy role, Dav&eacute;'s held senior executive roles in Information Technology in the America's and Europe, where he led major ERP, infrastructure and commerce application deployments.</p>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-3">
                    <img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/renee-small.jpg"></img>
                </div>
                <div class="col-sm-9" id="renee-bergeron">
                    <h2>Ren&eacute;e Bergeron <span class="badge">Keynote</span></h2>
                    <h3>SVP, Global Cloud Channel, Ingram Micro</h3>
                    <p style="text-align: justify;">Ren&eacute;e Bergeron serves as Vice President, Global Cloud Computing, Ingram Micro. She leads the Ingram Micro Cloud Division and has responsibility for the division's organizational management as well as its strategic direction, sales growth and business development activities. With more than 25 years of business-unit leadership experience, Bergeron is a driving force behind identifying and cultivating new opportunities in cloud computing for Ingram Micro. Bergeron joined Ingram Micro in September 2010. Most recently, she led the $300 million IT Services Solutions business at Fujitsu America. At Fujitsu America Bergeron oversaw the development of innovative solutions, most notably the company's managed security, data center virtualization and cloud computing offerings. Prior to joining Fujitsu, she led information technology divisions at media and banking companies and was a director at a prominent international technology consulting firm. Bergeron holds a bachelor of science degree in computer science from Sherbrooke University in Sherbrooke, Canada, and a master's degree from McGill University in Montreal, Canada. She is based at Ingram Micro's headquarters in Irvine, Calif.</p>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-3">
                    <img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/McKelvey.jpg"></img>
                </div>
                <div class="col-sm-9" id="jim-mckelvey">
                    <h2>Jim McKelvey <span class="badge">Keynote</span></h2>
                    <h3>Co-Founder of Square and Founder of LauchCode</h3>
                    <p style="text-align: justify;">Jim McKelvey is the co-founder of Square and the founder of LaunchCode. Square is a mobile payment platform that allows vendors to accept credit payments anywhere, anytime. Valued at $6 billion, Square has more than 600 employees who are dedicated to helping resellers run their business and streamline operations. LaunchCode, Jim’s latest venture, is making it possible for anyone to learn programming and land a full-time job in under six months without any fees. Named one of Inc. Magazines “15 Entrepreneurs to Watch in 2015,” he is also a licensed pilot and a master glass blower.</p>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-3">
                       <img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/pam-miller.jpg"></img>
                </div>
                <div class="col-sm-9" id="pam-miller">
                    <h2>Pam Miller <span class="badge">Keynote</span></h2>
                    <h3>Director, Infrastructure Channels Research, IDC</h3>
                    <p style="text-align: justify;">Pam Miller serves as Director, Partnering Research in the Channels and Alliances Research group at IDC. She provides analysis into how leading IT vendors go to market with their channel partners, including recommendations on channel strategies and trends that impact the relationships between vendors and their channel partners. She also studies the relationship and interplay between distributors and their MSPs, VARs, SIs, and ISVs communities. As part of her research, she analyzes strategies, business models, policies and practices to identify market catalysts and effectors. Prior to joining IDC, Ms. Miller held senior management and consulting positions with software, hardware and service companies. Her previous positions include CEO of Rocket Network, one of the first cloud collaboration providers, President of Kensington Computer Products, GM of Alps USA Computer Products and Sr. Product Manager at Microsoft. Ms. Miller holds an MBA in marketing and finance from UCLA’s Anderson School of Management and a bachelor's degree in psychology from UCLA.</p>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-3">
                       <img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/jujhar-singh.jpg"></img>
                </div>
                <div class="col-sm-9" id="jujhar-singh">
                    <h2>Jujhar Singh <span class="badge">Keynote</span></h2>
                    <h3>Corporate Vice President, Microsoft</h3>
                    <p style="text-align: justify;">As Corporate Vice President of Microsoft Dynamics CRM, Jujhar is responsible for the product development, strategy and direction of the CRM product line and incubating newly acquired companies in the CRM family. He was instrumental in driving multiple releases of CRM, marketing and social in the last three years at Microsoft. His leadership resulted in accelerated growth of the CRM product line and the business.</p>
                    <p style="text-align: justify;">Jujhar is most passionate about delivering innovative business solutions that provide tangible value to customers. He is an experienced technology and business leader with deep knowledge of CRM, business analytics, social media and web technologies. Jujhar has 20+ years of experience in strategic planning, corporate strategy, product management, new product introduction and marketing.</p>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-3">
                 	<img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/trollope.jpg"></img>
                </div>
                <div class="col-sm-9" id="rowan-trollope">
                    <h2>Rowan Trollope <span class="badge">Keynote</span></h2>
                    <h3>SVP and General Manager, IoT and Applications, Cisco</h3>
                    <p style="text-align: justify;">Rowan Trollope is Senior Vice President and General Manager of Internet of Things (IoT) and Applications at Cisco. Trollope joined Cisco in 2012 to lead a dramatic leap forward in the way people connect and collaborate at work. Most recently, Trollope was appointed to also lead Cisco's global IoT efforts, which includes technology solutions across IoT market segments, such as manufacturing, industrial, transportation, public sector, and many others. To capitalize on mobile and cloud opportunities, Trollope also built a next-generation cloud platform and its first application, the business messaging service Cisco Spark.</p>
                    <p style="text-align: justify;">Prior to joining Cisco, Trollope led Symantec's sales, marketing, and product development teams as the Group President, responsible for its cloud security business and the SMB segment. Prior to that, Trollope led product development and marketing for the Norton consumer business and, previously, Symantec's high-end Enterprise Security division.</p>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-3">
                    <img class="img-responsive" src="<?php echo bloginfo('template_url'); ?>/img/thomas-hansen.jpg"></img>
                </div>
                <div class="col-sm-9" id="thomas-hansen">
                    <h2>Thomas Hansen <span class="badge">Keynote</span></h2>
                    <h3>Global Vice President, Revenue, Dropbox</h3>
                    <p style="text-align: justify;">Thomas Hansen is the Global Vice President of Revenue at Dropbox, leading the global teams focused on bringing Dropbox to more customers around the world, from individuals to small businesses to the largest enterprises. Thomas also currently serves as an advisor to Insightly, the best-in-class CRM system for small business. Thomas started his career managing a small windsurfing company in Denmark, where he was raised and educated, and later went on to work in South Africa, Thailand and Turkey for leading IT organizations, including Naspers, Dell, Olivetti and Microsoft. At Microsoft from 2001 until 2015, Thomas was most recently the Worldwide Vice President of the SMB Organization, responsible for a multi-billion dollar hyper-growth business.</p>
                </div>
            </div>
            <br><br>
        </div>
    </section>

<?php endwhile; // End of the loop. ?>

<?php get_footer(); ?>
