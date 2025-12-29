# # SubAccount

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Unique ID for the sub-account. | [optional]
**api_key** | **string** | API key for the sub-account. | [optional]
**name** | **string** | Name of the sub-account. | [optional]
**labels** | [**\sendpost\model\Label[]**](Label.md) | Labels associated with the sub-account | [optional]
**smtp_auths** | [**\sendpost\model\SMTPAuth[]**](SMTPAuth.md) | SMTP Auths associated with the sub-account | [optional]
**type** | **int** | Type of the sub-account | [optional]
**is_plus** | **bool** | Indicates whether the sub-account is a Plus sub-account | [optional]
**created** | **int** | UNIX epoch nano timestamp when the sub-account was created. | [optional]
**created_by** | **array<string,mixed>** | Member who created the sub-account | [optional]
**updated_by** | **array<string,mixed>** | Member who updated the sub-account | [optional]
**blocked** | **bool** | Indicates whether the sub-account is blocked | [optional]
**blocked_at** | **int** | UNIX epoch nano timestamp when the sub-account was blocked (0 if not blocked) | [optional]
**block_reason** | **string** | Reason for blocking the sub-account | [optional]
**hb_exempt** | **bool** | Indicates whether the sub-account is exempt from hard bounce tracking | [optional]
**generate_weekly_report** | **bool** | Indicates whether weekly reports are generated for this sub-account | [optional]
**handlers** | **string[]** | Handlers associated with the sub-account | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
