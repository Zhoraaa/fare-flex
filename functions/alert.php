<?php
if (isset($_SESSION['result'])) {
    ?>
    <div id="alert" class="pad15 brad15 shadow smooth">
        <span><?=$_SESSION['result']?></span>
        <button id="alert-deleter" class="like-circle impact-btn">×</button>
    </div>
    <?php
}
unset($_SESSION['result']);