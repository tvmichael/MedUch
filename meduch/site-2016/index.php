<!DOCTYPE html>
<?php /** User: Mik  Date: 27.11.2016 */ ?>
<html lang="uk">
<head>
    <title>MU 2016</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="../site-2015/med/images/m.png" type="image/png">
    <link href="../site-2015/med/css/reset.css" rel="stylesheet">
    <link href="css/style-2016.css" rel="stylesheet">
</head>
<body>

<?php
// Get current directory
function find_file($argument){
        // search all p.. directory
        $directory = getcwd().'/p'.$argument;
        //print '<br>'.$directory.'<br>';
        $list_directory = scandir($directory);
        //print_r($list_directory);
        for ($j = 2; $j < count($list_directory); $j++)  {
            if ($list_directory[$argument]!=""){
                // echo $list_directory[$j]." | ".strlen($list_directory[$j])."<br>";
                // Read File
                $ExistsFile = $directory.'/'.$list_directory[$j]."/info.txt";
                // echo '<br>= '.$directory.$ExistsFile.' =<br>';
                if (file_exists($ExistsFile)) {
                    //echo "The file $ExistsFile exists<br>";
                    $k=1;
                    $return_value[$j][$k] = 'p'.$argument.'/'.$list_directory[$j]."/index.html";
                    $handle = fopen($ExistsFile, "r");
                    while (!feof($handle)) {
                        $k++;
                        $buffer = fgets($handle, 4096);
                        //echo $buffer.'<br>';
                        $return_value[$j][$k] = $buffer;
                    };
                    fclose($handle);
                    /* Print information*/
                };
            };
        };
    return $return_value;
};
// End function find_file($argument);
?>

<!-- HEADER -->
<header>
    <div class="div-h">
        <h1>Медичне училище 2016-2017</h1>
        <a href="http://kpmu.km.ua/cycle_commission/cc_science_training/" target="_blank">
            Циклова комісія природничо-наукової підготовки із фундаментальних та професійно-орієнтованих дисциплін
        </a>
    </div>
</header>
<!-- MAIN -->
<main>
    <h2>Завдання підготовлені студентами групи А</h2>
    <section>
        <?php
            function print_article($n)
            {
                //print_r(find_file($n));
                //print '<br>';

                for($i=2; $i<=count(find_file($n))+1; $i++) {
                    if (find_file($n)[$i][1] != "") {
                        // link
                        echo "<a href='";
                        //echo $_SERVER['SERVER_NAME'];
                        echo $_SERVER['REQUEST_URI'];
                        echo find_file($n)[$i][1] . "'>";

                        echo "<article><div><span class='art-topic'>";
                        echo find_file($n)[$i][2];
                        echo "<br/></span><span class='art-name'>Автор<br><b>";
                        echo find_file($n)[$i][3];
                        echo '</b></span></div></article></a>';
                    };
                };
            };
            print_article(1);
        ?>
    </section>

    <h2>Завдання підготовлені студентами групи Б</h2>
    <section>
        <?php print_article(2); ?>
    </section>

    <h2>Завдання підготовлені студентами групи В</h2>
    <section>
        <?php print_article(3); ?>
    </section>
</main>
<!-- FOOTER -->
<footer>
    <div class="div-f">
        <a href="http://kpmu.km.ua" target="_blank"> <b>Адреса:</b><br>&nbsp;&nbsp;&nbsp;
        Хмельницька обл.<br/> м. Кам'янець-Подільський, вул. Пушкінська, 31</a>
    </div>
</footer>
</body>
</html>