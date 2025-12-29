# # UpdateWebhook

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**enabled** | **bool** | Is the webhook active or in a paused state? | [optional]
**url** | **string** | URL endpoint to which webhook calls are sent. | [optional]
**processed** | **bool** | Trigger webhook on email message being processed. | [optional]
**delivered** | **bool** | Trigger webhook on email message being delivered. | [optional]
**dropped** | **bool** | Trigger webhook on email message being dropped. | [optional]
**soft_bounced** | **bool** | Trigger webhook on email message being soft bounced. | [optional]
**hard_bounced** | **bool** | Trigger webhook on email message being hard bounced. | [optional]
**opened** | **bool** | Trigger webhook on email message being opened. | [optional]
**clicked** | **bool** | Trigger webhook on email message link being clicked. | [optional]
**unsubscribed** | **bool** | Trigger webhook on email message being unsubscribed. | [optional]
**spam** | **bool** | Trigger webhook on email message being marked as spam. | [optional]
**sent** | **bool** | Trigger webhook on email message being sent. | [optional]
**smtp_dropped** | **bool** | Trigger webhook on email message being dropped by SMTP. | [optional]
**unique_open** | **bool** | Trigger webhook on unique email opens. | [optional]
**unique_click** | **bool** | Trigger webhook on unique email clicks. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
