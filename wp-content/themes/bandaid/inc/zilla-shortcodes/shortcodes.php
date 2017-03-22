<?php


/*-----------------------------------------------------------------------------------*/
/*	Counter
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_counter')) {
	function exquisite_counter( $atts, $content = null ) {
	extract(shortcode_atts(array("number" => '', "color" => '', "description" => '', "icon" => ''), $atts));   
  
  
    return '<div class="counter-wrapper" style="color: ' .$color. '"><i class="fa ' .$icon. ' fa-3x"></i><div class="counter-number" style="color: ' .$color. ' !important" data-number="'.$number.'">
    		<h3>0</h3></div>
			<div class="counter-description"><h4 style="color: ' .$color. '">'.$description.'</h4></div>
			</div>';
	}
	add_shortcode('exquisite_counter', 'exquisite_counter');
}





/*-----------------------------------------------------------------------------------*/
/*	Counter
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_countdown')) {
	function exquisite_countdown( $atts, $content = null ) {
	extract(shortcode_atts(array("year" => '', "month" => '', "day" => ''), $atts));   
  
  
  		
    return '<div class="countdown" data-year="'.$year.'" data-month="'.$month.'" data-day="'.$day.'"> </div>
    <div class="clearfix"></div>';
		}
	
	add_shortcode('exquisite_countdown', 'exquisite_countdown');
}



/*-----------------------------------------------------------------------------------*/
/*	Blockquote
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_quote')) {
	function exquisite_quote( $atts, $content = null ) {
	extract(shortcode_atts(array("quote" => '', "source" => ''), $atts));   
  
	return '<blockquote class="inner-quote">'.$quote.'<cite>'.$source.'</cite></blockquote>';

	}
	add_shortcode('exquisite_quote', 'exquisite_quote');
}


/*-----------------------------------------------------------------------------------*/
/*	Highlight
/*-----------------------------------------------------------------------------------*/

if (!function_exists('accent')) {
	function accent( $atts, $content = null ) {
	extract(shortcode_atts(array("text" => ''), $atts));   
  
	return '<span class="colored">'.$text.'</span>';

	}
	add_shortcode('accent', 'accent');
}


/*-----------------------------------------------------------------------------------*/
/*	Accent
/*-----------------------------------------------------------------------------------*/

if (!function_exists('highlight')) {
	function highlight( $atts, $content = null ) {
	extract(shortcode_atts(array("text" => ''), $atts));   
  
	return '<span class="highlight">'.$text.'</span>';

	}
	add_shortcode('highlight', 'highlight');
}

/*-----------------------------------------------------------------------------------*/
/*	Counter
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_counter')) {
	function exquisite_counter( $atts, $content = null ) {
	extract(shortcode_atts(array("number" => '', "description" => ''), $atts));   
  
  
    return '<div class="counter-wrapper"><div class="counter-border"><div class="counter-number" data-number="'.$number.'"><h3>
			0</h3></div></div><div class="counter-description"><h5>'.$description.'</h5></div></div>';
	}
	add_shortcode('exquisite_counter', 'exquisite_counter');
}




/*-----------------------------------------------------------------------------------*/
/*	Fontawesome Big Icon
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_fontawesome_big')) {
	function exquisite_fontawesome_big( $atts, $content = null ) {
	extract(shortcode_atts(array("icon" => ''), $atts));   
 
	return '<div class="iconbox"><i class="fa ' .$icon. ' fa-3x"></i></div>';
	}
	add_shortcode('exquisite_fontawesome_big', 'exquisite_fontawesome_big');
}


/*-----------------------------------------------------------------------------------*/
/*	Fontawesome Small Icon
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_fontawesome_small')) {
	function exquisite_fontawesome_small( $atts, $content = null ) {
	extract(shortcode_atts(array("icon" => ''), $atts));   
 
	return '<div class="iconbox2"><i class="fa ' .$icon. '"></i></div>';
	}
	add_shortcode('exquisite_fontawesome_small', 'exquisite_fontawesome_small');
}

/*-----------------------------------------------------------------------------------*/
/*	Recent Posts
/*-----------------------------------------------------------------------------------*/

