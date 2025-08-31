📌 Contact Manager API – Backend (Laravel)

Este proyecto es un backend desarrollado en Laravel que permite gestionar usuarios y sus contactos personales mediante un sistema de autenticación con tokens.

🚀 Características principales

Registro y login de usuarios (con email y contraseña).

Autenticación mediante Laravel Sanctum (tokens de acceso).

Gestión de contactos privados por usuario:

Crear, listar, actualizar usuarios.

Cada contacto incluye: nombre, apellido, teléfono, email, dirección, notas y favorito.

Respuestas JSON estandarizadas para consumo desde frontend o Postman.


Configurar base de datos en .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=contact_list
DB_USERNAME=root
DB_PASSWORD=tu_password


Ejecutar migraciones:

php artisan migrate

(Opcional) Poblar con datos de prueba:

php artisan db:seed

Iniciar servidor:

php artisan serve

👉 La API quedará disponible en: http://127.0.0.1:8000/api

🔑 Autenticación

Se utiliza Laravel Sanctum.
Los pasos básicos son:

Registrar un usuario (/api/register)

Iniciar sesión (/api/login) → devuelve un token

Enviar el token en Postman (Authorization → Bearer Token)


📮 Endpoints principales
🔹 Autenticación

POST /api/register → Crear usuario

POST /api/login → Iniciar sesión y obtener token

POST /api/logout → Cerrar sesión (requiere token)

🔹 Contactos

GET /api/contacts → Listar contactos del usuario autenticado

POST /api/contacts → Crear contacto

{
  "name": "Juan",
  "lastname": "Pérez",
  "phone_number": "123456789",
  "email": "juan@example.com",
  "address": "Calle Falsa 123",
  "notes": "Amigo del colegio",
  "favorite": true
}


GET /api/contacts/{id} → Ver contacto específico

PUT /api/contacts/{id} → Actualizar contacto

