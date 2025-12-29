# # Message

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**message_id** | **string** | Unique ID for the message. | [optional]
**account_id** | **int** | Account ID associated with the message. | [optional]
**sub_account_id** | **int** | Sub-account ID associated with the message. | [optional]
**ip_id** | **int** | IP ID used for sending the message. | [optional]
**account_ip_pool_id** | **int** | Account IP Pool ID associated with the message. | [optional]
**public_ip** | **string** | Public IP address used for sending the message. | [optional]
**local_ip** | **string** | Local IP address used for sending the message. | [optional]
**email_type** | **string** | Type of email service used. | [optional]
**submitted_at** | **int** | UNIX epoch nano timestamp when message was submitted. | [optional]
**from** | [**\sendpost\model\Person**](.md) | Object comprising name and email address of the sender | [optional]
**reply_to** | [**\sendpost\model\Person**](.md) | Object comprising name and email addresses to which email replies will go to | [optional]
**to** | [**\sendpost\model\MessageTo**](MessageTo.md) |  | [optional]
**header_to** | [**\sendpost\model\MessageHeaderTo**](MessageHeaderTo.md) |  | [optional]
**header_cc** | **string[]** | List of CC recipients from email headers | [optional]
**header_bcc** | **string[]** | List of BCC recipients from email headers | [optional]
**attachments** | **string[]** | List of attachments | [optional]
**groups** | **string[]** | List of groups associated with the message | [optional]
**ip_pool** | **string** | IP Pool from which emails will go out. Relevant only for customers on dedicated IP plans. | [optional]
**headers** | **array<string,string>** | Key-Value pair which are added to every email message being sent and also with webhooks triggered on events such as email delivered, open, click etc. They are useful to identify email, recipient etc. in your internal system | [optional]
**custom_fields** | **array<string,string>** | Key-Value pair of custom fields at message level | [optional]
**subject** | **string** | Email subject line. | [optional]
**pre_text** | **string** | Text which appears on mobile right after email subject line. | [optional]
**html_body** | **string** | HTML email content. | [optional]
**text_body** | **string** | Text email content. | [optional]
**amp_body** | **string** | AMP email content. | [optional]
**track_opens** | **bool** | Indicates if email opens need to be tracked. | [optional]
**track_clicks** | **bool** | Indicates if email clicks need to be tracked. | [optional]
**attempt** | **int** | Number of delivery attempts made for the message. | [optional]
**webhook_endpoint** | **string** | Webhook endpoint URL for the message. | [optional]
**mx_records** | **string[]** | List of MX records for the recipient domain | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
