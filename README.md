# Fast Bootstrap intergration with Laravel 4

[![Latest Stable Version](https://poser.pugx.org/cornford/bootstrap/version.png)](https://packagist.org/packages/cornford/alerter)
[![Total Downloads](https://poser.pugx.org/cornford/bootstrap/d/total.png)](https://packagist.org/packages/cornford/alerter)
[![Build Status](https://travis-ci.org/bradcornford/bootstrap.svg?branch=master)](https://travis-ci.org/bradcornford/Alerter)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bradcornford/Bootstrap/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bradcornford/Bootstrap/?branch=master)

Think of Bootstrap as an easy way to integrate Bootstrap with Laravel 4, providing a variety of helpers to speed up development. These include:

- `Bootstrap::css`
- `Bootstrap::js`
- `Bootstrap::token`
- `Bootstrap::text`
- `Bootstrap::password`
- `Bootstrap::email`
- `Bootstrap::file`
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
- `Bootstrap::alertNone`
- `Bootstrap::alertSuccess`
- `Bootstrap::alertInfo`
- `Bootstrap::alertWarning`
- `Bootstrap::alertDanger`

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `cornford/alerter`.

	"require-dev": {
		"cornford/bootstrapper": "1.*"
	}

Next, update Composer from the Terminal:

	composer update --dev

Once this operation completes, the next step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

	'Cornford\Alerter\AlerterServiceProvider'

The final step is to introduce the facade. Open `app/config/app.php`, and add a new item to the aliases array.

	'Bootstrap'            => 'Cornford\Bootstrapper\Facades\Bootstrap',

That's it! You're all set to go.

## Usage

It's really as simple as using the Bootstrap class in any Controller / Model / File you see fit with:

`Bootstrap::`

This will give you access to

- [CSS](#css)
- [JS](#js)
- [Token](#token)
- [Text](#text)
- [Password](#password)
- [Email](#email)
- [File](#file)
- [Textarea](#textarea)
- [Select](#select)
- [Checkbox](#checkbox)
- [Radio](#radio)
- [Submit](#submit)
- [Button](#button)
- [Reset](#reset)
- [Link](#link)
- [Secure Link](#secureLink)
- [Link Route](#linkRoute)
- [Link Action](#linkAction)
- [Mailto](#mailto)
- [Alert None](#alertNone)
- [Alert Success](#alertSuccess)
- [Alert Info](#alertInfo)
- [Alert Warning](#alertWarning)
- [Alert Danger](#alertDanger)

### CSS

The `css` method includes Bootstrap CSS via either a CDN / Local file, and pass optional attributes.

	Bootstrap::css();
	Bootstrap::css('local', ['type' => 'text/css']);

### JS

The `js` method includes Bootstrap JS via either a CDN / Local file, and pass optional attributes.

	Bootstrap::js();
	Bootstrap::js('local', ['type' => 'text/javascript']);

### Token

The `token` method generates a hidden field with the current CSRF token.

	Bootstrap::token();

### Text

The `text` method generates a text field with an optional label, from errors and options.

	Bootstrap::text('text', 'Text', $errors);

### Password

The `password` method generates a password field with an optional label, from errors and options.

	Bootstrap::password('password', 'Password', $errors);

### Email

The `email` method generates an email field with an optional label, from errors and options.

	Bootstrap::email('email', 'Email address', $errors);

### File

The `file` method generates a file field with an optional label, from errors and options.

	Bootstrap::file('file', 'File', $errors);

### Textarea

The `textarea` method generates a textarea field with an optional label, from errors and options.

	Bootstrap::textarea('file', 'File', $errors);

### Select

The `select` method generates a select field with items and an optional label, selected item, from errors and options.

	Bootstrap::select('select', 'Select', ['1' => 'Item 1', '2' => 'Item 2'], 1, $errors);

### Checkbox

The `checkbox` method generates a checkbox field with a value and an optional label, checked and options.

	Bootstrap::checkbox('checkbox', 'Checkbox', 1);

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

### Alert None

The `alertNone` method generates a none alert with content and optionally be dismissible and optional attributes.

	Bootstrap::alertNone('A message', true);

### Alert Success

The `alertSuccess` method generates a success alert with content and optionally be dismissible and optional attributes.

	Bootstrap::alertSuccess('A success message', true);

### Alert Info

The `alertInfo` method generates an info alert with content and optionally be dismissible and optional attributes.

	Bootstrap::alertInfo('An info message', true);

### Alert Warning

The `alertWarning` method generates a warning alert with content and optionally be dismissible and optional attributes.

	Bootstrap::alertWarning('A warning message', true);

### Alert Danger

The `alertDanger` method generates a danger alert with content and optionally be dismissible and optional attributes.

	Bootstrap::alertDanger('A danger message', true);

### License

Bootstrapper is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)