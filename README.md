# Sistema de Gestión de Ligas Deportivas 🏆

Plataforma web Full-Stack desarrollada en **Laravel 11** y diseñada con **Tailwind CSS** usando una estética moderna basada en *Glassmorphic Design* (efectos de cristal esmerilado, transparencias y neón). 

El sistema está diseñado bajo una arquitectura relacional sólida que permite a múltiples administradores gestionar sus propios torneos de forma masiva, automatizada e independiente.

---

## 🚀 Características Principales (Evaluación Técnica)

* **Aislamiento Total de Datos por Usuario:** El sistema implementa un estricto control de seguridad en el backend mediante el uso de sesiones (`Auth`). Cada administrador (ya sea tu cuenta de usuario registrada o el perfil de *Evaluador Invitado / Demo*) posee un entorno completamente aislado. Un usuario no puede ver, editar ni eliminar las ligas, equipos o partidos creados por otro.
* **Cálculo de Puntos Dinámico y Eficiente:** Los equipos no almacenan un puntaje estático en la base de datos que requiera actualización manual. Se implementó un *Accessor* avanzado en el modelo (`getPuntosAttribute`). El sistema calcula la tabla de posiciones en tiempo real recorriendo matemáticamente los marcadores de los partidos (3 puntos por victoria, 1 por empate, 0 por derrota).
* **Flujo UX de Plantillas (Roster):** En lugar de formularios saturados, se diseñó un flujo en dos pasos. Al registrar un equipo, el sistema abre la ficha técnica del club (`equipos.show`) dividida en un panel de control lateral para fichar jugadores uno a uno (`nombre_completo`, `dorsal`, `posición`) y una tabla en tiempo real con la nómina actual.
* **Estructura Relacional Automatizada:** Cascada de eliminación configurada en la base de datos (`onDelete('cascade')`). Si una liga se elimina, el sistema purga automáticamente todos sus equipos, plantillas de jugadores y calendario de partidos asociados, previniendo registros huérfanos en MySQL.

---

## 📊 Arquitectura de la Base de Datos

El mapa de relaciones del sistema se organiza de forma jerárquica para asegurar la integridad de los datos:

* **Usuarios ➡️ Ligas:** Relación Uno a Muchos (`HasMany`). Un usuario administra múltiples ligas.
* **Ligas ➡️ Equipos:** Relación Uno a Muchos (`HasMany`). Una liga agrupa a los clubes inscritos.
* **Equipos ➡️ Jugadores:** Relación Uno a Muchos (`HasMany`). Un equipo posee una plantilla de deportistas.
* **Equipos ➡️ Partidos:** Relación de Claves Foráneas Dobles. El modelo de partidos conecta de forma independiente un `equipo_local_id` y un `equipo_visitante_id`.

---

## 🛠️ Requisitos del Entorno

Asegúrate de tener instalado en tu equipo de evaluación:
* **PHP 8.2** o superior
* **Composer** (Gestor de dependencias de PHP)
* **Node.js & NPM** (Para la compilación de estilos)
* Servidor local con soporte MySQL (Recomendado: **Laragon** o XAMPP)

---

## 💻 Instrucciones de Instalación y Despliegue

Sigue estos pasos ordenados en la consola para levantar el proyecto en tu entorno local:

1. Clonar el Proyecto
Descarga el código fuente desde el repositorio oficial:
```bash
git clone [https://github.com/TuUsuario/ligas-deportivas.git](https://github.com/TuUsuario/ligas-deportivas.git)
cd ligas-deportivas

2. Instalar Dependencias del Sistema
Descarga los paquetes necesarios del núcleo de Laravel y las librerías de estilos:

Bash
composer install
npm install

3. Configurar el Archivo de Entorno
Duplica el archivo de ejemplo para crear tu configuración local:

Bash
cp .env.example .env

Abre el archivo .env recién creado y asegúrate de ajustar el nombre de tu base de datos:

Fragmento de código
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ligas_deportivas
DB_USERNAME=root
DB_PASSWORD=

4. Generar la Llave de Seguridad
Establece la clave de encriptación única de la aplicación:

Bash
php artisan key:generate

5. Construir el Esquema de Base de Datos
Crea la base de datos vacía en tu gestor (HeidiSQL, phpMyAdmin, etc.) con el nombre ligas_deportivas y ejecuta las migraciones para inyectar las tablas relacionales y sus llaves foráneas:

Bash
php artisan migrate:fresh

6. Ejecutar la Aplicación
Para ver la plataforma en funcionamiento, abre dos terminales independientes en VS Code:

Terminal 1 (Compilador de Estilos de Tailwind):

Bash
npm run dev
Terminal 2 (Servidor Local de PHP):

Bash
php artisan serve
Abre tu navegador e ingresa a la dirección local que te entregue la terminal (habitualmente http://127.0.0.1:8000).