<!-- Händler sperren -->
<div class="modal fade" id="userBlock" tabindex="-1" role="dialog" aria-labelledby="userBlockLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form action="../updateStatus" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="userBlockLabel"><i class="fa fa-retweet"></i> Update Status</h4>
      </div>
      <div class="modal-body">
        <h2>Update Status?</h2>  
        
              <input type="hidden" name="send" value="setstatus">              
              <input type="hidden" name="appid" id="cid" value="<?php echo $apply[0]->app_id;?>">
              <select class="form-control " name="status" onclick="application(this)">
                  <option value="0">New</option>
                  <option value="1">In Progress</option>
                  <option value="2">Confirmed/Approved</option>
                  <option value="3">Rejected</option>
                  <option value="4">Cloesd</option>
              </select>  

              <script type="text/javascript">
              function application(att)
              {
                var val = att.options[att.selectedIndex].value;

                document.getElementById("embId").style.display = val == '1' ? "block" : 'none';
                document.getElementById("visaId").style.display = val == '2' ? "block" : 'none';
                
                if(val == '1')
                {
                  console.log(val);
                  $('.visaid').removeAttr("required");
                  $('.embid').attr("required", "required");
                  
                }else{
                  if(val == '2'){
                    console.log(val);
                    $('.embid').removeAttr("required");
                    $('.visaid').attr("required", "required");
                  }else{
                    console.log(val);
                  }
                }


              }
                
              </script>
              <div id="embId" style="display: none;">
                
                <br>
                <input class="form-control embid" name="embassy_id" type="text" placeholder="Enter Embassy Application Id" >
              </div>
              <div id="visaId" style="display: none;">
                
                <br>
                <input class="form-control visaid" name="visa_id" type="text" placeholder="Enter Visa Id" >
              </div>

      </div>
      <div class="modal-footer">          
              <a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>        
              <button type="submit" class="btn btn-success">Update Status</button>        
         
      </div>
    </div>
   </form>
  </div>
</div>



<style type="text/css">
  .bold500{
    font-weight: 500;
    color: #000;
  }
</style>





<div id="page-content">
    <div id="wrap">
    
    
    
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="../../">Dashboard</a></li>
                <li><a href="../">All Applies</a></li>
                <li class='active'><?php echo $headline;?> ID: <?php echo $apply[0]->app_id;?></li>
            </ol>

            <h1><?php echo $headline;?></h1>
            <?php if($apply[0]->emp_working==""){}else{ ?>
            <div class="col-md-4 col-xs-12"><p style="margin: 6% 0 0 10%;"><small style="padding: 4px;" class="alert alert-info"><?php echo $apply[0]->emp_working; ?> is working on this profile</small></p></div>
            <?php } ?>
            <div class="options">
                <div class="btn-toolbar">                    
                    <a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#userBlock"><i class="fa fa-retweet"></i> <span class="">Update Status</span></a>
                    <a href="mailto:<?php echo $apply[0]->email;?>" class="btn btn-success pull-right"><i class="fa fa-envelope"></i> <span class="hidden-xs">Contact Applicant</span></a>
                    <a href="../../../dashboard/visapdf/<?php echo $apply[0]->id;?>" class="btn btn-info" style="margin-right: 5px;"><i class="fa fa-print"></i> <span class="">Print</span></a>             
                </div>
            </div>
        </div>





        <div class="container">
    
           
                  
                         
                                
                                       
                                              
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h5 style="color:#ffffff"><i class="fa fa-user"></i> <?php echo $apply[0]->given_name;?> - <?php echo $apply[0]->visa_type;?></h5>                  
            </div>
          <div class="panel-body collapse in">                                  
            
            
            <div class="row">
            
            
              <div class="col-xs-12 col-sm-3 col-md-3 text-center">
                  <img style="width:180px;height:180px;" src="<?php echo base_url()."assets/img/photos/".$apply[0]->picture; ?>" alt="<?php echo $apply[0]->given_name." Image";?>" title="<?php echo $apply[0]->given_name." Image";?>">
              </div>
              
              <div class="col-xs-12 col-sm-9 col-md-9">
                  <p><b class="bold500">Name:</b> <?php echo $apply[0]->given_name;?></p>
                  <p><b class="bold500">Visa Type:</b> <?php echo $apply[0]->visa_type;?></p>
                  <p><b class="bold500">Status:</b>                   
                  <?php 
                    if($apply[0]->status=="0"){ 
                        echo "New Applicant";
                    }elseif($apply[0]->status=="1"){ 
                        echo "In Progress";
                    }elseif($apply[0]->status=="2"){ 
                        echo "Confirmed";
                    }elseif($apply[0]->status=="3"){ 
                      echo "Rejected";
                    }elseif($apply[0]->status=="4"){ 
                      echo "Closed";
                    }
                  ?>
                  
                  </p>
                  <p><b class="bold500">Apply Date:</b> <?php echo date('d-m-Y', $apply[0]->apply_date);?></p>
                  <p><b class="bold500">MIC Apply ID:</b> <?php echo $apply[0]->app_id;?></p>
                  <p><b class="bold500">Embassy App ID:</b> 
                  <?php if($apply[0]->embassy_id==""){
                    echo "No Embassy ID";
                  } else{
                  echo $apply[0]->embassy_id;
                  }
                  ?></p>
                  <p><b class="bold500">Visa ID:</b> 
                  <?php if($apply[0]->visa_id==""){ 
                      echo "No Visa ID";
                  }else{
                      echo $apply[0]->visa_id;
                  }
                      
                  ?>
                  
                  
                  
                  </p>
              </div>
               
             
              
              </div>
              
          </div>          
        </div>
    </div>
