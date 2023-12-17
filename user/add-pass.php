<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$fname=$_POST['fullname'];
$cnum=$_POST['cnumber'];
$email=$_POST['email'];
$itype=$_POST['identitytype'];
$icnum=$_POST['icnum'];
$cat=$_POST['category'];
$source=$_POST['source'];
$des=$_POST['destination'];
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$cost="0";
$passnum=mt_rand(100000000, 999999999);
$propic=$_FILES["propic"]["name"];
$formupload=$_FILES["form"]["name"];
$extension = substr($propic,strlen($propic)-4,strlen($propic));
$extension2 = substr($formupload,strlen($formupload)-4,strlen($formupload));
$allowed_extensions = array(".jpg",".jpeg",".png",".gif");

if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
elseif (!in_array($extension2,$allowed_extensions))
 {
  echo "<script>alert('your uploaded form has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$propic=md5($propic).time().$extension;
 move_uploaded_file($_FILES["propic"]["tmp_name"],"images/".$propic);
$formupload=md5($formupload).time().$extension2;
 move_uploaded_file($_FILES["form"]["tmp_name"],"images/".$formupload);
$sql="insert into tblpass(PassNumber,FullName,ProfileImage,ContactNumber,Email,IdentityType,IdentityCardno,Category,Source,Destination,FromDate,ToDate,Cost,form)values(:passnum,:fname,:propic,:cnum,:email,:itype,:icnum,:cat,:source,:des,:fdate,:tdate,:cost,:formupload)";
$query=$dbh->prepare($sql);
$query->bindParam(':passnum',$passnum,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':cnum',$cnum,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':itype',$itype,PDO::PARAM_STR);
$query->bindParam(':icnum',$icnum,PDO::PARAM_STR);
$query->bindParam(':cat',$cat,PDO::PARAM_STR);
$query->bindParam(':source',$source,PDO::PARAM_STR);
$query->bindParam(':des',$des,PDO::PARAM_STR);
$query->bindParam(':fdate',$fdate,PDO::PARAM_STR);
$query->bindParam(':tdate',$tdate,PDO::PARAM_STR);
$query->bindParam(':cost',$cost,PDO::PARAM_STR);
$query->bindParam(':propic',$propic,PDO::PARAM_STR);
$query->bindParam(':formupload',$formupload,PDO::PARAM_STR);


$query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
     echo '<script>alert("Pass detail has been added.")</script>';
//  echo "<script>window.location.href ='payment.php'</script>";

echo"<script>

let go=()=>{

let source='$source'.replace(/\s/g,'').toLowerCase()
console.log(source)
let destination='$des'.replace(/\s/g,'').toLowerCase()
console.log(destination)
let id='$LastInsertId'
console.log('id is '+id)

let destinyObj={
  
          centralbusstand:20,
          manachanallur:20,
          lalgudi:25,
          chathrambusstand:25,
          thuraiyur:40,
          manapparai:30
  
        }
  
  
  let destinyKey=[]
  
   for(let key in destinyObj){
  
      destinyKey.push(key)
  }
  
  console.log(destinyKey)

  let isSourceExists=destinyKey.find((value)=>{

     return value==source
      })
      
     console.log(isSourceExists)
       
    let isDestinationExists=destinyKey.find((value)=>{
    
     return value==destination
      
     })
      
    console.log(isDestinationExists)
    
     if(isSourceExists !=undefined && isDestinationExists !=undefined){
    
     identifyAmount(destinyObj,source,destination,id)
    
    }else{
    
     console.log(`please enter valid location`)
    
     }
    
  }

  let identifyAmount=(destinyObj,source,destination,id)=>{

     let amount=0
    
    console.log('source '+source)
    console.log('destination '+destination)
    console.log('destinyObj '+destinyObj[destination])
    console.log('destinyObj '+destinyObj[source])

    let totalKm=destinyObj[source]+destinyObj[destination]

    console.log('totalkm is'+totalKm)

    if(totalKm>=30 && totalKm<50){
      
      
    console.log(totalKm,source,destination)
              
       amount=100

      console.log('amount is '+amount)

      document.cookie='js_id= '+id
      document.cookie='js_amount= '+amount

       localStorage.setItem('amount',amount)
       localStorage.setItem('id',id)
      window.location='payment.php'
             
              
  }else if(totalKm>=50){

        
     console.log(totalKm,source,destination)

       amount=200

      console.log('amount is '+amount)

      document.cookie='js_id= '+id
      document.cookie='js_amount= '+amount

     localStorage.setItem('amount',amount)
     localStorage.setItem('id',id)
    window.location='payment.php'
            
           
          
   }


  }

go()


</script>";

  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }


}
}
 }  ?>


<!DOCTYPE html>

<html>

