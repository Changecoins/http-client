This changelog references the relevant changes (bug and security fixes) done in 1.0.2 minor version.
1.0.2 (22.02.2021)
 1. Removed **JSON_UNESCAPED_SLASHES** constant from **json_encode** method when creates payload.


v1.0.2
 1.  Removed unused field *amount* for **Create a deposit** endpoint.


v1.0.3
 1.  Removed unused field *updated_at* for **Create a deposit** endpoint.


v1.0.4
 1.  Store http status code inside HttpResponse class before curl resource has been destructed.

v1.0.5
 1. Added missed field `email` to **InvoiceDto**.

v1.0.6
 1. Added missed field `memo` to **UserDataDto**.
 2. Updated unit test for **UserDataDtoTest**.
 3. Fixed unit tests for changes than have been made in v.1.0.5.
