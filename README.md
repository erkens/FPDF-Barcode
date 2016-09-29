# FPDF
**This repository is only made for cloning official FPDF releases, adding it to a namespace and adding barcode support which are available at: http://www.fpdf.org**

For barcode support see:

http://www.fpdf.org/en/script/script5.php  EAN 13 / UPC-A
http://www.fpdf.org/en/script/script46.php Code 39
http://www.fpdf.org/en/script/script88.php Code 128


FPDF is a PHP class which allows to generate PDF files with pure PHP. F from FPDF stands for Free: you may use it for any kind of usage and modify it to suit your needs.

## Installation with Composer

If you're using Composer to manage dependencies, you can include the following in your composer.json file:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Erkens/FPDF-Barcode.git"
        }
    ],
    "require": {
      "erkens/fpdf-barcode": "^1.8.1"
    }
}
```
