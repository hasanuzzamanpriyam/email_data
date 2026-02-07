<?php

// const HELEKET_PAYMENT_API_KEY = 'uQ4LFWCBE3dT84uQnt7ycL7p9WcSwjkSPQaZbik3ChoWO0egw51f4EAaZQKmefhPP0F1cX8OpRcl2c3HexNedoR7FGEYGA1mTgMPI8lzKl7Ct2I43R6SSC3gVDS3rkGX';
// const HELEKET_MERCHANT_ID = '294ca9a3-5008-4583-96ed-cc6330f9a4c1';
// const HELEKET_API_URL = 'https://api.heleket.com/v1/payment';



const HELEKET_MERCHANT_ID = '294ca9a3-5008-4583-96ed-cc6330f9a4c1';
const HELEKET_PAYMENT_API_KEY = 'VHufvEcG6KHa39JpyfN4emBrYB5uBuvZKd8R1IN48uN0jBwB4DHRcgdALurPzMxPWaSj9oaT07Pi5vEynoEilcV1A2vouuixUz5xTbaMHSEvhWFdTHdsVlFMufMo6WKe';
const HELEKET_API_URL = 'https://api.heleket.com/v1/payment';
$siteUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
if (substr($siteUrl, -1) !== '/') {
    $siteUrl .= '/';
}
$HELEKET_CALLBACK_URL = $siteUrl . 'checkout/heleket/webhook';
$HELEKET_SUCCESS_URL = $siteUrl . 'success';
$HELEKET_CANCEL_URL = $siteUrl . 'cancel';
