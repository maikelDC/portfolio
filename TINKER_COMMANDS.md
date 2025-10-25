# Comandos Tinker para Poblar la Base de Datos

Este documento contiene comandos para poblar la base de datos del portfolio usando Laravel Tinker.

## Iniciar Tinker

```bash
php artisan tinker
```

---

## 1. Crear Usuario y Perfil

```php
// Crear usuario
$user = \App\Models\User::create([
    'name' => 'Juan Pérez',
    'email' => 'juan@example.com',
    'password' => bcrypt('password123')
]);

// Crear perfil asociado al usuario
$profile = \App\Models\Profile::create([
    'user_id' => $user->id,
    'full_name' => 'Juan Carlos Pérez García',
    'title' => 'Full Stack Developer',
    'location' => 'Madrid, España',
    'phone' => '+34 612 345 678',
    'email' => 'juan.perez@professional.com',
    'bio' => 'Desarrollador apasionado con 5 años de experiencia en aplicaciones web modernas.'
]);
```

---

## 2. Crear Proyectos

```php
// Proyecto 1
$project1 = \App\Models\Project::create([
    'profile_id' => $profile->id,
    'title' => 'Sistema de Gestión de Inventario',
    'description' => 'Desarrollo de un sistema completo para gestión de inventario en tiempo real.',
    'role' => 'Lead Developer',
    'started_at' => '2023-01-15',
    'finished_at' => '2023-06-30',
    'team_size' => 5,
    'status' => true,
    'is_favorite' => true
]);

// Proyecto 2
$project2 = \App\Models\Project::create([
    'profile_id' => $profile->id,
    'title' => 'E-commerce Platform',
    'description' => 'Plataforma de comercio electrónico con integración de pagos.',
    'role' => 'Backend Developer',
    'started_at' => '2023-07-01',
    'finished_at' => null, // Proyecto en curso
    'team_size' => 8,
    'status' => true,
    'is_favorite' => true
]);

// Proyecto 3
$project3 = \App\Models\Project::create([
    'profile_id' => $profile->id,
    'title' => 'API REST para Mobile App',
    'description' => 'API RESTful para aplicación móvil de gestión de tareas.',
    'role' => 'Full Stack Developer',
    'started_at' => '2022-09-01',
    'finished_at' => '2022-12-15',
    'team_size' => 3,
    'status' => true,
    'is_favorite' => false
]);
```

---

## 3. Crear Skills (Habilidades)

### Skills Técnicas

```php
$skill1 = \App\Models\Skill::create([
    'profile_id' => $profile->id,
    'name' => 'Laravel',
    'type' => 'tecnicas'
]);

$skill2 = \App\Models\Skill::create([
    'profile_id' => $profile->id,
    'name' => 'Vue.js',
    'type' => 'tecnicas'
]);

$skill3 = \App\Models\Skill::create([
    'profile_id' => $profile->id,
    'name' => 'MySQL',
    'type' => 'tecnicas'
]);

$skill4 = \App\Models\Skill::create([
    'profile_id' => $profile->id,
    'name' => 'Docker',
    'type' => 'tecnicas'
]);

$skill5 = \App\Models\Skill::create([
    'profile_id' => $profile->id,
    'name' => 'PHP',
    'type' => 'tecnicas'
]);

$skill6 = \App\Models\Skill::create([
    'profile_id' => $profile->id,
    'name' => 'JavaScript',
    'type' => 'tecnicas'
]);
```

### Skills Blandas

```php
$skill7 = \App\Models\Skill::create([
    'profile_id' => $profile->id,
    'name' => 'Trabajo en Equipo',
    'type' => 'blandas'
]);

$skill8 = \App\Models\Skill::create([
    'profile_id' => $profile->id,
    'name' => 'Liderazgo',
    'type' => 'blandas'
]);

$skill9 = \App\Models\Skill::create([
    'profile_id' => $profile->id,
    'name' => 'Comunicación',
    'type' => 'blandas'
]);

$skill10 = \App\Models\Skill::create([
    'profile_id' => $profile->id,
    'name' => 'Resolución de Problemas',
    'type' => 'blandas'
]);
```

---

## 4. Asociar Skills a Proyectos (Tabla Pivot)

