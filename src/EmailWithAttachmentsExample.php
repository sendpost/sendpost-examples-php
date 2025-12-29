<?php
/**
 * Email with Attachments Example
 * 
 * This example demonstrates how to send an email with file attachments.
 * Attachments must be Base64 encoded.
 * 
 * Prerequisites:
 * - Set SENDPOST_SUB_ACCOUNT_API_KEY environment variable
 * - Or update SUB_ACCOUNT_API_KEY constant below
 * - Create sample files to attach (or update file paths)
 * 
 * Run: php src/EmailWithAttachmentsExample.php
 */

require_once __DIR__ . '/../vendor/autoload.php';

use sendpost\Configuration;
use sendpost\api\EmailApi;
use sendpost\model\EmailMessageObject;
use sendpost\model\EmailAddress;
use sendpost\model\Recipient;
use sendpost\model\Attachment;
use sendpost\ApiException;

const BASE_PATH = 'https://api.sendpost.io/api/v1';
$SUB_ACCOUNT_API_KEY = getenv('SENDPOST_SUB_ACCOUNT_API_KEY');

// Update these with your values
const FROM_EMAIL = 'sender@yourdomain.com';
const FROM_NAME = 'Your Company';
const TO_EMAIL = 'recipient@example.com';
const TO_NAME = 'Customer';

// Sample file paths - update these or create sample files
$attachment1Path = sys_get_temp_dir() . '/sample_document.txt';
$attachment2Path = sys_get_temp_dir() . '/sample_file.txt';

if (empty($SUB_ACCOUNT_API_KEY)) {
    echo "ERROR: SENDPOST_SUB_ACCOUNT_API_KEY environment variable is not set!\n";
    echo "Please set it before running this example:\n";
    echo "  export SENDPOST_SUB_ACCOUNT_API_KEY=your_api_key_here\n";
    exit(1);
}

/**
 * Creates a sample text file for demonstration
 */
function createSampleFile($filePath, $content) {
    file_put_contents($filePath, $content);
    echo "Created sample file: $filePath\n";
}

/**
 * Encodes a file to Base64 string
 */
function encodeFileToBase64($filePath) {
    $fileContent = file_get_contents($filePath);
    return base64_encode($fileContent);
}

try {
    // Create sample files for demonstration
    $attachment1Content = "This is a sample document.\n\nIt contains some text that can be used for testing email attachments.\nYou can replace this with any file you want to attach.";
    $attachment2Content = "This is another sample file.\n\nIt demonstrates how to attach multiple files to an email.";
    
    createSampleFile($attachment1Path, $attachment1Content);
    createSampleFile($attachment2Path, $attachment2Content);
    
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
    
    // Set recipient
    $recipient = new Recipient();
    $recipient->setEmail(TO_EMAIL);
    $recipient->setName(TO_NAME);
    
    $emailMessage->setTo([$recipient]);
    
    // Set email content
    $emailMessage->setSubject('Email with Attachments');
    $emailMessage->setHtmlBody('<h1>Hello!</h1><p>This email contains file attachments.</p><p>Please check the attachments below.</p>');
    $emailMessage->setTextBody("Hello!\n\nThis email contains file attachments.\nPlease check the attachments below.");
    
    // Create attachments
    $attachments = [];
    
    // Attachment 1: Text file
    $attachment1 = new Attachment();
    $attachment1->setFilename('sample_document.txt');
    $attachment1->setContent(encodeFileToBase64($attachment1Path));
    $attachments[] = $attachment1;
    
    // Attachment 2: Another file
    $attachment2 = new Attachment();
    $attachment2->setFilename('sample_file.txt');
    $attachment2->setContent(encodeFileToBase64($attachment2Path));
    $attachments[] = $attachment2;
    
    $emailMessage->setAttachments($attachments);
    
    // Enable tracking
    $emailMessage->setTrackOpens(true);
    $emailMessage->setTrackClicks(true);
    
    echo "Sending email with attachments...\n";
    echo "  From: " . FROM_EMAIL . "\n";
    echo "  To: " . TO_EMAIL . "\n";
    echo "  Subject: " . $emailMessage->getSubject() . "\n";
    echo "  Attachments: " . count($attachments) . " file(s)\n";
    foreach ($attachments as $att) {
        echo "    - " . $att->getFilename() . "\n";
    }
    
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
    
    // Clean up sample files
    @unlink($attachment1Path);
    @unlink($attachment2Path);
    
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

