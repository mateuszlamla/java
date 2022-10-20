<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Wędkowanie</title>
</head>
<body> 
    <div class="baner">
        <h1>Portal dla wędkarzy</h1>
    </div>
    <div class="lewe">
        <div class="lewy1">
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <?php
                    $link = mysqli_connect('localhost', 'root', '', 'wedkowanie');

                    $select_rybki = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby JOIN lowisko ON ryby.id = lowisko.ryby_id WHERE lowisko.rodzaj = 3";
                    $result_select_rybki = mysqli_query($link, $select_rybki);
                    while($row = mysqli_fetch_assoc($result_select_rybki)){
                        echo "<li>" . $row['nazwa'] . " pływa w rzece " . $row['akwen']. ", " . $row['wojewodztwo'] . "</li>";
                    }
                ?>
            </ol>
        </div>
        <div class="lewy2">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <tr>
                    <th>L.p.</th>
                    <th>Gatunek</th>
                    <th>Występowanie</th>
                </tr>
                <?php
                    $select_rybeczki = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1";
                    $result_select_rybeczki = mysqli_query($link, $select_rybeczki);

                    while($row = mysqli_fetch_assoc($result_select_rybeczki)){
                        echo"<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['nazwa'] . "</td>
                            <td>" . $row['wystepowanie'] . "</td></tr>";
                    }
                
                ?>
            </table>
        </div>
    </div>
    <div class="prawy">
        <img src="ryba1.jpg" alt="Sum"><br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <footer>
        <p>Stronę wykonał: Mateusz Lamla</p>
    </footer>
</body>
</html>