</div>                                                       
                                                            
                                                                   
                                                                          
                                                                                 
                                                                                        
                                                                                               
                                                                                                      
                                                                                                             
                                                                                                                           
           
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h5 style="color:#ffffff"><i class="fa fa-user"></i> <?php echo $apply[0]->given_name;?></h5>                  
            </div>
          <div class="panel-body collapse in">                                  
            
            
            <div class="row">
            
            
              <div class="col-xs-12 col-sm-4 col-md-4">
                  <p><b class="bold500">Country you are applying visa from:</b> <?php echo $apply[0]->applying_country;?></p>                  
                  <p><b class="bold500">Indian Mission:</b> <?php echo $apply[0]->indian_mission;?><p>
                  <p><b class="bold500">Nationality:</b> <?php echo $apply[0]->nationality;?><p>
                  <p><b class="bold500">Date of Birth:</b> <?php echo $apply[0]->date_of_birth;?><p>
                  <p><b class="bold500">Email ID:</b> <?php echo $apply[0]->email;?><p>
                  <p><b class="bold500">Expected Date of Arrival:</b> <?php echo $apply[0]->date_of_arrival;?><p>
                  <p><b class="bold500">Visa Type:</b> <?php echo $apply[0]->visa_type;?><p>
              
              </div>
              
              <div class="col-xs-12 col-sm-4 col-md-4">              
                    <p><b class="bold500">Surname:</b> <?php echo $apply[0]->surname;?><p>                
                    <p><b class="bold500">Given Name:</b> <?php echo $apply[0]->given_name;?><p>                
                    <p><b class="bold500">Have you ever changed your name?:</b> <?php echo $apply[0]->changed_name;?><br>
                    <?php if($apply[0]->changed_name=="Yes") //{ ?>
                    <b class="bold500">Previous Surname:</b> <?php echo $apply[0]->previous_surname;?><br>
                    <b class="bold500">Previous Name:</b> <?php echo $apply[0]->previous_name;?>
                    <?php //} ?>
                    <p>
                    <p><b class="bold500">Sex:</b> <?php echo $apply[0]->sex;?><p>
                    <p><b class="bold500">Town/City of birth:</b> <?php echo $apply[0]->city_of_birth;?><p>
                    <p><b class="bold500">Country of birth:</b> <?php echo $apply[0]->country_of_birth;?><p>
                    <p><b class="bold500">Citizenship/National Id No.:</b> <?php echo $apply[0]->national_id;?><p>              
              </div>
              
              <div class="col-xs-12 col-sm-4 col-md-4">              
                    <p><b class="bold500">Religion:</b> <?php echo $apply[0]->religion;?>
                    <?php if($apply[0]->religion=="OTHERS")//{ ?>
                    <br>
                    <b class="bold500">Other Religion:</b> <?php echo $apply[0]->other_religion;?>
                    <?php //} ?>
                    <p>
                    <p><b class="bold500">Visible identification marks:</b> <?php echo $apply[0]->visible_identification_marks;?>
                    <p><b class="bold500">Educational Qualification:</b> <?php echo $apply[0]->educational_qualification;?>
                    <p><b class="bold500">Did you acquire Nationality by birth or by naturalization?:</b> <?php echo $apply[0]->acquire_nationality;?></p>
                    <?php if($apply[0]->acquire_nationality=="Naturalization")//{ ?>
                    <p><b class="bold500">Prev. Nationality:</b> <?php echo $apply[0]->previous_nationality;?>
                    <?php //} ?> 
              </div> 
             
              
              </div>
              
          </div>          
        </div>
    </div>
