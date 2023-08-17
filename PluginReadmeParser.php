<?php
class PluginReadmeParser{
  public function parse_text($text){
    include_once __DIR__.'/lib/Parsedown.php';
    $Parsedown = new Parsedown();
    return $Parsedown->text($text);
  }
  public function widget_readme($data){
    $data = new PluginWfArray($data);
    wfPlugin::includeonce('readme/parser');
    $parser = new PluginReadmeParser();
    if($data->get('data/file')){
      $file = $data->get('data/file');
      $file = wfSettings::replaceDir($file);
      $file = wfGlobals::getAppDir().$file;
      $exist = wfFilesystem::fileExist($file);
      $readme = null;
      if($exist){
        $readme = file_get_contents($file);
        $readme = $parser->parse_text($readme);
      }
      $element = wfDocument::createHtmlElement('div', $readme);
      wfDocument::renderElement(array($element));
    }
    if($data->get('data/content')){
      $content = wfSettings::getSettingsFromYmlString($data->get('data/content'));
      $content = wfPhpfunc::str_replace('[h1]', '#', $content);
      $content = wfPhpfunc::str_replace('[h2]', '##', $content);
      $content = wfPhpfunc::str_replace('[h3]', '###', $content);
      $content = wfPhpfunc::str_replace('[h4]', '####', $content);
      $content = wfPhpfunc::str_replace('[h5]', '#####', $content);
      $content = $parser->parse_text($content);
      $element = wfDocument::createHtmlElement('div', $content);
      wfDocument::renderElement(array($element));
    }
  }
}
