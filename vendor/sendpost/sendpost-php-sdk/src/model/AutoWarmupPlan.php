<?php
/**
 * AutoWarmupPlan
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
 * AutoWarmupPlan Class Doc Comment
 *
 * @category Class
 * @package  sendpost
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AutoWarmupPlan implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AutoWarmupPlan';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'name' => 'string',
        'gmail_warmup_plan' => 'string',
        'yahoo_warmup_plan' => 'string',
        'aol_warmup_plan' => 'string',
        'microsoft_warmup_plan' => 'string',
        'comcast_warmup_plan' => 'string',
        'yandex_warmup_plan' => 'string',
        'gmx_warmup_plan' => 'string',
        'mailru_warmup_plan' => 'string',
        'icloud_warmup_plan' => 'string',
        'zoho_warmup_plan' => 'string',
        'qq_warmup_plan' => 'string',
        'default_warmup_plan' => 'string',
        'att_warmup_plan' => 'string',
        'office365_warmup_plan' => 'string',
        'googleworkspace_warmup_plan' => 'string',
        'proofpoint_warmup_plan' => 'string',
        'mimecast_warmup_plan' => 'string',
        'barracuda_warmup_plan' => 'string',
        'ciscoironport_warmup_plan' => 'string',
        'rackspace_warmup_plan' => 'string',
        'zohobusiness_warmup_plan' => 'string',
        'amazonworkmail_warmup_plan' => 'string',
        'symantec_warmup_plan' => 'string',
        'fortinet_warmup_plan' => 'string',
        'sophos_warmup_plan' => 'string',
        'trendmicro_warmup_plan' => 'string',
        'checkpoint_warmup_plan' => 'string',
        'created' => 'int',
        'updated' => 'int',
        'warmup_interval' => 'int'
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
        'gmail_warmup_plan' => null,
        'yahoo_warmup_plan' => null,
        'aol_warmup_plan' => null,
        'microsoft_warmup_plan' => null,
        'comcast_warmup_plan' => null,
        'yandex_warmup_plan' => null,
        'gmx_warmup_plan' => null,
        'mailru_warmup_plan' => null,
        'icloud_warmup_plan' => null,
        'zoho_warmup_plan' => null,
        'qq_warmup_plan' => null,
        'default_warmup_plan' => null,
        'att_warmup_plan' => null,
        'office365_warmup_plan' => null,
        'googleworkspace_warmup_plan' => null,
        'proofpoint_warmup_plan' => null,
        'mimecast_warmup_plan' => null,
        'barracuda_warmup_plan' => null,
        'ciscoironport_warmup_plan' => null,
        'rackspace_warmup_plan' => null,
        'zohobusiness_warmup_plan' => null,
        'amazonworkmail_warmup_plan' => null,
        'symantec_warmup_plan' => null,
        'fortinet_warmup_plan' => null,
        'sophos_warmup_plan' => null,
        'trendmicro_warmup_plan' => null,
        'checkpoint_warmup_plan' => null,
        'created' => 'int64',
        'updated' => 'int64',
        'warmup_interval' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'name' => false,
        'gmail_warmup_plan' => false,
        'yahoo_warmup_plan' => false,
        'aol_warmup_plan' => false,
        'microsoft_warmup_plan' => false,
        'comcast_warmup_plan' => false,
        'yandex_warmup_plan' => false,
        'gmx_warmup_plan' => false,
        'mailru_warmup_plan' => false,
        'icloud_warmup_plan' => false,
        'zoho_warmup_plan' => false,
        'qq_warmup_plan' => false,
        'default_warmup_plan' => false,
        'att_warmup_plan' => false,
        'office365_warmup_plan' => false,
        'googleworkspace_warmup_plan' => false,
        'proofpoint_warmup_plan' => false,
        'mimecast_warmup_plan' => false,
        'barracuda_warmup_plan' => false,
        'ciscoironport_warmup_plan' => false,
        'rackspace_warmup_plan' => false,
        'zohobusiness_warmup_plan' => false,
        'amazonworkmail_warmup_plan' => false,
        'symantec_warmup_plan' => false,
        'fortinet_warmup_plan' => false,
        'sophos_warmup_plan' => false,
        'trendmicro_warmup_plan' => false,
        'checkpoint_warmup_plan' => false,
        'created' => false,
        'updated' => false,
        'warmup_interval' => false
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
        'gmail_warmup_plan' => 'gmailWarmupPlan',
        'yahoo_warmup_plan' => 'yahooWarmupPlan',
        'aol_warmup_plan' => 'aolWarmupPlan',
        'microsoft_warmup_plan' => 'microsoftWarmupPlan',
        'comcast_warmup_plan' => 'comcastWarmupPlan',
        'yandex_warmup_plan' => 'yandexWarmupPlan',
        'gmx_warmup_plan' => 'gmxWarmupPlan',
        'mailru_warmup_plan' => 'mailruWarmupPlan',
        'icloud_warmup_plan' => 'icloudWarmupPlan',
        'zoho_warmup_plan' => 'zohoWarmupPlan',
        'qq_warmup_plan' => 'qqWarmupPlan',
        'default_warmup_plan' => 'defaultWarmupPlan',
        'att_warmup_plan' => 'attWarmupPlan',
        'office365_warmup_plan' => 'office365WarmupPlan',
        'googleworkspace_warmup_plan' => 'googleworkspaceWarmupPlan',
        'proofpoint_warmup_plan' => 'proofpointWarmupPlan',
        'mimecast_warmup_plan' => 'mimecastWarmupPlan',
        'barracuda_warmup_plan' => 'barracudaWarmupPlan',
        'ciscoironport_warmup_plan' => 'ciscoironportWarmupPlan',
        'rackspace_warmup_plan' => 'rackspaceWarmupPlan',
        'zohobusiness_warmup_plan' => 'zohobusinessWarmupPlan',
        'amazonworkmail_warmup_plan' => 'amazonworkmailWarmupPlan',
        'symantec_warmup_plan' => 'symantecWarmupPlan',
        'fortinet_warmup_plan' => 'fortinetWarmupPlan',
        'sophos_warmup_plan' => 'sophosWarmupPlan',
        'trendmicro_warmup_plan' => 'trendmicroWarmupPlan',
        'checkpoint_warmup_plan' => 'checkpointWarmupPlan',
        'created' => 'created',
        'updated' => 'updated',
        'warmup_interval' => 'warmupInterval'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'gmail_warmup_plan' => 'setGmailWarmupPlan',
        'yahoo_warmup_plan' => 'setYahooWarmupPlan',
        'aol_warmup_plan' => 'setAolWarmupPlan',
        'microsoft_warmup_plan' => 'setMicrosoftWarmupPlan',
        'comcast_warmup_plan' => 'setComcastWarmupPlan',
        'yandex_warmup_plan' => 'setYandexWarmupPlan',
        'gmx_warmup_plan' => 'setGmxWarmupPlan',
        'mailru_warmup_plan' => 'setMailruWarmupPlan',
        'icloud_warmup_plan' => 'setIcloudWarmupPlan',
        'zoho_warmup_plan' => 'setZohoWarmupPlan',
        'qq_warmup_plan' => 'setQqWarmupPlan',
        'default_warmup_plan' => 'setDefaultWarmupPlan',
        'att_warmup_plan' => 'setAttWarmupPlan',
        'office365_warmup_plan' => 'setOffice365WarmupPlan',
        'googleworkspace_warmup_plan' => 'setGoogleworkspaceWarmupPlan',
        'proofpoint_warmup_plan' => 'setProofpointWarmupPlan',
        'mimecast_warmup_plan' => 'setMimecastWarmupPlan',
        'barracuda_warmup_plan' => 'setBarracudaWarmupPlan',
        'ciscoironport_warmup_plan' => 'setCiscoironportWarmupPlan',
        'rackspace_warmup_plan' => 'setRackspaceWarmupPlan',
        'zohobusiness_warmup_plan' => 'setZohobusinessWarmupPlan',
        'amazonworkmail_warmup_plan' => 'setAmazonworkmailWarmupPlan',
        'symantec_warmup_plan' => 'setSymantecWarmupPlan',
        'fortinet_warmup_plan' => 'setFortinetWarmupPlan',
        'sophos_warmup_plan' => 'setSophosWarmupPlan',
        'trendmicro_warmup_plan' => 'setTrendmicroWarmupPlan',
        'checkpoint_warmup_plan' => 'setCheckpointWarmupPlan',
        'created' => 'setCreated',
        'updated' => 'setUpdated',
        'warmup_interval' => 'setWarmupInterval'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'gmail_warmup_plan' => 'getGmailWarmupPlan',
        'yahoo_warmup_plan' => 'getYahooWarmupPlan',
        'aol_warmup_plan' => 'getAolWarmupPlan',
        'microsoft_warmup_plan' => 'getMicrosoftWarmupPlan',
        'comcast_warmup_plan' => 'getComcastWarmupPlan',
        'yandex_warmup_plan' => 'getYandexWarmupPlan',
        'gmx_warmup_plan' => 'getGmxWarmupPlan',
        'mailru_warmup_plan' => 'getMailruWarmupPlan',
        'icloud_warmup_plan' => 'getIcloudWarmupPlan',
        'zoho_warmup_plan' => 'getZohoWarmupPlan',
        'qq_warmup_plan' => 'getQqWarmupPlan',
        'default_warmup_plan' => 'getDefaultWarmupPlan',
        'att_warmup_plan' => 'getAttWarmupPlan',
        'office365_warmup_plan' => 'getOffice365WarmupPlan',
        'googleworkspace_warmup_plan' => 'getGoogleworkspaceWarmupPlan',
        'proofpoint_warmup_plan' => 'getProofpointWarmupPlan',
        'mimecast_warmup_plan' => 'getMimecastWarmupPlan',
        'barracuda_warmup_plan' => 'getBarracudaWarmupPlan',
        'ciscoironport_warmup_plan' => 'getCiscoironportWarmupPlan',
        'rackspace_warmup_plan' => 'getRackspaceWarmupPlan',
        'zohobusiness_warmup_plan' => 'getZohobusinessWarmupPlan',
        'amazonworkmail_warmup_plan' => 'getAmazonworkmailWarmupPlan',
        'symantec_warmup_plan' => 'getSymantecWarmupPlan',
        'fortinet_warmup_plan' => 'getFortinetWarmupPlan',
        'sophos_warmup_plan' => 'getSophosWarmupPlan',
        'trendmicro_warmup_plan' => 'getTrendmicroWarmupPlan',
        'checkpoint_warmup_plan' => 'getCheckpointWarmupPlan',
        'created' => 'getCreated',
        'updated' => 'getUpdated',
        'warmup_interval' => 'getWarmupInterval'
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
        $this->setIfExists('gmail_warmup_plan', $data ?? [], null);
        $this->setIfExists('yahoo_warmup_plan', $data ?? [], null);
        $this->setIfExists('aol_warmup_plan', $data ?? [], null);
        $this->setIfExists('microsoft_warmup_plan', $data ?? [], null);
        $this->setIfExists('comcast_warmup_plan', $data ?? [], null);
        $this->setIfExists('yandex_warmup_plan', $data ?? [], null);
        $this->setIfExists('gmx_warmup_plan', $data ?? [], null);
        $this->setIfExists('mailru_warmup_plan', $data ?? [], null);
        $this->setIfExists('icloud_warmup_plan', $data ?? [], null);
        $this->setIfExists('zoho_warmup_plan', $data ?? [], null);
        $this->setIfExists('qq_warmup_plan', $data ?? [], null);
        $this->setIfExists('default_warmup_plan', $data ?? [], null);
        $this->setIfExists('att_warmup_plan', $data ?? [], null);
        $this->setIfExists('office365_warmup_plan', $data ?? [], null);
        $this->setIfExists('googleworkspace_warmup_plan', $data ?? [], null);
        $this->setIfExists('proofpoint_warmup_plan', $data ?? [], null);
        $this->setIfExists('mimecast_warmup_plan', $data ?? [], null);
        $this->setIfExists('barracuda_warmup_plan', $data ?? [], null);
        $this->setIfExists('ciscoironport_warmup_plan', $data ?? [], null);
        $this->setIfExists('rackspace_warmup_plan', $data ?? [], null);
        $this->setIfExists('zohobusiness_warmup_plan', $data ?? [], null);
        $this->setIfExists('amazonworkmail_warmup_plan', $data ?? [], null);
        $this->setIfExists('symantec_warmup_plan', $data ?? [], null);
        $this->setIfExists('fortinet_warmup_plan', $data ?? [], null);
        $this->setIfExists('sophos_warmup_plan', $data ?? [], null);
        $this->setIfExists('trendmicro_warmup_plan', $data ?? [], null);
        $this->setIfExists('checkpoint_warmup_plan', $data ?? [], null);
        $this->setIfExists('created', $data ?? [], null);
        $this->setIfExists('updated', $data ?? [], null);
        $this->setIfExists('warmup_interval', $data ?? [], null);
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
     * @param int|null $id Unique ID for the auto-warmup plan
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
     * @param string|null $name Name of the auto-warmup plan
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
     * Gets gmail_warmup_plan
     *
     * @return string|null
     */
    public function getGmailWarmupPlan()
    {
        return $this->container['gmail_warmup_plan'];
    }

    /**
     * Sets gmail_warmup_plan
     *
     * @param string|null $gmail_warmup_plan Gmail warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setGmailWarmupPlan($gmail_warmup_plan)
    {
        if (is_null($gmail_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable gmail_warmup_plan cannot be null');
        }
        $this->container['gmail_warmup_plan'] = $gmail_warmup_plan;

        return $this;
    }

    /**
     * Gets yahoo_warmup_plan
     *
     * @return string|null
     */
    public function getYahooWarmupPlan()
    {
        return $this->container['yahoo_warmup_plan'];
    }

    /**
     * Sets yahoo_warmup_plan
     *
     * @param string|null $yahoo_warmup_plan Yahoo warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setYahooWarmupPlan($yahoo_warmup_plan)
    {
        if (is_null($yahoo_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable yahoo_warmup_plan cannot be null');
        }
        $this->container['yahoo_warmup_plan'] = $yahoo_warmup_plan;

        return $this;
    }

    /**
     * Gets aol_warmup_plan
     *
     * @return string|null
     */
    public function getAolWarmupPlan()
    {
        return $this->container['aol_warmup_plan'];
    }

    /**
     * Sets aol_warmup_plan
     *
     * @param string|null $aol_warmup_plan AOL warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setAolWarmupPlan($aol_warmup_plan)
    {
        if (is_null($aol_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable aol_warmup_plan cannot be null');
        }
        $this->container['aol_warmup_plan'] = $aol_warmup_plan;

        return $this;
    }

    /**
     * Gets microsoft_warmup_plan
     *
     * @return string|null
     */
    public function getMicrosoftWarmupPlan()
    {
        return $this->container['microsoft_warmup_plan'];
    }

    /**
     * Sets microsoft_warmup_plan
     *
     * @param string|null $microsoft_warmup_plan Microsoft warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setMicrosoftWarmupPlan($microsoft_warmup_plan)
    {
        if (is_null($microsoft_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable microsoft_warmup_plan cannot be null');
        }
        $this->container['microsoft_warmup_plan'] = $microsoft_warmup_plan;

        return $this;
    }

    /**
     * Gets comcast_warmup_plan
     *
     * @return string|null
     */
    public function getComcastWarmupPlan()
    {
        return $this->container['comcast_warmup_plan'];
    }

    /**
     * Sets comcast_warmup_plan
     *
     * @param string|null $comcast_warmup_plan Comcast warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setComcastWarmupPlan($comcast_warmup_plan)
    {
        if (is_null($comcast_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable comcast_warmup_plan cannot be null');
        }
        $this->container['comcast_warmup_plan'] = $comcast_warmup_plan;

        return $this;
    }

    /**
     * Gets yandex_warmup_plan
     *
     * @return string|null
     */
    public function getYandexWarmupPlan()
    {
        return $this->container['yandex_warmup_plan'];
    }

    /**
     * Sets yandex_warmup_plan
     *
     * @param string|null $yandex_warmup_plan Yandex warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setYandexWarmupPlan($yandex_warmup_plan)
    {
        if (is_null($yandex_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable yandex_warmup_plan cannot be null');
        }
        $this->container['yandex_warmup_plan'] = $yandex_warmup_plan;

        return $this;
    }

    /**
     * Gets gmx_warmup_plan
     *
     * @return string|null
     */
    public function getGmxWarmupPlan()
    {
        return $this->container['gmx_warmup_plan'];
    }

    /**
     * Sets gmx_warmup_plan
     *
     * @param string|null $gmx_warmup_plan GMX warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setGmxWarmupPlan($gmx_warmup_plan)
    {
        if (is_null($gmx_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable gmx_warmup_plan cannot be null');
        }
        $this->container['gmx_warmup_plan'] = $gmx_warmup_plan;

        return $this;
    }

    /**
     * Gets mailru_warmup_plan
     *
     * @return string|null
     */
    public function getMailruWarmupPlan()
    {
        return $this->container['mailru_warmup_plan'];
    }

    /**
     * Sets mailru_warmup_plan
     *
     * @param string|null $mailru_warmup_plan Mail.ru warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setMailruWarmupPlan($mailru_warmup_plan)
    {
        if (is_null($mailru_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable mailru_warmup_plan cannot be null');
        }
        $this->container['mailru_warmup_plan'] = $mailru_warmup_plan;

        return $this;
    }

    /**
     * Gets icloud_warmup_plan
     *
     * @return string|null
     */
    public function getIcloudWarmupPlan()
    {
        return $this->container['icloud_warmup_plan'];
    }

    /**
     * Sets icloud_warmup_plan
     *
     * @param string|null $icloud_warmup_plan iCloud warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setIcloudWarmupPlan($icloud_warmup_plan)
    {
        if (is_null($icloud_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable icloud_warmup_plan cannot be null');
        }
        $this->container['icloud_warmup_plan'] = $icloud_warmup_plan;

        return $this;
    }

    /**
     * Gets zoho_warmup_plan
     *
     * @return string|null
     */
    public function getZohoWarmupPlan()
    {
        return $this->container['zoho_warmup_plan'];
    }

    /**
     * Sets zoho_warmup_plan
     *
     * @param string|null $zoho_warmup_plan Zoho warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setZohoWarmupPlan($zoho_warmup_plan)
    {
        if (is_null($zoho_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable zoho_warmup_plan cannot be null');
        }
        $this->container['zoho_warmup_plan'] = $zoho_warmup_plan;

        return $this;
    }

    /**
     * Gets qq_warmup_plan
     *
     * @return string|null
     */
    public function getQqWarmupPlan()
    {
        return $this->container['qq_warmup_plan'];
    }

    /**
     * Sets qq_warmup_plan
     *
     * @param string|null $qq_warmup_plan QQ warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setQqWarmupPlan($qq_warmup_plan)
    {
        if (is_null($qq_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable qq_warmup_plan cannot be null');
        }
        $this->container['qq_warmup_plan'] = $qq_warmup_plan;

        return $this;
    }

    /**
     * Gets default_warmup_plan
     *
     * @return string|null
     */
    public function getDefaultWarmupPlan()
    {
        return $this->container['default_warmup_plan'];
    }

    /**
     * Sets default_warmup_plan
     *
     * @param string|null $default_warmup_plan Default warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setDefaultWarmupPlan($default_warmup_plan)
    {
        if (is_null($default_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable default_warmup_plan cannot be null');
        }
        $this->container['default_warmup_plan'] = $default_warmup_plan;

        return $this;
    }

    /**
     * Gets att_warmup_plan
     *
     * @return string|null
     */
    public function getAttWarmupPlan()
    {
        return $this->container['att_warmup_plan'];
    }

    /**
     * Sets att_warmup_plan
     *
     * @param string|null $att_warmup_plan AT&T warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setAttWarmupPlan($att_warmup_plan)
    {
        if (is_null($att_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable att_warmup_plan cannot be null');
        }
        $this->container['att_warmup_plan'] = $att_warmup_plan;

        return $this;
    }

    /**
     * Gets office365_warmup_plan
     *
     * @return string|null
     */
    public function getOffice365WarmupPlan()
    {
        return $this->container['office365_warmup_plan'];
    }

    /**
     * Sets office365_warmup_plan
     *
     * @param string|null $office365_warmup_plan Office365 warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setOffice365WarmupPlan($office365_warmup_plan)
    {
        if (is_null($office365_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable office365_warmup_plan cannot be null');
        }
        $this->container['office365_warmup_plan'] = $office365_warmup_plan;

        return $this;
    }

    /**
     * Gets googleworkspace_warmup_plan
     *
     * @return string|null
     */
    public function getGoogleworkspaceWarmupPlan()
    {
        return $this->container['googleworkspace_warmup_plan'];
    }

    /**
     * Sets googleworkspace_warmup_plan
     *
     * @param string|null $googleworkspace_warmup_plan Google Workspace warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setGoogleworkspaceWarmupPlan($googleworkspace_warmup_plan)
    {
        if (is_null($googleworkspace_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable googleworkspace_warmup_plan cannot be null');
        }
        $this->container['googleworkspace_warmup_plan'] = $googleworkspace_warmup_plan;

        return $this;
    }

    /**
     * Gets proofpoint_warmup_plan
     *
     * @return string|null
     */
    public function getProofpointWarmupPlan()
    {
        return $this->container['proofpoint_warmup_plan'];
    }

    /**
     * Sets proofpoint_warmup_plan
     *
     * @param string|null $proofpoint_warmup_plan Proofpoint warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setProofpointWarmupPlan($proofpoint_warmup_plan)
    {
        if (is_null($proofpoint_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable proofpoint_warmup_plan cannot be null');
        }
        $this->container['proofpoint_warmup_plan'] = $proofpoint_warmup_plan;

        return $this;
    }

    /**
     * Gets mimecast_warmup_plan
     *
     * @return string|null
     */
    public function getMimecastWarmupPlan()
    {
        return $this->container['mimecast_warmup_plan'];
    }

    /**
     * Sets mimecast_warmup_plan
     *
     * @param string|null $mimecast_warmup_plan Mimecast warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setMimecastWarmupPlan($mimecast_warmup_plan)
    {
        if (is_null($mimecast_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable mimecast_warmup_plan cannot be null');
        }
        $this->container['mimecast_warmup_plan'] = $mimecast_warmup_plan;

        return $this;
    }

    /**
     * Gets barracuda_warmup_plan
     *
     * @return string|null
     */
    public function getBarracudaWarmupPlan()
    {
        return $this->container['barracuda_warmup_plan'];
    }

    /**
     * Sets barracuda_warmup_plan
     *
     * @param string|null $barracuda_warmup_plan Barracuda warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setBarracudaWarmupPlan($barracuda_warmup_plan)
    {
        if (is_null($barracuda_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable barracuda_warmup_plan cannot be null');
        }
        $this->container['barracuda_warmup_plan'] = $barracuda_warmup_plan;

        return $this;
    }

    /**
     * Gets ciscoironport_warmup_plan
     *
     * @return string|null
     */
    public function getCiscoironportWarmupPlan()
    {
        return $this->container['ciscoironport_warmup_plan'];
    }

    /**
     * Sets ciscoironport_warmup_plan
     *
     * @param string|null $ciscoironport_warmup_plan Cisco IronPort warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setCiscoironportWarmupPlan($ciscoironport_warmup_plan)
    {
        if (is_null($ciscoironport_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable ciscoironport_warmup_plan cannot be null');
        }
        $this->container['ciscoironport_warmup_plan'] = $ciscoironport_warmup_plan;

        return $this;
    }

    /**
     * Gets rackspace_warmup_plan
     *
     * @return string|null
     */
    public function getRackspaceWarmupPlan()
    {
        return $this->container['rackspace_warmup_plan'];
    }

    /**
     * Sets rackspace_warmup_plan
     *
     * @param string|null $rackspace_warmup_plan Rackspace warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setRackspaceWarmupPlan($rackspace_warmup_plan)
    {
        if (is_null($rackspace_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable rackspace_warmup_plan cannot be null');
        }
        $this->container['rackspace_warmup_plan'] = $rackspace_warmup_plan;

        return $this;
    }

    /**
     * Gets zohobusiness_warmup_plan
     *
     * @return string|null
     */
    public function getZohobusinessWarmupPlan()
    {
        return $this->container['zohobusiness_warmup_plan'];
    }

    /**
     * Sets zohobusiness_warmup_plan
     *
     * @param string|null $zohobusiness_warmup_plan Zoho Business warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setZohobusinessWarmupPlan($zohobusiness_warmup_plan)
    {
        if (is_null($zohobusiness_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable zohobusiness_warmup_plan cannot be null');
        }
        $this->container['zohobusiness_warmup_plan'] = $zohobusiness_warmup_plan;

        return $this;
    }

    /**
     * Gets amazonworkmail_warmup_plan
     *
     * @return string|null
     */
    public function getAmazonworkmailWarmupPlan()
    {
        return $this->container['amazonworkmail_warmup_plan'];
    }

    /**
     * Sets amazonworkmail_warmup_plan
     *
     * @param string|null $amazonworkmail_warmup_plan Amazon WorkMail warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setAmazonworkmailWarmupPlan($amazonworkmail_warmup_plan)
    {
        if (is_null($amazonworkmail_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable amazonworkmail_warmup_plan cannot be null');
        }
        $this->container['amazonworkmail_warmup_plan'] = $amazonworkmail_warmup_plan;

        return $this;
    }

    /**
     * Gets symantec_warmup_plan
     *
     * @return string|null
     */
    public function getSymantecWarmupPlan()
    {
        return $this->container['symantec_warmup_plan'];
    }

    /**
     * Sets symantec_warmup_plan
     *
     * @param string|null $symantec_warmup_plan Symantec warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setSymantecWarmupPlan($symantec_warmup_plan)
    {
        if (is_null($symantec_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable symantec_warmup_plan cannot be null');
        }
        $this->container['symantec_warmup_plan'] = $symantec_warmup_plan;

        return $this;
    }

    /**
     * Gets fortinet_warmup_plan
     *
     * @return string|null
     */
    public function getFortinetWarmupPlan()
    {
        return $this->container['fortinet_warmup_plan'];
    }

    /**
     * Sets fortinet_warmup_plan
     *
     * @param string|null $fortinet_warmup_plan Fortinet warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setFortinetWarmupPlan($fortinet_warmup_plan)
    {
        if (is_null($fortinet_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable fortinet_warmup_plan cannot be null');
        }
        $this->container['fortinet_warmup_plan'] = $fortinet_warmup_plan;

        return $this;
    }

    /**
     * Gets sophos_warmup_plan
     *
     * @return string|null
     */
    public function getSophosWarmupPlan()
    {
        return $this->container['sophos_warmup_plan'];
    }

    /**
     * Sets sophos_warmup_plan
     *
     * @param string|null $sophos_warmup_plan Sophos warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setSophosWarmupPlan($sophos_warmup_plan)
    {
        if (is_null($sophos_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable sophos_warmup_plan cannot be null');
        }
        $this->container['sophos_warmup_plan'] = $sophos_warmup_plan;

        return $this;
    }

    /**
     * Gets trendmicro_warmup_plan
     *
     * @return string|null
     */
    public function getTrendmicroWarmupPlan()
    {
        return $this->container['trendmicro_warmup_plan'];
    }

    /**
     * Sets trendmicro_warmup_plan
     *
     * @param string|null $trendmicro_warmup_plan Trend Micro warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setTrendmicroWarmupPlan($trendmicro_warmup_plan)
    {
        if (is_null($trendmicro_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable trendmicro_warmup_plan cannot be null');
        }
        $this->container['trendmicro_warmup_plan'] = $trendmicro_warmup_plan;

        return $this;
    }

    /**
     * Gets checkpoint_warmup_plan
     *
     * @return string|null
     */
    public function getCheckpointWarmupPlan()
    {
        return $this->container['checkpoint_warmup_plan'];
    }

    /**
     * Sets checkpoint_warmup_plan
     *
     * @param string|null $checkpoint_warmup_plan Checkpoint warmup plan configuration in JSON format
     *
     * @return self
     */
    public function setCheckpointWarmupPlan($checkpoint_warmup_plan)
    {
        if (is_null($checkpoint_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable checkpoint_warmup_plan cannot be null');
        }
        $this->container['checkpoint_warmup_plan'] = $checkpoint_warmup_plan;

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
     * @param int|null $created UNIX epoch nano timestamp when the warmup plan was created
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
     * Gets updated
     *
     * @return int|null
     */
    public function getUpdated()
    {
        return $this->container['updated'];
    }

    /**
     * Sets updated
     *
     * @param int|null $updated UNIX epoch nano timestamp when the warmup plan was last updated
     *
     * @return self
     */
    public function setUpdated($updated)
    {
        if (is_null($updated)) {
            throw new \InvalidArgumentException('non-nullable updated cannot be null');
        }
        $this->container['updated'] = $updated;

        return $this;
    }

    /**
     * Gets warmup_interval
     *
     * @return int|null
     */
    public function getWarmupInterval()
    {
        return $this->container['warmup_interval'];
    }

    /**
     * Sets warmup_interval
     *
     * @param int|null $warmup_interval Warmup interval in hours
     *
     * @return self
     */
    public function setWarmupInterval($warmup_interval)
    {
        if (is_null($warmup_interval)) {
            throw new \InvalidArgumentException('non-nullable warmup_interval cannot be null');
        }
        $this->container['warmup_interval'] = $warmup_interval;

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


