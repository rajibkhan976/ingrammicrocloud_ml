<?php get_header();
/*
 Template name: Cloud Store Template All (Dutch)
 */
?>
<?php
get_template_part('navigation');
?>

<style>
html {
    font-family: Raleway;
    color: #fff;
    background-color: #fff;
}

.iframe {
width: 200px;
height: 600px;
}

.fa-ul li {
    font-size: 16px;
    margin-bottom: 10px;
}

#header {
    background: url('http://www.ingrammicrocloud.com/us/wp-content/uploads/sites/2/2015/11/featured-bg.png') no-repeat center center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

#headline {
    font-weight: 600 !important;
    margin-top: 55px !important;
    line-height: 100% !important;
    font-size: 31px !important	;
    color: #fff;
    margin-bottom: 0px !important;
    padding-bottom: 0px !important;
}

#subhead {
    font-weight: 500 !important;
    font-size: 24px !important;
    margin-bottom:  0px !important;
}

p#intro-text {
    font-size: 18px !important;
    color: #fff;
    font-weight: 200 !important;
	line-height: 1.3em !important;
	margin-top: 10px !important;
	margin-bottom: 18px !important;
}

#play {
    margin-top: 150px !important;
    width: 175px;
    cursor: pointer;
}

#cta1 {
    background-color: #eb9921 !important;
   	padding: 20px 10px !important;
   	border-radius: 0px !important;
   	width: 225px !important;
   	text-align: center !important;
   	font-size: 18px !important;
   	font-weight: 500 !important;
   	margin-top: 22px !important;
   	cursor: pointer !important;
   	color: #fff !important;
   	border: none !important;
}


#benefits {
    margin: 150px auto 50px;
    color: #555;
}

.fa-ul>li {
    color: #fff;
}

.fa {
    color: #fff;
}

.fa-stack {
    vertical-align: top;
    line-height: 0;
	height: 70px;
}

.fa-stack .fa {
    font-size: 40px !important;
    margin:  0px !important;
    padding: 0px !important;
}

.fa-stack .fa-circle {
	font-size: 120px !important;
}


.centered {
    text-align: center;
}

.icon-background {
    color: #386eb1;
}

.icon-title {
    font-size: 16px !important;
    color: #386eb1;
    font-weight: 600 !important;
    min-height: 80px;
    line-height: 1.3em !important;
}

.icon-description {
	font-size:  14px;
	line-height:  1.4em;
	color: #555 !important;
}

#cta-text {
    margin-top: 27px !important;
    font-size: 27px !important;
    color: #fff;
    font-weight: 600;
    text-align: left !important;
}

#cta2 {
    padding: 10px 0 0px !important;
    background: #db9228;
}

#cta2 #cta-button {
    background-color: #386eb1 !important;
    padding: 20px 10px !important;
    border-radius: 0px !important;
    width: 225px !important;
    text-align: center !important;
    font-size: 18px !important;
    font-weight: 500 !important;
	margin-top: 11px !important;
    cursor: pointer !important;
    color: #fff !important;
}

#cta-button {
    margin-top: 10px;
}

#compare {
    background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,1)),
url('http://dev.ingrammicrocloud.com/us/wp-content/uploads/sites/2/2015/11/cloud-bg.png') no-repeat center center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding-top: 100px;
display: none;
}

#compare h2 {
    color: #386eb1;
    font-size: 35px;
}

#snapshot {
    margin-top: 100px;
    margin-bottom: 100px;
}

.snapshot-headline {
    color: #386eb1;
}

.table {
    color: #386eb1;
    width: 75%;
    margin: 0 auto;
}

th {
    background-color: #386eb1;
    color: #fff;
    font-weight: 400;
    font-size: 28px;
}

.white-right-border {
    border-right: 2px solid white;
}

td {
    font-size: 20px;
}

.table-row:nth-child(even) {
    background: rgba(56, 110, 157, 0.1);
}

.snapshot-subhead {
    line-height: 100%;
    font-size: 23px;
    margin: 10px 90px 50px;
    color: #386eb1;
}

.snapshot-text {
    margin-bottom: 20px;
}

#snapshot img {
margin-top: -10px;
}

#cta3 {
    background-color: #eb9921;
    text-align: center;
    padding: 15px 5px;
    border-radius: .25em;
    margin: 30px 0 0 0;
    width: 275px;
    cursor: pointer;
color: #fff;
    font-size: 23px;
}

#elevate {
    background: url('http://dev.ingrammicrocloud.com/us/wp-content/uploads/sites/2/2015/11/cloud-elevate-bg.png') no-repeat center center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    color: #fff;
    padding: 100px 0;
}

#elevate-headline {
    font-size: 35px;
    font-weight: 600 !important;
}

.elevate-text {
    color: #fff;
    font-size: 20px;
    margin-bottom: 20px;
}

.mcs-promo {
    color: #76bff0;
}

#cta4 {
    background-color: #eb9921;
    padding: 15px 5px;
    border-radius: .25em;
    margin: 30px 0 0 0;
    width: 275px;
    cursor: pointer;
    text-align: center;
color: #fff;
    font-size: 23px;
}

#header {
    position: relative;
}

.videoWrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

#video-close {
    top: 0;
    right: 0;
    font-size: 30px;
    margin: 10px 5% 0 0;
    cursor: pointer;
    position: absolute;
    color: #fff;
}

.relative {
    position: relative;
}

#lights-out {
    width: 100%;
    height: 100%;
    position: absolute;
    background-color: rgba(0, 0, 0, .6);
    -webkit-transition: all 2s;
    -moz-transition: all 2s;
    -o-transition: all 2s;
    transition: all 2s;
}

