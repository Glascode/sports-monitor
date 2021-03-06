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
</script>