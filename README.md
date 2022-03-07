d

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="public/img/poder-judicial-virtual.png" alt="Build Status"></a>
<h1 align="center">Ejercicio Ventas Laravel</h1>
    
<a href="https://www.npmjs.com/package/bootstrap" rel="nofollow"><img src="https://camo.githubusercontent.com/1c4959f767490620530549105570f72a619c1531859015de2f9097367a695018/68747470733a2f2f696d672e736869656c64732e696f2f6e706d2f762f626f6f747374726170" alt="npm version" data-canonical-src="https://img.shields.io/npm/v/bootstrap" style="max-width: 100%;"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
    
</p>

## Instalacion

 --instanciar en el directorio servidor apache (puede ser virtual xampp, laragon).
 --crear base de datos y modicar archivo .env con sus credenciales de mysql y el nombre de la base de datos creada.
 --ejecutar en una terminal migraciones con  “ php artisan migrate” sin comillas y en el directorio principal del programa
 --ejecutar en una terminal Seeders con  “ php artisan db:seed” sin comillas y en el directorio principal del programa
 --para ejectarlo tienes dos formas:
    1. Ejecutar en una terminal “ php artisan serve” sin comillas y en el directorio principal del programa y luego en el naveador a la url http://127.0.0.1:8000
    2. En el navegador con el servidor apache ya iniciado la rutahttp://localhost/directorioenelservidor/ejercicio-venta/public/login
#ojo todo estos pasos se deben hacer con el servidor mysql corriendo

## Requerimientos
Tienes un negocio de ventas en línea donde los usuarios pueden adquirir los 5 productos que vendes, por alguna razón el impuesto es variable.

Nombre	Precio (impuesto incluido) $ 	Impuesto %
Producto 1	123.45	5
Producto 2	45.65	15
Producto 3	39.73	12
Producto 4	250.00	8
Producto 5	59.35	10
	Hacer sistema de gestión de facturas usando el framework Laravel, donde existirán 2 tipos de usuarios:  clientes y 1 administrador.

	Los clientes pueden registrarse con su correo y comprar tus productos, no es necesario que muestres el historial de compras ni mucho menos crear un carrito de compras, basta con tener un Droplist con los productos y un botón de comprar, por lo que cada compra solo tendrá 1 producto.
	El administrador podrá acceder a una página donde se le mostrará un único botón, el cual servirá para generar todas las facturas pendientes de compras que no se le hayan facturado aun a cada cliente, además en esta pagina debe de mostrase un listado con todas las facturas emitidas.
	Para cada factura se deberá de calcular el costo total de productos que pertenezcan a la factura.
	Calcular el impuesto cobrado
	Crear una vista para ver el desglose de la factura, debes de poner un link en el listado de facturas para ver su desglose. 

Debe de incluir al menos 4 tablas Usuarios, Compras, Facturas y Productos. En caso de requerir más tablas siéntete en libertad de crearlas con el nombre que creas más conveniente, de igual forma cada campo que creas necesario.
Puedes usar de cualquier módulo de Laravel.

Pasos necesarios para resolver el problema.
	1.- Instalar una instancia nueva de laravel.
	2.- Crear archivos de migración correspondientes.
	3.- Crear archivos seeder con información de prueba.
4.- Crear las rutas necesarias para usar el sistema.
	5.- Crear las vistas, modelos y controladores necesarios, pero no gastes el tiempo enfocándote en el diseño, nos interesa más que sea funcional.
	6.- Crear CRUD para Productos.
7.- Crear formularios de registro, login.
8.- Crear formulario de compras
	9.- Programar la función del botón para generar facturas, recuerda se debe de generar una única factura para todas las compras de un cliente que no se hayan facturado con anterioridad.
	10.- Mostrar listado de facturas emitidas.
	11.- Crear vista de desglose de factura, debe de tener el cliente, monto total, impuesto total y el listado de comprar que la conforman con sus 3 columnas (nombre producto, precio, impuesto) y ordenada por fecha de compra


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT)




