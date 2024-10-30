<?php
/*
Plugin Name: Include It
Plugin URI: http://www.satollo.net/plugins/include-it/
Description: Include an external file (even a php script) in your pages or posts
Version: 1.2.0
Author: Stefano Lissa
Author URI: http://www.satollo.net
Revision: $Rev$
*/

add_action('admin_head', 'include_it_admin_head');
function include_it_admin_head()
{
    if (isset($_GET['page']) && strpos($_GET['page'], 'include-it/') === 0) {
        echo '<link type="text/css" rel="stylesheet" href="' . plugins_url('admin.css', __FILE__) . '">';
    }
}

function include_tag_find($tag, $text, $start=0)
{
    $x = strpos($text, '[' . $tag . ' ');
    if ($x === false) return null;

    $t = array();
    $t['start'] = $x;

    $x += strlen($tag)+1;

    // search the end of the open tag
    $y = strpos($text, ']', $x);

    // estracts thee attributes (attr=value, no spaces admitted)
    $tmp = split(' ', substr($text, $x, $y-$x));
    for ($i=0; $i<count($tmp); $i++)
    {
        $tmp[$i] = trim($tmp[$i]);
        if ($tmp[$i] == '') continue;
        $tmp2 = split('=', $tmp[$i], 2);
        $t['attrs'][$tmp2[0]] = $tmp2[1];
    }

    // the close tag, no spaces admitted
    $z = strpos($text, '[/' . $tag . ']');
    if ($z !== false)
    {
        $t['body'] = substr($text, $y+1, $z-($y+1));
        $t['end'] = $z;
    }
    else $t['end'] = $y;

    return $t;
}

add_filter('the_content', 'include_the_content');
function include_the_content($content)
{
	$start = 0;
	while (true)
	{
		$tag = include_tag_find('include', $content, $start);
		if ($tag == null) return $content;

	    if ($tag['attrs']['iframe'])
	    {
	        $file = $tag['attrs']['file'];
	        if (strpos($file, 'http://') !== 0) $file = get_option('home') . '/' . $file;
	        $buffer = '<iframe frameborder="0" src="' . $file . '"';
	        if ($tag['attrs']['width']) $buffer .= ' width="' . $tag['attrs']['width'] . '"';
	        if ($tag['attrs']['scrolling']) $buffer .= ' scrolling="' . $tag['attrs']['scrolling'] . '"';
	        if ($tag['attrs']['height']) $buffer .= ' height="' . $tag['attrs']['height'] . '"';
	        $buffer .= '></iframe>';
	    }
	    else
	    {
	        ob_start();
	        include(ABSPATH . $tag['attrs']['file']);
	        $buffer = ob_get_contents();
	        ob_end_clean();
	    }
	    $content = substr($content, 0, $tag['start'])  . $buffer . substr($content, $tag['end']+1);
		$start = $tag['start'] + strlen($buffer);
	}
}

add_action('admin_menu', 'include_admin_menu');
function include_admin_menu()
{
    add_options_page('Include It', 'Include It', 'manage_options', 'include-it/options.php');
}
