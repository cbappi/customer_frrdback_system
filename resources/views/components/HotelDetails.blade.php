<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Details</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    .custom-height {
      height: 50px; /* Example height, you can set any height */
      border: 1px solid #ccc; /* Optional, for visualization */
    }
  </style>
</head>
<body>
<div class="section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-2">

        <p id="website" class="card border border-outline-dark p-2 fs-5 text-center">
            <i class="fas fa-flag"></i>  <span id="country-text"></span>
        </p>
      </div>
      <div class="col-md-4">
        <p id="website" class="card border border-outline-dark p-2 fs-5 text-center">
            <i class="fas fa-hotel"></i>  <span id="hotel-text"></span>
        </p>

      </div>
      <div class="col-md-3">
        <p id="website" class="card border border-outline-dark p-2 fs-5 text-center">
          <i class="fas fa-globe"></i> <span id="website-text"></span>
        </p>
      </div>
      <div class="col-md-3">
        <p id="email" class="card border border-outline-dark p-2 fs-5 text-center">
          <i class="fas fa-envelope"></i> <span id="email-text"></span>
        </p>
      </div>
      <div class="col-md-3">
        <p id="email" class="card border border-outline-dark p-2 fs-5 text-center">
            <i class="fas fa-phone"></i> <span id="phone-text"></span>
        </p>
      </div>
      <div class="col-md-6">
        <p id="email" class="card border border-outline-dark p-2 fs-5 text-center">
            <i class="fas fa-map-marker-alt"></i> <span id="address-text"></span>
        </p>
      </div>
      <div class="col-md-3">
        <p id="email" class="card border border-outline-dark p-2 fs-5 text-center">
            <i class="fas fa-tags"></i><span id="discount-text"></span>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container mt-5">
    <h3>Hotel Details</h3>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img id="img11" src="" class="card-img-top" alt="Image 1" style="height: 300px;">
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img id="img12" src="" class="card-img-top" alt="Image 2" style="height: 300px;">
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img id="img13" src="" class="card-img-top" alt="Image 3" style="height: 300px;">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h4 id="hotel_name"></h4>
        <p id="hotel_description"></p>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    hotelDetails();
  });

  async function hotelDetails() {
    let searchParams = new URLSearchParams(window.location.search);
    let id = searchParams.get('id');
    if (!id) {
      console.error('No hotel ID provided in URL');
      return;
    }

    try {
      let res = await axios.get(`/HotelDetailsById/${id}`);
      let details = res.data.data;

      if (details) {
        document.getElementById('img11').src = details.image_one;
        document.getElementById('img12').src = details.image_two;
        document.getElementById('img13').src = details.image_three;

        document.getElementById('hotel_name').innerText = details.hotel_name;
        document.getElementById('hotel_description').innerText = details.hotel_description;
        document.getElementById('hotel-text').innerText = details.hotel_name;
        document.getElementById('country-text').innerText = details.country;
        document.getElementById('email-text').innerText = details.email;
        document.getElementById('website-text').innerText = details.website;
        document.getElementById('phone-text').innerText = details.phone;
        document.getElementById('address-text').innerText = details.address;
        document.getElementById('discount-text').innerText = details.discount;
      } else {
        console.error('No details found for hotel ID:', id);
      }
    } catch (error) {
      console.error('Error fetching hotel details:', error);
    }
  }
</script>
</body>
</html>
