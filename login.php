	<?php

/**
 * @author roberto
 * @copyright 2013
 */
require_once("framework/loginform.php");
require_once("master.php");
require_once("settings.php");
require_once("framework/sessionmanager.php");

$master = new Master(null);
$master->DrawHeader();
$loginform = new LoginForm("http://".$_SERVER['SERVER_NAME'].Settings::INETRFACE."/Webadmin/index.php");
?>
<div id="MainContent">
<div class="Article">
    <div class="ArticleTitle">Please log in</div>
    <div class="ArticleText">
        <?php if (isset($_GET['failure'])) {
            echo '<font size="+1" color="red"><p>Login failed! Incorrect username or password!</p></font>';
        }
        if (isset($_GET['permissiondenied'])) {
            echo '<font size="+1" color="red"><p>Permission denied! Please log in to continue!</p></font>';
        }
        ?>
        <?php echo $loginform; ?>
    </div>
</div>
</div>

<?php $master->DrawFooter(); ?>