# # Domain

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Unique ID for the domain. | [optional]
**name** | **string** | Name of the domain. | [optional]
**dkim** | [**\sendpost\model\DomainDkim**](DomainDkim.md) |  | [optional]
**return_path** | [**\sendpost\model\DomainReturnPath**](DomainReturnPath.md) |  | [optional]
**track** | [**\sendpost\model\DomainTrack**](DomainTrack.md) |  | [optional]
**dmarc** | [**\sendpost\model\DomainDmarc**](DomainDmarc.md) |  | [optional]
**dkim_config** | **string** | DKIM configuration | [optional]
**dkim_verified** | **bool** | Status of DKIM verification ( true or false ) | [optional]
**dmarc_verified** | **bool** | Status of DMARC verification ( true or false) | [optional]
**return_path_verified** | **bool** | Status of ReturnPath verification ( true or false ) | [optional]
**track_verified** | **bool** | Status of Track verification ( true or false ) | [optional]
**verified** | **bool** | Overall verification status of the domain | [optional]
**domain_registered_date** | **string** | Date when the domain was registered | [optional]
**created** | **int** | UNIX epoch timestamp in nanoseconds. | [optional]
**gpt_verified** | **bool** | Status of GPT verification ( true or false ) | [optional]
**gpt** | [**\sendpost\model\DomainGpt**](DomainGpt.md) |  | [optional]
**dmarc_failure_reason** | **string** | Reason for DMARC verification failure | [optional]
**dkim_failure_reason** | **string** | Reason for DKIM verification failure | [optional]
**track_failure_reason** | **string** | Reason for Track verification failure | [optional]
**return_path_failure_reason** | **string** | Reason for ReturnPath verification failure | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
