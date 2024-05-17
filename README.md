# Sprint_4

## Instalación
1. Clonar el repositorio:
git clone https://github.com/StephaneCarteaux/Sprint_4.git
cd futbol-app

2. Instalar dependencias de Composer:
composer install

3. Configurar variables de entorno:
cp .env.example .env
Edita el archivo .env según sea necesario

4. Generar clave de aplicación:
php artisan key:generate

5. Migrar la base de datos:
php artisan migrate
php artisan db:seed

6. Instalar dependencias de npm:
npm install

7. Compilar activos de frontend:
npm run dev  # Para desarrollo
npm run build  # Para producción