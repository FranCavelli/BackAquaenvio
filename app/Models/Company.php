<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use HasFactory, Notifiable;
    
    protected $table = 'companies';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
    ];
    
    public static function getCompaniesByUser($userId)
    {
        return DB::table('companies')
            ->join('company_users', 'companies.id', '=', 'company_users.company_id')
            ->where('company_users.user_id', $userId)
            ->select('companies.*')
            ->get();
    }

}
