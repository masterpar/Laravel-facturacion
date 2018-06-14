<?php 

namespace App\Traits;



use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Routing\Matcher\redirect;



trait ApiResponser
{
	// respuesto / codigo
	private function successResponse($data, $code){

		
		return response()->json($data, $code);
	}
	// error en la petición
	protected function errorResponse($message, $code){
		return redirect()->to('/errors')->with('code', $code);	
		//return response()->json(['error' => $message, 'code' => $code], $code);
	}

	// mostar lista 
	protected function showAll(Collection $collection, $code=200){

		return $this->successResponse(['data' => $collection], $code);
	}

	// mostar unico 
	protected function showOne(Model $instance, $code=200){

		return $this->successResponse(['data' => $instance], $code);
	}

	protected function showMessage($message , $code=200){

		return $this->successResponse(['data' => $message], $code);
	}



}