<?php
    include('providers/lib/nusoap.php');
    require 'service/partidos_service.php';
    
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
    $server->service(file_get_contents("php://input"));
?>