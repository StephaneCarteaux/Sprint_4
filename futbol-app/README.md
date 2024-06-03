
# Super Futbol League

Super Futbol League es un proyecto de esdudio desarollado con Laravel.

Utiliza Breeze para dar soporte a la gestión de usuarios, el envio de emails de confirmación de registro y recuperación de contraseña.

Tiene soporte multi-idioma.

La app permite la gestion de ligas de futbol, sus equipos y partidos así como la visualización de estadisticas.

## Autor

- [@stephanecarteaux](https://github.com/StephaneCarteaux)


## Installación

```bash
# Clonar el repositorio:
  git clone https://github.com/StephaneCarteaux/Sprint_4.git
  cd futbol-app

# Instalar dependencias de Composer:
  composer install

# Configurar variables de entorno:
  cp .env.example .env # Edita el archivo .env según sea necesario

# Generar clave de aplicación:
  php artisan key:generate

# Migrar la base de datos:
  php artisan migrate
  php artisan db:seed

# Instalar dependencias de npm:
  npm install

# Compilar activos de frontend:
  npm run dev  # Para desarrollo
  npm run build  # Para producción
```
    
## Documentación

### Gestionar ligas
El primer paso para utilizar la app es crear una liga. (Puedes crear tantas como quieras).
En esta sección encontrarás las siguientes opciones:

- Iniciar<br/>
  Eso permite dar comienzo a una liga para poder crear sus partidos.

- Activar<br/>
  Esa opción determina con que liga están relacionados los datos que muestra la app en cada momento. (También puedes cambiar la liga activa con el desplegable del menú principal).

- Editar

- Eliminar<br/>
  Ten en cuenta que si eliminas una liga, se eliminaran también los equipos y los partidos de esa liga. 

### Equipos
Una vez creada una liga, podrás crear equipos para esa liga.

### Partidos
Para poder crear partidos, primero tienes que iniciar la liga en la seccion "Gestionar ligas".<br/>
Ten en cuenta que una vez iniciada una liga, ya no podrás crear nuevos equipos ni eliminar los existentes para esa liga.

### Clasificación
Un vez existan partidos para una liga, tendrás disponible la clasificación y estadisticas.