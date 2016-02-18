Koine Event Manager
-----------------

Simple Event Manager

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
