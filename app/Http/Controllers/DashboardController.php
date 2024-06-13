<?php


namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Production;
use App\Models\Article;
use App\Models\Arret;
use App\Models\User;
class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $productionCount = Production::count();
        $articleCount = Article::count();
        $arretCount = Arret::count();
        
        // Récupérer le mois et l'année actuels
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Récupérer les données TRS moyens pour tous les jours du mois
        $dailyTrs = Production::getDailyTrs($currentMonth, $currentYear);
        $trsData = Production::getMonthlyTrs();
        return view('dashboards.admin', compact('userCount', 'productionCount', 'articleCount', 'arretCount', 'dailyTrs','trsData'));
    }
}
