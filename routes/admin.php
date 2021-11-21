<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\MarcaController;
use App\Http\Controllers\Admin\TipoController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\TallasController;
use App\Http\Controllers\Admin\ImagenController;
use App\Http\Controllers\Admin\ProveedorController;
use App\Http\Controllers\Admin\CabeceraproveedoresController;
use App\Http\Controllers\Admin\CabeceraPedidoClienteController;
use App\Http\Controllers\Admin\codigosController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\pedidoClienteController;
use App\Http\Controllers\Admin\pedidoProveedorController;
use App\Http\Controllers\Admin\configController;
use App\Http\Controllers\Admin\CabeceraCampaniaOfertaController;
use App\Http\Controllers\Admin\DatatableController;
use App\Http\Livewire\AccionesStockOfertas;
use App\Http\Controllers\Admin\cabeceraCampaniaController;
use App\Http\Controllers\Admin\DatatableCampaniaController;
use App\Http\Controllers\Admin\EntradamercanciasController;
use App\Http\Livewire\EntradaMercancias;

Route::get('',[HomeController::class,'index'])->name('admin');

Route::get('clientes',[ClienteController::class,'index'])->name('clientes.index');
Route::get('cliente/nuevo',[ClienteController::class,'create'])->name('cliente.nuevo');
Route::post('cliente/guardar',[ClienteController::class,'store'])->name('cliente.guardar');
Route::get('cliente/modificar/{cliente}',[ClienteController::class,'show'])->name('cliente.ver');
Route::put('cliente/modificar/{cliente}',[ClienteController::class,'update'])->name('cliente.update');
Route::delete('cliente/eliminar/{cliente}',[ClienteController::class,'destroy'])->name('cliente.destroy');
Route::get('clientes/list/pdf',[ClienteController::class,'exportPDF'])->name('clientes.pdf');


Route::get('pedidos/clientes',[CabeceraPedidoClienteController::class,'index'])->name('pedidosclientes.index');
Route::get('pedidos/clientes/nuevo',[CabeceraPedidoClienteController::class,'create'])->name('pedidoCliente.nuevo');
Route::get('pedido/clientes/modificar/{pedido}',[CabeceraPedidoClienteController::class,'show'])->name('pedidoCliente.show');
Route::delete('pedido/clientes/delete/{pedido}',[CabeceraPedidoClienteController::class,'destroy'])->name('pedidoCliente.destroy'); 
Route::get('pedidos/clientes/pdf',[CabeceraPedidoClienteController::class,'exportPDF'])->name('pedidosClientes.pdf');

Route::get('stock',[StockController::class,'index'])->name('stock.index');
Route::get('stock/{producto}/{tallasID}/{stock}',[StockController::class,'create'])->name('stock.create');
Route::get('stock/{producto}/{tallasID}',[StockController::class,'update'])->name('stock.update');
Route::get('stock/pdf',[StockController::class,'exportPDF'])->name('stock.pdf');
Route::get('stock/excel',[StockController::class,'exportExcel'])->name('stock.excel');
Route::get('stock/importar',[StockController::class,'frmImportar'])->name('show.stock.import');
Route::post('stock/import',[StockController::class,'importar'])->name('stock.import');

Route::get('proveedores',[ProveedorController::class,'index'])->name('proveedor.index');
Route::get('proveedor/nuevo',[ProveedorController::class,'create'])->name('proveedor.nuevo');
Route::post('proveedor/guardar',[ProveedorController::class,'store'])->name('proveedor.guardar');
Route::get('proveedor/modificar/{proveedor}',[ProveedorController::class,'show'])->name('proveedor.ver');
Route::put('proveedor/modificar/{proveedor}',[ProveedorController::class,'update'])->name('proveedor.update');
Route::delete('proveedor/eliminar/{proveedor}',[ProveedorController::class,'destroy'])->name('proveedor.destroy');

Route::get('productos',[ProductoController::class,'index'])->name('productos.index');
Route::get('productos/nuevo',[ProductoController::class,'nuevo'])->name('productos.nuevo');
Route::post('productos/guardar',[ProductoController::class,'guardar'])->name('productos.guardar');
Route::get('productos/modificar/{producto}',[ProductoController::class,'verProducto'])->name('productos.ver');
Route::put('productos/modificar/{producto}',[ProductoController::class,'guardarMod'])->name('productos.guardarMod');
Route::delete('productos/eliminar/{producto}',[ProductoController::class,'destroy'])->name('productos.destroy');
Route::get('productos/importar',[ProductoController::class,'frmImportar'])->name('show.productos.import');
Route::post('productos/import',[ProductoController::class,'importar'])->name('productos.import');
Route::get('productos/excel',[ProductoController::class,'exportExcel'])->name('productos.excel');

Route::get('tipos',[TipoController::class,'index'])->name('tipos.index');
Route::post('tipos/guardar',[TipoController::class,'guardar'])->name('tipos.guardar');
Route::delete('tipos/elimimar/{tipo}',[TipoController::class,'destroy'])->name('tipos.destroy');
Route::put('tipos/guardar/{tipo}',[TipoController::class,'guardarmod'])->name('tipos.guardarmod');

Route::get('marcas',[MarcaController::class,'index'])->name('marcas.index');
Route::post('marcas/guardar',[MarcaController::class,'guardar'])->name('marcas.guardar');
Route::delete('marcas/elimimar/{marca}',[MarcaController::class,'destroy'])->name('marcas.destroy');
Route::put('marcas/guardar/{marca}',[MarcaController::class,'guardarmod'])->name('marcas.guardarmod');