#compare {
    background: url('http://dev.ingrammicrocloud.com/us/wp-content/uploads/sites/2/2015/11/cloud-bg.png') no-repeat top center;
    background-position: 50% 145% !important;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding-top: 100px;
    padding-bottom: 100px !important;
}

#compare h2 {
    color: #386eb1 !important;    
    font-size: 27px !important;
    font-weight: 600 !important;
    margin-bottom: 40px !important;
    
}



#snapshot {
    margin-bottom: 100px;
}

.snapshot-headline {
    color: #386eb1;
}

.table {
    color: #386eb1;
    width: 75%;
    margin: 0 auto;
}

th {
    background-color: #386eb1;
    color: #fff;
    font-weight: 500 !important;
    font-size: 20px !important;
	line-height: 2.5em !important;
	padding-left: 25px !important;
}

.white-right-border {
    border-right: 2px solid white;
    
}

td {
    font-size: 16px !important;
	font-weight: 600 !important;
	padding: 18px !important;
	padding-bottom: 5px !important;
	margin: 0px !important;
}

.table-row:nth-child(even) {
    background: rgba(56, 110, 176, 0.3) !important;
}

.table-row:nth-child(odd) {
    background: rgba(255, 255, 255, 0.5) !important;
}

.snapshot-headline {
	color: #386eb1 !important;    
	font-size: 27px !important;
	font-weight: 600 !important;
}

.snapshot-subhead {
    line-height: 100%;
}

#snapshot h3 {
	font-size: 20px !important;
	margin-bottom: 50px !important;
	margin-top:  10px !important;
	color: #386eb1 !important;
	line-height: 1.2em;
}
.snapshot-text {
    margin-bottom: 50px;
}

#cta3 {
    background-color: #eb9921 !important;
	padding: 20px 10px !important;
	border-radius: 0px !important;
	width: 225px !important;
	text-align: center !important;
	font-size: 18px !important;
	font-weight: 500 !important;
	margin-top: 22px !important;
	cursor: pointer !important;
	color: #fff !important;
	margin-left: 17px !important;
	
}

#elevate {
    background: url('http://dev.ingrammicrocloud.com/us/wp-content/uploads/sites/2/2015/11/cloud-elevate-bg.png') no-repeat center center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    color: #fff;
    padding: 100px 0;
}

#elevate-headline {
    font-size: 30px !important;
    font-weight: 600 !important;
}

.elevate-text {
    color: #fff;
    font-size: 18px !important;
    margin-bottom: 20px !important;
}

.mcs-promo {
    color: #76bff0;
}

#cta4 {
    background-color: #eb9921 !important;
	padding: 20px 10px !important;
	border-radius: 0px !important;
	width: 225px !important;
	text-align: center !important;
	font-size: 18px !important;
	font-weight: 500 !important;
	margin-top: 22px !important;
	cursor: pointer !important;
	color: #fff !important;
}


/* Added */

#header {
    position: relative;
}

.videoWrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

#video-close {
    top: 0;
    right: 0;
    font-size: 30px;
    margin: 10px 15% 0 0;
    cursor: pointer;
    position: absolute;
    color: #fff;
}

.relative {
    position: relative;
}

#lights-out {
    width: 100%;
    height: 100%;
    position: absolute;
    background-color: rgba(0, 0, 0, .6);
    -webkit-transition: all 2s;
    -moz-transition: all 2s;
    -o-transition: all 2s;
    transition: all 2s;
}


#compare h2 {
margin-bottom: 40px;
}

tr td:first-child {
padding-left: 30px !important;
}

.blue-circle {
    background-color: #386eb1;
    padding: 50px;
    border-radius: 5em;
    height: 10px;
    width: 10px;
    margin: -56px 0 17px 40px;
}

.white-cloud {
    position: absolute;
    bottom: 0;
    right: 0;
    margin: 0 185px -19px 0;
    width: 450px;
}



/*****
Modal
******/

#form-head {
    position: absolute;
    color: #fff;
    top: 30px;
    left: 60px;
    font-size: 24px;
}

#form-subhead {
    color: #fff;
    position: absolute;
    top: 60px;
    left: 60px;
}

.modal a.close-modal {
display: none;
}

/* /Added */


/************
Bootstrap Grid
************/


/*!
 * Bootstrap v3.3.5 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */


/*!
 * Generated using the Bootstrap Customizer (http://getbootstrap.com/customize/?id=e6bc2067dc34bd54cdae)
 * Config saved to config.json and https://gist.github.com/e6bc2067dc34bd54cdae
 */


/*!
 * Bootstrap v3.3.5 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */


/*! normalize.css v3.0.3 | MIT License | github.com/necolas/normalize.css */

.row {
    margin-left: -15px;
    margin-right: -15px;
}

.col-xs-1,
.col-sm-1,
.col-md-1,
.col-lg-1,
.col-xs-2,
.col-sm-2,
.col-md-2,
.col-lg-2,
.col-xs-3,
.col-sm-3,
.col-md-3,
.col-lg-3,
.col-xs-4,
.col-sm-4,
.col-md-4,
.col-lg-4,
.col-xs-5,
.col-sm-5,
.col-md-5,
.col-lg-5,
.col-xs-6,
.col-sm-6,
.col-md-6,
.col-lg-6,
.col-xs-7,
.col-sm-7,
.col-md-7,
.col-lg-7,
.col-xs-8,
.col-sm-8,
.col-md-8,
.col-lg-8,
.col-xs-9,
.col-sm-9,
.col-md-9,
.col-lg-9,
.col-xs-10,
.col-sm-10,
.col-md-10,
.col-lg-10,
.col-xs-11,
.col-sm-11,
.col-md-11,
.col-lg-11,
.col-xs-12,
.col-sm-12,
.col-md-12,
.col-lg-12 {
    position: relative;
    min-height: 1px;
    padding-left: 15px;
    padding-right: 15px;
}

