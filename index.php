<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>NK Metamorfoza</title>
</head>
<body>
    <nav>
        <span><img src="img/logoblack.svg" alt="logo"></span>
        <div>
            <a href="#">Usługi</a>
            <a href="#">Rezerwacja</a>
            <a href="#">Kontakt</a>
        </div>
        <div></div>
    </nav>
    <header>
        <div class="dark">          
            <h1 id="header"></h1>
            <h2 id="header2"></h2>
            <div id="arrow" onclick="document.getElementById('cards').scrollIntoView({behavior: 'smooth'})"></div>
        </div>
    </header>
    <main>
        <span id="reviewId" style="display: none;">0</span>
        <h2 id="reviewHeader">Poznaj opinie naszych klientów</h2>
        <div id="reviews">
            <?php

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://booksy.com/api/pl/2/customer_api/businesses/127849/reviews?reviews_per_page=1000");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch , CURLOPT_HTTPHEADER, ['X-Api-Key: web-e3d812bf-d7a2-445d-ab38-55589ae6a121']);
            $response = curl_exec($ch);
            $json = json_decode($response, true);
            foreach ($json["reviews"] as $review) {
                $stars = $review["rank"];
                if ($stars >= 4) {
                    echo '
                    <div class="review">
                        <div>
                    ';
                    for ($i = 5; $i > 0; $i--) {
                        if ($stars > 0) {
                            echo '<img src="img/star-solid.svg" alt="gwiazdka">';
                            $stars--;
                        } else {
                            echo '<img src="img/star-regular.svg" alt="gwiazdka">';
                        }
                    }
                    echo '
                        </div>
                        <p>'.$review["review"].'<span> ~ '.$review["user"]["first_name"].' '.$review["user"]["last_name"].'</span></p>
                    </div>
                    ';
                }
            }

            ?>
            <span onclick="previousSlide()"><div></div></span>
            <span onclick="nextSlide()"><div></div></span>
        </div>
        </div>
        <div id="services">
            <div class="dark wrap">
                <h2 id="services-text"></h2>
                <div id="services-inner" class="slide">
                    <?php
                        try {
                            require_once("baza.php");
                            $connection = new mysqli("localhost", $dbuser, $dbpassword, $dbname);
                            $query = $connection->query("SELECT * FROM kategorie");
                            while($category = $query->fetch_assoc()) {
                                echo '
                                <div class="category" onclick="expand('.mb_convert_case($category["id"], MB_CASE_TITLE, "UTF-8").');">
                                    <h3><img src="img/category'.$category["id"].'.svg">'.ucfirst($category["nazwa"]).'</h3>
                                    <div class="arrow"></div>
                                </div>
                            ';
                            echo '<div class="expand" id="category'.$category["id"].'">';
                            $query2 = $connection->query("SELECT * FROM uslugi WHERE kategoria = ".$category["id"]);
                            while($service = $query2->fetch_assoc()) {
                                echo '
                                    <div>
                                        <p>'.mb_convert_case($service["nazwa"], MB_CASE_TITLE, "UTF-8").'</p>
                                        <span>'.($service["cena"] != "0" ? $service["cena"].'&nbsp;zł' : "Cena Do Ustalenia (Tel. 510-593-610)").'</span>
                                    </div>
                                ';
                                }
                                echo '</div>';
                            }
                            $connection->close();
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }

                    ?>
                    <div style="text-align: center;">
                        <a href="https://booksy.com/pl-pl/127849_nk-metamorfoza_fryzjer_17369_leszno">Zarezerwuj wizytę teraz</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="cards" class="wrap">
            <div class="card pre-card card-top">
                <img src="img/media/11.jpg" alt="obraz">
            </div>
            <div class="card pre-card card-top">
                <img src="img/media/2.jpg" alt="obraz">
            </div>
            <div class="card pre-card card-top card-poof">
                <img src="img/media/3.jpg" alt="obraz">
            </div>
            <div class="card pre-card card-top card-poof">
                <img src="img/media/10.jpg" alt="obraz">
            </div>
            <div class="card pre-card card-bottom">
                <img src="img/media/5.jpg" alt="obraz">
            </div>
            <div class="card pre-card card-left card-bottom">
                <img src="img/media/6.jpg" alt="obraz">
            </div>
            <div class="card pre-card card-bottom card-poof">
                <img src="img/media/7.jpg" alt="obraz">
            </div>
            <div class="card pre-card card-bottom card-poof">
                <img src="img/media/12.jpg" alt="obraz">
            </div>
        </div>
    </main>
    <script src="index.js"></script>

</body>
</html>