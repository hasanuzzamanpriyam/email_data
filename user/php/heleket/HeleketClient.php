<?php

class HeleketClient
{
    private $merchantId;
    private $apiKey;
    private $apiUrl;

    public function __construct($merchantId, $apiKey, $apiUrl = 'https://api.heleket.com/v1/payment')
    {
        $this->merchantId = $merchantId;
        $this->apiKey = $apiKey;
        $this->apiUrl = $apiUrl;
    }


    public function createInvoice($data)
    {
        $payload = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        // Generate signature: MD5(base64_encode(payload) + apiKey)
        $base64Payload = base64_encode($payload);
        $signature = md5($base64Payload . $this->apiKey);

        // Debug output
        $debugInfo = [
            'payload' => $payload,
            'base64' => $base64Payload,
            'signature' => $signature,
            'merchant_id' => $this->merchantId
        ];

        $ch = curl_init($this->apiUrl);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'merchant: ' . $this->merchantId,
            'sign: ' . $signature,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($curlError) {
            return [
                'success' => false,
                'error' => 'cURL Error: ' . $curlError
            ];
        }

        $decodedResponse = json_decode($response, true);

        if ($httpCode !== 200) {
            return [
                'success' => false,
                'error' => $decodedResponse['message'] ?? 'API Error',
                'code' => $httpCode,
                'response' => $decodedResponse,
                'debug' => $debugInfo
            ];
        }

        return [
            'success' => true,
            'data' => $decodedResponse['result'] ?? $decodedResponse
        ];
    }

    public function verifyWebhookSignature($data, $receivedSign, $apiKey)
    {
        unset($data['sign']);
        $jsonPayload = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $base64Payload = base64_encode($jsonPayload);
        $expectedSign = md5($base64Payload . $apiKey);

        return hash_equals($expectedSign, $receivedSign);
    }
}
