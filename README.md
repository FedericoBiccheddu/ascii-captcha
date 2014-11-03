# ascii-captcha

A very original ASCII Captcha.

[![Build Status](https://travis-ci.org/FedericoBiccheddu/ascii-captcha.svg)](https://travis-ci.org/FedericoBiccheddu/ascii-captcha)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/FedericoBiccheddu/ascii-captcha/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/FedericoBiccheddu/ascii-captcha/?branch=master)

## Usage
```php
/* Create an instance of the alphabet to use. */
$alphabet = new FedericoBiccheddu\AsciiCaptcha\Alphabet\DefaultAlphabet;

/* Init the main Captcha class */
$captcha = new FedericoBiccheddu\AsciiCaptcha\Captcha($alphabet);

/* Generate a random string */
$captcha->generateString();

/*
 * Display your ASCII generated code.
 * By default, toHtml() use self-close break. You can
 * set the first parameter "false" to use <br>
 */
echo $captcha->toHtml();
```

Example result for string "06YF2":
<pre>&nbsp;&nbsp;&nbsp;*****&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*******&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;********&nbsp;&nbsp;&nbsp;*******&nbsp;&nbsp;<br />&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;<br />&nbsp;**&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;<br />&nbsp;**&nbsp;***&nbsp;**&nbsp;&nbsp;********&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;******&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*******&nbsp;&nbsp;<br />&nbsp;****&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;*****&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*******&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*********&nbsp;</pre>