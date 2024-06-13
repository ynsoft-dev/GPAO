<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    protected $fillable = [
        'code',
        'article_pf_id',
        'article_ip_id',
        'quantité',
        'unité',
    ];
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($recette) {
            $latestId = \DB::table('recettes')->max('id'); 
            $nextId = $latestId + 1; 
            $recette->code = 'RC-' . sprintf('%03d', $nextId); 
        });
    }

    public function article_pf()
    {
        return $this->belongsTo(Article::class, 'article_pf_id');
    }

    public function article_ip()
    {
        return $this->belongsTo(Article::class, 'article_ip_id');
    }

    public function consommations_ip()
    {
        return $this->belongsToMany(ConsommationIp::class, 'recette_consommation_ip', 'recette_id', 'consommation_ip_id');
    }
}