.col-xs-1,
.col-xs-2,
.col-xs-3,
.col-xs-4,
.col-xs-5,
.col-xs-6,
.col-xs-7,
.col-xs-8,
.col-xs-9,
.col-xs-10,
.col-xs-11,
.col-xs-12 {
    float: left;
}

.col-xs-12 {
    width: 100%;
}

.col-xs-11 {
    width: 91.66666667%;
}

.col-xs-10 {
    width: 83.33333333%;
}

.col-xs-9 {
    width: 75%;
}

.col-xs-8 {
    width: 66.66666667%;
}

.col-xs-7 {
    width: 58.33333333%;
}

.col-xs-6 {
    width: 50%;
}

.col-xs-5 {
    width: 41.66666667%;
}

.col-xs-4 {
    width: 33.33333333%;
}

.col-xs-3 {
    width: 25%;
}

.col-xs-2 {
    width: 16.66666667%;
}

.col-xs-1 {
    width: 8.33333333%;
}

.col-xs-pull-12 {
    right: 100%;
}

.col-xs-pull-11 {
    right: 91.66666667%;
}

.col-xs-pull-10 {
    right: 83.33333333%;
}

.col-xs-pull-9 {
    right: 75%;
}

.col-xs-pull-8 {
    right: 66.66666667%;
}

.col-xs-pull-7 {
    right: 58.33333333%;
}

.col-xs-pull-6 {
    right: 50%;
}

.col-xs-pull-5 {
    right: 41.66666667%;
}

.col-xs-pull-4 {
    right: 33.33333333%;
}

.col-xs-pull-3 {
    right: 25%;
}

.col-xs-pull-2 {
    right: 16.66666667%;
}

.col-xs-pull-1 {
    right: 8.33333333%;
}

.col-xs-pull-0 {
    right: auto;
}

.col-xs-push-12 {
    left: 100%;
}

.col-xs-push-11 {
    left: 91.66666667%;
}

.col-xs-push-10 {
    left: 83.33333333%;
}

.col-xs-push-9 {
    left: 75%;
}

.col-xs-push-8 {
    left: 66.66666667%;
}

.col-xs-push-7 {
    left: 58.33333333%;
}

.col-xs-push-6 {
    left: 50%;
}

.col-xs-push-5 {
    left: 41.66666667%;
}

.col-xs-push-4 {
    left: 33.33333333%;
}

.col-xs-push-3 {
    left: 25%;
}

.col-xs-push-2 {
    left: 16.66666667%;
}

.col-xs-push-1 {
    left: 8.33333333%;
}

.col-xs-push-0 {
    left: auto;
}

.col-xs-offset-12 {
    margin-left: 100%;
}

.col-xs-offset-11 {
    margin-left: 91.66666667%;
}

.col-xs-offset-10 {
    margin-left: 83.33333333%;
}

.col-xs-offset-9 {
    margin-left: 75%;
}

.col-xs-offset-8 {
    margin-left: 66.66666667%;
}

.col-xs-offset-7 {
    margin-left: 58.33333333%;
}

.col-xs-offset-6 {
    margin-left: 50%;
}

.col-xs-offset-5 {
    margin-left: 41.66666667%;
}

.col-xs-offset-4 {
    margin-left: 33.33333333%;
}

.col-xs-offset-3 {
    margin-left: 25%;
}

.col-xs-offset-2 {
    margin-left: 16.66666667%;
}

.col-xs-offset-1 {
    margin-left: 8.33333333%;
}

.col-xs-offset-0 {
    margin-left: 0%;
}

@media (min-width: 768px) {
    .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
        float: left;
    }
    .col-sm-12 {
        width: 100%;
    }
    .col-sm-11 {
        width: 91.66666667%;
    }
    .col-sm-10 {
        width: 83.33333333%;
    }
    .col-sm-9 {
        width: 75%;
    }
    .col-sm-8 {
        width: 66.66666667%;
    }
    .col-sm-7 {
        width: 58.33333333%;
    }
    .col-sm-6 {
        width: 50%;
    }
    .col-sm-5 {
        width: 41.66666667%;
    }
    .col-sm-4 {
        width: 33.33333333%;
    }
    .col-sm-3 {
        width: 25%;
    }
    .col-sm-2 {
        width: 16.66666667%;
    }
    .col-sm-1 {
        width: 8.33333333%;
    }
    .col-sm-pull-12 {
        right: 100%;
    }
    .col-sm-pull-11 {
        right: 91.66666667%;
    }
    .col-sm-pull-10 {
        right: 83.33333333%;
    }
    .col-sm-pull-9 {
        right: 75%;
    }
    .col-sm-pull-8 {
        right: 66.66666667%;
    }
    .col-sm-pull-7 {
        right: 58.33333333%;
    }
    .col-sm-pull-6 {
        right: 50%;
    }
    .col-sm-pull-5 {
        right: 41.66666667%;
    }
    .col-sm-pull-4 {
        right: 33.33333333%;
    }
    .col-sm-pull-3 {
        right: 25%;
    }
    .col-sm-pull-2 {
        right: 16.66666667%;
    }
    .col-sm-pull-1 {
        right: 8.33333333%;
    }
    .col-sm-pull-0 {
        right: auto;
    }
    .col-sm-push-12 {
        left: 100%;
    }
    .col-sm-push-11 {
        left: 91.66666667%;
    }
    .col-sm-push-10 {
        left: 83.33333333%;
    }
    .col-sm-push-9 {
        left: 75%;
    }
    .col-sm-push-8 {
        left: 66.66666667%;
    }
    .col-sm-push-7 {
        left: 58.33333333%;
    }
    .col-sm-push-6 {
        left: 50%;
    }
    .col-sm-push-5 {
        left: 41.66666667%;
    }
    .col-sm-push-4 {
        left: 33.33333333%;
    }
    .col-sm-push-3 {
        left: 25%;
    }
    .col-sm-push-2 {
        left: 16.66666667%;
    }
    .col-sm-push-1 {
        left: 8.33333333%;
    }
    .col-sm-push-0 {
        left: auto;
    }
    .col-sm-offset-12 {
        margin-left: 100%;
    }
    .col-sm-offset-11 {
        margin-left: 91.66666667%;
    }
    .col-sm-offset-10 {
        margin-left: 83.33333333%;
    }
    .col-sm-offset-9 {
        margin-left: 75%;
    }
    .col-sm-offset-8 {
        margin-left: 66.66666667%;
    }
    .col-sm-offset-7 {
        margin-left: 58.33333333%;
    }
    .col-sm-offset-6 {
        margin-left: 50%;
    }
    .col-sm-offset-5 {
        margin-left: 41.66666667%;
    }
    .col-sm-offset-4 {
        margin-left: 33.33333333%;
    }
    .col-sm-offset-3 {
        margin-left: 25%;
    }
    .col-sm-offset-2 {
        margin-left: 16.66666667%;
    }
    .col-sm-offset-1 {
        margin-left: 8.33333333%;
    }
    .col-sm-offset-0 {
        margin-left: 0%;
    }
}

