<nav class="main-nav pb-3">
    <ul class="nav fs-3" id="main-nemu">
        <li class="nav-item">
            <a class="nav-link <?=($slug === 'home')? 'active' : '';?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($slug === 'teas')? 'active' : '';?>" href="teas.php">Teas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($slug === 'rewards')? 'active' : '';?>" href="rewards.php">Rewards</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($slug === 'shipment')? 'active' : '';?>" href="shipment.php">Shipment</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($slug === 'contact')? 'active' : '';?>" href="contact.php">Contacts</a>
        </li>
    </ul>
</nav>

