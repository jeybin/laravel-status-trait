# laravel-status-trait
Manage your responses from one place (Laravel/Lumen),
Create Traits folder inside App folder
Copy the StatusTrait Over there

use it in any controller,

an example is mentioned below

<?php
namespace App\Http\Controllers;
use App\Traits\StatusTrait;
class Controller extends BaseController{
    use StatusTrait;    

    public function test(){
        try {
            $response = \App\Mode\ModelName::all();
            return ($response) ? $this->responseWithStatus(200,'Reponse Message',$response) : $this->responseWithStatus(204);
        } catch (Throwable $exception) {
            return $this->exceptionErrorResponse($exception);
        }
    }
}
