<?php namespace App\Console\Commands;

use App\Material;
use App\Publisher;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class RssNYTime extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'rss:nytime';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $rbth = Publisher::where('title','=', 'NY times')->first();
        foreach( $rbth->feeds as $feed) {
            $feedData = \Feeds::make($feed->alias);
            foreach ($feedData->get_items() as $item) {
//                $material = Material::where('alias','=', trim($item->get_permalink()))->first();
//                if ($material) {
//                    continue;
//                }
                $material = Material::firstOrNew(['alias' => $item->get_permalink()]);
                $material->title = $item->get_title();
                $material->publisher()->associate($rbth);
                $material->is_published = !is_null($material->is_published) ? : 1;
                $material->save();
            }
            $this->info('Parse finish');
        }
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			//['example', InputArgument::REQUIRED, 'An example argument.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		];
	}

}
