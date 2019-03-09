<?php
    /**
     *
     * @package Housemait
     */
    if(!current_user_can('edit_published_hmposts')):
        wp_redirect(wp_login_url());
        exit();
    endif;
    get_header();
    wp_enqueue_script('update-users');
    $user = wp_get_current_user();

?>
<div class="container">
    <h2 class="page-title">User Profile</h2>
    <div class="row">
        <div class="col-md">
            <form id="form-update-user">

                <div class="row">
                    <div class="col-md-4 offset-md-8">
                        <div class="image-form">
                            <p class="image-notice"></p>

                            <p>
                                <label for="photo_file_selector">Edit Avata</label>
                                <input id="photo_file_selector" type="file" name="async-upload" class="image-file" accept="image/*" style="display:none;">
                            </p>

                            <div id="image-preview">
                                <input type="hidden" name="avata" value="<?php echo get_user_meta($user->ID,'avata',true); ?>">
                            </div>
                        </div>

                        
                    </div>
                    <div class="col-md">
                        <label for="firstname">Firstname</label><br>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $user->user_firstname; ?>"required>
                    </div>
                    <div class="col-md">
                        <label for="lastname">Lastname</label><br>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $user->user_lastname; ?> "required><br>
                    </div>

                </div>
                <!-- First and last name  .row --->
                
                <div class="row">
                    <div class="col-md">
                        <label for="username">Username</label><br>
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $user->user_nicename; ?>" required>
                    </div>
                    <div class="col-md">
                        <?php $gender = get_user_meta($user->ID, 'gender', true); ?>
                        <label for="gender">Gender</label><br>
                        <select class="form-control" name="gender" id="gender" required>
                            <option value="">--Select--</option>
                            <option <?php echo ($gender === 'male' ) ? 'selected' : '' ; ?> value="male">Male</option>
                            <option <?php echo ($gender === 'female' ) ? 'selected' : '' ; ?> value="female">Female</option>
                        </select><br>
                    </div>
                    <div class="col-md-12">
                        <label for="email">Email Address</label>
                        <input value="<?php echo $user->user_email; ?>" type="email" name="email" id="email" class="form-control" required><br>
                    </div>
                    <div class="col-12">
                        <div class="notification error"></div>
                        <div class="notification success"></div>
                        
                        <input type="hidden" name="action" value="update_user_profile">
                        <?php wp_nonce_field('update_user','update_user'); ?>
                        <button type="submit">Update Profile</button> <span class="img-placeholder loading" style=""></span>
                    </div>
                </div>
            </form>    
        </div><!--- form container --->
        <?php get_sidebar('admin'); ?>
        <!--- Sidebar container --->
    </div>

</div>



<?php
    get_footer();