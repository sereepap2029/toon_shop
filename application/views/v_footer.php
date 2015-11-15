<div class="container-fluid no-padding" style="margin-top:100px;">
    <div class="row-fluid">
        <div class="span12 no-margin-left footer-top">
            <div class="span4"><img src="<?echo site_url();?>/images/logo-footer.png"></div>
            <div class="span4">
                <p class="head">Brabuza</p>
                <p class="content">330 Rayford Road,Suit 338,</p>
                <p class="content">Spring, TX, 77368</p>
                <p class="content">United States</p>
                <p class="content">Phone: 080-403-2819</p>
            </div>
            <div class="span4">
                <p class="head">Connect With Us</p>
                <p class="content"><img src="<?echo site_url();?>/images/icon/footer_fb.png">&nbsp;Facebook</p>
                <p class="content"><img src="<?echo site_url();?>/images/icon/footer_twitter.png">&nbsp;Twister</p>
                <p class="content"><img src="<?echo site_url();?>/images/icon/footer_linkedin.png">&nbsp;LinkedIn</p>
                <p class="content"><img src="<?echo site_url();?>/images/icon/footer_g_plus.png">&nbsp;Google+</p>
            </div>
        </div>
        <div class="span12 no-margin-left footer-bot">
            <div class="span1 no-margin-left">
            </div>
            <div class="span5 no-margin-left">
                <p>2015 BRABUZA All Rights Reserved.</p>
            </div>
            <div class="span5 no-margin-left">
                <p class="pull-right">Privacy Policy Website by alotlotusss</p>
            </div>
            <div class="span1 no-margin-left">
            </div>
        </div>
    </div>
</div>
<script src="<?echo site_url();?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?echo site_url();?>assets/scripts.js"></script>
<script>
$('.dropdown-toggle').click(function(e) {
    e.preventDefault();
    setTimeout($.proxy(function() {
        if ('ontouchstart' in document.documentElement) {
            $(this).siblings('.dropdown-backdrop').off().remove();
        }
    }, this), 0);
});
</script>
<?
    if (isset($table)) {
        ?>
    <!-- DATA TABLE SCRIPTS -->
    <script src="<?echo site_url();?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?echo site_url();?>assets/DT_bootstrap.js"></script>
    <?
    }
    ?>
        </body>

        </html>
