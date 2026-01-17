<?php

class SecureConfig
{
    private static $config = [];

    public static function init()
    {
        if (empty(self::$config)) {
            self::$config = [
                'stripe' => [
                    'publishable_key' => self::getEnv('STRIPE_PUBLISHABLE_KEY', ''),
                    'secret_key' => self::getEnv('STRIPE_SECRET_KEY', ''),
                ],
                'paypal' => [
                    'email' => self::getEnv('PAYPAL_EMAIL', ''),
                ],
                'email' => [
                    'host' => self::getEnv('SMTP_HOST', ''),
                    'username' => self::getEnv('SMTP_USERNAME', ''),
                    'password' => self::getEnv('SMTP_PASSWORD', ''),
                ],
                'coinpayments' => [
                    'merchant_id' => self::getEnv('COINPAYMENTS_MERCHANT_ID', ''),
                    'ipn_secret' => self::getEnv('COINPAYMENTS_IPN_SECRET', ''),
                ],
            ];
        }
    }

    private static function getEnv($key, $default = '')
    {
        if (file_exists(__DIR__ . '/.env')) {
            $env = parse_ini_file(__DIR__ . '/.env');
            return isset($env[$key]) ? trim($env[$key]) : $default;
        }
        return getenv($key) ?: $default;
    }

    public static function get($key)
    {
        self::init();
        $keys = explode('.', $key);
        $value = self::$config;

        foreach ($keys as $k) {
            if (isset($value[$k])) {
                $value = $value[$k];
            } else {
                return null;
            }
        }

        return $value;
    }

    public static function stripePublishableKey()
    {
        return self::get('stripe.publishable_key');
    }

    public static function stripeSecretKey()
    {
        return self::get('stripe.secret_key');
    }

    public static function paypalEmail()
    {
        return self::get('paypal.email');
    }

    public static function smtpHost()
    {
        return self::get('email.host');
    }

    public static function smtpUsername()
    {
        return self::get('email.username');
    }

    public static function smtpPassword()
    {
        return self::get('email.password');
    }

    public static function coinpaymentsMerchantId()
    {
        return self::get('coinpayments.merchant_id');
    }

    public static function coinpaymentsIpnSecret()
    {
        return self::get('coinpayments.ipn_secret');
    }
}