</div>
          
          
          
          
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h5 style="color:#ffffff"><i class="fa fa-user"></i> <?php echo $apply[0]->given_name;?></h5>                  
            </div>
          <div class="panel-body collapse in">                                  
            
            
            <div class="row">
            
            
              <div class="col-xs-12 col-sm-4 col-md-4">
                  <p><b class="bold500">Passport No.:</b> <?php echo $apply[0]->passport_no;?></p>                  
                  <p><b class="bold500">Place of Issue:</b> <?php echo $apply[0]->place_of_issue;?></p>                  
                  <p><b class="bold500">Date of Issue:</b> <?php echo $apply[0]->date_of_issue;?></p>                  
                  <p><b class="bold500">Date of Expiry:</b> <?php echo $apply[0]->date_of_expiry;?></p>                  
                  <p><b class="bold500">Any other valid Passport/Identity Certificate(IC) held:</b><br><?php echo $apply[0]->other_valid_passport;?></p>
                  <?php if($apply[0]->other_valid_passport=="Yes") //{ ?>
                  <p>
                   <b class="bold500">Country of Issue:</b> <?php echo $apply[0]->other_country_of_issue;?><br>
                   <b class="bold500">Passport/IC No.:</b> <?php echo $apply[0]->other_passport_no;?><br>
                   <b class="bold500">Date of Issue:</b> <?php echo $apply[0]->other_date_of_issue;?><br>
                   <b class="bold500">Place of Issue:</b> <?php echo $apply[0]->other_place_of_issue;?><br>
                   <b class="bold500">Nationality mentioned therein:</b> <?php echo $apply[0]->other_nationality_mentioned;?>                     
                  </p>                  
                  <?php //} ?>    
                              
                  
              
              </div>
              
              <div class="col-xs-12 col-sm-4 col-md-4">
                    
                    <p>
                    #Present Address<br>
                    <b class="bold500">House No./Street:</b> <?php echo $apply[0]->street_present;?><br>
                    <b class="bold500">Village/Town/City:</b> <?php echo $apply[0]->city_present;?><br>              
                    <b class="bold500">State/Province/District:</b> <?php echo $apply[0]->state_present;?><br>                
                    <b class="bold500">Country:</b> <?php echo $apply[0]->country_present;?><br> 
                    <b class="bold500">Postal/Zip Code:</b> <?php echo $apply[0]->zip_code_present;?><br>
                    <b class="bold500">Phone No.:</b> <?php echo $apply[0]->phone_no;?><br> 
                    <b class="bold500">Mobile No.:</b> <?php echo $apply[0]->mobile_no;?>
                    <p>
                    
                    <p>
                    #Permanent Address<br>
                    <b class="bold500">House No./Street:</b> <?php echo $apply[0]->street_permanent;?><br>
                    <b class="bold500">Village/Town/City:</b> <?php echo $apply[0]->city_permanent;?><br>                
                    <b class="bold500">State/Province/District:</b> <?php echo $apply[0]->state_permanent;?><br>
                    </p>
                                 
              </div>
              
              <div class="col-xs-12 col-sm-4 col-md-4">                                  
                    <p>
                    #Father's Details<br>
                    <b class="bold500">Name:</b> <?php echo $apply[0]->name_father;?><br>
                    <b class="bold500">Nationality:</b> <?php echo $apply[0]->nationality_father;?><br>
                    <b class="bold500">Previous Nationality:</b> <?php echo $apply[0]->previous_nationality_father;?><br>
                    <b class="bold500">Place of Birth:</b> <?php echo $apply[0]->place_of_birth_father;?><br>
                    <b class="bold500">Country of Birth:</b> <?php echo $apply[0]->country_of_birth_father;?><br>                    
                    <p>                    
                    <p>
                    #Mother's Details<br>
                    <b class="bold500">Name:</b> <?php echo $apply[0]->name_mother;?><br>
                    <b class="bold500">Nationality:</b> <?php echo $apply[0]->nationality_mother;?><br>
                    <b class="bold500">Previous Nationality:</b> <?php echo $apply[0]->previous_nationality_mother;?><br>
                    <b class="bold500">Place of Birth:</b> <?php echo $apply[0]->place_of_birth_mother;?><br>
                    <b class="bold500">Country of Birth:</b> <?php echo $apply[0]->country_of_birth_mother;?><br>  
                    </p>
              </div> 
             
              
              </div>
              
          </div>          
        </div>
    </div>
