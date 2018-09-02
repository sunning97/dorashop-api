<?php
/**
 * Created by PhpStorm.
 * User: Giang Nguyen
 * Date: 2/9/2018
 * Time: 10:49
 */

namespace App\Classes;


use App\Mail\UserActivationMail;
use App\Models\User;
use App\Models\UserActivation;
use Illuminate\Support\Facades\Mail;

class ActivationService
{
    protected $resendAfter = 60;

    protected $userActivation;

    public function __construct(UserActivation $activation)
    {
        $this->userActivation = $activation;
    }

    public function sendActivationMail($user){
        if(!$this->shouldSend($user)) return;

        $token = $this->userActivation->createActivation($user);
        $user->activation_url = route('activation',$token);
        $mail = new UserActivationMail($user);
        Mail::to($user->email)->send($mail);
    }

    public function activateUser($token){
        $activation = $this->userActivation->getActivationByToken($token);

        if($activation == null) return;

        $user = User::find($activation->user_id);
        $user->is_active = 'T';
        $user->save();
        $this->userActivation->deleteActivation($token);

        return $user;
    }
    private function shouldSend($user){
        return $this->userActivation->getActivation($user) === null;
    }
}
