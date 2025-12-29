# sendpost\WebhookApi

All URIs are relative to https://api.sendpost.io/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createWebhook()**](WebhookApi.md#createWebhook) | **POST** /account/webhook | Create Webhook |
| [**deleteWebhook()**](WebhookApi.md#deleteWebhook) | **DELETE** /account/webhook/{webhook_id} | Delete Webhook |
| [**getAllWebhooks()**](WebhookApi.md#getAllWebhooks) | **GET** /account/webhook | List Webhooks |
| [**getWebhook()**](WebhookApi.md#getWebhook) | **GET** /account/webhook/{webhook_id} | Get Webhook |
| [**updateWebhook()**](WebhookApi.md#updateWebhook) | **PUT** /account/webhook/{webhook_id} | Update Webhook |


## `createWebhook()`

```php
createWebhook($create_webhook_request): \sendpost\model\Webhook
```

Create Webhook

Create a new webhook by specifying its properties.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_webhook_request = new \sendpost\model\CreateWebhookRequest(); // \sendpost\model\CreateWebhookRequest

try {
    $result = $apiInstance->createWebhook($create_webhook_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookApi->createWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_webhook_request** | [**\sendpost\model\CreateWebhookRequest**](../Model/CreateWebhookRequest.md)|  | |

### Return type

[**\sendpost\model\Webhook**](../Model/Webhook.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteWebhook()`

```php
deleteWebhook($webhook_id): \sendpost\model\DeleteWebhookResponse
```

Delete Webhook

Delete a webhook by its ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_id = 117; // int | ID of the webhook to delete.

try {
    $result = $apiInstance->deleteWebhook($webhook_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookApi->deleteWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_id** | **int**| ID of the webhook to delete. | |

### Return type

[**\sendpost\model\DeleteWebhookResponse**](../Model/DeleteWebhookResponse.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllWebhooks()`

```php
getAllWebhooks($limit, $offset, $search): \sendpost\model\Webhook[]
```

List Webhooks

Retrieves a list of all webhooks, their endpoints, and the events for which they are active.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 10; // int | Number of records to return per request.
$offset = 0; // int | Number of initial records to skip.
$search = hooli; // string | Case insensitive search against webhook URL.

try {
    $result = $apiInstance->getAllWebhooks($limit, $offset, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookApi->getAllWebhooks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Number of records to return per request. | [optional] |
| **offset** | **int**| Number of initial records to skip. | [optional] |
| **search** | **string**| Case insensitive search against webhook URL. | [optional] |

### Return type

[**\sendpost\model\Webhook[]**](../Model/Webhook.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebhook()`

```php
getWebhook($webhook_id): \sendpost\model\Webhook
```

Get Webhook

Retrieves a specific webhook based on its ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhook_id = 117; // int | The ID of the webhook to retrieve.

try {
    $result = $apiInstance->getWebhook($webhook_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookApi->getWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_id** | **int**| The ID of the webhook to retrieve. | |

### Return type

[**\sendpost\model\Webhook**](../Model/Webhook.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateWebhook()`

```php
updateWebhook($update_webhook, $webhook_id): \sendpost\model\Webhook
```

Update Webhook

Update the properties of an existing webhook.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\WebhookApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$update_webhook = new \sendpost\model\UpdateWebhook(); // \sendpost\model\UpdateWebhook
$webhook_id = 117; // int | ID of the webhook to update.

try {
    $result = $apiInstance->updateWebhook($update_webhook, $webhook_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhookApi->updateWebhook: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **update_webhook** | [**\sendpost\model\UpdateWebhook**](../Model/UpdateWebhook.md)|  | |
| **webhook_id** | **int**| ID of the webhook to update. | |

### Return type

[**\sendpost\model\Webhook**](../Model/Webhook.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
