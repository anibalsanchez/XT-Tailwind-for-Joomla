# XT Renderers for Joomla

These are two template renderers that we are using in our Tailwind templates for Joomla.

- `XTHtmlAssetsRenderer`, to render the head tags of the HTML document.
- `XTHtmlAssetsBodyRenderer`, to render the body tags at the bottom of the HTML document.

Usage:

```php
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
  <meta http-equiv="Content-Type" content="<?php echo $headData['metaTags']['http-equiv']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <base href="<?php echo CMSUri::current(); ?>">

  <!-- Joomla calls the XTHtmlAssetsRenderer here -->
  <jdoc:include type="xthtmlassets" />
</head>

<body class="site <?php echo $option
    .' view-'.$view
    .($layout ? ' layout-'.$layout : ' no-layout')
    .($task ? ' task-'.$task : ' no-task')
    .($itemid ? ' itemid-'.$itemid : '')
    .('rtl' === $this->direction ? ' rtl' : '');
?>">
....

    <!-- Joomla calls the XTHtmlAssetsBodyRenderer here -->
  <jdoc:include type="xthtmlassetsbody"  name="body" style="none" />
</body>
</html>
```

## Copyright & License

- Copyright (c)2012-2024 Extly, CB. All rights reserved.
- Distributed under the GNU General Public License version 3 or later; see LICENSE