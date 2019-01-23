<?php
/**
 * https://github.com/erusev/parsedown
 */
class PluginReadmeParser{
  /**
   */
  public function parse_text($text){
    include_once __DIR__.'/lib/Parsedown.php';
    $Parsedown = new Parsedown();
    return $Parsedown->text($text);
  }
  public function widget_readme($data){
    $data = new PluginWfArray($data);
    $file = $data->get('data/file');
    $file = wfGlobals::getAppDir().$file;
    $exist = wfFilesystem::fileExist($file);
    $readme = null;
    if($exist){
      $readme = file_get_contents($file);
      wfPlugin::includeonce('readme/parser');
      $parser = new PluginReadmeParser();
      $readme = $parser->parse_text($readme);
    }
    $element = wfDocument::createHtmlElement('div', $readme);
    wfDocument::renderElement(array($element));
  }
}
