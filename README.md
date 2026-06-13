LigasPRO: Plataforma de Gestión Deportiva 🏆
Plataforma Web Full-Stack desarrollada en Laravel 11, orientada a la administración profesional de torneos. El sistema garantiza la integridad de datos, escalabilidad y una experiencia de usuario moderna mediante el paradigma Glassmorphism.

🏗️ Decisión de Arquitectura y Diseño
UI/UX (Glassmorphism): Se ha priorizado una interfaz intuitiva utilizando Tailwind CSS. El uso de transparencias (backdrop-blur) y bordes de alto contraste permite una lectura clara de los marcadores deportivos, optimizando la visibilidad bajo entornos de alta luminosidad.

Integridad Transaccional: Cada operación CRUD en el backend está blindada mediante transacciones de base de datos (DB::transaction). Si ocurre un fallo en la red o en el servidor durante la actualización de un marcador, el sistema garantiza un Rollback automático, manteniendo la integridad del torneo.

Seguridad (Aislamiento de Datos): Basado en el estándar de seguridad industrial, cada entidad (Liga, Equipo, Jugador) está vinculada al User ID del administrador. Se previene cualquier riesgo de Insecure Direct Object Reference (IDOR) mediante validaciones de acceso en cada controlador.

📊 Modelo de Datos (Relaciones)
La arquitectura sigue una jerarquía de herencia lógica para evitar redundancia:

Usuarios (1:N) Ligas

Ligas (1:N) Equipos

Equipos (1:N) Jugadores

Equipos (1:1) Partidos (Local/Visitante)

Nota: La eliminación en cascada (onDelete('cascade')) está configurada en todas las migraciones para una purga limpia de datos sin registros huérfanos.

🛠️ Requisitos del Entorno
PHP: 8.2 o superior.

Base de Datos: MySQL 8.0+.

Gestores: Composer y Node.js/NPM.

Servidor Local: Laragon, XAMPP o Valet.

💻 Guía de Despliegue (Quick Start)
1. Instalación y Dependencias
Bash
git clone <tu-url-de-repositorio>
cd ligas-deportivas
composer install
npm install
2. Configuración de Entorno
Copia la configuración de ejemplo y genera tu llave:

Bash
cp .env.example .env
php artisan key:generate
Edita el archivo .env y define DB_DATABASE, DB_USERNAME y DB_PASSWORD para conectar tu servidor local.

3. Sincronización de Base de Datos
Ejecuta las migraciones para crear la estructura relacional:

Bash
php artisan migrate:fresh
4. Lanzamiento
Ejecuta ambos comandos en terminales separadas para habilitar el motor de estilos y el servidor web:

Bash
# Terminal 1: Compilador de Assets
npm run dev

# Terminal 2: Servidor Laravel
php artisan serve
🌐 Documentación de la API
Para pruebas de integración, se ha incluido el archivo LigasPRO.postman_collection.json en la raíz del proyecto. Este archivo contiene los endpoints configurados para:

Gestión de Ligas y Equipos.

Programación de partidos con validación de equipos.

Actualización de marcadores con lógica condicional (Validación de reglas para Vóleibol vs. Formato Libre).

🛡️ Seguridad y Buenas Prácticas
Validación de Datos: Todos los formularios pasan por capas de validación del lado del servidor (FormRequest).

Protección CSRF: Todos los formularios utilizan el directivo @csrf de Laravel para prevenir ataques de falsificación de peticiones.

Accesibilidad: Uso de etiquetas aria-label en componentes críticos para garantizar compatibilidad con lectores de pantalla.