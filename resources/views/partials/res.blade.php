<ul id="stockBar">
    <li id="stockBarWarehouseWrapper" class="stock" title="Warehouse">
        <img class="warehouse" src="/assets/images/x.gif" alt="Warehouse" />
        <span class="value" id="stockBarWarehouse">
            <?= // $village->max_storage; ?>
        </span>
    </li>
    <li id="stockBarResource1" class="stockBarButton" title="Wood : <?=// $village->getProd('wood'); ?> Click for more information">
        <div class="begin"></div>
        <div class="middle">
            <img class="res r1Big" src="/assets/images/x.gif" alt="Lumber">
            <?php //if ($golds['b1']) echo '<img src="/assets/images/x.gif" class="productionBoost" alt="Wood Production Plus">'; ?>
            <span id="l1" class="value" style="font-size:<?= $village->wood > 9999999 ? '10px' : '12px'; ?>">
                <?= //$village->wood; ?>
            </span>
            <div class="barBox">
                <div id="lbar1" class="bar" style="width: 100%;"></div>
            </div>
            <a href="production.php?t=1" title="Wood: <?= //$village->getProd('wood'); ?> Click for more information">
                <img src="/assets/images/x.gif" alt="">
            </a>
        </div>
        <div class="end"></div>
    </li>
    <li id="stockBarResource2" class="stockBarButton" title="Clay: <?= //$village->getProd('clay'); ?> Click for more information">
        <div class="begin"></div>
        <div class="middle">
            <img class="res r2Big" src="/assets/images/x.gif" alt="Clay" />
            <?php if ($golds['b2']) echo '<img src="/assets/images/x.gif" class="productionBoost" alt="Clay Production Plus">'; ?>
            <span id="l2" class="value" style="font-size:<?= $village->clay > 9999999 ? '10px' : '12px'; ?>">
                <?= //$village->clay; ?>
            </span>
            <div class="barBox">
                <div id="lbar2" class="bar" style="width: 100%;"></div>
            </div>
            <a href="production.php?t=2" title="Clay: <?= // $village->getProd('clay'); ?> Click for more information">
                <img src="/assets/images/x.gif" alt="">
            </a>
        </div>
        <div class="end"></div>
    </li>
    <li id="stockBarResource3" class="stockBarButton" title="Iron: <?= //$village->getProd('iron'); ?> Click for more information">
        <div class="begin"></div>
        <div class="middle">
            <img class="res r3Big" src="/assets/images/x.gif" alt="Iron" />
            <?php if ($golds['b3']) echo '<img src="/assets/images/x.gif" class="productionBoost" alt="Iron Production Plus">'; ?>
            <span id="l3" class="value" style="font-size:<?= $village->iron > 9999999 ? '9px' : '11px';?>">
                <?= $village->iron; ?>
            </span>
            <div class="barBox">
                <div id="lbar3" class="bar" style="width:100%;"></div>
            </div>
            <a href="production.php?t=3" title="Iron: <?= //$village->getProd('clay'); ?> Click for more information">
                <img src="/assets/images/x.gif" alt="">
            </a>
        </div>
        <div class="end"></div>
    </li>

    <li id="stockBarGranaryWrapper" class="stock" title="Crop">
        <img class="granary" src="/assets/images/x.gif" alt="Crop" />
        <span class="value" id="stockBarGranary"><?= //$village->max_crop; ?></span>
    </li>

    <li id="stockBarResource4" class="stockBarButton">
        <div class="begin"></div>
        <div class="middle">
            <img class="res r4Big" src="/assets/images/x.gif" alt="Crop" />
            <?php if ($golds['b4']) echo '<img class="productionBoost" src="/assets/images/x.gif" alt="Crop Production Plus">'; ?>
            <span id="l4" class="value" style="font-size:<?= $village->crop > 9999999 ? '9px' : '11px'; ?>">
                <?= $village->crop; ?>
            </span>
            <div class="barBox">
                <div id="lbar4" class="bar" style="width:100%;"></div>
            </div>
            <a href="production.php?t=4" title="Crop: <?= //$village->getProd('crop'); ?> Click for more information">
                <img src="{{ Vite::asset('resources/images/x.gif') }}" alt="">
            </a>
        </div>
        <div class="end"></div>
    </li>

    <li id="stockBarFreeCropWrapper" class="stockBarButton r5">
        <div class="begin"></div>
        <div class="middle">
            <img class="res r5Big" src="{{ Vite::asset('resources/images/x.gif') }}" alt="Free crop" />
            <span id="stockBarFreeCrop" class="value" style="font-size:<?= $village->allcrop > 999999 ? '8.5px' : '11px'; ?>">
                <?= $village->allcrop; ?>
            </span>
            <a href="production.php?t=5" title="All crop: <?= $village->allcrop; ?> Click for more information">
                <img src="{{ Vite::asset('resources/images/x.gif') }}" alt="">
            </a>
        </div>
        <div class="end"></div>
    </li>
    <li class="clear">&nbsp;</li>
</ul>
<script type="text/javascript">
    let resources = {};

    resources.production = {
        "l1": <?= $village->getProd('wood'); ?>,
        "l2": <?= $village->getProd('clay'); ?>,
        "l3": <?= $village->getProd('iron'); ?>,
        "l4": <?= $village->getProd('crop'); ?>,
        "l5": 0
    };
    resources.storage = {
        "l1": <?= $village->wood; ?>,
        "l2": <?= $village->clay; ?>,
        "l3": <?= $village->iron; ?>,
        "l4": <?= $village->crop; ?>
    };
    resources.maxStorage = {
        "l1": <?= $village->max_storage; ?>,
        "l2": <?= $village->max_storage; ?>,
        "l3": <?= $village->max_storage; ?>,
        "l4": <?= $village->max_crop; ?>
    };

    $$('li.stockBarButton').each(function(element) {
        Travian.addMouseEvents(element, element);
    });

    let stockBarWarehouse = $('stockBarWarehouse');
    let stockBarGranary = $('stockBarGranary');
    let stockBarFreeCrop = $('stockBarFreeCrop');
    let numberFormatter = new Travian.Formatter({
        forceDecimal: false
    });

    stockBarWarehouse.set('html', numberFormatter.getFormattedNumber(parseInt(stockBarWarehouse.get('html'))));
    stockBarGranary.set('html', numberFormatter.getFormattedNumber(parseInt(stockBarGranary.get('html'))));
    stockBarFreeCrop.set('html', numberFormatter.getFormattedNumber(parseInt(stockBarFreeCrop.get('html'))));
</script>
