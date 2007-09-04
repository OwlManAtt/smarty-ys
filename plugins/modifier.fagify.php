<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty spacify modifier plugin
 *
 * Type:     modifier<br>
 * Name:     fagify<br>
 * Purpose:  COLOURS LOL 
 * @author   OwlManAtt <owlmanatt@starchan.org>
 * @param string
 * @return string
 */
function smarty_modifier_fagify($string)
{
    $FAG = array(
        '#00FFFF','#FF7F50','#7FFF00','#DC143C','#8B008B',
        '#8FBC8F','#CD5C5C','#7CFC00','#FA8072','#2E8B57',
        '#9ACD32','#CCFFFF','#99FFCC','#FFFF33','#99CC00',
        '#FF99CC','#CC99FF','#9933CC','#FF3366','#990066',
        '#66FF33','#0099CC','#669999','#0033FF','#003366',
        '#666600','#0000CC','#FF3300','#336699','#006666',
    );
    $IGNORE = array(' ',"\n");
    
    $final = '';
    $string = str_split($string);

    foreach($string as $index => $char)
    {
        if(in_array($char,$IGNORE) == false)
        {
            $color = $FAG[array_rand($FAG)];
            
            $background = '#';
            $background .= str_pad(dechex(255 - hexdec(substr($color,1,2))),2,'0',STR_PAD_LEFT);
            $background .= str_pad(dechex(255 - hexdec(substr($color,3,2))),2,'0',STR_PAD_LEFT);
            $background .= str_pad(dechex(255 - hexdec(substr($color,5,2))),2,'0',STR_PAD_LEFT);
            
            $style = "color: $color; background: $background; font-size: large; font-weight: bold;";
            if(rand(1,200) > 100) 
            { 
                $style .= ' text-decoration: blink;';
            }
            
            $final .= "<span style='$style'>$char</span>";
        }
        else
        {
            $final .= $char;
        }
    } // end loop

    return $final;
} // end fagify

/* vim: set expandtab: */

?>
