# **pdf-gen**

## A laravel package for pdf generation

Require this package in your composer.json and update composer. This will download the package and the folowing libraries also:

+ mpdf/mpdf
+ erusev/parsedown
+ dompdf/dompdf

```bash
$ composer require razvan171514/pdf-gen
```

## **Installation**

### Laravel 7.x

In the ```config/app.php``` file an alias can be added for ease of use when importing the facade.

```php
...
'aliases' => [
    ...
    'Pdf' => razvan\PdfGen\Pdf::class,
    ...
],
...
```

## **Publishing configuration**

The defaults configuration settings are set in ```config/pdf.php``` . Copy this file to your own config directory to modify the values. You can publish the config using this command:

```bash
$ php artisan vendor:publish --provider="razvan\PdfGen\PdfServiceProvider"
```

The configuration file contains the options for the setting of this package such as driver configuration and configuration for specific drivers (ex. dompdf).

```php
return [
    /** mpdf , dompdf*/
    'driver' => 'dompdf',
    'dompdf_config' => [
        'page' => 'A4',
        /** landscape, portrait */
        'orientation' => 'portrait',
    ],
    /** path to template directoy */
    'templates_path' => __DIR__ . '/../resources/views/',
    /** path to output directory */
    'output_path' => __DIR__ . '/../resources/views/pdfs/',
];
```

Here is allso configured the path to the templates directory and the path where the generated pdfs will be stored. Insted of the default hardcoded path the [base_path](https://laravel.com/docs/7.x/helpers#method-base-path) helper can be used

```php
...
'templates_path' => base_path('resources/views'),
'output_path' => base_path('resources/views/pdfs'),
...
```

> **Note:** The output folder has to exist otherwose an exception will be thrown

## **Usage**

The havy lifting of the entire package is done by the ```razvan\PdfGen\Pdf::class``` witch is resolving the configuration in the ```config/pdf.php``` file and returns the desired pdf file.

```php
Pdf::generate('file_name.html', [
    'name' => 'oputput_file_name.pdf',
    'mode' => 'F',
]);
```

The ```razvan\PdfGen\Pdf::generate()``` method accepts tow arguments:

1. The template file (the supported types are html, markdown, view).
2. An array with tow elements: name and mode. The name key holds the output file name and the mode key holds the action that will be performed.

> **Note:** The second argument is optional and if it's not present the name key will default to ```file.pdf``` and the mode key to ```F```

Modes:

+ **```F```** for saving the pdf file in the project folder at the specified path in the configuration.
+ **```D```** for downloading the pdf file.

> **Note:** For the dompdf driver only the ```D``` mode is ***not*** available

Examples:

```php
...
use razvan\PdfGen\Pdf;
...
// html template
Pdf::generate('file_name.html', ['name' => 'some_other_name.pdf']);
// markdown template
Pdf::generate('file_name.md', ['mode' => 'D']);
// view
Pdf::generate(view('blade_view'));
// view with data
Pdf::generate(view('blade_view', compact('data')), [
    'name' => 'cool_name.pdf',
    'mode' => 'D',
]);
```

> **Note:** The import statement can be changed with only ```use Pdf;``` if the alias is added to ```config/app.php``` file

> **Note:** The second argument accepted by the generate method can be passed with only one of the two keys (the other one will defaulted with it's default value)

## **License**

### [razvan171514/pdf-gen](https://github.com/razvan171514/pdf-gen) is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT)
