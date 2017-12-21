<?php
namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use App\Exceptions\ExceptionTrait;

trait ExceptionTrait{

    public function apiException($request, $e){
        if($this->isModel($e)){
            return $this->ModelResponse($e);
        }

        if($this->isHttp($e) ){
            return $this->HttpResponse($e);
            
        }
        return parent::render($request, $e);
        
    }

    protected function isModel($e){
        return $e instanceof ModelNotFoundException;
    }
    public function isHttp($e){
        return $e instanceof NotFoundHttpException ;
    }

    public function ModelResponse($e){
        return response()->json([
            'error'=>"Model Product not found"
        ],Response::HTTP_NOT_FOUND);
    }
    public function HttpResponse($e){
        return response()->json([
            'error'=>"Incorrect route"
        ],Response::HTTP_NOT_FOUND);
    }
}
