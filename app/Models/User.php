<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    public $timestamps = true;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}

class UserModel extends Model
{
    public $timestamps = true;
    public function allData()
    {
        return DB::table('users')->get();
    }

    public function addData($data)
    {
        return DB::table('users')->insert($data);
    }

    public function editData($id, $data)
    {
        return DB::table('users')->where('id', $id)->update($data);
    }
    
    public function deleteData($id)
    {
        return DB::table('users')->where('id', $id)->delete();
    }

}
