<?php
/**
 * Message
 *
 * PHP version 8.1
 *
 * @category Class
 * @package  sendpost
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * SendPost API
 *
 * # Introduction  SendPost provides email API and SMTP relay which can be used not just to send & measure but also alert & optimised email sending.  You can use SendPost to:  * Send personalised emails to multiple recipients using email API   * Track opens and clicks  * Analyse statistics around open, clicks, bounce, unsubscribe and spam    At and advanced level you can use it to:  * Manage multiple sub-accounts which may map to your promotional or transactional sending, multiple product lines or multiple customers   * Classify your emails using groups for better analysis  * Analyse and fix email sending at sub-account level, IP Pool level or group level  * Have automated alerts to notify disruptions regarding email sending  * Manage different dedicated IP Pools so to better control your email sending  * Automatically know when IP or domain is blacklisted or sender score is down  * Leverage pro deliverability tools to get significantly better email deliverability & inboxing   [<img src=\"https://run.pstmn.io/button.svg\" alt=\"Run In Postman\" style=\"width: 128px; height: 32px;\">](https://god.gw.postman.com/run-collection/33476323-e6dbd27f-c4a7-4d49-bcac-94b0611b938b?action=collection%2Ffork&source=rip_markdown&collection-url=entityId%3D33476323-e6dbd27f-c4a7-4d49-bcac-94b0611b938b%26entityType%3Dcollection%26workspaceId%3D6b1e4f65-96a9-4136-9512-6266c852517e)   # Overview  ## REST API  SendPost API is built on REST API principles. Authenticated users can interact with any of the API endpoints to perform:  * **GET**- to get a resource  * **POST** - to create a resource  * **PUT** - to update an existing resource  * **DELETE** - to delete a resource   The API endpoint for all API calls is: <code>https://api.sendpost.io/api/v1</code>   Some conventions that have been followed in the API design overall are following:   * All resources have either <code>/api/v1/subaccount</code> or <code>/api/v1/account</code> in their API call resource path based on who is authorised for the resource. All API calls with path <code>/api/v1/subaccount</code> use <code>X-SubAccount-ApiKey</code> in their request header. Likewise all API calls with path <code>/api/v1/account</code> use <code>X-Account-ApiKey</code> in their request header.  * All resource endpoints end with singular name and not plural. So we have <code>domain</code> instead of domains for domain resource endpoint. Likewise we have <code>sender</code> instead of senders for sender resource endpoint.  * Body submitted for POST / PUT API calls as well as JSON response from SendPost API follow camelcase convention  * All timestamps returned in response (created or submittedAt response fields) are UNIX nano epoch timestamp.   <aside class=\"success\"> All resources have either <code>/api/v1/subaccount</code> or <code>/api/v1/account</code> in their API call resource path based on who is authorised for the resource. All API calls with path <code>/api/v1/subaccount</code> use <code>X-SubAccount-ApiKey</code> in their request header. Likewise all API calls with path <code>/api/v1/account</code> use <code>X-Account-ApiKey</code> in their request header. </aside>   SendPost uses conventional HTTP response codes to indicate the success or failure of an API request.    * Codes in the <code>2xx</code> range indicate success.   * Codes in the <code>4xx</code> range indicate an error owing due to unauthorize access, incorrect request parameters or body etc.  * Code in the <code>5xx</code> range indicate an eror with SendPost's servers ( internal service issue or maintenance )   <aside class=\"info\"> SendPost all responses return <code>created</code> in UNIX nano epoch timestamp.  </aside>   ## Authentication  SendPost uses API keys for authentication. You can register a new SendPost API key at our [developer portal](https://app.sendpost.io/register).   SendPost expects the API key to be included in all API requests to the server in a header that looks like the following:   `X-SubAccount-ApiKey: AHEZEP8192SEGH`   This API key is used for all Sub-Account level operations such as:  * Sending emails  * Retrieving stats regarding open, click, bounce, unsubscribe and spam  * Uploading suppressions list  * Verifying sending domains and more  In addition to <code>X-SubAccount-ApiKey</code> you also have another API Key <code>X-Account-APIKey</code> which is used for Account level operations such as :  * Creating and managing sub-accounts  * Allocating IPs for your account  * Getting overall billing and usage information  * Email List validation  * Creating and managing alerts and more   <aside class=\"notice\"> You must look at individual API reference page to look at whether <code>X-SubAccount-ApiKey</code> is required or <code>X-Account-ApiKey</code> </aside>   In case an incorrect API Key header is specified or if it is missed you will get HTTP Response 401 ( Unauthorized ) response from SendPost.   ## HTTP Response Headers   Code           | Reason                 | Details ---------------| -----------------------| ----------- 200            | Success                | Everything went well 401            | Unauthorized           | Incorrect or missing API header either <code>X-SubAccount-ApiKey</code> or <code>X-Account-ApiKey</code> 403            | Forbidden              | Typically sent when resource with same name or details already exist 406            | Missing resource id    | Resource id specified is either missing or doesn't exist 422            | Unprocessable entity   | Request body is not in proper format 500            | Internal server error  | Some error happened at SendPost while processing API request 503            | Service Unavailable    | SendPost is offline for maintenance. Please try again later  # API SDKs  We have native SendPost SDKs in the following programming languages. You can integrate with them or create your own SDK with our API specification. In case you need any assistance with respect to API then do reachout to our team from website chat or email us at **hello@sendpost.io**   * [PHP](https://github.com/sendpost/sendpost_php_sdk)  * [Javascript](https://github.com/sendpost/sendpost_javascript_sdk)  * [Ruby](https://github.com/sendpost/sendpost_ruby_sdk)  * [Python](https://github.com/sendpost/sendpost_python_sdk)  * [Golang](https://github.com/sendpost/sendpost_go_sdk)   # API Reference  SendX REST API can be broken down into two major sub-sections:   * Sub-Account  * Account    Sub-Account API operations enable common email sending API use-cases like sending bulk email, adding new domains or senders for email sending programmatically, retrieving stats, adding suppressions etc. All Sub-Account API operations need to pass <code>X-SubAccount-ApiKey</code> header with every API call.   The Account API operations allow users to manage multiple sub-accounts and manage IPs. A single parent SendPost account can have 100's of sub-accounts. You may want to create sub-accounts for different products your company is running or to segregate types of emails or for managing email sending across multiple customers of yours.   # SMTP Reference  Simple Mail Transfer Protocol (SMTP) is a quick and easy way to send email from one server to another. SendPost provides an SMTP service that allows you to deliver your email via our servers instead of your own client or server.  This means you can count on SendPost's delivery at scale for your SMTP needs.    ## Integrating SMTP    1. Get the SMTP `username` and `password` from your SendPost account.  2. Set the server host in your email client or application to `smtp.sendpost.io`. This setting is sometimes referred to as the external SMTP server or the SMTP relay.  3. Set the `username` and `password`.  4. Set the port to `587` (or as specified below).  ## SMTP Ports   - For an unencrypted or a TLS connection, use port `25`, `2525` or `587`.  - For a SSL connection, use port `465`  - Check your firewall and network to ensure they're not blocking any of our SMTP Endpoints.   SendPost supports STARTTLS for establishing a TLS-encrypted connection. STARTTLS is a means of upgrading an unencrypted connection to an encrypted connection. There are versions of STARTTLS for a variety of protocols; the SMTP version is defined in [RFC 3207](https://www.ietf.org/rfc/rfc3207.txt).   To set up a STARTTLS connection, the SMTP client connects to the SendPost SMTP endpoint `smtp.sendpost.io` on port 25, 587, or 2525, issues an EHLO command, and waits for the server to announce that it supports the STARTTLS SMTP extension. The client then issues the STARTTLS command, initiating TLS negotiation. When negotiation is complete, the client issues an EHLO command over the new encrypted connection, and the SMTP session proceeds normally.   <aside class=\"success\"> If you are unsure which port to use, a TLS connection on port 587 is typically recommended. </aside>   ## Sending email from your application   ```javascript \"use strict\";  const nodemailer = require(\"nodemailer\");  async function main() { // create reusable transporter object using the default SMTP transport let transporter = nodemailer.createTransport({ host: \"smtp.sendpost.io\", port: 587, secure: false, // true for 465, false for other ports auth: { user:  \"<username>\" , // generated ethereal user pass: \"<password>\", // generated ethereal password }, requireTLS: true, debug: true, logger: true, });  // send mail with defined transport object try { let info = await transporter.sendMail({ from: 'erlich@piedpiper.com', to: 'gilfoyle@piedpiper.com', subject: 'Test Email Subject', html: '<h1>Hello Geeks!!!</h1>', }); console.log(\"Message sent: %s\", info.messageId); } catch (e) { console.log(e) } }  main().catch(console.error); ```  For PHP   ```php <?php // Import PHPMailer classes into the global namespace use PHPMailer\\PHPMailer\\PHPMailer; use PHPMailer\\PHPMailer\\SMTP; use PHPMailer\\PHPMailer\\Exception;  // Load Composer's autoloader require 'vendor/autoload.php';  $mail = new PHPMailer(true);  // Settings try { $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;                  // Enable verbose debug output $mail->isSMTP();                                            // Send using SMTP $mail->Host       = 'smtp.sendpost.io';                     // Set the SMTP server to send through $mail->SMTPAuth   = true;                                   // Enable SMTP authentication $mail->Username   = '<username>';                           // SMTP username $mail->Password   = '<password>';                           // SMTP password $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable implicit TLS encryption $mail->Port       = 587;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`  //Recipients $mail->setFrom('erlich@piedpiper.com', 'Erlich'); $mail->addAddress('gilfoyle@piedpiper.com', 'Gilfoyle');  //Content $mail->isHTML(true);                                  //Set email format to HTML $mail->Subject = 'Here is the subject'; $mail->Body    = 'This is the HTML message body <b>in bold!</b>'; $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';  $mail->send(); echo 'Message has been sent';  } catch (Exception $e) { echo \"Message could not be sent. Mailer Error: {$mail->ErrorInfo}\"; } ``` For Python ```python #!/usr/bin/python3  import sys import os import re  from smtplib import SMTP import ssl  from email.mime.text import MIMEText  SMTPserver = 'smtp.sendpost.io' PORT = 587 sender =     'erlich@piedpiper.com' destination = ['gilfoyle@piedpiper.com']  USERNAME = \"<username>\" PASSWORD = \"<password>\"  # typical values for text_subtype are plain, html, xml text_subtype = 'plain'  content=\"\"\"\\ Test message \"\"\"  subject=\"Sent from Python\"  try: msg = MIMEText(content, text_subtype) msg['Subject']= subject msg['From']   = sender  conn = SMTP(SMTPserver, PORT) conn.ehlo() context = ssl.create_default_context() conn.starttls(context=context)  # upgrade to tls conn.ehlo() conn.set_debuglevel(True) conn.login(USERNAME, PASSWORD)  try: resp = conn.sendmail(sender, destination, msg.as_string()) print(\"Send Mail Response: \", resp) except Exception as e: print(\"Send Email Error: \", e) finally: conn.quit()  except Exception as e: print(\"Error:\", e) ``` For Golang ```go package main  import ( \"fmt\" \"net/smtp\" \"os\" )  // Sending Email Using Smtp in Golang  func main() {  username := \"<username>\" password := \"<password>\"  from := \"erlich@piedpiper.com\" toList := []string{\"gilfoyle@piedpiper.com\"} host := \"smtp.sendpost.io\" port := \"587\" // recommended  // This is the message to send in the mail msg := \"Hello geeks!!!\"  // We can't send strings directly in mail, // strings need to be converted into slice bytes body := []byte(msg)  // PlainAuth uses the given username and password to // authenticate to host and act as identity. // Usually identity should be the empty string, // to act as username. auth := smtp.PlainAuth(\"\", username, password, host)  // SendMail uses TLS connection to send the mail // The email is sent to all address in the toList, // the body should be of type bytes, not strings // This returns error if any occured. err := smtp.SendMail(host+\":\"+port, auth, from, toList, body)  // handling the errors if err != nil { fmt.Println(err) os.Exit(1) }  fmt.Println(\"Successfully sent mail to all user in toList\") }  ``` For Java ```java // implementation 'com.sun.mail:javax.mail:1.6.2'  import java.util.Properties;  import javax.mail.Message; import javax.mail.Session; import javax.mail.Transport; import javax.mail.internet.InternetAddress; import javax.mail.internet.MimeMessage;  public class SMTPConnect {  // This address must be verified. static final String FROM = \"erlich@piedpiper.com\"; static final String FROMNAME = \"Erlich Bachman\";  // Replace recipient@example.com with a \"To\" address. If your account // is still in the sandbox, this address must be verified. static final String TO = \"gilfoyle@piedpiper.com\";  // Replace smtp_username with your SendPost SMTP user name. static final String SMTP_USERNAME = \"<username>\";  // Replace smtp_password with your SendPost SMTP password. static final String SMTP_PASSWORD = \"<password>\";  // SMTP Host Name static final String HOST = \"smtp.sendpost.io\";  // The port you will connect to on SendPost SMTP Endpoint. static final int PORT = 587;  static final String SUBJECT = \"SendPost SMTP Test (SMTP interface accessed using Java)\";  static final String BODY = String.join( System.getProperty(\"line.separator\"), \"<h1>SendPost SMTP Test</h1>\", \"<p>This email was sent with SendPost using the \", \"<a href='https://github.com/eclipse-ee4j/mail'>Javamail Package</a>\", \" for <a href='https://www.java.com'>Java</a>.\" );  public static void main(String[] args) throws Exception {  // Create a Properties object to contain connection configuration information. Properties props = System.getProperties(); props.put(\"mail.transport.protocol\", \"smtp\"); props.put(\"mail.smtp.port\", PORT); props.put(\"mail.smtp.starttls.enable\", \"true\"); props.put(\"mail.smtp.debug\", \"true\"); props.put(\"mail.smtp.auth\", \"true\");  // Create a Session object to represent a mail session with the specified properties. Session session = Session.getDefaultInstance(props);  // Create a message with the specified information. MimeMessage msg = new MimeMessage(session); msg.setFrom(new InternetAddress(FROM,FROMNAME)); msg.setRecipient(Message.RecipientType.TO, new InternetAddress(TO)); msg.setSubject(SUBJECT); msg.setContent(BODY,\"text/html\");  // Create a transport. Transport transport = session.getTransport();  // Send the message. try { System.out.println(\"Sending...\");  // Connect to SendPost SMTP using the SMTP username and password you specified above. transport.connect(HOST, SMTP_USERNAME, SMTP_PASSWORD);  // Send the email. transport.sendMessage(msg, msg.getAllRecipients()); System.out.println(\"Email sent!\");  } catch (Exception ex) {  System.out.println(\"The email was not sent.\"); System.out.println(\"Error message: \" + ex.getMessage()); System.out.println(ex); } // Close and terminate the connection. } } ```  Many programming languages support sending email using SMTP. This capability might be built into the programming language itself, or it might be available as an add-on, plug-in, or library. You can take advantage of this capability by sending email through SendPost from within application programs that you write.  We have provided examples in Python3, Golang, Java, PHP, JS.
 *
 * The version of the OpenAPI document: 1.0.0
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.13.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace sendpost\model;

use \ArrayAccess;
use \sendpost\ObjectSerializer;

/**
 * Message Class Doc Comment
 *
 * @category Class
 * @package  sendpost
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Message implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Message';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'message_id' => 'string',
        'account_id' => 'int',
        'sub_account_id' => 'int',
        'ip_id' => 'int',
        'account_ip_pool_id' => 'int',
        'public_ip' => 'string',
        'local_ip' => 'string',
        'email_type' => 'string',
        'submitted_at' => 'int',
        'from' => '\sendpost\model\Person',
        'reply_to' => '\sendpost\model\Person',
        'to' => '\sendpost\model\MessageTo',
        'header_to' => '\sendpost\model\MessageHeaderTo',
        'header_cc' => 'string[]',
        'header_bcc' => 'string[]',
        'attachments' => 'string[]',
        'groups' => 'string[]',
        'ip_pool' => 'string',
        'headers' => 'array<string,string>',
        'custom_fields' => 'array<string,string>',
        'subject' => 'string',
        'pre_text' => 'string',
        'html_body' => 'string',
        'text_body' => 'string',
        'amp_body' => 'string',
        'track_opens' => 'bool',
        'track_clicks' => 'bool',
        'attempt' => 'int',
        'webhook_endpoint' => 'string',
        'mx_records' => 'string[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'message_id' => null,
        'account_id' => null,
        'sub_account_id' => null,
        'ip_id' => null,
        'account_ip_pool_id' => null,
        'public_ip' => null,
        'local_ip' => null,
        'email_type' => null,
        'submitted_at' => 'int64',
        'from' => null,
        'reply_to' => null,
        'to' => null,
        'header_to' => null,
        'header_cc' => null,
        'header_bcc' => null,
        'attachments' => null,
        'groups' => null,
        'ip_pool' => null,
        'headers' => null,
        'custom_fields' => null,
        'subject' => null,
        'pre_text' => null,
        'html_body' => null,
        'text_body' => null,
        'amp_body' => null,
        'track_opens' => null,
        'track_clicks' => null,
        'attempt' => null,
        'webhook_endpoint' => null,
        'mx_records' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'message_id' => false,
        'account_id' => false,
        'sub_account_id' => false,
        'ip_id' => false,
        'account_ip_pool_id' => false,
        'public_ip' => false,
        'local_ip' => false,
        'email_type' => false,
        'submitted_at' => false,
        'from' => false,
        'reply_to' => false,
        'to' => false,
        'header_to' => false,
        'header_cc' => false,
        'header_bcc' => false,
        'attachments' => false,
        'groups' => false,
        'ip_pool' => false,
        'headers' => false,
        'custom_fields' => false,
        'subject' => false,
        'pre_text' => false,
        'html_body' => false,
        'text_body' => false,
        'amp_body' => false,
        'track_opens' => false,
        'track_clicks' => false,
        'attempt' => false,
        'webhook_endpoint' => false,
        'mx_records' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'message_id' => 'messageID',
        'account_id' => 'accountID',
        'sub_account_id' => 'subAccountID',
        'ip_id' => 'ipID',
        'account_ip_pool_id' => 'accountIPPoolID',
        'public_ip' => 'publicIP',
        'local_ip' => 'localIP',
        'email_type' => 'emailType',
        'submitted_at' => 'submittedAt',
        'from' => 'from',
        'reply_to' => 'replyTo',
        'to' => 'to',
        'header_to' => 'headerTo',
        'header_cc' => 'headerCc',
        'header_bcc' => 'headerBcc',
        'attachments' => 'attachments',
        'groups' => 'groups',
        'ip_pool' => 'ipPool',
        'headers' => 'headers',
        'custom_fields' => 'customFields',
        'subject' => 'subject',
        'pre_text' => 'preText',
        'html_body' => 'htmlBody',
        'text_body' => 'textBody',
        'amp_body' => 'ampBody',
        'track_opens' => 'trackOpens',
        'track_clicks' => 'trackClicks',
        'attempt' => 'attempt',
        'webhook_endpoint' => 'webhookEndpoint',
        'mx_records' => 'mxRecords'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'message_id' => 'setMessageId',
        'account_id' => 'setAccountId',
        'sub_account_id' => 'setSubAccountId',
        'ip_id' => 'setIpId',
        'account_ip_pool_id' => 'setAccountIpPoolId',
        'public_ip' => 'setPublicIp',
        'local_ip' => 'setLocalIp',
        'email_type' => 'setEmailType',
        'submitted_at' => 'setSubmittedAt',
        'from' => 'setFrom',
        'reply_to' => 'setReplyTo',
        'to' => 'setTo',
        'header_to' => 'setHeaderTo',
        'header_cc' => 'setHeaderCc',
        'header_bcc' => 'setHeaderBcc',
        'attachments' => 'setAttachments',
        'groups' => 'setGroups',
        'ip_pool' => 'setIpPool',
        'headers' => 'setHeaders',
        'custom_fields' => 'setCustomFields',
        'subject' => 'setSubject',
        'pre_text' => 'setPreText',
        'html_body' => 'setHtmlBody',
        'text_body' => 'setTextBody',
        'amp_body' => 'setAmpBody',
        'track_opens' => 'setTrackOpens',
        'track_clicks' => 'setTrackClicks',
        'attempt' => 'setAttempt',
        'webhook_endpoint' => 'setWebhookEndpoint',
        'mx_records' => 'setMxRecords'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'message_id' => 'getMessageId',
        'account_id' => 'getAccountId',
        'sub_account_id' => 'getSubAccountId',
        'ip_id' => 'getIpId',
        'account_ip_pool_id' => 'getAccountIpPoolId',
        'public_ip' => 'getPublicIp',
        'local_ip' => 'getLocalIp',
        'email_type' => 'getEmailType',
        'submitted_at' => 'getSubmittedAt',
        'from' => 'getFrom',
        'reply_to' => 'getReplyTo',
        'to' => 'getTo',
        'header_to' => 'getHeaderTo',
        'header_cc' => 'getHeaderCc',
        'header_bcc' => 'getHeaderBcc',
        'attachments' => 'getAttachments',
        'groups' => 'getGroups',
        'ip_pool' => 'getIpPool',
        'headers' => 'getHeaders',
        'custom_fields' => 'getCustomFields',
        'subject' => 'getSubject',
        'pre_text' => 'getPreText',
        'html_body' => 'getHtmlBody',
        'text_body' => 'getTextBody',
        'amp_body' => 'getAmpBody',
        'track_opens' => 'getTrackOpens',
        'track_clicks' => 'getTrackClicks',
        'attempt' => 'getAttempt',
        'webhook_endpoint' => 'getWebhookEndpoint',
        'mx_records' => 'getMxRecords'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[]|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('message_id', $data ?? [], null);
        $this->setIfExists('account_id', $data ?? [], null);
        $this->setIfExists('sub_account_id', $data ?? [], null);
        $this->setIfExists('ip_id', $data ?? [], null);
        $this->setIfExists('account_ip_pool_id', $data ?? [], null);
        $this->setIfExists('public_ip', $data ?? [], null);
        $this->setIfExists('local_ip', $data ?? [], null);
        $this->setIfExists('email_type', $data ?? [], null);
        $this->setIfExists('submitted_at', $data ?? [], null);
        $this->setIfExists('from', $data ?? [], null);
        $this->setIfExists('reply_to', $data ?? [], null);
        $this->setIfExists('to', $data ?? [], null);
        $this->setIfExists('header_to', $data ?? [], null);
        $this->setIfExists('header_cc', $data ?? [], null);
        $this->setIfExists('header_bcc', $data ?? [], null);
        $this->setIfExists('attachments', $data ?? [], null);
        $this->setIfExists('groups', $data ?? [], null);
        $this->setIfExists('ip_pool', $data ?? [], null);
        $this->setIfExists('headers', $data ?? [], null);
        $this->setIfExists('custom_fields', $data ?? [], null);
        $this->setIfExists('subject', $data ?? [], null);
        $this->setIfExists('pre_text', $data ?? [], null);
        $this->setIfExists('html_body', $data ?? [], null);
        $this->setIfExists('text_body', $data ?? [], null);
        $this->setIfExists('amp_body', $data ?? [], null);
        $this->setIfExists('track_opens', $data ?? [], null);
        $this->setIfExists('track_clicks', $data ?? [], null);
        $this->setIfExists('attempt', $data ?? [], null);
        $this->setIfExists('webhook_endpoint', $data ?? [], null);
        $this->setIfExists('mx_records', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets message_id
     *
     * @return string|null
     */
    public function getMessageId()
    {
        return $this->container['message_id'];
    }

    /**
     * Sets message_id
     *
     * @param string|null $message_id Unique ID for the message.
     *
     * @return self
     */
    public function setMessageId($message_id)
    {
        if (is_null($message_id)) {
            throw new \InvalidArgumentException('non-nullable message_id cannot be null');
        }
        $this->container['message_id'] = $message_id;

        return $this;
    }

    /**
     * Gets account_id
     *
     * @return int|null
     */
    public function getAccountId()
    {
        return $this->container['account_id'];
    }

    /**
     * Sets account_id
     *
     * @param int|null $account_id Account ID associated with the message.
     *
     * @return self
     */
    public function setAccountId($account_id)
    {
        if (is_null($account_id)) {
            throw new \InvalidArgumentException('non-nullable account_id cannot be null');
        }
        $this->container['account_id'] = $account_id;

        return $this;
    }

    /**
     * Gets sub_account_id
     *
     * @return int|null
     */
    public function getSubAccountId()
    {
        return $this->container['sub_account_id'];
    }

    /**
     * Sets sub_account_id
     *
     * @param int|null $sub_account_id Sub-account ID associated with the message.
     *
     * @return self
     */
    public function setSubAccountId($sub_account_id)
    {
        if (is_null($sub_account_id)) {
            throw new \InvalidArgumentException('non-nullable sub_account_id cannot be null');
        }
        $this->container['sub_account_id'] = $sub_account_id;

        return $this;
    }

    /**
     * Gets ip_id
     *
     * @return int|null
     */
    public function getIpId()
    {
        return $this->container['ip_id'];
    }

    /**
     * Sets ip_id
     *
     * @param int|null $ip_id IP ID used for sending the message.
     *
     * @return self
     */
    public function setIpId($ip_id)
    {
        if (is_null($ip_id)) {
            throw new \InvalidArgumentException('non-nullable ip_id cannot be null');
        }
        $this->container['ip_id'] = $ip_id;

        return $this;
    }

    /**
     * Gets account_ip_pool_id
     *
     * @return int|null
     */
    public function getAccountIpPoolId()
    {
        return $this->container['account_ip_pool_id'];
    }

    /**
     * Sets account_ip_pool_id
     *
     * @param int|null $account_ip_pool_id Account IP Pool ID associated with the message.
     *
     * @return self
     */
    public function setAccountIpPoolId($account_ip_pool_id)
    {
        if (is_null($account_ip_pool_id)) {
            throw new \InvalidArgumentException('non-nullable account_ip_pool_id cannot be null');
        }
        $this->container['account_ip_pool_id'] = $account_ip_pool_id;

        return $this;
    }

    /**
     * Gets public_ip
     *
     * @return string|null
     */
    public function getPublicIp()
    {
        return $this->container['public_ip'];
    }

    /**
     * Sets public_ip
     *
     * @param string|null $public_ip Public IP address used for sending the message.
     *
     * @return self
     */
    public function setPublicIp($public_ip)
    {
        if (is_null($public_ip)) {
            throw new \InvalidArgumentException('non-nullable public_ip cannot be null');
        }
        $this->container['public_ip'] = $public_ip;

        return $this;
    }

    /**
     * Gets local_ip
     *
     * @return string|null
     */
    public function getLocalIp()
    {
        return $this->container['local_ip'];
    }

    /**
     * Sets local_ip
     *
     * @param string|null $local_ip Local IP address used for sending the message.
     *
     * @return self
     */
    public function setLocalIp($local_ip)
    {
        if (is_null($local_ip)) {
            throw new \InvalidArgumentException('non-nullable local_ip cannot be null');
        }
        $this->container['local_ip'] = $local_ip;

        return $this;
    }

    /**
     * Gets email_type
     *
     * @return string|null
     */
    public function getEmailType()
    {
        return $this->container['email_type'];
    }

    /**
     * Sets email_type
     *
     * @param string|null $email_type Type of email service used.
     *
     * @return self
     */
    public function setEmailType($email_type)
    {
        if (is_null($email_type)) {
            throw new \InvalidArgumentException('non-nullable email_type cannot be null');
        }
        $this->container['email_type'] = $email_type;

        return $this;
    }

    /**
     * Gets submitted_at
     *
     * @return int|null
     */
    public function getSubmittedAt()
    {
        return $this->container['submitted_at'];
    }

    /**
     * Sets submitted_at
     *
     * @param int|null $submitted_at UNIX epoch nano timestamp when message was submitted.
     *
     * @return self
     */
    public function setSubmittedAt($submitted_at)
    {
        if (is_null($submitted_at)) {
            throw new \InvalidArgumentException('non-nullable submitted_at cannot be null');
        }
        $this->container['submitted_at'] = $submitted_at;

        return $this;
    }

    /**
     * Gets from
     *
     * @return \sendpost\model\Person|null
     */
    public function getFrom()
    {
        return $this->container['from'];
    }

    /**
     * Sets from
     *
     * @param \sendpost\model\Person|null $from Object comprising name and email address of the sender
     *
     * @return self
     */
    public function setFrom($from)
    {
        if (is_null($from)) {
            throw new \InvalidArgumentException('non-nullable from cannot be null');
        }
        $this->container['from'] = $from;

        return $this;
    }

    /**
     * Gets reply_to
     *
     * @return \sendpost\model\Person|null
     */
    public function getReplyTo()
    {
        return $this->container['reply_to'];
    }

    /**
     * Sets reply_to
     *
     * @param \sendpost\model\Person|null $reply_to Object comprising name and email addresses to which email replies will go to
     *
     * @return self
     */
    public function setReplyTo($reply_to)
    {
        if (is_null($reply_to)) {
            throw new \InvalidArgumentException('non-nullable reply_to cannot be null');
        }
        $this->container['reply_to'] = $reply_to;

        return $this;
    }

    /**
     * Gets to
     *
     * @return \sendpost\model\MessageTo|null
     */
    public function getTo()
    {
        return $this->container['to'];
    }

    /**
     * Sets to
     *
     * @param \sendpost\model\MessageTo|null $to to
     *
     * @return self
     */
    public function setTo($to)
    {
        if (is_null($to)) {
            throw new \InvalidArgumentException('non-nullable to cannot be null');
        }
        $this->container['to'] = $to;

        return $this;
    }

    /**
     * Gets header_to
     *
     * @return \sendpost\model\MessageHeaderTo|null
     */
    public function getHeaderTo()
    {
        return $this->container['header_to'];
    }

    /**
     * Sets header_to
     *
     * @param \sendpost\model\MessageHeaderTo|null $header_to header_to
     *
     * @return self
     */
    public function setHeaderTo($header_to)
    {
        if (is_null($header_to)) {
            throw new \InvalidArgumentException('non-nullable header_to cannot be null');
        }
        $this->container['header_to'] = $header_to;

        return $this;
    }

    /**
     * Gets header_cc
     *
     * @return string[]|null
     */
    public function getHeaderCc()
    {
        return $this->container['header_cc'];
    }

    /**
     * Sets header_cc
     *
     * @param string[]|null $header_cc List of CC recipients from email headers
     *
     * @return self
     */
    public function setHeaderCc($header_cc)
    {
        if (is_null($header_cc)) {
            throw new \InvalidArgumentException('non-nullable header_cc cannot be null');
        }
        $this->container['header_cc'] = $header_cc;

        return $this;
    }

    /**
     * Gets header_bcc
     *
     * @return string[]|null
     */
    public function getHeaderBcc()
    {
        return $this->container['header_bcc'];
    }

    /**
     * Sets header_bcc
     *
     * @param string[]|null $header_bcc List of BCC recipients from email headers
     *
     * @return self
     */
    public function setHeaderBcc($header_bcc)
    {
        if (is_null($header_bcc)) {
            throw new \InvalidArgumentException('non-nullable header_bcc cannot be null');
        }
        $this->container['header_bcc'] = $header_bcc;

        return $this;
    }

    /**
     * Gets attachments
     *
     * @return string[]|null
     */
    public function getAttachments()
    {
        return $this->container['attachments'];
    }

    /**
     * Sets attachments
     *
     * @param string[]|null $attachments List of attachments
     *
     * @return self
     */
    public function setAttachments($attachments)
    {
        if (is_null($attachments)) {
            throw new \InvalidArgumentException('non-nullable attachments cannot be null');
        }
        $this->container['attachments'] = $attachments;

        return $this;
    }

    /**
     * Gets groups
     *
     * @return string[]|null
     */
    public function getGroups()
    {
        return $this->container['groups'];
    }

    /**
     * Sets groups
     *
     * @param string[]|null $groups List of groups associated with the message
     *
     * @return self
     */
    public function setGroups($groups)
    {
        if (is_null($groups)) {
            throw new \InvalidArgumentException('non-nullable groups cannot be null');
        }
        $this->container['groups'] = $groups;

        return $this;
    }

    /**
     * Gets ip_pool
     *
     * @return string|null
     */
    public function getIpPool()
    {
        return $this->container['ip_pool'];
    }

    /**
     * Sets ip_pool
     *
     * @param string|null $ip_pool IP Pool from which emails will go out. Relevant only for customers on dedicated IP plans.
     *
     * @return self
     */
    public function setIpPool($ip_pool)
    {
        if (is_null($ip_pool)) {
            throw new \InvalidArgumentException('non-nullable ip_pool cannot be null');
        }
        $this->container['ip_pool'] = $ip_pool;

        return $this;
    }

    /**
     * Gets headers
     *
     * @return array<string,string>|null
     */
    public function getHeaders()
    {
        return $this->container['headers'];
    }

    /**
     * Sets headers
     *
     * @param array<string,string>|null $headers Key-Value pair which are added to every email message being sent and also with webhooks triggered on events such as email delivered, open, click etc. They are useful to identify email, recipient etc. in your internal system
     *
     * @return self
     */
    public function setHeaders($headers)
    {
        if (is_null($headers)) {
            throw new \InvalidArgumentException('non-nullable headers cannot be null');
        }
        $this->container['headers'] = $headers;

        return $this;
    }

    /**
     * Gets custom_fields
     *
     * @return array<string,string>|null
     */
    public function getCustomFields()
    {
        return $this->container['custom_fields'];
    }

    /**
     * Sets custom_fields
     *
     * @param array<string,string>|null $custom_fields Key-Value pair of custom fields at message level
     *
     * @return self
     */
    public function setCustomFields($custom_fields)
    {
        if (is_null($custom_fields)) {
            throw new \InvalidArgumentException('non-nullable custom_fields cannot be null');
        }
        $this->container['custom_fields'] = $custom_fields;

        return $this;
    }

    /**
     * Gets subject
     *
     * @return string|null
     */
    public function getSubject()
    {
        return $this->container['subject'];
    }

    /**
     * Sets subject
     *
     * @param string|null $subject Email subject line.
     *
     * @return self
     */
    public function setSubject($subject)
    {
        if (is_null($subject)) {
            throw new \InvalidArgumentException('non-nullable subject cannot be null');
        }
        $this->container['subject'] = $subject;

        return $this;
    }

    /**
     * Gets pre_text
     *
     * @return string|null
     */
    public function getPreText()
    {
        return $this->container['pre_text'];
    }

    /**
     * Sets pre_text
     *
     * @param string|null $pre_text Text which appears on mobile right after email subject line.
     *
     * @return self
     */
    public function setPreText($pre_text)
    {
        if (is_null($pre_text)) {
            throw new \InvalidArgumentException('non-nullable pre_text cannot be null');
        }
        $this->container['pre_text'] = $pre_text;

        return $this;
    }

    /**
     * Gets html_body
     *
     * @return string|null
     */
    public function getHtmlBody()
    {
        return $this->container['html_body'];
    }

    /**
     * Sets html_body
     *
     * @param string|null $html_body HTML email content.
     *
     * @return self
     */
    public function setHtmlBody($html_body)
    {
        if (is_null($html_body)) {
            throw new \InvalidArgumentException('non-nullable html_body cannot be null');
        }
        $this->container['html_body'] = $html_body;

        return $this;
    }

    /**
     * Gets text_body
     *
     * @return string|null
     */
    public function getTextBody()
    {
        return $this->container['text_body'];
    }

    /**
     * Sets text_body
     *
     * @param string|null $text_body Text email content.
     *
     * @return self
     */
    public function setTextBody($text_body)
    {
        if (is_null($text_body)) {
            throw new \InvalidArgumentException('non-nullable text_body cannot be null');
        }
        $this->container['text_body'] = $text_body;

        return $this;
    }

    /**
     * Gets amp_body
     *
     * @return string|null
     */
    public function getAmpBody()
    {
        return $this->container['amp_body'];
    }

    /**
     * Sets amp_body
     *
     * @param string|null $amp_body AMP email content.
     *
     * @return self
     */
    public function setAmpBody($amp_body)
    {
        if (is_null($amp_body)) {
            throw new \InvalidArgumentException('non-nullable amp_body cannot be null');
        }
        $this->container['amp_body'] = $amp_body;

        return $this;
    }

    /**
     * Gets track_opens
     *
     * @return bool|null
     */
    public function getTrackOpens()
    {
        return $this->container['track_opens'];
    }

    /**
     * Sets track_opens
     *
     * @param bool|null $track_opens Indicates if email opens need to be tracked.
     *
     * @return self
     */
    public function setTrackOpens($track_opens)
    {
        if (is_null($track_opens)) {
            throw new \InvalidArgumentException('non-nullable track_opens cannot be null');
        }
        $this->container['track_opens'] = $track_opens;

        return $this;
    }

    /**
     * Gets track_clicks
     *
     * @return bool|null
     */
    public function getTrackClicks()
    {
        return $this->container['track_clicks'];
    }

    /**
     * Sets track_clicks
     *
     * @param bool|null $track_clicks Indicates if email clicks need to be tracked.
     *
     * @return self
     */
    public function setTrackClicks($track_clicks)
    {
        if (is_null($track_clicks)) {
            throw new \InvalidArgumentException('non-nullable track_clicks cannot be null');
        }
        $this->container['track_clicks'] = $track_clicks;

        return $this;
    }

    /**
     * Gets attempt
     *
     * @return int|null
     */
    public function getAttempt()
    {
        return $this->container['attempt'];
    }

    /**
     * Sets attempt
     *
     * @param int|null $attempt Number of delivery attempts made for the message.
     *
     * @return self
     */
    public function setAttempt($attempt)
    {
        if (is_null($attempt)) {
            throw new \InvalidArgumentException('non-nullable attempt cannot be null');
        }
        $this->container['attempt'] = $attempt;

        return $this;
    }

    /**
     * Gets webhook_endpoint
     *
     * @return string|null
     */
    public function getWebhookEndpoint()
    {
        return $this->container['webhook_endpoint'];
    }

    /**
     * Sets webhook_endpoint
     *
     * @param string|null $webhook_endpoint Webhook endpoint URL for the message.
     *
     * @return self
     */
    public function setWebhookEndpoint($webhook_endpoint)
    {
        if (is_null($webhook_endpoint)) {
            throw new \InvalidArgumentException('non-nullable webhook_endpoint cannot be null');
        }
        $this->container['webhook_endpoint'] = $webhook_endpoint;

        return $this;
    }

    /**
     * Gets mx_records
     *
     * @return string[]|null
     */
    public function getMxRecords()
    {
        return $this->container['mx_records'];
    }

    /**
     * Sets mx_records
     *
     * @param string[]|null $mx_records List of MX records for the recipient domain
     *
     * @return self
     */
    public function setMxRecords($mx_records)
    {
        if (is_null($mx_records)) {
            throw new \InvalidArgumentException('non-nullable mx_records cannot be null');
        }
        $this->container['mx_records'] = $mx_records;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


