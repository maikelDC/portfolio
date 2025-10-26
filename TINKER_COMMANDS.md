# Comandos Tinker para Poblar la Base de Datos

Este documento contiene comandos para poblar la base de datos del portfolio usando Laravel Tinker.

## Iniciar Tinker

```bash
php artisan tinker
```

---

## 👤 1. Crear Usuario

```php
$user = \App\Models\User::create([
    'name' => 'Juan Pérez',
    'email' => 'juan@example.com',
    'password' => bcrypt('password123')
]);
```

---

## ⭐ 2. Categorías (áreas profesionales)

```php
$backend = App\Models\Category::create(['name' => 'Backend', 'slug' => 'backend', 'description' => 'Desarrollo de servidores y APIs']);
$frontend = App\Models\Category::create(['name' => 'Frontend', 'slug' => 'frontend', 'description' => 'Interfaces web y UX/UI']);
```

---

## 🏷️ 3. Tags (habilidades y tecnologías)

```php
$laravel = App\Models\Tag::create(['name' => 'Laravel', 'slug' => 'laravel', 'type' => 'technical', 'icon_path' => 'icons/laravel.svg']);
$vue = App\Models\Tag::create(['name' => 'Vue.js', 'slug' => 'vuejs', 'type' => 'technical', 'icon_path' => 'icons/vue.svg']);
$teamwork = App\Models\Tag::create(['name' => 'Trabajo en equipo', 'slug' => 'equipo', 'type' => 'soft', 'icon_path' => 'icons/teamwork.svg']);
```

---

## 👨🏽‍⚖️ 4. Perfil Profesional (👤 requiere user y ⭐ category previas)

```php
$profile = App\Models\Profile::create([
    'user_id' => $user->id,
    'full_name' => 'Juan Pérez',
    'title' => 'Desarrollador Full Stack',
    'slug' => 'juan-perez',
    'location' => 'Caracas, Venezuela',
    'phone' => '+584141234567',
    'email' => $user->email,
    'short_bio' => 'Apasionado por la tecnología y desarrollo web',
    'category_id' => $backend->id,
]);
```

---

## ⭐ 5. Proyectos (requiere profile y category)

```php
$project = App\Models\Project::create([
    'profile_id' => $profile->id,
    'category_id' => $frontend->id,
    'title' => 'Plataforma de reservas en línea',
    'slug' => 'reservas-online',
    'description' => 'Aplicación web para reservar eventos y hoteles.',
    'role' => 'Líder de desarrollo frontend',
    'start_date' => '2023-01-01',
    'end_date' => '2023-07-01',
    'team_size' => 5,
    'status' => true,
    'is_favorite' => true,
]);
```

---

## 🎓 6. Educations (estudios y cursos, requiere profile)

```php
$education = App\Models\Education::create([
    'profile_id' => $profile->id,
    'institution' => 'Universidad Central',
    'degree' => 'Ingeniero Informático',
    'type' => 'universitaria',
    'start_date' => '2018-10-01',
    'end_date' => '2023-07-01',
    'description' => 'Título universitario en ingeniería informática',
]);
```

---

## 🖼️ 7. Imágenes polimórficas (relacionadas a profile, project, education, tag...)

```php
// Avatar para perfil
$profile->images()->create([
    'image_path' => 'avatars/juan.png',
    'title' => 'Avatar',
    'type' => 'avatar'
]);

// Banner y galería del proyecto
$project->images()->create([
    'image_path' => 'proyectos/reservas/banner.png',
    'title' => 'Banner principal',
    'type' => 'banner'
]);
$project->images()->create([
    'image_path' => 'proyectos/reservas/galeria1.png',
    'title' => 'Screenshot de la app',
    'type' => 'gallery'
]);

// Imagen de certificado en education
$education->images()->create([
    'image_path' => 'certificados/uni-certificado.png',
    'title' => 'Certificado electrónico',
    'type' => 'certificate'
]);

// Icono para el tag (si quieres vincular una imagen polimórficamente al tag)
$laravel->images()->create([
    'image_path' => 'icons/laravel.svg',
    'title' => 'Laravel Icon',
    'type' => 'icon'
]);
```

---

## 🔗 8. Links polimórficos (social, demo, repo, certificado…)

```php
// Link de redes sociales para perfil
$profile->links()->create([
    'url' => 'https://linkedin.com/in/juanperez',
    'label' => 'LinkedIn',
    'type' => 'social',
    'icon_path' => 'icons/linkedin.svg'
]);

// Link a demo y repositorio en proyecto
$project->links()->create([
    'url' => 'https://demo.misitio.com',
    'label' => 'Demo en vivo',
    'type' => 'demo',
    'icon_path' => 'icons/web.svg'
]);
$project->links()->create([
    'url' => 'https://github.com/juanperez/reservas',
    'label' => 'Repositorio',
    'type' => 'repo',
    'icon_path' => 'icons/github.svg'
]);

// Link al certificado digital en education
$education->links()->create([
    'url' => 'https://certificados.universidad.com/uni-certificado',
    'label' => 'Ver certificado',
    'type' => 'certificate',
    'icon_path' => 'icons/certificate.svg'
]);

```

