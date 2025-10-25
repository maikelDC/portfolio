# 📁 Portfolio - Sistema de Gestión de Portafolio Personal

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php)](https://php.net)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-4E56A6?style=flat&logo=livewire)](https://livewire.laravel.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

Sistema completo de gestión de portafolio personal desarrollado con Laravel 12, Livewire 3 y Flux UI. Permite administrar proyectos, habilidades técnicas y blandas, estudios académicos y cursos de capacitación de forma profesional.

---

## ✨ Características Principales

- 🔐 **Autenticación segura** con Laravel Fortify (incluye 2FA)
- 👤 **Gestión de perfil profesional** con información de contacto
- 💼 **Administración de proyectos** con descripción, rol, fechas y estado
- 🎯 **Gestión de habilidades** (técnicas y blandas)
- 📚 **Registro de estudios académicos**
- 🎓 **Seguimiento de cursos y capacitaciones**
- 🔗 **Relación muchos a muchos** entre proyectos y habilidades
- ⚡ **Interfaz reactiva** con Livewire y Flux UI
- 📱 **Diseño responsive** y moderno

---

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 12** - Framework PHP
- **PHP 8.2+** - Lenguaje de programación
- **MySQL/SQLite** - Base de datos
- **Laravel Fortify** - Autenticación y 2FA

### Frontend
- **Livewire 3** - Componentes reactivos
- **Livewire Volt** - Single File Components
- **Livewire Flux** - Biblioteca de componentes UI
- **Vite** - Build tool y HMR
- **Tailwind CSS** - Framework CSS (integrado con Flux)

### Herramientas de Desarrollo
- **Laravel Pint** - Code style fixer
- **Pest PHP** - Testing framework
- **Laravel Tinker** - REPL para Laravel
- **Concurrently** - Ejecución paralela de comandos

---

## 📋 Requisitos Previos

Antes de instalar el proyecto, asegúrate de tener:

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x y **npm** >= 9.x
- **MySQL** >= 8.0 o **SQLite** (para desarrollo)
- Extensiones PHP requeridas:
  - BCMath
  - Ctype
  - Fileinfo
  - JSON
  - Mbstring
  - OpenSSL
  - PDO
  - Tokenizer
  - XML

---

## 🚀 Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/portfolio.git
cd portfolio
```

### 2. Instalar dependencias

```bash
# Instalar dependencias de PHP
composer install

# Instalar dependencias de Node.js
npm install
```

### 3. Configurar el entorno

```bash
# Copiar el archivo de configuración
copy .env.example .env

# Generar la clave de aplicación
php artisan key:generate
```

### 4. Configurar la base de datos

Edita el archivo `.env` con tus credenciales:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=
```

**Opción SQLite** (para desarrollo local):
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

### 5. Ejecutar migraciones

```bash
# Crear la base de datos (si usas SQLite)
type nul > database\database.sqlite

# Ejecutar las migraciones
php artisan migrate
```

### 6. Poblar la base de datos (Opcional)

Puedes usar Tinker para crear datos de prueba. Consulta el archivo [TINKER_COMMANDS.md](TINKER_COMMANDS.md) para ejemplos detallados.

```bash
php artisan tinker
```

O ejecuta este comando rápido:

```php
$user = \App\Models\User::create(['name' => 'Admin', 'email' => 'admin@portfolio.com', 'password' => bcrypt('password')]);
$profile = \App\Models\Profile::create(['user_id' => $user->id, 'full_name' => 'Administrador', 'title' => 'Developer', 'location' => 'México', 'phone' => '+52 123 456 7890', 'email' => 'admin@portfolio.com', 'bio' => 'Desarrollador profesional']);
```

### 7. Compilar assets

```bash
# Para desarrollo
npm run dev

# Para producción
npm run build
```

### 8. Iniciar el servidor

```bash
# Servidor de desarrollo
php artisan serve
```

La aplicación estará disponible en: `http://localhost:8000`

---

## ⚡ Comandos de Desarrollo

### Iniciar todo el entorno de desarrollo

```bash
composer dev
```

Este comando ejecuta simultáneamente:
- Servidor Laravel (`php artisan serve`)
- Cola de trabajos (`php artisan queue:listen`)
- Vite dev server (`npm run dev`)

### Otros comandos útiles

```bash
# Ejecutar tests
composer test

# Formatear código (Laravel Pint)
./vendor/bin/pint

# Limpiar caché
php artisan optimize:clear

# Ver logs en tiempo real
php artisan pail
```

---

## 📊 Estructura de la Base de Datos

### Modelos y Relaciones

```
User (1) ──── (1) Profile
                   │
                   ├── (1:N) Projects
                   ├── (1:N) Skills
                   ├── (1:N) Studies
                   └── (1:N) Trainings

Project (N) ──── (N) Skill (tabla pivot: project_skill)
```

### Tablas Principales

- **users** - Usuarios del sistema
- **profiles** - Información del perfil profesional
- **projects** - Proyectos realizados
- **skills** - Habilidades técnicas y blandas
- **studies** - Estudios académicos
- **trainings** - Cursos y capacitaciones
- **project_skill** - Relación muchos a muchos entre proyectos y habilidades

---

## 🔑 Credenciales de Acceso (Demo)

Si poblaste la base de datos con los datos de ejemplo:

- **Email:** `admin@portfolio.com`
- **Password:** `password`

---

## 📁 Estructura del Proyecto

```
portfolio/
├── app/
│   ├── Http/Controllers/     # Controladores
│   ├── Models/                # Modelos Eloquent
│   │   ├── User.php
│   │   ├── Profile.php
│   │   ├── Project.php
│   │   ├── Skill.php
│   │   ├── Study.php
│   │   └── Training.php
│   └── Livewire/              # Componentes Livewire
├── database/
│   ├── migrations/            # Migraciones de BD
│   └── seeders/               # Seeders
├── resources/
│   ├── views/                 # Vistas Blade
│   └── js/                    # JavaScript
├── routes/
│   └── web.php                # Rutas web
├── public/                    # Assets públicos
├── tests/                     # Tests (Pest PHP)
├── TINKER_COMMANDS.md         # Guía de comandos Tinker
└── README.md                  # Este archivo
```

---

## 🧪 Testing

El proyecto utiliza **Pest PHP** para testing.

```bash
# Ejecutar todos los tests
php artisan test

# O usando composer
composer test

# Tests con cobertura
php artisan test --coverage
```

---

## 🚢 Deployment

### Preparar para producción

```bash
# Optimizar autoloader
composer install --optimize-autoloader --no-dev

# Compilar assets
npm run build

# Cachear configuración
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Variables de entorno importantes

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-dominio.com

# Configurar cache (Redis recomendado)
CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis
```

---

## 🤝 Contribución

Las contribuciones son bienvenidas. Para cambios importantes:

1. Haz fork del proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add: nueva característica'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

### Estándares de código

- Seguir PSR-12
- Usar Laravel Pint para formatear: `./vendor/bin/pint`
- Escribir tests para nuevas funcionalidades

---

## 📝 Documentación Adicional

- [Comandos Tinker para poblar la BD](TINKER_COMMANDS.md)
- [Documentación de Laravel](https://laravel.com/docs)
- [Documentación de Livewire](https://livewire.laravel.com/docs)
- [Flux UI Components](https://fluxui.dev)

---

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

---

## 👨‍💻 Autor

**Tu Nombre**

- GitHub: [@drfoxsoscomputer](https://github.com/drfoxsoscomputer)
- Email: daprthefox@gmail.com
- Portfolio: [drfoxsoscomputer.github.io](https://drfoxsoscomputer.github.io/)

---

## 🙏 Agradecimientos

- [Laravel](https://laravel.com) - Framework PHP
- [Livewire](https://livewire.laravel.com) - Componentes reactivos
- [Flux UI](https://fluxui.dev) - Componentes de interfaz
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS

---

## 📞 Soporte

Si tienes alguna pregunta o problema:

1. Revisa la documentación en este README
2. Consulta [TINKER_COMMANDS.md](TINKER_COMMANDS.md) para ejemplos de datos
3. Abre un [issue](https://github.com/tu-usuario/portfolio/issues) en GitHub

---

⭐ **Si este proyecto te fue útil, considera darle una estrella en GitHub**

**Desarrollado con ❤️ usando Laravel y Livewire**

// 1. Certificaciones lo podemos unir a Training, es decir, si es un curso/seminario entre otro y tiene certificacion con una url de dicho certificado se puedde agregar sino, sería nullable, tambien una vista previa para la imagen del certificado sea con certificacion oficial o solo un certificado de asistencia.
2. Tags/Categorias seria polimorfica?, podemos tambien modificar el campo de la migracion links y reemplazar el enum type
3. Tecnologías/Stack aun no me queda claro, puedes explicarmelo con un ejemplo?.
4. SEO podemos dejarlo para el final?
5. Analytics/Estadísticas me gusta esa.
(no crear migraciones nuevas para agregar columnas, sino modificar las migraciones y al finalizar realizar una migracion con fresh)