if (!function_exists('recent_posts')) {
	function recent_posts( $atts, $content = null ) {
 
	ob_start();  
    get_template_part('post-formats/recent', 'posts');  
    $ret = ob_get_contents();  
    ob_end_clean();  
    return $ret;    
	}
	add_shortcode('recent_posts', 'recent_posts');
}


/*-----------------------------------------------------------------------------------*/
/*	Recent Projects
/*-----------------------------------------------------------------------------------*/

if (!function_exists('recent_projects')) {
	function recent_projects( $atts, $content = null ) {
 
	ob_start();  
    get_template_part('post-formats/recent', 'projects');  
    $ret = ob_get_contents();  
    ob_end_clean();  
    return $ret;    
	}
	add_shortcode('recent_projects', 'recent_projects');
}


/*-----------------------------------------------------------------------------------*/
/*	Service
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_service')) {
	function exquisite_service( $atts, $content = null ) {
	extract(shortcode_atts(array("icon" => '', "name" => '', "description" => ''), $atts));   
 
	
	return '<div class="service-box"><i class="fa ' .$icon. ' fa fa-2x"></i><div class="service-description">
			<h5>' .$name. '</h5><div class="inner-desc">' .$description. '</div></div></div>';
	}
	add_shortcode('exquisite_service', 'exquisite_service');
}


/*-----------------------------------------------------------------------------------*/
/*	Colored Section
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_colored')) {
	function exquisite_colored( $atts, $content = null ) {
	extract(shortcode_atts(array("bg_color" => ''), $atts));   
  
  $content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
  return'</div></div></div></div>
  <div class="colored-section" style="background-color: '.$bg_color.'"><div class="container"><div class="sixteen columns"><div class="content">
  '. $content .'</div></div></div></div>
  <div class="page-section-continued"><div class="container"><div class="sixteen columns"><div class="content">';

	}
	add_shortcode('exquisite_colored', 'exquisite_colored');
}



/*-----------------------------------------------------------------------------------*/
/*	Background Image Section
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_bgimage')) {
	function exquisite_bgimage( $atts, $content = null ) {
	extract(shortcode_atts(array("bg_image" => ''), $atts));   
  
  $content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
global $smof_data;

$darktheme = $smof_data['dark_theme'];
if ($darktheme == 1) {
  return'</div></div></div></div>
  <div class="background-image-section">
  <div class="image-background" style="background-image: url('.$bg_image.')">
  <div class="container"><div class="sixteen columns"><div class="content">'. $content .'</div></div></div></div></div>
  <div class="page-section-continued"><div class="container"><div class="sixteen columns"><div class="content">';
} else {
	 return'</div></div></div></div>
  <div class="background-image-section">
  <div class="image-background" style="background-image: url('.$bg_image.')">
  <div class="container"><div class="sixteen columns"><div class="content">'. $content .'</div></div></div></div></div>
  <div class="page-section-continued"><div class="container"><div class="sixteen columns"><div class="content">';
}
	}
	add_shortcode('exquisite_bgimage', 'exquisite_bgimage');
}


/*-----------------------------------------------------------------------------------*/
/*	AGENDA
/*-----------------------------------------------------------------------------------*/


if (!function_exists('agenda_pictures')) {
	function agenda_pictures( $atts, $content = null ) {

			  $content = do_shortcode( shortcode_unautop( $content ) );
			if ( '</p>' == substr( $content, 0, 4 )
			and '<p>' == substr( $content, strlen( $content ) - 3 ) )
			$content = substr( $content, 4, strlen( $content ) - 7 );
			
return '<div class="agenda">'.$content.'</div>';

	}
	add_shortcode('agenda_pictures', 'agenda_pictures');
}



