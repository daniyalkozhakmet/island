</body>
<script type="text/javascript">
    // Preventing form to submit when reload page
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    const result_array_server = '<?php if (isset($saved_island_arr)) {
                                        echo $saved_island_arr;
                                    } else {
                                        echo array();
                                    } ?>';
    const result_array_id = '<?php echo $saved_island_id ?>';
    const history_id = '<?php echo $history_id ?>';
</script>
<script src="./view/js/script.js"></script>

</html>
<footer class="footer">
    <h1>Developed by Kozhakmetov Daniyal</h1>
</footer>