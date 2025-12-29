# sendpost\IPPoolsApi

All URIs are relative to https://api.sendpost.io/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createIPPool()**](IPPoolsApi.md#createIPPool) | **POST** /account/ippool | Create IPPool |
| [**deleteIPPool()**](IPPoolsApi.md#deleteIPPool) | **DELETE** /account/ippool/{ippool_id} | Delete IPPool |
| [**getAllIPPools()**](IPPoolsApi.md#getAllIPPools) | **GET** /account/ippool | List IPPools |
| [**getIPPoolById()**](IPPoolsApi.md#getIPPoolById) | **GET** /account/ippool/{ippool_id} | Get IPPool |
| [**updateIPPool()**](IPPoolsApi.md#updateIPPool) | **PUT** /account/ippool/{ippool_id} | Update IPPool |


## `createIPPool()`

```php
createIPPool($ip_pool_create_request): \sendpost\model\IPPool
```

Create IPPool

Creates a new IPPool with the specified name, IPs, and third-party sending providers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\IPPoolsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ip_pool_create_request = {"name":"Marketing Promotional","tpsps":[1],"ips":[{"publicIP":"3.238.19.87"}]}; // \sendpost\model\IPPoolCreateRequest

try {
    $result = $apiInstance->createIPPool($ip_pool_create_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPPoolsApi->createIPPool: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ip_pool_create_request** | [**\sendpost\model\IPPoolCreateRequest**](../Model/IPPoolCreateRequest.md)|  | |

### Return type

[**\sendpost\model\IPPool**](../Model/IPPool.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteIPPool()`

```php
deleteIPPool($ippool_id): \sendpost\model\IPPoolDeleteResponse
```

Delete IPPool

Delete a specific IPPool based on its ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new sendpost\Api\IPPoolsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$ippool_id = 756; // int | The ID of the IPPool to delete

try {
    $result = $apiInstance->deleteIPPool($ippool_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPPoolsApi->deleteIPPool: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ippool_id** | **int**| The ID of the IPPool to delete | |

### Return type

[**\sendpost\model\IPPoolDeleteResponse**](../Model/IPPoolDeleteResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllIPPools()`

```php
getAllIPPools($limit, $offset, $search): \sendpost\model\IPPool[]
```

List IPPools

Retrieves a list of all IPPools and information about all IPs contained in that pool.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\IPPoolsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 10; // int | Number of records to return per request
$offset = 0; // int | Number of initial records to skip
$search = Transactional; // string | Case insensitive search against IPPool name

try {
    $result = $apiInstance->getAllIPPools($limit, $offset, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPPoolsApi->getAllIPPools: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Number of records to return per request | [optional] |
| **offset** | **int**| Number of initial records to skip | [optional] |
| **search** | **string**| Case insensitive search against IPPool name | [optional] |

### Return type

[**\sendpost\model\IPPool[]**](../Model/IPPool.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getIPPoolById()`

```php
getIPPoolById($ippool_id): \sendpost\model\IPPool
```

Get IPPool

Retrieves details of a specific IPPool based on its ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\IPPoolsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ippool_id = 74; // int | The ID of the IPPool whose information you want to retrieve

try {
    $result = $apiInstance->getIPPoolById($ippool_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPPoolsApi->getIPPoolById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ippool_id** | **int**| The ID of the IPPool whose information you want to retrieve | |

### Return type

[**\sendpost\model\IPPool**](../Model/IPPool.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateIPPool()`

```php
updateIPPool($ip_pool_update_request, $ippool_id): \sendpost\model\IPPool
```

Update IPPool

Update the details of an existing IPPool by its ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new sendpost\Api\IPPoolsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$ip_pool_update_request = {"name":"Marketing Promotional","ips":[{"publicIP":"52.12.10.12"},{"publicIP":"52.10.12.17"},{"publicIP":"35.11.10.5"}]}; // \sendpost\model\IPPoolUpdateRequest
$ippool_id = 756; // int | The ID of the IPPool to update

try {
    $result = $apiInstance->updateIPPool($ip_pool_update_request, $ippool_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPPoolsApi->updateIPPool: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ip_pool_update_request** | [**\sendpost\model\IPPoolUpdateRequest**](../Model/IPPoolUpdateRequest.md)|  | |
| **ippool_id** | **int**| The ID of the IPPool to update | |

### Return type

[**\sendpost\model\IPPool**](../Model/IPPool.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
