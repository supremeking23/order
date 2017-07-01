                                           <div class="form-group pull-left">
                                                    <label  for="profile">Profile Picture</label> 
                                                    
                                                    <input type="hidden" value="<?php echo $admins['admin_profile']?>" name="image_name">
                                                    <input type="file" name="c_image"
                                                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >
                                                   
                                                </div>

                                                    <div class="form-group pull-right"> 
                                                        <img  id="image" class="img-rounded" alt="your image" width="300" height="180" src="admin_images/<?php echo $admins['admin_profile']?>" />
                                                    </div>





                                                    0 for pending
                                                    1 for approve
                                                    2 for delete
                                                    3 for disapprove