@media (min-width: 992px) {
    .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
        float: left;
    }
    .col-md-12 {
        width: 100%;
    }
    .col-md-11 {
        width: 91.66666667%;
    }
    .col-md-10 {
        width: 83.33333333%;
    }
    .col-md-9 {
        width: 75%;
    }
    .col-md-8 {
        width: 66.66666667%;
    }
    .col-md-7 {
        width: 58.33333333%;
    }
    .col-md-6 {
        width: 47%;
    }
    .col-md-5 {
        width: 41.66666667%;
    }
    .col-md-4 {
        width: 33.33333333%;
    }
    .col-md-3 {
        width: 22%;
    }
    .col-md-2 {
        width: 16.66666667%;
    }
    .col-md-1 {
        width: 8.33333333%;
    }
    .col-md-pull-12 {
        right: 100%;
    }
    .col-md-pull-11 {
        right: 91.66666667%;
    }
    .col-md-pull-10 {
        right: 83.33333333%;
    }
    .col-md-pull-9 {
        right: 75%;
    }
    .col-md-pull-8 {
        right: 66.66666667%;
    }
    .col-md-pull-7 {
        right: 58.33333333%;
    }
    .col-md-pull-6 {
        right: 50%;
    }
    .col-md-pull-5 {
        right: 41.66666667%;
    }
    .col-md-pull-4 {
        right: 33.33333333%;
    }
    .col-md-pull-3 {
        right: 25%;
    }
    .col-md-pull-2 {
        right: 16.66666667%;
    }
    .col-md-pull-1 {
        right: 8.33333333%;
    }
    .col-md-pull-0 {
        right: auto;
    }
    .col-md-push-12 {
        left: 100%;
    }
    .col-md-push-11 {
        left: 91.66666667%;
    }
    .col-md-push-10 {
        left: 83.33333333%;
    }
    .col-md-push-9 {
        left: 75%;
    }
    .col-md-push-8 {
        left: 66.66666667%;
    }
    .col-md-push-7 {
        left: 58.33333333%;
    }
    .col-md-push-6 {
        left: 50%;
    }
    .col-md-push-5 {
        left: 41.66666667%;
    }
    .col-md-push-4 {
        left: 33.33333333%;
    }
    .col-md-push-3 {
        left: 25%;
    }
    .col-md-push-2 {
        left: 16.66666667%;
    }
    .col-md-push-1 {
        left: 8.33333333%;
    }
    .col-md-push-0 {
        left: auto;
    }
    .col-md-offset-12 {
        margin-left: 100%;
    }
    .col-md-offset-11 {
        margin-left: 91.66666667%;
    }
    .col-md-offset-10 {
        margin-left: 83.33333333%;
    }
    .col-md-offset-9 {
        margin-left: 75%;
    }
    .col-md-offset-8 {
        margin-left: 66.66666667%;
    }
    .col-md-offset-7 {
        margin-left: 58.33333333%;
    }
    .col-md-offset-6 {
        margin-left: 50%;
    }
    .col-md-offset-5 {
        margin-left: 41.66666667%;
    }
    .col-md-offset-4 {
        margin-left: 33.33333333%;
    }
    .col-md-offset-3 {
        margin-left: 25%;
    }
    .col-md-offset-2 {
        margin-left: 16.66666667%;
    }
    .col-md-offset-1 {
        margin-left: 8.33333333%;
    }
    .col-md-offset-0 {
        margin-left: 0%;
    }
}

