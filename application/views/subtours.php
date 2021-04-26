<?php $this->load->view('templates/header'); ?>


<!-- Popular Tours Area Start -->
<section class="peulis-popular-tours-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-heading">
                    <h2>Popular tours</h2>
                    <p>Lorem ipsum dolor sit amet, conseetuer adipiscing elit. Aenan comdo igula eget. Aenean massa cum sociis Theme natoque.</p>
                </div>
            </div>
        </div>
        <div class="row">

            <?php foreach ($subtours as $subtour) : ?>
                <div class="col-lg-4">
                    <div class="single-popular-tour">
                        <div class="popular-tour-image">
                            <img src="<?php echo base_url('uploads/tours/') . $subtour->filename; ?>" alt="Popular Tours" />
                            <div class="popular-tour-hover">
                                <ul>
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="popular-tour-desc">
                            <div class="tour-desc-top">
                                <h3><a href="<?php echo base_url('home/tourdetails/') . $subtour->id; ?>"><?php echo $subtour->tourname_ge; ?></a></h3>
                                <div class="tour_duration">
                                    <p>
                                        <i class="fa fa-hourglass-half"></i>
                                        <?php echo $subtour->duration_ge; ?>
                                    </p>
                                </div>
                                <div class="tour-desc-heading">
                                    <div class="tour-rating">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                    <div class="tour_feature">
                                        <a href="#"><i class="fa fa-plane"></i></a>
                                        <a href="#"><i class="fa fa-building-o"></i></a>
                                        <a href="#"><i class="fa fa-cutlery"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="tour-desc-bottom">
                                <div class="tour-details">
                                    <a href="<?php echo base_url('home/tourid/') . $subtour->id; ?>"><i class="fa fa-flag"></i> Book Now</a>
                                </div>
                                <div class="tour-desc-price">
                                    <p><?php echo $subtour->price; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- Popular Tours Area End -->



<?php $this->load->view('templates/footer'); ?>