Route::get('tallas',[TallasController::class,'index'])->name('tallas.index');
Route::post('tallas/guardar',[TallasController::class,'guardar'])->name('tallas.guardar');
Route::delete('tallas/elimimar/{talla}',[TallasController::class,'destroy'])->name('tallas.destroy');
Route::put('/tallas/guardar/{talla}',[TallasController::class,'guardarmod'])->name('tallas.guardarmod');
route::get('tallas/producto/{producto}',[TallasController::class,'mostrarTallas'])->name('tallas.select');
route::post('tallas/productos/{producto}',[TallasController::class,'guardarTallas'])->name('tallasProducto.guardar');
route::put('tallas/productos/{producto}',[TallasController::class,'guardarTallasMod'])->name('tallasProducto.guardarMod');

route::get('tallas/producto/{producto}/modificar/{tallas_select}',[TallasController::class,'modificarTallasProducto'])->name('modificarProducto.tallas');


Route::post('imagenes',[ImagenController::class,'store'])->name('imagenes.store');
Route::get('imagenes',[ImagenController::class,'index'])->name('imagenes.index');
Route::get('imagenes/create',[ImagenController::class,'create'])->name('imagenes.create');
Route::delete('imagenes/{imagen}',[ImagenController::class,'destroy'])->name('imagenes.destroy');
Route::put('imagenes/{imagen}',[ImagenController::class,'update'])->name('imagenes.update');
Route::get('imagenes/{imagen}',[ImagenController::class,'show'])->name('imagenes.show');
Route::get('imagenes/{imagen}/edit',[ImagenController::class,'edit'])->name('imagenes.edit');
Route::get('agregar/imagen/{producto}',[ImagenController::class,'agregar_imagen'])->name('agregar.imagenes');
Route::get('modificar/imagen/{producto}',[ImagenController::class,'modificar_imagen'])->name('modificar.imagen');
Route::put('update/imagen/{producto}',[ImagenController::class,'updateProductoImagen'])->name('update.imagen');

Route::get('pedidos/proveedores',[CabeceraproveedoresController::class,'index'])->name('pedidoProveedor.index');
Route::get('pedido/proveedor/nuevo',[CabeceraproveedoresController::class,'create'])->name('pedidoProveedor.nuevo');
Route::post('pedido/proveedor/guardar',[CabeceraproveedoresController::class,'store'])->name('pedidoProveedor.guardar');
Route::get('pedido/proveedor/modificar/{cabecera}',[CabeceraproveedoresController::class,'show'])->name('pedidoProveedor.ver');
Route::put('pedido/proveedor/modificar/{proveedor}',[CabeceraproveedoresController::class,'update'])->name('pedidoProveedor.update');
Route::delete('pedido/proveedor/eliminar/{cabecera}',[CabeceraproveedoresController::class,'destroy'])->name('pedidoProveedor.destroy');
Route::get('pedidos/proveedores/pdf',[CabeceraproveedoresController::class,'exportPDF'])->name('pedidosProveedores.pdf');

Route::get('pedido/cliente/pdf/{pedido}',[pedidoClienteController::class,'exportPDF'])->name('pedidoCliente.pdf');
Route::get('pedido/proveedor/pdf/{cabecera}',[pedidoProveedorController::class,'exportPDF'])->name('pedidoProveedor.pdf');

Route::get('codigos/config',[codigosController::class,'config'])->name('config.show');
Route::get('codigos/generar',[codigosController::class,'generar'])->name('generar.codigos');

Route::get('reset/bd',[configController::class,'resetearBD'])->name('reset.bd');

Route::get('campanyas/preparar-oferta',[CabeceraCampaniaOfertaController::class,'crearOferta'])->name('crear.oferta.campanya');
Route::get('campanyas/listado-ofertas',[CabeceraCampaniaOfertaController::class,'index'])->name('index.ofertas');
Route::get('campanyas/editar/{ofertaId}',[CabeceraCampaniaOfertaController::class,'frmOferta'])->name('editar.oferta');
Route::delete('campanyas/delete/{ofertaId}',[CabeceraCampaniaOfertaController::class,'delete'])->name('delete.oferta');
Route::post('campanyas/editar/{ofertaId}',[CabeceraCampaniaOfertaController::class,'aplicarPrecio'])->name('oferta.aplicar');
Route::get('campanyas/excel/{ofertaId}',[AccionesStockOfertas::class,'exportExcel'])->name('stockOferta.excel');
Route::get('campanyas/import/{ofertaId}',[AccionesStockOfertas::class,'frmImportar'])->name('revision.stockOferta.excel');
Route::post('campanyas/import/{ofertaId}',[AccionesStockOfertas::class,'importar'])->name('campanya.import');
Route::get('datatable/stockoferta/{ofertaId}',[DatatableController::class,'stockoferta'])->name('datatable.stockoferta');

Route::get('campanias/listado-campanias',[cabeceraCampaniaController::class,'index'])->name('index.campanias');
Route::get('campania/{ofertaId}',[cabeceraCampaniaController::class,'create'])->name('campania.create');
Route::post('campania/procesar/{ofertaId}',[cabeceraCampaniaController::class,'procesar'])->name('campania.procesar');
Route::get('campania/ver/{campaniaId}',[cabeceraCampaniaController::class,'show'])->name('campania.show');

Route::get('datatable/stockcampania/{campaniaId}',[DatatableCampaniaController::class,'stockCampania'])->name('datatable.stockcampania');
Route::get('datatable/pedidoproveedor/{pedidoId}',[EntradaMercancias::class,'dataLineasPedidoProveedor'])->name('datatable.lineasPedidoProveedores');



Route::get('mercancias/entrada/',[EntradamercanciasController::class,'frmEntrada'])->name('frm.mercancia.entrada');