{{-- <?xml version="1.0" encoding="UTF-8" ?> --}}
<rss version="2.0">

<channel>

    <title>Dịch vụ thiết kế website</title>
    <link>{{ url('/') }}</link>
    <description>Dichvuthietkewebsite RSS</description>

    @foreach ($posts as $post)
        <item>
            <title>{{ $post->title }}</title>
            <pubDate>{{ $post->updated_at }}</pubDate>
            <link>{{ url('/') }}/{{ $post->alias }}</link>
            <guid>{{ url('/') }}/{{ $post->alias }}</guid>
        </item>
    @endforeach
   
</channel>

</rss>
