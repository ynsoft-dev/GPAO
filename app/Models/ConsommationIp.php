<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsommationIp extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'consommations_ip';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'article_id',
        'quantité',
        'unité',
        'quantité_conso',
        'production_id',
    ];
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($consommation_ip) {
            $latestId = \DB::table('consommations_ip')->max('id'); 
            $nextId = $latestId + 1; 
            $consommation_ip->code = 'Co-' . sprintf('%03d', $nextId); 
        });
    }


    
}