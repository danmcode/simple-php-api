<?php
/**
 * Clase para manejar las respuestas JSON que
 * se realizan más comunmente.
 */
class JsonResponse
{

	public static function errResponse( $statusCode, $data = [], $message = "noError" )
	{
        $data = array(
			'statusCode' => $statusCode, 
			'messageError' => $message, 
			'data' => $data
		);

        http_response_code( $statusCode );
        echo json_encode($data, JSON_NUMERIC_CHECK);

        die();
	}

    public static function successResponse( $statusCode, $data = [], $message = "noError" )
	{
        $data = array(
			'statusCode' => $statusCode, 
			'messageError' => $message, 
			'data' => $data
		);

        http_response_code( $statusCode );
        echo json_encode($data, JSON_NUMERIC_CHECK);

        die();
	}

}