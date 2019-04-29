<style type="text/css">
    footer{
        background-color: #000;
        color: #fff;
        height: 40px;
        font-size: 15px;
    }

    .footer-content{
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>
<footer id="footer">
    <div class="container footer-content">
        <div class="pull-left">
            <p>Copyright &copy; PT. PLN(Persero) AREA PALEMBANG</p>
        </div>
        <div class="pull-right">
            <p>Development by &reg; Peserta Magang UNSRI 2017</p>
        </div>
    </div>
</footer>

<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap-select.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/datepicker.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function(){
          $("button.add").click(function() {
            $(this).siblings("button.del").show("fast");
            var x = $(this).parent().prev("table").find("tr").last().clone();
            $(this).parent().prev("table").find("tbody").append(x);
            $(this).parent().prev("table").find("tr").last().find("input[type='text']").val("");
          });

          $("button.del").click(function() {
            var table = $(this).parent().prev("table");
            var rowCount = table.find("tr").length;
            table.find("tr:last").remove();
            if (rowCount <= 2) {
              $(this).hide("fast");
            }
          });
    })
</script>

<script type="text/javascript">
    function limit_checkbox(max,identifier)
    {
        var checkbox = $("input[name='"+identifier+"[]']");
        var checked  = $("input[name='"+identifier+"[]']:checked").length;
        checkbox.filter(':not(:checked)').prop('disabled', checked >= max);
        
    }
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});

        var docHeight = $(window).height();
        var footerHeight = $('#footer').height();
        var footerTop = $('#footer').position().top + footerHeight;

        if (footerTop < docHeight) {
            $('#footer').css('margin-top', (docHeight - footerTop) + 'px');
        }
    })
</script>

</body>
</html>