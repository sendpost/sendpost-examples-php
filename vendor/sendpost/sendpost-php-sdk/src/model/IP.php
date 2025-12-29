<?php
/**
 * IP
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
 * IP Class Doc Comment
 *
 * @category Class
 * @package  sendpost
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class IP implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'IP';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'public_ip' => 'string',
        'system_domain' => '\sendpost\model\Domain',
        'reverse_dns_hostname' => 'string',
        'type' => 'int',
        'gmail_settings' => 'string',
        'yahoo_settings' => 'string',
        'aol_settings' => 'string',
        'microsoft_settings' => 'string',
        'comcast_settings' => 'string',
        'yandex_settings' => 'string',
        'gmx_settings' => 'string',
        'mailru_settings' => 'string',
        'icloud_settings' => 'string',
        'zoho_settings' => 'string',
        'qq_settings' => 'string',
        'default_settings' => 'string',
        'att_settings' => 'string',
        'office365_settings' => 'string',
        'googleworkspace_settings' => 'string',
        'proofpoint_settings' => 'string',
        'mimecast_settings' => 'string',
        'barracuda_settings' => 'string',
        'ciscoironport_settings' => 'string',
        'rackspace_settings' => 'string',
        'zohobusiness_settings' => 'string',
        'amazonworkmail_settings' => 'string',
        'symantec_settings' => 'string',
        'fortinet_settings' => 'string',
        'sophos_settings' => 'string',
        'trendmicro_settings' => 'string',
        'checkpoint_settings' => 'string',
        'created' => 'int',
        'infra_classification' => 'string',
        'infra_monitor' => 'bool',
        'state' => 'int',
        'auto_warmup_plan' => '\sendpost\model\AutoWarmupPlan',
        'labels' => '\sendpost\model\Label[]'
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
        'public_ip' => null,
        'system_domain' => null,
        'reverse_dns_hostname' => null,
        'type' => null,
        'gmail_settings' => null,
        'yahoo_settings' => null,
        'aol_settings' => null,
        'microsoft_settings' => null,
        'comcast_settings' => null,
        'yandex_settings' => null,
        'gmx_settings' => null,
        'mailru_settings' => null,
        'icloud_settings' => null,
        'zoho_settings' => null,
        'qq_settings' => null,
        'default_settings' => null,
        'att_settings' => null,
        'office365_settings' => null,
        'googleworkspace_settings' => null,
        'proofpoint_settings' => null,
        'mimecast_settings' => null,
        'barracuda_settings' => null,
        'ciscoironport_settings' => null,
        'rackspace_settings' => null,
        'zohobusiness_settings' => null,
        'amazonworkmail_settings' => null,
        'symantec_settings' => null,
        'fortinet_settings' => null,
        'sophos_settings' => null,
        'trendmicro_settings' => null,
        'checkpoint_settings' => null,
        'created' => 'int64',
        'infra_classification' => null,
        'infra_monitor' => null,
        'state' => null,
        'auto_warmup_plan' => null,
        'labels' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'public_ip' => false,
        'system_domain' => false,
        'reverse_dns_hostname' => false,
        'type' => false,
        'gmail_settings' => false,
        'yahoo_settings' => false,
        'aol_settings' => false,
        'microsoft_settings' => false,
        'comcast_settings' => false,
        'yandex_settings' => false,
        'gmx_settings' => false,
        'mailru_settings' => false,
        'icloud_settings' => false,
        'zoho_settings' => false,
        'qq_settings' => false,
        'default_settings' => false,
        'att_settings' => false,
        'office365_settings' => false,
        'googleworkspace_settings' => false,
        'proofpoint_settings' => false,
        'mimecast_settings' => false,
        'barracuda_settings' => false,
        'ciscoironport_settings' => false,
        'rackspace_settings' => false,
        'zohobusiness_settings' => false,
        'amazonworkmail_settings' => false,
        'symantec_settings' => false,
        'fortinet_settings' => false,
        'sophos_settings' => false,
        'trendmicro_settings' => false,
        'checkpoint_settings' => false,
        'created' => false,
        'infra_classification' => false,
        'infra_monitor' => false,
        'state' => false,
        'auto_warmup_plan' => false,
        'labels' => false
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
        'public_ip' => 'publicIP',
        'system_domain' => 'systemDomain',
        'reverse_dns_hostname' => 'reverseDNSHostname',
        'type' => 'type',
        'gmail_settings' => 'gmailSettings',
        'yahoo_settings' => 'yahooSettings',
        'aol_settings' => 'aolSettings',
        'microsoft_settings' => 'microsoftSettings',
        'comcast_settings' => 'comcastSettings',
        'yandex_settings' => 'yandexSettings',
        'gmx_settings' => 'gmxSettings',
        'mailru_settings' => 'mailruSettings',
        'icloud_settings' => 'icloudSettings',
        'zoho_settings' => 'zohoSettings',
        'qq_settings' => 'qqSettings',
        'default_settings' => 'defaultSettings',
        'att_settings' => 'attSettings',
        'office365_settings' => 'office365Settings',
        'googleworkspace_settings' => 'googleworkspaceSettings',
        'proofpoint_settings' => 'proofpointSettings',
        'mimecast_settings' => 'mimecastSettings',
        'barracuda_settings' => 'barracudaSettings',
        'ciscoironport_settings' => 'ciscoironportSettings',
        'rackspace_settings' => 'rackspaceSettings',
        'zohobusiness_settings' => 'zohobusinessSettings',
        'amazonworkmail_settings' => 'amazonworkmailSettings',
        'symantec_settings' => 'symantecSettings',
        'fortinet_settings' => 'fortinetSettings',
        'sophos_settings' => 'sophosSettings',
        'trendmicro_settings' => 'trendmicroSettings',
        'checkpoint_settings' => 'checkpointSettings',
        'created' => 'created',
        'infra_classification' => 'infraClassification',
        'infra_monitor' => 'infraMonitor',
        'state' => 'state',
        'auto_warmup_plan' => 'autoWarmupPlan',
        'labels' => 'labels'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'public_ip' => 'setPublicIp',
        'system_domain' => 'setSystemDomain',
        'reverse_dns_hostname' => 'setReverseDnsHostname',
        'type' => 'setType',
        'gmail_settings' => 'setGmailSettings',
        'yahoo_settings' => 'setYahooSettings',
        'aol_settings' => 'setAolSettings',
        'microsoft_settings' => 'setMicrosoftSettings',
        'comcast_settings' => 'setComcastSettings',
        'yandex_settings' => 'setYandexSettings',
        'gmx_settings' => 'setGmxSettings',
        'mailru_settings' => 'setMailruSettings',
        'icloud_settings' => 'setIcloudSettings',
        'zoho_settings' => 'setZohoSettings',
        'qq_settings' => 'setQqSettings',
        'default_settings' => 'setDefaultSettings',
        'att_settings' => 'setAttSettings',
        'office365_settings' => 'setOffice365Settings',
        'googleworkspace_settings' => 'setGoogleworkspaceSettings',
        'proofpoint_settings' => 'setProofpointSettings',
        'mimecast_settings' => 'setMimecastSettings',
        'barracuda_settings' => 'setBarracudaSettings',
        'ciscoironport_settings' => 'setCiscoironportSettings',
        'rackspace_settings' => 'setRackspaceSettings',
        'zohobusiness_settings' => 'setZohobusinessSettings',
        'amazonworkmail_settings' => 'setAmazonworkmailSettings',
        'symantec_settings' => 'setSymantecSettings',
        'fortinet_settings' => 'setFortinetSettings',
        'sophos_settings' => 'setSophosSettings',
        'trendmicro_settings' => 'setTrendmicroSettings',
        'checkpoint_settings' => 'setCheckpointSettings',
        'created' => 'setCreated',
        'infra_classification' => 'setInfraClassification',
        'infra_monitor' => 'setInfraMonitor',
        'state' => 'setState',
        'auto_warmup_plan' => 'setAutoWarmupPlan',
        'labels' => 'setLabels'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'public_ip' => 'getPublicIp',
        'system_domain' => 'getSystemDomain',
        'reverse_dns_hostname' => 'getReverseDnsHostname',
        'type' => 'getType',
        'gmail_settings' => 'getGmailSettings',
        'yahoo_settings' => 'getYahooSettings',
        'aol_settings' => 'getAolSettings',
        'microsoft_settings' => 'getMicrosoftSettings',
        'comcast_settings' => 'getComcastSettings',
        'yandex_settings' => 'getYandexSettings',
        'gmx_settings' => 'getGmxSettings',
        'mailru_settings' => 'getMailruSettings',
        'icloud_settings' => 'getIcloudSettings',
        'zoho_settings' => 'getZohoSettings',
        'qq_settings' => 'getQqSettings',
        'default_settings' => 'getDefaultSettings',
        'att_settings' => 'getAttSettings',
        'office365_settings' => 'getOffice365Settings',
        'googleworkspace_settings' => 'getGoogleworkspaceSettings',
        'proofpoint_settings' => 'getProofpointSettings',
        'mimecast_settings' => 'getMimecastSettings',
        'barracuda_settings' => 'getBarracudaSettings',
        'ciscoironport_settings' => 'getCiscoironportSettings',
        'rackspace_settings' => 'getRackspaceSettings',
        'zohobusiness_settings' => 'getZohobusinessSettings',
        'amazonworkmail_settings' => 'getAmazonworkmailSettings',
        'symantec_settings' => 'getSymantecSettings',
        'fortinet_settings' => 'getFortinetSettings',
        'sophos_settings' => 'getSophosSettings',
        'trendmicro_settings' => 'getTrendmicroSettings',
        'checkpoint_settings' => 'getCheckpointSettings',
        'created' => 'getCreated',
        'infra_classification' => 'getInfraClassification',
        'infra_monitor' => 'getInfraMonitor',
        'state' => 'getState',
        'auto_warmup_plan' => 'getAutoWarmupPlan',
        'labels' => 'getLabels'
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
        $this->setIfExists('public_ip', $data ?? [], null);
        $this->setIfExists('system_domain', $data ?? [], null);
        $this->setIfExists('reverse_dns_hostname', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('gmail_settings', $data ?? [], null);
        $this->setIfExists('yahoo_settings', $data ?? [], null);
        $this->setIfExists('aol_settings', $data ?? [], null);
        $this->setIfExists('microsoft_settings', $data ?? [], null);
        $this->setIfExists('comcast_settings', $data ?? [], null);
        $this->setIfExists('yandex_settings', $data ?? [], null);
        $this->setIfExists('gmx_settings', $data ?? [], null);
        $this->setIfExists('mailru_settings', $data ?? [], null);
        $this->setIfExists('icloud_settings', $data ?? [], null);
        $this->setIfExists('zoho_settings', $data ?? [], null);
        $this->setIfExists('qq_settings', $data ?? [], null);
        $this->setIfExists('default_settings', $data ?? [], null);
        $this->setIfExists('att_settings', $data ?? [], null);
        $this->setIfExists('office365_settings', $data ?? [], null);
        $this->setIfExists('googleworkspace_settings', $data ?? [], null);
        $this->setIfExists('proofpoint_settings', $data ?? [], null);
        $this->setIfExists('mimecast_settings', $data ?? [], null);
        $this->setIfExists('barracuda_settings', $data ?? [], null);
        $this->setIfExists('ciscoironport_settings', $data ?? [], null);
        $this->setIfExists('rackspace_settings', $data ?? [], null);
        $this->setIfExists('zohobusiness_settings', $data ?? [], null);
        $this->setIfExists('amazonworkmail_settings', $data ?? [], null);
        $this->setIfExists('symantec_settings', $data ?? [], null);
        $this->setIfExists('fortinet_settings', $data ?? [], null);
        $this->setIfExists('sophos_settings', $data ?? [], null);
        $this->setIfExists('trendmicro_settings', $data ?? [], null);
        $this->setIfExists('checkpoint_settings', $data ?? [], null);
        $this->setIfExists('created', $data ?? [], null);
        $this->setIfExists('infra_classification', $data ?? [], null);
        $this->setIfExists('infra_monitor', $data ?? [], null);
        $this->setIfExists('state', $data ?? [], null);
        $this->setIfExists('auto_warmup_plan', $data ?? [], null);
        $this->setIfExists('labels', $data ?? [], null);
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

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['public_ip'] === null) {
            $invalidProperties[] = "'public_ip' can't be null";
        }
        if ($this->container['created'] === null) {
            $invalidProperties[] = "'created' can't be null";
        }
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
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id Unique ID for the IP
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
     * Gets public_ip
     *
     * @return string
     */
    public function getPublicIp()
    {
        return $this->container['public_ip'];
    }

    /**
     * Sets public_ip
     *
     * @param string $public_ip The public IP address associated with the resource
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
     * Gets system_domain
     *
     * @return \sendpost\model\Domain|null
     */
    public function getSystemDomain()
    {
        return $this->container['system_domain'];
    }

    /**
     * Sets system_domain
     *
     * @param \sendpost\model\Domain|null $system_domain system_domain
     *
     * @return self
     */
    public function setSystemDomain($system_domain)
    {
        if (is_null($system_domain)) {
            throw new \InvalidArgumentException('non-nullable system_domain cannot be null');
        }
        $this->container['system_domain'] = $system_domain;

        return $this;
    }

    /**
     * Gets reverse_dns_hostname
     *
     * @return string|null
     */
    public function getReverseDnsHostname()
    {
        return $this->container['reverse_dns_hostname'];
    }

    /**
     * Sets reverse_dns_hostname
     *
     * @param string|null $reverse_dns_hostname The reverse DNS hostname for the IP
     *
     * @return self
     */
    public function setReverseDnsHostname($reverse_dns_hostname)
    {
        if (is_null($reverse_dns_hostname)) {
            throw new \InvalidArgumentException('non-nullable reverse_dns_hostname cannot be null');
        }
        $this->container['reverse_dns_hostname'] = $reverse_dns_hostname;

        return $this;
    }

    /**
     * Gets type
     *
     * @return int|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param int|null $type Type of the IP
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets gmail_settings
     *
     * @return string|null
     */
    public function getGmailSettings()
    {
        return $this->container['gmail_settings'];
    }

    /**
     * Sets gmail_settings
     *
     * @param string|null $gmail_settings Configuration for Gmail delivery settings in JSON format
     *
     * @return self
     */
    public function setGmailSettings($gmail_settings)
    {
        if (is_null($gmail_settings)) {
            throw new \InvalidArgumentException('non-nullable gmail_settings cannot be null');
        }
        $this->container['gmail_settings'] = $gmail_settings;

        return $this;
    }

    /**
     * Gets yahoo_settings
     *
     * @return string|null
     */
    public function getYahooSettings()
    {
        return $this->container['yahoo_settings'];
    }

    /**
     * Sets yahoo_settings
     *
     * @param string|null $yahoo_settings Configuration for Yahoo delivery settings in JSON format
     *
     * @return self
     */
    public function setYahooSettings($yahoo_settings)
    {
        if (is_null($yahoo_settings)) {
            throw new \InvalidArgumentException('non-nullable yahoo_settings cannot be null');
        }
        $this->container['yahoo_settings'] = $yahoo_settings;

        return $this;
    }

    /**
     * Gets aol_settings
     *
     * @return string|null
     */
    public function getAolSettings()
    {
        return $this->container['aol_settings'];
    }

    /**
     * Sets aol_settings
     *
     * @param string|null $aol_settings Configuration for AOL delivery settings in JSON format
     *
     * @return self
     */
    public function setAolSettings($aol_settings)
    {
        if (is_null($aol_settings)) {
            throw new \InvalidArgumentException('non-nullable aol_settings cannot be null');
        }
        $this->container['aol_settings'] = $aol_settings;

        return $this;
    }

    /**
     * Gets microsoft_settings
     *
     * @return string|null
     */
    public function getMicrosoftSettings()
    {
        return $this->container['microsoft_settings'];
    }

    /**
     * Sets microsoft_settings
     *
     * @param string|null $microsoft_settings Configuration for Microsoft delivery settings in JSON format
     *
     * @return self
     */
    public function setMicrosoftSettings($microsoft_settings)
    {
        if (is_null($microsoft_settings)) {
            throw new \InvalidArgumentException('non-nullable microsoft_settings cannot be null');
        }
        $this->container['microsoft_settings'] = $microsoft_settings;

        return $this;
    }

    /**
     * Gets comcast_settings
     *
     * @return string|null
     */
    public function getComcastSettings()
    {
        return $this->container['comcast_settings'];
    }

    /**
     * Sets comcast_settings
     *
     * @param string|null $comcast_settings Configuration for Comcast delivery settings in JSON format
     *
     * @return self
     */
    public function setComcastSettings($comcast_settings)
    {
        if (is_null($comcast_settings)) {
            throw new \InvalidArgumentException('non-nullable comcast_settings cannot be null');
        }
        $this->container['comcast_settings'] = $comcast_settings;

        return $this;
    }

    /**
     * Gets yandex_settings
     *
     * @return string|null
     */
    public function getYandexSettings()
    {
        return $this->container['yandex_settings'];
    }

    /**
     * Sets yandex_settings
     *
     * @param string|null $yandex_settings Configuration for Yandex delivery settings in JSON format
     *
     * @return self
     */
    public function setYandexSettings($yandex_settings)
    {
        if (is_null($yandex_settings)) {
            throw new \InvalidArgumentException('non-nullable yandex_settings cannot be null');
        }
        $this->container['yandex_settings'] = $yandex_settings;

        return $this;
    }

    /**
     * Gets gmx_settings
     *
     * @return string|null
     */
    public function getGmxSettings()
    {
        return $this->container['gmx_settings'];
    }

    /**
     * Sets gmx_settings
     *
     * @param string|null $gmx_settings Configuration for GMX delivery settings in JSON format
     *
     * @return self
     */
    public function setGmxSettings($gmx_settings)
    {
        if (is_null($gmx_settings)) {
            throw new \InvalidArgumentException('non-nullable gmx_settings cannot be null');
        }
        $this->container['gmx_settings'] = $gmx_settings;

        return $this;
    }

    /**
     * Gets mailru_settings
     *
     * @return string|null
     */
    public function getMailruSettings()
    {
        return $this->container['mailru_settings'];
    }

    /**
     * Sets mailru_settings
     *
     * @param string|null $mailru_settings Configuration for Mail.ru delivery settings in JSON format
     *
     * @return self
     */
    public function setMailruSettings($mailru_settings)
    {
        if (is_null($mailru_settings)) {
            throw new \InvalidArgumentException('non-nullable mailru_settings cannot be null');
        }
        $this->container['mailru_settings'] = $mailru_settings;

        return $this;
    }

    /**
     * Gets icloud_settings
     *
     * @return string|null
     */
    public function getIcloudSettings()
    {
        return $this->container['icloud_settings'];
    }

    /**
     * Sets icloud_settings
     *
     * @param string|null $icloud_settings Configuration for iCloud delivery settings in JSON format
     *
     * @return self
     */
    public function setIcloudSettings($icloud_settings)
    {
        if (is_null($icloud_settings)) {
            throw new \InvalidArgumentException('non-nullable icloud_settings cannot be null');
        }
        $this->container['icloud_settings'] = $icloud_settings;

        return $this;
    }

    /**
     * Gets zoho_settings
     *
     * @return string|null
     */
    public function getZohoSettings()
    {
        return $this->container['zoho_settings'];
    }

    /**
     * Sets zoho_settings
     *
     * @param string|null $zoho_settings Configuration for Zoho delivery settings in JSON format
     *
     * @return self
     */
    public function setZohoSettings($zoho_settings)
    {
        if (is_null($zoho_settings)) {
            throw new \InvalidArgumentException('non-nullable zoho_settings cannot be null');
        }
        $this->container['zoho_settings'] = $zoho_settings;

        return $this;
    }

    /**
     * Gets qq_settings
     *
     * @return string|null
     */
    public function getQqSettings()
    {
        return $this->container['qq_settings'];
    }

    /**
     * Sets qq_settings
     *
     * @param string|null $qq_settings Configuration for QQ delivery settings in JSON format
     *
     * @return self
     */
    public function setQqSettings($qq_settings)
    {
        if (is_null($qq_settings)) {
            throw new \InvalidArgumentException('non-nullable qq_settings cannot be null');
        }
        $this->container['qq_settings'] = $qq_settings;

        return $this;
    }

    /**
     * Gets default_settings
     *
     * @return string|null
     */
    public function getDefaultSettings()
    {
        return $this->container['default_settings'];
    }

    /**
     * Sets default_settings
     *
     * @param string|null $default_settings Default delivery settings in JSON format
     *
     * @return self
     */
    public function setDefaultSettings($default_settings)
    {
        if (is_null($default_settings)) {
            throw new \InvalidArgumentException('non-nullable default_settings cannot be null');
        }
        $this->container['default_settings'] = $default_settings;

        return $this;
    }

    /**
     * Gets att_settings
     *
     * @return string|null
     */
    public function getAttSettings()
    {
        return $this->container['att_settings'];
    }

    /**
     * Sets att_settings
     *
     * @param string|null $att_settings Configuration for AT&T delivery settings in JSON format
     *
     * @return self
     */
    public function setAttSettings($att_settings)
    {
        if (is_null($att_settings)) {
            throw new \InvalidArgumentException('non-nullable att_settings cannot be null');
        }
        $this->container['att_settings'] = $att_settings;

        return $this;
    }

    /**
     * Gets office365_settings
     *
     * @return string|null
     */
    public function getOffice365Settings()
    {
        return $this->container['office365_settings'];
    }

    /**
     * Sets office365_settings
     *
     * @param string|null $office365_settings Configuration for Office365 delivery settings in JSON format
     *
     * @return self
     */
    public function setOffice365Settings($office365_settings)
    {
        if (is_null($office365_settings)) {
            throw new \InvalidArgumentException('non-nullable office365_settings cannot be null');
        }
        $this->container['office365_settings'] = $office365_settings;

        return $this;
    }

    /**
     * Gets googleworkspace_settings
     *
     * @return string|null
     */
    public function getGoogleworkspaceSettings()
    {
        return $this->container['googleworkspace_settings'];
    }

    /**
     * Sets googleworkspace_settings
     *
     * @param string|null $googleworkspace_settings Configuration for Google Workspace delivery settings in JSON format
     *
     * @return self
     */
    public function setGoogleworkspaceSettings($googleworkspace_settings)
    {
        if (is_null($googleworkspace_settings)) {
            throw new \InvalidArgumentException('non-nullable googleworkspace_settings cannot be null');
        }
        $this->container['googleworkspace_settings'] = $googleworkspace_settings;

        return $this;
    }

    /**
     * Gets proofpoint_settings
     *
     * @return string|null
     */
    public function getProofpointSettings()
    {
        return $this->container['proofpoint_settings'];
    }

    /**
     * Sets proofpoint_settings
     *
     * @param string|null $proofpoint_settings Configuration for Proofpoint delivery settings in JSON format
     *
     * @return self
     */
    public function setProofpointSettings($proofpoint_settings)
    {
        if (is_null($proofpoint_settings)) {
            throw new \InvalidArgumentException('non-nullable proofpoint_settings cannot be null');
        }
        $this->container['proofpoint_settings'] = $proofpoint_settings;

        return $this;
    }

    /**
     * Gets mimecast_settings
     *
     * @return string|null
     */
    public function getMimecastSettings()
    {
        return $this->container['mimecast_settings'];
    }

    /**
     * Sets mimecast_settings
     *
     * @param string|null $mimecast_settings Configuration for Mimecast delivery settings in JSON format
     *
     * @return self
     */
    public function setMimecastSettings($mimecast_settings)
    {
        if (is_null($mimecast_settings)) {
            throw new \InvalidArgumentException('non-nullable mimecast_settings cannot be null');
        }
        $this->container['mimecast_settings'] = $mimecast_settings;

        return $this;
    }

    /**
     * Gets barracuda_settings
     *
     * @return string|null
     */
    public function getBarracudaSettings()
    {
        return $this->container['barracuda_settings'];
    }

    /**
     * Sets barracuda_settings
     *
     * @param string|null $barracuda_settings Configuration for Barracuda delivery settings in JSON format
     *
     * @return self
     */
    public function setBarracudaSettings($barracuda_settings)
    {
        if (is_null($barracuda_settings)) {
            throw new \InvalidArgumentException('non-nullable barracuda_settings cannot be null');
        }
        $this->container['barracuda_settings'] = $barracuda_settings;

        return $this;
    }

    /**
     * Gets ciscoironport_settings
     *
     * @return string|null
     */
    public function getCiscoironportSettings()
    {
        return $this->container['ciscoironport_settings'];
    }

    /**
     * Sets ciscoironport_settings
     *
     * @param string|null $ciscoironport_settings Configuration for Cisco IronPort delivery settings in JSON format
     *
     * @return self
     */
    public function setCiscoironportSettings($ciscoironport_settings)
    {
        if (is_null($ciscoironport_settings)) {
            throw new \InvalidArgumentException('non-nullable ciscoironport_settings cannot be null');
        }
        $this->container['ciscoironport_settings'] = $ciscoironport_settings;

        return $this;
    }

    /**
     * Gets rackspace_settings
     *
     * @return string|null
     */
    public function getRackspaceSettings()
    {
        return $this->container['rackspace_settings'];
    }

    /**
     * Sets rackspace_settings
     *
     * @param string|null $rackspace_settings Configuration for Rackspace delivery settings in JSON format
     *
     * @return self
     */
    public function setRackspaceSettings($rackspace_settings)
    {
        if (is_null($rackspace_settings)) {
            throw new \InvalidArgumentException('non-nullable rackspace_settings cannot be null');
        }
        $this->container['rackspace_settings'] = $rackspace_settings;

        return $this;
    }

    /**
     * Gets zohobusiness_settings
     *
     * @return string|null
     */
    public function getZohobusinessSettings()
    {
        return $this->container['zohobusiness_settings'];
    }

    /**
     * Sets zohobusiness_settings
     *
     * @param string|null $zohobusiness_settings Configuration for Zoho Business delivery settings in JSON format
     *
     * @return self
     */
    public function setZohobusinessSettings($zohobusiness_settings)
    {
        if (is_null($zohobusiness_settings)) {
            throw new \InvalidArgumentException('non-nullable zohobusiness_settings cannot be null');
        }
        $this->container['zohobusiness_settings'] = $zohobusiness_settings;

        return $this;
    }

    /**
     * Gets amazonworkmail_settings
     *
     * @return string|null
     */
    public function getAmazonworkmailSettings()
    {
        return $this->container['amazonworkmail_settings'];
    }

    /**
     * Sets amazonworkmail_settings
     *
     * @param string|null $amazonworkmail_settings Configuration for Amazon WorkMail delivery settings in JSON format
     *
     * @return self
     */
    public function setAmazonworkmailSettings($amazonworkmail_settings)
    {
        if (is_null($amazonworkmail_settings)) {
            throw new \InvalidArgumentException('non-nullable amazonworkmail_settings cannot be null');
        }
        $this->container['amazonworkmail_settings'] = $amazonworkmail_settings;

        return $this;
    }

    /**
     * Gets symantec_settings
     *
     * @return string|null
     */
    public function getSymantecSettings()
    {
        return $this->container['symantec_settings'];
    }

    /**
     * Sets symantec_settings
     *
     * @param string|null $symantec_settings Configuration for Symantec delivery settings in JSON format
     *
     * @return self
     */
    public function setSymantecSettings($symantec_settings)
    {
        if (is_null($symantec_settings)) {
            throw new \InvalidArgumentException('non-nullable symantec_settings cannot be null');
        }
        $this->container['symantec_settings'] = $symantec_settings;

        return $this;
    }

    /**
     * Gets fortinet_settings
     *
     * @return string|null
     */
    public function getFortinetSettings()
    {
        return $this->container['fortinet_settings'];
    }

    /**
     * Sets fortinet_settings
     *
     * @param string|null $fortinet_settings Configuration for Fortinet delivery settings in JSON format
     *
     * @return self
     */
    public function setFortinetSettings($fortinet_settings)
    {
        if (is_null($fortinet_settings)) {
            throw new \InvalidArgumentException('non-nullable fortinet_settings cannot be null');
        }
        $this->container['fortinet_settings'] = $fortinet_settings;

        return $this;
    }

    /**
     * Gets sophos_settings
     *
     * @return string|null
     */
    public function getSophosSettings()
    {
        return $this->container['sophos_settings'];
    }

    /**
     * Sets sophos_settings
     *
     * @param string|null $sophos_settings Configuration for Sophos delivery settings in JSON format
     *
     * @return self
     */
    public function setSophosSettings($sophos_settings)
    {
        if (is_null($sophos_settings)) {
            throw new \InvalidArgumentException('non-nullable sophos_settings cannot be null');
        }
        $this->container['sophos_settings'] = $sophos_settings;

        return $this;
    }

    /**
     * Gets trendmicro_settings
     *
     * @return string|null
     */
    public function getTrendmicroSettings()
    {
        return $this->container['trendmicro_settings'];
    }

    /**
     * Sets trendmicro_settings
     *
     * @param string|null $trendmicro_settings Configuration for TrendMicro delivery settings in JSON format
     *
     * @return self
     */
    public function setTrendmicroSettings($trendmicro_settings)
    {
        if (is_null($trendmicro_settings)) {
            throw new \InvalidArgumentException('non-nullable trendmicro_settings cannot be null');
        }
        $this->container['trendmicro_settings'] = $trendmicro_settings;

        return $this;
    }

    /**
     * Gets checkpoint_settings
     *
     * @return string|null
     */
    public function getCheckpointSettings()
    {
        return $this->container['checkpoint_settings'];
    }

    /**
     * Sets checkpoint_settings
     *
     * @param string|null $checkpoint_settings Configuration for CheckPoint delivery settings in JSON format
     *
     * @return self
     */
    public function setCheckpointSettings($checkpoint_settings)
    {
        if (is_null($checkpoint_settings)) {
            throw new \InvalidArgumentException('non-nullable checkpoint_settings cannot be null');
        }
        $this->container['checkpoint_settings'] = $checkpoint_settings;

        return $this;
    }

    /**
     * Gets created
     *
     * @return int
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     *
     * @param int $created The timestamp (UNIX epoch) when the IP was created
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
     * Gets infra_classification
     *
     * @return string|null
     */
    public function getInfraClassification()
    {
        return $this->container['infra_classification'];
    }

    /**
     * Sets infra_classification
     *
     * @param string|null $infra_classification Classification of the infrastructure
     *
     * @return self
     */
    public function setInfraClassification($infra_classification)
    {
        if (is_null($infra_classification)) {
            throw new \InvalidArgumentException('non-nullable infra_classification cannot be null');
        }
        $this->container['infra_classification'] = $infra_classification;

        return $this;
    }

    /**
     * Gets infra_monitor
     *
     * @return bool|null
     */
    public function getInfraMonitor()
    {
        return $this->container['infra_monitor'];
    }

    /**
     * Sets infra_monitor
     *
     * @param bool|null $infra_monitor Indicates whether infrastructure monitoring is enabled
     *
     * @return self
     */
    public function setInfraMonitor($infra_monitor)
    {
        if (is_null($infra_monitor)) {
            throw new \InvalidArgumentException('non-nullable infra_monitor cannot be null');
        }
        $this->container['infra_monitor'] = $infra_monitor;

        return $this;
    }

    /**
     * Gets state
     *
     * @return int|null
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     *
     * @param int|null $state The state of the IP
     *
     * @return self
     */
    public function setState($state)
    {
        if (is_null($state)) {
            throw new \InvalidArgumentException('non-nullable state cannot be null');
        }
        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets auto_warmup_plan
     *
     * @return \sendpost\model\AutoWarmupPlan|null
     */
    public function getAutoWarmupPlan()
    {
        return $this->container['auto_warmup_plan'];
    }

    /**
     * Sets auto_warmup_plan
     *
     * @param \sendpost\model\AutoWarmupPlan|null $auto_warmup_plan The auto-warmup plan associated with the IP. Can be null if no warmup plan is assigned.
     *
     * @return self
     */
    public function setAutoWarmupPlan($auto_warmup_plan)
    {
        if (is_null($auto_warmup_plan)) {
            throw new \InvalidArgumentException('non-nullable auto_warmup_plan cannot be null');
        }
        $this->container['auto_warmup_plan'] = $auto_warmup_plan;

        return $this;
    }

    /**
     * Gets labels
     *
     * @return \sendpost\model\Label[]|null
     */
    public function getLabels()
    {
        return $this->container['labels'];
    }

    /**
     * Sets labels
     *
     * @param \sendpost\model\Label[]|null $labels Labels associated with the IP
     *
     * @return self
     */
    public function setLabels($labels)
    {
        if (is_null($labels)) {
            throw new \InvalidArgumentException('non-nullable labels cannot be null');
        }
        $this->container['labels'] = $labels;

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


