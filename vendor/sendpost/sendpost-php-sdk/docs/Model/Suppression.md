# # Suppression

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | The ID of the suppression | [optional]
**reason** | **int** | The reason for the suppression (0 &#x3D; manual, 1 &#x3D; unsubscribe, 2 &#x3D; hard bounce, 3 &#x3D; spam complaint) | [optional]
**smtp_error** | **string** | SMTP error code in case of hard bounce suppression | [optional]
**email** | **string** | The email address for the suppression | [optional]
**created** | **int** | UNIX epoch nano timestamp when the suppression was created | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
