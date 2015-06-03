<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Kurenai\DocumentParser;
use Orchestra\Story\Model\Content;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            '2013-05-10-hello-world',
            '2013-05-31-why-orchestra-asset',
            '2013-06-01-simple-website-1',
            '2013-06-01-simple-website-2',
            '2013-06-01-simple-website-3',
            '2013-06-02-simple-website-4',
            '2013-06-11-quick-update-1',
            '2013-06-12-simple-website-5',
            '2013-06-13-simple-website-6',
            '2013-06-20-release-2.0.0',
            '2013-07-09-installation-preview',
            '2013-07-09-storycms-preview',
            '2013-07-10-ftp-publishing-preview',
            '2013-07-28-quick-update-2',
            '2013-07-28-simple-website-7',
            '2013-09-10-simple-website-8',
        ];

        $parser = app(DocumentParser::class);

        foreach ($posts as $post) {
            $source   = file_get_contents(__DIR__."/posts/{$post}.md");
            $document = $parser->parse($source);
            $metadata = $document->get();

            preg_match('/^(\d{4})-(\d{2})-(\d{2})-(.*)$/', $post, $matches);

            list(, $year, $month, $day, $slug) = $matches;

            $content               = new Content();
            $content->type         = Content::POST;
            $content->format       = 'markdown';
            $content->title        = $metadata['title'];
            $content->content      = $document->getContent();
            $content->slug         = "_post_/{$slug}";
            $content->status       = 'publish';
            $content->published_at = Carbon::createFromDate($year, $month, $day);
            $content->user_id      = 1;
            $content->save();

            $this->command->info("Seed: [{$post}]");
            sleep(10);
        }
    }
}
