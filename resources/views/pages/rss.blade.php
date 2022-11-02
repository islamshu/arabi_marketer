<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title>{{ $user->first_name }} {{ $user->last_name }}</title>
        <link>sub.arabicreators.com</link>
        <description>arabicreators</description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>
  
        @foreach($sounds as $post)
            <item>
                <title>{{ $post->title }}</title>
                <link>{{ asset('public/audio/'.$post->sound) }}</link>
                <enclosure type="audio/mpeg" url="{{ asset('public/audio/'.$post->sound) }}" length=""/>
                <description>{!! 'تجربة' !!}</description>
                <author>{{ $user->name }}</author>
                <guid>{{ $post->id }}</guid>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>