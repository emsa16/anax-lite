<?php
$increment = $this->url("session/increment");
$decrement = $this->url("session/decrement");
$status    = $this->url("session/status");
$dump      = $this->url("session/dump");
$destroy   = $this->url("session/destroy");
?>

<ul>
    <li><a href="<?= $increment ?>">Increment number</a></li>
    <li><a href="<?= $decrement ?>">Decrement number</a></li>
    <li><a href="<?= $status ?>">Status</a></li>
    <li><a href="<?= $dump ?>">Dump</a></li>
    <li><a href="<?= $destroy ?>">Destroy</a></li>
</ul>

<p>
    Värdet på "number" i $_SESSION är: <b><?= $number ?></b>
</p>
