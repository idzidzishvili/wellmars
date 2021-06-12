<section class="peulis-popular-tours-area section_70">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
               <div class="site-heading">
                  <h2><?php echo lang('orders');?></h2>
               </div>
         </div>
      </div>
      <div class="row mb-5 orders-table">
         <div class="col-lg-3 profile-sidebar">
            <div class="container">
               <div class="row bg-white">                  
                  <div class="img-container col-md-6 col-lg-12 d-flex justify-content-center">
                     <img src="<?php echo base_url('/uploads/users/'.(isset($userData->avatar)?$userData->avatar:'blankAvatar.jpg'));?>">
                  </div>
                  <ul class="col-md-6 col-lg-12 px-lg-0">
                     <li><a href="<?php echo site_url('profile/index');?>"><?php echo lang('profile');?></a></li>
                     <li class="active"><?php echo lang('orders');?></li>
                     <li><a href="<?php echo site_url('auth/logout');?>"><?php echo lang('logout');?></a></li>
                  </ul>                
               </div>
            </div>
         </div>
         <div class="col-lg-9 login-box w-100">
            <?php if($userOrders):?>
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col"><?php echo lang('startDate');?></th>
                        <th scope="col"><?php echo lang('endDate');?></th>
                        <th scope="col"><?php echo lang('roomNumber');?></th>
                        <th scope="col"><?php echo lang('numberOfPersons');?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($userOrders as $i=>$userOrder):?>
                     <tr>
                        <?php $s = explode("-", $userOrder->startdate); $e = explode("-", $userOrder->enddate); ?>                        
                        <th scope="row"><?php echo $i+1;?></th>
                        <td><?php echo $s[2].'.'.$s[1].'.'.$s[0];?></td>
                        <td><?php echo $e[2].'.'.$e[1].'.'.$e[0];?></td>
                        <td><?php echo $userOrder->room_id;?></td>
                        <td><?php echo $userOrder->num_persons;?></td>
                     </tr>
                     <?php endforeach;?>
                  </tbody>
               </table>
            <?php else:?>
               <p>There is no orders for you</p>
            <?php endif;?>
         </div>
      </div>
   </div>
</section>