</div> 
          
                   
                            
                                     
                                              
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h5 style="color:#ffffff"><i class="fa fa-user"></i> <?php echo $apply[0]->given_name;?></h5>                  
            </div>
          <div class="panel-body collapse in">                                  
            
            
            <div class="row">
            
            
              <div class="col-xs-12 col-sm-4 col-md-4">
                  <p><b class="bold500">Applicant's Marital Status:</b> <?php echo $apply[0]->applicant_marital_status;?><br>                  
                  <?php if($apply[0]->applicant_marital_status=="Married")//{ ?>
                      <b class="bold500">Name:</b> <?php echo $apply[0]->name_married;?><br>
                      <b class="bold500">Nationality:</b> <?php echo $apply[0]->nationality_married;?><br>
                      <b class="bold500">Previous Nationality:</b> <?php echo $apply[0]->previous_nationality_married;?><br>
                      <b class="bold500">Place of Birth:</b> <?php echo $apply[0]->place_of_birth_married;?><br>
                      <b class="bold500">Country of Birth:</b> <?php echo $apply[0]->country_of_birth_married;?><br>
                  <?php //} ?>
                  </p>
                  
                  <p><b class="bold500">Were your Grandfather/ Grandmother (paternal/maternal) Pakistan Nationals or Belong to Pakistan held area.</b><br>
                  <?php echo $apply[0]->grandparents_pakistan;?><br><br>
                  <?php if($apply[0]->grandparents_pakistan=="Yes") //{ ?>
                  <b class="bold500">Grandparents details:</b><br>
                  <?php echo $apply[0]->grandparents_pakistan_details ;?>
                  <?php //} ?>
                  </p>
                  
                  
                  
              </div>
              
              <div class="col-xs-12 col-sm-4 col-md-4">
                    <p>
                    <b class="bold500">Present Occupation:</b> <?php echo $apply[0]->present_occupation;?><br>
                    <?php if($apply[0]->present_occupation=="OTHERS") //{ ?>
                    <b class="bold500">Present Occupation:</b> <?php echo $apply[0]->occupation_other;?>
                    <?php //} ?>
                    </p>
                    <p><b class="bold500">Employer Name/business:</b> <?php echo $apply[0]->business_name;?></p>
                    <p><b class="bold500">Designation:</b> <?php echo $apply[0]->designation;?></p>
                    <p><b class="bold500">Address:</b> <?php echo $apply[0]->address;?></p>
                    <p><b class="bold500">Phone:</b> <?php echo $apply[0]->phone;?></p>
                    <p><b class="bold500">Past Occupation, if any:</b> <?php echo $apply[0]->past_occupation;?></p>
                    
                    <p><b class="bold500">Are/were you in a Military/Semi-Military/Police/Security. Organization?:</b><br>
                    <?php echo $apply[0]->military;?>
                    <?php if($apply[0]->military=="Yes") //{ ?>
                    <b class="bold500">Organisation:</b> <?php echo $apply[0]->military_organisation;?><br>
                    <b class="bold500">Designation :</b> <?php echo $apply[0]->military_designation;?><br>
                    <b class="bold500">Rank:</b> <?php echo $apply[0]->military_rank;?><br>
                    <b class="bold500">Place of Posting:</b> <?php echo $apply[0]->military_place_of_posting;?><br>
                    <?php // } ?>
                    
                    
                    </p>
                    
                  
                                 
              </div>
              
              <div class="col-xs-12 col-sm-4 col-md-4">  
                   #VISA INFO<br>                                
                    <?php if($apply[0]->visa_type=="TOURIST VISA"){ ?>                      
                       <p><b class="bold500">Places likely to be visited</b> <?php echo $apply[0]->tv_places_visited;?></p>                         
                    <?php }elseif($apply[0]->visa_type=="BUSINESS VISA"){ ?>                      
                       <p><b class="bold500">Name of the Company in India:</b> <?php echo $apply[0]->bv_company_name;?></p>
                       <p><b class="bold500">Address:</b> <?php echo $apply[0]->bv_address;?></p>
                       <p><b class="bold500">Phone:</b> <?php echo $apply[0]->bv_phone;?></p>
                       <p><b class="bold500">Email:</b> <?php echo $apply[0]->bv_email;?></p>                       
                    <?php }elseif($apply[0]->visa_type=="MEDICAL VISA"){ ?>                        
                        <p>
                        #Hospital In Country Of Residence<br>
                        <b class="bold500">Name:</b> <?php echo $apply[0]->mv_hr_name;?><br>
                        <b class="bold500">Address:</b> <?php echo $apply[0]->mv_hr_address;?><br>
                        <b class="bold500">Doctor's Name:</b> <?php echo $apply[0]->mv_hr_doctor_name;?><br>
                        <b class="bold500">Phone/Fax:</b> <?php echo $apply[0]->mv_hr_phone;?><br>
                        <b class="bold500">Email:</b> <?php echo $apply[0]->mv_hr_email;?><br>                        
                        </p>
                        <p>
                        #Hospital in India<br>
                        <b class="bold500">Name:</b> <?php echo $apply[0]->mv_hi_name;?><br>
                        <b class="bold500">Address:</b> <?php echo $apply[0]->mv_hi_address;?><br>
                        <b class="bold500">Doctor's Name:</b> <?php echo $apply[0]->mv_hi_doctor_name;?><br>
                        <b class="bold500">Phone/Fax:</b> <?php echo $apply[0]->mv_hi_phone;?><br>
                        <b class="bold500">Email:</b> <?php echo $apply[0]->mv_hi_email;?><br>                        
                        </p>                        
                        <p><b class="bold500">Nature of Illness</b> <?php echo $apply[0]->mv_hi_illness;?></p>                        
                    <?php } ?>
                    
                    <p><b class="bold500">Duration of Visa (in Months):</b> <?php echo $apply[0]->v_duration_of_visa;?></p>
                    <p><b class="bold500">No. of Entries:</b> <?php echo $apply[0]->v_no_of_entries;?></p>
                    <p><b class="bold500">Purpose of Visit:</b> <?php echo $apply[0]->v_purpose_of_visit;?></p>
                    <p><b class="bold500">Expected Date journey:</b> <?php echo $apply[0]->v_expected_date_journey;?></p>
                    <p><b class="bold500">Port of Arrival in India:</b> <?php echo $apply[0]->v_port_arrival;?></p>
                    <p><b class="bold500">Expected Port of Exit from India:</b> <?php echo $apply[0]->v_port_exit;?></p>
                    
                    
              </div> 
             
              
              </div>
              
          </div>          
        </div>
    </div>
