<?php

namespace App\Config;
/**
    Interfaz donde se definen las constantes globales del sistema
*/
interface ICommons 
{
    const HEADER_CONTENT_TYPE           = "Content-Type";
    const HEADER_CONTENT_JSON           = "application/json";
    const HEADER_CONTENT_TYPE_INVALID   = "Header Content-Type Invalido";
    const HEADER_TOKEN                  = "Token";
    const HEADER_API_KEY                = "API-Key";
    const HEADER_INVALID_AUTH_HEADERS   = "Necesita un token de acceso valido o usar el ApiKey correcto";

    const ERROR                         = "Error:";
    const UNEXPECTED_ERROR              = "Error: Ha ocurrido un error inesperado";
    const INVALID_DATE_FORMAT           = "Error: Formato de fecha invalido";
    const INVALID_TYPE                  = "Error: Tipo de campo invalido";
    const INVALID_DATA_LENGHT           = "Error: Campo con tamaño invalido";
    const INVALID_SAVE_RECORD_EXIST     = "Error: El registro que intenta almacenar ya existe";
    const INVALID_RECORD_NOT_EXIST      = "Error: El registro solicitado no existe";
    const INVALID_NOMBRE_FIELD_REQUIRED = "Error: El campo nombre no puede estar vacio";
    const INVALID_ESTATUS_FIELD_REQUIRED= "Error: El campo estatus no puede estar vacio";
    const INVALID_FILTER                = "Error: Valor de filtro suministrado no valido";
    const INVALID_SOFTDELETE_ACTION     = "Error: El objeto tiene cambios y no puede ser eliminado logicamente";
    const INVALID_HEADER_DEVICEID       = "Para esta peticion el Header X-Az-DeviceId es obligatorio";
    const INVALID_DATA                  = "La data enviada no es válida, intente nuevamente";
    const INVALID_FILE_DATA             = "Error: El archivo de configuración no puede estar vacío";

    const POST                          = 'REGISTRO';
    const PUT                           = 'MODIFICACION';
    const DELETE                        = 'ELIMINACION';
    const GET                           = 'LISTADO';

    const HTTP_200                      = 200;
    const HTTP_200_MSG                  = "OK";
    const HTTP_409                      = 409;
    const HTTP_409_MSG                  = "Peticion con Conflicto";
    const HTTP_500                      = 500;
    const HTTP_500_MSG                  = "Error interno en el servidor";
}