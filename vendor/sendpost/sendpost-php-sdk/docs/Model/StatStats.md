# # StatStats

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**processed** | **int** | Number of emails accepted by SendPost API. | [optional]
**sent** | **int** | Number of emails sent. | [optional]
**delivered** | **int** | Number of emails we were able to successfully deliver at SMTP without encountering any error | [optional]
**dropped** | **int** | Number of emails drop without attempting to deliver either because the email is invalid or email in in existing suppression list | [optional]
**smtp_dropped** | **int** | Number of emails dropped by SMTP. | [optional]
**hard_bounced** | **int** | Number of emails where we got SMTP hard bounce error code by the recipient mail provider | [optional]
**soft_bounced** | **int** | Number of emails where we got temporary soft bounce error by the recipent mail provider. Soft bounced emails are retried upto 5 times over 24 hour period before marking them as hardBounced. | [optional]
**opened** | **int** | Number of emails opened by recipients | [optional]
**clicked** | **int** | Number of email links clicked by recipients | [optional]
**unsubscribed** | **int** | Number of email recipients who unsubscribed from receiving further emails | [optional]
**spam** | **int** | Number of email recipients who marked emails as spam | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
