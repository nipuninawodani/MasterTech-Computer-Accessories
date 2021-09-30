<?php session_start(); ?>
<?php include '../PHP/Functions.php';

if($_SESSION['UType']!='Admin'){
header("HTTP/1.1 401 Unauthorized"); 
echo '<script type="text/javascript"> window.location = "../index.php" </script>';
die();
}?>
<?php $result = adminproducts();?>

<!doctype html>
<html lang="en">

<head>
  <title>Hello, world!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
            <div class="logo" >
        <a style="margin-left: 45%;"
        
            >
              <img
                src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg"
                class="rounded-circle "
                height="30"
                loading="lazy"
              />
            </a>
        <a href="../Front-End/index.php" class="simple-text logo-normal">
          MasterTech
        </a>
      </div>
      <div class="sidebar-wrapper">
       <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="./index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardOrders.php">
              <i class="material-icons">dashboard</i>
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardUsers.php">
              <i class="material-icons">dashboard</i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboardproducts.php">
              <i class="material-icons">dashboard</i>
              <p>Items</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="../PHP/logout.php">
              <i class="material-icons">dashboard</i>
              <p>Logout</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Items</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="./dashboardNotifications.html">
                  <i class="material-icons">notifications</i> Notifications
                </a>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <section class="intro">
            <div class="bg-image h-100" style="background-color: #f5f7fa;">
            	<div class="row justify-content-between d-flex align-items-center" style="padding-left:10px;padding-top:10px">
                <div class="col-md-3 justify-content-center d-flex align-items-center">
                </div>
                <div class="col-md-2">
  	            	<!-- Button trigger modal -->
        					<button type="button" class="btn btn-primary d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
        					  <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
        					  <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
        					</svg>
        					&nbsp;Add Product
        					</button>
				        </div>
              </div>
              <div class="mask d-flex align-items-center h-100">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body p-0">
                          <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 500px">
                            <table class="table table-striped mb-0">
                              <thead style="background-color: #a374ca;">
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Brand</th>
                                  <th scope="col">Catagory</th>
                                  <th scope="col">Warrenty</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Number In Stock</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php while($row=mysqli_fetch_array($result)){ ?>
                                <tr>
                                  <td><?php echo $row['ProductID']; ?></td>
                                  <td><?php echo $row['Product_Name']; ?></td>
                                  <td><?php echo $row['Brand']; ?></td>
                                  <td><?php echo $row['Catagory']; ?></td>
                                  <td><?php if($row['Warranty']>=12){
                                    echo floor($row['Warranty']/12) . ' Year ';
                                    if ($row['Warranty']%12>0){
                                    echo $row['Warranty']%12 . ' Months ';}} else{echo $row['Warranty']." Months";}?></td>
                                  <td><?php echo $row['Price']; ?></td>
                                  <td><?php echo $row['NumInStock']; ?></td>
                                  <td><button type="button" class="btn btn-primary d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#Edit<?php echo $row['ProductID']; ?>">Edit</button></td>

                                  <div class="modal fade" id="Edit<?php echo $row['ProductID']; ?>" tabindex="-1" aria-labelledby="Edit<?php echo $row['ProductID']; ?>Label" aria-hidden="true">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="Edit<?php echo $row['ProductID']; ?>Label">Modal title</h5>
									        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									      </div>
									      <div class="modal-body">
									        <form action="" method="post" enctype="multipart/form-data">				          		  
									        	<label for="NumInStock" class="form-label">Quantity</label>
									                <input type="number" class="form-control" id="NumInStock" name="NumInStock" min="0" value="<?php echo $row['NumInStock']; ?>">
									                
									                <label for="price" class="form-label">Price</label>
									                <input type="number" class="form-control" id="Price" name="Price" min="0" value="<?php echo $row['Price']; ?>">
									            
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									        <button type="submit" id="edit<?php echo $row['ProductID']; ?>" name="edit<?php echo $row['ProductID']; ?>" class="btn btn-primary">Save changes</button>
									        <?php
									        $pid="edit".$row['ProductID'];
									        if(isset($_POST[$pid])){
									        	editproducts($row['ProductID'],$_POST['Price'],$_POST['NumInStock']);
									        }
									        ?>
									      </div>
									    </form>
									    </div>
									  </div>
									</div>

                                </tr><?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../PHP/addProduct.php" method="post" enctype="multipart/form-data">
                <label for="Product_Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="Product_Name" name="Product_Name" value="<?php echo isset($productName) ? $productName : ''; ?>">
        
                <div class="form-group">
                  <label for="Catagory" class="form-label">Catagory</label>
                      <select class="form-control" id="Catagory" name="Catagory" >
                          <option value="Access Point">Access Point</option>
                          <option value="ADSL, DSL Router">ADSL, DSL Router</option>
                          <option value="AMD CPU">AMD CPU</option>
                          <option value="AMD Motherboard">AMD Motherboard</option>
                          <option value="Barebone CPU">Barebone CPU</option>
                          <option value="Battery - Alkaline ">Battery - Alkaline </option>
                          <option value="Battery - CMOS">Battery - CMOS</option>
                          <option value="Battery - UPS"> Battery - UPS</option>
                          <option value="Blank CDs">Blank CDs</option>
                          <option value="Blank DVDs">Blank DVDs</option>
                          <option value="Blower">Blower</option>
                          <option value="Branded Desktops">Branded Desktops</option>
                          <option value="Brother Cartridge">Brother Cartridge</option>
                          <option value="Brother Printers">Brother Printers</option>
                          <option value="Cable & Converter">Cable & Converter</option>
                          <option value="Canon Cartridges">Canon Cartridges</option>
                          <option value="Canon Printers">Canon Printers</option>
                          <option value="Canon Toner">Canon Toner</option>
                          <option value="Card Reader">Card Reader</option>
                          <option value="Casing">Casing</option>
                          <option value="Casing & Power Supply Unit">Casing & Power Supply Unit</option>
                          <option value="CD Storage">CD Storage</option>
                          <option value="Cleaner">Cleaner</option>
                          <option value="Computer Toolkit">Computer Toolkit</option>
                          <option value="Controler Card">Controler Card</option>
                          <option value="Converter">Converter</option>
                          <option value="CPU Cooler & Heat sink">CPU Cooler & Heat sink</option> 
                          <option value="Desktop Hard Disk"> Desktop Hard Disk</option>
                          <option value="Desktop RAM">Desktop RAM</option>
                          <option value="Desktops">Desktops</option>
                          <option value="Digital Camera">Digital Camera</option>
                          <option value="DVD Writers">DVD Writers</option>
                          <option value="Epson Cartridges">Epson Cartridges</option>
                          <option value="Epson Printers">Epson Printers</option>
                          <option value="External Hard Disk">External Hard Disk</option>
                          <option value="External SSD">External SSD</option>
                          <option value="Fax Machine">Fax Machine</option>
                          <option value="Hard Disk & Storage">Hard Disk & Storage</option>
                          <option value="Hard Disk Accessories">Hard Disk Accessories</option>
                          <option value="HDD Cables">HDD Cables</option>
                          <option value="Head phone">Head phone</option>
                          <option value="HP Cartridges">HP Cartridges</option>
                          <option value="HP Printers">HP Printers</option>
                          <option value="HP Toner">HP Toner</option>
                          <option value="Ink Refill Kit">Ink Refill Kit</option>
                          <option value="Intel CPU">Intel CPU</option>
                          <option value="Intel Motherboard">Intel Motherboard</option>
                          <option value="Joy Sticks & Game Controllers">Joy Sticks & Game Controllers</option>
                          <option value="Keyboard & Mouse">Keyboard & Mouse</option>
                          <option value="Keyboards">Keyboards</option>
                          <option value="KVM Switch">KVM Switch</option>
                          <option value="Laptop">Laptop</option>
                          <option value="Laptop & Tablet PC">Laptop & Tablet PC</option>
                          <option value="Laptop Adapter">Laptop Adapter</option>
                          <option value="Laptop Bag">Laptop Bag</option>
                          <option value="Laptop Battery">Laptop Battery</option>
                          <option value="Laptop Cooler Fan">Laptop Cooler Fan</option>
                          <option value="Laptop Cooler Pad">Laptop Cooler Pad</option>
                          <option value="Laptop Display Panel">Laptop Display Panel</option>
                          <option value="Laptop DVD Writer">Laptop DVD Writer</option>
                          <option value="Laptop Hard Disk">Laptop Hard Disk</option>
                          <option value="Laptop Keyboard">Laptop Keyboard</option>
                          <option value="Laptop Lock">Laptop Lock</option>
                          <option value="Laptop Motherboard">Laptop Motherboard</option>
                          <option value="Laptop Other Spares">Laptop Other Spares</option>
                          <option value="Laptop Ram">Laptop Ram</option>
                          <option value="Laptop Spares & Accessories">Laptop Spares & Accessories</option>
                          <option value="Megabox Computers">Megabox Computers</option>
                          <option value="Memory Card">Memory Card</option> 
                          <option value="Microphone">Microphone</option>
                          <option value="Mobile Broadband">Mobile Broadband</option>
                          <option value="Monitors">Monitors</option>
                          <option value="Motherboard CPU & RAM">Motherboard CPU & RAM</option>
                          <option value="Mouse">Mouse</option>
                          <option value="Mouse Pad">Mouse Pad</option>
                          <option value="Multimedia Items">Multimedia Items</option>
                          <option value="Network Accessories">Network Accessories</option>
                          <option value="Network Cable">Network Cable</option>
                          <option value="Network Card & Adapters">Network Card & Adapters</option>
                          <option value="Network Switch">Network Switch</option>
                          <option value="Networking & Wifi">Networking & Wifi</option>
                          <option value="Office Softwares"> Office Softwares</option>
                          <option value="Operating Systems">Operating Systems</option>
                          <option value="Other Accessories">Other Accessories</option>
                          <option value="Other Cables">Other Cables</option>
                          <option value="Other Toners">Other Toners</option>
                          <option value="Parallel & Serial Cables">Parallel & Serial Cables</option>
                          <option value="pen drive">pen drive</option>
                          <option value="Point Of Sale Items">Point Of Sale Items</option>
                          <option value="Power Extention Code">Power Extention Code</option>
                          <option value="Power Bank">Power Bank</option>
                          <option value="Power Code">Power Code</option>
                          <option value="Power Supply">Power Supply</option>
                          <option value="Print Server">Print Server</option>
                          <option value="Printer Ribbons">Printer Ribbons</option>
                          <option value="Printers & Cartridges">Printers & Cartridges</option>
                          <option value="Printing Paper">Printing Paper</option>
                          <option value="Projector Accessories">Projector Accessories</option>
                          <option value="Projector Screen">Projector Screen</option>
                          <option value="Projectors">Projectors</option>
                          <option value="Projectors & Accessories">Projectors & Accessories</option>
                          <option value="Samsung Toner">Samsung Toner</option>
                          <option value="Scanner">Scanner</option>
                          <option value="Server Accessories">Server Accessories</option>
                          <option value="Servers">Servers</option>
                          <option value="Software">Software</option>
                          <option value="Sound Card">Sound Card</option>
                          <option value="Speaker">Speaker</option>
                          <option value="SSD">SSD</option>
                          <option value="Tablet PC">Tablet PC</option>
                          <option value="Telephone">Telephone</option>
                          <option value="Telephone Cable">Telephone Cable</option>
                          <option value="TV Cards and Accessories">TV Cards and Accessories</option>
                          <option value="UPS">UPS</option>
                          <option value="USB Cables">USB Cables</option>
                          <option value="USB HUB">USB HUB</option>
                          <option value="VGA Cables">VGA Cables</option>
                          <option value="VGA Card">VGA Card</option>
                          <option value="VGA Card & TV Card">VGA Card & TV Card</option>
                          <option value="VGA Splitter">VGA Splitter</option>
                          <option value="Virus Guards">Virus Guards</option>
                          <option value="Voice Recorder">Voice Recorder</option>
                          <option value="Web & Digital Cameras">Web & Digital Cameras</option>
                          <option value="Web Camera">Web Camera</option>
                      </select>
                </div>
                
                <label for="Brand" class="form-label">Brand</label>
                <input type="text" class="form-control" id="Brand" name="Brand" value="<?php echo isset($productBrand) ? $productBrand : ''; ?>">

                <label for="NumInStock" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="NumInStock" name="NumInStock" min="0" value="<?php echo isset($productQuantity) ? $productQuantity : '0'; ?>">
                
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="Price" name="Price" min="0" value="<?php echo isset($productPrice) ? $productPrice : '0'; ?>">

                <label for="Description" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="Description" name="Description" value="<?php echo isset($productDescription) ? $productDescription : ''; ?>"></textarea>
        
                
                <label for="Warranty" class="form-label">Warranty</label>
                <input type="number" class="form-control" id="Warranty" name="Warranty" min="0" value="<?php echo isset($productWarranty) ? $productWarranty : '0'; ?>">
                
                <label for="file" class="form-label">Images</label>
                <input type="file" class="form-control" id="file" name="file[]" multiple>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Save changes</button></form>
      </div>
    </form>
    </div>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>