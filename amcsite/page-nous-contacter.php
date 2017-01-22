<?php get_header(); ?>
<!-- End Header
<!-- Content -->
<div class="map col s12" style="margin-top:50px; height:355px">
    <div class="row responsive-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d964.7878888981421!2d-17.469981170859228!3d14.704019999358565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTTCsDQyJzE0LjUiTiAxN8KwMjgnMTAuMCJX!5e0!3m2!1sfr!2ssn!4v1484649938029" width="450" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>
<div class="row container contact-content" style="margin-top:2em">
        <div class="col m6 s12 contact-info">
            <h1 style="font-size:2rem; color: #F17A21; text-decoration: underline">Contact</h1>
            <ul>
                <li><i class="fa fa-home"></i> <span>Sicap Amitié 3 – N° 4435, BP 15708 <br>Dakar-Fann Sénégal</span></li>
                <li><i class="fa fa-phone"></i> <span>+221 33 859 75 00</span></li>
                <li><i class="fa fa-envelope"></i> <a style="font-size: .81em;" href="mailto:administration@afriquemanagementconseil.com">administration@afriquemanagementconseil.com</a></li>
                <li><i class="fa fa-linkedin-square" aria-hidden="true"></i> <a href="https://www.linkedin.com/company/afrique-management-conseil" target="_blank">Afrique Management conseil</a></li>

            </ul>
        </div>
        <div class="col m6 s12 contact-form">
            <h1 style="font-size:2rem; color: #F17A21; text-decoration: underline">Nous Écrire</h1>
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <i style="color:#F17A21; font-size:1.3rem" class="fa fa-user prefix"></i>
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Nom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i style="color:#F17A21; font-size:1.3rem" class="fa fa-envelope-o prefix"></i>
                        <input id="email" type="email" class="validate" required>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i style="color:#F17A21; font-size:1.3rem" class="fa fa-suitcase prefix"></i>
                        <input id="company" type="text" class="validate">
                        <label for="company">Sujet</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i style="color:#F17A21; font-size:1.3rem" class="fa fa-pencil-square-o prefix"></i>
                        <textarea id="message" class="materialize-textarea"></textarea>
                        <label for="message">Message</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col m12">
                        <p class="right-align"><button class="btn" style="color:#FFF; background: #F17A21;" type="button" name="action"><i style="font-size:1.3rem" class="fa fa-send"></i> Envoyer</button></p>
                    </div>
                </div>
            </form>
        </div>
</div>

<!-- End Header
<!-- Footer -->
<?php get_footer(); ?>