---

## 🔖 9. Tags polimórficos (asociar tags a proyectos, perfil, educación, etc.)
```php
// Asociar etiquetas tecnológicas y blandas al proyecto
$project->tags()->attach([$laravel->id, $vue->id, $teamwork->id]);

// Asociar una tecnología al perfil
$profile->tags()->attach($laravel->id);

// Asociar misma tecnología a education
$education->tags()->attach($laravel->id);
```

---

## ⏩ 10. Consultas recomendadas para visualizar tus datos

```php
// Proyectos de una categoría
App\Models\Project::where('category_id', $frontend->id)->get();

// Todos los tags de un proyecto
$project->tags;

// Todas las imágenes de galería del proyecto
$project->images()->where('type', 'gallery')->get();

// Links sociales del perfil
$profile->links()->where('type', 'social')->get();

// Educación, ver imágenes y links de certificado
$education->images;
$education->links;
```

---

# 👀 Consultas y visualizaciones útiles en Tinker

## 1. Ver todos los usuarios

```php
App\Models\User::all();
```

---

## 2. Ver todos los perfiles
```php
App\Models\Profile::all();
```

---

## 3. Ver todas las categorías

```php
App\Models\Category::all();
```

---

## 4. Ver todas las etiquetas (tags)

```php
App\Models\Tag::all();
```

---

## 5. Ver todos los proyectos

```php
App\Models\Project::all();
```

---

## 6. Ver todas las educaciones/cursos

```php
App\Models\Education::all();
```

---

## 7. Ver todas las imagénes

```php
App\Models\Image::all();
```

---

## 8. Ver todos los Links

```php
App\Models\Link::all();
```

---

## 9. Ver todas las etiquetas (tagabbles pivot)

```php
DB::table('taggables')->get();
```

---

## 10. 🔍 Ver un perfil completo con todas sus relaciones

```php
$profile = App\Models\Profile::with([
    'user',
    'category',
    'projects.images',
    'projects.tags',
    'projects.links',
    'educations.images',
    'educations.links',
    'tags',
    'images',
    'links'
])->find(1); // Cambia 1 por el ID del perfil a consultar

// Ahora puedes ver, por ejemplo:
$profile->projects;           // Proyectos del perfil
$profile->tags;               // Habilidades/tecnologías del perfil
$profile->category;           // Categoría principal
$profile->images;             // Avatar o imágenes asociadas
$profile->links;              // Enlaces sociales
$profile->educations;         // Estudio o formación

$profile->projects->pluck('title');  // Solo títulos de proyectos
```
---

## 11. ⭐ Ver los proyectos favoritos de un perfil

```php
$profile->projects()->where('is_favorite', true)->get();
```

---

## 12. 🔖 Ver habilidades técnicas y blandas del perfil

```php
// Técnicas
$profile->tags()->where('type', 'technical')->get();

// Blandas
$profile->tags()->where('type', 'soft')->get();
```

---

## 13. 🔖 Ver habilidades técnicas y blandas de un proyecto

```php
$project = App\Models\Project::with('tags')->find(1); // Cambia el ID
// Técnicas:
$project->tags->where('type', 'technical');
// Blandas:
$project->tags->where('type', 'soft');
```

---

## 14. 👁️ Ver todos los proyectos de una categoría

```php
$backend = App\Models\Category::where('slug','backend')->first();
$backend->projects;
```

---

## 15. 🖼️ Ver todas las imágenes tipo 'avatar'

```php
App\Models\Image::where('type', 'avatar')->get();
```

---

## 16. 🔗 Ver todos los links tipo 'social'

```php
App\Models\Link::where('type', 'social')->get();
```

---

# 🧹 Limpieza y reseteo

## Limpiar toda la base de datos y volver a poblar

```php
// Esto elimina todas las tablas, las recrea y ejecuta los seeders (si tienes seeders configurados).
php artisan migrate:fresh --seed

// Eliminar todos los registros de una tabla (solo en desarrollo):
App\Models\Project::truncate();
App\Models\Profile::truncate();
App\Models\Category::truncate();
App\Models\Tag::truncate();
App\Models\Education::truncate();
App\Models\Image::truncate();
App\Models\Link::truncate();
DB::table('taggables')->truncate(); // Para el pivot polimórfico

```

## Notas

- Los IDs se generan automáticamente
- Las fechas deben estar en formato `YYYY-MM-DD`
- `finished_at` y `end_date` pueden ser `null` para indicar proyectos/estudios en curso
- Recuerda ejecutar las migraciones antes: `php artisan migrate` o `php artisan migrate:fresh`

¡Listo para poblar tu portfolio! 🚀
