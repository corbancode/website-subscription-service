<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Subscription;
use App\Notifications\PostNotification;
use Illuminate\Console\Command;

class SendEmailToSubscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wss:send-email-to-subscribers {post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to subscribers.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $postId = $this->argument('post');
        $post = Post::find($postId);
        if (!$post)
        {
            $this->error('Post not found!');
            return 1;
        }

        if ($post->sent_notification)
        {
            $this->warn('Notification has already been sent!');
            return 1;
        }

        $this->info("Sending notification for post: {$post->title}");

        $this->withProgressBar($post->website->subscriptions, function (Subscription $subscription) use ($post) {
            $this->line("Sending notification to {$subscription->user->name}({$subscription->user->email}).");
            $subscription->user->notify(new PostNotification($post));
            $this->info("Sent notification to {$subscription->user->name}({$subscription->user->email}).");
        });
        $post->sent_notification = true;
        $post->update();
        return 0;
    }
}
