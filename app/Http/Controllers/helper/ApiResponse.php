<?php

namespace App\Http\Controllers\helper;

Trait ApiResponse{
    
    public function coreResponse($message, $statusCode, $data = null, $isSuccess = true)
    {
        // Check the params
        if(!$message) return response()->json(['message' => 'Message is required'], 500);

        // Send the response
        if($isSuccess) {
            return response()->json([
                'message' => $message,
                'error' => false,
                'code' => $statusCode,
                'data' => $data
            ], $statusCode);
        } else {
            return response()->json([
                'message' => $message,
                'error' => true,
                'code' => $statusCode,
                'data' => null
            ], $statusCode);
        }
    }

    /**
     * Send any success response
     * 
     * @param   string          $message
     * @param   array|object    $data
     * @param   integer         $statusCode
     */
    public function success($data, $statusCode = 200)
    {
        return $this->coreResponse("Operation Successful", $statusCode, $data);
    }

    /**
     * Send any error response
     * 
     * @param   string          $message
     * @param   integer         $statusCode    
     */
    public function error($message, $statusCode)
    {
        return $this->coreResponse($message, $statusCode, null, false);
    }
    protected function errorResponse($message = null, $code)
	{
		return response()->json([
			'status'=>'Error',
			'message' => $message,
			'data' => null
		], $code);
	}
}