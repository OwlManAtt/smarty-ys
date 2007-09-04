<?php
/**
 * Turn a unix timestamp into a nice string.
 *
 * Fixed by Owl: 
 *   * Fixed decade division-by-zero/infinite loop bug.
 *   * Allowed strings as input.
 * 
 * @author John McClumpha
 * @copyright John McClumpha, 2007
 * @link http://blogs.igeek.com.au/DarkAz/blogpost/PHP_function_for_displaying_relative_dates_in_a_human_readable_format/
 * @param integer|string $timestamp 
 * @return string
 **/
function smarty_modifier_timediff($timestamp)
{
    if(is_string($timestamp)) $timestamp = strtotime($timestamp);
    
    $difference = time() - $timestamp;
    $periods = array("sec", "min", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60","60","24","7","4.35","12","10");
    
    if($difference == 0)
    {
        return 'Less than a minute ago';
    }
    elseif ($difference > 0) 
    { // this was in the past
        $ending = "ago";
    } 
    else 
    { // this was in the future
        $difference = -$difference;
        $ending = "to go";
    }       
    
    for($j = 0; $difference >= $lengths[$j]; $j++)
    {
        if($lengths[$j] == 0) break;

        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    if($difference != 1) 
    {
        $periods[$j].= "s";
    }
    
    $text = "$difference $periods[$j] $ending";
    
    return $text;
} // end relative_time
?>