```php
// Asociar skills al proyecto 1
$project1->skills()->attach([$skill1->id, $skill2->id, $skill3->id, $skill5->id]);

// Asociar skills al proyecto 2
$project2->skills()->attach([$skill1->id, $skill2->id, $skill4->id, $skill6->id]);

// Asociar skills al proyecto 3
$project3->skills()->attach([$skill1->id, $skill3->id, $skill5->id]);
```

---

## 5. Crear Estudios

```php
$study1 = \App\Models\Study::create([
    'profile_id' => $profile->id,
    'institution' => 'Universidad Complutense de Madrid',
    'degree' => 'Ingeniería Informática',
    'start_date' => '2015-09-01',
    'end_date' => '2019-06-30',
    'description' => 'Especialización en Desarrollo de Software'
]);

$study2 = \App\Models\Study::create([
    'profile_id' => $profile->id,
    'institution' => 'Universidad Politécnica de Madrid',
    'degree' => 'Máster en Ingeniería Web',
    'start_date' => '2019-09-01',
    'end_date' => '2020-07-15',
    'description' => 'Enfoque en arquitecturas escalables y cloud computing'
]);
```

---

## 6. Crear Trainings (Cursos/Capacitaciones)

```php
$training1 = \App\Models\Training::create([
    'profile_id' => $profile->id,
    'title' => 'Advanced Laravel Development',
    'provider' => 'Laracasts',
    'description' => 'Curso avanzado de Laravel con patrones de diseño y buenas prácticas.',
    'start_date' => '2022-01-10',
    'end_date' => '2022-03-15'
]);

$training2 = \App\Models\Training::create([
    'profile_id' => $profile->id,
    'title' => 'Docker & Kubernetes for Developers',
    'provider' => 'Udemy',
    'description' => 'Containerización y orquestación de aplicaciones.',
    'start_date' => '2022-06-01',
    'end_date' => '2022-07-20'
]);

$training3 = \App\Models\Training::create([
    'profile_id' => $profile->id,
    'title' => 'AWS Certified Solutions Architect',
    'provider' => 'AWS Training',
    'description' => 'Certificación en arquitectura de soluciones en AWS.',
    'start_date' => '2023-02-01',
    'end_date' => null // En curso
]);

$training4 = \App\Models\Training::create([
    'profile_id' => $profile->id,
    'title' => 'Vue.js 3 - The Complete Guide',
    'provider' => 'Udemy',
    'description' => 'Desarrollo de aplicaciones modernas con Vue.js 3 y Composition API.',
    'start_date' => '2023-05-01',
    'end_date' => '2023-06-15'
]);
```

---

## 7. Comandos Útiles para Verificar Datos

```php
// Ver todos los proyectos de un perfil
$profile->projects;

// Ver todas las skills de un perfil
$profile->skills;

// Ver las skills de un proyecto específico
$project1->skills;

// Ver los estudios
$profile->studies;

// Ver los trainings
$profile->trainings;

// Contar registros
\App\Models\Project::count();
\App\Models\Skill::count();
\App\Models\Study::count();
\App\Models\Training::count();

// Ver el perfil con todas sus relaciones
$profile->load(['projects', 'skills', 'studies', 'trainings', 'user']);

// Ver proyectos favoritos
\App\Models\Project::where('is_favorite', true)->get();

// Ver proyectos activos
\App\Models\Project::where('status', true)->get();

// Ver skills por tipo
\App\Models\Skill::where('type', 'tecnicas')->get();
\App\Models\Skill::where('type', 'blandas')->get();
```

---

## 8. Comando Completo en una Sola Ejecución

Puedes copiar todo esto en Tinker de una vez:

