# Heleket Payment Integration for Mailerstation

This integration adds Heleket cryptocurrency payment gateway to the Mailerstation checkout system.

## Features
- Accept payments via Bitcoin, Ethereum, USDT, and other cryptocurrencies
- Automatic conversion to USDT (configurable)
- Webhook-based payment status updates
- Secure signature verification for webhook callbacks

## Installation

### 1. Database Migration
Run the SQL migration to add Heleket fields to the order_info table:
```bash
mysql -u your_user -p emailbigdata_com < migrations/add_heleket_fields.sql
```

### 2. Configuration
Copy `.env.example` to `.env` and add your Heleket credentials:
```env
HELEKET_MERCHANT_ID=294ca9a3-5008-4583-96ed-cc6330f9a4c1
HELEKET_PAYMENT_API_KEY=your_actual_api_key_here
```

### 3. File Structure
```
checkout/
├── heleket/
│   ├── heleket_config.php    # Configuration constants
│   ├── HeleketClient.php      # API client class
│   └── webhook.php              # Webhook handler
├── images/
│   └── heleket.svg             # Heleket logo
└── payment.php                    # Modified to handle Heleket
```

## Usage

### Creating a Payment
When user selects "Heleket" as payment method:
1. `checkout/step3.php` redirects to `checkout/payment.php`
2. `payment.php` creates invoice via Heleket API
3. User is redirected to Heleket payment page
4. Webhook receives payment status update

### Webhook
URL: `https://yourdomain.com/checkout/heleket/webhook`

The webhook handler:
- Verifies MD5 signature of incoming requests
- Updates order status based on payment status
- Logs all webhook events to `heleket_webhook.log`

### Payment Status Mapping
| Heleket Status | Order Status |
|----------------|--------------|
| paid | Paid |
| paid_over | Paid |
| confirm_check | Processing |
| fail | Failed |
| wrong_amount | Failed |
| cancel | Cancelled |
| system_fail | Failed |
| refund_process | Refunding |
| refund_fail | Refund Failed |
| refund_paid | Refunded |

## Security
- Webhook signature verification using MD5 hash
- IP whitelist (recommended): Allow `31.133.220.8`
- API keys stored in server configuration only

## Testing
1. Create a test order
2. Select Heleket as payment method
3. You'll be redirected to Heleket payment page
4. Use Heleket dashboard to simulate payment status changes
5. Check `heleket_webhook.log` for webhook activity

## Support
- Heleket Documentation: https://doc.heleket.com
- Heleket Support: https://heleket.com/contacts
