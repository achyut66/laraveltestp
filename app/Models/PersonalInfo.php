<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $table = 'personal_info';
    protected $fillable = ['p_name', 'p_contact', 'p_address', 'p_profession'];
    public static function createInfo($data)
    {
        return self::create([
            'p_name' => $data['p_name'],
            'p_contact' => $data['p_name'],
            'p_address' => $data['p_name'],
            'p_profession' => $data['p_name'],
        ]);
    }

}
