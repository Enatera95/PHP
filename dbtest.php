<?php
$conn = mysqli_connect('localhost', 'root', '*********', '*********');

if(!$conn)
{
    echo 'Connection error!' . mysqli_connect_error();
}else{
    $sql = 'select s.title "title", a.name "artist" from lyrics.songs s, lyrics.artists a where s.artist_id = a.id;';
    $result = mysqli_query($conn, $sql);
    $songs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" style="border-collapse: collapse; width: 100%;">
        <tr><th>Results</th></tr>

        <?php
        for($i = 0; $i < sizeof($songs); $i++)
        {
            echo '<tr><td style="padding: 6px; text-align:center">';
            echo $songs[$i]["title"].' - '. $songs[$i]["artist"];
            echo '</td></tr>';
        }?>
    </table>
</body>
</html>