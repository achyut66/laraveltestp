<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facebook extends Model
{
    use HasFactory;

    protected $table = 'facebook_profile';
    protected $fillable = ['f_name', 'f_p_link', 'f_friends'];

    // Modify to handle bulk inserts
    public static function createFace($data)
    {
        // Bulk insert all the data at once
        self::insert($data);
    }
    public static function SearchName($name)
    {
        $name = trim($name);
        $query = self::where('f_name', 'like', '%' . $name . '%');
        return $query->get();
    }

}
