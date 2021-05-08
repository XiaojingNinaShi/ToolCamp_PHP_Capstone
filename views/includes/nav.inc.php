<nav class="main-nav pb-3">
    <ul class="nav fs-3" id="main-nemu">
        <li class="nav-item">
            <a class="nav-link <?=($slug === 'home')? 'active' : '';?>" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($slug === 'teas')? 'active' : '';?>" href="/?page=teas">Teas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($slug === 'rewards')? 'active' : '';?>" href="/?page=rewards">Rewards</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($slug === 'shipment')? 'active' : '';?>" href="/?page=shipment">Shipment</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=($slug === 'contact')? 'active' : '';?>" href="/?page=contact">Contacts</a>
        </li>
    </ul>
</nav>