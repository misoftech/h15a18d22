<?php

class Patient extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('user_agent');

      $sess = $this->session->userdata();
      if ($sess['logged_in']['user_level'] != '1' && $sess['logged_in']['user_level_status'] != '1') {
            //header('Location: ' . base_url() . 'home ');
            redirect(base_url() . 'home ', 'location');
        } elseif ($sess['logged_in']['user_level'] != '2' && $sess['logged_in']['user_level_status'] != '1') {
            //header('Location: ' . base_url() . 'home ');
             redirect(base_url() . 'home ', 'location');
        }


        // Load form helper library
        $this->load->helper('form');
        // Load form validation library
        $this->load->library('form_validation');
        // Load session library
        $this->load->library('session');
        // Load database
        $this->load->model('admin/Patient_model', 'app');
        $this->load->helper("url");
        $this->load->library("pagination");

    }

    public function index() {
        $doctors = $this->app->fetchAll();
        
        $config = array();
        $config["base_url"] = base_url() . "admin/patient/index";
        $config["total_rows"] = count($doctors);//$this->Countries->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["results"] = $this->app->fetchAll($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        
        $dataCollection = array('headlines' => 'All Doctor', 'doctors' => $data);
        $title = array('page_title' => "All Doctor | MiConsulting");
        $this->load->view('admin/temp/headercrm', $title);
        $this->load->view('admin/patient/index', $dataCollection);
        $this->load->view('admin/temp/footercrm');
    }

    public function add() {
         
         $data = array();     
         extract($_POST);
         if ($this->input->server('REQUEST_METHOD') === 'POST'  && $send == 1) {
             $data = array();
             $data['first_name'] = $first_name;
             $data['last_name'] = $last_name;
             $data['email'] = $email;
             $data['phone_no'] = $phone_no;
             $data['mobile'] = $mobile;
             $data['address'] = $address;
             $data['registration_no'] = $registration_no;
             $data['qualification'] = $qualification;
             $data['experience'] = $experience;
             $data['consultancy_fee'] = $consultancy_fee;
             $data['specialization'] = $specialization;
             $data['clinic_hospital_type'] = $clinic_hospital_type;
             $data['country'] = $country;
             $data['state'] = $state;
             $data['city'] = $city;
             $data['zipcode'] = $zipcode;
             
            $name =$_FILES['avatar']['name'];
            $pic_loc = $_FILES['avatar']['tmp_name'];
            $folder="assets/img/patient/";
            $avatar=$folder.$name;
            $data['avatar'] = $name;
            $file_moved = move_uploaded_file($_FILES['avatar']['tmp_name'],$avatar);
            if ($file_moved) {
                $res = $this->app->add($data);
                unset($_POST);
                 redirect('/admin/patient/', 'location');
            }else{
              echo  'avatar not moved';
            }
        }
        
//        else {
//            $this->load->view('add_form');
//        }

        $title = array('page_title' => "Add Doctor | MiConsulting");
        $js = array('js' => "doctor.js");  //  Angular Js file name
        
        $doctors = array();
        
        $states =  $this->state_city_india();
        $dataCollection = array('headline' => 'Add Doctor','states'=>$states, 'doctor' => $doctors);
        
        $this->load->view('admin/temp/headercrm', $title);
        $this->load->view('admin/patient/add', $dataCollection);
        $this->load->view('admin/temp/footercrm',$js );
        
    }
    
    public function edit() {
         
        $data = array(); 
        $id = $this->uri->segment('4');
        $doctor = $this->app->fetchById($id);
        
         if ($this->input->server('REQUEST_METHOD') === 'POST'  && $_POST['send'] == 1) {
              extract($_POST);
             $data = array();
             $data['first_name'] = $first_name?$first_name:$doctor[0]->first_name;
             $data['last_name'] = $last_name?$last_name:$doctor[0]->last_name;
             $data['email'] = $email?$email:$doctor[0]->email;
             $data['phone_no'] = $phone_no?$phone_no:$doctor[0]->phone_no;
             $data['mobile'] = $mobile?$mobile:$doctor[0]->mobile;
             $data['address'] = $address?$address:$doctor[0]->address;
             $data['registration_no'] = $registration_no?$registration_no:$doctor[0]->registration_no;
             $data['qualification'] = $qualification?$qualification:$doctor[0]->qualification;
             $data['experience'] = $experience?$experience:$doctor[0]->experience;
             $data['consultancy_fee'] = $consultancy_fee?$consultancy_fee:$doctor[0]->consultancy_fee;
             $data['specialization'] = $specialization?$specialization:$doctor[0]->specialization;
             $data['clinic_hospital_type'] = $clinic_hospital_type?$clinic_hospital_type:$doctor[0]->clinic_hospital_type;
             $data['country'] = $country?$country:$doctor[0]->country;
             $data['state'] = $state?$state:$doctor[0]->state;
             $data['city'] = $city?$city:$doctor[0]->city;
             $data['zipcode'] = $zipcode?$zipcode:$doctor[0]->zipcode;
             $data['id'] = $id?$id:$doctor[0]->id;
             
            $name =$_FILES['avatar']['name']?$_FILES['avatar']['name']:'';
            if ( $name != '') {
                $pic_loc = $_FILES['avatar']['tmp_name'];
                $folder="assets/img/patient/";
                $avatar=$folder.$name;
                $data['avatar'] = $name;
                $file_moved = move_uploaded_file($_FILES['avatar']['tmp_name'],$avatar);
                $res = $this->app->update($data);
                unset($_POST);
                $this->load->library('user_agent');
                 redirect('/admin/patient/', 'location');
            }else{
                $data['avatar'] = $doctor[0]->avatar;
                $res = $this->app->update($data);
                unset($_POST);
                $this->load->library('user_agent');
                 redirect('/admin/patient/', 'location');
            }
        }
        
//        else {
//            $this->load->view('add_form');
//        }

        $title = array('page_title' => "Edit Doctor | MiConsulting");
        $js = array('js' => "patient.js");  // Angular Js file name
        
        $doctors = array();
        $states =  $this->state_city_india();
        $dataCollection = array('headline' => 'Edit Doctor','states'=>$states, 'doctor' => $doctor[0]);
        
        $this->load->view('admin/temp/headercrm', $title);
        $this->load->view('admin/doctor/edit', $dataCollection);
        $this->load->view('admin/temp/footercrm',$js );
        
    }
