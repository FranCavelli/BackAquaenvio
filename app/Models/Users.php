<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Users extends Model
{
    use HasFactory, Notifiable;
    
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'cuit',
        'name',
        'last_name',
        'email',
    ];
    
    public static function getUsers($company)
    {
        return DB::table('users')
            ->join('company_users', 'users.id', '=', 'company_users.user_id')
            ->join('roles_users', 'users.id', '=', 'roles_users.user_id')
            ->join('roles', 'roles.id', '=', 'roles_users.role_id')
            ->where('company_users.company_id', $company)
            ->select('users.cuit', 'users.name', 'users.last_name', 'users.email', 'users.id', 'users.status', 'roles.name as role')
            ->orderBy('users.name')
            ->get();
    }

}
