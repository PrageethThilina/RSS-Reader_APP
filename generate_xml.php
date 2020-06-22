<?php
    $rssfeed = '<?xml version="1.0" encoding="ISO-8859-1"?>';
    $rssfeed .= '<rss version="2.0">';
        $rssfeed .= '<channel>';
            $rssfeed .= '<title>Google News - Latest News  Headlines</title>';
            $rssfeed .= '<link>https://www.yahoo.com/news</link>';
            $rssfeed .= '<description>The latest news and headlines from Yahoo! News. Get breaking news stories and in-depth coverage with videos and photos.</description>';
            $rssfeed .= '<language>en-us</language>';
            $rssfeed .= '<copyright>Copyright (c) 2020 Yahoo! Inc. All rights reserved</copyright>';
            $rssfeed .= '<image>
                                <title>Yahoo News - Latest News  Headlines</title>
                                <link>https://www.yahoo.com/news</link>
                                <url>http://l.yimg.com/rz/d/yahoo_news_en-US_s_f_p_168x21_news.png</url>
                        </image>';


    require 'vendor/autoload.php';
    $con = new MongoDB\Client("mongodb://localhost:27017");
    $db = $con -> Rss_App;
    $collection = $db->news_data;

    $cursor = $collection->find();
    foreach ($cursor as $item) {
        $rssfeed .= '<item>';
        $rssfeed .= '<title>' . $item["itemTitle"] . '</title>';
        $rssfeed .= '<link>' . $item["itemLink"] . '</link>';
        //$rssfeed .= '<description>' . $item["itemDescription"] . '</description>';
        $rssfeed .= '</item>';
     };

    $rssfeed .= '</channel>';
    $rssfeed .= '</rss>';

    file_put_contents("rss.xml", $rssfeed);
    echo "<h4 style='color:red'>Successfully Downloaded Xml File</h4>";

?>