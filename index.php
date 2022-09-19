<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome | Friday</title>

  <?php
  include "includes/head_links.php";
  ?>
  <link href="css/home.css" rel="stylesheet" />
</head>

<body>
  <?php
  include "includes/header.php";
  ?>

  <div class="banner-container">
    <h2 class="white pb-3 fw-bold fs-1">Work Independently, Not Alone.</h2>

    <form id="search-form" action="property_list.php" method="GET">
      <div class="input-group city-search">
        <input type="text" class="form-control input-city" id="city" name="city" placeholder="Enter your city to search for Working space" />
        <div class="input-group-append">
          <button type="submit" class="btn btn-secondary">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>

  <div class="card text-center px-5">
    <div class="card-body m-5">
      <h1 class="card-title">Best Co-Working Space in different cities</h1>
      <p class="card-text pt-5">
        Work cultures are evolving and workspaces are changing. Go ahead, take
        your work to a place that lets you explore more & succeed more.
        Welcome to Friday in different cities, for a premium coworking
        experience. Available in many cities, at the heart of Pune’s most
        developed business hubs, Friday gives a premium, next-age co-working
        destination for your business venture to connect, interact and grow
        with like-minded professionals.
      </p>
    </div>
    <div class="container pb-5">
      <div class="row">
        <div class="col bg-primary p-5 m-2">
          <h4>75 EXCLUSIVE WORKSTATIONS</h4>
        </div>
        <div class="col bg-warning p-5 m-2">
          <h4>09 PAY-PER USE PLANS</h4>
        </div>
        <div class="col bg-info p-5 m-2">
          <h4>3000 SQ.FT. ROOFTOP AMENITIES</h4>
        </div>
        <div class="col bg-success p-5 m-2">
          <h4>360 ALL ROUND GREEN VIEW</h4>
        </div>
      </div>
    </div>
  </div>

  <!-- Cities -->
  <div class="page-container">
    <h1 class="city-heading">Major Cities</h1>
    <div class="row">
      <div class="city-card-container col-md">
        <a href="./user/add_booking.php">
          <div class="city-card rounded-circle">
            <img src="img/Pune.png" class="city-img" />
          </div>
        </a>
      </div>

      <div class="city-card-container col-md">
        <a href="./user/add_booking.php">
          <div class="city-card rounded-circle">
            <img src="img/mumbai.png" class="city-img" />
          </div>
        </a>
      </div>

      <div class="city-card-container col-md">
        <a href="./user/add_booking.php">
          <div class="city-card rounded-circle">
            <img src="img/bangalore.png" class="city-img" />
          </div>
        </a>
      </div>

      <div class="city-card-container col-md">
        <a href="./user/add_booking.php">
          <div class="city-card rounded-circle">
            <img src="img/hyderabad.png" class="city-img" />
          </div>
        </a>
      </div>
    </div>
  </div>

  <!-- Amenities -->

  <div class="container-fluid my-5 bg-dark p-5">
    <h1 class="text-white text-center fw-bold pb-3 ">Amenities</h1>
    <div class="row d-flex justify-content-center">
      <div class="col-sm-3 pb-3">
        <div class="card bg-light d-flex align-items-center">
          <i class="fas fa-temperature-high fa-3x pt-3"></i>
          <div class="card-body text-center">
            <p class="card-text font-weight-bold text-uppercase">
              Centralised AC
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 pb-3">
        <div class="card bg-light d-flex align-items-center">
          <i class="fas fa-chalkboard fa-3x pt-3"></i>
          <div class="card-body text-center">
            <p class="card-text font-weight-bold text-uppercase">
              Conference rooms
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 pb-3">
        <div class="card bg-light d-flex align-items-center">
          <i class="fas fa-wifi fa-3x pt-3"></i>
          <div class="card-body text-center">
            <p class="card-text font-weight-bold text-uppercase">
              High-speed 200 Mbps WiFi
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 pb-3">
        <div class="card bg-light d-flex align-items-center">
          <i class="fas fa-campground fa-3x pt-3"></i>
          <div class="card-body text-center">
            <p class="card-text font-weight-bold text-uppercase">
              3,000 sq. ft. rooftop lounge
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 pb-3">
        <div class="card bg-light d-flex align-items-center">
          <i class="fas fa-table-tennis fa-3x pt-3"></i>
          <div class="card-body text-center">
            <p class="card-text font-weight-bold text-uppercase">
              Gaming zone
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 pb-3">
        <div class="card bg-light d-flex align-items-center">
          <i class="fas fa-users fa-3x pt-3"></i>
          <div class="card-body text-center">
            <p class="card-text font-weight-bold text-uppercase">
              Dedicated friaday management team
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 pb-3">
        <div class="card bg-light d-flex align-items-center">
          <i class="fas fa-male fa-3x pt-3"></i>
          <div class="card-body text-center">
            <p class="card-text font-weight-bold text-uppercase">
              Guest management
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 pb-3">
        <div class="card bg-light d-flex align-items-center">
          <i class="fas fa-comment fa-3x pt-3"></i>
          <div class="card-body text-center">
            <p class="card-text font-weight-bold text-uppercase">
              Events with guest speakers
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 pb-3">
        <div class="card bg-light d-flex align-items-center">
          <i class="fas fa-heartbeat fa-3x pt-3"></i>
          <div class="card-body text-center">
            <p class="card-text font-weight-bold text-uppercase">
              Health and wellness initiative
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 pb-3">
        <div class="card bg-light d-flex align-items-center">
          <i class="fas fa-quidditch fa-3x pt-3"></i>
          <div class="card-body text-center">
            <p class="card-text font-weight-bold text-uppercase">
              Weekly deep cleaning
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- banner? -->
  <div class="container-fluid d-flex justify-content-center pb-5">
    <img class="img-fluid" src="img/bg3.png" alt="" />
  </div>

  <!-- offer -->
  <div class="container-fluid  py-5 bg-warning">
    <h1 class="p-3 fw-bold text-uppercase text-center">What's on offer</h1>
    <div class="row  d-flex justify-content-center">

      <div class="card m-5" style="width: 25rem">
        <div class="card-body">
          <h5 class="card-title fs-5 fw-bold">FLEXI DESK</h5>
          <p class="fs-6 fw-bold text-uppercase">1-4 people</p>
          <hr />
          <p class="card-text">
            Get an assured space, every day you walk into work at friday. The
            place might change, but the comfort will be the same.
          </p>
        </div>
        <hr />
        <div class="card-body d-flex">
          <p class="fs-6 fw-bold text-uppercase">
            <i class="fas fa-rupee-sign"></i>12,500/-
          </p>
          <p class="pr-5 mr-2">Per Person</p>
          <a href="./user/add_booking.php" class="card-link">
            <i class="fas fa-plus-square fa-2x"></i></a>
        </div>
      </div>

      <div class="card m-5" style="width: 25rem">
        <div class="card-body">
          <h5 class="card-title fs-5 fw-bold">DEDICATED DESK</h5>
          <p class="fs-6 fw-bold text-uppercase">1-4 people</p>
          <hr />
          <p class="card-text">
            If you don’t want to change your place and need a fixed space,
            Dedicated Desk at friday. is just what you are looking for.
          </p>
        </div>
        <hr />
        <div class="card-body d-flex">
          <p class="fs-6 fw-bold text-uppercase">
            <i class="fas fa-rupee-sign"></i>14,500/-
          </p>
          <p class="pr-5 mr-2">Per Person</p>
          <a href="./user/add_booking.php" class="card-link"><i class="fas fa-plus-square fa-2x"></i></a>
        </div>
      </div>

      <div class="card m-5" style="width: 25rem">
        <div class="card-body">
          <h5 class="card-title fs-5 fw-bold">BIG PRIVATE CABIN</h5>
          <p class="fs-6 fw-bold text-uppercase">4-9 people</p>
          <hr />
          <p class="card-text">
            You are a team working together and need privacy? A big private
            cabin is perfectly suited for your team of professionals.
          </p>
        </div>
        <hr />
        <div class="card-body d-flex">
          <p class="fs-6 fw-bold text-uppercase">
            <i class="fas fa-rupee-sign"></i>14,500/-
          </p>
          <p class="pr-5 mr-2">Per Person</p>
          <a href="./user/add_booking.php" class="card-link"><i class="fas fa-plus-square fa-2x"></i></a>
        </div>
      </div>

      <div class="card m-5" style="width: 25rem">
        <div class="card-body">
          <h5 class="card-title fs-5 fw-bold">ENTERPRISE OFFICE</h5>
          <p class="fs-6 fw-bold text-uppercase"></p>
          <hr />
          <p class="card-text">
            You have a team of more than 15 people who need a dynamic space? Well, this is the perfect subscription with great deals.
          </p>
        </div>
        <hr />
        <div class="card-body d-flex">
          <p class="fs-6 fw-bold text-uppercase">
            <i class="fas fa-rupee-sign"></i>Call for details
          </p>
          <p class="pr-5 mr-2">Per Person</p>
          <a href="./user/add_booking.php" class="card-link"><i class="fas fa-plus-square fa-2x"></i></a>
        </div>
      </div>

      <div class="card m-5" style="width: 25rem">
        <div class="card-body">
          <h5 class="card-title fs-5 fw-bold">50 HOURS</h5>
          <p class="fs-6 fw-bold text-uppercase"></p>
          <hr />
          <p class="card-text">
            More time at the office is what you eventually end up with? Here’s a Friday. plan that meets your needs.
          </p>
        </div>
        <hr />
        <div class="card-body d-flex">
          <p class="fs-6 fw-bold text-uppercase">
            <i class="fas fa-rupee-sign"></i>7,500/-
          </p>
          <p class="pr-5 mr-2">Per Person per month</p>
          <a href="./user/add_booking.php" class="card-link"><i class="fas fa-plus-square fa-2x"></i></a>
        </div>
      </div>

      <div class="card m-5" style="width: 25rem">
        <div class="card-body">
          <h5 class="card-title fs-5 fw-bold">30 HOURS</h5>
          <p class="fs-6 fw-bold text-uppercase"></p>
          <hr />
          <p class="card-text">
            You are a consultant who doesn’t log in too many hours at the office? Subscribe to this efficient plan at friday.
          </p>
        </div>
        <hr />
        <div class="card-body d-flex">
          <p class="fs-6 fw-bold text-uppercase">
            <i class="fas fa-rupee-sign"></i>5,500/-
          </p>
          <p class="pr-5 mr-2">Per Person per month</p>
          <a href="./user/add_booking.php" class="card-link"><i class="fas fa-plus-square fa-2x"></i></a>
        </div>
      </div>

      <div class="card m-5" style="width: 25rem">
        <div class="card-body">
          <h5 class="card-title fs-5 fw-bold">REGISTER OFFICE</h5>
          <p class="fs-6 fw-bold text-uppercase"></p>
          <hr />
          <p class="card-text">
            Just need an address for your organisation for receiving mails, workspaces and other correspondence? Check this out.
          </p>
        </div>
        <hr />
        <div class="card-body d-flex">
          <p class="fs-6 fw-bold text-uppercase">
            <i class="fas fa-rupee-sign"></i>3,500/-
          </p>
          <p class="pr-5 mr-2">Per month</p>
          <a href="./user/add_booking.php" class="card-link"><i class="fas fa-plus-square fa-2x"></i></a>
        </div>
      </div>

      <div class="card m-5" style="width: 25rem">
        <div class="card-body">
          <h5 class="card-title fs-5 fw-bold">WEEKEND PASS</h5>
          <p class="fs-6 fw-bold text-uppercase"></p>
          <hr />
          <p class="card-text">
            You are the one who loves to work on the weekends? Friday has a special facility for you to work comfortably.
          </p>
        </div>
        <hr />
        <div class="card-body d-flex">
          <p class="fs-6 fw-bold text-uppercase">
            <i class="fas fa-rupee-sign"></i>5,500/-
          </p>
          <p class="pr-5 mr-2"> Per person per month</p>
          <a href="./user/add_booking.php" class="card-link"><i class="fas fa-plus-square fa-2x"></i></a>
        </div>
      </div>

      <div class="card m-5" style="width: 25rem">
        <div class="card-body">
          <h5 class="card-title fs-5 fw-bold">DAY PASS</h5>
          <p class="fs-6 fw-bold text-uppercase"></p>
          <hr />
          <p class="card-text">
            If you don’t want long-term commitment and want to just drop by for a day, we have a plan that fits your impromptu needs.
          </p>
        </div>
        <hr />
        <div class="card-body d-flex">
          <p class="fs-6 fw-bold text-uppercase">
            <i class="fas fa-rupee-sign"></i>1,200/-
          </p>
          <p class="pr-5 mr-2"> Per day</p>
          <a href="./user/add_booking.php" class="card-link"><i class="fas fa-plus-square fa-2x"></i></a>
        </div>
      </div>

    </div>
  </div>

  <?php
  include "includes/signup_modal.php";
  include "includes/login_modal.php";
  include "includes/footer.php";
  ?>
</body>

</html>