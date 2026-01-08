# Email Data

EmailBigData.com - Email data and mailing services platform.

## Installation

### Prerequisites
- PHP 7.4+
- MySQL/MariaDB
- Apache/Nginx web server
- Composer (for dependency management)

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/hasanuzzamanpriyam/email_data.git
   cd email_data
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure database connection**
   
   Create configuration files based on examples:
   
   - `admin/assets/php/config.php`
   - `admin/assets/php/data/config.php`
   - `user/php/config.php`
   - `assets/php/config.php`
   - `employee/assets/php/config.php`
   - `employee/assets/php/data/config.php`
   
   Update database credentials:
   ```php
   private $dsn = "mysql:host=localhost; dbname=your_database_name";
   private $dbuser = "your_database_user";
   private $dbpass = "your_database_password";
   ```

4. **Configure Stripe payment**
   
   Create Stripe configuration files:
   - `user/php/stripe/stripe_config.php`
   - `checkout/stripe/stripe_config.php`
   
   Add your Stripe API keys:
   ```php
   $publishable_key = "pk_live_your_publishable_key";
   $secret_key = "sk_live_your_secret_key";
   ```
   
   For testing, use test keys instead of live keys.

5. **Set up the database**
   
   Import your database schema and initial data.

6. **Configure web server**
   
   Point your web server to the project root directory.

## Security Notes

- Never commit sensitive files (API keys, database credentials, etc.) to version control
- The `.gitignore` file prevents sensitive files from being committed
- Use environment-specific configurations for development vs production
- Keep your API keys and credentials secure
- Regularly update dependencies for security patches

## Project Structure

```
email_data/
├── admin/              # Admin panel
├── checkout/           # Checkout and payment processing
├── employee/           # Employee portal
├── user/               # User interface
├── assets/             # Shared assets (CSS, JS, images)
├── indexing/           # Indexing utilities
└── vendor/             # Composer dependencies
```

## Support

For support and inquiries, contact: support@emailbigdata.com

## License

Copyright © 2025 EmailBigData.com. All rights reserved.
