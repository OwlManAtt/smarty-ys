<?php
function smarty_function_gethms($params, &$smarty)
{
    extract($params);

    $hours = floor($secondes / 3600);
    $minute = floor(($secondes - ($hours * 3600)) / 60);
    $secconde = $secondes - ($hours * 3600) - ($minute * 60);

    if($hours > 0 || ($hours == 0 && $minute > 1))
    {
        printf("%02dh %02dm", $hours, $minute);
    }
    else
    {
        printf("%02dm %02ds", $minute, $secconde);
    }
}
?>
