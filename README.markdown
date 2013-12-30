MatrunchykBitcoindBundle
====================

Used for symfony2 projects that want to use a bitcoind server.

# Requirements

* [bitcoind](https://en.bitcoin.it/wiki/Bitcoind)
* [matrunchyk/bitcoind-php](https://github.com/matrunchyk/bitcoind-php) (Included in this packages `composer.json` file)

# Installation

Edit your `composer.json` file and add:


    "require": {
        "matrunchyk/bitcoindbundle": ">=2.1"
    }

Next you will need to add it in your `app/AppKernel.php` file.

    // app/AppKernel.php
    public function registerBundles()
    {   
        $bundles = array(
            // ...
            new Matrunchyk\Bundle\BitcoindBundle\BitcoindBundle(),
            // ...
        );  

        return $bundles;
    }

Next up is the configuration part. Edit `app/config/config.yml`.

    bitcoind:             
        schema:               http
        username:             ~
        password:             ~
        host:                 127.0.0.1
        port:                 8332

Make sure your server is up and running and it should all just work.

I've included some doctrine things that I have used that have been very helpful.
You will need to update your database if you want to use the wallet manager.

    php app/console doctrine:schema:update --force

# Configuration

Configuring this bundle is pretty straight forward and is outlined in the installation
instructions. This section will show how I suggest you setup your configuration.

    # app/config/parameters.dist.yml
    # File is included in your repository
    parameters:
        bitcoind_schema:   http
        bitcoind_username: ~
        bitcoind_password: ~
        bitcoind_host:     localhost
        bitcoind_port:     8332

This is the same setup as your `parameters.yml` file. However you should have this
file ignored.

    # app/config/config.yml
    bitcoind:             
        schema:   %bitcoind_schema%
        username: %bitcoind_username%
        password: %bitcoind_password%
        host:     %bitcoind_host%
        port:     %bitcoind_port%

That's it. Your `parameters.yml` file will have the information about your server.

# Usage

You now have access to a bitcoind service.

    // In a controller
    $bitcoind = $this->get('bitcoind');

For more information on how to use the bitcoind wrapper see the [matrunchyk/bitcoind-php](https://github.com/matrunchyk/bitcoind-php)
project.

# Wallet Manager

This bundle comes with a wallet manager that you can use for created new addresses, payments,
and managing many other things related to bitcoin.

    $manager = $this->container->get('manager.bitcoin_wallet');

@TODO More documentation about using the wallet manager

# License

Copyright (C) 2013 Joshua Estes

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

