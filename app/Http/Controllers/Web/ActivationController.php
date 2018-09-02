<?php

namespace App\Http\Controllers\Web;

use App\Classes\ActivationService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivationController extends Controller
{

    public $activationService;

    public function __construct(ActivationService $activationService)
    {
        $this->activationService = $activationService;
    }

    public function index($token){
        if ($user = $this->activationService->activateUser($token)) {
            return view('site.auth.user-activation');
        }
        abort(404);
    }
}
