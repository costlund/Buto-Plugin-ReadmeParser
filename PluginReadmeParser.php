<?php
/**
 * https://github.com/erusev/parsedown
 */
class PluginReadmeParser{
  public function parse_text($text){
    include_once __DIR__.'/lib/Parsedown.php';
    $Parsedown = new Parsedown();
    return $Parsedown->text($text);
  }
}
