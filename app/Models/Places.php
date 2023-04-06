<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;

class Places extends Model
{
    protected $table = 'Places';
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';


    protected $fillable = [
        'title'        ,
        'place'  ,
        'image',
        'type'  ,
        'cellphone'  ,
        'description' ,
        'schedule',
        'address'  ,
        'city'  ,
        'food_pets'  ,
        'parking'  ,
        'payment_methods'  ,
        'wifi'  ,
        'public'  ,
        'enviroment'  ,
        'accessibility'  ,
        'facebook_url'      ,
        'instagram_url'      ,
        'pdf_menu'      ,
        'notes',
        'id_user',
        'status'
    ];


    use HasFactory;

    public function setHiddenId($id){
        $hashids = new Hashids('Elradipet10Lt',6,'ABCEIU1234567890');
        return $hashids->encode($id);
    }
}
