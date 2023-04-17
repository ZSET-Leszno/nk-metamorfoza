<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/svg" href="img/logowhite.svg">
    <title>NK Metamorfoza</title>
</head>
<body>
    <nav>
        <span><img src="img/logoblack.svg" alt="logo"></span>
        <div id="menu">
            <a onclick="document.getElementById('aboutAnchor').scrollIntoView({behavior: 'smooth'})">O nas</a>
            <a onclick="document.getElementById('serviceAnchor').scrollIntoView({behavior: 'smooth'})">Usługi</a>
            <a href="https://booksy.com/pl-pl/127849_nk-metamorfoza_fryzjer_17369_leszno" target="_blank">Rezerwacja</a>
            <a onclick="document.getElementById('cardsAnchor').scrollIntoView({behavior: 'smooth'})">Galeria</a>
        </div>
        <div>
            <div id="burger" onclick="navSide();">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div>
    </nav>
    <div id="navside">
        <div>
            <div id="burger2" onclick="navSide();">
                <div class="bar1"></div>
                <div class="bar3"></div>
            </div>
            <div id="navsideInfo" onclick="navSide();">

            </div>
        </div>
    </div>
    <header>
        <div class="dark">          
            <h1 id="header"></h1>
            <h2 id="header2"></h2>
            <div id="arrow" onclick="document.getElementById('aboutAnchor').scrollIntoView({behavior: 'smooth'})"></div>
        </div>
    </header>
    <main>
        <span id="reviewId" style="display: none;">0</span>
        <span class="anchor">
            <div id="aboutAnchor"></div>
        </span>
        <h2 id="reviewHeader">NK Metamorfoza</h2>
        <div class="wrap" id="about">
            <p><b>NK Metamorfoza</b> to salon fryzjersko-kosmetyczny, oferujący szeroką gamę usług związanych z fryzjerstwem, manicure, pedicure, makijażem, zabiegami skóry i ciała, depilacją i wiele więcej. Salon stawia na profesjonalne produkty i obsługę. Zachęcamy do skorzystania z naszych usług. Prowadzimy program rabatowy dla naszych klientów.</p>
        </div>
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
        <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5862.763050923558!2d16.561946293618032!3d51.8429109343784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47059826f143ec83%3A0xca644d98918d9a99!2sSalon%20fryzjersko-%20kosmetyczny%20NK%20Metamorfoza!5e0!3m2!1spl!2spl!4v1681662211567!5m2!1spl!2spl" width="600" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <span class="anchor">
            <div id="serviceAnchor"></div>
        </span>
        <div id="services">
            <div class="dark wrap">
                <h2 id="services-text"></h2>
                <input type="text" id="search" name="service" placeholder="Wyszukaj konkretną usługę">
                <div id="searched"></div>
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
                        <a href="https://booksy.com/pl-pl/127849_nk-metamorfoza_fryzjer_17369_leszno" target="_blank">Zarezerwuj wizytę teraz</a>
                    </div>
                </div>
            </div>
        </div>
        <span class="anchor">
            <div id="cardsAnchor"></div>
        </span>
        <div id="cards" class="wrap">
            <div class="card pre-card">
                <img src="img/media/11.jpg" alt="obraz">
            </div>
            <div class="card pre-card">
                <img src="img/media/2.jpg" alt="obraz">
            </div>
            <div class="card pre-card">
                <img src="img/media/4.jpg" alt="obraz">
            </div>
            <div class="card pre-card">
                <img src="img/media/10.jpg" alt="obraz">
            </div>
            <div class="card pre-card">
                <img src="img/media/5.jpg" alt="obraz">
            </div>
            <div class="card pre-card">
                <img src="img/media/9.jpg" alt="obraz">
            </div>
            <div class="card pre-card">
                <img src="img/media/1.jpg" alt="obraz">
            </div>
            <div class="card pre-card">
                <img src="img/media/12.jpg" alt="obraz">
            </div>
        </div>
        <footer>
            <div>
                <div>
                    <img src="img/logowhite.svg" alt="logo">
                    <h3>Profesjonalizm blisko Ciebie</h3>
                </div>
            </div>
            <div>
                <a href="https://www.facebook.com/METAMORFOZAnk" target="_blank"><img src="img/facebook.svg" alt="facebook-icon"></a>
                <a href="https://booksy.com/pl-pl/127849_nk-metamorfoza_fryzjer_17369_leszno" target="_blank"><img src="img/booksy.svg" alt="booksy-icon"></a>
                <a href="https://www.instagram.com/nk_metamorfoza/" target="_blank"><img src="img/instagram.svg" alt="instagram-icon"></a>
            </div>
            <div>
                <div>
                    <div>
                        <h4>Skontaktuj się z nami:</h4>
                        <p><img src="img/phone.svg" alt="telefon">+48 510 593 610</p>
                        <p><img src="img/at.svg" alt="telefon">potrzebne@informacje.com</p>
                        <p><img src="img/location.svg" alt="telefon">Święciechowska 1A,<br>64-100 Leszno</p>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <h4>Godziny otwaricia:</h4>
                    <?php

                        try {
                            $connection = new mysqli("localhost", $dbuser, $dbpassword, $dbname);
                            $query = $connection->query("SELECT * FROM otwarcia");
                            while($hours = $query->fetch_assoc()) {
                                echo '
                                    <p>
                                        <span>'.mb_convert_case($hours["dzien"], MB_CASE_TITLE, "UTF-8").'</span>
                                        <span>'.($hours["zamkniete"] != "1" ? ($hours["otwarcie"].' - '.$hours["zamkniecie"]) : "Nieczynne").'</span>
                                    </p>
                                ';
                            }
                            $connection->close();
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }

                    ?>
                </div>
            </div>
        </footer>
        <div id="copyright">
            <span>NK Metamorfoza &copy; Wszelkie prawa zastrzeżone | NIP: 6972387521</span>
        </div>
    </main>
    <script src="index.js"></script>
    <script src="navside.js"></script>
</body>
</html>