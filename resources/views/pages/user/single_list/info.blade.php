@if ($convenience)

<div class="col-sm-3">
    <?php if ($convenience->convenience_facade!=0)
                                        ?>@lang('facade'): <?php
                                        echo $convenience->convenience_facade;
                                        echo "m";
                                        ?>
</div>
<div class="col-sm-3">
    <?php if ($convenience->convenience_way!=0)
                                        ?>@lang('way'): <?php
                                        echo $convenience->convenience_way;
                                        echo "m";
                                        ?>
</div>
<div class="col-sm-3"></div>
<div class="col-sm-3"></div>
<div class="col-sm-3">
    <?php if ($convenience->convenience_floor!=0)
                                         ?><i class='fas fa-building'></i> <?php
                                        echo $convenience->convenience_floor;
                                        ?>
</div>
<div class="col-sm-3">
    <?php if ($convenience->convenience_bedroom!=0)
                                        ?><i class='fa fa-bed'></i> <?php
                                        echo $convenience->convenience_bedroom;
                                        ?>
</div>
<div class="col-sm-3">
    <?php if ($convenience->convenience_bathroom!=0)
                                       ?><i class='fa fa-bath'></i> <?php
                                        echo $convenience->convenience_bathroom;
                                        ?>
</div>
@endif