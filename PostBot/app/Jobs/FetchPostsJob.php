<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

class FetchPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        // دریافت داده از API
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        
        // اگر API خطا داد
        if ($response->failed()) {
            \Log::error('خطا در دریافت داده از API: ' . $response->status());
            return;
        }

        $posts = $response->json();

        $counter = 0;
        // ذخیره داده در دیتابیس
        foreach ($posts as $post) {
            $counter++;
            Post::updateOrCreate(
                ['id' => $post['id']],
                [
                    'user_id' => $post['userId'],
                    'title' => $post['title'],
                    'body' => $post['body']
                ]
            );
        if ($counter >= 50) {
            break;
        }
    }

        \Log::info('50 پست با موفقیت ذخیره شدند!');
    }
}