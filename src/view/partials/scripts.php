<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
        crossorigin="anonymous"></script>
<script src="/js/bootstrap-material-design.min.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>

<?php if (isset($this->script)): ?>
    <script src="/js/<?= $this->script; ?>.js"></script>
<?php endif; ?>

<script>
    $(document).ready(function () {
        $('body').bootstrapMaterialDesign();
    });

    <?php if (isset($this->script) && $this->script == 'dashboard'): ?>
        $('.input-group.date').datepicker({
            orientation: "bottom auto",
            todayHighlight: true
        });

        $('#tag-cloud-date-1').change(function() {
            generateTagCloud($(this).val(), 'tag-cloud-1');
        });

        $('#tag-cloud-date-2').change(function() {
            generateTagCloud($(this).val(), 'tag-cloud-2');
        });

        function generateTagCloud(date, id_div) {
            console.log('Tag cloud generation');

            var oReq = new XMLHttpRequest();

            oReq.onload = function() {
                $('#' + id_div).html(this.responseText)
            };

            oReq.open('get', 'generate_tag_cloud.php?date=' + date, true);

            oReq.send();
        }
    <?php endif; ?>
</script>