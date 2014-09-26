<header>
    <a href="<?= $host ?>/depot.html">
        <span class="buttonMenu <?php if ($title === 'D&eacute;pot'): ?>buttonMenuActiv<?php endif; ?>">
            <img src="./resources/icones/void.png" id="deposit"/>
            D&eacute;pot
        </span>
    </a>
    <a href="<?= $host ?>/login.html">
        <span class="buttonMenu <?php if ($title === ''): ?>buttonMenuActiv<?php endif; ?>">
            <img src="./resources/icones/void.png" id="schedule"/>
            Agenda
        </span>
    </a>
    <a href="<?= $host ?>/login.html">
        <span class="buttonMenu <?php if ($title === ''): ?>buttonMenuActiv<?php endif; ?>">
            <img src="./resources/icones/void.png" id="memo"/>
            Notes
        </span>
    </a>
</header>