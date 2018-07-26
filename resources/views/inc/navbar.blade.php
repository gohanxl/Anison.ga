<?php 
use Anison\Song;
use Anison\Requests;
$songamount = Song::count();
$requestamount = Requests::count();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="<?= route('home');?>"><img src="{{url('/')}}/favicon.ico" width="35" height="35" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active"><a class="nav-link" href="<?= route('home');?>">Songs <span class="badge badge-light"><?= $songamount?></span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?= route('requests');?>">Requests <span class="badge badge-light"><?= $requestamount?></span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?= route('newRequest');?>">Request</span></a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Extra</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?= route('discord');?>">Discord</a>
                    <a class="dropdown-item" href="<?= route('github');?>">GitHub</a>
                    <a class="dropdown-item" href="<?= route('paypal');?>">Donate</a>
                </div>
            </li>
            <a class="nav-link my-2 my-lg-0">Contact: deterimo@gmail.com</a>
        </ul>
    </div>
</nav>