if (!function_exists('agenda_icons')) {
	function agenda_icons( $atts, $content = null ) {

			  $content = do_shortcode( shortcode_unautop( $content ) );
			if ( '</p>' == substr( $content, 0, 4 )
			and '<p>' == substr( $content, strlen( $content ) - 3 ) )
			$content = substr( $content, 4, strlen( $content ) - 7 );
			
return '<div class="agenda">'.$content.'</div>';

	}
	add_shortcode('agenda_icons', 'agenda_icons');
}

/*-----------------------------------------------------------------------------------*/
/*	Agenda Item
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Agenda Item
/*-----------------------------------------------------------------------------------*/


if (!function_exists('agenda_item_icon')) {
	function agenda_item_icon( $atts, $content = null ) {
	
	extract(shortcode_atts(array("align" => '', "icon" => ''), $atts));   
 
 if ($align == 'left') {
 		return'<div class="sixteen columns alpha omega agenda-left icons">
			<div class="seven columns alpha agenda-left-content">
			' .$content. '
			</div>
			<div class="two columns agenda-icon"><div class="icon"><i class="fa '.$icon.'"></i></div></div>
			<div class="seven columns omega"><div class="empty"></div></div>
			</div>';
	
 } else if ($align == 'right') {
 		return'<div class="sixteen columns alpha omega agenda-right icons">
 			<div class="seven columns alpha"><div class="empty"></div></div>
 			<div class="two columns agenda-icon"><div class="icon"><i class="fa '.$icon.'"></i></div></div>
			<div class="seven columns omega agenda-right-content">
			' .$content. '
			</div>
			
			</div>';
 }
	}
			

	add_shortcode('agenda_item_icon', 'agenda_item_icon');
}





if (!function_exists('agenda_item_picture')) {
	function agenda_item_picture( $atts, $content = null ) {
	
	extract(shortcode_atts(array("align" => '', "url" => ''), $atts));   
 
 if ($align == 'left') {
 		return'<div class="sixteen columns alpha omega agenda-left">
			<div class="six columns alpha agenda-left-content">
			' .$content. '
			</div>
			<div class="four columns agenda-icon"><div class="image"><img src="' .$url. '" alt="."></div></div>
			<div class="six columns omega"><div class="empty"></div></div>
			</div>';
	
 } else if ($align == 'right') {
 		return'<div class="sixteen columns alpha omega agenda-right">
 			<div class="six columns alpha"><div class="empty"></div></div>
 			<div class="four columns agenda-icon"><div class="image"><img src="' .$url. '" alt="."></div></div>
			<div class="six columns omega agenda-right-content">
			' .$content. '
			</div>
			
			</div>';
 }
	}
			

	add_shortcode('agenda_item_picture', 'agenda_item_picture');
}




/*-----------------------------------------------------------------------------------*/
/*	Bullet Points
/*-----------------------------------------------------------------------------------*/


if (!function_exists('exquisite_bullet')) {
	function exquisite_bullet( $atts, $content = null ) {

			  $content = do_shortcode( shortcode_unautop( $content ) );
			if ( '</p>' == substr( $content, 0, 4 )
			and '<p>' == substr( $content, strlen( $content ) - 3 ) )
			$content = substr( $content, 4, strlen( $content ) - 7 );
			
return '<ul class="bullet-points">'.$content.'</ul>';

	}
	add_shortcode('exquisite_bullet', 'exquisite_bullet');
}



/*-----------------------------------------------------------------------------------*/
/*	Bullet Point
/*-----------------------------------------------------------------------------------*/


if (!function_exists('exquisite_point')) {
	function exquisite_point( $atts, $content = null ) {
		extract(shortcode_atts(array( "point" => ''), $atts));
			
			
return '<li>'.$point.'</li>';

	}
	add_shortcode('exquisite_point', 'exquisite_point');
}


/*-----------------------------------------------------------------------------------*/
/*	Testimonial Carousel
/*-----------------------------------------------------------------------------------*/


if (!function_exists('exquisite_testimonial_carousel')) {
	function exquisite_testimonial_carousel( $atts, $content = null ) {

			  $content = do_shortcode( shortcode_unautop( $content ) );
			if ( '</p>' == substr( $content, 0, 4 )
			and '<p>' == substr( $content, strlen( $content ) - 3 ) )
			$content = substr( $content, 4, strlen( $content ) - 7 );
			
return '<div class="testimonialcarousel">'.$content.'</div>';

	}
	add_shortcode('exquisite_testimonial_carousel', 'exquisite_testimonial_carousel');
}



