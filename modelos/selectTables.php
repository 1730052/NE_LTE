<?php
    //Mando a llamar el archivo que contiene la conexion con la BD
    include_once "../controladores/conexion.php";

    //Si el resultado es verdadero, selecciono unos campos de la tabla administradores
    $getAdmin = $BD -> query("SELECT nombre, usuario, correo FROM administradores");
    $resultado_Admin = $getAdmin -> fetchAll(PDO::FETCH_OBJ);
    //"if" en caso de que retorne NULL
    if($resultado_Admin == null || empty($resultado_Admin)){
      //mensaje de alerta
    }

    //Si el resultado es verdadero, selecciono unos campos de la tabla clientes
    $getClien = $BD -> query("SELECT nombre, correo, telefono FROM clientes");
    $resultado_Clien = $getClien -> fetchAll(PDO::FETCH_OBJ);
    //"if" en caso de que retorne NULL
    if($resultado_Clien == null || empty($resultado_Clien)){
      //mensaje de alerta
    }

    //Si el resultado es verdadero, selecciono unos campos de la tabla empleados
    $getEmp = $BD -> query("SELECT nombre, usuario, correo, socio, vehiculo FROM empleados");
    $resultado_Emp = $getEmp -> fetchAll(PDO::FETCH_OBJ);
    //"if" en caso de que retorne NULL
    if($resultado_Emp == null || empty($resultado_Emp)){
      //mensaje de alerta
    }

    //Si el resultado es verdadero, selecciono unos campos de la tabla viajes
    $getViaj = $BD -> query("SELECT v.id as Id, c.nombre as Cliente, e.nombre as Empleado, a.nombre as Admin,
      v.fecha_solicitud, v.fecha_fin, v.material, v.destino
      FROM viajes v INNER JOIN administradores a ON a.id = v.id_admin
      INNER JOIN clientes c ON c.id = v.id_cliente
      INNER JOIN empleados e ON e.id = v.id_empleado WHERE v.id BETWEEN 1 AND 100 ORDER BY `v`.`id` ASC");
    $resultado_Viaj = $getViaj -> fetchAll(PDO::FETCH_OBJ);
    //"if" en caso de que retorne NULL
    if($resultado_Viaj == null || empty($resultado_Viaj)){
      //mensaje de alerta
    }


?>
