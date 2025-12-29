# # EmailStatsStats

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**processed** | **int** | Number of emails accepted by SendPost API | [optional]
**sent** | **int** | Number of emails sent | [optional]
**delivered** | **int** | Number of emails successfully delivered to SMTP without errors | [optional]
**dropped** | **int** | Number of emails dropped without attempting to deliver due to invalid email or suppression list | [optional]
**smtp_dropped** | **int** | Number of emails dropped by SMTP | [optional]
**hard_bounced** | **int** | Number of emails that resulted in a hard bounce error | [optional]
**soft_bounced** | **int** | Number of emails that resulted in a temporary soft bounce error | [optional]
**opened** | **int** | Number of emails opened by recipients | [optional]
**clicked** | **int** | Number of email links clicked by recipients | [optional]
**unsubscribed** | **int** | Number of email recipients who unsubscribed | [optional]
**spam** | **int** | Number of emails marked as spam by recipients | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