@media (min-width: 1200px) {
    .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
        float: left;
    }
    .col-lg-12 {
        width: 100%;
    }
    .col-lg-11 {
        width: 91.66666667%;
    }
    .col-lg-10 {
        width: 83.33333333%;
    }
    .col-lg-9 {
        width: 75%;
    }
    .col-lg-8 {
        width: 66.66666667%;
    }
    .col-lg-7 {
        width: 58.33333333%;
    }
    .col-lg-6 {
        width: 50%;
    }
    .col-lg-5 {
        width: 41.66666667%;
    }
    .col-lg-4 {
        width: 33.33333333%;
    }
    .col-lg-3 {
        width: 25%;
    }
    .col-lg-2 {
        width: 16.66666667%;
    }
    .col-lg-1 {
        width: 8.33333333%;
    }
    .col-lg-pull-12 {
        right: 100%;
    }
    .col-lg-pull-11 {
        right: 91.66666667%;
    }
    .col-lg-pull-10 {
        right: 83.33333333%;
    }
    .col-lg-pull-9 {
        right: 75%;
    }
    .col-lg-pull-8 {
        right: 66.66666667%;
    }
    .col-lg-pull-7 {
        right: 58.33333333%;
    }
    .col-lg-pull-6 {
        right: 50%;
    }
    .col-lg-pull-5 {
        right: 41.66666667%;
    }
    .col-lg-pull-4 {
        right: 33.33333333%;
    }
    .col-lg-pull-3 {
        right: 25%;
    }
    .col-lg-pull-2 {
        right: 16.66666667%;
    }
    .col-lg-pull-1 {
        right: 8.33333333%;
    }
    .col-lg-pull-0 {
        right: auto;
    }
    .col-lg-push-12 {
        left: 100%;
    }
    .col-lg-push-11 {
        left: 91.66666667%;
    }
    .col-lg-push-10 {
        left: 83.33333333%;
    }
    .col-lg-push-9 {
        left: 75%;
    }
    .col-lg-push-8 {
        left: 66.66666667%;
    }
    .col-lg-push-7 {
        left: 58.33333333%;
    }
    .col-lg-push-6 {
        left: 50%;
    }
    .col-lg-push-5 {
        left: 41.66666667%;
    }
    .col-lg-push-4 {
        left: 33.33333333%;
    }
    .col-lg-push-3 {
        left: 25%;
    }
    .col-lg-push-2 {
        left: 16.66666667%;
    }
    .col-lg-push-1 {
        left: 8.33333333%;
    }
    .col-lg-push-0 {
        left: auto;
    }
    .col-lg-offset-12 {
        margin-left: 100%;
    }
    .col-lg-offset-11 {
        margin-left: 91.66666667%;
    }
    .col-lg-offset-10 {
        margin-left: 83.33333333%;
    }
    .col-lg-offset-9 {
        margin-left: 75%;
    }
    .col-lg-offset-8 {
        margin-left: 66.66666667%;
    }
    .col-lg-offset-7 {
        margin-left: 58.33333333%;
    }
    .col-lg-offset-6 {
        margin-left: 50%;
    }
    .col-lg-offset-5 {
        margin-left: 41.66666667%;
    }
    .col-lg-offset-4 {
        margin-left: 33.33333333%;
    }
    .col-lg-offset-3 {
        margin-left: 25%;
    }
    .col-lg-offset-2 {
        margin-left: 16.66666667%;
    }
    .col-lg-offset-1 {
        margin-left: 8.33333333%;
    }
    .col-lg-offset-0 {
        margin-left: 0%;
    }
}

.clearfix:before,
.clearfix:after,
.container:before,
.container:after,
.container-fluid:before,
.container-fluid:after,
.row:before,
.row:after {
    content: " ";
    display: table;
}

.clearfix:after,
.container:after,
.container-fluid:after,
.row:after {
    clear: both;
}

.center-block {
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.pull-right {
    float: right !important;
}

.pull-left {
    float: left !important;
}

.hide {
    display: none !important;
}

.show {
    display: block !important;
}

.invisible {
    visibility: hidden;
}

.text-hide {
    font: 0/0 a;
    color: transparent;
    text-shadow: none;
    background-color: transparent;
    border: 0;
}

.hidden {
    display: none !important;
}

.affix {
    position: fixed;
}

table {
    border-collapse: collapse;
    border-spacing: 0;
}

td,
th {
    padding: 0;
}

table {
    background-color: transparent;
}

caption {
    padding-top: 8px;
    padding-bottom: 8px;
    color: #777777;
    text-align: left;
}

th {
    text-align: left;
}

.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}

.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #dddddd;
}

.table > thead > tr > th {
    vertical-align: bottom;
    border-bottom: 2px solid #dddddd;
}

.table > caption + thead > tr:first-child > th,
.table > colgroup + thead > tr:first-child > th,
.table > thead:first-child > tr:first-child > th,
.table > caption + thead > tr:first-child > td,
.table > colgroup + thead > tr:first-child > td,
.table > thead:first-child > tr:first-child > td {
    border-top: 0;
}

.table > tbody + tbody {
    border-top: 2px solid #dddddd;
}

.table .table {
    background-color: #ffffff;
}

.table-condensed > thead > tr > th,
.table-condensed > tbody > tr > th,
.table-condensed > tfoot > tr > th,
.table-condensed > thead > tr > td,
.table-condensed > tbody > tr > td,
.table-condensed > tfoot > tr > td {
    padding: 5px;
}

.table-bordered {
    border: 1px solid #dddddd;
}

.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
    border: 1px solid #dddddd;
}

.table-bordered > thead > tr > th,
.table-bordered > thead > tr > td {
    border-bottom-width: 2px;
}

.table-striped > tbody > tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.table-hover > tbody > tr:hover {
    background-color: #f5f5f5;
}

table col[class*="col-"] {
    position: static;
    float: none;
    display: table-column;
}

table td[class*="col-"],
table th[class*="col-"] {
    position: static;
    float: none;
    display: table-cell;
}

.table > thead > tr > td.active,
.table > tbody > tr > td.active,
.table > tfoot > tr > td.active,
.table > thead > tr > th.active,
.table > tbody > tr > th.active,
.table > tfoot > tr > th.active,
.table > thead > tr.active > td,
.table > tbody > tr.active > td,
.table > tfoot > tr.active > td,
.table > thead > tr.active > th,
.table > tbody > tr.active > th,
.table > tfoot > tr.active > th {
    background-color: #f5f5f5;
}

