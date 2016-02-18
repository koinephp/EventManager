Koine Event Manager
-----------------

Simple Event Manager
Code information:

[![Build Status](https://travis-ci.org/koinephp/EventManager.png?branch=master)](https://travis-ci.org/koinephp/EventManager)
[![Coverage Status](https://coveralls.io/repos/koinephp/EventManager/badge.png?branch=master)](https://coveralls.io/r/koinephp/EventManager?branch=master)
[![Code Coverage Scrutinizer](https://scrutinizer-ci.com/g/koinephp/EventManager/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/koinephp/EventManager/?branch=master)
[![Code Climate](https://codeclimate.com/github/koinephp/EventManager.png)](https://codeclimate.com/github/koinephp/EventManager)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/koinephp/EventManager/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/koinephp/EventManager/?branch=master)
[![StyleCI](https://styleci.io/repos/52007964/shield)](https://styleci.io/repos/52007964)

Package information:

[![Latest Stable Version](https://poser.pugx.org/koine/event-manager/v/stable.svg)](https://packagist.org/packages/koine/event-manager)
[![Total Downloads](https://poser.pugx.org/koine/event-manager/downloads.svg)](https://packagist.org/packages/koine/event-manager)
[![Latest Unstable Version](https://poser.pugx.org/koine/event-manager/v/unstable.svg)](https://packagist.org/packages/koine/event-manager)
[![License](https://poser.pugx.org/koine/event-manager/license.svg)](https://packagist.org/packages/koine/event-manager)
[![Dependency Status](https://gemnasium.com/koine/event-manager.png)](https://gemnasium.com/koine/event-manager)

## Usage


```php
<?php

use Koine\EventManager\EventManager;

$eventManager = EventManager();

$eventManager->attach('MyApp\DomainEvents\UserRegistered', function ($event) {
    $user = $event->getUser();

    // send welcome email to user
});
```

The event

```php
<?php

namespace MyApp\DomainEvents;

use MyApp\Entity\User;

class UserRegistered implements EventInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
}
```

In the controller, service or anywhere else

```php
<?php

namespace MyApp\Controller;

use MyApp\DomainEvents\UserRegistered;
use MyApp\Entity\User;

class UserRegistration extends BaseController
{
    public function createAction()
    {
        $params = $this->getRequest()->getParams();

        $user = new User($params);

        // logic to create ommited

        $this->getEventManager()->trigger(new UserRegistered($user));

        // redirect or wathever
    }
}
```


### Installing

#### Installing Via Composer
Append the lib to your requirements key in your composer.json.

```javascript
{
    // composer.json
    // [..]
    require: {
        // append this line to your requirements
        "koine/event-manager": "*"
    }
}
```

### Alternative install
- Learn [composer](https://getcomposer.org). You should not be looking for an alternative install. It is worth the time. Trust me ;-)
- Follow [this set of instructions](#installing-via-composer)

### Issues/Features proposals

[Here](https://github.com/koinephp/EventManager/issues) is the issue tracker.

### Lincense
[MIT](MIT-LICENSE)

### Authors

- [Marcelo Jacobus](https://github.com/mjacobus)
