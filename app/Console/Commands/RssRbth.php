<?php namespace App\Console\Commands;

use App\Material;
use App\Publisher;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class RssRbth extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'rss:rbth';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'parse rss of rbth';

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
		$rbth = Publisher::where('title','=', 'RBTH')->first();
        foreach( $rbth->feeds as $feed) {
            $feedData = \Feeds::make($feed->alias);
            foreach ($feedData->get_items() as $item) {
                $material = Material::firstOrNew(['alias' => $item->get_permalink()]);
                $material->title = $item->get_title();
                $material->description = $item->get_description();
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
