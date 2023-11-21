<?php
include("database/db.php");
include("database/dbDM.php");
//PROCESO ETL PARA DIMENSION CLIENTE

// Extracción de datos
$query = "SELECT * FROM cliente";

$result_cliente_propiedad = mysqli_query($conn, $query);

// Transformación de los datos
$data_to_load = array();
while ($row = mysqli_fetch_array($result_cliente_propiedad)) {
 
    $id_cliente = $row['id']; 
    $nombre = $row['nombre']; 
    $direccion = $row['direccion']; 
    $num_telefono = 'num_telefono'; 
    $correo_electronico = $row['correo_electronico']; 

    // Almacena los datos transformados en un array
    $data_to_load[] = array(
        'id' => $id_cliente,
        'nombre' => $nombre ,
        'direccion' => $direccion,
        'num_telefono' => $num_telefono,
        'correo_electronico' => $correo_electronico,
    );
}


// Carga los datos a la dimension cliente

if (isset($_POST['save'])) {
    foreach ($data_to_load as $data) {
        $id_cliente = $data['id'];
        $nombre = $data['nombre'];
        $direccion = $data['direccion'];
        $num_telefono = $data['num_telefono'];
        $correo_electronico = $data['correo_electronico'];


        // Inserta los datos en la dimension cliente
        $insert_query = "INSERT IGNORE INTO cliente (id, nombre, direccion, num_telefono, correo_electronico)
        VALUES ('$id_cliente', '$nombre', '$direccion', '$num_telefono', '$correo_electronico')";
        $insert_result = mysqli_query($connDM, $insert_query);
    }
}

//PROCESO ETL PARA DIMENSION PROPIEDAD
$query = "SELECT * FROM propiedad";

$result_cliente_propiedad = mysqli_query($conn, $query);

$data_to_load = array();
while ($row = mysqli_fetch_array($result_cliente_propiedad)) {
 
    $id_propiedad= $row['id']; 
    $nombre = $row['nombre']; 
    $direccion = $row['direccion']; 
    $tamanio = 'tamanio'; 
    $num_habitantes = $row['num_habitantes']; 
    $precio = $row['precio']; 
    $estado = $row['estado']; 

    $data_to_load[] = array(
        'id' => $id_propiedad,
        'nombre' => $nombre,
        'direccion' => $direccion,
        'tamanio' => $tamanio,
        'num_habitantes' => $num_habitantes,
        'precio' => $precio,
        'estado' => $estado        
    );
}

if (isset($_POST['save'])) {
    foreach ($data_to_load as $data) {
        $id_propiedad = $data['id'];
        $nombre = $data['nombre'];
        $direccion = $data['direccion'];
        $tamanio = $data['tamanio'];
        $num_habitantes = $data['num_habitantes'];
        $precio = $data['precio'];
        $estado = $data['estado'];



        // Inserta los datos en la dimension propiedad
        $insert_query = "INSERT IGNORE INTO propiedad (id,nombre , direccion, tamanio, num_habitantes, precio, estado)
        VALUES ('$id_propiedad', '$nombre', '$direccion', '$tamanio', '$num_habitantes', '$precio', '$estado')";
        $insert_result = mysqli_query($connDM, $insert_query);
    }
}

//PROCESO ETL PARA DIMENSION TIEMPO

// Extracción de datos
$query = "SELECT fecha FROM transaccion;";
$result_transaccion = mysqli_query($conn, $query);

// Transformación y carga de datos
$data_to_load = array();
while ($row = mysqli_fetch_array($result_transaccion)) {
    $fecha = $row['fecha'];

    // Separa la fecha en año, mes y día
    $date_parts = explode('-', $fecha);
    $anio = $date_parts[0];
    $mes = $date_parts[1];
    $dia = $date_parts[2];

    // Almacena los datos transformados en un array
    $data_to_load[] = array(
        'fecha' => $fecha,
        'anio' => $anio,
        'mes' => $mes,
        'dia' => $dia,
    );
}

