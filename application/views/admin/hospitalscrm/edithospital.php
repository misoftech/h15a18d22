

<div id="page-content">
    <div id="wrap">
    
    
    
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>admin">Dashboard</a></li>
                <li><a href="<?php echo base_url()?>admin/hospitalscrm">Hospitals</a></li>
                <li class='active'><?php echo $headline; ?></li>
            </ol>

            <h1><?php echo $headline; ?></h1> <h3> <?php echo $message?'<span style="color:green">'.$message.'</span>':''?></h3>
            <div class="options">
                <div class="btn-toolbar">
                	<a href="<?php echo base_url()?>admin/hospitalscrm" class="btn btn-default hidden-xs"><i class="fa fa-files-o"></i> All Hospitals</a>
                </div>
            </div>
        </div>





        <div class="container">
           
           
           
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4><i class="fa fa-hospital-o"></i> <span>Add Hospitals</span></h4>                         
            </div>
          <div class="panel-body collapse in">                                  
           
              
            <form method="post" enctype="multipart/form-data" >
            <input type="hidden" name="send" value="1">                        
                <div class="col-xs-6 col-sm-6 col-md-12 form-group"> 
                       
                       <span class="form-group" style="font-size: 26px;"> <?php echo isset($editdata[0]->name)?$editdata[0]->name:''; ?></span>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12"> 
             
               
                 
                <div class="col-xs-6 col-sm-6 col-md-6 form-group"> 
                    <label>Address:</label> 
                <input type="text" class="form-control" name="address" id="address" value="<?php echo isset($editdata[0]->address)?$editdata[0]->address:''; ?>" placeholder="Address" required> 
                </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 form-group">   
                <label>City</label>
               <input type="text" class="form-control" name="city" id="city" value="<?php echo isset($editdata[0]->city)?$editdata[0]->city:''; ?>" placeholder="City" required>
               </div>
                
                
            </div>    
                
            <div class="col-xs-12 col-sm-12 col-md-12"> 
             
                 <div class="col-xs-6 col-sm-6 col-md-6 form-group">   
                <label>State</label>
               <input type="text" class="form-control" name="state"  id="state" value="<?php echo isset($editdata[0]->state)?$editdata[0]->state:''; ?>" placeholder="State" required>
               </div>
                
                   <div class="col-xs-6 col-sm-6 col-md-6 form-group">   
                <label>Contact No</label>
               <input type="text" class="form-control" name="phone_no" id="phone_no" value="<?php echo isset($editdata[0]->phone_no)?$editdata[0]->phone_no:''; ?>" placeholder="Contact No" required>
               </div>
                
                
            </div>
           
            
             <div class="col-xs-12 col-sm-12 col-md-12"> 
            
                 <div class="col-xs-6 col-sm-6 col-md-6 form-group">   
                <label>Email</label>
               <input type="text" class="form-control" name="email"  id="email" value="<?php echo isset($editdata[0]->email)?$editdata[0]->email:''; ?>" placeholder="Email" required>
               </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 form-group">   
                <label>Website</label>
               <input type="text" class="form-control" name="website" id="website" value="<?php echo isset($editdata[0]->website)?$editdata[0]->website:''; ?>" placeholder="Website" required>
               </div> 
                 
                 
            </div>
            
               <div class="col-xs-12 col-sm-12 col-md-12"> 
             
                 <div class="col-xs-6 col-sm-6 col-md-6 form-group">   
                <label>Rating</label>
               <input type="text" class="form-control" name="rating"  id="rating" value="<?php echo isset($editdata[0]->rating)?$editdata[0]->rating:''; ?>" placeholder="Rating" required>
               </div>
                   <div class="col-xs-6 col-sm-6 col-md-6 form-group">   
                <label>Distance From Airport</label>
               <input type="text" class="form-control" name="distance_from_airport" id="distance_from_airport" value="<?php echo isset($editdata[0]->distance_from_airport)?$editdata[0]->distance_from_airport:''; ?>" placeholder="Distance From Airport" required>
               </div>  
                   
            </div>
            
                    <div class="col-xs-12 col-sm-12 col-md-12"> 
             
                 <div class="col-xs-6 col-sm-6 col-md-6 form-group">   
                <label>Emergency Services</label>
               <input type="text" class="form-control" name="emergency_services"  id="emergency_services" value="<?php echo isset($editdata[0]->emergency_services)?$editdata[0]->emergency_services:''; ?>" placeholder="Emergency Services" required>
               </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 form-group">   
                <label>Hospital Type</label>
               <input type="text" class="form-control" name="hospital_type" id="hospital_type" value="<?php echo isset($editdata[0]->hospital_type)?$editdata[0]->hospital_type:''; ?>" placeholder="Hospital Type" required>
               </div>     
                        
                        
            </div>
            <input type="hidden" name="countofspecificaiton" id="countofspecificaiton" value="<?php echo  count($speciliztion); ?>" />
            <input type="hidden" name="sele_specificaiton" id="sele_specificaiton" value="<?php echo  $editdata[0]->specialization; ?>" />
             <input type="hidden" name="sp" id="sp" value="<?php echo  $listspe; ?>" />
         
                    <div class="col-xs-12 col-sm-12 col-md-12"> 
              
                 <div class="col-xs-6 col-sm-6 col-md-12 form-group">   
                     
                     <label>Specialization <span style="font-size: 8px;">(Add comma ( , ) seprated value )</span></label>
                          <select name="specialization[]" multiple id="specialization">
                    <?php  foreach($speciliztion as $val ){  ?>
                        
                             
                          <option value="<?php echo $val->id;?>"  ><?php echo $val->sepcialization ;?></option>
                    <?php }  ?>

                  </select>
                     
