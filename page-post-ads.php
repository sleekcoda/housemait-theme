<?php
    /**
     * The template for displaying all pages
     *
     * This is the template that displays all pages by default.
     * Please note that this is the WordPress construct of pages
     * and that other 'pages' on your WordPress site may use a
     * different template.
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package Housemait
     */
    if(!current_user_can('edit_published_hmposts')):
        wp_redirect(wp_login_url());
        exit();
    endif;
    get_header();
   // wp_enqueue_script('media-upload-js');
    wp_enqueue_script('create-hmpost');


     /**
     * Apartment properties
     */
    $post_id_var  =         (get_query_var('ads_id','create_new_hmpost')==='create_new_hmpost') ? false : get_query_var('ads_id','create_new_hmpost');

    $ads_id =               (get_post_field('post_author',$post_id_var,'edit') == get_current_user_id() && $post_id_var !== false) ? $post_id_var : false ;
    
    $budget =               get_post_meta($ads_id, 'budget', true);
    $date_relocating =      get_post_meta($ads_id, 'date_relocating', true);

    $apartment_category =   get_post_meta($ads_id, 'apartment_category', true);
    $bedroom =              get_post_meta($ads_id, 'bedroom', true);
    $bathroom =             get_post_meta($ads_id, 'bathroom', true);
    $total_room_number =    get_post_meta($ads_id, 'total_room_number', true);
    $location =             get_post_meta($ads_id, 'location', true);
    $post_photo =           get_post_meta($ads_id,'post_photos',true);
    /**
     * About me
    */
    $need_category =        get_post_meta($ads_id, 'need_category', true); 
    $my_occupation =        get_post_meta($ads_id, 'my_occupation', true); //My occupation of the preffered roomate
    $my_gender =            get_post_meta($ads_id, 'my_gender', true); //Gender of the preffered roomate
    
    /**
     * Preffered roommate candidate
     */
    $hm_occupation = get_post_meta($ads_id, 'hm_occupation', true); //Religion of the preffered roomate
    $hm_gender = get_post_meta($ads_id, 'hm_gender', true); //Gender of the preffered roomate
	global $wp;  
    
    ?>

