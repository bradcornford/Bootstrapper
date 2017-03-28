# Fast Bootstrap integration with Laravel

[![Latest Stable Version](https://poser.pugx.org/cornford/bootstrapper/version.png)](https://packagist.org/packages/cornford/bootstrapper)
[![Total Downloads](https://poser.pugx.org/cornford/bootstrapper/d/total.png)](https://packagist.org/packages/cornford/bootstrapper)
[![Build Status](https://travis-ci.org/bradcornford/Bootstrapper.svg?branch=master)](https://travis-ci.org/bradcornford/Bootstrapper)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bradcornford/Bootstrapper/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bradcornford/Bootstrapper/?branch=master)

### For Laravel 4.x, check [version 1.5.1](https://github.com/bradcornford/Bootstrapper/tree/v1.5.1)

Think of Bootstrap as an easy way to integrate Bootstrap with Laravel 4, providing a variety of helpers to speed up development. These include:

- `Bootstrap::css`
- `Bootstrap::js`
- `Bootstrap::vertical`
- `Bootstrap::horizontal`
- `Bootstrap::inline`
- `Bootstrap::text`
- `Bootstrap::password`
- `Bootstrap::email`
- `Bootstrap::telephone`
- `Bootstrap::number`
- `Bootstrap::url`
- `Bootstrap::range`
- `Bootstrap::search`
- `Bootstrap::file`
- `Bootstrap::date`
- `Bootstrap::datetime`
- `Bootstrap::time`
- `Bootstrap::textarea`
- `Bootstrap::select`
- `Bootstrap::checkbox`
- `Bootstrap::radio`
- `Bootstrap::submit`
- `Bootstrap::button`
- `Bootstrap::reset`
- `Bootstrap::link`
- `Bootstrap::secureLink`
- `Bootstrap::linkRoute`
- `Bootstrap::linkAction`
- `Bootstrap::mailto`
- `Bootstrap::none`
- `Bootstrap::success`
- `Bootstrap::info`
- `Bootstrap::warning`
- `Bootstrap::danger`

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `cornford/bootstrapper`.

	"require": {
		"laravelcollective/html": "5.*",
		"cornford/bootstrapper": "2.*"
	}

Next, update Composer from the Terminal:

	composer update

Once this operation completes, the next step is to add the required service providers. Open `app/config/app.php`, and add the new items to the providers array.

	'Collective\Html\HtmlServiceProvider',
	'Cornford\Bootstrapper\BootstrapServiceProvider',

The final step is to introduce the required facades. Open `app/config/app.php`, and add the new items to the aliases array.

	'Form'            => 'Collective\Html\FormFacade',
	'HTML'            => 'Collective\Html\HtmlFacade',
	'Bootstrap'       => 'Cornford\Bootstrapper\Facades\Bootstrap',

If you want to introduce the packages JavaScripts and Stylesheets, run the following command to pull them into your project.

	php artisan vendor:publish --provider="Cornford\\Bootstrapper\\BootstrapServiceProvider"

That's it! You're all set to go.

## Usage

In order to include the Bootstrap dependencies you will need to utilise the Bootstrap::css() and Bootstrap:js() methods in the head section of your layout / page template.

It's really as simple as using the Bootstrap class in any Controller / Model / File you see fit with:

`Bootstrap::`

This will give you access to

- [CSS](#css)
- [JS](#js)
- [Vertical](#vertical)
- [Horizontal](#horizontal)
- [Inline](#inline)
- [Text](#text)
- [Password](#password)
- [Telephone](#telephone)
- [Number](#number)
- [Url](#url)
- [Range](#range)
- [Search](#search)
- [File](#file)
- [Date](#date)
- [Datetime](#datetime)
- [Time](#time)
- [Textarea](#textarea)
- [Select](#select)
- [Checkbox](#checkbox)
- [Radio](#radio)
- [Submit](#submit)
- [Button](#button)
- [Reset](#reset)
- [Link](#link)
- [Secure Link](#secure-link)
- [Link Route](#link-route)
- [Link Action](#link-action)
- [Mailto](#mailto)
- [None Alert](#none-alert)
- [Success Alert](#success-alert)
- [Info Alert](#info-alert)
- [Warning Alert](#warning-alert)
- [Danger Alert](#danger-alert)

### CSS

The `css` method includes Bootstrap CSS via either a CDN / Local file, and pass optional attributes.

	Bootstrap::css();
	Bootstrap::css('local', ['type' => 'text/css']);

### JS

The `js` method includes Bootstrap JS via either a CDN / Local file, and pass optional attributes.

	Bootstrap::js();
	Bootstrap::js('local', ['type' => 'text/javascript']);

### Vertical

The `vertical` method allows a form to be set in a vertical manner. This is the default form type.
The vertical method can be chained before any form element is added and will continue for subsequent form elements until overwritten.

	Bootstrap::vertical();
	Bootstrap::vertical()->text('text', 'Text', 'Value');

### Horizontal

The `horizontal` method allows a form to be set in a horizontal manner. This form type accepts both an input class and a label class.
The horizontal method can be chained before any form element is added and will continue for subsequent form elements until overwritten.

	Bootstrap::horizontal('col-sm-10', 'col-sm-2');
	Bootstrap::horizontal('col-sm-10', 'col-sm-2')->text('text', 'Text', 'Value');

### Inline

The `inline` method allows a form to be set in an inline manner. This form type accepts only a label class.
The inline method can be chained before any form element is added and will continue for subsequent form elements until overwritten.

	Bootstrap::inline('sr-only');
	Bootstrap::inline('sr-only')->text('text', 'Text', 'Value');

### Text

The `text` method generates a text field with an optional label, from errors and options.

	Bootstrap::text('text', 'Text', 'Value', $errors);

### Password

The `password` method generates a password field with an optional label, from errors and options.

	Bootstrap::password('password', 'Password');

### Email

The `email` method generates an email field with an optional label, from errors and options.

	Bootstrap::email('email', 'Email address', 'Value');

### Telephone

The `telephone` method generates an tel field with an optional label, from errors and options.

	Bootstrap::telephone('telephone', 'Telephone Number', 'Value', $errors, array('pattern' => '^(?:(?:\(?(?:0(?:0|11)\)?[\s-]?\(?|\+)44\)?[\s-]?(?:\(?0\)?[\s-]?)?)|(?:\(?0))(?:(?:\d{5}\)?[\s-]?\d{4,5})|(?:\d{4}\)?[\s-]?(?:\d{5}|\d{3}[\s-]?\d{3}))|(?:\d{3}\)?[\s-]?\d{3}[\s-]?\d{3,4})|(?:\d{2}\)?[\s-]?\d{4}[\s-]?\d{4}))(?:[\s-]?(?:x|ext\.?|\#)\d{3,4})?$'));

### Number

The `number` method generates an number field with an optional label, from errors and options.

	Bootstrap::number('number', 'Number', 'Value', $errors, array('min' => 1, 'max' => 10, 'step' => 2));

### Url

The `url` method generates an url field with an optional label, from errors and options.

	Bootstrap::url('url', 'URL', 'Value', $errors, array('pattern' => '^(http[s]?:\\/\\/(www\\.)?|ftp:\\/\\/(www\\.)?|www\\.){1}([0-9A-Za-z-\\.@:%_\+~#=]+)+((\\.[a-zA-Z]{2,3})+)(/(.)*)?(\\?(.)*)?'));

### Range

The `range` method generates an number field with an optional label, from errors and options.

	Bootstrap::range('range', 'Range', 'Value', $errors, array('min' => 1, 'max' => 10, 'step' => 2));

### Search

The `search` method generates an search field and icon with an optional label, from errors and options.

	Bootstrap::number('search', 'Search', 'Value');

### File

The `file` method generates a file field with an optional label, from errors and options.

	Bootstrap::file('file', 'File');

### Date

The `date` method generates a date field with a date picker, with an optional label, from errors, input options, and javascript parameters.

	Bootstrap::date('date', 'Date');
	Bootstrap::date('date', 'Date', date('d-m-Y'), $errors, [], ['format' => 'DD-MM-YYYY']);

### Datetime

The `datetime` method generates a date field with a datetime picker, with an optional label, from errors, input options, and javascript parameters.

	Bootstrap::datetime('datetime', 'Date');
	Bootstrap::datetime('datetime', 'Date', date('d-m-Y H:i:s'));

### Time

The `time` method generates a date field with a time picker, with an optional label, from errors, input options, and javascript parameters.

	Bootstrap::time('time', 'Time');
	Bootstrap::time('time', 'Time', date('H:i:s'));

### Textarea

The `textarea` method generates a textarea field with an optional label, from errors and options.

	Bootstrap::textarea('file', 'File', 'Value');

### Select

The `select` method generates a select field with items and an optional label, selected item, from errors and options.

	Bootstrap::select('select', 'Select', ['1' => 'Item 1', '2' => 'Item 2'], 2);

### Checkbox

The `checkbox` method generates a checkbox field with a value and an optional label, checked and options.

	Bootstrap::checkbox('checkbox', 'Checkbox', 1, true);

### Radio

The `radio` method generates a radio field with a value and an optional label, checked and options.

	Bootstrap::checkbox('radio', 'Radio', 1);

### Submit

The `submit` method generates a submit button with a value and optional attributes.

	Bootstrap::submit('Submit');

### Button

The `button` method generates a button with a value and optional attributes.

	Bootstrap::button('Button');

### Reset

The `reset` method generates a reset button with a value and optional attributes.

	Bootstrap::reset('Reset');

### Link

The `link` method generates a link button with a url, title and optional attributes and secure link.

	Bootstrap::link('/', 'Link');

### Secure Link

The `secureLink` method generates a secure link button with a url, title and optional attributes and secure link.

	Bootstrap::secureLink('/', 'Link');

### Link Route

The `linkRoute` method generates a link button with a route, title and optional parameters, attributes.

	Bootstrap::linkRoute('home', 'Home');

### Link Action

The `linkAction` method generates a link button with an action, title and optional parameters, attributes.

	Bootstrap::linkAction('index', 'Home');

### Mailto

The `mailto` method generates a mailto link button with an email address, title and optional attributes.

	Bootstrap::mailto('test@test.com', 'Email');

### None Alert

The `none` method generates a none alert with content with optional emphasis, optionally be dismissible, and optional attributes.

	Bootstrap::none('A message', null, true);

### Success Alert

The `success` method generates a success alert with content with optional emphasis, optionally be dismissible, and optional attributes.

	Bootstrap::success('A success message', 'Well done!', true);

### Info Alert

The `info` method generates an info alert with content with optional emphasis, optionally be dismissible, and optional attributes.

	Bootstrap::info('An info message', 'Heads up!', true);

### Warning Alert

The `warning` method generates a warning alert with content with optional emphasis, optionally be dismissible, and optional attributes.

	Bootstrap::warning('A warning message', 'Warning!', true);

### Danger Alert

The `danger` method generates a danger alert with content with optional emphasis, optionally be dismissible, and optional attributes.

	Bootstrap::danger('A danger message', 'Oh snap!', true);

### License

Bootstrapper is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)