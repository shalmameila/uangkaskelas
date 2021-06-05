 <div class="row">
     <div class="col-sm-12">
         <?php $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); ?>
         <div class="profile-bg-picture" style="background-image:url('<?php echo base_url('assets/images/profil/') . $data['user']['image'] ?>')">
             <span class="picture-bg-overlay"></span><!-- overlay -->
         </div>

         <div class="profile-user-box ">
             <div class="row">
                 <div class="col-sm-6">
                     <?php $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); ?>
                     <span class="pull-left m-r-15"><img src="<?php echo base_url('assets/images/profil/') . $data['user']['image'] ?>" alt="" class="thumb-lg rounded-circle"></span>
                     <div class="media-body">
                         <h4 class="m-t-5 m-b-5 font-18 ellipsis">
                             <?php $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                                echo $data['user']['nama']; ?>
                         </h4>
                         <p class="font-13"> <?= $data['user']['email']; ?></p>
                         <p class="text-muted m-b-0"><small>Bergabung sejak <?= date('d F Y', $data['user']['data_created']) ?></small></p>
                         <p>
                             <?= $this->session->flashdata('update'); ?>
                             <?= $this->session->flashdata('sandi'); ?>

                         </p>

                     </div>
                 </div>