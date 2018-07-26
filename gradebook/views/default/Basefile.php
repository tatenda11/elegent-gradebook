<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />
    <title><?= isset($title) ? $title : 'Elegent Gradebook' ?></title>
    <link href="<?= base_url('assets/common/third_party/metro/css/metro.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/common/third_party/metro/css/metro-icons.css') ?> " rel="stylesheet">
    <link href="<?= base_url('assets/common/third_party/metro/css/metro-responsive.css') ?> " rel="stylesheet">
    <?php if(isset($cssArray) && !empty($cssArray)):?>
        <?php foreach($cssArray as $css): ?>
            <link href="<?= Theme_loader::getThemeResource('css/'.$css) ?>" rel="stylesheet">
        <?php endforeach;?>
    <?php endif;?>
</head>
<body>
    <?php 
        if(isset($page) && $page != '' )
        {
            $this->load->view(Theme_loader::getView($page));
        }   
    ?>  
    <div class='spacer'></div>
    <footer>
        <div class="bottom-menu-wrapper">
            <ul class="horizontal-menu compact">
                <li><a>&copy; Elegent Microsystems 2017 - <?= date('Y') ?></a></li>
                <li class="place-right"><a href="#">Privacy</a></li>
                <li class="place-right"><a href="#">Legal</a></li>
                <li class="place-right"><a href="#">Advertise</a></li>
                <li class="place-right"><a href="#">Help</a></li>
                <li class="place-right"><a href="#">Feedback</a></li>
            </ul>
        </div>
    </footer>
    <div data-role="dialog" id="dialog-uf-alert" data-close-button="true" data-type="alert" data-width='60%'></div>
    <div data-role="dialog" id="dialog-uf-info" data-close-button="true" data-type="info" data-width='60%'></div>
    <script src="<?= base_url('assets/common/js/jquery-2.1.3.min.js') ?>"></script>
    <script src="<?= base_url('assets/common/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/common/js/select2.min.js') ?>"></script>
    <script src="<?= base_url('assets/common/third_party/metro/js/metro.min.js') ?>"></script>
    <?php if(isset($jsArray) && !empty($jsArray)):?>
        <?php foreach($jsArray as $js): ?>
            <script src="<?= Theme_loader::getThemeResource('js/'.$js) ?>"></script>
        <?php endforeach;?>
    <?php endif;?>
    <script src="<?= Theme_loader::getThemeResource('js/main.js') ?>"></script>
</body>
</html>