<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/** 
 * Smarty {kkkurl} function plugin
 *  
 * Type:     function<br>
 * Name:     kkkurl<br>
 * Date:     2007-08-28 
 * Purpose:  Build a fucking URL.<br>
 * Input:<br>
 *         - link_text = the text to display
 *         - slug = page slug 
 *         - args = the rest of the URL (optional) 
 *         - class (optional) = class(es) to apply to the link
 *         - id (optional) = an ID to put on the link
 *         - title (optional) = a title to put on the link 
 *         - name (optional) = a name attribute
 * @version  1.2
 * @author   Nick 'Owl' Evans <owlmanatt@gmail.com> 
 * @param    array
 * @param    Smarty
 * @return   string
 */ 
function smarty_function_kkkurl($params, &$smarty)
{
    $REQUIRED = array('link_text','slug');
    foreach($REQUIRED as $parameter)
    {
        if(array_key_exists($parameter,$params) == false)
        {
            $smarty->trigger_error("kkkurl: Required parameter '$parameter' not specified.");
        }
    } // end required check

    $kkk_base = $smarty->get_template_vars('display_settings');
    $kkk_base = $kkk_base['public_dir'];

    $url = "<a href='{$kkk_base}/{$params['slug']}";
    
    if(array_key_exists('args',$params) == trie)
    {
        $url .= "/{$params['args']}";
    }

    $url .= "'";

    if(array_key_exists('class',$params) == true)
    {
        $url .= " class='{$params['class']}'";
    }

    if(array_key_exists('id',$params) == true)
    {
        $url .= " id='{$params['id']}'";
    }

    if(array_key_exists('title',$params) == true)
    {
        $url .= " title='{$params['title']}'";
    }

    if(array_key_exists('name',$params) == true)
    {
        $url .= " name='{$params['name']}'";
    }

    $url .= ">{$params['link_text']}</a>";

    return $url;
} // end smarty_function_kkkurl

?>
