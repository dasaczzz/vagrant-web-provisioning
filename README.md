# Taller Vagrant + Provisionamiento con Shell

## Configuracion
1. Se agregaron las ip's de las maquinas en el archivo Vagrantfile
2. Se quito un copy del archivo de provisionamiento web que borraba los archivos www
3. En el archivo de provisionamiento de la db se agrego las configuraciones y creacion de la base de datos de ejemplo
4. Creacion de los recursos web, el index.html e info.php

## Informacion de gestion
Las ip's usadas para las maquinas fueron las siguientes:
- 192.168.56.15 -> servidor de base de datos
- 192.168.56.16 -> servidor de base web

Seguido a la configuracion, se levantaron los servicios con el comando `vagrant up --provision`.
Ya con las maquinas en funcionamiento se hicieron pruebas de conexion entre las maquinas, se hizo la prueba desde el servidor web para el uso de la bd desde el servidor web, para esta tarea, se uso el comando:
`ping 192.168.56.15`

Despues de verificar la conexion, salimos de la maquina web para hacer la prueba en la maquina host.

## Resultados

Se busco en el navegador del host http://192.168.56.16 y el resultado fue la pagina que tenemos en la carpeta /www. los resultados se pueden ver en la siguiente imagen.

![Index html](/assets/indexFoto.png)

La pagina php con los datos de la base de datos postgres se pueden apreciar en http://192.168.56.16/info.php, desplegando la informacion guardada, los registros se repiten, esto puede ser debido a la repetida accion de tener que depurar las maquinas y reiniciar los servicios para lograr el funciomiento esperado por el reto.

![info php](/assets/infophpFoto.png)