public function view() {
         
        $title = array('page_title' => "Add Doctor | MiConsulting");
        $js = array('js' => "doctor.js");  //  Angular Js file name
        $id = $this->uri->segment('4');
        $doctors = $this->app->fetchById($id);
        $states =  $this->state_city_india();
        $dataCollection = array('headline' => 'Add Doctor','states'=>$states, 'doctor' => $doctors);
        $this->load->view('admin/temp/headercrm', $title);
        $this->load->view('admin/patient/view', $dataCollection);
        $this->load->view('admin/temp/footercrm',$js );
        
    }
    
    
    
    
  



public function ajax(){
    $this->state_city_india();
}

private function state_city_india(){
    $list = array(
	'Andaman and Nicobar' => array(
		'North and Middle Andaman', 'South Andaman', 'Nicobar'
	),
	'Andhra Pradesh' => array(
		'Adilabad', 'Anantapur', 'Chittoor', 'East Godavari', 'Guntur', 'Hyderabad', 'Kadapa', 'Karimnagar', 'Khammam', 'Krishna', 'Kurnool', 'Mahbubnagar', 'Medak', 'Nalgonda', 'Nellore', 'Nizamabad', 'Prakasam', 'Rangareddi', 'Srikakulam', 'Vishakhapatnam', 'Vizianagaram', 'Warangal', 'West Godavari'
	),
	'Arunachal Pradesh' => array(
		'Anjaw', 'Changlang', 'East Kameng', 'Lohit', 'Lower Subansiri', 'Papum Pare', 'Tirap', 'Dibang Valley', 'Upper Subansiri', 'West Kameng'
	),
	'Assam' => array(
		'Barpeta', 'Bongaigaon', 'Cachar', 'Darrang', 'Dhemaji', 'Dhubri', 'Dibrugarh', 'Goalpara', 'Golaghat', 'Hailakandi', 'Jorhat', 'Karbi Anglong', 'Karimganj', 'Kokrajhar', 'Lakhimpur', 'Marigaon', 'Nagaon', 'Nalbari', 'North Cachar Hills', 'Sibsagar', 'Sonitpur', 'Tinsukia'
	),
	'Bihar' => array(
		'Araria', 'Aurangabad', 'Banka', 'Begusarai', 'Bhagalpur', 'Bhojpur', 'Buxar', 'Darbhanga', 'Purba Champaran', 'Gaya', 'Gopalganj', 'Jamui', 'Jehanabad', 'Khagaria', 'Kishanganj', 'Kaimur', 'Katihar', 'Lakhisarai', 'Madhubani', 'Munger', 'Madhepura', 'Muzaffarpur', 'Nalanda', 'Nawada', 'Patna', 'Purnia', 'Rohtas', 'Saharsa', 'Samastipur', 'Sheohar', 'Sheikhpura', 'Saran', 'Sitamarhi', 'Supaul', 'Siwan', 'Vaishali', 'Pashchim Champaran'
	),
	'Chandigarh' => array(),
	'Chhattisgarh' => array(
		'Bastar', 'Bilaspur', 'Dantewada', 'Dhamtari', 'Durg', 'Jashpur', 'Janjgir-Champa', 'Korba', 'Koriya', 'Kanker', 'Kawardha', 'Mahasamund', 'Raigarh', 'Rajnandgaon', 'Raipur', 'Surguja'
	),
	'Dadra and Nagar Haveli' => array(),
	'Daman and Diu' => array(
		'Diu', 'Daman'
	),
	'Delhi' => array(
		'Central Delhi', 'East Delhi', 'New Delhi', 'North Delhi', 'North East Delhi', 'North West Delhi', 'South Delhi', 'South West Delhi', 'West Delhi'
	),
	'Goa' => array(
		'North Goa', 'South Goa'
	),
	'Gujarat' => array(
		'Ahmedabad', 'Amreli District', 'Anand', 'Banaskantha', 'Bharuch', 'Bhavnagar', 'Dahod', 'The Dangs', 'Gandhinagar', 'Jamnagar', 'Junagadh', 'Kutch', 'Kheda', 'Mehsana', 'Narmada', 'Navsari', 'Patan', 'Panchmahal', 'Porbandar', 'Rajkot', 'Sabarkantha', 'Surendranagar', 'Surat', 'Vadodara', 'Valsad'
	),
	'Haryana' => array(
		'Ambala', 'Bhiwani', 'Faridabad', 'Fatehabad', 'Gurgaon', 'Hissar', 'Jhajjar', 'Jind', 'Karnal', 'Kaithal', 'Kurukshetra', 'Mahendragarh', 'Mewat', 'Panchkula', 'Panipat', 'Rewari', 'Rohtak', 'Sirsa', 'Sonepat', 'Yamuna Nagar', 'Palwal'
	),
	'Himachal Pradesh' => array(
		'Bilaspur', 'Chamba', 'Hamirpur', 'Kangra', 'Kinnaur', 'Kulu', 'Lahaul and Spiti', 'Mandi', 'Shimla', 'Sirmaur', 'Solan', 'Una'
	),
	'Jammu and Kashmir' => array(
		'Anantnag', 'Badgam', 'Bandipore', 'Baramula', 'Doda', 'Jammu', 'Kargil', 'Kathua', 'Kupwara', 'Leh', 'Poonch', 'Pulwama', 'Rajauri', 'Srinagar', 'Samba', 'Udhampur'
	),
	'Jharkhand' => array(
		'Bokaro', 'Chatra', 'Deoghar', 'Dhanbad', 'Dumka', 'Purba Singhbhum', 'Garhwa', 'Giridih', 'Godda', 'Gumla', 'Hazaribagh', 'Koderma', 'Lohardaga', 'Pakur', 'Palamu', 'Ranchi', 'Sahibganj', 'Seraikela and Kharsawan', 'Pashchim Singhbhum', 'Ramgarh'
	),
	'Karnataka' => array(
		'Bidar', 'Belgaum', 'Bijapur', 'Bagalkot', 'Bellary', 'Bangalore Rural District', 'Bangalore Urban District', 'Chamarajnagar', 'Chikmagalur', 'Chitradurga', 'Davanagere', 'Dharwad', 'Dakshina Kannada', 'Gadag', 'Gulbarga', 'Hassan', 'Haveri District', 'Kodagu', 'Kolar', 'Koppal', 'Mandya', 'Mysore', 'Raichur', 'Shimoga', 'Tumkur', 'Udupi', 'Uttara Kannada', 'Ramanagara', 'Chikballapur', 'Yadagiri'
	),
	'Kerala' => array(
		'Alappuzha', 'Ernakulam', 'Idukki', 'Kollam', 'Kannur', 'Kasaragod', 'Kottayam', 'Kozhikode', 'Malappuram', 'Palakkad', 'Pathanamthitta', 'Thrissur', 'Thiruvananthapuram', 'Wayanad'
	),
	'Lakshadweep' => array(),
	'Madhya Pradesh' => array(
		'Alirajpur', 'Anuppur', 'Ashok Nagar', 'Balaghat', 'Barwani', 'Betul', 'Bhind', 'Bhopal', 'Burhanpur', 'Chhatarpur', 'Chhindwara', 'Damoh', 'Datia', 'Dewas', 'Dhar', 'Dindori', 'Guna', 'Gwalior', 'Harda', 'Hoshangabad', 'Indore', 'Jabalpur', 'Jhabua', 'Katni', 'Khandwa', 'Khargone', 'Mandla', 'Mandsaur', 'Morena', 'Narsinghpur', 'Neemuch', 'Panna', 'Rewa', 'Rajgarh', 'Ratlam', 'Raisen', 'Sagar', 'Satna', 'Sehore', 'Seoni', 'Shahdol', 'Shajapur', 'Sheopur', 'Shivpuri', 'Sidhi', 'Singrauli', 'Tikamgarh', 'Ujjain', 'Umaria', 'Vidisha'
	),
	'Maharashtra' => array(
		'Ahmednagar', 'Akola', 'Amrawati', 'Aurangabad', 'Bhandara', 'Beed', 'Buldhana', 'Chandrapur', 'Dhule', 'Gadchiroli', 'Gondiya', 'Hingoli', 'Jalgaon', 'Jalna', 'Kolhapur', 'Latur', 'Mumbai City', 'Mumbai suburban', 'Nandurbar', 'Nanded', 'Nagpur', 'Nashik', 'Osmanabad', 'Parbhani', 'Pune', 'Raigad', 'Ratnagiri', 'Sindhudurg', 'Sangli', 'Solapur', 'Satara', 'Thane', 'Wardha', 'Washim', 'Yavatmal'
	),
	'Manipur' => array(
		'Bishnupur', 'Churachandpur', 'Chandel', 'Imphal East', 'Senapati', 'Tamenglong', 'Thoubal', 'Ukhrul', 'Imphal West'
	),
	'Meghalaya' => array(
		'East Garo Hills', 'East Khasi Hills', 'Jaintia Hills', 'Ri-Bhoi', 'South Garo Hills', 'West Garo Hills', 'West Khasi Hills'
	),
	'Mizoram' => array(
		'Aizawl', 'Champhai', 'Kolasib', 'Lawngtlai', 'Lunglei', 'Mamit', 'Saiha', 'Serchhip'
	),
	'Nagaland' => array(
		'Dimapur', 'Kohima', 'Mokokchung', 'Mon', 'Phek', 'Tuensang', 'Wokha', 'Zunheboto'
	),
	'Orissa' => array(
		'Angul', 'Boudh', 'Bhadrak', 'Bolangir', 'Bargarh', 'Baleswar', 'Cuttack', 'Debagarh', 'Dhenkanal', 'Ganjam', 'Gajapati', 'Jharsuguda', 'Jajapur', 'Jagatsinghpur', 'Khordha', 'Kendujhar', 'Kalahandi', 'Kandhamal', 'Koraput', 'Kendrapara', 'Malkangiri', 'Mayurbhanj', 'Nabarangpur', 'Nuapada', 'Nayagarh', 'Puri', 'Rayagada', 'Sambalpur', 'Subarnapur', 'Sundargarh'
	),
	'Puducherry' => array(
		'Karaikal', 'Mahe', 'Puducherry', 'Yanam'
	),
	'Punjab' => array(
		'Amritsar', 'Bathinda', 'Firozpur', 'Faridkot', 'Fatehgarh Sahib', 'Gurdaspur', 'Hoshiarpur', 'Jalandhar', 'Kapurthala', 'Ludhiana', 'Mansa', 'Moga', 'Mukatsar', 'Nawan Shehar', 'Patiala', 'Rupnagar', 'Sangrur'
	),
	'Rajasthan' => array(
		'Ajmer', 'Alwar', 'Bikaner', 'Barmer', 'Banswara', 'Bharatpur', 'Baran', 'Bundi', 'Bhilwara', 'Churu', 'Chittorgarh', 'Dausa', 'Dholpur', 'Dungapur', 'Ganganagar', 'Hanumangarh', 'Juhnjhunun', 'Jalore', 'Jodhpur', 'Jaipur', 'Jaisalmer', 'Jhalawar', 'Karauli', 'Kota', 'Nagaur', 'Pali', 'Pratapgarh', 'Rajsamand', 'Sikar', 'Sawai Madhopur', 'Sirohi', 'Tonk', 'Udaipur'
	),
	'Sikkim' => array(
		'East Sikkim', 'North Sikkim', 'South Sikkim', 'West Sikkim'
	),
	'Tamil Nadu' => array(
		'Ariyalur', 'Chennai', 'Coimbatore', 'Cuddalore', 'Dharmapuri', 'Dindigul', 'Erode', 'Kanchipuram', 'Kanyakumari', 'Karur', 'Madurai', 'Nagapattinam', 'The Nilgiris', 'Namakkal', 'Perambalur', 'Pudukkottai', 'Ramanathapuram', 'Salem', 'Sivagangai', 'Tiruppur', 'Tiruchirappalli', 'Theni', 'Tirunelveli', 'Thanjavur', 'Thoothukudi', 'Thiruvallur', 'Thiruvarur', 'Tiruvannamalai', 'Vellore', 'Villupuram'
	),
	'Tripura' => array(
		'Dhalai', 'North Tripura', 'South Tripura', 'West Tripura'
	),
	'Uttarakhand' => array(
		'Almora', 'Bageshwar', 'Chamoli', 'Champawat', 'Dehradun', 'Haridwar', 'Nainital', 'Pauri Garhwal', 'Pithoragharh', 'Rudraprayag', 'Tehri Garhwal', 'Udham Singh Nagar', 'Uttarkashi'
	),
	'Uttar Pradesh' => array(
		'Agra', 'Allahabad', 'Aligarh', 'Ambedkar Nagar', 'Auraiya', 'Azamgarh', 'Barabanki', 'Badaun', 'Bagpat', 'Bahraich', 'Bijnor', 'Ballia', 'Banda', 'Balrampur', 'Bareilly', 'Basti', 'Bulandshahr', 'Chandauli', 'Chitrakoot', 'Deoria', 'Etah', 'Kanshiram Nagar', 'Etawah', 'Firozabad', 'Farrukhabad', 'Fatehpur', 'Faizabad', 'Gautam Buddha Nagar', 'Gonda', 'Ghazipur', 'Gorkakhpur', 'Ghaziabad', 'Hamirpur', 'Hardoi', 'Mahamaya Nagar', 'Jhansi', 'Jalaun', 'Jyotiba Phule Nagar', 'Jaunpur District', 'Kanpur Dehat', 'Kannauj', 'Kanpur Nagar', 'Kaushambi', 'Kushinagar', 'Lalitpur', 'Lakhimpur Kheri', 'Lucknow', 'Mau', 'Meerut', 'Maharajganj', 'Mahoba', 'Mirzapur', 'Moradabad', 'Mainpuri', 'Mathura', 'Muzaffarnagar', 'Pilibhit', 'Pratapgarh', 'Rampur', 'Rae Bareli', 'Saharanpur', 'Sitapur', 'Shahjahanpur', 'Sant Kabir Nagar', 'Siddharthnagar', 'Sonbhadra', 'Sant Ravidas Nagar', 'Sultanpur', 'Shravasti', 'Unnao', 'Varanasi'
	),
	'West Bengal' => array(
		'Birbhum', 'Bankura', 'Bardhaman', 'Darjeeling', 'Dakshin Dinajpur', 'Hooghly', 'Howrah', 'Jalpaiguri', 'Cooch Behar', 'Kolkata', 'Malda', 'Midnapore', 'Murshidabad', 'Nadia', 'North 24 Parganas', 'South 24 Parganas', 'Purulia', 'Uttar Dinajpur'
	)
);
//echo "<pre>here";print_r($list);

return $list;
exit;
}

    
}