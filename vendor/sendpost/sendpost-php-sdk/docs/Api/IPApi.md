# sendpost\IPApi

All URIs are relative to https://api.sendpost.io/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**allocateNewIp()**](IPApi.md#allocateNewIp) | **PUT** /account/ip/allocate | Allocate IP |
| [**deleteIp()**](IPApi.md#deleteIp) | **DELETE** /account/ip/{ip_id} | Delete IP |
| [**getAllIps()**](IPApi.md#getAllIps) | **GET** /account/ip/ | List IPs |
| [**getSpecificIp()**](IPApi.md#getSpecificIp) | **GET** /account/ip/{ip_id} | Get IP |
| [**updateIp()**](IPApi.md#updateIp) | **PUT** /account/ip/{ip_id} | Update IP |


## `allocateNewIp()`

```php
allocateNewIp($ip_allocation_request): \sendpost\model\IP
```

Allocate IP

Allocates a new IP resource to the account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\IPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ip_allocation_request = new \sendpost\model\IPAllocationRequest(); // \sendpost\model\IPAllocationRequest

try {
    $result = $apiInstance->allocateNewIp($ip_allocation_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPApi->allocateNewIp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ip_allocation_request** | [**\sendpost\model\IPAllocationRequest**](../Model/IPAllocationRequest.md)|  | |

### Return type

[**\sendpost\model\IP**](../Model/IP.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteIp()`

```php
deleteIp($ip_id): \sendpost\model\IPDeletionResponse
```

Delete IP

Deletes a specific IP resource based on the provided IP ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\IPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ip_id = 56; // int | The ID of the IP resource to delete

try {
    $result = $apiInstance->deleteIp($ip_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPApi->deleteIp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ip_id** | **int**| The ID of the IP resource to delete | |

### Return type

[**\sendpost\model\IPDeletionResponse**](../Model/IPDeletionResponse.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllIps()`

```php
getAllIps($limit, $offset, $search): \sendpost\model\IP[]
```

List IPs

Retrieves a list of all IPs associated with the main account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\IPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 56; // int | Number of records to return per request
$offset = 56; // int | Number of initial records to skip
$search = 'search_example'; // string | Case insensitive search against IP's public IP address

try {
    $result = $apiInstance->getAllIps($limit, $offset, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPApi->getAllIps: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Number of records to return per request | [optional] |
| **offset** | **int**| Number of initial records to skip | [optional] |
| **search** | **string**| Case insensitive search against IP&#39;s public IP address | [optional] |

### Return type

[**\sendpost\model\IP[]**](../Model/IP.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSpecificIp()`

```php
getSpecificIp($ip_id): \sendpost\model\IP
```

Get IP

Retrieves detailed information about a specific IP based on the provided ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\IPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ip_id = 56; // int | The ID of the IP resource to retrieve

try {
    $result = $apiInstance->getSpecificIp($ip_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPApi->getSpecificIp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ip_id** | **int**| The ID of the IP resource to retrieve | |

### Return type

[**\sendpost\model\IP**](../Model/IP.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateIp()`

```php
updateIp($ip_update_request, $ip_id): \sendpost\model\IP
```

Update IP

Updates an existing IP resource based on the provided IP ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\IPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ip_update_request = new \sendpost\model\IPUpdateRequest(); // \sendpost\model\IPUpdateRequest
$ip_id = 56; // int | The ID of the IP resource to update

try {
    $result = $apiInstance->updateIp($ip_update_request, $ip_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPApi->updateIp: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ip_update_request** | [**\sendpost\model\IPUpdateRequest**](../Model/IPUpdateRequest.md)|  | |
| **ip_id** | **int**| The ID of the IP resource to update | |

### Return type

[**\sendpost\model\IP**](../Model/IP.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
