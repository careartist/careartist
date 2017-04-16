<?php

namespace App\Http\Controllers\User;

use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User\Profile;

use Requests;

class AvatarController extends Controller
{
    public function ajaxAvatar(Request $request, Profile $profile)
    {

    	$validation = $this->validator($request->all())->validate();

    	if($validation)
    	{
    		return $validation;
    	}

		$headers = array('Accept' => 'application/json');
		$options = array('Authorization' => array('Uploadcare.Simple', '67d96773aea58980cd4a:e60f9d5b1c952389f49d'));
		$image = Requests::get($request['avatar'] . '-/resize/150x150/', $headers, $options);
		$ext = $this->imageExtension($image->headers['content-type']);
		Storage::delete([
			'public/avatars/' . $profile->id . '.jpg', 
			'public/avatars/' . $profile->id . '.png', 
			'public/avatars/' . $profile->id . '.gif']);

		$avatar = Storage::put(
            'public/avatars/'. $profile->id . $ext, $image->body
        );

        $img_src = 'storage/avatars/' . $profile->id . $ext;
        $profile->avatar = $img_src;
        $profile->save();

	    return $avatar ? $img_src : 'error';
	}

    public function imageExtension($type)
    {
    	switch ($type) {
    		case 'image/png':
    			return '.png';
    			break;

    		case 'image/gif':
    			return '.gif';
    			break;
    		
    		default:
    			return '.jpg';
    			break;
    	}

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
            'avatar' => 'required',
        ]);
    }
}
