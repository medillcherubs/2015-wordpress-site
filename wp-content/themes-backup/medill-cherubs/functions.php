<?php


// add_filter('media_upload_default_tab', 'wpse74422_switch_tab');
// function wpse74422_switch_tab($tab)
// {
//     return 'library';
// }

add_filter( 'request', 'my_request_filter' );
function my_request_filter( $query_vars ) {
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}

function theme_setup() {



    // remove_theme_support( 'post-formats' );

  // This theme supports a variety of post formats.
    add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );
  // add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio' ) );

  // This theme uses a custom image size for featured images, displayed on "standard" posts.
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}

add_action( 'after_setup_theme', 'theme_setup' );

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'small', 275, 9999 );
    add_image_size( 'wide', 800, 550 );
    add_image_size( 'full', 1000, 9999 );
    add_image_size( 'rectangle-thumbnail', 150, 100, true );
    add_image_size( 'section-featured', 700, 270, true );
    add_image_size( 'homepage-thumbnail', 300, 200, true );
}

function my_insert_custom_image_sizes( $sizes ) {
  global $_wp_additional_image_sizes;
  // print_r($_wp_additional_image_sizes);
  if ( empty($_wp_additional_image_sizes) )
    return $sizes;

  foreach ( $_wp_additional_image_sizes as $id => $data ) {
    if ( !isset($sizes[$id]) )
      if ($id == "full" || $id == "wide" || $id == "small")
      $sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
  }

  return $sizes;
}
add_filter( 'image_size_names_choose', 'my_insert_custom_image_sizes' );



/*
    ADD CUSTOM CSS FOR DASHBOARD LINKS
    Makes them more prominent

    Tom Giratikanon
    July 26, 2013

 */
function custom_colors() {
   echo '<style type="text/css">
           a.rsswidget {
            font-size: 14px;
            font-weight: bold;
            font-family: Arial, sans-serif;
           }
           .rss-widget ul li {
            line-height: 1.2em;
            margin-bottom: 6px;
           }
         </style>';
}

add_action('admin_head', 'custom_colors');




/**
 * Cherub custom sidebar shortcode
 *
 * Allows a plugin to replace the content that would otherwise be returned. The
 * filter is 'img_caption_shortcode' and passes an empty string, the attr
 * parameter and the content parameter values.
 *
 * The supported attributes for the shortcode are 'id', 'align', 'width', and
 * 'caption'.
 *
 * @since 2.6.0
 *
 * @param array $attr Attributes attributed to the shortcode.
 * @param string $content Optional. Shortcode content.
 * @return string
 */
function cherub_sidebar_shortcode($attr, $content = null) {

    // New-style shortcode with the caption inside the shortcode with the link and image tags.
    if ( ! isset( $attr['caption'] ) ) {
        if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
            $content = $matches[1];
            $attr['caption'] = trim( $matches[2] );
        }
    }

    // Allow plugins/themes to override the default caption template.
    $output = apply_filters('cherub_sidebar_shortcode', '', $attr, $content);
    if ( $output != '' )
        return $output;

    extract(shortcode_atts(array(
        'id' => '',
        'align' => 'alignright',
        'size' => 'medium',
        'caption' => ''
    ), $attr));

    // if ( 1 > (int) $width || empty($caption) )
        // return $content;

    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

    return '<div ' . $id . 'class="wp-caption cherub-sidebar ' . esc_attr($align) . ' ' . esc_attr($size) . '">'
    . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

add_shortcode('aside', 'cherub_sidebar_shortcode');
add_shortcode('sidebar', 'cherub_sidebar_shortcode');





/**
 * The Caption shortcode.
 *
 * Allows a plugin to replace the content that would otherwise be returned. The
 * filter is 'img_caption_shortcode' and passes an empty string, the attr
 * parameter and the content parameter values.
 *
 * The supported attributes for the shortcode are 'id', 'align', 'width', and
 * 'caption'.
 *
 * @since 2.6.0
 *
 * @param array $attr Attributes attributed to the shortcode.
 * @param string $content Optional. Shortcode content.
 * @return string
 */
function cherub_img_caption_shortcode($attr, $content = null) {

    // New-style shortcode with the caption inside the shortcode with the link and image tags.
    if ( ! isset( $attr['caption'] ) ) {
        if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
            $content = $matches[1];
            $attr['caption'] = trim( $matches[2] );
        }
    }

    // Allow plugins/themes to override the default caption template.
    $output = apply_filters('img_caption_shortcode', '', $attr, $content);
    if ( $output != '' )
        return $output;

    extract(shortcode_atts(array(
        'id'    => '',
        'align' => 'alignnone',
        'size' => '',
        'width' => '',
        'caption' => ''
    ), $attr));

    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

    return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . ' ' . esc_attr($size) .  '">'
    . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

