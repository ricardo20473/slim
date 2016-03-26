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
    const API_KEY                       = "abc1234";
    const HEADER_TOKEN                  = "Token";
    const HEADER_API_KEY                = "Api-Key";
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
    const INVALID_DATA                  = "La data enviada no es válida, intente nuevamente";
    const INVALID_FILE_DATA             = "Error: El archivo de configuración no puede estar vacío";
    const AUTH_INVALID_USER_STATE       = "El usuario se encuentra en un estado no valido";
    const INVALID_TIME                  = "Error: El tiempo expiro vuelve a ingresar";

    const POST                          = 'REGISTRO';
    const PUT                           = 'MODIFICACION';
    const DELETE                        = 'ELIMINACION';
    const GET                           = 'LISTADO';

    const HTTP_200                      = 200;
    const HTTP_200_MSG                  = "OK";
    const HTTP_201                      = 201;
    const HTTP_201_MSG                  = "Peticion de creacion procesada";
    const HTTP_202                      = 202;
    const HTTP_202_MSG                  = "Peticion Aceptada";
    const HTTP_204                      = 204;
    const HTTP_204_MSG                  = "Respuesta sin contenido";
    const HTTP_206                      = 206;
    const HTTP_206_MSG                  = "Contenido parcial de la peticion solicitada";
    const HTTP_400                      = 400;
    const HTTP_400_MSG                  = "Peticion con Datos Erroneos";
    const HTTP_401                      = 401;
    const HTTP_401_MSG                  = "Acceso No Autorizado";
    const HTTP_403                      = 403;
    const HTTP_403_MSG                  = "Acceso Prohibido";
    const HTTP_404                      = 404;
    const HTTP_404_MSG                  = "Peticion no encontrada";
    const HTTP_405                      = 405;
    const HTTP_405_MSG                  = "Metodo no permitido";
    const HTTP_406                      = 406;
    const HTTP_406_MSG                  = "Peticion no aceptable";
    const HTTP_408                      = 408;
    const HTTP_408_MSG                  = "Timeout en la peticion";
    const HTTP_409                      = 409;
    const HTTP_409_MSG                  = "Peticion con Conflicto";
    const HTTP_500                      = 500;
    const HTTP_500_MSG                  = "Error interno en el servidor";
    const HTTP_501                      = 501;
    const HTTP_501_MSG                  = "Servicio no implementado";
    const HTTP_503                      = 503;
    const HTTP_503_MSG                  = "Servicio no disponible";
    const FILE_EDITED                   = "El archivo de configuración ha sido editado";
}