// Carga los datos a la dimension tiempo
if (isset($_POST['save_fecha'])) {
    foreach ($data_to_load as $data) {
        $fecha = $data['fecha'];
        $anio = $data['anio'];
        $mes = $data['mes'];
        $dia = $data['dia'];

        // Inserta los datos en la dimension tiempo
        $insert_query = "INSERT IGNORE INTO tiempo (anio, mes, dia)
                         VALUES ('$anio', '$mes', '$dia')";
        $insert_result = mysqli_query($connDM, $insert_query);
    }
}




//PROCESO PARA GUARDAR DATOS EN TABLA DE HECHOS

// Extracción de datos para la dimensión cliente
$query_cliente = "SELECT * FROM cliente";
$result_cliente = mysqli_query($conn, $query_cliente);

$data_cliente = array();
while ($row_cliente = mysqli_fetch_array($result_cliente)) {
    $id_cliente = $row_cliente['id'];
    
    // Almacena la información en el array $data_cliente
    $data_cliente[$id_cliente] = array();
}

// Extracción de datos para la dimensión tiempo
$query_tiempo = "SELECT * FROM tiempo";
$result_tiempo = mysqli_query($connDM, $query_tiempo);

$data_tiempo = array();
while ($row_tiempo = mysqli_fetch_array($result_tiempo)) {
    $id_tiempo = $row_tiempo['id'];
    
    // Almacena la información en el array $data_tiempo
    $data_tiempo[$id_tiempo] = array();
}


$query_propiedad = "SELECT * FROM propiedad";
$result_propiedad = mysqli_query($conn, $query_propiedad);

$data_propiedad = array();
while ($row_propiedad = mysqli_fetch_array($result_propiedad)) {
    $id_propiedad = $row_propiedad['id'];
    $precio_propiedad = $row_propiedad['precio'];
    
    // Almacena la información en el array $data_propiedad
    $data_propiedad[$id_propiedad] = array(
        'precio' => $precio_propiedad,
    );
}


$query_ventas = "SELECT * FROM venta";
$result_ventas = mysqli_query($connDM, $query_ventas);

$data_to_load_ventas = array();
while ($row_ventas = mysqli_fetch_array($result_ventas)) {
    $id_cliente_ventas = $row_ventas['ID_Cliente'];
    $id_propiedad_ventas = $row_ventas['ID_Propiedad'];
    $id_tiempo_ventas = $row_ventas['ID_Tiempo'];
    $total_ventas = $row_ventas['total'];

    // Obtener información de las dimensiones utilizando los arrays previamente creados
    $cliente_info = $data_cliente[$id_cliente_ventas];
    $propiedad_info = $data_propiedad[$id_propiedad_ventas];
    $tiempo_info = $data_tiempo[$id_tiempo_ventas];

    // Almacena los datos transformados en un array
    $data_to_load_ventas[] = array(
        'ID_Cliente' => $id_cliente_ventas,
        'ID_Propiedad' => $id_propiedad_ventas,
        'ID_Tiempo' => $id_tiempo_ventas,
        'total' => $propiedad_info['total'], // Agrega el precio desde la dimensión propiedad
    );
}

// Carga los datos a la tabla de hechos Ventas
if (isset($_POST['save_venta'])) {
    foreach ($data_to_load_ventas as $data_venta) {
        $id_cliente = $data_venta['ID_Cliente'];
        $id_propiedad = $data_venta['ID_Propiedad'];
        $id_tiempo = $data_venta['ID_Tiempo'];
        $precio_propiedad = $data_venta['total'];

        // Inserta los datos en la tabla de hechos Ventas
        $insert_query_ventas = "INSERT INTO venta (ID_Cliente, ID_Propiedad, ID_Tiempo, total)
                                 VALUES ('$id_cliente', '$id_propiedad', '$id_tiempo', '$precio_propiedad')";
        $insert_result_ventas = mysqli_query($connDM, $insert_query_ventas);
    }
}



?>