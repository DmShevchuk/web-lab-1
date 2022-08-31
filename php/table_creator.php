<?php

if (isset($_SESSION["attempts"])) {
    foreach ($_SESSION["attempts"] as $index => $data) {
        echo "<tr>";

        printf("<td> %s </td>", $index + 1);
        printf("<td> %s </td>", $data["x"]);
        printf("<td> %s </td>", $data["y"]);
        printf("<td> %s </td>", $data["R"]);

        if ($data["hit"]) {
            printf("<td class='result-hit'> HIT </td>");
        } else {
            printf("<td class='result-miss'> MISS </td>");
        }

        printf("<td> %s </td>", $data["attemptFrom"]);
        printf("<td> %s </td>", $data["processingTime"]);

        echo "</tr>";
    }
}