<?php

namespace App\Http\Controllers\User;

use Storage;
use Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User\Images;
use App\Models\User\Product;
use App\Models\User\Ucare;

class ImageController extends Controller
{
    public function ajaxImage(Request $request, Product $product)
    {

    	$validation = $this->validator($request->all())->validate();

    	if($validation)
    	{
    		return $validation;
    	}

        $user = Auth::user();
        $ucare = Ucare::find($user->ucare_id);

		$headers = array('Accept' => 'application/json');
		$options = array('Authorization' => array('Uploadcare.Simple', $ucare->public_key.':'.$ucare->private_key));
		$image_large = Requests::get($request['product_image'].'-/resize/200x/', $headers, $options);
		$image_thumb = Requests::get($request['product_image'].'-/resize/900x/', $headers, $options);

		$img_name = str_random(30);

		$images = Storage::put(
            'public/products/'.$product->id.$img_name.'.jpg', $image_large->body
            'public/products/thumb/'.$product->id.$img_name.'.jpg', $image_thumb->body
        );

        $product->images->create([
        	'product_id' => $product->id,
        	'image' => $product->id.$img_name.'.jpg'
        ]);

	    return $images ? $product->id.$img_name.'.jpg' : 'error';
	}

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'product_image' => 'required',
        ]);
    }
}
