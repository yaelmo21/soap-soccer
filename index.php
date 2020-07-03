<?php
    include('providers/lib/nusoap.php');
    require 'service/partidos_service.php';
    require 'service/noticias_service.php';
    require 'service/torneos_service.php';
    require 'service/participa_service.php';
    require 'service/jugadores_service.php';
    require 'service/equipos_service.php';
    
    $server = new soap_server();
    $URL       = "example.com";
    $namespace = $URL . '?wsdl';
    $server->configureWSDL('soap-soccer', $namespace);
    
    
    $server->wsdl->addComplexType(
        'equipos',
        'complextType',
        'struct',
        'sequence',
        '',
        array(
            'ID' => array('name' => 'ID', 'type' => 'xsd:integer'),
            'GOLES_LOCAL' => array('name' => 'GOLES_LOCAL', 'type' => 'xsd:integer'),
            'GOLES_VISITANTE' => array('name' => 'GOLES_VISITANTE', 'type' => 'xsd:integer')
        )
    );
    
    $server->register(
        'prueba',
        array(),
        array('return'=>'tns:equipos'),
        'urn:PruebaXMLwsdl', // Nombre del workspace
        'urn:PruebaXMLwsdl#prueba', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Función de prueba' // Documentación
    );


    // --------------------------------------------- NOTICIAS --------------------------------------------- //
    // Consultar Noticia
    $server->wsdl->addComplexType(
        'noticia',
        'complextType',
        'struct',
        'sequence',
        '',
        array(
            'AUTOR' => array('name' => 'AUTOR', 'type' => 'xsd:string'),
            'FECHA' => array('name' => 'FECHA', 'type' => 'xsd:string'),
            'TITULO' => array('name' => 'TITULO', 'type' => 'xsd:string'),
            'CUERPO' => array('name' => 'CUERPO', 'type' => 'xsd:string'),
            'ID_TORNEO' => array('name' => 'ID_TORNEO', 'type' => 'xsd:integer')
        )
    );

    $server->register(
        'noticiaConsultar',
        array('idNoticia' => 'xsd:integer'),
        array('return'=>'tns:noticia'),
        'urn:NoticiaXMLwsdl', // Nombre del workspace
        'urn:NoticiaXMLwsdl#consultar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Consulta la informacion de una noticia por su id' // Documentación
    );

    // Agregar Noticia
    $server->register(
        'noticiaAgregar',
        array('autor' => 'xsd:string', 'fecha' => 'sxd:string', 'titulo' => 'xsd:string', 'cuerpo' => 'xsd:string', 'idTorneo' => 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:NoticiaXMLwsdl', // Nombre del workspace
        'urn:NoticiaXMLwsdl#agregar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Consulta la informacion de una noticia por su id' // Documentación
    );

    // Actualizar Noticia
    $server->register(
        'noticiaActualizar',
        array('idNoticia' => 'xsd:integer','autor' => 'xsd:string', 'fecha' => 'sxd:string', 'titulo' => 'xsd:string', 'cuerpo' => 'xsd:string', 'idTorneo' => 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:NoticiaXMLwsdl', // Nombre del workspace
        'urn:NoticiaXMLwsdl#actualizar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Consulta la informacion de una noticia por su id' // Documentación
    );

    // Eliminar Noticia
    $server->register(
        'noticiaEliminar',
        array('idNoticia' => 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:NoticiaXMLwsdl', // Nombre del workspace
        'urn:NoticiaXMLwsdl#consultar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Consulta la informacion de una noticia por su id' // Documentación
    );

    // --------------------------------------------- TORNEOS --------------------------------------------- //
    // Consultar Torneo
    $server->wsdl->addComplexType(
        'torneo',
        'complextType',
        'struct',
        'sequence',
        '',
        array(
            'NOMBRE' => array('name' => 'NOMBRE', 'type' => 'xsd:string'),
            'FECHA_INICIAL' => array('name' => 'FECHA_INICIAL', 'type' => 'xsd:string'),
            'FECHA_FINAL' => array('name' => 'FECHA_FINAL', 'type' => 'xsd:string')
        )
    );

    $server->register(
        'torneoConsultar',
        array('idTorneo' => 'xsd:integer'),
        array('return'=>'tns:torneo'),
        'urn:TorneoXMLwsdl', // Nombre del workspace
        'urn:TorneoXMLwsdl#consultar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Consulta la informacion de un torneo por su id' // Documentación
    );

    // Agregar Torneo
    $server->register(
        'torneoAgregar',
        array('nombre' => 'xsd:string', 'fechaIncial' => 'sxd:string', 'fechaFinal' => 'xsd:string'),
        array('mensaje'=>'xsd:string'),
        'urn:TorneoXMLwsdl', // Nombre del workspace
        'urn:TorneoXMLwsdl#agregar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Agregar un torneo' // Documentación
    );

    // Actualizar Torneo
    $server->register(
        'torneoActualizar',
        array('idTorneo' => 'xsd:integer','nombre' => 'xsd:string', 'fechaIncial' => 'sxd:string', 'fechaFinal' => 'xsd:string'),
        array('mensaje'=>'xsd:string'),
        'urn:TorneoXMLwsdl', // Nombre del workspace
        'urn:TorneoXMLwsdl#actualizar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Actualizar la informacion de un torneo' // Documentación
    );

    // Eliminar Torneo
    $server->register(
        'torneoEliminar',
        array('idTorneo' => 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:TorneoXMLwsdl', // Nombre del workspace
        'urn:TorneoXMLwsdl#eliminar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Eliminar un torneo' // Documentación
    );

    // --------------------------------------------- PARTIDOS --------------------------------------------- //

    // Agregar Partido
    $server->register(
        'partidoAgregar',
        array('golesLocal' => 'xsd:integer','golesVisitante'=> 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:PartidosXMLwsdl', // Nombre del workspace
        'urn:PartidosXMLwsdl#createPartido', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Crear un partido' // Documentación
    );

    // Actualizar Partido
    $server->register(
        'partidoActualizar',
        array('id' => 'xsd:integer','golesLocal' => 'xsd:integer','golesVisitante'=> 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:PartidosXMLwsdl', // Nombre del workspace
        'urn:PartidosXMLwsdl#actualizar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Actualizar Partido' // Documentación
    );

    // Consultar Partido
    $server->wsdl->addComplexType(
        'partido',
        'complextType',
        'struct',
        'sequence',
        '',
        array(
            'ID' => array('name' => 'ID', 'type' => 'xsd:integer'),
            'GOLES_LOCAL' => array('name' => 'GOLES_LOCAL', 'type' => 'xsd:integer'),
            'GOLES_VISITANTE' => array('name' => 'GOLES_VISITANTE', 'type' => 'xsd:integer')
        )
    );
    
    $server->register(
        'partidoConsultar',
        array('id' => 'xsd:integer'),
        array('return'=>'tns:partido'),
        'urn:PartidosXMLwsdl', // Nombre del workspace
        'urn:PartidosXMLwsdl#consultar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Consultar Partido' // Documentación
    );


    // Eliminar Partido

    $server->register(
        'partidoEliminar',
        array('id' => 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:PartidosXMLwsdl', // Nombre del workspace
        'urn:PartidosXMLwsdl#eliminar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Actualizar Partido' // Documentación
    );

     // --------------------------------------------- PARTICIPA --------------------------------------------- //

    // Crear Participa
    $server->register(
        'participaAgregar',
        array('id_partido' => 'xsd:integer','id_equipo'=> 'xsd:integer','id_torneo'=> 'xsd:integer','visitante'=>'xsd:boolean','contrincante'=> 'xsd:integer','puntos'=> 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:ParticipaXMLwsdl', // Nombre del workspace
        'urn:ParticipaXMLwsdl#agregar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Crear una participación' // Documentación
    );

    // Actualizar Participa
    $server->register(
        'participaActualizar',
        array( 'id_partido_old' => 'xsd:integer','id_equipo_old'=> 'xsd:integer','id_torneo_old'=> 'xsd:integer','id_partido' => 'xsd:integer','id_equipo'=> 'xsd:integer','id_torneo'=> 'xsd:integer','visitante'=>'xsd:boolean','contrincante'=> 'xsd:integer','puntos'=> 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:ParticipaXMLwsdl', // Nombre del workspace
        'urn:ParticipaXMLwsdl#actualizar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Actualizar una participación' // Documentación
    );

    // Consultar Participa

    $server->wsdl->addComplexType(
        'particpa',
        'complextType',
        'struct',
        'sequence',
        '',
        array(
            'ID_PARTIDO'      => array('name' => 'ID_PARTIDO',     'type' => 'xsd:integer'),
            'ID_EQUIPO'       => array('name' => 'ID_EQUIPO' ,     'type' => 'xsd:integer'),   
            'ID_TORNEO'       => array('name' => 'ID_TORNEO' ,     'type' => 'xsd:integer'),   
            'VISITANTE'       => array('name' => 'VISITANTE' ,     'type' => 'xsd:integer'),   
            'CONTRINCANTE'    => array('name' => 'CONTRINCANTE',   'type' => 'xsd:integer'),
            'PUNTOS'          => array('name' => 'PUNTOS',         'type' => 'xsd:integer'),
        )
    );

    $server->register(
        'participaConsultar',
        array('id_partido' => 'xsd:integer','id_equipo'=> 'xsd:integer','id_torneo'=> 'xsd:integer'),
        array('return'=>'tns:particpa'),
        'urn:ParticipaXMLwsdl', // Nombre del workspace
        'urn:ParticipaXMLwsdl#consultar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Consultar una participación' // Documentación
    );

    // Eliminar Participa
    $server->register(
        'participaEliminar',
        array('id_partido' => 'xsd:integer','id_equipo'=> 'xsd:integer','id_torneo'=> 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:ParticipaXMLwsdl', // Nombre del workspace
        'urn:ParticipaXMLwsdl#eliminar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Eliminar una participación' // Documentación
    );

   // --------------------------------------------- JUGADORES --------------------------------------------- //

    // Agregar Jugador
    $server->register(
        'jugadorAgregar',
        array('nombre' => 'xsd:string','apellido'=> 'xsd:string','nickname' => 'xsd:string','fecha_nacimiento'=> 'xsd:string','posicion' => 'xsd:string','id_equipo'=> 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:JugadoresXMLwsdl', // Nombre del workspace
        'urn:JugadoresXMLwsdl#createJugador', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Crear un jugador' // Documentación
    );

    // Actualizar Jugador
    $server->register(
        'jugadorActualizar',
        array('id' => 'xsd:integer','nombre' => 'xsd:string','apellido'=> 'xsd:string','nickname' => 'xsd:string','fecha_nacimiento'=> 'xsd:string','posicion' => 'xsd:string','id_equipo'=> 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:JugadoresXMLwsdl', // Nombre del workspace
        'urn:JugadoresXMLwsdl#actualizar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Actualizar Jugador' // Documentación
    );

    // Consultar Jugador
    $server->wsdl->addComplexType(
        'jugador',
        'complextType',
        'struct',
        'sequence',
        '',
        array(
            'ID' => array('name' => 'ID', 'type' => 'xsd:integer'),
            'NOMBRE' => array('name' => 'NOMBRE', 'type' => 'xsd:string'),
            'APELLIDO' => array('name' => 'APELLIDO', 'type' => 'xsd:string'),
            'NICKNAME' => array('name' => 'NICKNAME', 'type' => 'xsd:string'),
            'FECHA_NACIMIENTO' => array('name' => 'FECHA_NACIMIENTO', 'type' => 'xsd:string'),
            'POSICION' => array('name' => 'POSICION', 'type' => 'xsd:string'),
            'ID_EQUIPO' => array('name' => 'ID_EQUIPO', 'type' => 'xsd:integer')
        )
    );
    
    $server->register(
        'jugadorConsultar',
        array('id' => 'xsd:integer'),
        array('return'=>'tns:jugador'),
        'urn:JugadoresXMLwsdl', // Nombre del workspace
        'urn:JugadoresXMLwsdl#consultar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Consultar Jugador' // Documentación
    );


    // Eliminar Jugador

    $server->register(
        'jugadorEliminar',
        array('id' => 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:JugadoresXMLwsdl', // Nombre del workspace
        'urn:JugadoresXMLwsdl#eliminar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Actualizar Jugador' // Documentación
    );

     // --------------------------------------------- EQUIPOS --------------------------------------------- //

    // Agregar Equipo
    $server->register(
        'equipoAgregar',
        array('nombre' => 'xsd:string','entrenador'=> 'xsd:string'),
        array('mensaje'=>'xsd:string'),
        'urn:EquiposXMLwsdl', // Nombre del workspace
        'urn:EquiposXMLwsdl#createJugador', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Crear un equipo' // Documentación
    );

    // Actualizar Equipo
    $server->register(
        'equipoActualizar',
        array('id' => 'xsd:integer','nombre' => 'xsd:string','entrenador'=> 'xsd:string'),
        array('mensaje'=>'xsd:string'),
        'urn:EquiposXMLwsdl', // Nombre del workspace
        'urn:EquiposXMLwsdl#actualizar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Actualizar equipo' // Documentación
    );

    // Consultar Equipo
    $server->wsdl->addComplexType(
        'equipo',
        'complextType',
        'struct',
        'sequence',
        '',
        array(
            'ID' => array('name' => 'ID', 'type' => 'xsd:integer'),
            'NOMBRE' => array('name' => 'NOMBRE', 'type' => 'xsd:string'),
            'ENTRENADOR' => array('name' => 'ENTRENADOR', 'type' => 'xsd:string'),
        )
    );
    
    $server->register(
        'equipoConsultar',
        array('id' => 'xsd:integer'),
        array('return'=>'tns:equipo'),
        'urn:EquiposXMLwsdl', // Nombre del workspace
        'urn:EquiposXMLwsdl#consultar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Consultar Equipo' // Documentación
    );


    // Eliminar Equipo

    $server->register(
        'equipoEliminar',
        array('id' => 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:EquiposXMLwsdl', // Nombre del workspace
        'urn:EquiposXMLwsdl#eliminar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Eliminar Equipo' // Documentación
    );

    $server->service(file_get_contents("php://input"));
    
?>