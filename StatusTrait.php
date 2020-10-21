<?php
namespace App\Traits;

trait StatusTrait {

  public function responseWithStatus($responseCode,$message='',$data=[],$show_data_with_error=0){
        switch ($responseCode) {
            case 200:
                $status = ['code'=>200, 'message'=>($message)?$message:'SUCCESS', 'error'=>FALSE];
                break;
            case 204:
                $status = ['code'=>204,  'message'=>($message)?$message:'NO CONTENT', 'error'=>TRUE];
                break;
            case 400:
                $status = ['code'=>400,  'message'=>($message)?$message:'BAD REQUEST', 'error'=>TRUE];
                break;
            case 401:
                $status = ['code'=>401,  'message'=>($message)?$message:'Unauthorized user', 'error'=>TRUE];
                break;
            case 403:
                $status = ['code'=>403,  'message'=>($message)?$message:'Forbidden', 'error'=>TRUE];
                break;
            case 404:
                $status = ['code'=>404,  'message'=>($message)?$message:'Page not found!', 'error'=>TRUE];
                break;
            case 405:
                $status = ['code'=>405,  'message'=>($message)?$message:'Method Not Allowed', 'error'=>TRUE];
                break;
            case 406:
                $status = ['code'=>406,  'message'=>($message)?$message:'Not Acceptable', 'error'=>TRUE];
                break;
            case 422:
                $status = ['code'=>422,  'message'=>($message)?$message:'Unprocessable Entity', 'error'=>TRUE];
                break;
            case 500:
                $status = ['code'=>500,  'message'=>($message)?$message:'Internal Server Error', 'error'=>TRUE];
                break;
            default:
                $responseCode = 500;
                $status = ['code'=>500,  'message'=>($message)?$message:'Internal Server Error', 'error'=>TRUE];
                break;
        }
        if($data){
            if($responseCode == 200){
                $status['data'] = $data ;
            }else{
                if($show_data_with_error){
                    $status['data'] = $data ;
                }else{
                    $status['errors'] = $data ;
                }
            }
        }
        return $status;
    }


    public function exceptionErrorResponse($exception){
        $message      = $exception->getMessage();
        $trace        = $exception->getTrace();
        return  $this->responseWithStatus(400,$message);
    }



  }
