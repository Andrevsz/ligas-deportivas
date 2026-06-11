# 🏆 Sistema de Gestión de Ligas Deportivas

Plataforma Full-Stack profesional para la administración de torneos deportivos multideporte.

## 🌟 Características
- **Interfaz Moderna:** Diseño bajo el concepto de *Glassmorphism* para una experiencia de usuario limpia y profesional.
- **Gestión Automática:** Cálculo en tiempo real de tablas de posiciones basado en resultados de partidos.
- **Panel Administrativo:** Acceso restringido y protegido mediante autenticación profesional.
- **Multideporte:** Arquitectura flexible para gestionar torneos de cualquier disciplina.

## 🛠️ Stack Tecnológico
- **Framework:** Laravel 13
- **Frontend:** Blade Templating + Tailwind CSS
- **Base de Datos:** MySQL
- **Tooling:** Vite

## 🚀 Cómo ejecutar el proyecto
1. Clonar el repositorio:
   `git clone https://github.com/tu-usuario/ligas-deportivas.git`
2. Instalar dependencias:
   `composer install`
   `npm install`
3. Configurar el entorno:
   `cp .env.example .env`
   `php artisan key:generate`
4. Ejecutar migraciones:
   `php artisan migrate`
5. Levantar el servidor:
   `php artisan serve` y `npm run dev`