</div>          
           
   
         
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h5 style="color:#ffffff"><i class="fa fa-user"></i> <?php echo $apply[0]->given_name;?></h5>                  
            </div>
          <div class="panel-body collapse in">                                  
            
            
            <div class="row">
            
            
              <div class="col-xs-12 col-sm-6 col-md-6">
                  <p><b class="bold500">Have you ever visited India before?</b> <?php echo $apply[0]->visited_india_before;?><br>
                  <?php if($apply[0]->visited_india_before=="Yes") //{ ?>
                      <b class="bold500">Address 1:</b> <?php echo $apply[0]->visited_address_1;?><br>
                      <b class="bold500">Address 2:</b> <?php echo $apply[0]->visited_address_2;?><br>
                      <b class="bold500">Address 3:</b> <?php echo $apply[0]->visited_address_3;?><br>
                      <b class="bold500">Cities previously visited in India:</b> <?php echo $apply[0]->cities_previously_visited_india;?><br>
                      <b class="bold500">Last Indian Visa No/Currently valid Indian Visa No.:</b> <?php echo $apply[0]->last_indian_visa_no;?><br>
                      <b class="bold500">Type of Visa:</b> <?php echo $apply[0]->last_type_visa;?><br>
                      <b class="bold500">Place of Issue:</b> <?php echo $apply[0]->last_place_of_issue;?><br>
                      <b class="bold500">Date of Issue:</b> <?php echo $apply[0]->last_date_of_issue;?><br>
                      <b class="bold500">Has permission to visit or to extend stay in India previously been refused?:</b> <?php echo $apply[0]->last_visit_previously_refused;?><br>
                      <b class="bold500">If so, when and by whom (Mention Control No. and date also):</b> <?php echo $apply[0]->mention_control_no;?><br>
                  <?php //} ?>
                  </p>
                  
                  
              </div>
              
              <div class="col-xs-12 col-sm-6 col-md-6">
                  <p><b class="bold500">Countries Visited in Last 10 years</b><br><?php echo $apply[0]->countries_visited_last_10_years;?></p>             
              </div>
              
               
             
              
              </div>
              
          </div>          
        </div>
    </div>
