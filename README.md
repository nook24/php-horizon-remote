# php-horizon-remote

This is a small php class, to send remote commands to the set-top box Horizon which is used by some german
cable providers, may be also known as Samsung `SMT C7400` and `SMT C7401`

This class is not for IR commands, it uses the network interface of the Horizon box.

Many thanks to [OrangeTux](https://github.com/OrangeTux) for his work on [einder](https://github.com/OrangeTux/einder). This is just a shameless PHP rip off.

https://github.com/OrangeTux/einder is a Python implementation of [kuijp](https://github.com/kuijp) work on [horizoncontrol](https://github.com/kuijp/horizoncontrol) which is a Java implementation.

Thanks to all of you!

## Installation
````
git clone https://github.com/nook24/php-horizon-remote.git
````

## Usage
````php
<?php

require 'Connection.php';
require 'Keys.php';

use nook24\Horizon\Connection;
use nook24\Horizon\Keys;

//Set the IP Address of your Horizon Box!
$Connection = new Connection('192.168.1.232', 5900);
$Keys = new Keys();

$Connection->connect();

//CH +
$Connection->sendKey($Keys->chanUp());

sleep(5);

//CH -
$Connection->sendKey($Keys->chanDown());

sleep(5);

// Go to program number 5
$Connection->sendKey($Keys->number5());

sleep(5);

// Go to program number 201
$Connection->sendKey($Keys->number2());
$Connection->sendKey($Keys->number0());
$Connection->sendKey($Keys->number1());

sleep(5);

//Show information about current show
$Connection->sendKey($Keys->showInfo());

sleep(5);

//Close information
$Connection->sendKey($Keys->back());

$Connection->disconnect();
````

You can find all Keys in the file [Keys.php](https://github.com/nook24/php-horizon-remote/blob/master/Keys.php)

# License
MIT License
