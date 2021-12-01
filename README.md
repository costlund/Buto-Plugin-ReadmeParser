# Buto-Plugin-ReadmeParser
Parse README.md files or content.

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
```

### File
```
    file: /sys/mercury/README.md
```

### Content
Plain text.
```
    content: 'Some text...'
```
Get content from yml file.
```
    content: yml:/_path_to_yml_/data.yml:my_param/text
```

#### Special settings
Special settings to avoid yml comments started with #.
```
[h1] Headline
[h2] Headline
[h3] Headline
[h4] Headline
[h5] Headline
```

#### Standard formation
```
**Bold**
*Italic*
```

## PHP
Parse readme.md content.
```
wfPlugin::includeonce('readme/parser');
$parser = new PluginReadmeParser();
$html = $parser->parse_text('Readme.md content.');
```

## Github
https://github.com/erusev/parsedown
