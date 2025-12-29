# sendpost\StatsApi

All URIs are relative to https://api.sendpost.io/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**accountSubaccountStatSubaccountIdAggregateGet()**](StatsApi.md#accountSubaccountStatSubaccountIdAggregateGet) | **GET** /account/subaccount/stat/{subaccount_id}/aggregate | Get Aggregate Stats |
| [**accountSubaccountStatSubaccountIdGet()**](StatsApi.md#accountSubaccountStatSubaccountIdGet) | **GET** /account/subaccount/stat/{subaccount_id} | List Stats |
| [**getAggregateStatsByGroup()**](StatsApi.md#getAggregateStatsByGroup) | **GET** /account/subaccount/stat/{subaccount_id}/group | Get Group Aggregate Stats |


## `accountSubaccountStatSubaccountIdAggregateGet()`

```php
accountSubaccountStatSubaccountIdAggregateGet($from, $to, $subaccount_id): \sendpost\model\AggregateStat
```

Get Aggregate Stats

Retrieves aggregated email stats for a specific sub-account for a date range.   **Note**: The maximum date range is 366 days.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\StatsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Start date for stats retrieval.
$to = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Date to which stats should be retrieved ( Note than from date should be earlier than to date. Also the difference between from and to date shouldn't ne more than 60 days )
$subaccount_id = 11; // int | The ID of the subaccount to retrieve

try {
    $result = $apiInstance->accountSubaccountStatSubaccountIdAggregateGet($from, $to, $subaccount_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatsApi->accountSubaccountStatSubaccountIdAggregateGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **\DateTime**| Start date for stats retrieval. | |
| **to** | **\DateTime**| Date to which stats should be retrieved ( Note than from date should be earlier than to date. Also the difference between from and to date shouldn&#39;t ne more than 60 days ) | |
| **subaccount_id** | **int**| The ID of the subaccount to retrieve | |

### Return type

[**\sendpost\model\AggregateStat**](../Model/AggregateStat.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `accountSubaccountStatSubaccountIdGet()`

```php
accountSubaccountStatSubaccountIdGet($from, $to, $subaccount_id): \sendpost\model\Stat[]
```

List Stats

Retrieves a list of email stats for a specific sub-account within a given date range. Both `from` and `to` dates are inclusive.   **Note**: The maximum date range is 31 days.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\StatsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Start date for stats retrieval.
$to = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Date to which stats should be retrieved ( Note than from date should be earlier than to date. Also the difference between from and to date shouldn't ne more than 60 days )
$subaccount_id = 11; // int | The ID of the subaccount to retrieve

try {
    $result = $apiInstance->accountSubaccountStatSubaccountIdGet($from, $to, $subaccount_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatsApi->accountSubaccountStatSubaccountIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **\DateTime**| Start date for stats retrieval. | |
| **to** | **\DateTime**| Date to which stats should be retrieved ( Note than from date should be earlier than to date. Also the difference between from and to date shouldn&#39;t ne more than 60 days ) | |
| **subaccount_id** | **int**| The ID of the subaccount to retrieve | |

### Return type

[**\sendpost\model\Stat[]**](../Model/Stat.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAggregateStatsByGroup()`

```php
getAggregateStatsByGroup($group, $from, $to, $subaccount_id): \sendpost\model\AggregateStat
```

Get Group Aggregate Stats

Retrieves aggregated email stats for a specific group in a sub-account for the specified daterange. The maximum daterange for which these stats can be retrieved is 366 days. Ensure that the difference between the `from` and `to` dates does not exceed 366 days.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\StatsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group = 'group_example'; // string | Group whose aggregated stats need to be retrieved
$from = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | The starting date for the aggregated stats
$to = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | The ending date for the aggregated stats (Note: `from` should be earlier than `to` and the date range should not exceed 366 days)
$subaccount_id = 11; // int | The ID of the subaccount to retrieve

try {
    $result = $apiInstance->getAggregateStatsByGroup($group, $from, $to, $subaccount_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatsApi->getAggregateStatsByGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group** | **string**| Group whose aggregated stats need to be retrieved | |
| **from** | **\DateTime**| The starting date for the aggregated stats | |
| **to** | **\DateTime**| The ending date for the aggregated stats (Note: &#x60;from&#x60; should be earlier than &#x60;to&#x60; and the date range should not exceed 366 days) | |
| **subaccount_id** | **int**| The ID of the subaccount to retrieve | |

### Return type

[**\sendpost\model\AggregateStat**](../Model/AggregateStat.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
