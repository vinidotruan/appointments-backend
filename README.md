Primeiros passos
---

 - `git clone git_url`
 - `php artisan composer install`
 - `php artisan migrate --seed`
 - `php artisan passport:install`
 - `php artisan storage:link`


ENDPOINTS
---

 - /auth
    - [POST] - /login
      - [BODY] - {
        'email': <string>,
        'password': <string>,
        'remember_me': <boolean>,
        }

      - [RETURN] - {
        'access_token': <string>,
        'token_type': <string>,
        'expires_at': <string>,
        }
    - [POST] - /signup
      - [BODY] - {
        'name': <string>,
        'email': <string>,
        'password': <string>,
        'remember_me': <boolean>,
        'role_id': <integer>,
        'gender_id': <integer>,
        'value': <double>,
        }

      - [RETURN] - {
        'message': <<string>>
        }
    - [GET] - /logout
    
 - /roles
    - [GET] - /
      - [RETURN] - Array<roles>[]
    - [GET] - /{roleId}
      - [RETURN] - Role<roles> - {
        'id': <integer>
        'name': <string>
      }
    - [POST] - /
      - [BODY] - {
        'name': <string>
      }
      - [RETURN] - Role<roles> - {
        'id': <integer>
        'name': <string>
      }
    - [PUT] - /{roleId}
      - [BODY] - {
        'name': <string>
      }
      - [RETURN] - Role<roles> - {
        'id': <integer>
        'name': <string>
      }
    - [DELETE] - /{roleId}
      - [RETURN] - Role<roles> - {
        'message': <string>
      }

 - /genders
    - [GET] - /
      - [RETURN] - Array<genders>[]
    - [GET] - /{genderId}
      - [RETURN] - Gender<genders> - {
        'id': <integer>
        'name': <string>
      }
    - [POST] - /
      - [BODY] - {
        'name': <string>
      }
      - [RETURN] - Gender<genders> - {
        'id': <integer>
        'name': <string>
      }
    - [PUT] - /{genderId}
      - [BODY] - {
        'name': <string>
      }
      - [RETURN] - Gender<genders> - {
        'id': <integer>
        'name': <string>
      }
    - [DELETE] - /{genderId}
      - [RETURN] - Gender<genders> - {
        'message': <string>
      }

 - /users
    - [GET] - /
      - [RETURN] - Array<users>[]
    - [GET] - /{userId}
      - [RETURN] - Users<users> - {
        'id': <integer>,
        'name': <string>,
        'email': <string>,
        'role_id': <integer>,
        'gender_id': <integer>,
        'value': <double>,
        'receipt': <boolean>

      }

 - /patients
    - [GET] - /
      - [RETURN] - Array<patients>[]
    - [GET] - /{patientId}
      - [RETURN] - Patient<patients> - {
        'id': <integer>,
        'user_id':<string>,
        'name':<string>,
        'telephone':<string>,
        'phone':<string>,
        'birthday':<date('YYYY-mm-dd')>,
        'cpf':<string>,
        'rg': <string>
      }
    - [POST] - /
      - [BODY] - {
        'user_id':<string>,
        'name':<string>,
        'telephone':<string>(nullable),
        'phone':<string>(nullable),
        'birthday':<date('YYYY-mm-dd')>(nullable),
        'cpf':<string>,
        'rg': <string>(nullable)
      }
      - [RETURN] - Patient<patients> - {
        'id': <integer>,
        'user_id':<string>,
        'name':<string>,
        'telephone':<string>(nullable),
        'phone':<string>(nullable),
        'birthday':<date('YYYY-mm-dd')>(nullable),
        'cpf':<string>,
        'rg': <string>(nullable)
      }
    - [PUT] - /{patientId}
      - [BODY] - {
        'user_id':<string>,
        'name':<string>,
        'telephone':<string>(nullable),
        'phone':<string>(nullable),
        'birthday':<date('YYYY-mm-dd')>(nullable),
        'cpf':<string>,
        'rg': <string>(nullable),
        'user': {
          'name': <string>,
          'email': <string>,
          'password': <string>,
          'role_id': <integer>,
          'gender_id': <integer>,
          'value': <double>,
        },
        'addresses': {
          'city': <string>,
          'state': <string>,
          'street': <string>,
          'complement': <string>,
          'number': <string>,
          'neighborhood': <string>,
          'cep': <string>,
        },
        'plusInformations': {
          'emergency_contact': <string>,
          'name': <string>,
          'observation': <string>,
        }
      }
      - [RETURN] - Patient<patients> - {
        'id': <integer>,
        'user_id':<string>,
        'name':<string>,
        'telephone':<string>(nullable),
        'phone':<string>(nullable),
        'birthday':<date('YYYY-mm-dd')>(nullable),
        'cpf':<string>,
        'rg': <string>(nullable)
      }
    - [DELETE] - /{patientId}
      - [RETURN] - Patient<patients> - {
        'message': <string>
      }

 - /appointments
    - [GET] - /
      - [RETURN] - Array<appointments>[]
    - [GET] - /{appointmentId}
      - [RETURN] - Appointment<appointments> - {
        'id': <integer>,
        'patient_id':<string>,
        'date':<date('YYYY-mm-dd')>,
        'time':<string>,
        'notes':<string>(nullable),
        'cronogram':<string>(nullable),
        'abstract':<string>(nullable),
        'todo_list':<string>(nullable),
        'link':<string>,
      }
    - [POST] - /
      - [BODY] - {
        'patient_id':<string>,
        'date':<date('YYYY-mm-dd')>,
        'time':<string>,
        'notes':<string>(nullable),
        'cronogram':<string>(nullable),
        'abstract':<string>(nullable),
        'todo_list':<string>(nullable),
        'link':<string>,
      }
      - [RETURN] - Appointment<appointments> - {
        'id': <integer>,
        'patient_id':<string>,
        'date':<date('YYYY-mm-dd')>,
        'time':<string>,
        'notes':<string>(nullable),
        'cronogram':<string>(nullable),
        'abstract':<string>(nullable),
        'todo_list':<string>(nullable),
        'link':<string>,
      }
    - [PUT] - /{appointmentId}
      - [BODY] - {
        'patient_id':<string>,
        'date':<date('YYYY-mm-dd')>,
        'time':<string>,
        'notes':<string>(nullable),
        'cronogram':<string>(nullable),
        'abstract':<string>(nullable),
        'todo_list':<string>(nullable),
        'link':<string>,
      }
      - [RETURN] - Appointment<appointments> - {
        'id': <integer>,
        'patient_id':<string>,
        'date':<date('YYYY-mm-dd')>,
        'time':<string>,
        'notes':<string>(nullable),
        'cronogram':<string>(nullable),
        'abstract':<string>(nullable),
        'todo_list':<string>(nullable),
        'link':<string>,
      }
    - [DELETE] - /{appointmentId}
      - [RETURN] - Appointment<appointments> - {
        'message': <string>
      }

 - /attachements
    - [GET] - /patients/{patient}
      - [RETURN] - Array<patients>[]
    - [GET] - /
      - [RETURN] - Appointment<appointments> - {
        'id': <integer>,
        'name':<string>,
        'path':<string>,
        'type':<string>,
      }
    - [POST] - /upload
      - [BODY] - {
        'files': []
      }
      - [RETURN] - Appointment<appointments> - {
        'message': <string>
      }
    - [POST] - /{fileId}/patients/{patientId}
      - [RETURN] - Appointment<appointments> - {
        'message': <string>
      }
