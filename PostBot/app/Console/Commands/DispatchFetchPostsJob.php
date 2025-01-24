<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\FetchPostsJob;

class DispatchFetchPostsJob extends Command
{
    protected $signature = 'posts:fetch';
    protected $description = 'Dispatch the job to fetch and store posts';

    public function handle()
    {
        dispatch(new FetchPostsJob());
        $this->info('FetchPostsJob dispatched successfully!');
    }
}