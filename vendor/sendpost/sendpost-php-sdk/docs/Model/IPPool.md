# # IPPool

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional]
**name** | **string** |  | [optional]
**created** | **int** |  | [optional]
**ips** | [**\sendpost\model\IP[]**](IP.md) |  | [optional]
**third_party_sending_providers** | [**\sendpost\model\ThirdPartySendingProvider[]**](ThirdPartySendingProvider.md) |  | [optional]
**routing_strategy** | **int** |  | [optional]
**routing_meta_data** | **string** |  | [optional]
**auto_warmup_enabled** | **bool** |  | [optional]
**infra_monitor** | **bool** |  | [optional]
**ip_domain_warmup_status** | **string** |  | [optional]
**should_overflow** | **bool** | Indicates whether the IP should overflow, once email capacity of the IP Pool has been reached, should we send remaining emails over shared IP or not | [optional]
**overflow_pool_name** | **string** | The name of the overflow pool | [optional]
**warmup_interval** | **int** | The interval for the warmup | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
