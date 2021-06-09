# html
A helper package for generating HTML5 tags

## Usage
### Installation
The easiest way to install this package is using composer:
``` bash
composer require studiow/html
```

### Basic usage
Generating HTML tags with this package is pretty easy:
```php
// Create the element
$link = new \Studiow\HTML\Element("a", "Documents", ["href"=>"/documents"]);

// Output
echo (string) $link;
// prints <a href="/documents">Documents</a>
```

### Getting and setting attributes
Working with attributes is easy too:

```php
// Create the element
$link = new \Studiow\HTML\Element("a", "Documents", ["href"=>"/documents"]);

// Set an attribute
$link->setAttribute('title', 'Go to documents');

// Get the value for an attribute
$link->getAttribute('title');  // returns  'Go to documents'
$link->getAttribute('attr_not_set');  // returns  null

// Remove an attribute
$link->removeAttribute('title');
```

### A touch of class
Working with classes works pretty much as you'd expect:

```php
// Create the element
$link = new \Studiow\HTML\Element("a", "Documents", ["href"=>"/documents"]);

// Add a single class
$link->addClass("button");

// Add multiple classes seperated by a space
$link->addClass("button button-documents");

// Remove a class
$link->removeClass("button");

// Check if the element has a certain class
$link->hasClass("button-documents");
```

### Method chaining
You can go ahead and chain the methods together
```php
$link = new Studiow\HTML\Element("a");
$link->setInnerHTML("Documents")
        ->setAttribute("href", "/documents")
        ->addClass("button")
        ->addClass("button-documents")
        ->setAttribute('title', "Go to documents");
echo (string) $link; // Outputs <a href="/documents" class="button button-documents" title="Go to documents">Documents</a>
```
## Known Issues
### Case (in)sensitve
HTML5 attributes are supposed to be case-insensitive, but here they are case-sensitive. Lowercase recommended!

### Where is getChildren() etc.?
This package is by no means meant as a tool to generate large pieces of HTML. While you can use an Element as the innerHTML of another Element it will be converted to text when you do this.

If you find yourself rendering large pieces of HTML within a PHP script, you'd probably be better of using a template system.

