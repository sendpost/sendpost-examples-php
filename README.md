# SendPost PHP SDK Examples

This repository contains simple, practical examples demonstrating how to use the SendPost PHP SDK to send emails with various features.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Examples](#examples)
  - [Basic Email](#basic-email)
  - [Email with CC](#email-with-cc)
  - [Email with BCC](#email-with-bcc)
  - [Email with Attachments](#email-with-attachments)
- [Running Examples](#running-examples)
- [API Documentation](#api-documentation)
- [Support](#support)

## Prerequisites

- PHP 7.4 or higher
- Composer
- A SendPost account with API keys
  - Sub-Account API Key (required for sending emails)
  - Account API Key (required for account-level operations)

## Installation

1. Clone this repository:
```bash
git clone <repository-url>
cd sendpost-examples-php
```

2. Install dependencies:
```bash
composer install
```

## Configuration

### Setting API Keys

You can set your API key in one of two ways:

**Option 1: Environment Variable (Recommended)**
```bash
export SENDPOST_SUB_ACCOUNT_API_KEY=your_sub_account_api_key_here
```

**Option 2: Update Constants in Code**
Edit the example files and update the constant:
```php
$SUB_ACCOUNT_API_KEY = 'your_sub_account_api_key_here';
```

### Updating Email Addresses

Before running the examples, update the email addresses in each example file:

```php
const FROM_EMAIL = 'sender@yourdomain.com';
const FROM_NAME = 'Your Company';
const TO_EMAIL = 'recipient@example.com';
const TO_NAME = 'Customer';
```

**Important:** Make sure your `FROM_EMAIL` domain is verified in your SendPost account.

## Examples

### Basic Email

**File:** `src/BasicEmailExample.php`

This example demonstrates how to send a simple email with HTML and text content.

**Features:**
- Single recipient
- HTML and plain text content
- Open and click tracking

**Run:**
```bash
php src/BasicEmailExample.php
```

### Email with CC

**File:** `src/EmailWithCCExample.php`

This example shows how to send an email with CC (Carbon Copy) recipients. All CC recipients will receive a copy of the email, and their addresses will be visible to all recipients.

**Features:**
- Primary recipient
- Multiple CC recipients
- All recipients can see CC addresses

**Run:**
```bash
php src/EmailWithCCExample.php
```

### Email with BCC

**File:** `src/EmailWithBCCExample.php`

This example demonstrates how to send an email with BCC (Blind Carbon Copy) recipients. BCC recipients receive a copy, but their addresses are hidden from other recipients.

**Features:**
- Primary recipient
- Multiple BCC recipients
- BCC addresses are hidden from other recipients

**Run:**
```bash
php src/EmailWithBCCExample.php
```

### Email with Attachments

**File:** `src/EmailWithAttachmentsExample.php`

This example shows how to send an email with file attachments. Files must be Base64 encoded before attaching.

**Features:**
- Multiple file attachments
- Base64 encoding
- Support for any file type

**Run:**
```bash
php src/EmailWithAttachmentsExample.php
```

**Note:** The example creates sample files automatically. To attach your own files, update the file paths in the code.

## Running Examples

### Using PHP CLI

Simply run the PHP files directly:

```bash
php src/BasicEmailExample.php
php src/EmailWithCCExample.php
php src/EmailWithBCCExample.php
php src/EmailWithAttachmentsExample.php
```

## Code Structure

Each example follows a similar structure:

1. **Configuration**: Set up API client with authentication
2. **Create Email**: Build the email message object
3. **Set Recipients**: Add To, CC, BCC recipients as needed
4. **Set Content**: Add subject, HTML body, and text body
5. **Add Features**: Attachments, tracking, custom headers, etc.
6. **Send**: Call the API to send the email
7. **Handle Response**: Process the response and display results

## Common Patterns

### Adding Multiple Recipients

```php
$recipients = [];

$recipient1 = new Recipient();
$recipient1->setEmail('user1@example.com');
$recipient1->setName('User One');
$recipients[] = $recipient1;

$recipient2 = new Recipient();
$recipient2->setEmail('user2@example.com');
$recipient2->setName('User Two');
$recipients[] = $recipient2;

$emailMessage->setTo($recipients);
```

### Adding CC Recipients

```php
$recipient = new Recipient();
$recipient->setEmail('primary@example.com');
$recipient->setCc(['cc1@example.com', 'cc2@example.com']);
```

### Adding BCC Recipients

```php
$recipient = new Recipient();
$recipient->setEmail('primary@example.com');
$recipient->setBcc(['bcc1@example.com', 'bcc2@example.com']);
```

### Attaching Files

```php
// Read file and encode to Base64
$fileContent = file_get_contents('path/to/file.pdf');
$base64Content = base64_encode($fileContent);

// Create attachment
$attachment = new Attachment();
$attachment->setFilename('document.pdf');
$attachment->setContent($base64Content);

// Add to email
$attachments = [$attachment];
$emailMessage->setAttachments($attachments);
```

## Error Handling

All examples include proper error handling:

```php
try {
    $responses = $emailApi->sendEmail($emailMessage);
    // Handle success
} catch (ApiException $e) {
    echo "API Error:\n";
    echo "  Status code: " . $e->getCode() . "\n";
    echo "  Response body: " . $e->getResponseBody() . "\n";
} catch (Exception $e) {
    echo "Unexpected error:\n";
    echo "  " . $e->getMessage() . "\n";
}
```

## API Documentation

For complete API documentation, visit:
- [SendPost API Documentation](https://docs.sendpost.io)
- [SendPost PHP SDK on Packagist](https://packagist.org/packages/sendpost/sendpost-php-sdk)

## Support

- **Documentation**: [https://docs.sendpost.io](https://docs.sendpost.io)
- **Issues**: Open an issue in this repository
- **Email**: support@sendpost.io

## License

This example project is provided as-is for educational purposes. Please refer to the SendPost Terms of Service for usage guidelines.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

