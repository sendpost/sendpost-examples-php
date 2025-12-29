<?php
/**
 * Email with CC Example
 * 
 * This example demonstrates how to send an email with CC (Carbon Copy) recipients.
 * 
 * Prerequisites:
 * - Set SENDPOST_SUB_ACCOUNT_API_KEY environment variable
 * - Or update SUB_ACCOUNT_API_KEY constant below
 * 
 * Run: php src/EmailWithCCExample.php
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
const CC_EMAIL_1 = 'cc1@example.com';
const CC_EMAIL_2 = 'cc2@example.com';

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
    
    // Add CC recipients to the primary recipient
    $cc1 = new CopyTo();
    $cc1->setEmail(CC_EMAIL_1);
    $cc2 = new CopyTo();
    $cc2->setEmail(CC_EMAIL_2);
    $recipient->setCc([$cc1, $cc2]);
    
    $emailMessage->setTo([$recipient]);
    
    // Set email content
    $emailMessage->setSubject('Email with CC Recipients');
    $emailMessage->setHtmlBody('<h1>Hello!</h1><p>This email has CC recipients.</p><p>All CC recipients will receive a copy of this email.</p>');
    $emailMessage->setTextBody("Hello!\n\nThis email has CC recipients.\nAll CC recipients will receive a copy of this email.");
    
    // Enable tracking
    $emailMessage->setTrackOpens(true);
    $emailMessage->setTrackClicks(true);
    
    echo "Sending email with CC...\n";
    echo "  From: " . FROM_EMAIL . "\n";
    echo "  To: " . TO_EMAIL . "\n";
    echo "  CC: " . CC_EMAIL_1 . ", " . CC_EMAIL_2 . "\n";
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

