
<div id="page-content">
    <div id="wrap">
    
    
     <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="<?php base_url()?>/admin">Dashboard</a></li>
                <li>Hospitals</li>
                <li class='active'><?php echo $headline; ?></li>
            </ol>

            <h1><?php echo $headline; ?></h1>
            <div class="options">
                <div class="btn-toolbar">
                	<a href='<?php base_url()?>hospitalscrm/addhospital' class="btn btn-success hidden-xs"><i class="fa fa-plus-circle"></i> Add Hospitals</a>					           
                </div>
            </div>
        </div>




        <div class="container">
           
      
           
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4><i class="fa fa-hospital-o"></i> <?php echo $headlines;?></h4>
                
            </div>
          <div class="panel-body collapse in">                                  

            <div class="table-flipscroll table-responsive"   ng-app="hospitalApp" ng-controller="hospitalCtrl">
          
               <table cellpadding="0"  cellspacing="0" border="0" class="table table-striped table-bordered table-hover datatable" id="customer_table">
					<thead>
					<tr>
						<th style="width:auto;">#</th>
                                                <th style="width:150px;"><strong>Hospital Name</strong></th>
                                                <th style="width:auto;"><strong>Address</strong></th>
                                                <th style="width:auto;"><strong>City</strong></th>						
<!--						<th style="width:auto;">State</th>	--	-->
                                                <th style="width:auto;"><strong>Phone</strong></th>
                                                <th style="width:auto;"><strong>Email</strong></th>
                <!--	                                <th style="width:auto;">Website</th>
						<th style="width:auto;">Emergency Services </th>
                                                <th style="width:auto;">Hospital Type</th>
                                                <th style="width:auto;">Specialization </th>
                                                <th style="width:auto;">Distance From Airport</th>-->
                                                <th style="width:100px;text-align: center;" ><strong>Status</strong></th>						
					</tr>
					</thead>
					<tbody>
                                            <tr ng-repeat="x in hosPital"> 
                                           
                                            <td> {{$index+1}}</td>
                                            <td nowrap >{{x.name }}</td>
                                            <td >{{x.address }}</td> 
                                            <td>{{x.city }}</td>
                                            <td>{{x.phone_no }}</td>
                                            <td>{{x.email }}</td>
                        <?php //$i=1; foreach($hospitals as $hospital): ?>
                    <!--     <tr>
                            <td><?php ///echo $i; ?></td>
                            <td><?php //echo $hospital->name; ?></td>
                            <td><?php //echo getCutStrip( $hospital->address,"26","..."); ?></td>
                            <td><?php //echo $hospital->city; ?></td>
                           <td><?php //echo $hospital->state; ?></td>                            -->
                          <!--  <td><?php //echo $hospital->phone_no; ?></td>                            
                            <td><?php //echo $hospital->email; ?></td>
<!--                            <td><?php //echo $hospital->website; ?></td>-->
                         <!--   <td><?php // echo $hospital->emergency_services; ?></td>
<!--                            <td><?php //echo $hospital->hospital_type; ?></td>
                            <td><?php //$va= explode(',',$hospital->specialization);?>
                                <ul style="list-style: none;">
                           <?php  //foreach($va as $a):?>
                                <li> <?php //echo $a; ?> </li>
                                
                                
                           <?php // endforeach;?>
                            </ul>
                            
                            </td>
                            <td><?php //echo $hospital->distance_from_airport; ?></td>-->
                           
                            <td align="center"><a href="<?php echo base_url(); ?>admin/hospitalscrm/viewhospital/{{x.appID }}"><i class="fa fa-eye 2x"></i></a>
                            <a href="<?php echo base_url(); ?>admin/hospitalscrm/edithospital/{{x.appID }}"><i class="fa fa-pencil-square-o"></i></a>
                            <a href="javascript:void(0)" ng-click='delpopupn( x.appID , x.name )' ><i class="fa fa-trash-o"></i></a>
                            
                            
                            
                            
                            
                            </td>
                        </tr>
                        <?php //$i++; endforeach;�?>
					</tbody>
				</table>

                
            </div>
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
          <div class="modal-header" style="border-bottom:0px;" >
            
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      
          
        </div>
    <div class="modal-body" style="padding-top:0px; "> 
   <h4 style="text-align:center; border-bottom: 2px;">
       Do You Want to Delete   <span id="hospitalname" style="color:#85c744;"></span> ?
   </h4>
        <div class="row">
        <div class="form-group">
          
            <form name="ne_b" id="ne_b">
                <div class="col-md-12 errorpopup" id="response" style="font-size:20px;">   </div>
       
        <input class="form-control" type="hidden" name="appid" id="appid" required  />
      
       
           <div class="col-md-12 mt20">
              <div class="col-md-6">
               
               <button type="button" onclick="delhospital();" class="form-control btn btn-danger-alt" id="ad_n_b"> YES </button>
              </div>
               <div class="col-md-6">
               
               <button type="button"  class="form-control btn btn-info-alt text-info " id="ad_n_b"> NO </button>
              </div>
        </div> 
            
            </form>
            </div></div>
       
    <input type="hidden" id="pagename" name="pagename" value="<?php echo $this->uri->segment(3)?$this->uri->segment(3):'index';?>"/>
    </div>  
    </div>  
    </div>  
    </div>