# # AggregatedEmailStats

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**processed** | **int** | Total number of emails accepted by SendPost API | [optional]
**sent** | **int** | Total number of emails sent | [optional]
**delivered** | **int** | Total number of emails successfully delivered to SMTP | [optional]
**dropped** | **int** | Total number of emails dropped without delivery | [optional]
**smtp_dropped** | **int** | Total number of emails dropped by SMTP | [optional]
**hard_bounced** | **int** | Total number of hard bounce errors | [optional]
**soft_bounced** | **int** | Total number of soft bounce errors | [optional]
**opened** | **int** | Total number of emails opened by recipients | [optional]
**clicked** | **int** | Total number of links clicked by recipients | [optional]
**unsubscribed** | **int** | Total number of unsubscribed recipients | [optional]
**spam** | **int** | Total number of spams reported by recipients | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
