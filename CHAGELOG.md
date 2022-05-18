This changelog references the relevant changes (bug and security fixes) done in 1.0.2 minor version.

v1.0.8 (18.05.2022)
 1. Added Makefile.
 2. Updated **UserDataDto**. The `optional` field has been removed, and a couple of new ones have been added.

v1.0.7 (04.05.2022)
 1. Added `optional` field to **UserDataDto**.

v1.0.6 (20.04.2022)
 1. Added missed field `memo` to **UserDataDto**.
 2. Updated unit test for **UserDataDtoTest**.
 3. Fixed unit tests for changes than have been made in v.1.0.5.

v1.0.5 (04.03.2022)
 1. Added missed field `email` to **InvoiceDto**.

v1.0.4 (12.08.2021)
 1.  Store http status code inside HttpResponse class before curl resource has been destructed.

v1.0.3 (12.08.2021)
 1.  Removed unused field *updated_at* for **Create a deposit** endpoint.

v1.0.2 (22.07.2021)
 1.  Removed unused field *amount* for **Create a deposit** endpoint.

1.0.1 (16.07.2021)
 1. Removed **JSON_UNESCAPED_SLASHES** constant from **json_encode** method when creates payload.

