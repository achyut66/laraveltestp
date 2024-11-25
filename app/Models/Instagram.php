<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    use HasFactory;
    protected $table = 'instagram_profile';
    protected $fillable = ['i_name', 'i_p_link', 'i_friends'];
    public static function createInsta($data)
    {
        return self::create([
            'i_name' => $data['i_name'],
            'i_p_link' => $data['i_p_link'],
            'i_friends' => $data['i_friends'],
        ]);
    }
}
