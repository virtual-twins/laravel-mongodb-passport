<?php

namespace VirtualTwins\Mongodb;

use Illuminate\Support\ServiceProvider;
use VirtualTwins\Mongodb\Passport\AuthCode;
use VirtualTwins\Mongodb\Passport\Bridge\RefreshTokenRepository;
use VirtualTwins\Mongodb\Passport\Client;
use VirtualTwins\Mongodb\Passport\PersonalAccessClient;
use VirtualTwins\Mongodb\Passport\RefreshToken;
use VirtualTwins\Mongodb\Passport\Token;
use Laravel\Passport\Bridge\RefreshTokenRepository as PassportRefreshTokenRepository;
use Laravel\Passport\Passport;

class MongodbPassportServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        if (class_exists('Illuminate\Foundation\AliasLoader')) {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Laravel\Passport\AuthCode', AuthCode::class);
            $loader->alias('Laravel\Passport\Client', Client::class);
            $loader->alias('Laravel\Passport\PersonalAccessClient', PersonalAccessClient::class);
            $loader->alias('Laravel\Passport\Token', Token::class);
        } else {
            class_alias('Laravel\Passport\AuthCode', AuthCode::class);
            class_alias('Laravel\Passport\Client', Client::class);
            class_alias('Laravel\Passport\PersonalAccessClient', PersonalAccessClient::class);
            class_alias('Laravel\Passport\Token', Token::class);
        }
    }
}
