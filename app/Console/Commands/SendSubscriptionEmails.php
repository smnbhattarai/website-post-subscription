<?php

namespace App\Console\Commands;

use App\Mail\PostAdded;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendSubscriptionEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-subscription-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Subscribers email about new post being published to website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = Post::query()
             ->with([
                 'website.subscribers'
             ])
             ->whereNull('subscription_email_sent_at')
             ->whereDate('created_at', now()->format('Y-m-d'))
             ->get();

        foreach ($posts as $post) {
            $website     = $post->website;
            $subscribers = $website->subscribers;

            foreach ($subscribers as $subscriber) {
                $user = $subscriber->user;
                try {
                    Mail::to($user->email)->send(new PostAdded($post, $user));
                } catch (\Exception $e) {
                    Log::error($e);
                }
            }

            // Update subscription email sent time
            $post->subscription_email_sent_at = now();
            $post->save();
        }
    }
}
