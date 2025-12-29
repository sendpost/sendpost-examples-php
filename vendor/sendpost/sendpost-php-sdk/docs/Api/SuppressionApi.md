# sendpost\SuppressionApi

All URIs are relative to https://api.sendpost.io/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createSuppression()**](SuppressionApi.md#createSuppression) | **POST** /subaccount/suppression | Create Suppressions |
| [**deleteSuppression()**](SuppressionApi.md#deleteSuppression) | **DELETE** /subaccount/suppression | Delete Suppressions |
| [**getSuppressionList()**](SuppressionApi.md#getSuppressionList) | **GET** /subaccount/suppression | List Suppressions |


## `createSuppression()`

```php
createSuppression($create_suppression_request): \sendpost\model\Suppression[]
```

Create Suppressions

Creates new suppressions by posting to the suppression resource. You can specify different types of suppressions including `hardBounce`, `manual`, `unsubscribe`, and `spamComplaint`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: subAccountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-SubAccount-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-SubAccount-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\SuppressionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_suppression_request = new \sendpost\model\CreateSuppressionRequest(); // \sendpost\model\CreateSuppressionRequest

try {
    $result = $apiInstance->createSuppression($create_suppression_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionApi->createSuppression: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_suppression_request** | [**\sendpost\model\CreateSuppressionRequest**](../Model/CreateSuppressionRequest.md)|  | |

### Return type

[**\sendpost\model\Suppression[]**](../Model/Suppression.md)

### Authorization

[subAccountAuth](../../README.md#subAccountAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteSuppression()`

```php
deleteSuppression($delete_suppression_request): \sendpost\model\DeleteSuppression200ResponseInner[]
```

Delete Suppressions

Deletes one or more suppressions for a given sub-account. The request can contain a list of emails to delete specific suppressions or delete a single suppression.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: subAccountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-SubAccount-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-SubAccount-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\SuppressionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$delete_suppression_request = new \sendpost\model\DeleteSuppressionRequest(); // \sendpost\model\DeleteSuppressionRequest

try {
    $result = $apiInstance->deleteSuppression($delete_suppression_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionApi->deleteSuppression: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **delete_suppression_request** | [**\sendpost\model\DeleteSuppressionRequest**](../Model/DeleteSuppressionRequest.md)|  | |

### Return type

[**\sendpost\model\DeleteSuppression200ResponseInner[]**](../Model/DeleteSuppression200ResponseInner.md)

### Authorization

[subAccountAuth](../../README.md#subAccountAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSuppressionList()`

```php
getSuppressionList($from, $to, $limit, $offset, $search, $type): \sendpost\model\Suppression[]
```

List Suppressions

Retrieves a list of suppressions associated with a specific sub-account within a given date range. The maximum difference between `from` and `to` dates should not exceed 60 days.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: subAccountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-SubAccount-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-SubAccount-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\SuppressionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Start date for the suppression records
$to = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | End date for the suppression records (Note: `from` should be earlier than `to` and the date range should not exceed 60 days)
$limit = 20; // int | Number of records to return per request
$offset = 0; // int | Number of initial records to skip
$search = 'search_example'; // string | Case-insensitive search against suppression email
$type = 'type_example'; // string | Type of suppression. Valid values: `hardBounce`, `manual`, `spamComplaint`, `unsubscribe`

try {
    $result = $apiInstance->getSuppressionList($from, $to, $limit, $offset, $search, $type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SuppressionApi->getSuppressionList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **\DateTime**| Start date for the suppression records | |
| **to** | **\DateTime**| End date for the suppression records (Note: &#x60;from&#x60; should be earlier than &#x60;to&#x60; and the date range should not exceed 60 days) | |
| **limit** | **int**| Number of records to return per request | [optional] [default to 20] |
| **offset** | **int**| Number of initial records to skip | [optional] [default to 0] |
| **search** | **string**| Case-insensitive search against suppression email | [optional] |
| **type** | **string**| Type of suppression. Valid values: &#x60;hardBounce&#x60;, &#x60;manual&#x60;, &#x60;spamComplaint&#x60;, &#x60;unsubscribe&#x60; | [optional] |

### Return type

[**\sendpost\model\Suppression[]**](../Model/Suppression.md)

### Authorization

[subAccountAuth](../../README.md#subAccountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
