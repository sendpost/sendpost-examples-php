# sendpost\DomainApi

All URIs are relative to https://api.sendpost.io/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAllDomains()**](DomainApi.md#getAllDomains) | **GET** /subaccount/domain | List Domains |
| [**subaccountDomainDomainIdDelete()**](DomainApi.md#subaccountDomainDomainIdDelete) | **DELETE** /subaccount/domain/{domain_id} | Delete Domain |
| [**subaccountDomainDomainIdGet()**](DomainApi.md#subaccountDomainDomainIdGet) | **GET** /subaccount/domain/{domain_id} | Get Domain |
| [**subaccountDomainPost()**](DomainApi.md#subaccountDomainPost) | **POST** /subaccount/domain | Create Domain |


## `getAllDomains()`

```php
getAllDomains($limit, $offset, $search): \sendpost\model\Domain[]
```

List Domains

Retrieve a list of all domains associated with the sub-account, including their DNS records and authentication status.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: subAccountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-SubAccount-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-SubAccount-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\DomainApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 56; // int | Number of records to return per request
$offset = 56; // int | Number of initial records to skip
$search = 'search_example'; // string | Case insensitive search against domain names

try {
    $result = $apiInstance->getAllDomains($limit, $offset, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainApi->getAllDomains: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Number of records to return per request | [optional] |
| **offset** | **int**| Number of initial records to skip | [optional] |
| **search** | **string**| Case insensitive search against domain names | [optional] |

### Return type

[**\sendpost\model\Domain[]**](../Model/Domain.md)

### Authorization

[subAccountAuth](../../README.md#subAccountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `subaccountDomainDomainIdDelete()`

```php
subaccountDomainDomainIdDelete($domain_id): \sendpost\model\DeleteResponse
```

Delete Domain

Delete a specific domain using its `id`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: subAccountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-SubAccount-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-SubAccount-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\DomainApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | The unique ID of the domain to delete.

try {
    $result = $apiInstance->subaccountDomainDomainIdDelete($domain_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainApi->subaccountDomainDomainIdDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| The unique ID of the domain to delete. | |

### Return type

[**\sendpost\model\DeleteResponse**](../Model/DeleteResponse.md)

### Authorization

[subAccountAuth](../../README.md#subAccountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `subaccountDomainDomainIdGet()`

```php
subaccountDomainDomainIdGet($domain_id): \sendpost\model\Domain
```

Get Domain

Retrieve details of a specific domain using its `id`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: subAccountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-SubAccount-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-SubAccount-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\DomainApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$domain_id = 'domain_id_example'; // string | The unique ID of the domain to retrieve.

try {
    $result = $apiInstance->subaccountDomainDomainIdGet($domain_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainApi->subaccountDomainDomainIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domain_id** | **string**| The unique ID of the domain to retrieve. | |

### Return type

[**\sendpost\model\Domain**](../Model/Domain.md)

### Authorization

[subAccountAuth](../../README.md#subAccountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `subaccountDomainPost()`

```php
subaccountDomainPost($create_domain_request): \sendpost\model\Domain
```

Create Domain

Add a new domain using its `name`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: subAccountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-SubAccount-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-SubAccount-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\DomainApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_domain_request = new \sendpost\model\CreateDomainRequest(); // \sendpost\model\CreateDomainRequest

try {
    $result = $apiInstance->subaccountDomainPost($create_domain_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainApi->subaccountDomainPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_domain_request** | [**\sendpost\model\CreateDomainRequest**](../Model/CreateDomainRequest.md)|  | |

### Return type

[**\sendpost\model\Domain**](../Model/Domain.md)

### Authorization

[subAccountAuth](../../README.md#subAccountAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
