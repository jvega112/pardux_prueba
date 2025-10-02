# Prueba Técnica: CRUD de Tareas con Symfony 7

## 1. Descripción del Proyecto

Este proyecto es la solución a la prueba técnica de ingreso, consistente en el desarrollo de un CRUD (Create, Read, Update, Delete) simple para gestionar una lista de tareas (Tasks).

La aplicación fue construida utilizando PHP 8.2+ y el framework Symfony 7 con Doctrine ORM para la persistencia de datos. Se han implementado las funcionalidades básicas de gestión de tareas, prestando especial atención a las validaciones y a la lógica de seguridad básica, como se especifica en los requisitos.

## 2. Tecnologías Utilizadas

| Componente    | Tecnología    | Versión/Detalle | Versión/Detalle                    |
| ------------- |:-------------:|:---------------:|:----------------------------------:|
| Backend       | PHP           | 8.2 o superior  | Lenguaje principal                 |
| Framework     | Symfony       | 7.x             | Framework principal de desarrollo  |
| ORM           | Doctrine ORM  |                 | Mapeo de Entidades y Base de Datos |
| Base de Datos | MySQL         |                 | Persistencia de datos              |
| Frontend/CSS  | Bootstrap 5   |                 | Estilización y Componentes de UI   |
| Dependencias  | Composer      |                 | Manejo de paquetes PHP             |

## 3. Requisitos de Instalación

Asegúrate de tener instalado el siguiente software antes de comenzar:
* PHP (Versión 8.2 o superior)
* Composer
* Git
* Un servidor de base de datos, como MySQL.

## 4. Guía de Instalación y Ejecución

Sigue estos pasos para obtener una copia local del proyecto y ponerla en funcionamiento:

**Paso 1: Clonar el Repositorio**

Clona el proyecto desde GitHub:

```bash
$> git clone https://github.com/jvega112/pardux_prueba.git
$> cd pardux_prueba
```

**Paso 2: Instalación de Dependencias**

Instala todas las dependencias de Symfony utilizando Composer:

```bash
$> composer install
```
**Paso 3: Configuración e Importación de la Base de Datos (MySQL CLI)**

1. **Configurar Variables de Entorno (.env)**  
Asegúrate de que la variable DATABASE_URL esté configurada para conectar con tu servidor MySQL y el nombre de tu base de datos:  
    ```bash
    $> composer install
    ```
    
    **Importante**: La base de datos (pardux_prueba) debe haber sido creada previamente en tu servidor MySQL antes de ejecutar el comando de importación.

2. **Importar el Esquema y los Datos Iniciales:**  
Utiliza el cliente mysql del terminal para importar el archivo de esquema y datos (database.sql) directamente a la base de datos:  
    ```bash
    # Reemplaza 'user' con tu usuario MySQL y 'db_name' con el nombre de tu base de datos.
    # Asegúrate de que la ruta al archivo SQL sea correcta.
    $> mysql -u user -p db_name < ruta/al/archivo/database.sql
    ```
    _(Se te pedirá la contraseña de MySQL después de ejecutar el comando)_

**Paso 4: Carga de Datos y Finalización**

Dado que la base de datos se importó externamente, no es necesario usar comandos de Doctrine. Simplemente borra la caché del proyecto:

```bash
$> php bin/console cache:clear
```

**Paso 5: Ejecución del Servidor**

Inicia el servidor local de Symfony:

```bash
$> php bin/console server:run
```

El servidor estará accesible en `http://127.0.0.1:8000` (o la dirección que indique el comando).

## 5. Endpoints y Funcionalidades

Para acceder a las funcionalidades, el usuario debe estar autenticado (requerido por la relación Task.createdBy).

| Ruta (URL)              | Funcionalidad                                |
| ----------------------- | -------------------------------------------- |
| /                       | LISTA (READ): Tareas creadas.                |
| /tarea/crear            | CREAR (CREATE): Formulario para nueva tarea. |
| /tarea/editar/{id_task} | EDITAR (UPDATE): Modificar tarea existente.  |
| /tarea/eliminar         | ELIMINAR (DELETE): Eliminar tarea.           |