/*-----------------------------------------------------------------------------------*/
/*	Single Testimonial
/*-----------------------------------------------------------------------------------*/


if (!function_exists('exquisite_single_testimonial')) {
	function exquisite_single_testimonial( $atts, $content = null ) {
  		extract(shortcode_atts(array( "name" => '', "company" => '', "url" => '', "testimonial" => '', "color" => '', "stars" => ''), $atts));
		
		if ($stars == '1') { $rating = '<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-empty"></i>
									<i class="fa fa-star star-empty"></i>
									<i class="fa fa-star star-empty"></i>
									<i class="fa fa-star star-empty"></i>'; }
		elseif ($stars == '2') { $rating = '<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-empty"></i>
									<i class="fa fa-star star-empty"></i>
									<i class="fa fa-star star-empty"></i>'; }
		elseif ($stars == '3') { $rating = '<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-empty"></i>
									<i class="fa fa-star star-empty"></i>'; }
		elseif ($stars == '4') { $rating = '<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-empty"></i>'; }
		elseif ($stars == '5') { $rating = '<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>'; }
		else { $rating = '<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>
									<i class="fa fa-star star-colored"></i>'; }
return '<div class="testimonial">
		<div class="testimonial-icon"><i class="fa fa-quote-right"></i></div>
		<div class="testimonial-quote"><h4 style="color: '.$color.' !important">'.$testimonial.'</h4></div>
		<div class="testimonial-name">'.$name.'</div>
		<div class="testimonial-company">'.$company.'</div>
		<div class="stars">'.$rating.'</div>
		</div>';

	}
	add_shortcode('exquisite_single_testimonial', 'exquisite_single_testimonial');
}



/*-----------------------------------------------------------------------------------*/
/*	Team Members 
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_team_member')) {
	function exquisite_team_member( $atts, $content = null ) {
  		extract(shortcode_atts(array( "first_name" => '', "last_name" => '', "url" => '', "description" => '', "function" => ''), $atts));
  		
			
return '<div class="sixteen columns alpha omega teamwrapper">
			<div class="two columns alpha"><div class="empty"></div></div>
			<div class="four columns">
			<img src="'.$url.'" alt="'.$first_name.'" class="team-profile-pic">
			</div>
			<div class="eight columns">
				<h1 class="teamheadline">'.$first_name.' <strong>'.$last_name.'</strong></h1>
				<span class="function">'.$function.'</span>
				<div class="team-content">'.$description.'</div>
				<div class="socials">'.do_shortcode($content).'</div>
			</div>
			<div class="two columns omega"><div class="empty"></div></div>
		</div>';

	}
	add_shortcode('exquisite_team_member', 'exquisite_team_member');
}



/*-----------------------------------------------------------------------------------*/
/*	Highlight
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_highlight')) {
	function exquisite_highlight( $atts, $content = null ) {
  
  	$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return '<span class="highlight">'. $content .'</span>';
	}
	add_shortcode('exquisite_highlight', 'exquisite_highlight');
}



/*-----------------------------------------------------------------------------------*/
/*	Slider
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_slider')) {
	function exquisite_slider( $atts, $content = null ) {
  
  $content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return '<div class="flexslider"><ul class="slides">'.$content.'</ul></div>';
	}
	add_shortcode('exquisite_slider', 'exquisite_slider');
}


/*-----------------------------------------------------------------------------------*/
/*	Slide
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_slide')) {
	function exquisite_slide( $atts, $content = null ) {
		extract(shortcode_atts(array( "unique_id" => '', "slide_image" => '', "target_image" => '',"alt" => '' ), $atts));
  
  	if ($target_image) {$target = $target_image;} else {$target = $slide_image;}
	return '<li><a href="'. $target . '" data-rel="prettyPhoto[ex-'.$unique_id.']" title="'.$alt.'"><img src="'.$slide_image.'" alt="'.$alt.'"></a></li>';
	}
	add_shortcode('exquisite_slide', 'exquisite_slide');
}


/*-----------------------------------------------------------------------------------*/
/*	Lightbox
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_lightbox')) {
	function exquisite_lightbox( $atts, $content = null ) {
		extract(shortcode_atts(array( "thumb_url" => '', "image_url" => '', "alt" => '' ), $atts));
  
  	if ($image_url) {$target = $image_url;} else {$target = $thumb_url;}
	return '<a href="'. $target . '" data-rel="prettyPhoto" title="'.$alt.'"><img src="'.$thumb_url.'" alt="'.$alt.'" class="fit-image"></a>';
//	return '<img src="'.$thumb.'" alt="'.$alt.'">';
	}
	add_shortcode('exquisite_lightbox', 'exquisite_lightbox');
}




/*-----------------------------------------------------------------------------------*/
/*	Video
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_video')) {
	function exquisite_video( $atts, $content = null ) {
		extract(shortcode_atts(array( "type" => '', "video_id" => ''), $atts));
		
		if ($type == 'vimeo') {
			$output = '<div class="video"><iframe src="http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="960" height="540" style="border:none;" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
		} else if ($type == 'youtube'){
			$output = '<div class="video"><iframe width="960" height="540"  src="http://www.youtube.com/embed/'.$video_id.'?rel=0&amp;showinfo=0&modestbranding=1&amp;hd=1&amp;autohide=1&amp;color=white" style="border:none;" allowfullscreen></iframe></div>';
			
		}
  
	return $output;
	}
	add_shortcode('exquisite_video', 'exquisite_video');
}


/*-----------------------------------------------------------------------------------*/
/*	Carousel
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_carousel')) {
	function exquisite_carousel( $atts, $content = null ) {
  
  
  
  $content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
	$content = substr( $content, 4, strlen( $content ) - 7 );


	return '<div class="carousel">'.$content.'</div>';
	}
	add_shortcode('exquisite_carousel', 'exquisite_carousel');
}


if (!function_exists('item_content')) {
	function item_content( $atts, $content = null ) {
		
	$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );	
		return '<div class="items">' .$content. '</div>';
	}
	add_shortcode('item_content', 'item_content');
}


/*-----------------------------------------------------------------------------------*/
/*	Carousel
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_carousel_single')) {
	function exquisite_carousel_single( $atts, $content = null ) {
  
  
  
  $content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
	$content = substr( $content, 4, strlen( $content ) - 7 );


	return '<div class="carousel-single">'.$content.'</div>';
	}
	add_shortcode('exquisite_carousel_single', 'exquisite_carousel_single');
}


if (!function_exists('item_content_single')) {
	function item_content_single( $atts, $content = null ) {
		
	$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );	
		return '<div class="items">' .$content. '</div>';
	}
	add_shortcode('item_content_single', 'item_content_single');
}

/*-----------------------------------------------------------------------------------*/
/*	Social Shortcodes Small
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_social_small')) {
	function exquisite_social_small( $atts, $content = null ) {
  
  
  
  $content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
	$content = substr( $content, 4, strlen( $content ) - 7 );


	return '<div class="social-small">'.$content.'</div>';
	}
	add_shortcode('exquisite_social_small', 'exquisite_social_small');
}


/*-----------------------------------------------------------------------------------*/
/*	Social Shortcodes Big
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_social_big')) {
	function exquisite_social_big( $atts, $content = null ) {
  
    $content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
	$content = substr( $content, 4, strlen( $content ) - 7 );
	
	return '<div class="social-big">'.$content.'</div>';
	}
	add_shortcode('exquisite_social_big', 'exquisite_social_big');
}




//=========================
if (!function_exists('fa_facebook')) {
	function fa_facebook( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-facebook"></i></a>';
		return $html;
	}
	add_shortcode('fa_facebook', 'fa_facebook');
}


if (!function_exists('fa_flickr')) {
	function fa_flickr( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-flickr"></i></a>';
		return $html;
	}
	add_shortcode('fa_flickr', 'fa_flickr');
}


if (!function_exists('fa_google_plus')) {
	function fa_google_plus( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-google-plus"></i></a>';
		return $html;
	}
	add_shortcode('fa_google_plus', 'fa_google_plus');
}


if (!function_exists('fa_linkedin')) {
	function fa_linkedin( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-linkedin"></i></a>';
		return $html;
	}
	add_shortcode('fa_linkedin', 'fa_linkedin');
}


if (!function_exists('fa_pinterest')) {
	function fa_pinterest( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-pinterest"></i></a>';
		return $html;
	}
	add_shortcode('fa_pinterest', 'fa_pinterest');
}


if (!function_exists('fa_skype')) {
	function fa_skype( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-skype"></i></a>';
		return $html;
	}
	add_shortcode('fa_skype', 'fa_skype');
}


if (!function_exists('fa_github')) {
	function fa_github( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-github"></i></a>';
		return $html;
	}
	add_shortcode('fa_github', 'fa_github');
}


if (!function_exists('fa_tumblr')) {
	function fa_tumblr( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-tumblr"></i></a>';
		return $html;
	}
	add_shortcode('fa_tumblr', 'fa_tumblr');
}


if (!function_exists('fa_twitter')) {
	function fa_twitter( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-twitter"></i></a>';
		return $html;
	}
	add_shortcode('fa_twitter', 'fa_twitter');
}


if (!function_exists('fa_vimeo_square')) {
	function fa_vimeo_square( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-vimeo-square"></i></a>';
		return $html;
	}
	add_shortcode('fa_vimeo_square', 'fa_vimeo_square');
}


if (!function_exists('fa_youtube')) {
	function fa_youtube( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-youtube"></i></a>';
		return $html;
	}
	add_shortcode('fa_youtube', 'fa_youtube');
}


if (!function_exists('fa_instagram')) {
	function fa_instagram( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-instagram"></i></a>';
		return $html;
	}
	add_shortcode('fa_instagram', 'fa_instagram');
}


if (!function_exists('fa_dribbble')) {
	function fa_dribbble( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-dribbble"></i></a>';
		return $html;
	}
	add_shortcode('fa_dribbble', 'fa_dribbble');
}


if (!function_exists('fa_rss')) {
	function fa_rss( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-rss"></i></a>';
		return $html;
	}
	add_shortcode('fa_rss', 'fa_rss');
}


if (!function_exists('fa_envelope')) {
	function fa_envelope( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-envelope"></i></a>';
		return $html;
	}
	add_shortcode('fa_envelope', 'fa_envelope');
}


if (!function_exists('fa_foursquare')) {
	function fa_foursquare( $atts, $content = null ) {
		extract(shortcode_atts(array( "url" => '#'), $atts));
		
		$html = '<a href="'.$url.'"><i class="fa fa-foursquare"></i></a>';
		return $html;
	}
	add_shortcode('fa_foursquare', 'fa_foursquare');
}




/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/


function one_thrid_column( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"one-third column\">".$content."</div>";

}
add_shortcode('one_third','one_thrid_column');

function one_thrid_first( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"container\"><div class=\"one-third column alpha\">".$content."</div>";

}
add_shortcode('one_third_first','one_thrid_first');

function one_thrid_last( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );

return "<div class=\"one-third column omega\">".$content."</div></div>";

}
add_shortcode('one_third_last','one_thrid_last');


//2/3

function two_third_column( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"two-thirds column\">".$content."</div>";

}
add_shortcode('two_thirds','two_third_column');

function two_third_first( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"container\"><div class=\"two-thirds column alpha\">".$content."</div>";

}
add_shortcode('two_thirds_first','two_third_first');

function two_third_last( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"two-thirds column omega\">".$content."</div></div>";

}
add_shortcode('two_thirds_last','two_third_last');

//1/2

function one_half_column( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"eight columns\">".$content."</div>";

}
add_shortcode('one_half','one_half_column');

function one_half_first( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"container\"><div class=\"eight columns alpha\">".$content."</div>";

}
add_shortcode('one_half_first','one_half_first');

function one_half_last( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"eight columns omega\">".$content."</div></div>";

}
add_shortcode('one_half_last','one_half_last');

//1/4

function one_fourth_column( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"four columns\">".$content."</div>";

}
add_shortcode('one_fourth','one_fourth_column');

function one_fourth_first( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"container\"><div class=\"four columns alpha\">".$content."</div>";

}
add_shortcode('one_fourth_first','one_fourth_first');

function one_fourth_last( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"four columns omega\">".$content."</div></div>";

}
add_shortcode('one_fourth_last','one_fourth_last');

function three_fourth_column( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"twelve columns\">".$content."</div>";

}
add_shortcode('three_fourth','three_fourth_column');

function three_fourth_first( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"container\"><div class=\"twelve columns alpha\">".$content."</div>";

}
add_shortcode('three_fourth_first','three_fourth_first');

function three_fourth_last( $atts, $content = null ) {

$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	return "<div class=\"twelve columns omega\">".$content."</div></div>";

}
add_shortcode('three_fourth_last','three_fourth_last');



/*-----------------------------------------------------------------------------------*/
/*	Skillset
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_skill')) {
function exquisite_skill($atts, $content = null) {
	extract(shortcode_atts(array( "name" => '', "percentage" => ''), $atts));   

	$html = '<div class="exquisite-skill"><div class="exquisite-skilltitle">'.$name.'</div>
<div class="exquisite-skillbar">
<div class="exquisite-outer-bar">
<div class="exquisite-bar" data-width="'.$percentage.'">
<div class="exquisite-tooltip">
<span class="tooltip">'.$percentage.'</span></div></div>
</div></div></div><div class="clear"></div>';
	
	
	return $html;
	}

add_shortcode("exquisite_skill", "exquisite_skill");

}


/*-----------------------------------------------------------------------------------*/
/*	Circle skillset
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite_circle_skill')) {
function exquisite_circle_skill($atts, $content = null) {
	extract(shortcode_atts(array( "name" => '', "percentage" => '', "description" => '', "bg_color" => ''), $atts));   


$html = '<div class="skill-chart">
<div class="chart" data-percent="'.$percentage.'" data-color="#ffffff" style="background: '.$bg_color.'"><h3 class="percent">'.$percentage.'</h3></div>
<div class="chart-description">
<h5>'.$name.'</h5>
'.$description.'
</div>
</div>';
	
	return $html;
	}

add_shortcode("exquisite_circle_skill", "exquisite_circle_skill");

}

/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

if (!function_exists('zilla_button')) {
	function zilla_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url' => '',
			'target' => '_self',
			'color' => '#000000',
			'size' => 'small',
			'type' => 'round'
	    ), $atts));
		
		
		    $content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
	$content = substr( $content, 4, strlen( $content ) - 7 );
	   return '<a target="'.$target.'" class="zilla-button '.$size.' '. $type .'" href="'.$url.'" style="background-color: '. $color .'">' .$content. '</a>';
	}
	add_shortcode('zilla_button', 'zilla_button');
}


/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/

if (!function_exists('zilla_alert')) {
	function zilla_alert( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'border'   => '#f2c3bf',
			'background'   => '#ffe6e3'
	    ), $atts));
		$content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
$content = substr( $content, 4, strlen( $content ) - 7 );
	   return '<div class="zilla-alert" style="color: '.$border.'; background-color: '.$background.'; border: 1px solid '.$border.'">' .$content. '</div>';
	}
	add_shortcode('zilla_alert', 'zilla_alert');
}


/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('zilla_toggle')) {
	function zilla_toggle( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
			'state'		 => 'open'
	    ), $atts));
	
	    $content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
	$content = substr( $content, 4, strlen( $content ) - 7 );
		return "<div data-id='".$state."' class=\"zilla-toggle\"><span class=\"zilla-toggle-title\">". $title ."</span><div class=\"zilla-toggle-inner\">".$content."</div></div>";
	}
	add_shortcode('zilla_toggle', 'zilla_toggle');
}


/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes 2
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite1_toggle')) {
	function exquisite1_toggle( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
			'state'		 => 'open'
	    ), $atts));
	
	    $content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
	$content = substr( $content, 4, strlen( $content ) - 7 );
		return "<div data-id='".$state."' class=\"exquisite1-toggle\"><span class=\"exquisite1-toggle-title\">". $title ."</span><div class=\"exquisite1-toggle-inner\">".$content."</div></div>";
	}
	add_shortcode('exquisite1_toggle', 'exquisite1_toggle');
}


/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes 3
/*-----------------------------------------------------------------------------------*/

if (!function_exists('exquisite2_toggle')) {
	function exquisite2_toggle( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
			'state'		 => 'open'
	    ), $atts));
	
	    $content = do_shortcode( shortcode_unautop( $content ) );
if ( '</p>' == substr( $content, 0, 4 )
and '<p>' == substr( $content, strlen( $content ) - 3 ) )
	$content = substr( $content, 4, strlen( $content ) - 7 );
		return "<div data-id='".$state."' class=\"exquisite2-toggle\"><span class=\"exquisite2-toggle-title\">". $title ."</span><div class=\"exquisite2-toggle-inner\">".$content."</div></div>";
	}
	add_shortcode('exquisite2_toggle', 'exquisite2_toggle');
}


/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('zilla_tabs')) {
	function zilla_tabs( $atts, $content = null ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		
		STATIC $i = 0;
		$i++;

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		
		if( count($tab_titles) ){
		    $output .= '<div id="zilla-tabs-'. $i .'" class="zilla-tabs"><div class="zilla-tab-inner">';
			$output .= '<ul class="zilla-nav zilla-clearfix">';
			
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#zilla-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode( 'zilla_tabs', 'zilla_tabs' );
}

if (!function_exists('zilla_tab')) {
	function zilla_tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div id="zilla-tab-'. sanitize_title( $title ) .'" class="zilla-tab">'. do_shortcode( $content ) .'<div style="clear:both;"></div></div>';
	}
	add_shortcode( 'zilla_tab', 'zilla_tab' );
}


//================


if (!function_exists('exquisite1_tabs')) {
	function exquisite1_tabs( $atts, $content = null ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		
		STATIC $i = 0;
		$i++;

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		
		if( count($tab_titles) ){
		    $output .= '<div id="exquisite1-tabs-'. $i .'" class="exquisite1-tabs"><div class="exquisite1-tab-inner">';
			$output .= '<ul class="exquisite1-nav exquisite1-clearfix">';
			
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#exquisite1-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode( 'exquisite1_tabs', 'exquisite1_tabs' );
}

if (!function_exists('exquisite1_tab')) {
	function exquisite1_tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div id="exquisite1-tab-'. sanitize_title( $title ) .'" class="exquisite1-tab">'. do_shortcode( $content ) .'<div style="clear:both;"></div></div>';
	}
	add_shortcode( 'exquisite1_tab', 'exquisite1_tab' );
}



//================


if (!function_exists('exquisite2_tabs')) {
	function exquisite2_tabs( $atts, $content = null ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		
		STATIC $i = 0;
		$i++;

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		
		if( count($tab_titles) ){
		    $output .= '<div id="exquisite2-tabs-'. $i .'" class="exquisite2-tabs"><div class="exquisite2-tab-inner">';
			$output .= '<ul class="exquisite2-nav exquisite2-clearfix">';
			
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#exquisite2-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode( 'exquisite2_tabs', 'exquisite2_tabs' );
}

if (!function_exists('exquisite2_tab')) {
	function exquisite2_tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div id="exquisite2-tab-'. sanitize_title( $title ) .'" class="exquisite2-tab">'. do_shortcode( $content ) .'<div style="clear:both;"></div></div>';
	}
	add_shortcode( 'exquisite2_tab', 'exquisite2_tab' );
}

?>