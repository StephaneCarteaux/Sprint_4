# Sprint_4

## Instalación
1. Clonar el repositorio:<br/>
git clone https://github.com/StephaneCarteaux/Sprint_4.git<br/>
cd futbol-app

2. Instalar dependencias de Composer:<br/>
composer install

3. Configurar variables de entorno:<br/>
cp .env.example .env<br/>
Edita el archivo .env según sea necesario

4. Generar clave de aplicación:<br/>
php artisan key:generate

5. Migrar la base de datos:<br/>
php artisan migrate<br/>
php artisan db:seed

6. Instalar dependencias de npm:<br/>
npm install

7. Compilar activos de frontend:<br/>
npm run dev  # Para desarrollo<br/>
npm run build  # Para producción