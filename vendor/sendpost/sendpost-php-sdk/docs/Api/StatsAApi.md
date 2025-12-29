# sendpost\StatsAApi

All URIs are relative to https://api.sendpost.io/api/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAccountAggregateStats()**](StatsAApi.md#getAccountAggregateStats) | **GET** /account/stat/aggregate | Get Account Aggregate Stats |
| [**getAccountAggregateStatsByGroup()**](StatsAApi.md#getAccountAggregateStatsByGroup) | **GET** /account/stat/aggregate/group | Get Account Group Aggregate Stats |
| [**getAccountStatsByGroup()**](StatsAApi.md#getAccountStatsByGroup) | **GET** /account/stat/group | List Account Group Stats |
| [**getAllAccountStats()**](StatsAApi.md#getAllAccountStats) | **GET** /account/stat | List Account Stats |


## `getAccountAggregateStats()`

```php
getAccountAggregateStats($from, $to): \sendpost\model\AggregateStats
```

Get Account Aggregate Stats

Retrieve aggregated email statistics for all sub-accounts of a specific account for a given date range.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\StatsAApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 2019-01-01; // \DateTime | The start date for retrieving aggregated stats (inclusive)
$to = 2019-12-31; // \DateTime | The end date for retrieving aggregated stats (inclusive). The difference between `from` and `to` should not exceed 366 days.

try {
    $result = $apiInstance->getAccountAggregateStats($from, $to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatsAApi->getAccountAggregateStats: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **\DateTime**| The start date for retrieving aggregated stats (inclusive) | |
| **to** | **\DateTime**| The end date for retrieving aggregated stats (inclusive). The difference between &#x60;from&#x60; and &#x60;to&#x60; should not exceed 366 days. | |

### Return type

[**\sendpost\model\AggregateStats**](../Model/AggregateStats.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAccountAggregateStatsByGroup()`

```php
getAccountAggregateStatsByGroup($group, $from, $to): \sendpost\model\AggregateStat
```

Get Account Group Aggregate Stats

Gets aggregated email stats for a specific group in all sub-accounts of a specific account for the given daterange. The maximum daterange for which these stats can be retrieved is 366 days.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\StatsAApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group = shopify; // string | Group whose aggregate stats need to be retrieved.
$from = 2019-01-01; // \DateTime | Date from which stats should be retrieved (should be in the format `YYYY-MM-DD`).
$to = 2019-12-31; // \DateTime | Date to which stats should be retrieved (should be in the format `YYYY-MM-DD`). Note that the difference between `from` and `to` should not be more than 366 days.

try {
    $result = $apiInstance->getAccountAggregateStatsByGroup($group, $from, $to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatsAApi->getAccountAggregateStatsByGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group** | **string**| Group whose aggregate stats need to be retrieved. | |
| **from** | **\DateTime**| Date from which stats should be retrieved (should be in the format &#x60;YYYY-MM-DD&#x60;). | |
| **to** | **\DateTime**| Date to which stats should be retrieved (should be in the format &#x60;YYYY-MM-DD&#x60;). Note that the difference between &#x60;from&#x60; and &#x60;to&#x60; should not be more than 366 days. | |

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

## `getAccountStatsByGroup()`

```php
getAccountStatsByGroup($group, $from, $to): \sendpost\model\Stat[]
```

List Account Group Stats

Gets a list of all email stats for all sub-accounts of a specific account by group for a given daterange. The maximum daterange for which these stats can be retrieved is 31 days.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\StatsAApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group = shopify; // string | Group whose stats need to be retrieved
$from = 2020-03-12; // \DateTime | Date from which stats should be retrieved (should be in the format `YYYY-MM-DD`)
$to = 2020-04-14; // \DateTime | Date to which stats should be retrieved (should be in the format `YYYY-MM-DD`). Note that the difference between `from` and `to` should not be more than 31 days.

try {
    $result = $apiInstance->getAccountStatsByGroup($group, $from, $to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatsAApi->getAccountStatsByGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group** | **string**| Group whose stats need to be retrieved | |
| **from** | **\DateTime**| Date from which stats should be retrieved (should be in the format &#x60;YYYY-MM-DD&#x60;) | |
| **to** | **\DateTime**| Date to which stats should be retrieved (should be in the format &#x60;YYYY-MM-DD&#x60;). Note that the difference between &#x60;from&#x60; and &#x60;to&#x60; should not be more than 31 days. | |

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

## `getAllAccountStats()`

```php
getAllAccountStats($from, $to): \sendpost\model\AccountStats[]
```

List Account Stats

Retrieve email statistics for all sub-accounts of a specific account for a given date range.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: accountAuth
$config = sendpost\Configuration::getDefaultConfiguration()->setApiKey('X-Account-ApiKey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = sendpost\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-Account-ApiKey', 'Bearer');


$apiInstance = new sendpost\Api\StatsAApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 2020-03-12; // \DateTime | The start date for retrieving stats (inclusive)
$to = 2020-04-14; // \DateTime | The end date for retrieving stats (inclusive). The difference between `from` and `to` should not exceed 31 days.

try {
    $result = $apiInstance->getAllAccountStats($from, $to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatsAApi->getAllAccountStats: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **\DateTime**| The start date for retrieving stats (inclusive) | |
| **to** | **\DateTime**| The end date for retrieving stats (inclusive). The difference between &#x60;from&#x60; and &#x60;to&#x60; should not exceed 31 days. | |

### Return type

[**\sendpost\model\AccountStats[]**](../Model/AccountStats.md)

### Authorization

[accountAuth](../../README.md#accountAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
