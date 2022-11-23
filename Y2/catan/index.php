<?php

ini_set("display_errors", 1);

function debug($val)
{
    echo "<pre>";
    print_r($val);
    echo "</pre>";
}

include_once "board.php";

$a = new Board();
?>

<html>
<head>
    <title>Catan</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="catan.css">
    <meta name="author" content="Alyxia Sother">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<catan>
    <?= $a ?>
</catan>
<!-- remove this when bringing in the whole board-->
</body>
</html>
<!--<catan>
    <player id="p1">
        <H3>Player 1 </H3>
        <buildings>
            <piece class='city P1'></piece>
            <piece class='city P1'></piece>
            <piece class='city P1'></piece>
            <piece class='city P1'></piece>

            <piece class='Village P1'></piece>
            <piece class='Village P1'></piece>
            <piece class='Village P1'></piece>
            <piece class='Village P1'></piece>
            <piece class='Village P1'></piece>

            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
            <piece class='road P1'></piece>
        </buildings>
        <resources>
            <card class="sheep">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="stone">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="wood">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="ore">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="Wheat">
                <div></div>
                <p> 09 X</p>
            </card>
        </resources>
    </player>
    <player id="p2">
        <H3>Player 2 </H3>
        <buildings>
            <piece class='city P2'></piece>
            <piece class='city P2'></piece>
            <piece class='city P2'></piece>
            <piece class='city P2'></piece>

            <piece class='Village P2'></piece>
            <piece class='Village P2'></piece>
            <piece class='Village P2'></piece>
            <piece class='Village P2'></piece>
            <piece class='Village P2'></piece>

            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
            <piece class='road P2'></piece>
        </buildings>
        <resources>
            <card class="sheep">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="stone">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="wood">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="ore">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="Wheat">
                <div></div>
                <p> 09 X</p>
            </card>
        </resources>
    </player>
    <player id="p3">
        <H3>Player 3 </H3>
        <buildings>
            <piece class='city P3'></piece>
            <piece class='city P3'></piece>
            <piece class='city P3'></piece>
            <piece class='city P3'></piece>

            <piece class='Village P3'></piece>
            <piece class='Village P3'></piece>
            <piece class='Village P3'></piece>
            <piece class='Village P3'></piece>
            <piece class='Village P3'></piece>

            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
            <piece class='road P3'></piece>
        </buildings>
        <resources>
            <card class="sheep">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="stone">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="wood">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="ore">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="Wheat">
                <div></div>
                <p> 09 X</p>
            </card>
        </resources>
    </player>
    <player id="p4">
        <H3>Player 4 </H3>
        <buildings>
            <piece class='city P4'></piece>
            <piece class='city P4'></piece>
            <piece class='city P4'></piece>
            <piece class='city P4'></piece>

            <piece class='Village P4'></piece>
            <piece class='Village P4'></piece>
            <piece class='Village P4'></piece>
            <piece class='Village P4'></piece>
            <piece class='Village P4'></piece>

            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
            <piece class='road P4'></piece>
        </buildings>
        <resources>
            <card class="sheep">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="stone">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="wood">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="ore">
                <div></div>
                <p> 09 X</p>
            </card>
            <card class="Wheat">
                <div></div>
                <p> 09 X</p>
            </card>
        </resources>
    </player>
    <board>
        <cityrow>
            <piece class="city">1</piece>
            <piece class="road">72</piece>
            <piece class="city">2</piece>
            <piece class="road">71</piece>
            <piece class="city">3</piece>
            <piece class="road">70</piece>
            <piece class="city">4</piece>
            <piece class="road">69</piece>
            <piece class="city">5</piece>
            <piece class="road">68</piece>
            <piece class="city">6</piece>
            <piece class="road">67</piece>
            <piece class="city">7</piece>
        </cityrow>
        <br/>
        <tilerow>
            <piece class="road"></piece>
            <tile class="wood">
                <fiche>11</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="grass">
                <fiche>12</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="wheat">
                <fiche>9</fiche>
            </tile>
            <piece class="road"></piece>
        </tilerow>
        <br/>
        <cityrow>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
        </cityrow>
        <br/>
        <tilerow>
            <piece class="road"></piece>
            <tile class="stone">
                <fiche>4</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="ore">
                <fiche>6</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="stone">
                <fiche>5</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="grass">
                <fiche>10</fiche>
            </tile>
            <piece class="road"></piece>
        </tilerow>
        <br/>
        <cityrow>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
        </cityrow>
        <br/>
        <tilerow>
            <piece class="road"></piece>
            <tile class="wood">
                <fiche>3</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="wheat">
                <fiche>11</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="">
                <fiche>7</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="wood">
                <fiche>4</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="wheat">
                <fiche>8</fiche>
            </tile>
            <piece class="road"></piece>
        </tilerow>
        <br/>
        <cityrow>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
        </cityrow>
        <br/>
        <tilerow>
            <piece class="road"></piece>
            <tile class="stone">
                <fiche>8</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="grass">
                <fiche>10</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="grass">
                <fiche>9</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="ore">
                <fiche>3</fiche>
            </tile>
            <piece class="road"></piece>
        </tilerow>
        <br/>
        <cityrow>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
        </cityrow>
        <br/>
        <tilerow>
            <piece class="road"></piece>
            <tile class="ore">
                <fiche>5</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="wheat">
                <fiche>2</fiche>
            </tile>
            <piece class="road"></piece>
            <tile class="wood">
                <fiche>6</fiche>
            </tile>
            <piece class="road"></piece>
        </tilerow>
        <br/>
        <cityrow>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
            <piece class="road"></piece>
            <piece class="city"></piece>
        </cityrow>
    </board>
</catan>

<script src="log.js"></script>
</body>
</html>-->