</div> 
    
                  
                                
                                              
                                                            
                                                                          
                                                                                        
                                                                                                      
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h5 style="color:#ffffff"><i class="fa fa-user"></i> <?php echo $apply[0]->given_name;?></h5>                  
            </div>
          <div class="panel-body collapse in">                                  
            
            
            <div class="row">
           
              
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <p><b class="bold500">Have you visited SAARC countries (except your own country) during last 3 years?</b> <?php echo $apply[0]->visited_saarc_countries;?></p>
                  
                  <table class="table table-striped table-bordered">
                      <tr>
                          <td><b class="bold500">Name of SAARC country</b></td>
                          <td><b class="bold500">Year</b></td>
                          <td><b class="bold500">No. of visits</b></td>
                      </tr>
                      <?php if($apply[0]->saarc_country_name_1!="0"){ ?>
                      <tr>
                          <td><?php echo $apply[0]->saarc_country_name_1;?></td>
                          <td><?php echo $apply[0]->saarc_country_year_1;?></td>
                          <td><?php echo $apply[0]->saarc_country_no_visits_1;?></td>
                      </tr>
                      <?php } ?>
                      <?php if($apply[0]->saarc_country_name_2!="0"){ ?>
                      <tr>
                          <td><?php echo $apply[0]->saarc_country_name_2;?></td>
                          <td><?php echo $apply[0]->saarc_country_year_2;?></td>
                          <td><?php echo $apply[0]->saarc_country_no_visits_2;?></td>
                      </tr>
                      <?php } ?>
                      <?php if($apply[0]->saarc_country_name_3!="0"){ ?>
                      <tr>
                          <td><?php echo $apply[0]->saarc_country_name_3;?></td>
                          <td><?php echo $apply[0]->saarc_country_year_3;?></td>
                          <td><?php echo $apply[0]->saarc_country_no_visits_3;?></td>
                      </tr>
                      <?php } ?>
                      <?php if($apply[0]->saarc_country_name_4!="0"){ ?>
                      <tr>
                          <td><?php echo $apply[0]->saarc_country_name_4;?></td>
                          <td><?php echo $apply[0]->saarc_country_year_4;?></td>
                          <td><?php echo $apply[0]->saarc_country_no_visits_4;?></td>
                      </tr>
                      <?php } ?>
                      <?php if($apply[0]->saarc_country_name_5!="0"){ ?>
                      <tr>
                          <td><?php echo $apply[0]->saarc_country_name_5;?></td>
                          <td><?php echo $apply[0]->saarc_country_year_5;?></td>
                          <td><?php echo $apply[0]->saarc_country_no_visits_5;?></td>
                      </tr>
                      <?php } ?>
                      <?php if($apply[0]->saarc_country_name_6!="0"){ ?>
                      <tr>
                          <td><?php echo $apply[0]->saarc_country_name_6;?></td>
                          <td><?php echo $apply[0]->saarc_country_year_6;?></td>
                          <td><?php echo $apply[0]->saarc_country_no_visits_6;?></td>
                      </tr>
                      <?php } ?>
                      <?php if($apply[0]->saarc_country_name_7!="0"){ ?>
                      <tr>
                          <td><?php echo $apply[0]->saarc_country_name_7;?></td>
                          <td><?php echo $apply[0]->saarc_country_year_7;?></td>
                          <td><?php echo $apply[0]->saarc_country_no_visits_7;?></td>
                      </tr>
                      <?php } ?>
                      <?php if($apply[0]->saarc_country_name_8!="0"){ ?>
                      <tr>
                          <td><?php echo $apply[0]->saarc_country_name_8;?></td>
                          <td><?php echo $apply[0]->saarc_country_year_8;?></td>
                          <td><?php echo $apply[0]->saarc_country_no_visits_8;?></td>
                      </tr>
                      <?php } ?>
                  </table>
                  
                  
                  
              </div>
              
               
             
              
              </div>
              
          </div>          
        </div>
    </div>
