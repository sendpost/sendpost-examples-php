# sendpost\WebhookReferenceApi

All URIs are relative to https://api.sendpost.io/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**sendPostWebhooksPost()**](WebhookReferenceApi.md#sendPostWebhooksPost) | **POST** /SendPostWebhooks | SendPost Webhook Object |


## `sendPostWebhooksPost()`

```php
sendPostWebhooksPost($webhook_object)
```

SendPost Webhook Object

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new sendpost\Api\WebhookReferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$webhook_object = new \sendpost\model\WebhookObject(); // \sendpost\model\WebhookObject

try {
    $apiInstance->sendPostWebhooksPost($webhook_object);
} catch (Exception $e) {
    echo 'Exception when calling WebhookReferenceApi->sendPostWebhooksPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhook_object** | [**\sendpost\model\WebhookObject**](../Model/WebhookObject.md)|  | [optional] |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
