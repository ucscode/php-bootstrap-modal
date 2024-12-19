# Bootstrap Modal PHP Component

A lightweight PHP library to generate dynamic Bootstrap modals effortlessly. Customize titles, content, buttons, and attributes programmatically, making it ideal for web applications with reusable and dynamic UI components.

## Features
- Dynamically create Bootstrap modals.
- Customizable titles, body content, and footer buttons.
- Fully compatible with Bootstrap 5.
- Lightweight and easy to integrate.

## Requirements
- PHP 8.3 or higher.
- Bootstrap 5 CSS and JavaScript files loaded in your project.

## Installation

Install via Composer:
```bash
composer require ucscode/bs-modal-component
```

## Usage

Here is an example of how to use the library:

### 1. Basic Example

```php
require 'vendor/autoload.php';

use Ucscode\HtmlComponent\BsModal\BsModal;
use Ucscode\HtmlComponent\BsModal\BsModalButton;

$modal = new BsModal();
```

You can configure modal properties

```php
$modal
    ->setId('exampleModal')
    ->setTitle('Dynamic Modal')
    ->setMessage('<p>This is dynamically generated content.</p>')
;
```

You can add custom modal buttons

```php
$defaultButton = new BsModalButton();

$customizedButton = new BsModalButton('Save Changes', 'anchor', [
    'class' => 'btn btn-success',
]);

$modal
    ->addButton($defaultButton)
    ->addButton($customizedButton)
;
```

You can get the HTML string of the modal by calling the `render()` method

```php
echo $modal->render();
```

### 2. Adding Custom Attributes

You can add custom attributes to the modal container:

```php
$modal->getElement()->setAttribute('data-custom', 'example-value');
```

The bootstrap modal element is built using [UssElement](https://github.com/ucscode/uss-element) library. You can query DOM sections such as header, body, or footer


```php
$modal->getElement()->querySelector('.modal-header')->getClassList()->add('custom-header-class');
```

```php
$modal->getElement()->querySelector('.modal-body')->setAttribute('id', 'custom-body-id');
```

```php
$modal->getElement()->querySelector('.modal-footer')->setVisible(false);
```

### 3. Rendering the Modal

The library generates valid HTML for a Bootstrap modal. You can insert the output into your HTML structure:

```php
<div class="container">
    <?php 
        echo $modal->getAssociateButton()->render(); // The button to open the modal
        echo $modal->render(); // The modal itself
    ?>
</div>
```

## License

This library is open-source software licensed under the [MIT license](LICENSE).

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your changes.

## Support

For any questions or issues, please open an issue on the [GitHub repository](https://github.com/your-vendor-name/bootstrap-modal-generator).


