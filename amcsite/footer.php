
</main><!-- /main -->
<footer class="footer">
      <div class="container">
            <div class="row grey-text text-lighten-4">
                  <div class="col s12 l4 center-align about">
                        <h5>À propos de nous</h5>
                        <p style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                              Asperiores consequatur dignissimos dolore doloribus ducimus est excepturi ipsa, laudantium, modi molestiae necessitatibus nesciunt
                              pariatur quae qui quod tempore tenetur vitae voluptate!</p>
                  </div>
                  <div class="col s12 l4 center-left">
                        <ul class="footer-menu">
                              <h5>Menu</h5>
                            <?php if(!is_front_page()): ?>
                              <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#home">Accueil</a></li>
                              <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="">Qui sommes nous ?</a></li>
                              <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#type">Types d'intervention</a></li>
                              <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#domain">Domaines d'expertise</a></li>
                              <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#reference">Nos clients</a></li>
                            <?php else: ?>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?= esc_url( home_url() ) ;?>#home">Accueil</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="">Qui sommes nous ?</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?= get_home_url()  ;?>#type">Types d'intervention</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?= esc_url( home_url() ) ;?>#domain">Domaines d'expertise</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="<?= esc_url( home_url() ) ;?>#reference">Nos clients</a></li>
                            <?php endif ?>
                              <li><i class="fa fa-angle-right" aria-hidden="true"></i> <a href="https://bms.bluekango.com/amc/index.php" target="_blank">Espace abonnes</a></li>

                        </ul>
                  </div>
                  <div class="col s12 l4 center-left">
                        <ul class="footer-contact">
                              <h5>Contact</h5>
                              <li><i class="fa fa-home"></i> <span>Sicap Amitié 3 – N° 4435, BP 15708 <br>Dakar-Fann Sénégal</span></li>
                              <li><i class="fa fa-phone"></i> <span>+221 33 859 75 00</span></li>
                              <li><i class="fa fa-envelope"></i> <a style="font-size: .81em;" href="mailto:administration@afriquemanagementconseil.com">administration@afriquemanagementconseil.com</a></li>
                              <li><i class="fa fa-linkedin-square" aria-hidden="true"></i> <a href="https://www.linkedin.com/company/afrique-management-conseil" target="_blank">Afrique Management conseil</a></li>
                        </ul>
                  </div>
            </div>
      </div>
      <div style="padding-top: 15px;padding-right: 20px; height: 50px;opacity: .8;background-color: rgba(34, 100, 155, 1);">
            <div class="" style="color:white; text-align:right">
                  &copy; Afrique Management Conseil <?= date('Y'); ?> - Powered by SiSTEPS
            </div>

      </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>