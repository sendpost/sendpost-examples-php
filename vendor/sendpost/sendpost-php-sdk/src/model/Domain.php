<?php
/**
 * Domain
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
 * Domain Class Doc Comment
 *
 * @category Class
 * @package  sendpost
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Domain implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Domain';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'name' => 'string',
        'dkim' => '\sendpost\model\DomainDkim',
        'spf' => '\sendpost\model\DomainSpf',
        'return_path' => '\sendpost\model\DomainReturnPath',
        'track' => '\sendpost\model\DomainTrack',
        'dmarc' => '\sendpost\model\DomainDmarc',
        'dkim_config' => 'string',
        'dkim_verified' => 'bool',
        'spf_verified' => 'bool',
        'mailbox_verified' => 'bool',
        'dmarc_verified' => 'bool',
        'return_path_verified' => 'bool',
        'track_verified' => 'bool',
        'verified' => 'bool',
        'domain_registered_date' => 'string',
        'created' => 'int',
        'gpt_verified' => 'bool',
        'gpt' => '\sendpost\model\DomainGpt',
        'dmarc_failure_reason' => 'string',
        'dkim_failure_reason' => 'string',
        'track_failure_reason' => 'string',
        'return_path_failure_reason' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => null,
        'name' => null,
        'dkim' => null,
        'spf' => null,
        'return_path' => null,
        'track' => null,
        'dmarc' => null,
        'dkim_config' => null,
        'dkim_verified' => null,
        'spf_verified' => null,
        'mailbox_verified' => null,
        'dmarc_verified' => null,
        'return_path_verified' => null,
        'track_verified' => null,
        'verified' => null,
        'domain_registered_date' => null,
        'created' => 'int64',
        'gpt_verified' => null,
        'gpt' => null,
        'dmarc_failure_reason' => null,
        'dkim_failure_reason' => null,
        'track_failure_reason' => null,
        'return_path_failure_reason' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'name' => false,
        'dkim' => false,
        'spf' => false,
        'return_path' => false,
        'track' => false,
        'dmarc' => false,
        'dkim_config' => false,
        'dkim_verified' => false,
        'spf_verified' => false,
        'mailbox_verified' => false,
        'dmarc_verified' => false,
        'return_path_verified' => false,
        'track_verified' => false,
        'verified' => false,
        'domain_registered_date' => false,
        'created' => false,
        'gpt_verified' => false,
        'gpt' => false,
        'dmarc_failure_reason' => false,
        'dkim_failure_reason' => false,
        'track_failure_reason' => false,
        'return_path_failure_reason' => false
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
        'id' => 'id',
        'name' => 'name',
        'dkim' => 'dkim',
        'spf' => 'spf',
        'return_path' => 'returnPath',
        'track' => 'track',
        'dmarc' => 'dmarc',
        'dkim_config' => 'dkimConfig',
        'dkim_verified' => 'dkimVerified',
        'spf_verified' => 'spfVerified',
        'mailbox_verified' => 'mailboxVerified',
        'dmarc_verified' => 'dmarcVerified',
        'return_path_verified' => 'returnPathVerified',
        'track_verified' => 'trackVerified',
        'verified' => 'verified',
        'domain_registered_date' => 'domainRegisteredDate',
        'created' => 'created',
        'gpt_verified' => 'gptVerified',
        'gpt' => 'gpt',
        'dmarc_failure_reason' => 'dmarcFailureReason',
        'dkim_failure_reason' => 'dkimFailureReason',
        'track_failure_reason' => 'trackFailureReason',
        'return_path_failure_reason' => 'returnPathFailureReason'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'dkim' => 'setDkim',
        'spf' => 'setSpf',
        'return_path' => 'setReturnPath',
        'track' => 'setTrack',
        'dmarc' => 'setDmarc',
        'dkim_config' => 'setDkimConfig',
        'dkim_verified' => 'setDkimVerified',
        'spf_verified' => 'setSpfVerified',
        'mailbox_verified' => 'setMailboxVerified',
        'dmarc_verified' => 'setDmarcVerified',
        'return_path_verified' => 'setReturnPathVerified',
        'track_verified' => 'setTrackVerified',
        'verified' => 'setVerified',
        'domain_registered_date' => 'setDomainRegisteredDate',
        'created' => 'setCreated',
        'gpt_verified' => 'setGptVerified',
        'gpt' => 'setGpt',
        'dmarc_failure_reason' => 'setDmarcFailureReason',
        'dkim_failure_reason' => 'setDkimFailureReason',
        'track_failure_reason' => 'setTrackFailureReason',
        'return_path_failure_reason' => 'setReturnPathFailureReason'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'dkim' => 'getDkim',
        'spf' => 'getSpf',
        'return_path' => 'getReturnPath',
        'track' => 'getTrack',
        'dmarc' => 'getDmarc',
        'dkim_config' => 'getDkimConfig',
        'dkim_verified' => 'getDkimVerified',
        'spf_verified' => 'getSpfVerified',
        'mailbox_verified' => 'getMailboxVerified',
        'dmarc_verified' => 'getDmarcVerified',
        'return_path_verified' => 'getReturnPathVerified',
        'track_verified' => 'getTrackVerified',
        'verified' => 'getVerified',
        'domain_registered_date' => 'getDomainRegisteredDate',
        'created' => 'getCreated',
        'gpt_verified' => 'getGptVerified',
        'gpt' => 'getGpt',
        'dmarc_failure_reason' => 'getDmarcFailureReason',
        'dkim_failure_reason' => 'getDkimFailureReason',
        'track_failure_reason' => 'getTrackFailureReason',
        'return_path_failure_reason' => 'getReturnPathFailureReason'
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
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('dkim', $data ?? [], null);
        $this->setIfExists('spf', $data ?? [], null);
        $this->setIfExists('return_path', $data ?? [], null);
        $this->setIfExists('track', $data ?? [], null);
        $this->setIfExists('dmarc', $data ?? [], null);
        $this->setIfExists('dkim_config', $data ?? [], null);
        $this->setIfExists('dkim_verified', $data ?? [], null);
        $this->setIfExists('spf_verified', $data ?? [], null);
        $this->setIfExists('mailbox_verified', $data ?? [], null);
        $this->setIfExists('dmarc_verified', $data ?? [], null);
        $this->setIfExists('return_path_verified', $data ?? [], null);
        $this->setIfExists('track_verified', $data ?? [], null);
        $this->setIfExists('verified', $data ?? [], null);
        $this->setIfExists('domain_registered_date', $data ?? [], null);
        $this->setIfExists('created', $data ?? [], null);
        $this->setIfExists('gpt_verified', $data ?? [], null);
        $this->setIfExists('gpt', $data ?? [], null);
        $this->setIfExists('dmarc_failure_reason', $data ?? [], null);
        $this->setIfExists('dkim_failure_reason', $data ?? [], null);
        $this->setIfExists('track_failure_reason', $data ?? [], null);
        $this->setIfExists('return_path_failure_reason', $data ?? [], null);
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
     * Gets id
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int|null $id Unique ID for the domain.
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name Name of the domain.
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets dkim
     *
     * @return \sendpost\model\DomainDkim|null
     */
    public function getDkim()
    {
        return $this->container['dkim'];
    }

    /**
     * Sets dkim
     *
     * @param \sendpost\model\DomainDkim|null $dkim dkim
     *
     * @return self
     */
    public function setDkim($dkim)
    {
        if (is_null($dkim)) {
            throw new \InvalidArgumentException('non-nullable dkim cannot be null');
        }
        $this->container['dkim'] = $dkim;

        return $this;
    }

    /**
     * Gets spf
     *
     * @return \sendpost\model\DomainSpf|null
     */
    public function getSpf()
    {
        return $this->container['spf'];
    }

    /**
     * Sets spf
     *
     * @param \sendpost\model\DomainSpf|null $spf spf
     *
     * @return self
     */
    public function setSpf($spf)
    {
        if (is_null($spf)) {
            throw new \InvalidArgumentException('non-nullable spf cannot be null');
        }
        $this->container['spf'] = $spf;

        return $this;
    }

    /**
     * Gets return_path
     *
     * @return \sendpost\model\DomainReturnPath|null
     */
    public function getReturnPath()
    {
        return $this->container['return_path'];
    }

    /**
     * Sets return_path
     *
     * @param \sendpost\model\DomainReturnPath|null $return_path return_path
     *
     * @return self
     */
    public function setReturnPath($return_path)
    {
        if (is_null($return_path)) {
            throw new \InvalidArgumentException('non-nullable return_path cannot be null');
        }
        $this->container['return_path'] = $return_path;

        return $this;
    }

    /**
     * Gets track
     *
     * @return \sendpost\model\DomainTrack|null
     */
    public function getTrack()
    {
        return $this->container['track'];
    }

    /**
     * Sets track
     *
     * @param \sendpost\model\DomainTrack|null $track track
     *
     * @return self
     */
    public function setTrack($track)
    {
        if (is_null($track)) {
            throw new \InvalidArgumentException('non-nullable track cannot be null');
        }
        $this->container['track'] = $track;

        return $this;
    }

    /**
     * Gets dmarc
     *
     * @return \sendpost\model\DomainDmarc|null
     */
    public function getDmarc()
    {
        return $this->container['dmarc'];
    }

    /**
     * Sets dmarc
     *
     * @param \sendpost\model\DomainDmarc|null $dmarc dmarc
     *
     * @return self
     */
    public function setDmarc($dmarc)
    {
        if (is_null($dmarc)) {
            throw new \InvalidArgumentException('non-nullable dmarc cannot be null');
        }
        $this->container['dmarc'] = $dmarc;

        return $this;
    }

    /**
     * Gets dkim_config
     *
     * @return string|null
     */
    public function getDkimConfig()
    {
        return $this->container['dkim_config'];
    }

    /**
     * Sets dkim_config
     *
     * @param string|null $dkim_config DKIM configuration
     *
     * @return self
     */
    public function setDkimConfig($dkim_config)
    {
        if (is_null($dkim_config)) {
            throw new \InvalidArgumentException('non-nullable dkim_config cannot be null');
        }
        $this->container['dkim_config'] = $dkim_config;

        return $this;
    }

    /**
     * Gets dkim_verified
     *
     * @return bool|null
     */
    public function getDkimVerified()
    {
        return $this->container['dkim_verified'];
    }

    /**
     * Sets dkim_verified
     *
     * @param bool|null $dkim_verified Status of DKIM verification ( true or false )
     *
     * @return self
     */
    public function setDkimVerified($dkim_verified)
    {
        if (is_null($dkim_verified)) {
            throw new \InvalidArgumentException('non-nullable dkim_verified cannot be null');
        }
        $this->container['dkim_verified'] = $dkim_verified;

        return $this;
    }

    /**
     * Gets spf_verified
     *
     * @return bool|null
     */
    public function getSpfVerified()
    {
        return $this->container['spf_verified'];
    }

    /**
     * Sets spf_verified
     *
     * @param bool|null $spf_verified Status of SPF verification ( true or false )
     *
     * @return self
     */
    public function setSpfVerified($spf_verified)
    {
        if (is_null($spf_verified)) {
            throw new \InvalidArgumentException('non-nullable spf_verified cannot be null');
        }
        $this->container['spf_verified'] = $spf_verified;

        return $this;
    }

    /**
     * Gets mailbox_verified
     *
     * @return bool|null
     */
    public function getMailboxVerified()
    {
        return $this->container['mailbox_verified'];
    }

    /**
     * Sets mailbox_verified
     *
     * @param bool|null $mailbox_verified Status of Mailbox verification ( true or false )
     *
     * @return self
     */
    public function setMailboxVerified($mailbox_verified)
    {
        if (is_null($mailbox_verified)) {
            throw new \InvalidArgumentException('non-nullable mailbox_verified cannot be null');
        }
        $this->container['mailbox_verified'] = $mailbox_verified;

        return $this;
    }

    /**
     * Gets dmarc_verified
     *
     * @return bool|null
     */
    public function getDmarcVerified()
    {
        return $this->container['dmarc_verified'];
    }

    /**
     * Sets dmarc_verified
     *
     * @param bool|null $dmarc_verified Status of DMARC verification ( true or false)
     *
     * @return self
     */
    public function setDmarcVerified($dmarc_verified)
    {
        if (is_null($dmarc_verified)) {
            throw new \InvalidArgumentException('non-nullable dmarc_verified cannot be null');
        }
        $this->container['dmarc_verified'] = $dmarc_verified;

        return $this;
    }

    /**
     * Gets return_path_verified
     *
     * @return bool|null
     */
    public function getReturnPathVerified()
    {
        return $this->container['return_path_verified'];
    }

    /**
     * Sets return_path_verified
     *
     * @param bool|null $return_path_verified Status of ReturnPath verification ( true or false )
     *
     * @return self
     */
    public function setReturnPathVerified($return_path_verified)
    {
        if (is_null($return_path_verified)) {
            throw new \InvalidArgumentException('non-nullable return_path_verified cannot be null');
        }
        $this->container['return_path_verified'] = $return_path_verified;

        return $this;
    }

    /**
     * Gets track_verified
     *
     * @return bool|null
     */
    public function getTrackVerified()
    {
        return $this->container['track_verified'];
    }

    /**
     * Sets track_verified
     *
     * @param bool|null $track_verified Status of Track verification ( true or false )
     *
     * @return self
     */
    public function setTrackVerified($track_verified)
    {
        if (is_null($track_verified)) {
            throw new \InvalidArgumentException('non-nullable track_verified cannot be null');
        }
        $this->container['track_verified'] = $track_verified;

        return $this;
    }

    /**
     * Gets verified
     *
     * @return bool|null
     */
    public function getVerified()
    {
        return $this->container['verified'];
    }

    /**
     * Sets verified
     *
     * @param bool|null $verified Overall verification status of the domain
     *
     * @return self
     */
    public function setVerified($verified)
    {
        if (is_null($verified)) {
            throw new \InvalidArgumentException('non-nullable verified cannot be null');
        }
        $this->container['verified'] = $verified;

        return $this;
    }

    /**
     * Gets domain_registered_date
     *
     * @return string|null
     */
    public function getDomainRegisteredDate()
    {
        return $this->container['domain_registered_date'];
    }

    /**
     * Sets domain_registered_date
     *
     * @param string|null $domain_registered_date Date when the domain was registered
     *
     * @return self
     */
    public function setDomainRegisteredDate($domain_registered_date)
    {
        if (is_null($domain_registered_date)) {
            throw new \InvalidArgumentException('non-nullable domain_registered_date cannot be null');
        }
        $this->container['domain_registered_date'] = $domain_registered_date;

        return $this;
    }

    /**
     * Gets created
     *
     * @return int|null
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     *
     * @param int|null $created UNIX epoch timestamp in nanoseconds.
     *
     * @return self
     */
    public function setCreated($created)
    {
        if (is_null($created)) {
            throw new \InvalidArgumentException('non-nullable created cannot be null');
        }
        $this->container['created'] = $created;

        return $this;
    }

    /**
     * Gets gpt_verified
     *
     * @return bool|null
     */
    public function getGptVerified()
    {
        return $this->container['gpt_verified'];
    }

    /**
     * Sets gpt_verified
     *
     * @param bool|null $gpt_verified Status of GPT verification ( true or false )
     *
     * @return self
     */
    public function setGptVerified($gpt_verified)
    {
        if (is_null($gpt_verified)) {
            throw new \InvalidArgumentException('non-nullable gpt_verified cannot be null');
        }
        $this->container['gpt_verified'] = $gpt_verified;

        return $this;
    }

    /**
     * Gets gpt
     *
     * @return \sendpost\model\DomainGpt|null
     */
    public function getGpt()
    {
        return $this->container['gpt'];
    }

    /**
     * Sets gpt
     *
     * @param \sendpost\model\DomainGpt|null $gpt gpt
     *
     * @return self
     */
    public function setGpt($gpt)
    {
        if (is_null($gpt)) {
            throw new \InvalidArgumentException('non-nullable gpt cannot be null');
        }
        $this->container['gpt'] = $gpt;

        return $this;
    }

    /**
     * Gets dmarc_failure_reason
     *
     * @return string|null
     */
    public function getDmarcFailureReason()
    {
        return $this->container['dmarc_failure_reason'];
    }

    /**
     * Sets dmarc_failure_reason
     *
     * @param string|null $dmarc_failure_reason Reason for DMARC verification failure
     *
     * @return self
     */
    public function setDmarcFailureReason($dmarc_failure_reason)
    {
        if (is_null($dmarc_failure_reason)) {
            throw new \InvalidArgumentException('non-nullable dmarc_failure_reason cannot be null');
        }
        $this->container['dmarc_failure_reason'] = $dmarc_failure_reason;

        return $this;
    }

    /**
     * Gets dkim_failure_reason
     *
     * @return string|null
     */
    public function getDkimFailureReason()
    {
        return $this->container['dkim_failure_reason'];
    }

    /**
     * Sets dkim_failure_reason
     *
     * @param string|null $dkim_failure_reason Reason for DKIM verification failure
     *
     * @return self
     */
    public function setDkimFailureReason($dkim_failure_reason)
    {
        if (is_null($dkim_failure_reason)) {
            throw new \InvalidArgumentException('non-nullable dkim_failure_reason cannot be null');
        }
        $this->container['dkim_failure_reason'] = $dkim_failure_reason;

        return $this;
    }

    /**
     * Gets track_failure_reason
     *
     * @return string|null
     */
    public function getTrackFailureReason()
    {
        return $this->container['track_failure_reason'];
    }

    /**
     * Sets track_failure_reason
     *
     * @param string|null $track_failure_reason Reason for Track verification failure
     *
     * @return self
     */
    public function setTrackFailureReason($track_failure_reason)
    {
        if (is_null($track_failure_reason)) {
            throw new \InvalidArgumentException('non-nullable track_failure_reason cannot be null');
        }
        $this->container['track_failure_reason'] = $track_failure_reason;

        return $this;
    }

    /**
     * Gets return_path_failure_reason
     *
     * @return string|null
     */
    public function getReturnPathFailureReason()
    {
        return $this->container['return_path_failure_reason'];
    }

    /**
     * Sets return_path_failure_reason
     *
     * @param string|null $return_path_failure_reason Reason for ReturnPath verification failure
     *
     * @return self
     */
    public function setReturnPathFailureReason($return_path_failure_reason)
    {
        if (is_null($return_path_failure_reason)) {
            throw new \InvalidArgumentException('non-nullable return_path_failure_reason cannot be null');
        }
        $this->container['return_path_failure_reason'] = $return_path_failure_reason;

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


