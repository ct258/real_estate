@if ($convenience)

<h3 class="sl-sp-title">@lang('convenient')</h3>
<div class="row property-details-list">
    <?php if ($convenience->convenience_air_conditioning!=0):?>
    <p class='col-xs-12 col-sm-4'><i class='fas fa-wind'></i>
        @lang('Air Conditioning')</p><?php endif; ?>

    <?php  if ($convenience->convenience_BBQ_area!=0) :?>

    <p class='col-xs-12 col-sm-4'><i class='fas fa-dumpster-fire'></i> @lang('BBQ Area')
    </p>
    <?php endif; ?>

    <?php  if ($convenience->convenience_CCTV!=0):?>

    <p class='col-xs-12 col-sm-4'><i class='fas fa-video'></i> @lang('CCTV')</p>
    <?php endif; ?>

    <?php  if ($convenience->convenience_concierge!=0):?>

    <p class='col-xs-12 col-sm-4'><i class='fas fa-concierge-bell'></i>
        @lang('Concierge')</p>
    <?php endif; ?>

    <?php  if ($convenience->convenience_fitness!=0):?>

    <p class='col-xs-12 col-sm-4'><i class='fas fa-dumbbell'></i> @lang('Fitness')</p>
    <?php endif; ?>

    <?php  if ($convenience->convenience_garden!=0):?>

    <p class='col-xs-12 col-sm-4'><i class='fas fa-seedling'></i> @lang('Garden')</p>
    <?php endif; ?>

    <?php  if ($convenience->convenience_library!=0):?>

    <p class='col-xs-12 col-sm-4'><i class='fa fa-book'></i> @lang('Library')</p>
    <?php endif; ?>

    <?php  if ($convenience->convenience_mountain_view!=0):?>

    <p class='col-xs-12 col-sm-4'><i class='fas fa-mountain'></i> @lang('Mountain View')
    </p>
    <?php endif; ?>

    <?php  if ($convenience->convenience_parking!=0):?>
    <p class='col-xs-12 col-sm-4'><i class='fas fa-car'></i> @lang('Parking')</p>
    <?php endif; ?>


    <?php  if ($convenience->convenience_playground!=0):?>
    <p class='col-xs-12 col-sm-4'><i class='fas fa-campground'></i> @lang('Playground')
    </p>
    <?php endif; ?>


    <?php  if ($convenience->convenience_ocean_view!=0):?>
    <p class='col-xs-12 col-sm-4'><i class='fas fa-umbrella-beach'></i> @lang('Sea/Ocean
        View')</p>
    <?php endif; ?>


    <?php  if ($convenience->convenience_security!=0):?>
    <p class='col-xs-12 col-sm-4'><i class='fas fa-user-shield'></i> @lang('Security')
    </p>
    <?php endif; ?>

    <?php  if ($convenience->convenience_swimming_pool!=0):?>
    <p class='col-xs-12 col-sm-4'><i class='fas fa-swimming-pool'></i> @lang('Swimming
        Pool')</p>
    <?php endif; ?>

    <?php  if ($convenience->convenience_tennis!=0):?>
    <p class='col-xs-12 col-sm-4'><i class='fas fa-baseball-ball'></i> @lang('Tennis')
    </p>
    <?php endif; ?>


    <?php  if ($convenience->convenience_wifi!=0):?>
    <p class='col-xs-12 col-sm-4'><i class="fas fa-wifi"></i> @lang('Wi Fi')</p>
    <?php endif; ?>

    <?php  if ($convenience->convenience_tivi!=0):?>
    <p class='col-xs-12 col-sm-4'><i class='fas fa-tv'></i> @lang('Tivi')</p>
    <?php endif; ?>

</div>
@endif