<?php
$firstname=$_SESSION['firstname'];
?>
<div class="d-flex flex-row ms-auto align-items-center">
    <div class="dropdown">
        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar"
            role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <img src="https://img.icons8.com/bubbles/75/000000/user.png" alt="Black and White Portrait of a Man"
                loading="lazy" />
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
            <li>
                <a class="dropdown-item" style="color:#1266F1">Hi, <?php echo $firstname?>!</a>
            </li>
            <hr style="margin:0">
            <li>
                <a class="dropdown-item" href="./profile.php">My profile</a>
            </li>
            <li>
                <a class="dropdown-item" href="#">Settings</a>
            </li>
            <li>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</div>