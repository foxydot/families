<?php
    // Load our main stylesheet.
    if(!is_admin()){
        wp_enqueue_style( 'fourfour-style', get_stylesheet_uri() );
    }
    
    add_shortcode('list-posts','msdlab_list_posts');
    function msdlab_list_posts($atts){
        extract( shortcode_atts( array(
            'category' => ''
        ), $atts ) );
        $args = array(
            'posts_per_page'   => -1,
            'offset'           => 0,
            'category_name'    => $category,
            'post_type'        => 'post',
            'suppress_filters' => true 
        );
        $posts = get_posts($args);
        foreach($posts AS $p){
            $list .= '<li>';
            $list .= '<a href="'.get_permalink($p->ID).'">'.get_the_title($p->ID).'</a>';
            if($category == 'news'){
                $list .= '<br /><span class="meta">('.get_the_date("F Y",$p->ID).')</span>';
            }
            $list .= '</li>';
        }
        return '<ul class="posts-list">'.$list.'</ul>';
    }

    
/*
* A useful troubleshooting function. Displays arrays in an easy to follow format in a textarea.
*/
if(!function_exists('ts_data')){
    function ts_data($data){
        $ret = '<textarea class="troubleshoot" rows="20" cols="100">';
        $ret .= print_r($data,true);
        $ret .= '</textarea>';
        print $ret;
    }
}
/*
* A useful troubleshooting function. Dumps variable info in an easy to follow format in a textarea.
*/
if(!function_exists('ts_var')){
    function ts_var($var){
        ts_data(var_export( $var , true ));
    }
}

//add_action('genesis_footer','msdlab_trace_actions');
function msdlab_trace_actions(){
    global $wp_filter;
    ts_var( $wp_filter['the_content'] );
}
    