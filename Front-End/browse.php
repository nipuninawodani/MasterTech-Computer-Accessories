<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Browse</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/star.css" rel="stylesheet">
    <link rel='stylesheet' href='https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css'>

  </head>
  <body style="background-color:#EBEBEB">
  <?php include "header.php" ?>
  <div class="containor" style="margin-top:120px">
    <div class="row">
        <div class="col-1">
        </div>
        <div class="col-11">
        <h3>Categories</h3>
          <div class ="row">
            <div class = "col-2">
              <h6 class="text-primary">A...</h6>
              <a class="link-success" href="./search.php?search=Access Point">Access Point</a><br>
              <a class="link-success" href="./search.php?search=ADSL, DSL Router">ADSL, DSL Router</a><br>
              <a class="link-success" href="./search.php?search=AMD CPU">AMD CPU</a><br>
              <a class="link-success" href="./search.php?search=AMD Motherboard">AMD Motherboard</a><br>
              <h6 class="text-primary">B...</h6>
              <a class="link-success" href="./search.php?search=Barebone CPU">Barebone CPU</a><br>
              <a class="link-success" href="./search.php?search=Battery - Alkaline ">Battery - Alkaline </a><br>
              <a class="link-success" href="./search.php?search=Battery - CMOS">Battery - CMOS</a><br>
              <a class="link-success" href="./search.php?search=Battery - UPS"> Battery - UPS</a><br>
              <a class="link-success" href="./search.php?search=Blank CDs">Blank CDs</a><br>
              <a class="link-success" href="./search.php?search=Blank DVDs">Blank DVDs</a><br>
              <a class="link-success" href="./search.php?search=Blower">Blower</a><br>
              <a class="link-success" href="./search.php?search=Branded Desktops">Branded Desktops</a><br>
              <a class="link-success" href="./search.php?search=Brother Cartridge">Brother Cartridge</a><br>
              <a class="link-success" href="./search.php?search=Brother Printers">Brother Printers</a><br>
              <h6 class="text-primary">C...</h6>
              <a class="link-success" href="./search.php?search=Cable & Converter">Cable & Converter</a><br>
              <a class="link-success" href="./search.php?search=Canon Cartridges">Canon Cartridges</a><br>
              <a class="link-success" href="./search.php?search=Canon Printers">Canon Printers</a><br>
              <a class="link-success" href="./search.php?search=Canon Toner">Canon Toner</a><br>
              <a class="link-success" href="./search.php?search=Card Reader">Card Reader</a><br>
              <a class="link-success" href="./search.php?search=Casing">Casing</a><br>
              <a class="link-success" href="./search.php?search=Casing & Power Supply Unit">Casing & Power Supply Unit</a><br>
              <a class="link-success" href="./search.php?search=CD Storage">CD Storage</a><br>
              <a class="link-success" href="./search.php?search=Cleaner">Cleaner</a><br>
              <a class="link-success" href="./search.php?search=Computer Toolkit">Computer Toolkit</a><br>
              <a class="link-success" href="./search.php?search=Controler Card">Controler Card</a><br>
              <a class="link-success" href="./search.php?search=Converter">Converter</a><br>
              <a class="link-success" href="./search.php?search=CPU Cooler & Heat sink">CPU Cooler & Heat sink</a><br>
            </div>
            <div class = "col-2">
              <h6 class="text-primary">D...</h6> 
              <a class="link-success" href="./search.php?search=Desktop Hard Disk"> Desktop Hard Disk</a><br>
              <a class="link-success" href="./search.php?search=Desktop RAM">Desktop RAM</a><br>
              <a class="link-success" href="./search.php?search=Desktops">Desktops</a><br>
              <a class="link-success" href="./search.php?search=Digital Camera">Digital Camera</a><br>
              <a class="link-success" href="./search.php?search=DVD Writers">DVD Writers</a><br>
              <h6 class="text-primary">E...</h6>
              <a class="link-success" href="./search.php?search=Epson Cartridges">Epson Cartridges</a><br>
              <a class="link-success" href="./search.php?search=Epson Printers">Epson Printers</a><br>
              <a class="link-success" href="./search.php?search=External Hard Disk">External Hard Disk</a><br>
              <a class="link-success" href="./search.php?search=External SSD">External SSD</a><br>
              <h6 class="text-primary">F...</h6>
              <a class="link-success" href="./search.php?search=Fax Machine">Fax Machine</a><br>
              <h6 class="text-primary">G...</h6>
              <h6 class="text-primary">H...</h6>
              <a class="link-success" href="./search.php?search=Hard Disk & Storage">Hard Disk & Storage</a><br>
              <a class="link-success" href="./search.php?search=Hard Disk Accessories">Hard Disk Accessories</a><br>
              <a class="link-success" href="./search.php?search=HDD Cables">HDD Cables</a><br>
              <a class="link-success" href="./search.php?search=Head phone">Head phone</a><br>
              <a class="link-success" href="./search.php?search=HP Cartridges">HP Cartridges</a><br>
              <a class="link-success" href="./search.php?search=HP Printers">HP Printers</a><br>
              <a class="link-success" href="./search.php?search=HP Toner">HP Toner</a><br>
              <h6 class="text-primary">I...</h6>
              <a class="link-success" href="./search.php?search=Ink Refill Kit">Ink Refill Kit</a><br>
              <a class="link-success" href="./search.php?search=Intel CPU">Intel CPU</a><br>
              <a class="link-success" href="./search.php?search=Intel Motherboard">Intel Motherboard</a><br>
              <h6 class="text-primary">J...</h6>
              <a class="link-success" href="./search.php?search=Joy Sticks & Game Controllers">Joy Sticks & Game Controllers</a><br>
                            </div>
            <div class = "col-2">
              <h6 class="text-primary">K...</h6>
              <a class="link-success" href="./search.php?search=Keyboard & Mouse">Keyboard & Mouse</a><br>
              <a class="link-success" href="./search.php?search=Keyboards">Keyboards</a><br>
            
              <a class="link-success" href="./search.php?search=KVM Switch">KVM Switch</a><br>
              <h6 class="text-primary">L...</h6>
              <a class="link-success" href="./search.php?search=Laptop">Laptop</a><br>
              <a class="link-success" href="./search.php?search=Laptop & Tablet PC">Laptop & Tablet PC</a><br>
              <a class="link-success" href="./search.php?search=Laptop Adapter">Laptop Adapter</a><br>
              <a class="link-success" href="./search.php?search=Laptop Bag">Laptop Bag</a><br>
              <a class="link-success" href="./search.php?search=Laptop Battery">Laptop Battery</a><br>
              <a class="link-success" href="./search.php?search=Laptop Cooler Fan">Laptop Cooler Fan</a><br>
              <a class="link-success" href="./search.php?search=Laptop Cooler Pad">Laptop Cooler Pad</a><br>
              <a class="link-success" href="./search.php?search=Laptop Display Panel">Laptop Display Panel</a><br>
              <a class="link-success" href="./search.php?search=Laptop DVD Writer">Laptop DVD Writer</a><br>
              <a class="link-success" href="./search.php?search=Laptop Hard Disk">Laptop Hard Disk</a><br>
              <a class="link-success" href="./search.php?search=Laptop Keyboard">Laptop Keyboard</a><br>
              <a class="link-success" href="./search.php?search=Laptop Lock">Laptop Lock</a><br>
              <a class="link-success" href="./search.php?search=Laptop Motherboard">Laptop Motherboard</a><br>
              <a class="link-success" href="./search.php?search=Laptop Other Spares">Laptop Other Spares</a><br>
              <a class="link-success" href="./search.php?search=Laptop Ram">Laptop Ram</a><br>
              <a class="link-success" href="./search.php?search=Laptop Spares & Accessories">Laptop Spares & Accessories</a><br>
              <h6 class="text-primary">M...</h6>
              <a class="link-success" href="./search.php?search=Megabox Computers">Megabox Computers</a><br>
              <a class="link-success" href="./search.php?search=Memory Card">Memory Card</a><br> 
              <a class="link-success" href="./search.php?search=Microphone">Microphone</a><br>
              <a class="link-success" href="./search.php?search=Mobile Broadband">Mobile Broadband</a><br>
              <a class="link-success" href="./search.php?search=Monitors">Monitors</a><br>
              <a class="link-success" href="./search.php?search=Motherboard CPU & RAM">Motherboard CPU & RAM</a><br>
              <a class="link-success" href="./search.php?search=Mouse">Mouse</a><br>
              <a class="link-success" href="./search.php?search=Mouse Pad">Mouse Pad</a><br>
              <a class="link-success" href="./search.php?search=Multimedia Items">Multimedia Items</a><br>
            </div>
            <div class = "col-2">
              <h6 class="text-primary">N...</h6>
              <a class="link-success" href="./search.php?search=Network Accessories">Network Accessories</a><br>
              <a class="link-success" href="./search.php?search=Network Cable">Network Cable</a><br>
              <a class="link-success" href="./search.php?search=Network Card & Adapters">Network Card & Adapters</a><br>
              <a class="link-success" href="./search.php?search=Network Switch">Network Switch</a><br>
              <a class="link-success" href="./search.php?search=Networking & Wifi">Networking & Wifi</a><br>
              <h6 class="text-primary">O...</h6>
              <a class="link-success" href="./search.php?search=Office Softwares"> Office Softwares</a><br>
              <a class="link-success" href="./search.php?search=Operating Systems">Operating Systems</a><br>
              <a class="link-success" href="./search.php?search=Other Accessories">Other Accessories</a><br>
              <a class="link-success" href="./search.php?search=Other Cables">Other Cables</a><br>
              <a class="link-success" href="./search.php?search=Other Toners">Other Toners</a><br>
              <h6 class="text-primary">P...</h6>
              <a class="link-success" href="./search.php?search=Parallel & Serial Cables">Parallel & Serial Cables</a><br>
              <a class="link-success" href="./search.php?search=pen drive">pen drive</a><br>
              <a class="link-success" href="./search.php?search=Point Of Sale Items">Point Of Sale Items</a><br>
              <a class="link-success" href="./search.php?search=Power Extention Code">Power Extention Code</a><br>
              <a class="link-success" href="./search.php?search=Power Bank">Power Bank</a><br>
              <a class="link-success" href="./search.php?search=Power Code">Power Code</a><br>
              <a class="link-success" href="./search.php?search=Power Supply">Power Supply</a><br>
              <a class="link-success" href="./search.php?search=Print Server">Print Server</a><br>
              <a class="link-success" href="./search.php?search=Printer Ribbons">Printer Ribbons</a><br>
              <a class="link-success" href="./search.php?search=Printers & Cartridges">Printers & Cartridges</a><br>
              <a class="link-success" href="./search.php?search=Printing Paper">Printing Paper</a><br>
              <a class="link-success" href="./search.php?search=Projector Accessories">Projector Accessories</a><br>
              <a class="link-success" href="./search.php?search=Projector Screen">Projector Screen</a><br>
              <a class="link-success" href="./search.php?search=Projectors">Projectors</a><br>
              <a class="link-success" href="./search.php?search=Projectors & Accessories">Projectors & Accessories</a><br>
              <h6 class="text-primary">Q...</h6>
              <h6 class="text-primary">R...</h6>
              </div>
            <div class = "col-2">
              <h6 class="text-primary">S...</h6>
              <a class="link-success" href="./search.php?search=Samsung Toner">Samsung Toner</a><br>
              <a class="link-success" href="./search.php?search=Scanner">Scanner</a><br>
              <a class="link-success" href="./search.php?search=Server Accessories">Server Accessories</a><br>
              <a class="link-success" href="./search.php?search=Servers">Servers</a><br>
              <a class="link-success" href="./search.php?search=Software">Software</a><br>
              <a class="link-success" href="./search.php?search=Sound Card">Sound Card</a><br>
              <a class="link-success" href="./search.php?search=Speaker">Speaker</a><br>
              <a class="link-success" href="./search.php?search=SSD">SSD</a><br>
              <h6 class="text-primary">T...</h6>
              <a class="link-success" href="./search.php?search=Tablet PC">Tablet PC</a><br>
              <a class="link-success" href="./search.php?search=Telephone">Telephone</a><br>
              <a class="link-success" href="./search.php?search=Telephone Cable">Telephone Cable</a><br>
              <a class="link-success" href="./search.php?search=TV Cards and Accessories">TV Cards and Accessories</a><br>
              <h6 class="text-primary">U...</h6>
              <a class="link-success" href="./search.php?search=UPS">UPS</a><br>
              <a class="link-success" href="./search.php?search=USB Cables">USB Cables</a><br>
              <a class="link-success" href="./search.php?search=USB HUB">USB HUB</a><br>
              <h6 class="text-primary">V...</h6>
              <a class="link-success" href="./search.php?search=VGA Cables">VGA Cables</a><br>
              <a class="link-success" href="./search.php?search=VGA Card">VGA Card</a><br>
              <a class="link-success" href="./search.php?search=VGA Card & TV Card">VGA Card & TV Card</a><br>
              <a class="link-success" href="./search.php?search=VGA Splitter">VGA Splitter</a><br>
              <a class="link-success" href="./search.php?search=Virus Guards">Virus Guards</a><br>
              <a class="link-success" href="./search.php?search=Voice Recorder">Voice Recorder</a><br>
              <h6 class="text-primary">W...</h6>
              <a class="link-success" href="./search.php?search=Web & Digital Cameras">Web & Digital Cameras</a><br>
              <a class="link-success" href="./search.php?search=Web Camera">Web Camera</a><br>
              <h6 class="text-primary">X...</h6>
              <h6 class="text-primary">Y...</h6>
              <h6 class="text-primary">Z...</h6>
            </div><br><br>

        </div>
    </div>
  </div>

</body>
</html>