```php
// Crear usuario y perfil
$user = \App\Models\User::create(['name' => 'Juan Pérez', 'email' => 'juan@example.com', 'password' => bcrypt('password123')]);
$profile = \App\Models\Profile::create(['user_id' => $user->id, 'full_name' => 'Juan Carlos Pérez García', 'title' => 'Full Stack Developer', 'location' => 'Madrid, España', 'phone' => '+34 612 345 678', 'email' => 'juan.perez@professional.com', 'bio' => 'Desarrollador apasionado con 5 años de experiencia.']);

// Crear proyectos
$project1 = \App\Models\Project::create(['profile_id' => $profile->id, 'title' => 'Sistema de Gestión de Inventario', 'description' => 'Sistema completo para gestión de inventario', 'role' => 'Lead Developer', 'started_at' => '2023-01-15', 'finished_at' => '2023-06-30', 'team_size' => 5, 'status' => true, 'is_favorite' => true]);
$project2 = \App\Models\Project::create(['profile_id' => $profile->id, 'title' => 'E-commerce Platform', 'description' => 'Plataforma de comercio electrónico', 'role' => 'Backend Developer', 'started_at' => '2023-07-01', 'finished_at' => null, 'team_size' => 8, 'status' => true, 'is_favorite' => true]);

// Crear skills
$skill1 = \App\Models\Skill::create(['profile_id' => $profile->id, 'name' => 'Laravel', 'type' => 'tecnicas']);
$skill2 = \App\Models\Skill::create(['profile_id' => $profile->id, 'name' => 'Vue.js', 'type' => 'tecnicas']);
$skill3 = \App\Models\Skill::create(['profile_id' => $profile->id, 'name' => 'MySQL', 'type' => 'tecnicas']);
$skill4 = \App\Models\Skill::create(['profile_id' => $profile->id, 'name' => 'Trabajo en Equipo', 'type' => 'blandas']);

// Asociar skills a proyectos
$project1->skills()->attach([$skill1->id, $skill2->id, $skill3->id]);
$project2->skills()->attach([$skill1->id, $skill2->id]);

// Crear estudios
$study1 = \App\Models\Study::create(['profile_id' => $profile->id, 'institution' => 'Universidad Complutense de Madrid', 'degree' => 'Ingeniería Informática', 'start_date' => '2015-09-01', 'end_date' => '2019-06-30', 'description' => 'Especialización en Desarrollo de Software']);

// Crear trainings
$training1 = \App\Models\Training::create(['profile_id' => $profile->id, 'title' => 'Advanced Laravel Development', 'provider' => 'Laracasts', 'description' => 'Curso avanzado de Laravel', 'start_date' => '2022-01-10', 'end_date' => '2022-03-15']);

echo "✅ Datos creados exitosamente";
```

---

## 9. Limpiar Base de Datos (Cuidado!)

Si necesitas empezar de nuevo:

```php
// Eliminar todos los datos (en orden por dependencias)
\App\Models\Project::query()->delete();
\App\Models\Skill::query()->delete();
\App\Models\Study::query()->delete();
\App\Models\Training::query()->delete();
\App\Models\Profile::query()->delete();
\App\Models\User::query()->delete();

// O resetear toda la base de datos desde consola:
// php artisan migrate:fresh
```

---

## 10. Crear Múltiples Registros Rápidamente

```php
// Crear múltiples skills de una vez
$technicalSkills = ['PHP', 'JavaScript', 'Python', 'Java', 'Git', 'Linux'];
foreach ($technicalSkills as $skillName) {
    \App\Models\Skill::create([
        'profile_id' => $profile->id,
        'name' => $skillName,
        'type' => 'tecnicas'
    ]);
}

// Crear múltiples trainings
$trainings = [
    ['title' => 'TDD con PHPUnit', 'provider' => 'Platzi', 'start_date' => '2023-01-01', 'end_date' => '2023-02-01'],
    ['title' => 'Clean Code', 'provider' => 'Udemy', 'start_date' => '2022-08-01', 'end_date' => '2022-09-15'],
    ['title' => 'API REST Design', 'provider' => 'Coursera', 'start_date' => '2023-03-01', 'end_date' => '2023-04-01'],
];

foreach ($trainings as $trainingData) {
    \App\Models\Training::create([
        'profile_id' => $profile->id,
        'title' => $trainingData['title'],
        'provider' => $trainingData['provider'],
        'description' => 'Curso sobre ' . $trainingData['title'],
        'start_date' => $trainingData['start_date'],
        'end_date' => $trainingData['end_date']
    ]);
}
```

---

## Notas

- Los IDs se generan automáticamente
- Las fechas deben estar en formato `YYYY-MM-DD`
- `finished_at` y `end_date` pueden ser `null` para indicar proyectos/estudios en curso
- La relación muchos a muchos entre proyectos y skills usa la tabla pivot `project_skill`
- Recuerda ejecutar las migraciones antes: `php artisan migrate`

¡Listo para poblar tu portfolio! 🚀
