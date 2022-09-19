<?php
    include "includes/head_links.php";
?>
<?php
    include "includes/header.php";
?>

<div class="container p-5 mt-5 bg-light border border-2 border-warning rounded-3">
  <form>
    <h2 class="fw-bold pb-5">Contact Us</h2>
    <div class="row g-3">
      <div class="col-sm-4">
        <input type="text" class="form-control" placeholder="Full Name*" aria-label="FullName" />
      </div>
      <div class="col-sm-4">
        <input type="email" class="form-control" placeholder="Work Email*" aria-label="WorkEmail" />
      </div>
      <div class="col-sm-4">
        <input type="tel" class="form-control" placeholder="Ph.no*" aria-label="phno" />
      </div>
    </div>
    <div class="row g-3 my-2">
      <div class="col-sm-4">
        <select class="form-select form-select-lable" aria-label=".form-select-sm example">
          <option selected>Company Type</option>
          <option value="1">Startup</option>
          <option value="2">Consultant</option>
          <option value="3">Small Company</option>
          <option value="4">Enterprise</option>
          <option value="5">Other</option>
        </select>
      </div>

      <div class="col-sm-4">
        <input type="text" class="form-control" placeholder="No. of peoples (eg. 0-5)*" aria-label="FullName" />
      </div>
      <div class="col-sm-4">
        <select class="form-select form-select-lable" aria-label=".form-select-sm example">
          <option selected>Office Type</option>
          <option value="1">FLEXI DESK</option>
          <option value="2">DEDICATED DESK</option>
          <option value="3">BIG PRIVATE CABIN</option>
          <option value="4">ENTERPRISE OFFICE</option>
          <option value="5">REGISTER OFFICEE</option>
          <option value="6">DAY PASS</option>
          <option value="7">WEEKEND PASS</option>
        </select>
      </div>
    </div>
    <div class="row g-3 my-2">
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
    </div>

    <div class="text-right">
      <button type="submit" class="btn btn-primary mt-5 px-5 ">Submit</button>
    </div>
  </form>
</div>