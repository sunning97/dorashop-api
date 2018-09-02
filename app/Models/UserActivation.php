<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivation extends Model
{
    protected $table='user_activations';
    protected $fillable=['user_id','created_at','updated_at'];
    protected $hidden=['token'];


    public function createActivation($user){
        $activation = $this->getActivation($user);

        if(!$activation){
            return $this->createToken($user);
        }
        return $this->reCreateToken($user);
    }

    private function generateToken(){
        return hash_hmac('sha256',str_random(40),config('app.key'));
    }

    private function createToken($user){
        $token  = $this->generateToken();

        UserActivation::insert([
            'user_id' => $user->id,
            'token' => $token,
            'created_at' => now()->toDateTimeString()
        ]);

        return $token;
    }

    private function reCreateToken($user){
        $token = $this->generateToken();

        UserActivation::where('user_id',$user->id)
            ->update([
               'token' => $token,
                'created_at' => now()->toDateTimeString()
            ]);

        return $token;
    }

    public function getActivation($user){
        return UserActivation::where('user_id',$user->id)->first();
    }

    public function getActivationByUser($user){
        return UserActivation::where('user_id',$user->id)->first();
    }

    public function getActivationByToken($token){
        return UserActivation::where('token',$token)->first();
    }

    public function deleteActivation($token){
        UserActivation::where('token',$token)->delete();
    }

}
