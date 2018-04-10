<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['name', 'email', 'phone', 'password', 'role', 'state'];
     protected $primaryKey = 'id_user';
     protected $table = 'users';


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


      public function createUser($data){
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->password = bcrypt($data['pass']);
        $user->role = $data['role'];
        $user->state = 1;
        $user->save();
      }

      public static function registerUser($data){
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->role = 3;
        $user->state = 1;
        $user->save();
      }

      public function updateUser($data){
        $user = $this->find($data['id_user']);
        $user->id_user = $data['id_user'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->password = password_hash($data['pass'], PASSWORD_DEFAULT);
        $user->role = $data['role'];
        $user->state = 1;
        $user->save();
      }

      public function deleteUser($id){
        $user = $this->find($id);
        $user->state = 0;
        $user->save();
      }
}
