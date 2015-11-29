# Instalation

First, clone the repository `git clone https://github.com/proclamo/twitter-client.git`.

After, run `composer.phar install`.

Copy the configuration file `cp app/config/parameters.yml.dist app/config/parameters.yml` and edit `vim app/config/parameters.yml` 
with apropiate values.

After, run `php app/console server:start`.

# Usage

The application is a standard API REST with an unique entry point at `/tweets/[username][?limit=number_tweets]`. It is designed 
following the DDD architecture.

You can run behat tests executing `bin/behat`.

# DDD configuration

Domain Layer: src\Domain
Application layer: src\Application
Infrastructure layer: src\Infraestructure

Symfony integration: src\TwitterBundle

The Application layer could have been inside the TwitterBundle, but I've prefered to separate the DDD implementation for this layer
and leave Symfony only the responsability of manage the REST layer. The serialization from domain entities to Json string could 
have been better managed by any bundle like [JMSSerializerBundle](https://github.com/schmittjoh/JMSSerializerBundle) but for 
demonstration/learning purposes I've prefered to have framework agnostic classes inside the Application folder.