<h2 class="page-title" style="padding-left:15px;">Post a free ad</h2>
<div class="row">
    <div class="col-md">
        <form id="form-new-hmpost">
            
                <p class="form-set">
                    <label for="title">Ad Title</label><br>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title of your add" value="<?php echo ($ads_id === false) ? '' : get_post_field('post_title',$ads_id,'edit'); ?>" style="width:100%;" required>
                </p><!-- Title -->
                <div class="row">
                    <div class="col-md form-set">
                        <legend><label for="description">Description</label></legend>
                        <p>
                            <textarea name="description" id="description" cols="30" rows="7" required><?php echo get_post_field('post_content',$ads_id,'edit'); ?></textarea>
                        </p><!-- description -->

                        <p>
                            <label for="my_gender">I am</label>
                            <select class="form-control" name="my_gender" id="my_gender">
                                <option>-Gender-</option>
                                <option <?php echo ($my_gender === 'male') ? 'selected' : ''; ?> value="male">Male</option>
                                <option <?php echo ($my_gender === 'female') ? 'selected' : ''; ?> value="female">Female</option>
                            </select>
                            <select class="form-control" name="my_occupation" id="my_occupation">
                                <option value="">-Occupation-</option>
                                <option <?php echo ($my_occupation === 'student') ? 'selected' : ''; ?> value="student">Student</option>
                                <option <?php echo ($my_occupation === 'professional') ? 'selected' : ''; ?> value="professional">Professional</option>
                            </select><br>

                            <label for="hm_gender">Looking for</label>
                            <select class="form-control" name="hm_gender" id="hm_gender">
                                <option value="">Gender</option>
                                <option <?php echo ($hm_gender === 'male') ? 'selected' : '' ;?> value="male">Male</option>
                                <option <?php echo ($hm_gender === 'female') ? 'selected' : '' ;?> value="female">Female</option>
                                <option <?php echo ($hm_gender === 'any') ? 'selected' : '' ;?> value="any">Male/Female</option>
                            </select>
                            <select class="form-control" name="hm_occupation" id="hm_occupation" required>
                                <option value="">-Occupation-</option>
                                <option <?php echo ($hm_occupation === 'student') ? 'selected' : ''?> value="student">Student</option>
                                <option <?php echo ($hm_occupation === 'professional') ? 'selected' : ''?> value="professional">Professional</option>
                                <option <?php echo ($hm_occupation === 'any') ? 'selected' : ''?> value="any">Student/Professional</option>
                            </select>
                        </p> 

                    </div>
                    <div class="col-md form-set">
                        <legend><label for="">Requirements</label></legend>
                    
                        <p>
                            <label for="need_category">I need</label>
                            <select class="form-control" name="need_category" id="need_category">
                                <option value="">--Select--</option>
                                <option <?php echo ($need_category === 'house' ) ? 'selected' : ''; ?> value="house">An Apartment</option>
                                <option <?php echo ($need_category === 'housemait' ) ? 'selected' : ''; ?> value="housemait">A roommate</option>
                                <option <?php echo ($need_category === 'both' ) ? 'selected' : ''; ?> value="both">Both</option>
                            </select>
                            &nbsp;
                            <label for="location-2">Location</label>
                            <input type="text" class="form-control" name="location" id="location-2" value="<?php echo $location; ?>" autocomplete="on" required>
                            <input type="hidden" name="action" value="<?php echo ($ads_id === false) ? 'create_new_hmpost' : 'update_hmpost_post' ; ?>" />
                        </p>
                        
                        <p>
                            <label for="budget">With budget:</label>
                            <input type="number" name="budget" id="budget" min="60000" value="<?php echo $budget; ?>" required>
                        
                            <label for="date_relocating">Moving on</label>
                            <input type="date" name="date_relocating" id="date_relocating" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" min="<?php echo date('Y-j-m',time()) ?>" value="<?php echo $date_relocating; ?>" required>
                            
                        </p>
                        <p>
                            <label for="apartment_category">Accomodation type</label> 
                            <select class="form-control" name="apartment_category" id="apartment_category" required>
                                <option value="">--Select--</option>
                                <option <?php echo ($apartment_category === 'Bungalow')?  'selected':null; ?> value="Bungalow" >Bungalow</option>
                                <option <?php echo ($apartment_category === 'Duplex')?  'selected':null; ?> value="Duplex" >Duplex</option>
                                <option <?php echo ($apartment_category === 'Flat')?  'selected':null; ?> value="Flat" >Flat</option>
                                <option <?php echo ($apartment_category === 'House')?  'selected':null; ?> value="House" >House</option>
                                <option <?php echo ($apartment_category === 'Self Contain')?  'selected':null; ?> value="Self Contain"  >Self Contain</option>
                                <option <?php echo ($apartment_category === 'Shop')?  'selected':null; ?> value="Shop">Shop</option>
                            </select>
                        </p>
                        <p>
                        
                            <label for="total_room_number">Total Rooms</label>
                            <select class="form-control" name="total_room_number" id="total_room_number" required>
                                <option value="">--Select--</option>
                                <option value="1"<?php echo ($total_room_number === '1') ?  'selected':null; ?> >1</option>
                                <option value="2"<?php echo ($total_room_number === '2') ?  'selected':null; ?>>2</option>
                                <option value="3"<?php echo ($total_room_number === '3') ?  'selected':null; ?>>3</option>
                                <option value="4"<?php echo ($total_room_number === '4') ?  'selected':null; ?>>4</option>
                                <option value="5"<?php echo ($total_room_number === '5') ?  'selected':null; ?>>5</option>
                                <option value="6"<?php echo ($total_room_number === '6') ?  'selected':null; ?>>6</option>
                                <option value="7"<?php echo ($total_room_number === '7') ?  'selected':null; ?>>7</option>
                                <option value="8"<?php echo ($total_room_number === '8') ?  'selected':null; ?>>8</option>
                                <option value="9"<?php echo ($total_room_number === '9') ?  'selected':null; ?>>9</option>
                                <option value="10"<?php echo ($total_room_number === '10') ?  'selected':null; ?>>10</option>
                                <option value="11"<?php echo ($total_room_number === '11') ?  'selected':null; ?>>11</option>
                                <option value="12"<?php echo ($total_room_number === '12') ?  'selected':null; ?>>12</option>
                            </select>
                            <!--- Total rooms --->
                            
                            <label for="bedroom">Bedroom</label>
                            <select class="form-control" name="bedroom" id="bedroom" required>
                                <option value="">--Select--</option>
                                <option value="1"<?php echo ($bedroom === '1') ?  'selected':null; ?> >1</option>
                                <option value="2"<?php echo ($bedroom === '2') ?  'selected':null; ?>>2</option>
                                <option value="3"<?php echo ($bedroom === '3') ?  'selected':null; ?>>3</option>
                                <option value="4"<?php echo ($bedroom === '4') ?  'selected':null; ?>>4</option>
                                <option value="5"<?php echo ($bedroom === '5') ?  'selected':null; ?>>5</option>
                                <option value="6"<?php echo ($bedroom === '6') ?  'selected':null; ?>>6</option>
                            </select>
                            <!-- Bedrooms -->
                            
                            <label for="bathroom">Toilet/Bathroom</label>
                            <select class="form-control" name="bathroom" id="bathroom">
                                <option value="">--Select--</option>
                                <option value="1"<?php echo ($bathroom === '1')?  'selected':null; ?>>1</option>
                                <option value="2"<?php echo ($bathroom === '2')?  'selected':null; ?>>2</option>
                                <option value="3"<?php echo ($bathroom === '3')?  'selected':null; ?>>3</option>
                                <option value="4"<?php echo ($bathroom === '4')?  'selected':null; ?>>4</option>
                                <option value="5"<?php echo ($bathroom === '5')?  'selected':null; ?>>5</option>
                                <option value="6"<?php echo ($bathroom === '6')?  'selected':null; ?>>6</option>
                            </select>
                            <!-- Toilet / Bathrooom -->      

                        </p>
                        <p>
                            
                        <?php if($ads_id !== false):  ?>
                                <input type="hidden" name="ads_id" value="<?php  echo $ads_id; ?>">
                        <?php endif; ?>
                            <?php wp_nonce_field( 'new-hmpost','new-hmpost' ); ?>
                        </p><!-- Location -->

                    </div> <!-- .col-md requirements-->

                
                </div><!-- .row -->
                <div class="row">
                    <div class="col-12">

                        <p class="form-notice"></p>
                        <div class="image-form">
                            <p class="image-notice"></p>
                            <p><label for="photo_file_selector">Add <span>more</span> photo <input id="photo_file_selector" type="file" name="async-upload" class="image-file" accept="image/*" required></label></p>
                            <ul class="image-preview">
                                <?php if(!empty($post_photo)): foreach($post_photo as $photo_id): ?>

                                <li data-image-id="<?php echo $photo_id; ?>"><a title="Delete photo" href="#<?php echo $photo_id; ?>" class="btn-delete-image">
                                    <i class="fa fa-times"></i>
                                    <img src="<?php echo wp_get_attachment_url($photo_id); ?>" style="width:150px;"></a>
                                    <input type="hidden" id="<?php echo $photo_id; ?>" name="photo_gallery[]" value="<?php echo $photo_id; ?>">
                                </li>

                                    <?php endforeach;  endif;?>
                                    
                            </ul>
                        </div><!-- image-form -->
                        
                    </div><!-- col-12 -->
                </div>
                <div class="notification error"></div>
                <div class="notification success"></div>
                <div class="row" style="margin-top:1em;">
                    <div class="col-md">
                        <button type="submit" class="btn" style="margin-left:0;"><?php echo ($ads_id === false) ? 'Post Ads' : 'Update' ; ?> </button><span class="img-placeholder loading" style=""></span>
                        <p></p>
                    </div>
                </div><!-- .row -->
        </form>    
    </div><!--- form container --->
    
        <?php get_sidebar('admin'); ?>

</div>



<?php
    get_footer();