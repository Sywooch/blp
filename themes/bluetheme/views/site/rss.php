<?php
echo <<<XML0
<?xml version="1.0" encoding="utf-8"?>
    <rss xmlns:yandex="http://news.yandex.ru" xmlns:media="http://search.yahoo.com/mrss/" version="2.0">
    <channel>
    <title>711.ru - Независимый портал о страховании</title>
    <link>http://www.711.ru/news/</link>
    
<description>Независимый портал о страховании</description>
<yandex:logo>http://www.711.ru/images/logo711.png</yandex:logo>
<yandex:logo type="square">www.711.ru/olitimages/logo100x100.jpg</yandex:logo>
XML0;
foreach ($news as $new) {
    echo <<<XML
    
    <item>
    <title>{$new['title']}</title>
    <link>http://www.711.ru{$new['url']}</link>
        <description>{$new['full_story']}</description>
        <category>{$new['category']}</category>
        <enclosure url="{$new['image']}" type="image/jpeg" length='100000'/>
        <pubDate>{$new['date']}</pubDate>
        <yandex:full-text>{$new['full_story']}</yandex:full-text>
        <guid>http://www.711.ru{$new['url']}</guid>
    </item>
XML;
}
echo <<<XML1

</channel>
</rss>
XML1;
    