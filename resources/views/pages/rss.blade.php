<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[ ItSolutionStuff.com ]]></title>
        <link><![CDATA[ https://your-website.com/feed ]]></link>
        <description><![CDATA[ Your website description ]]></description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>
  
        @foreach($sounds as $post)
            <item>
                <title>{{ 'تجربة' }}</title>
                <link>{{ asset('public/audio/'.$post->sound) }}</link>
                <description>{!! 'تجربة' !!}</description>
                <author>{{ $user->name }}</author>
                <guid>{{ $post->id }}</guid>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>