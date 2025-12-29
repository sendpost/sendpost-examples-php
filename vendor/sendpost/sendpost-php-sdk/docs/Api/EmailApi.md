# sendpost\EmailApi

All URIs are relative to https://api.sendpost.io/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**sendEmail()**](EmailApi.md#sendEmail) | **POST** /subaccount/email/ | Send Email |
| [**sendEmailWithTemplate()**](EmailApi.md#sendEmailWithTemplate) | **POST** /subaccount/email/template | Send Email With Template |


## `sendEmail()`

```php
sendEmail($email_message_object): \sendpost\model\EmailResponse[]
```

Send Email

Use this API to send either a single or batch email.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: subAccountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-SubAccount-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-SubAccount-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\EmailApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email_message_object = new \sendpost\model\EmailMessageObject(); // \sendpost\model\EmailMessageObject | Email message details

try {
    $result = $apiInstance->sendEmail($email_message_object);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailApi->sendEmail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email_message_object** | [**\sendpost\model\EmailMessageObject**](../Model/EmailMessageObject.md)| Email message details | |

### Return type

[**\sendpost\model\EmailResponse[]**](../Model/EmailResponse.md)

### Authorization

[subAccountAuth](../../README.md#subAccountAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendEmailWithTemplate()`

```php
sendEmailWithTemplate($email_message_with_template): \sendpost\model\EmailResponse[]
```

Send Email With Template

Use this API to send an email with a predefined template. This makes it easy to integrate transactional emails with minimal code.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: subAccountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-SubAccount-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-SubAccount-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\EmailApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$email_message_with_template = new \sendpost\model\EmailMessageWithTemplate(); // \sendpost\model\EmailMessageWithTemplate | Email message details with template information

try {
    $result = $apiInstance->sendEmailWithTemplate($email_message_with_template);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmailApi->sendEmailWithTemplate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **email_message_with_template** | [**\sendpost\model\EmailMessageWithTemplate**](../Model/EmailMessageWithTemplate.md)| Email message details with template information | |

### Return type

[**\sendpost\model\EmailResponse[]**](../Model/EmailResponse.md)

### Authorization

[subAccountAuth](../../README.md#subAccountAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