add_shortcode('wp_caption', 'cherub_img_caption_shortcode');
add_shortcode('caption', 'cherub_img_caption_shortcode');




/**
 * The Caption shortcode.
 *
 * Allows a plugin to replace the content that would otherwise be returned. The
 * filter is 'img_caption_shortcode' and passes an empty string, the attr
 * parameter and the content parameter values.
 *
 * The supported attributes for the shortcode are 'id', 'align', 'width', and
 * 'caption'.
 *
 * @since 2.6.0
 *
 * @param array $attr Attributes attributed to the shortcode.
 * @param string $content Optional. Shortcode content.
 * @return string
 */
function cherub_embed_post_shortcode($attr, $content = null) {

    extract(shortcode_atts(array(
        'id'    => ''
    ), $attr));

    $post = get_post($id);

    return $post->post_content;

}

add_shortcode('post', 'cherub_embed_post_shortcode');

global $audio_count;
$audio_count = 0;

/**
 * The Caption shortcode.
 *
 * Allows a plugin to replace the content that would otherwise be returned. The
 * filter is 'img_caption_shortcode' and passes an empty string, the attr
 * parameter and the content parameter values.
 *
 * The supported attributes for the shortcode are 'id', 'align', 'width', and
 * 'caption'.
 *
 * @since 2.6.0
 *
 * @param array $attr Attributes attributed to the shortcode.
 * @param string $content Optional. Shortcode content.
 * @return string
 */
function cherub_divider_shortcode($attr, $content = null) {

    // extract(shortcode_atts(array(
    //     'id'    => ''
    // ), $attr));

    // $post = get_post($id);

    return '<div class="divider"></div>';

}

add_shortcode('divider', 'cherub_divider_shortcode');

function cherub_audio_shortcode($attr, $content = null) {

global $audio_count;
$audio_count++;

extract(shortcode_atts(array(
    'url'    => ''
), $attr));

$random = rand();

$lib = <<<EOT

<link href="http://jplayer.org/latest/skin/pink.flag/jplayer.pink.flag.css" rel="stylesheet" type="text/css" />
<link href="http://jplayer.org/latest/skin/circle.skin/circle.player.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="http://jplayer.org/2.1.0/js/jquery.jplayer.min.js"></script>
<!-- <script type="text/javascript" src="http://jplayer.org/latest/js/jquery.transform.js"></script> -->
<script type="text/javascript" src="http://medillcherubs.org/2013/wp-content/themes/medill-cherubs/js/jquery.transform.js"></script>
<script type="text/javascript" src="http://jplayer.org/latest/js/jquery.grab.js"></script>
<script type="text/javascript" src="http://jplayer.org/latest/js/mod.csstransforms.min.js"></script>
<script type="text/javascript" src="http://jplayer.org/latest/js/circle.player.js"></script>

EOT;

$url = str_replace("http", "https", $url);

$html = <<<EOT

    <!-- The jPlayer div must not be hidden. Keep it at the root of the body element to avoid any such problems. -->
    <div id="jquery_jplayer_$random" class="cp-jplayer"></div>

    <!-- The container for the interface can go where you want to display it. Show and hide it as you need. -->

    <div id="cp_container_$random" class="cp-container">
        <div class="cp-buffer-holder"> <!-- .cp-gt50 only needed when buffer is > than 50% -->
            <div class="cp-buffer-1"></div>
            <div class="cp-buffer-2"></div>
        </div>
        <div class="cp-progress-holder"> <!-- .cp-gt50 only needed when progress is > than 50% -->
            <div class="cp-progress-1"></div>
            <div class="cp-progress-2"></div>
        </div>
        <div class="cp-circle-control"></div>
        <ul class="cp-controls">
            <li><a href="#" class="cp-play" tabindex="1">play</a></li>
            <li><a href="#" class="cp-pause" style="display:none;" tabindex="1">pause</a></li> <!-- Needs the inline style here, or jQuery.show() uses display:inline instead of display:block -->
        </ul>
    </div>

    <script>
    (function($) {
        var myCirclePlayer = new CirclePlayer("#jquery_jplayer_$random",
        {
            mp3: "$url/stream?client_id=9682c1da6439695b9672a598ce1c5591"
            // m4a: "http://www.jplayer.org/audio/m4a/Miaow-07-Bubble.m4a",
            // oga: "http://www.jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
        }, {
            supplied: "mp3",
            cssSelectorAncestor: "#cp_container_$random",
            swfPath: "../js",
            wmode: "window"
        });
    })(jQuery);
    </script>

EOT;

if ($audio_count <=1) return $lib . $html;
else return $html;

}

