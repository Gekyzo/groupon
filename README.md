# Proyecto Groupon

Proyecto tercera evaluación de la asignatura Programación para DAW.

## Versiones

[Listado de actualizaciones y cambios](CHANGELOG.md)

## Pendiente

[Listado de tareas pendientes](todo.md)

## Instalación

-   Clonar el repositorio
-   Crear la BD (project_groupon)
-   Crear el usuario en la BD y asociarlo a la BD (user_groupon / secret)
-   Aplicar la migración
    -   bin/cake migrations migrate
-   Poblar la BD
    -   bin/cake migrations seed --seed UsersSeed
    -   bin/cake migrations seed --seed CategoriesSeed
    -   bin/cake migrations seed --seed PromotionsSeed
    -   bin/cake migrations seed --seed CategoriesPromotionsSeed
    -   bin/cake migrations seed --seed OrdersSeed
    -   bin/cake migrations seed --seed ImagesSeed
    -   bin/cake migrations seed --seed ImagesPromotionsSeed
-   Lanzar servidor de prueba
    -   bin/cake server