</div>                                                                                                                                   
     
            

     
     
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h5 style="color:#ffffff"><i class="fa fa-user"></i> <?php echo $apply[0]->given_name;?></h5>                  
            </div>
          <div class="panel-body collapse in">                                  
            
            
            <div class="row">
            
            
              <div class="col-xs-12 col-sm-6 col-md-6">
                    <p><b class="bold500">Reference Name in India:</b> <?php echo $apply[0]->reference_name_india;?></p>
                    <p><b class="bold500">Address 1:</b> <?php echo $apply[0]->reference_address_india_1;?></p>
                    <p><b class="bold500">Address 2:</b> <?php echo $apply[0]->reference_address_india_2;?></p>
                    <p><b class="bold500">Phone:</b> <?php echo $apply[0]->reference_phone_india;?></p>
                                  
              </div>
              
              <div class="col-xs-12 col-sm-6 col-md-6">
                  <p><b class="bold500">Reference Name in AFGHANISTAN:</b> <?php echo $apply[0]->reference_name_country;?></p>
                    <p><b class="bold500">Address 1:</b> <?php echo $apply[0]->reference_address_country_1;?></p>
                    <p><b class="bold500">Address 2:</b> <?php echo $apply[0]->reference_address_country_2;?></p>
                    <p><b class="bold500">Phone:</b> <?php echo $apply[0]->reference_phone_country;?></p>
              </div>
              
               
             
              
              </div>
              
          </div>          
        </div>
    </div>
</div>
    
          
                
                      
                            
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h5 style="color:#ffffff"><i class="fa fa-user"></i> <?php echo $apply[0]->given_name;?></h5>                  
            </div>
          <div class="panel-body collapse in">                                  
            
            
            <div class="row">
            
            <form action="../updateNotice" method="post"> 
              <div class="col-xs-12 col-sm-12 col-md-12">
                  #Notice<br> 
                  <textarea class="form-control" name="notice" value="<?php echo $apply[0]->notice; ?>" rows="8"><?php echo $apply[0]->notice; ?></textarea>
                  <input type="hidden" name="appid" value="<?php echo $apply[0]->app_id;?>">
                  <input type="hidden" name="send" value="update_notice" />
                  <button type="submit" class="btn btn-success" style="margin-top: 10px;" id="save_notice">Save Notice</button>
              </div>
            </form>
               
             
              
              </div>
              
          </div>          
        </div>
    </div>
</div>                                        
     
     
      
            
           

        </div> <!-- container -->
        
        
        
        
    </div> <!--wrap -->
</div> <!-- page-content -->
