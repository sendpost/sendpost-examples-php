# # EmailMessageWithTemplate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**from** | [**\sendpost\model\EmailAddress**](EmailAddress.md) |  | [optional]
**reply_to** | [**\sendpost\model\EmailAddress**](EmailAddress.md) |  | [optional]
**to** | [**\sendpost\model\Recipient[]**](Recipient.md) |  | [optional]
**subject** | **string** |  | [optional]
**pre_text** | **string** |  | [optional]
**html_body** | **string** |  | [optional]
**text_body** | **string** |  | [optional]
**amp_body** | **string** |  | [optional]
**ippool** | **string** |  | [optional]
**headers** | **array<string,string>** |  | [optional]
**track_opens** | **bool** |  | [optional]
**track_clicks** | **bool** |  | [optional]
**groups** | **string[]** |  | [optional]
**attachments** | [**\sendpost\model\Attachment[]**](Attachment.md) |  | [optional]
**webhook_endpoint** | **string** |  | [optional]
**template** | **string** |  | [optional]
**template_id** | **string** | Template ID for the email template | [optional]
**template_variables** | **array<string,string>** | Key-Value pair of template variables | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