add_shortcode('audio', 'cherub_audio_shortcode');
add_shortcode('soundcloud', 'cherub_audio_shortcode');



function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {

        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }

        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }

    return implode( '', $paragraphs );
}


function the_login_form( $message ) {
    $blogusers = get_users();
    $json = array();
    $options = "";
    foreach ($blogusers as $user) {
        $options .= '<option>' . $user->display_name . '</option>';
        $json[] = "'" . $user->display_name . "'";
    }
    $json = join($json, ", ");
    $string = <<<EOT

<style>
.twitter-typeahead .tt-query,
.twitter-typeahead .tt-hint {
  margin-bottom: 0;
}

.tt-dropdown-menu {
  min-width: 160px;
  margin-top: 2px;
  padding: 5px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0,0,0,.2);
  *border-right-width: 2px;
  *border-bottom-width: 2px;
  -webkit-border-radius: 6px;
     -moz-border-radius: 6px;
          border-radius: 6px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
          box-shadow: 0 5px 10px rgba(0,0,0,.2);
  -webkit-background-clip: padding-box;
     -moz-background-clip: padding;
          background-clip: padding-box;
}

.tt-suggestion {
  display: block;
  padding: 3px 20px;
}

.tt-suggestion.tt-is-under-cursor {
  color: #fff;
  background-color: #0081c2;
  background-image: -moz-linear-gradient(top, #0088cc, #0077b3);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0077b3));
  background-image: -webkit-linear-gradient(top, #0088cc, #0077b3);
  background-image: -o-linear-gradient(top, #0088cc, #0077b3);
  background-image: linear-gradient(to bottom, #0088cc, #0077b3);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0077b3', GradientType=0)
}

.tt-suggestion.tt-is-under-cursor a {
  color: #fff;
}

.tt-suggestion p {
  margin: 0;
}

.tt-hint {
    opacity: 0;
}

.tt-query {
    margin-bottom: 6px;
}

.twitter-typeahead .tt-dropdown-menu {
    opacity: 1
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://twitter.github.io/typeahead.js/releases/latest/typeahead.min.js"></script>

<script>
$('#user_login').typeahead({
  name: 'logins',
  local: [$json]
});
</script>
EOT;

/*

<datalist id="usernames">
  <!--[if !IE]><!-->
  <select><!--<![endif]-->
    $options
  <!--[if !IE]><!-->
  </select><!--<![endif]-->
</datalist>
<script src="http://medillcherubs.org/2013/wp-content/themes/medill-cherubs/js/jquery.datalist.min.js"></script>
<style>
    .datalist li {
        display:none;
        background-color: white;
        border-bottom: 1px solid #eee;
    }
</style>
<script>
    (function($) {
        console.log("!");
        $("#user_login").attr("list", "usernames");
        $('input[list]').datalist();
    })(jQuery);
</script> */

echo $message . $string;
}
add_action( 'login_form', 'the_login_form' );



function cherub_vimeo_shortcode($atts, $content=null) {
    extract(shortcode_atts(array(
        'clip_id'   => '',
        'width'     => '',
        'height'    => '',
        'title'     => '0',
        'byline'    => '0',
        'portrait'  => '0',
        'color'     => '',
        'html5'     => '1',
        'autoplay'  => '0',
        'api'  => '1',
        'loop'  => '0',
        'size' => '',
        'player_id' => ''
    ), $atts));

    $player_id = "player" . $player_id;

    if ($size == "wide") $width = 800;
    if ($size == "large") $width = 565;
    if ($size == "medium") $width = 460;
    if ($size == "small") $width = 275;

    if ($height && !$atts['width']) $width = intval($height * 16 / 9);
    if (!$atts['height'] && $width) $height = intval($width * 9 / 16);

    return $html5 ?
        "<iframe class='vimeo-player' id=$player_id src='http://player.vimeo.com/video/$clip_id?title=$title&amp;byline=$byline&amp;portrait=$portrait&amp;autoplay=$autoplay&amp;loop=$loop&amp;api=$api&amp;player_id=$player_id' width='$width' height='$height' frameborder='0'></iframe>" :
        "<object width='$width' height='$height'><param name='allowfullscreen' value='true' />".
            "<param name='allowscriptaccess' value='always' />".
            "<param name='movie' value='http://vimeo.com/moogaloop.swf?clip_id=$clip_id&amp;server=vimeo.com&amp;show_title=$title&amp;show_byline=$byline&amp;show_portrait=$portrait&amp;color=$color&amp;fullscreen=1&amp;autoplay=$autoplay&amp;loop=$loop&amp;api=$api&amp;player_id=$player_id' />".
            "<embed src='http://vimeo.com/moogaloop.swf?clip_id=$clip_id&amp;server=vimeo.com&amp;show_title=$title&amp;show_byline=$byline&amp;show_portrait=$portrait&amp;color=$color&amp;fullscreen=1' type='application/x-shockwave-flash' allowfullscreen='true' allowscriptaccess='always' width='$width' height='$height'></embed></object>".
            "<br /><a href='http://vimeo.com/$clip_id'>View on Vimeo</a>.";
}

add_shortcode('vimeo', 'cherub_vimeo_shortcode');




// this seems to be an additional filter running for images only
add_filter('image_send_to_editor', 'cherub_image_send_to_editor', 20, 8);

function cherub_image_send_to_editor($html, $id, $caption, $title, $align, $url, $size, $alt) {

    if ($caption) $caption = $caption;
    else $caption = $alt;

    $response = '[sidebar size="' . $size . '" align="align' . $align  . '"]' .
<<<EOT
\n
EOT;
    $response .= $html .
<<<EOT
\n
EOT;
    $response .= $alt  .
<<<EOT
\n
EOT;
    $response .= '[/sidebar]';

    return $response;

    $attachment = get_post($id); //fetching attachment by $id passed through
    $mime_type = $attachment->post_mime_type; //getting the mime-type
    if (substr($mime_type, 0, 5) == 'video') { //checking mime-type
        //if a video one, replace $html by shortcode (assuming $url contains the attachment's file url)
        $html = '[video src="'.$url.'"]';
    }
    return $html; // return new $html
}

//[soundcloud url="http://api.soundcloud.com/tracks/54129464" params="" width=" 100%" height="166" iframe="true" /]

// http://api.soundcloud.com/resolve.json?url=https://soundcloud.com/medillcherubs/weatherfinal1-mixdown&client_id=9682c1da6439695b9672a598ce1c5591

// https://api.soundcloud.com/tracks/49349198/stream?client_id=9682c1da6439695b9672a598ce1c5591

function my_remove_pointer_scripts() {
    remove_action( 'admin_enqueue_scripts', array( 'WP_Internal_Pointers', 'enqueue_scripts' ) );
}

// add_filter( 'hidden_meta_boxes', 'custom_hidden_meta_boxes' );
function custom_hidden_meta_boxes( $hidden ) {
    return array('trackbacksdiv', 'commentsdiv', 'commentstatusdiv');
}
add_action('admin_init', 'my_remove_pointer_scripts');


// Setting the default screen options for users:
// add_action('admin_init', 'set_user_metaboxes');
function set_user_metaboxes($user_id=NULL) {

    // These are the metakeys we will need to update
    $meta_key['order'] = 'meta-box-order_post';
    $meta_key['hidden'] = 'metaboxhidden_post';

    // So this can be used without hooking into user_register
    if ( ! $user_id)
        $user_id = get_current_user_id();

    // Set the default order if it has not been set yet
    if ( ! get_user_meta( $user_id, $meta_key['order'], true) ) {
        $meta_value = array(
            'side' => 'submitdiv,formatdiv,categorydiv,postimagediv',
            'normal' => 'postexcerpt,tagsdiv-post_tag,postcustom,commentstatusdiv,commentsdiv,trackbacksdiv,slugdiv,authordiv,revisionsdiv,postcustom,slugdiv',
            'advanced' => '',
        );
        update_user_meta( $user_id, $meta_key['order'], $meta_value );
    }

    // Set the default hiddens if it has not been set yet
    if ( ! get_user_meta( $user_id, $meta_key['hidden'], true) ) {
        $meta_value = array('postcustom','trackbacksdiv','commentstatusdiv','commentsdiv','slugdiv','authordiv','revisionsdiv');
        update_user_meta( $user_id, $meta_key['hidden'], $meta_value );
    }
}

function active_class_replacement($text) {

}

add_filter ('nav_menu_css_class','active_class_replacement');
?>