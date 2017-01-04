<?php ob_start(); require("./_app/Config.inc.php");
//debug($_GET);

$username   = (isset($_GET['u']) ? clean($_GET['u']) : '');
$uid        = (isset($_GET['uid']) ? clean($_GET['uid']) : 0);
$pid        = (isset($_GET['pid']) ? clean($_GET['pid']) : 0);
$v          = (isset($_GET['v']) ? clean($_GET['v']) : '');
$nb_partages = (isset($nb_partages) ? $nb_partages : '0');
$visuel_generee = "assets/img/page_2_bg.png";

// LECTURE DE L'UTILISATEUR ET DE L'IMAGE GENEREE
$read_user = new Read;
$read_user->FullRead("SELECT * FROM fdp_users WHERE user_id=:id", "id={$uid}");

if ($read_user->getResult()):
    foreach ($read_user->getResult() as $user):
        extract($user);
    endforeach;
    $arr = explode(' ',$user_name); $prenom = ucwords($arr[0]); //debug($prenom);

    // LECTURE DE L'IMG GENEREE
    $read_post = new Read;
    $read_post->FullRead("SELECT * FROM fdp_users_posts WHERE post_id = :id", "id={$pid}");
    if ($read_post->getResult()):
        foreach ($read_post->getResult() as $post):
            extract($post);
        endforeach;
    endif;
endif;


$ip = null;
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
//debug($ip);

$data = json_decode(file_get_contents('http://geoplugin.net/json.gp?ip='.$ip));
$country = $data->geoplugin_countryName;
$countryCode = $data->geoplugin_countryCode;

$accroche_footer = null;

//$country = 226;
if (($countryCode == 'GA') || ($countryCode == 'SN')) { //sen
    $accroche_footer = 'MessageEnTete_bg.png';

    $username_uri = setUri($username);
    $page = "result.php?u={$username}&uid={$uid}&v={$v}&p=ga";
    $title = "Jeu Concours Fete des Peres !";
    $desc = "Tente de gagner des lots via Airtel Money en partageant la photo de ton papa.";


} else {

    if ($countryCode == 'BF') {
        $accroche_footer = 'MessageEnTete_bk.png';

    } elseif ($countryCode == 'MG') { //mada
        $accroche_footer = 'MessageEnTete_mg.png';

    } else {
        $accroche_footer = 'MessageEnTete.png';
    }

    $username_uri = setUri($username);
    $page = "result.php?u={$username}&uid={$uid}&pid={$pid}&v={$v}";
    $title = "Message a mon Papa pour la Fete des Peres";
    $desc = "Profitons de cette journee et montrons toute notre reconnaissance a nos Heros.";

}


?>

    <!DOCTYPE html>
    <html lang="fr-FR">
    <head>
        <title>Spéciale Fête des Pères - Disons Merci à nos Héros</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="fb:app_id" content="261139450908316" />
        <meta property="og:title" content="<?= $title; ?>" />
        <meta property="og:description" content="<?= $desc; ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="<?= HOME .'/'. $page; ?>" />
        <meta property="og:image" content="<?= HOME .'/'. $visuel_generee; ?>" />

        <?= getStyles(); ?>
    </head>

<body>
<?php require('./_app/fb_init.php'); //Load Facebook SDK for JavaScript ?>

<? include("./inc/header.inc.php"); ?>

<div class="body container"><!-- row bloc_central -->
    <div class="row">
    <section class="col-sm-6 col-sm-offset-3 text-center" style="padding: 20px; ">
    <!-- 1ER BTN PARTAGER
    ============================================================================ -->
<? if(isset($_GET['ref']) && $_GET['ref'] === 'fb') : $_SESSION['provenance_fb']='true'; ?>
    <a class="btn_generic btn_partage text-center" onclick="login(this.id)" style="padding: 5px 25px 5px 30px;" id="recois_ta_dedicace" > RENDS HOMMAGE A TON HEROS </a><br><br>
<? else: ?>
    <a class="btn_generic btn_partage text-center" data-toggle="modal" data-target="#lightbox" onClick="<?php echo "shareLink('".$username."', '".$uid."','".$pid."','".$v."' )"; ?> ">
        PARTAGE SUR FACEBOOK &nbsp;<i class="fa fa-facebook" aria-hidden="true"></i>
    </a><br><br>
<? endif; ?>
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>

    <!-- IMAGE GENEREE
    ============================================================================ -->
    <img class="img-responsive center-block" src="<?= HOME .'/'. $visuel_generee; ?>" /><br>

    <!-- 2ND BTN PARTAGER
    ============================================================================ -->
<?php if ((sset($_GET['ref']) && $_GET['ref'] === 'fb')): ?>
    <a class="btn_generic btn_partage text-center" onclick="login(this.id)" style="padding: 5px 25px 5px 30px;" id="recois_ta_dedicace" >
        RENDS HOMMAGE A TON HEROS
    </a>
<?php elseif ($countryCode == 'GA' || $countryCode == 'SN') : ?>

    <a class="btn_generic btn_partage text-center" data-toggle="modal" data-target="#lightbox" onClick="<?php echo "shareLink_gb('".$username."', '".$uid."','".$pid."','".$v."' )"; ?> ">
        PARTAGE SUR FACEBOOK &nbsp; <i class="fa fa-facebook" aria-hidden="true"></i>
    </a>
<? else : ?>
    <a class="btn_generic btn_partage text-center" data-toggle="modal" data-target="#lightbox" onClick="<?php echo "shareLink('".$username."', '".$uid."','".$pid."','".$v."' )"; ?> ">
        PARTAGE SUR FACEBOOK &nbsp; <i class="fa fa-facebook" aria-hidden="true"></i>
    </a>

<? endif; ?>
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
<br><br><br>
    <a href="http://www.funizi.com/fete_des_meres/" target="_blank" class="btn_generic btn_partage text-center" style="font-size: .85em;font-weight: lighter;"> Clique ici pour faire aussi une dédicace à ta mère </a>
    </section>
    </div>
    </div>
<? include("./inc/footer_mg.inc.php"); ?>

    <form action="#" method="post" class="form-group-sm">
        <div>
            <input type="text" value="<?= $title; ?>" name="" id="" placeholder="" hidden="hidden">
            <input type="text" value="<?= $desc; ?>" name="" id="" placeholder="" hidden="hidden">
        </div>
    </form>


<?= getScriptsJs(); //SCRIPTS JS ?>
    </body>
    </html>

    <?php
    /*
    else:
        header("Location: index.php");
    endif;
    */
    ?>