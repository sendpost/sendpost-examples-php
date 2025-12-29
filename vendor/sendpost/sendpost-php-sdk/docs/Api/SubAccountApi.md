# sendpost\SubAccountApi

All URIs are relative to https://api.sendpost.io/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createSubAccount()**](SubAccountApi.md#createSubAccount) | **POST** /account/subaccount/ | Create Sub-Account |
| [**deleteSubAccount()**](SubAccountApi.md#deleteSubAccount) | **DELETE** /account/subaccount/{subaccount_id} | Delete Sub-Account |
| [**getAllSubAccounts()**](SubAccountApi.md#getAllSubAccounts) | **GET** /account/subaccount/ | List Sub-Accounts |
| [**getSubAccount()**](SubAccountApi.md#getSubAccount) | **GET** /account/subaccount/{subaccount_id} | Get Sub-Account |
| [**updateSubAccount()**](SubAccountApi.md#updateSubAccount) | **PUT** /account/subaccount/{subaccount_id} | Update Sub-Account |


## `createSubAccount()`

```php
createSubAccount($create_sub_account_request): \sendpost\model\SubAccount
```

Create Sub-Account

Creates a new sub-account under the current account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\SubAccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_sub_account_request = new \sendpost\model\CreateSubAccountRequest(); // \sendpost\model\CreateSubAccountRequest

try {
    $result = $apiInstance->createSubAccount($create_sub_account_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubAccountApi->createSubAccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_sub_account_request** | [**\sendpost\model\CreateSubAccountRequest**](../Model/CreateSubAccountRequest.md)|  | |

### Return type

[**\sendpost\model\SubAccount**](../Model/SubAccount.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteSubAccount()`

```php
deleteSubAccount($subaccount_id): \sendpost\model\DeleteSubAccountResponse
```

Delete Sub-Account

Deletes a specific sub-account by its ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\SubAccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subaccount_id = 12; // int | The ID of the sub-account to delete.

try {
    $result = $apiInstance->deleteSubAccount($subaccount_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubAccountApi->deleteSubAccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **subaccount_id** | **int**| The ID of the sub-account to delete. | |

### Return type

[**\sendpost\model\DeleteSubAccountResponse**](../Model/DeleteSubAccountResponse.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllSubAccounts()`

```php
getAllSubAccounts($limit, $offset, $search): \sendpost\model\SubAccount[]
```

List Sub-Accounts

Retrieves a list of all sub-accounts associated with a specific account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\SubAccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 10; // int | Number of records to return per request.
$offset = 0; // int | Number of initial records to skip.
$search = Hooli; // string | Case-insensitive search against the sub-account name.

try {
    $result = $apiInstance->getAllSubAccounts($limit, $offset, $search);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubAccountApi->getAllSubAccounts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Number of records to return per request. | [optional] |
| **offset** | **int**| Number of initial records to skip. | [optional] |
| **search** | **string**| Case-insensitive search against the sub-account name. | [optional] |

### Return type

[**\sendpost\model\SubAccount[]**](../Model/SubAccount.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSubAccount()`

```php
getSubAccount($subaccount_id): \sendpost\model\SubAccount
```

Get Sub-Account

Retrieves a specific sub-account by its ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\SubAccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$subaccount_id = 11; // int | The ID of the sub-account to retrieve.

try {
    $result = $apiInstance->getSubAccount($subaccount_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubAccountApi->getSubAccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **subaccount_id** | **int**| The ID of the sub-account to retrieve. | |

### Return type

[**\sendpost\model\SubAccount**](../Model/SubAccount.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateSubAccount()`

```php
updateSubAccount($update_sub_account, $subaccount_id): \sendpost\model\SubAccount
```

Update Sub-Account

Updates the details of an existing sub-account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\SubAccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$update_sub_account = new \sendpost\model\UpdateSubAccount(); // \sendpost\model\UpdateSubAccount
$subaccount_id = 12; // int | The ID of the sub-account to update.

try {
    $result = $apiInstance->updateSubAccount($update_sub_account, $subaccount_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubAccountApi->updateSubAccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **update_sub_account** | [**\sendpost\model\UpdateSubAccount**](../Model/UpdateSubAccount.md)|  | |
| **subaccount_id** | **int**| The ID of the sub-account to update. | |

### Return type

[**\sendpost\model\SubAccount**](../Model/SubAccount.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
