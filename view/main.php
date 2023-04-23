<main>
    <?php if (!empty($saved_island_sum)) { ?>
        <h1 class="result"><?php echo $saved_island_id ?>. Perimeter of island: <span class="result_span"><?php echo $saved_island_sum ?> </span></h1>
    <?php } else { ?>
        <h1 class="result">Perimeter of island: <span class="result_span">0</span></h1>
    <?php } ?>
    <section class="wrapper">
        <div class="outer_wrapper">
            <div class="box_wrapper">
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
            </div>
        </div>
        <div></div>
        <div class="btns">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" id='clear_result' name="result">
                <input type="hidden" id='clear_result_array' name="result_array">
                <button id="reset" type="submit">Clear the table</button>
            </form>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" id='result' name="result">
                <input type="hidden" id='result_array' name="result_array">
                <input type="hidden" id='result_id' name="result_id">
                <button id='calculate' name="submit_button" type="submit">Calculate</button>
            </form>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <?php
                if (isset($saved_island_id)) { ?>
                    <input type="hidden" id='history_id' name="history_id" value="<?php echo ($saved_island_id) ?>">
                <?php } else { ?>
                    <input type="hidden" id='history_id' name="history_id" value="-100">
                <?php } ?>

                <button id='history_button' name="history_button" type="submit">History</button>
            </form>
        </div>
    </section>

</main>