<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User\Ucare;

class UcareController extends Controller
{
    public function increment()
    {
    	$ucare = Ucare::find(Auth::user()->ucare_id);
        $ucare->increment('uploads');
        $ucare->save();
    }
}
