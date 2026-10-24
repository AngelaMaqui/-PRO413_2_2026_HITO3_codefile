# 📚 Módulo Persona C - Reporte Consolidado de Cursos (Hito 3)

Este módulo pertenece a la aplicación **Hito 3 (PRO413_2_2026)** desarrollada en Laravel. Permite generar un reporte cruzado en tiempo real entre la base de datos local del sistema (Cursos/Asignaturas) y la base de datos institucional externa/contenedor Docker (`mysql_docente`).

---

## 📋 Requisitos Previos

Asegúrate de contar con las siguientes herramientas instaladas en tu equipo:

* **PHP** >= 8.2 (con las extensiones `pdo_sqlite` y `pdo_mysql` habilitadas en `php.ini`).
* **Composer** >= 2.x
* **Git**
* *(Opcional)* **Docker Desktop** (para el contenedor de la base de datos de docentes).

---

## 🚀 Pasos para Levantar el Servicio

Sigue estos pasos en la terminal (PowerShell / Command Prompt) para poner en marcha el proyecto localmente desde cero:

### 1. Clonar el repositorio y entrar al proyecto
```powershell
git clone https://github.com/AngelaMaqui/-PRO413_2_2026_HITO3_codefile.git
cd -PRO413_2_2026_HITO3_codefile
```

### 2. Instalar dependencias de PHP
```powershell
composer install
```

### 3. Configurar el archivo de entorno (`.env`)
Copia el archivo de ejemplo para crear tu archivo de entorno:
```powershell
copy .env.example .env
```

Asegúrate de incluir las siguientes variables en tu `.env` para la conexión a la base de datos de docentes (`mysql_docente`):

```env
# Conexión Principal (Local / SQLite)
DB_CONNECTION=sqlite

# Conexión Secundaria (DB Institucional Docente / Docker)
DB_DOCENTE_HOST=10.0.47.204   # O 127.0.0.1 si se ejecuta localmente en Docker
DB_DOCENTE_PORT=3306
DB_DOCENTE_DATABASE=escolar_docente
DB_DOCENTE_USERNAME=tu_usuario
DB_DOCENTE_PASSWORD=tu_contraseña
```

### 4. Generar la clave de la aplicación
```powershell
php artisan key:generate
```

### 5. Crear la base de datos SQLite y ejecutar migraciones
```powershell
New-Item -ItemType File -Path "database/database.sqlite" -Force
php artisan migrate
```

### 6. Limpiar caché de configuración
```powershell
php artisan config:clear
php artisan cache:clear
```

### 7. Iniciar el servidor local
```powershell
php artisan serve
```

---

## 🌐 Acceso al Módulo Persona C

Una vez iniciado el servidor, abre tu navegador e ingresa a:

👉 **`http://127.0.0.1:8000/reportes/cursos`**

---

## ⚙️ Estado de la Conexión de Datos

* **Sin contenedor Docker activo / DB externa inalcanzable:** La vista cargará de forma segura mostrando una alerta informativa en rojo y una tabla vacía.
* **Con contenedor Docker / DB externa activa:** La tabla se poblará automáticamente en tiempo real combinando las asignaturas de la DB local con los docentes, aulas y gestiones académicas de la DB externa.