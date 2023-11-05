<?xml version = "1.0" encoding="UTF-8" ?>
<rss version = '2.0'>
<channel>
    <title>Global Wild Swimming Campaign</title>
    <description>This page will present details of GWSC</description>
    <?php
    include('Connection.php');
    header('Content-Type:text/xml');
    $sql = "SELECT * FROM RSSfeed ORDER BY RSSFeedID desc";
    $query = mysqli_query($connect, $sql);

    $count = mysqli_num_rows($query);
    for ($i=0; $i < $count ; $i++) {
        $fetch = mysqli_fetch_array($query);
        echo "<item>";
        echo "<title>".$fetch['Title']."</title>";
        echo "<description>".$fetch['Description']."</description>";
        echo "<url>".$fetch['URL']."</url>";
        echo "</item>";
    }

    ?>
</channel>

</rss>