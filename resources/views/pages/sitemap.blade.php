     {!! '<' . '?' . 'xml version="1.0" encoding="UTF-8"' . '?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ route('home_page') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->toISOString() }}</lastmod>
    </url>
    @php
        $posts = cache()->remember('sitemap_posts', 60*60, function (){
            $end = App\Models\Name::latest()->pluck('id')->first();
            $random_id = rand(1, $end);
            $random_comparison = collect(['<', '>'])->random();

            return \App\Models\Name::whereNotNull('scraped_at')
                ->select('id', 'slug', 'updated_at')
                ->where('id', $random_comparison, $random_id)
                ->take(5000)
                ->get();
        });
    @endphp
    @foreach($posts->shuffle() as $post)
        <url>
            <loc>{{ url($post->slug) }}</loc>
            <lastmod>{{ $post->updated_at->toISOString() }}</lastmod>
        </url>
    @endforeach
</urlset>
