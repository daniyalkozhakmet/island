<?php
//Grabbing data
$island_sum = intval(filter_input(INPUT_POST, 'result', FILTER_SANITIZE_NUMBER_INT));
$island_arr = filter_input(INPUT_POST, 'result_array', FILTER_SANITIZE_STRING);
$island_id = filter_input(INPUT_POST, 'result_id', FILTER_SANITIZE_NUMBER_INT);
$history_id = intval(filter_input(INPUT_POST, 'history_id', FILTER_SANITIZE_NUMBER_INT));

//Including database,island and controller
include('./model/database.php');
include('./model/island.php');
include('./model/island_contr.php');
include('./model/island_contr_without_const.php');


if (isset($_POST['history_button'])) {
    $island = new IslandContrWithoutConst($history_id);
    $previous_island = $island->getPreviousIsland();
    $saved_island_sum = $previous_island[2];
    $saved_island_arr = $previous_island[1];
    $saved_island_id = $previous_island[0];
    $qty_islands = $island->qtyIsland()[0];
}
if (!empty($island_arr) && !empty($island_sum)) {
    $island = new IslandContr($island_arr, $island_sum);
    $new_island = $island->saveIsland();
    $saved_island_sum = $new_island[2];
    $saved_island_arr = $new_island[1];
    $saved_island_id = $new_island[0];
    $history_id = $saved_island_id;
}
// }

//Header
include('./view/header.php');
// Main section
include('./view/main.php');
//Footer
include('./view/footer.php') ?>;