<head>
    
    <title>Bus Pass Management System | Add Pass</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />


</head>

<body>
    <!--  wrapper -->
    <div id="wrapper" style="background-color: rgb(83, 163, 163);">
        <!-- navbar top -->
      <?php include_once('includes/header.php');?>
        <!-- end navbar top -->

        <!-- navbar side -->
        <?php include_once('includes/sidebar.php');?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Add Pass</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post" enctype="multipart/form-data"> 
                                    
    <div class="form-group"> <label for="exampleInputEmail1">Full Name</label> <input type="text" name="fullname" value="" class="form-control" required='true' id="name"> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Passport size photo</label> <input type="file" name="propic" value="" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Contact Number</label> <input type="text" name="cnumber" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+"  id="contact_number"> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Email Address</label> <input type="email" name="email" value="" class="form-control" required='true' id="email"> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Identity Type</label><select type="text" name="identitytype" value="" class="form-control" required='true'>
<option value="">Choose Identity Type</option>
<option value="Voter Card">Voter Card</option>
<option value="PAN Card">PAN Card</option>
<option value="Adhar Card">Aadhar Card</option>
<option value="Student Card">Student Card</option>
<option value="Driving License">Driving License</option>
<option value="Passport">Passport</option>
<option value="Any Official Card">Any Official Card</option>
<option value="Any Other Govt Issued Doc">Any Other Govt Issued Doc</option>
     </select></div>
    <div class="form-group"> <label for="exampleInputEmail1">Identity Card No.</label> <input type="text" name="icnum" value="" class="form-control" required='true'> </div>
     <div class="form-group"> <label for="exampleInputEmail1">Category</label><select type="text" name="category" value="" class="form-control" required='true'>

     <?php 

$sql2 = "SELECT * from   tblcategory";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->CategoryName);?>"><?php echo htmlentities($row->CategoryName);?></option>
 <?php } ?>

     </select></div>
     <div class="form-group"> <label for="exampleInputEmail1">Source</label> <select type="text" name="source" value="" class="form-control" id="source" required='true'>
     <option value="source">Select your source</option>
<option value="thuraiyur" id="source">Thuraiyur</option>
<option value="manachanallur" id="source">Manachanallur</option>
<option value="lalgudi" id="source">Lalgudi</option>
<option value="chathrambusstand" id="source">Chathram Bus stand</option>
<option value="centralbusstand" id="source">Central Bus stand</option>
<option value="manapparai" id="source">Manapparai</option>
     </select></div>
     <div class="form-group"> <label for="exampleInputEmail1">Destination</label> <select type="text" name="destination" value="" class="form-control" id="destination" required='true'>
     <option value="destination">Select your destination</option>
<option value="thuraiyur" id="destination">Thuraiyur</option>
<option value="manachanallur" id="destination">Manachanallur</option>
<option value="lalgudi" id="destination">Lalgudi</option>
<option value="chathrambusstand" id="destination">Chathram Bus stand</option>
<option value="centralbusstand" id="destination">Central Bus stand</option>
<option value="manapparai" id="destination">Manapparai</option>
     </select></div>

     <div class="form-group">
    <label for="exampleInputEmail1">From Date</label>
    <?php
    // Calculate the date 1 week (7 days) from the current date
    $minDate = date('Y-m-d', strtotime('+1 week'));
    ?>
    <input type="date" id="fromdate" name="fromdate" class="form-control" required="true" min="<?php echo $minDate; ?>">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">To Date</label>
    <input type="date" id="todate" name="todate" class="form-control" required="true">
</div>

<script>
    // Set the "From Date" to one week from the current date initially
    const fromDate = new Date();
    fromDate.setDate(fromDate.getDate() + 7);
    document.getElementById("fromdate").valueAsDate = fromDate;

    document.getElementById("fromdate").addEventListener("change", function () {
        // Get the selected "From Date"
        const fromDate = new Date(this.value);
        
        // Calculate the date 1 month (30 days) from the selected "From Date"
        const toDate = new Date(fromDate);
        toDate.setDate(toDate.getDate() + 30);

        // Set the "To Date" input value
        const toDateString = toDate.toISOString().split("T")[0];
        document.getElementById("todate").setAttribute("min", toDateString);
        document.getElementById("todate").value = toDateString;
    });
</script>




<div class="form-group"> <label for="exampleInputEmail1">Application Form</label> <input type="file" name="form" value="" class="form-control" required='true'> </div>     

<!-- <div class="form-group"> <label for="exampleInputEmail1">Cost</label> <input type="text"  name="cost" value="" class="form-control" required='true' > </div> -->

     <p style="padding-left: 450px"><button type="submit" class="btn btn-primary" name="submit" id="submit" >Add</button></p> </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>


</body>

</html>
