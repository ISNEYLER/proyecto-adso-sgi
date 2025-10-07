# 🧩 Proyecto SGI

Este proyecto está desarrollado utilizando el **framework CodeIgniter 4**, implementando el patrón **MVC (Modelo-Vista-Controlador)** para mantener una estructura limpia, escalable y fácil de mantener.  
Además, se emplean **Bootstrap** para el diseño responsivo y **Composer** para la gestión de dependencias.

---

## 🚀 Tecnologías utilizadas

- **PHP 8.x** → Lenguaje principal del proyecto.  
- **CodeIgniter 4** → Framework PHP ligero que facilita el desarrollo con una arquitectura MVC clara.  
- **Bootstrap 5** → Framework CSS para crear interfaces modernas, limpias y responsivas.  
- **Composer** → Herramienta de gestión de dependencias PHP, utilizada para instalar y mantener CodeIgniter y otros paquetes necesarios.  

---

## 📂 Estructura del proyecto

```
app/
 ├── Controllers/      # Controladores que manejan la lógica del negocio
 ├── Models/           # Modelos que interactúan con la base de datos
 ├── Views/            # Vistas que renderizan la interfaz de usuario
 └── Config/           # Archivos de configuración del framework
public/
 ├── css/              # Hojas de estilo personalizadas
 ├── lib/              # Librerias necesarias
 ├── js/               # Scripts JavaScript
 └── index.php         # Punto de entrada de la aplicación
writable/              # Archivos generados por el sistema (logs, caché, etc.)
vendor/                # Dependencias instaladas con Composer
.env                   # Archivo de entorno
composer.json          # Configuración de dependencias
```

---

## ⚙️ Instalación y configuración

1. **Clonar el repositorio dentro de htdocs en xampp**
   ```bash
   git clone https://github.com/ISNEYLER/proyecto-adso-sgi.git
   cd proyecto-adso-sgi
   ```

2. **Instalar dependencias con Composer**
   ```bash
   composer install
   ```

3. **Configurar el entorno**
   - Copia el archivo `env` y cambiale el nombre a `.env`:
     ```bash
     cp env .env
     ```
   - Modifica las variables necesarias (base de datos, entorno, etc.):
     ```bash
     CI_ENVIRONMENT = development
     app.baseURL = 'http://localhost/proyecto-adso-sgi/public'
     database.default.hostname = localhost
     database.default.database = tu_base_de_datos
     database.default.username = usuario
     database.default.password = contraseña
     database.default.DBDriver = MySQLi
     ```

4. **Ejecutar el proyecto en xamppp**
Inicia Apache y MySQL en xammpp, luego dirigitete a `http://localhost/proyecto-adso-sgi/public`
---
