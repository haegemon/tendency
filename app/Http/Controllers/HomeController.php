<?php namespace App\Http\Controllers;

use App\Material;
use Khill\Lavacharts\Lavacharts;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function compare()
    {
        //$materials = Material::where('updated_at', '>', date("Y-m-d",strtotime("-1 week")))->get();
        $materials = Material::all();
        $mateterialAtDay = [];
        foreach ($materials as $material) {
            if (!array_key_exists($material->updated_at->toDateString(),$mateterialAtDay)) {
                $mateterialAtDay[$material->updated_at->toDateString()] = [];
            }
            if (!array_key_exists($material->publisher->title,$mateterialAtDay[$material->updated_at->toDateString()])) {
                $mateterialAtDay[$material->updated_at->toDateString()][$material->publisher->title] = 0;
            }
            $mateterialAtDay[$material->updated_at->toDateString()][$material->publisher->title] += 1;
        }

        $lava = new Lavacharts;

        $stocksTable = $lava->DataTable();
        $stocksTable->addStringColumn('Date')
            ->addNumberColumn('RBTH')
            ->addNumberColumn('NY times');
        foreach ($mateterialAtDay as $day => $value) {
            $stocksTable->addRow(array($day, isset($value['RBTH'])? $value['RBTH'] : 0, isset($value['NY times'])? $value['NY times'] : 0));
        }
        $lineChart = $lava->LineChart('Stocks');
            $lineChart->setOptions(array(
                'datatable' => $stocksTable,
                'title' => 'Trends'
            ));
        return view('graphs', ['lineChart' => $lineChart, 'lava' => $lava]);
    }

}
