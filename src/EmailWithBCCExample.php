<?php
/**
 * Email with BCC Example
 * 
 * This example demonstrates how to send an email with BCC (Blind Carbon Copy) recipients.
 * BCC recipients receive a copy of the email, but their addresses are hidden from other recipients.
 * 
 * Prerequisites:
 * - Set SENDPOST_SUB_ACCOUNT_API_KEY environment variable
 * - Or update SUB_ACCOUNT_API_KEY constant below
 * 
 * Run: php src/EmailWithBCCExample.php
 */

require_once __DIR__ . '/../vendor/autoload.php';

use sendpost\Configuration;
use sendpost\api\EmailApi;
use sendpost\model\EmailMessageObject;
use sendpost\model\EmailAddress;
use sendpost\model\Recipient;
use sendpost\model\CopyTo;
use sendpost\ApiException;

const BASE_PATH = 'https://api.sendpost.io/api/v1';
$SUB_ACCOUNT_API_KEY = getenv('SENDPOST_SUB_ACCOUNT_API_KEY');

// Update these with your values
const FROM_EMAIL = 'sender@yourdomain.com';
const FROM_NAME = 'Your Company';
const TO_EMAIL = 'recipient@example.com';
const TO_NAME = 'Customer';
const BCC_EMAIL_1 = 'bcc1@example.com';
const BCC_EMAIL_2 = 'bcc2@example.com';

if (empty($SUB_ACCOUNT_API_KEY)) {
    echo "ERROR: SENDPOST_SUB_ACCOUNT_API_KEY environment variable is not set!\n";
    echo "Please set it before running this example:\n";
    echo "  export SENDPOST_SUB_ACCOUNT_API_KEY=your_api_key_here\n";
    exit(1);
}

try {
    // Configure API client
    $config = Configuration::getDefaultConfiguration();
    $config->setHost(BASE_PATH);
    $config->setApiKey('X-SubAccount-ApiKey', $SUB_ACCOUNT_API_KEY);
    
    $emailApi = new EmailApi(null, $config);
    
    // Create email message
    $emailMessage = new EmailMessageObject();
    
    // Set sender
    $from = new EmailAddress();
    $from->setEmail(FROM_EMAIL);
    $from->setName(FROM_NAME);
    $emailMessage->setFrom($from);
    
    // Set primary recipient
    $recipient = new Recipient();
    $recipient->setEmail(TO_EMAIL);
    $recipient->setName(TO_NAME);
    
    // Add BCC recipients to the primary recipient
    // Note: BCC recipients are hidden from other recipients
    $bcc1 = new CopyTo();
    $bcc1->setEmail(BCC_EMAIL_1);
    $bcc2 = new CopyTo();
    $bcc2->setEmail(BCC_EMAIL_2);
    $recipient->setBcc([$bcc1, $bcc2]);
    
    $emailMessage->setTo([$recipient]);
    
    // Set email content
    $emailMessage->setSubject('Email with BCC Recipients');
    $emailMessage->setHtmlBody('<h1>Hello!</h1><p>This email has BCC recipients.</p><p>BCC recipients receive a copy, but their addresses are hidden from other recipients.</p>');
    $emailMessage->setTextBody("Hello!\n\nThis email has BCC recipients.\nBCC recipients receive a copy, but their addresses are hidden from other recipients.");
    
    // Enable tracking
    $emailMessage->setTrackOpens(true);
    $emailMessage->setTrackClicks(true);
    
    echo "Sending email with BCC...\n";
    echo "  From: " . FROM_EMAIL . "\n";
    echo "  To: " . TO_EMAIL . "\n";
    echo "  BCC: " . BCC_EMAIL_1 . ", " . BCC_EMAIL_2 . " (hidden from other recipients)\n";
    echo "  Subject: " . $emailMessage->getSubject() . "\n";
    
    // Send email
    $responses = $emailApi->sendEmail($emailMessage);
    
    if (!empty($responses)) {
        $response = $responses[0];
        echo "\n✓ Email sent successfully!\n";
        echo "  Message ID: " . $response->getMessageId() . "\n";
        echo "  To: " . $response->getTo() . "\n";
    } else {
        echo "\n✗ No response received from API\n";
    }
    
} catch (ApiException $e) {
    echo "\n✗ Failed to send email:\n";
    echo "  Status code: " . $e->getCode() . "\n";
    echo "  Response body: " . $e->getResponseBody() . "\n";
    exit(1);
} catch (Exception $e) {
    echo "\n✗ Unexpected error:\n";
    echo "  " . $e->getMessage() . "\n";
    exit(1);
}

