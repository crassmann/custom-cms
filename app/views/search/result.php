<!-- <div class="album py-5 bg-light"> -->
  <div class='container'>
    <div class='row'>
      <?php

      if(empty($args['products'])) {
        echo "<h1>Leider konnten wir für die Suchanfrage keinen Treffer finden.</h1>";
      } else {

        foreach ($args['products'] as $key => $value) {

        ?>
        <div class='col-md-4' itemscope itemtype='http://schema.org/Product'>
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
                  <!-- <button type='button' class='btn btn-sm btn-outline-secondary'>Mehr</button> -->
                  <a role='button' class='btn btn-sm btn-outline-secondary' href="https://www.otto.de/p/<?php echo $value->{'id'}; ?>" target='_blank'>Erhältlich bei OTTO</a>
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
      }
      ?>
    </div>
  </div>
<!-- </div> -->