<!--               <input type="text" class="form-control" name="specialization"  id="specialization" value="<?php //echo isset($editdata[0]->specialization)?$editdata[0]->specialization:''; ?>" placeholder="Specialization" required>
               </div>-->
                        
<!--                    <div class="col-xs-6 col-sm-6 col-md-6 form-group">   
                <label>Hospital Image</label>
               <input type="file" class="form-control" name="hospital_image" id="hospital_image" value="" placeholder="Hospital image" required>
               </div>      -->
            </div>
            
                <div class="col-xs-12 col-sm-12 col-md-12"> 
             
                 <div class="col-xs-6 col-sm-6 col-md-6 form-group">   
               </div>
            </div>
                        <input type="hidden" id="pagename" name="pagename" value="<?php echo $this->uri->segment(3)?$this->uri->segment(3):'index';?>"/>
            <div class="col-xs-12 col-sm-12 col-md-12 mt20">    
                <input style="width: 20%" type="submit" class="btn btn-lg btn-success pull-right" value="Save"> 
            </div>
            
            </form>
              
          </div>
          
        </div>
    </div>
</div>
           
           
           

        </div> <!-- container -->
        
        
        
        
    </div> <!--wrap -->
</div> <!-- page-content -->




<!---popup---->
 <div id="new_bankpop" tabindex="-1" class="modal fade"   role="dialog" style="z-index: 1400;">
       <div class="modal-dialog modal-lg" style="width:30%;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="border-bottom:0;">
            
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="text-align:center;border-bottom: 2px;">
              
              ADD NEW HOSPITAL
              
          </h4>
          <hr>
        </div>
    <div class="modal-body">
  
       
          
        <div class="row">
        <div class="form-group">
          
            <form name="ne_b" id="ne_b">
                <div class="col-md-12 errorpopup" id="response" style="font-size:20px;">   </div>
        <div class="col-md-12">
        <input class="form-control" type="text" name="n_b_name" id="n_b_name" required  />
        </div>
       
           <div class="col-md-12 mt20">
               <button type="button" class="form-control btn btn-success" id="ad_n_b"> SAVE </button>
        </div> 
            
            </form>
            </div></div>
       
    
    </div>  
    </div>  
    </div>  
    </div>