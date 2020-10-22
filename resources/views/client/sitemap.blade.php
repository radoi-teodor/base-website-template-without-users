<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

   <url>
      <loc>{{ $domain }}</loc>
      <lastmod>2020-08-15</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.8</priority>
   </url>

    <url>
       <loc>{{ $domain }}/about-us</loc>
       <lastmod>2020-08-15</lastmod>
       <changefreq>weekly</changefreq>
       <priority>0.8</priority>
    </url>

    <url>
       <loc>{{ $domain }}/contact-us</loc>
       <lastmod>2020-08-15</lastmod>
       <changefreq>monthly</changefreq>
       <priority>0.7</priority>
    </url>


   @foreach ($blogs as $blog)
     <url>
        <loc>{{ $domain }}/blog/{{ $blog->permalink }}</loc>
        <lastmod>{{ $blog->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
     </url>
   @endforeach


   <url>
      <loc>{{ $domain }}/terms-and-conditions</loc>
      <lastmod>2020-08-15</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.9</priority>
   </url>

   <url>
      <loc>{{ $domain }}/privacy-policy</loc>
      <lastmod>2020-08-15</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.9</priority>
   </url>

</urlset>
