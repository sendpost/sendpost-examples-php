# # IP

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Unique ID for the IP |
**public_ip** | **string** | The public IP address associated with the resource |
**system_domain** | [**\sendpost\model\Domain**](Domain.md) |  | [optional]
**reverse_dns_hostname** | **string** | The reverse DNS hostname for the IP | [optional]
**type** | **int** | Type of the IP | [optional]
**gmail_settings** | **string** | Configuration for Gmail delivery settings in JSON format | [optional]
**yahoo_settings** | **string** | Configuration for Yahoo delivery settings in JSON format | [optional]
**aol_settings** | **string** | Configuration for AOL delivery settings in JSON format | [optional]
**microsoft_settings** | **string** | Configuration for Microsoft delivery settings in JSON format | [optional]
**comcast_settings** | **string** | Configuration for Comcast delivery settings in JSON format | [optional]
**yandex_settings** | **string** | Configuration for Yandex delivery settings in JSON format | [optional]
**gmx_settings** | **string** | Configuration for GMX delivery settings in JSON format | [optional]
**mailru_settings** | **string** | Configuration for Mail.ru delivery settings in JSON format | [optional]
**icloud_settings** | **string** | Configuration for iCloud delivery settings in JSON format | [optional]
**zoho_settings** | **string** | Configuration for Zoho delivery settings in JSON format | [optional]
**qq_settings** | **string** | Configuration for QQ delivery settings in JSON format | [optional]
**default_settings** | **string** | Default delivery settings in JSON format | [optional]
**att_settings** | **string** | Configuration for AT&amp;T delivery settings in JSON format | [optional]
**created** | **int** | The timestamp (UNIX epoch) when the IP was created |
**infra_classification** | **string** | Classification of the infrastructure | [optional]
**infra_monitor** | **bool** | Indicates whether infrastructure monitoring is enabled | [optional]
**state** | **int** | The state of the IP | [optional]
**auto_warmup_plan** | [**\sendpost\model\AutoWarmupPlan**](AutoWarmupPlan.md) | The auto-warmup plan associated with the IP. Can be null if no warmup plan is assigned. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
