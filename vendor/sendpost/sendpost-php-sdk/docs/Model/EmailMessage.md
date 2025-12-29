# # EmailMessage

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**message_id** | **string** |  | [optional]
**account_id** | **int** |  | [optional]
**sub_account_id** | **int** |  | [optional]
**ip_id** | **int** |  | [optional]
**public_ip** | **string** |  | [optional]
**local_ip** | **string** |  | [optional]
**email_type** | **string** |  | [optional]
**submitted_at** | **int** |  | [optional]
**from** | [**\sendpost\model\EmailMessageFrom**](EmailMessageFrom.md) |  | [optional]
**reply_to** | [**\sendpost\model\EmailMessageReplyTo**](EmailMessageReplyTo.md) |  | [optional]
**to** | [**\sendpost\model\EmailMessageToInner[]**](EmailMessageToInner.md) |  | [optional]
**groups** | **string[]** |  | [optional]
**ip_pool** | **string** |  | [optional]
**headers** | **array<string,string>** |  | [optional]
**custom_fields** | **array<string,string>** |  | [optional]
**track_opens** | **bool** |  | [optional]
**track_clicks** | **bool** |  | [optional]
**webhook_endpoint** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
