<?php
function smarty_modifier_markdown($text) {
    $parser = new Markdown_Parser;
    $parser->no_markup = true;
    $parser->no_entities = true;
    $html = $parser->transform($text);

    return $html;
}
?>
