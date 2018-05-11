<!-- <div class="album py-5 bg-light"> -->
  <div class='container'>
    <ul class="nav nav-pills justify-content-center mb-4" id="categories">
      <?php
      echo "
      <li class='nav-item'>
        <a class='nav-link active filter_link' data-filter='all' href=''>Alle</a>
      </li>";
      foreach ($args['categories'] as $key => $category) {
        echo "
        <li class='nav-item'>
          <a class='nav-link filter_link' data-filter='$category' href=''>$category</a>
        </li>";
      }
      ?>
    </ul>
    <div class='row'>
      <?php

      foreach ($args['products'] as $key => $value) {

      ?>
      <div class='col-md-4 product <?php echo ucfirst(strtolower($value->{'classification.group'})); ?>' itemscope itemtype='http://schema.org/Product'>
        <div class='card mb-4 box-shadow'>
          <div style='height: 225px; background-size: cover; overflow: hidden; display: block;'>
            <img class='card-img-top' alt="<?php echo $value->{'variations.name'}; ?>" src="https://i.otto.de/i/otto/<?php echo $value->{'variations.images.id'}; ?>" data-holder-rendered='true' itemprop='image'>
          </div>
          <div class='card-body'>
            <p class='card-text' itemprop='name'>
              <?php echo $value->{'variations.name'}; ?>
            </p>
            <div class='d-flex justify-content-between align-items-center'>
              <div class='btn-group'>
                <a role='button' class='btn btn-sm btn-outline-secondary' href="https://www.otto.de/p/<?php echo $value->{'id'}."/#".$value->{'first#variations.variationId'}; ?>" target='_blank'>Erhältlich bei OTTO</a>
              </div>
              <small class='text-muted' itemprop='offers' itemscope itemtype='http://schema.org/Offer'>
                <meta itemprop='priceCurrency' content='EUR' />
                ab <span itemprop='price'><?php echo substr($value->{'min#variations.retailPrice'}, 0, -2).".".substr($value->{'min#variations.retailPrice'}, -2); ?></span> &euro;</small>
            </div>
          </div>
        </div>
      </div>
      <?php

      }

      ?>
    </div>
  </div>
<!-- </div> -->
<script>
$(document).ready(function(){
  // cache collection of elements so only one dom search needed
  var $prdcts = $('.product');

  $('#categories li a').click(function(e){
      e.preventDefault();
      console.log(e);
      // reset the active class on all the buttons
      $('#categories li a').removeClass('active');
      // update the active state on our clicked button
      $(this).addClass('active');
      // get the category from the attribute
      var filterVal = $(this).data('filter');

      if(filterVal === 'all'){
        $prdcts.show();
      }else{
         // hide all then filter the ones to show
         $prdcts.hide().filter('.' + filterVal).show();
      }
  });
});

</script>
