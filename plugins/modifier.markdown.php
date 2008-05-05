<?php
function smarty_modifier_markdown($text) {
    $parser = new Markdown_Parser;
    $parser->no_markup = true;
    $html = $parser->transform($text);

    return $html;
}
?>
