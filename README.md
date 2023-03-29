# PRUEBA TECNICA

## Servicios y Dependencias

Para el alojamiento del sitio se uso lo siguiente

-   **Dominio** : [https://tonystoreec.com](https://tonystoreec.com)
-   **Tipo de Alojamiento** : VPS
-   **Proveedor** : CONTABO
-   **Sistema Operativo** : UBUNTU 20.04
-   **Servidor Web** : APACHE
-   **Base de Datos** : MYSQL
-   **Versión de PHP** : 8.1

## Tecnologías utilizadas para la prueba

-   Laravel 8 - PHP 8.1
-   Vue JS 2.7
-   MySql
-   Apache (Laragon)

## Guía de implementación

**1.** Clonar el repositorio de la siguiente ruta : [https://github.com/tony98ms/evaluacion_crm](https://github.com/tony98ms/evaluacion_crm)

**2.** Instalar las dependencias mediante el siguiente comando:

```bash
composer install
```

Asegúrese de tener todas las extensiones necesarias al momento de ejecutar el comando, el proyecto soporta actualmente versiones de PHP 7.4 & 8.0+.

**3.** Luego copie el archivo **.env.example** utilizando el siguiente comando para que pueda inicializar el proyecto.

```bash
cp .env.example .env
```

Este archivo contiene las configuraciones de base para que pueda inicializar el proyecto. Es importante recalcar que deberá tener previamente cargada las bases de datos en su entorno de desarrollo para para el uso del api. Así mismo siéntase libre de modificar las variables de entorno para las conexiones respectivas a la BD

**4.** Luego de eso podrá ejecutar en su navegador el proyecto, dependiendo de su entorno de desarrollo podrá correr la aplicación de varias formas. Entre ellas mediante La consola de ARTISAN, o con algún entorno de desarrollo preconfigurado como lo es laragon, xamp o wamp. Ejemplo para lanzar la aplicación usando **ARTISAN**

```bash
php artisan serve
```

Adicional podra especificar en que puerto o host desea que se lance la aplicación.

```bash
php artisan serve –-port=8800 --host=192.168.100.28
```

Una vez eso, podrá acceder a la siguiente ruta http://192.168.100.28:8800 (Remplace host y puerto por sus respectivos valores).
Se agregaron 2 rutas:

## NUEVAS RUTAS

### **OBTENER PARES**

-   **END POINT:** /api/pares
-   **METODO:** POST
-   **DESCRIPCIÓN:** En esta ruta se podrá realizar una petición con los parámetros proporcionados en la documentación para obtener el total de pares de un arreglo en donde la diferencia coincida con un valor objetivo.

### **REALIZAR PRUEBA**

-   **END POINT:** /calcular-pares
-   **METODO:** GET
-   **DESCRIPCIÓN:** Ruta accesible desde el navegador que cuenta con una interfaz grafica para realizar pruebas de la primera ENDPOINT mediante un formulario.

Asegúrese de ejecutar el siguiente comando para limpiar la cache de las rutas para la API:

```bash
php artisan api:cache
```