.table-hover > tbody > tr > td.active:hover,
.table-hover > tbody > tr > th.active:hover,
.table-hover > tbody > tr.active:hover > td,
.table-hover > tbody > tr:hover > .active,
.table-hover > tbody > tr.active:hover > th {
    background-color: #e8e8e8;
}

.table > thead > tr > td.success,
.table > tbody > tr > td.success,
.table > tfoot > tr > td.success,
.table > thead > tr > th.success,
.table > tbody > tr > th.success,
.table > tfoot > tr > th.success,
.table > thead > tr.success > td,
.table > tbody > tr.success > td,
.table > tfoot > tr.success > td,
.table > thead > tr.success > th,
.table > tbody > tr.success > th,
.table > tfoot > tr.success > th {
    background-color: #dff0d8;
}

.table-hover > tbody > tr > td.success:hover,
.table-hover > tbody > tr > th.success:hover,
.table-hover > tbody > tr.success:hover > td,
.table-hover > tbody > tr:hover > .success,
.table-hover > tbody > tr.success:hover > th {
    background-color: #d0e9c6;
}

.table > thead > tr > td.info,
.table > tbody > tr > td.info,
.table > tfoot > tr > td.info,
.table > thead > tr > th.info,
.table > tbody > tr > th.info,
.table > tfoot > tr > th.info,
.table > thead > tr.info > td,
.table > tbody > tr.info > td,
.table > tfoot > tr.info > td,
.table > thead > tr.info > th,
.table > tbody > tr.info > th,
.table > tfoot > tr.info > th {
    background-color: #d9edf7;
}

.table-hover > tbody > tr > td.info:hover,
.table-hover > tbody > tr > th.info:hover,
.table-hover > tbody > tr.info:hover > td,
.table-hover > tbody > tr:hover > .info,
.table-hover > tbody > tr.info:hover > th {
    background-color: #c4e3f3;
}

.table > thead > tr > td.warning,
.table > tbody > tr > td.warning,
.table > tfoot > tr > td.warning,
.table > thead > tr > th.warning,
.table > tbody > tr > th.warning,
.table > tfoot > tr > th.warning,
.table > thead > tr.warning > td,
.table > tbody > tr.warning > td,
.table > tfoot > tr.warning > td,
.table > thead > tr.warning > th,
.table > tbody > tr.warning > th,
.table > tfoot > tr.warning > th {
    background-color: #fcf8e3;
}

.table-hover > tbody > tr > td.warning:hover,
.table-hover > tbody > tr > th.warning:hover,
.table-hover > tbody > tr.warning:hover > td,
.table-hover > tbody > tr:hover > .warning,
.table-hover > tbody > tr.warning:hover > th {
    background-color: #faf2cc;
}

.table > thead > tr > td.danger,
.table > tbody > tr > td.danger,
.table > tfoot > tr > td.danger,
.table > thead > tr > th.danger,
.table > tbody > tr > th.danger,
.table > tfoot > tr > th.danger,
.table > thead > tr.danger > td,
.table > tbody > tr.danger > td,
.table > tfoot > tr.danger > td,
.table > thead > tr.danger > th,
.table > tbody > tr.danger > th,
.table > tfoot > tr.danger > th {
    background-color: #f2dede;
}

.table-hover > tbody > tr > td.danger:hover,
.table-hover > tbody > tr > th.danger:hover,
.table-hover > tbody > tr.danger:hover > td,
.table-hover > tbody > tr:hover > .danger,
.table-hover > tbody > tr.danger:hover > th {
    background-color: #ebcccc;
}

.table-responsive {
    overflow-x: auto;
    min-height: 0.01%;
}

@media screen and (max-width: 767px) {
    .table-responsive {
        width: 100%;
        margin-bottom: 15px;
        overflow-y: hidden;
        -ms-overflow-style: -ms-autohiding-scrollbar;
        border: 1px solid #dddddd;
    }
    .table-responsive > .table {
        margin-bottom: 0;
    }
    .table-responsive > .table > thead > tr > th,
    .table-responsive > .table > tbody > tr > th,
    .table-responsive > .table > tfoot > tr > th,
    .table-responsive > .table > thead > tr > td,
    .table-responsive > .table > tbody > tr > td,
    .table-responsive > .table > tfoot > tr > td {
        white-space: nowrap;
    }
    .table-responsive > .table-bordered {
        border: 0;
    }
    .table-responsive > .table-bordered > thead > tr > th:first-child,
    .table-responsive > .table-bordered > tbody > tr > th:first-child,
    .table-responsive > .table-bordered > tfoot > tr > th:first-child,
    .table-responsive > .table-bordered > thead > tr > td:first-child,
    .table-responsive > .table-bordered > tbody > tr > td:first-child,
    .table-responsive > .table-bordered > tfoot > tr > td:first-child {
        border-left: 0;
    }
    .table-responsive > .table-bordered > thead > tr > th:last-child,
    .table-responsive > .table-bordered > tbody > tr > th:last-child,
    .table-responsive > .table-bordered > tfoot > tr > th:last-child,
    .table-responsive > .table-bordered > thead > tr > td:last-child,
    .table-responsive > .table-bordered > tbody > tr > td:last-child,
    .table-responsive > .table-bordered > tfoot > tr > td:last-child {
        border-right: 0;
    }
    .table-responsive > .table-bordered > tbody > tr:last-child > th,
    .table-responsive > .table-bordered > tfoot > tr:last-child > th,
    .table-responsive > .table-bordered > tbody > tr:last-child > td,
    .table-responsive > .table-bordered > tfoot > tr:last-child > td {
        border-bottom: 0;
    }
}
</style>

<?php while (have_posts()) : the_post(); ?>

