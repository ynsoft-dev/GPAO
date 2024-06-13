<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cadence;
use Illuminate\Support\Facades\DB;
class Production extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'date',
        'quart',
        'équipe',
        'atelier_id',
        'ligne_id',
        'article_id', 
        'unité',
        'quantité_p',
        'lot',
        'tt',
        'tu',
        'trs',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($production) {
            // Récupérer la date actuelle au format AAMMJJ
            $date = date('dmy');

            $latestId = self::whereDate('created_at', now())->max('id');
            $production->code = 'PR-' . $date;

            // Assigner l'équipe de l'utilisateur connecté
            $production->équipe = auth()->user()->equipe;

            $production->tt = $production->quart;

            // Calculer la valeur de tu
            $production->calculateTu();
        });

        static::updating(function ($production) {
            if ($production->isDirty('quantité_p')) {
                $production->calculateTu();
                $production->calculateTrs();
            }
            if ($production->isDirty('quart')) {
                $production->tt = $production->quart;
            }
        });
    }

    public function calculateTu()
    {
        $cadence = Cadence::where('article_id', $this->article_id)
            ->where('atelier_id', $this->atelier_id)
            ->where('ligne_id', $this->ligne_id)
            ->first();

        if ($cadence) {
            $this->tu = $this->quantité_p / $cadence->cadence;
            $this->calculateTrs();
        } else {
            $this->tu = null;
            $this->trs = null;
        }
    }

    public function calculateTrs()
    {
        if ($this->tt != 0) {
            $this->trs = ($this->tu / $this->tt) * 100;
        } else {
            $this->trs = null;
        }
        
    }
    public static function getDailyTrs($month, $year)
    {
        // Nombre total de jours dans le mois
        $totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        
        // Récupérer les jours avec TRS moyen
        $trsData = self::select(
            DB::raw("strftime('%d', date) as day"),
            DB::raw('AVG(trs) as avg_trs')
        )
        ->whereMonth('date', $month)
        ->whereYear('date', $year)
        ->groupBy(DB::raw("strftime('%d', date)"))
        ->pluck('avg_trs', 'day')
        ->toArray();
        
        // Remplir les jours manquants avec des TRS nuls
        $allDays = [];
        for ($i = 1; $i <= $totalDays; $i++) {
            $day = str_pad($i, 2, '0', STR_PAD_LEFT); // Formatage du jour à deux chiffres
            $allDays[$day] = isset($trsData[$day]) ? $trsData[$day] : 0; // Utilisation du TRS moyen ou 0
        }
    
        return $allDays;
    }
    public static function getMonthlyTrs()
    {
        return self::select(
            DB::raw("strftime('%m', date) as month"),
            DB::raw('AVG(trs) as avg_trs')
        )
        ->groupBy(DB::raw("strftime('%m', date)"))
        ->pluck('avg_trs', 'month')
        ->toArray();
    }
    


    public function consommations_ip()
    {
        return $this->hasMany(ConsommationIp::class);
    }

    public function arrets()
    {
        return $this->hasMany(Arret::class);
    }


    public function recettes()
    {
        return $this->hasMany(Recette::class);
    }


    
        public function cadence()
        {
            return $this->belongsTo(Cadence::class, 'article_id', 'article_id');
        }
    
    

    public function planning()
    {
        return $this->belongsTo(Planning::class);
    }
}