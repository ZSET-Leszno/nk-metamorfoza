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
        <div class="wrap" id="information">
            <p>
                NK Metamorfoza to salon fryzjersko-kosmetyczny, oferujący szeroką gamę usług związanych z fryzjerstwem, manicure, pedicure, makijażem, zabiegami skóry i ciała, depilacją i wiele więcej. Salon stawia na profesjonalne produkty i obsługę.
                Zachęcamy do skorzystania z naszych usług. Prowadzimy program rabatowy dla naszych klientów.
            </p>
        </div>
    </main>
    <script src="index.js"></script>

</body>
</html>