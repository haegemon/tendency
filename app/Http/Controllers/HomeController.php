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
        $materials = Material::where('updated_at', '>', date("Y-m-d",strtotime("-1 week")))->get();
        $matetrialAtDay = [];
        foreach ($materials as $material) {
            if (!array_key_exists($material->updated_at,$matetrialAtDay)) {
                $matetrialAtDay[$material->updated_at] = [];
            }
            if (!array_key_exists($material->publisher->title,$matetrialAtDay[$material->updated_at])) {
                $matetrialAtDay[$material->updated_at][$material->publisher->title] = 0;
            }
            $matetrialAtDay[$material->updated_at][$material->publisher->title] += 1;
        }

        $lava = new Lavacharts;
        $stocksTable = $lava->DataTable();  // Lava::DataTable() if using Laravel
        $stocksTable->addDateColumn('Date')
            ->addNumberColumn('RBTH')
            ->addNumberColumn('NY times');
        foreach ($matetrialAtDay as $day => $value) {
            $stocksTable->addRow(array('$day', $value['RBTH'], $value['NY times']));
        }
        $lineChart = $lava->LineChart('Stocks')
            ->setOptions(array(
                'datatable' => $stocksTable,
                'title' => 'Trends'
            ));
        return view('graphs', ['lineChart' => $lineChart]);
    }

}
