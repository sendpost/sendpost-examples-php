# SendPost PHP SDK

The official PHP SDK for SendPost - a powerful email API service for sending transactional and marketing emails with advanced tracking and analytics.

[![Packagist](https://img.shields.io/packagist/v/sendpost/sendpost-php-sdk)](https://packagist.org/packages/sendpost/sendpost-php-sdk)
[![Packagist](https://img.shields.io/packagist/dt/sendpost/sendpost-php-sdk)](https://packagist.org/packages/sendpost/sendpost-php-sdk)

## What is SendPost?

SendPost is an email delivery service that helps you:
- Send personalized emails to multiple recipients
- Track email opens and link clicks
- Monitor email performance (delivery rates, bounces, spam complaints)
- Manage sending domains and IP addresses
- Organize email sending with sub-accounts

## Requirements

- PHP 8.1 or higher
- Composer (for installation)
- cURL extension
- JSON extension
- mbstring extension

## Installation

The SendPost PHP SDK is available on [Packagist](https://packagist.org/packages/sendpost/sendpost-php-sdk), making installation quick and easy.

### Method 1: Install via Composer (Recommended)

Composer is the recommended way to install the SendPost PHP SDK.

#### Step 1: Install Composer

If you don't have Composer installed, download it from [getcomposer.org](https://getcomposer.org/download/).

#### Step 2: Install the SDK

Run the following command in your project directory:

```bash
composer require sendpost/sendpost-php-sdk
```

This will automatically download the SendPost PHP SDK and all its dependencies from [Packagist](https://packagist.org/packages/sendpost/sendpost-php-sdk).

#### Step 3: Include the autoloader

In your PHP file, include the Composer autoloader:

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
```

That's it! You're ready to use the SDK.

### Method 2: Install from GitHub Repository

If you need to install directly from the GitHub repository (for example, to use a specific branch or version):

Create or edit your `composer.json` file and add the SendPost SDK repository:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/sendpost/sendpost-php-sdk.git"
    }
  ],
  "require": {
    "sendpost/sendpost-php-sdk": "*@dev"
  }
}
```

Then run:

```bash
composer install
```

### Method 3: Manual Installation

If you prefer not to use Composer:

1. Download the SDK files from the repository
2. Place them in your project directory
3. Include the autoloader:

```php
<?php
require_once '/path/to/sendpost-php-sdk/vendor/autoload.php';
```

**Note:** Manual installation requires you to manage dependencies yourself. We strongly recommend using Composer.

## Quick Start

Here's a simple example to send your first email:

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use sendpost\Configuration;
use sendpost\api\EmailApi;
use sendpost\model\EmailMessageObject;
use sendpost\model\EmailAddress;
use sendpost\model\Recipient;

// Configure your API key
$config = Configuration::getDefaultConfiguration();
$config->setApiKey('X-SubAccount-ApiKey', 'YOUR_API_KEY_HERE');

// Create the email API client
$emailApi = new EmailApi(null, $config);

// Build your email message
$emailMessage = new EmailMessageObject();

// Set the sender
$from = new EmailAddress();
$from->setEmail('sender@yourdomain.com');
$from->setName('Your Name');
$emailMessage->setFrom($from);

// Set the recipient
$recipient = new Recipient();
$recipient->setEmail('recipient@example.com');
$recipient->setName('Recipient Name');
$emailMessage->setTo([$recipient]);

// Set email content
$emailMessage->setSubject('Hello from SendPost!');
$emailMessage->setHtmlBody('<h1>Welcome!</h1><p>This is your first email sent with SendPost.</p>');
$emailMessage->setTextBody('Welcome! This is your first email sent with SendPost.');

// Enable tracking
$emailMessage->setTrackOpens(true);
$emailMessage->setTrackClicks(true);

// Send the email
try {
    $responses = $emailApi->sendEmail($emailMessage);
    
    if (!empty($responses)) {
        $response = $responses[0];
        echo "Email sent successfully! Message ID: " . $response->getMessageId() . "\n";
    }
} catch (Exception $e) {
    echo "Error sending email: " . $e->getMessage() . "\n";
}
```

## Getting Your API Key

Before you can send emails, you need an API key:

1. Sign up for a SendPost account at [app.sendpost.io/register](https://app.sendpost.io/register)
2. Log in to your account
3. Navigate to the API Keys section
4. Copy your Sub-Account API Key

**Important:** Keep your API key secure and never commit it to version control. Use environment variables or a configuration file that's excluded from git.

## Common Use Cases

### Sending a Transactional Email

Transactional emails are triggered by user actions (order confirmations, password resets, etc.):

```php
use sendpost\api\EmailApi;
use sendpost\model\EmailMessageObject;
use sendpost\model\EmailAddress;
use sendpost\model\Recipient;

$emailApi = new EmailApi(null, $config);

$emailMessage = new EmailMessageObject();

// Set sender
$from = new EmailAddress();
$from->setEmail('orders@yourdomain.com');
$from->setName('Your Store');
$emailMessage->setFrom($from);

// Set recipient
$recipient = new Recipient();
$recipient->setEmail('customer@example.com');
$recipient->setName('John Doe');

// Add custom data for personalization
$recipient->setCustomFields([
    'order_id' => '12345',
    'order_total' => '99.99'
]);
$emailMessage->setTo([$recipient]);

// Set content
$emailMessage->setSubject('Order Confirmation #12345');
$emailMessage->setHtmlBody('<h1>Thank you for your order!</h1><p>Order #12345 has been confirmed.</p>');

// Enable tracking
$emailMessage->setTrackOpens(true);
$emailMessage->setTrackClicks(true);

// Send
$responses = $emailApi->sendEmail($emailMessage);
```

### Sending a Marketing Email

Marketing emails are sent to multiple recipients for campaigns and newsletters:

```php
$emailMessage = new EmailMessageObject();

$from = new EmailAddress();
$from->setEmail('marketing@yourdomain.com');
$from->setName('Marketing Team');
$emailMessage->setFrom($from);

// Add multiple recipients
$recipients = [
    (new Recipient())->setEmail('customer1@example.com')->setName('Customer 1'),
    (new Recipient())->setEmail('customer2@example.com')->setName('Customer 2'),
];
$emailMessage->setTo($recipients);

$emailMessage->setSubject('Special Offer - 20% Off!');
$emailMessage->setHtmlBody('<h1>Special Offer!</h1><p>Get 20% off with code SAVE20</p>');

// Add groups for analytics
$emailMessage->setGroups(['marketing', 'promotional']);

$responses = $emailApi->sendEmail($emailMessage);
```

### Adding a Sending Domain

Before sending emails, you need to add and verify your sending domain:

```php
use sendpost\api\DomainApi;
use sendpost\model\CreateDomainRequest;

$domainApi = new DomainApi(null, $config);

$domainRequest = new CreateDomainRequest();
$domainRequest->setName('yourdomain.com');

try {
    $domain = $domainApi->subaccountDomainPost($domainRequest);
    
    echo "Domain added! ID: " . $domain->getId() . "\n";
    echo "Verification status: " . ($domain->getVerified() ? 'Verified' : 'Pending') . "\n";
    
    if (!$domain->getVerified()) {
        echo "Add these DNS records to verify your domain:\n";
        if ($domain->getDkim() !== null) {
            echo "DKIM: " . $domain->getDkim()->getTextValue() . "\n";
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
```

### Getting Email Statistics

Monitor your email performance:

```php
use sendpost\api\StatsApi;

$statsApi = new StatsApi(null, $config);

// Get stats for the last 7 days
$toDate = new \DateTime();
$fromDate = (clone $toDate)->modify('-7 days');

$stats = $statsApi->accountSubaccountStatSubaccountIdGet(
    $fromDate->format('Y-m-d'),
    $toDate->format('Y-m-d'),
    $subAccountId  // Your sub-account ID
);

foreach ($stats as $stat) {
    echo "Date: " . $stat->getDate() . "\n";
    $statData = $stat->getStats();
    echo "  Processed: " . $statData->getProcessed() . "\n";
    echo "  Delivered: " . $statData->getDelivered() . "\n";
    echo "  Opens: " . $statData->getOpened() . "\n";
    echo "  Clicks: " . $statData->getClicked() . "\n";
}
```

## Authentication

SendPost uses API keys for authentication. There are two types of API keys:

### Sub-Account API Key (`X-SubAccount-ApiKey`)

Used for most common operations:
- Sending emails
- Managing domains
- Viewing statistics
- Managing suppressions

```php
$config->setApiKey('X-SubAccount-ApiKey', 'YOUR_SUB_ACCOUNT_API_KEY');
```

### Account API Key (`X-Account-ApiKey`)

Used for account-level operations:
- Creating and managing sub-accounts
- Managing IP addresses
- Creating webhooks
- Account-wide statistics

```php
$config->setApiKey('X-Account-ApiKey', 'YOUR_ACCOUNT_API_KEY');
```

**Which key do I need?**

- For sending emails and basic operations: Use your **Sub-Account API Key**
- For managing your account settings: Use your **Account API Key**

You can find both keys in your SendPost dashboard under API Keys.

## Error Handling

Always wrap API calls in try-catch blocks:

```php
try {
    $responses = $emailApi->sendEmail($emailMessage);
    // Success!
} catch (\sendpost\ApiException $e) {
    // API-specific error
    echo "Status Code: " . $e->getCode() . "\n";
    echo "Error Message: " . $e->getMessage() . "\n";
    echo "Response Body: " . $e->getResponseBody() . "\n";
} catch (Exception $e) {
    // Other errors
    echo "Error: " . $e->getMessage() . "\n";
}
```

Common error codes:
- `401` - Invalid or missing API key
- `403` - Resource already exists or insufficient permissions
- `404` - Resource not found
- `422` - Invalid request data
- `500` - Server error

## Available API Classes

The SDK provides classes for different operations:

- `EmailApi` - Send emails
- `DomainApi` - Manage sending domains
- `StatsApi` - Get email statistics
- `SubAccountApi` - Manage sub-accounts
- `SuppressionApi` - Manage suppression lists
- `WebhookApi` - Manage webhooks
- `MessageApi` - Retrieve message details
- `IPApi` - Manage IP addresses
- `IPPoolsApi` - Manage IP pools

## Complete Example

See the [example project](https://github.com/sendpost/php-esp-example) for a complete working example that demonstrates:
- Creating sub-accounts
- Setting up webhooks
- Adding domains
- Sending emails
- Retrieving statistics
- Managing IP pools

## API Documentation

For detailed API documentation, see:
- [Full API Reference](docs/)
- [SendPost API Documentation](https://docs.sendpost.io)
- [Postman Collection](https://god.gw.postman.com/run-collection/33476323-e6dbd27f-c4a7-4d49-bcac-94b0611b938b)

## Testing

Run the test suite:

```bash
composer install
vendor/bin/phpunit
```

## Support

Need help?

- **Email:** hello@sendpost.io
- **Documentation:** https://docs.sendpost.io
- **Website:** https://sendpost.io
- **Dashboard:** https://app.sendpost.io
- **Packagist:** https://packagist.org/packages/sendpost/sendpost-php-sdk

## License

This SDK is open source. See the LICENSE file for details.

## Version

- **SDK Version:** 1.0.0
- **API Version:** 1.0.0
- **PHP Version:** 8.1+
