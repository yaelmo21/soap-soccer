<?php
    include('providers/lib/nusoap.php');
    require 'service/partidos_service.php';
    require 'service/noticias_service.php';
    require 'service/torneos_service.php';
    
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
        'consultarNoticia',
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
        'agregarNoticia',
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
        'actualizarNoticia',
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
        'eliminarNoticia',
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
        'consultarTorneo',
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
        'agregarTorneo',
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
        'actualizarTorneo',
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
        'eliminarTorneo',
        array('idTorneo' => 'xsd:integer'),
        array('mensaje'=>'xsd:string'),
        'urn:TorneoXMLwsdl', // Nombre del workspace
        'urn:TorneoXMLwsdl#consultar', // Acción soap
        'rpc', // Estilo
        'encoded', // Uso
        'Eliminar un torneo' // Documentación
    );
    $server->service(file_get_contents("php://input"));
?>