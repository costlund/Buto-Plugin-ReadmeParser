# Buto-Plugin-ReadmeParser
Parse README.md files.


## Widget

Parse content from readme.md file and put into a div.
Add path to file from application dir to a readme.md file.
Example: /sys/mercury/README.md


```
type: widget
data:
  plugin: readme/parser
  method: readme
  data:
    file: /sys/mercury/README.md
```

## PHP
Parse readme.md content.
```
wfPlugin::includeonce('readme/parser');
$parser = new PluginReadmeParser();
$html = $parser->parse_text('Readme.md content.');
```