<!-- Don't edit above this line -->

<?php
$settings = get_option(UBERMENU_PREFIX.main);
$https_country_code = explode(".", $settings['ingram_json_content'])[0]; // https://xx
$country_code = explode("//", $https_country_code)[1]; // xx

$json_prices = '{
	"au": "$199 AU",
	"at": "&euro;199",
	"be": "&euro;199",
	"ca": "$199",
	"fr": "&euro;199",
	"de": "&euro;199",
	"hk": "HK$1,553.00",
	"in": "TBD",
	"it": "&euro;199",
	"mx": "$3700 MXN",
	"nl": "&euro;199",
	"nz": "$285 NZ",
	"sg": "S$289",
	"es": "&euro;199",
	"se": "1.990 (SEK)",
	"ch": "199.00 (CHF)",
	"us": "$199"
}';

$prices = json_decode($json_prices);
?>

  <div id="header">
    <div id="lights-out" class="invisible">
      <div id="video-close">X</div>
    </div>
    <div class="container">
      <div class="row relative">
        <div class="col-md-6">
          <h1 id="headline" class="h1-no-blue-line">Ingram Micro Cloud Store</h1>
          <h2 id="subhead" style="color: #fff;">Breng je business naar een hoger niveau.</h2>
          <p id="intro-text">Het Ingram Micro Cloud Store programma bied je de mogelijkheid om snel een self-branded ecommerce store te ontwikkelen zodat je cloud oplossingen kunt configureren, leveren en beheren voor je eindklanten.</p>
          <div class="col-md-5">
            <ul class="fa-ul">
	      <li><i class="fa-li fa fa-check"></i> <?php echo $prices->$country_code ?> per maand (100% korting wanneer je meer dan 10.000 licenties hebt verkocht)</li>
              <li><i class="fa-li fa fa-check"></i> Aanpasbare prijzen</li>
              <li><i class="fa-li fa fa-check"></i> Customizable Pricing</li>
              <li><i class="fa-li fa fa-check"></i> Facturactie</li>
              <li><i class="fa-li fa fa-check"></i> Promotie codes</li>
              <li><i class="fa-li fa fa-check"></i> Gepersonaliseerde services</li>
              <li><i class="fa-li fa fa-check"></i> SKU's en add-on oplossingen</li>
              <li><i class="fa-li fa fa-check"></i> Periodieke Facturatie Management</li>
            </ul>
          </div>
          <div class="col-md-5">
            <ul class="fa-ul">
	      <li><i class="fa-li fa fa-check"></i> Dynamische winkelwagen</li>
              <li><i class="fa-li fa fa-check"></i> 365 dagen per jaar, 7 dagen per week, 24 uur per dag Level 2 Support</li>
              <li><i class="fa-li fa fa-check"></i> Flexibel Controle Paneel</li>
              <li><i class="fa-li fa fa-check"></i> Behaal competitief voordeel</li>
              <li><i class="fa-li fa fa-check"></i> Cre&euml; er nieuwe verkoopkansen</li>
              <li><i class="fa-li fa fa-check"></i> Verhoog je Cloud Provider Credibility</li>
            </ul>
            <a style="color: #fff;" href="#signup" rel="modal:open"><div id="cta1">Open je Cloud store</div></a>



<!-- Modal HTML embedded directly into document -->
<div id="signup" style="display: none; background-color: transparent;">
	<div id="form-head">Ingram Micro Cloud Store</div>
	<div id="form-subhead">Open direct je eigen Cloud Store door onderstaand formulier in te vullen:</div>
	<iframe src="http://ingrammicro.marketing.dynamics.com/LeadManagement/MaintainLeadForm.aspx?SOURCEKEYOID=101276&LANGUAGECODE=nl" width="510px" height="850px"></iframe>
</div>


          </div>
        </div>
        <div class="col-md-6 centered"><img id="play" src="http://www.ingrammicrocloud.com/us/wp-content/uploads/sites/2/2015/11/icon-large-play-v2.png" alt="" /></div>
      </div>
      <div class="row">
        <div class="videoWrapper invisible">
          <iframe id="video-iframe" width="560" height="349" src="" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
  <div id="benefits" class="container">
    <div class="row centered">
      <div class="col-md-2"><span class="fa-stack fa-4x">
<i class="fa fa-circle fa-stack-2x icon-background"></i>
<i class="fa fa-shopping-cart fa-stack-1x"></i>
</span>
        <h3 class="icon-title">Self-branded B2B Store</h3>
        <p class="icon-description">Met Cloud Store kunnen partners hun business naar een hoger niveau brengen met een self-branded ecommerce online store, die direct in hun bestaande website is ge&iuml;ntegreerd.</p>

      </div>
      <div class="col-md-2"><span class="fa-stack fa-4x centered-icons">
<i class="fa fa-circle fa-stack-2x icon-background"></i>
<i class="fa fa-cc-visa fa-stack-1x"></i>
</span>
        <h3 class="icon-title">Periodieke Facturatie Management</h3>
        <p class="icon-description">Beheer periodieke facturatie opties door credit of debit card betalingen met uitgebreide nieuwe of bestaande betalingsmogelijkheden.</p>

      </div>
      <div class="col-md-2"><span class="fa-stack fa-4x centered-icons">
<i class="fa fa-circle fa-stack-2x icon-background"></i>
<i class="fa fa-bullhorn fa-stack-1x"></i>
</span>
        <h3 class="icon-title">Persoonlijke service SKU en add-on oplossingen</h3>
        <p class="icon-description">Partners kunnen een persoonlijke service SKU cre&euml;ren om hun cross-selling kansen toe te laten nemen in hun Cloud Store. Persoonlijke service SKU's zoals mail migratie kunnen gebundeld en verkocht worden met andere cloud oplossingen in abonnementvorm.</p>

      </div>
      <div class="col-md-2"><span class="fa-stack fa-4x centered-icons">
<i class="fa fa-circle fa-stack-2x icon-background"></i>
<i class="fa fa-users fa-stack-1x"></i>
</span>
        <h3 class="icon-title">Promotie codes</h3>
        <p class="icon-description">Partners kunnen promotie codes ontwikkelen en distribueren met kortingsacties die direct aan hun klantenbestand kunnen worden aangeboden.</p>

      </div>
      <div class="col-md-2"><span class="fa-stack fa-4x centered-icons">
<i class="fa fa-circle fa-stack-2x icon-background"></i>
<i class="fa fa-users fa-stack-1x"></i>
</span>
        <h3 class="icon-title">365 dagen per jaar, 7 dagen per week, 24 uur per dag Level 2 Support</h3>
        <p class="icon-description">Cloud Store bevat ongelimiteerde support aan de reseller voor alle cloud oplossingen die verkocht worden; support aan eindklanten kan toegevoegd worden tegen extra kosten.</p>

      </div>
    </div>

  </div>
  <div id="cta2">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div id="cta-text" class="centered">Open je eigen Cloud store</div>
        </div>
        <div class="col-md-6">
          <a style="color: #fff;" href="#signup" rel="modal:open"><div id="cta-button" class="pull-right">Open je Cloud store</div></a>
        </div>
      </div>
    </div>
  </div>
  <div id="snapshot" class="container">
    <h2 class="snapshot-headline centered">Hoe Cloud Store jouw business naar een hoger niveau brengt.</h2>
    <h3 class="snapshot-subhead centered">Ingram Micro Cloud Marketplace bied je vanaf heden een nieuwe Cloud Store die partners de mogelijkheid biedt om een self-branded ecommerce online store te ontwikkelen en onderhouden die in hun bestaande website is ge&iuml;ntegreerd.</h3>
    <div class="row">
      <div class="col-md-6">
        <div>
          <p class="snapshot-text"><strong>Behaal competitief voordeel</strong>
            <br />Wij doen het werk en jij oogst het resultaat. Deze snelle en eenvoudige self-branded ecommerce cloud store biedt partners de mogelijkheid een significant concurrentievoordeel te behalen. Partners kunnen cloud oplossingen van prominente cloud leveranciers verkopen, leveren en beheren, dankzij hun eigen self-branded store die ge&iuml;ntegreerd is in hun eigen website.</p>

          <p class="snapshot-text"><strong>Nieuwe verkoopkansen</strong>
            <br />Met Cloud Store hebben partners volledig toegang tot de cloud services en oplossingen die verkrijgbaar zijn op de Ingram Micro Marketplace. Ze kunnen persoonlijke service SKU's cre&euml;ren die zich op specifieke marktsegmenten richten, promoties aanbieden en cross-selling campagnes ontwikkelen.</p>

          <p class="snapshot-text"><strong>Verhoog jouw Cloud Provider Credibility</strong>
            <br />Pas je huidige website aan van een informatie portal naar een groeiende sales en marketing plaats voor je bedrijf. Eindklanten geven steeds meer de voorkeur aan online shopping ervaringen, in plaats van de traditionele sales kanalen. Cloud Store biedt partners de mogelijkheid om hun cloud oplossingen en dienstverlening direct via hun website te presenteren, verkopen en beheren, 24 uur per dag, 7 dagen in de week.</p>

          <p class="snapshot-text"><strong>Bied flexibele oplossingen aan</strong>
            <br />Cloud Store ondersteunt partners met flexibele en aanpasbare functies en opties die de behoeften van hun eindklanten vervullen. Samen met de Cloud Marketplace van Ingram Micro is het nog nooit zo eenvoudig en meer de moeite waard geweest om cloud oplossingen en dienstverlening direct van partner naar de eindklant aan te bieden</p>
        </div>
      </div>
      <div class="col-md-6">
        <img src="http://www.ingrammicrocloud.com/us/wp-content/uploads/sites/2/2015/11/browser.png">
        <a style="color: #fff;" href="#signup" rel="modal:open"><div id="cta4" style="display: inline-block;">Open je Cloud store</div></a>
	<a style="color: #fff;" href="http://www.ingrammicrocloud.com/us/wp-content/uploads/sites/2/2016/02/Cloud-Store-Data-Sheet.pdf"><div id="cta4" style="display: inline-block; margin-left: 20px;">Download de data sheet</div></a>
      </div>
    </div>
  </div>
  <div id="elevate" style="display: none;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 id="elevate-headline">Ingram Micro Cloud Elevate</h2>
          <p class="elevate-text">Free to enroll, this program is designed to help partners scale up and grow profitability with valuable business transformation tools. Cloud Elevate enables and rewards resellers who drive customers and consumption through the Ingram Micro Cloud
            Marketplace.
          </p>
          <p class="elevate-text">Sign up for the Ingram Micro Cloud Elevate program today to become a cloud reseller and receive
            <br /><span class="mcs-promo"><strong>Microsoft Cloud Solutions free for 30 days.</strong></span></p>
		<a style="color: #fff;" href="http://elevate.ingrammicrocloud.com"><div id="cta3">Get started</div></a>
        </div>
        <div class="col-md-3 col-md-offset-3">
          <img src="http://dev.ingrammicrocloud.com/us/wp-content/uploads/sites/2/2015/11/Cloud-Elevate-no-tag_White.png" class="pull-right" width="300px">
        </div>
      </div>
    </div>
  </div>


<!-- Don't edit below this line -->

<?php endwhile; ?>

<?php get_footer(); ?>