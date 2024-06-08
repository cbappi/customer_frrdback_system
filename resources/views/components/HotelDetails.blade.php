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

    <p  class="fs-1 text-center">Exlore Hotel Details in <span id="district-text" class="fs-1 text-center"></span></p>


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
      <div class="col-md-2">
        <p id="email" class="card border border-outline-dark p-2 fs-5 text-center">
            <i class="fas fa-phone"></i> <span id="phone-text"></span>
        </p>
      </div>
      <div class="col-md-8">
        <p id="email" class="card border border-outline-dark p-2 fs-5 text-center">
            <i class="fas fa-map-marker-alt"></i> <span id="address-text"></span>
        </p>
      </div>
      <div class="col-md-2">
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

  </div>
</div>

  <div class="container mt-5" >
    <div class="row">
        <div class="col-md-4">
            <div class="card border border-outline">

                <div class="card-body">
                    <h5 class="card-title">Room Type</h5>
                    <div id ="room-type" class="card-text"></div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border border-outline">

                <div class="card-body">
                    <h5 class="card-title">Hotel Amenities</h5>
                    <div id="amenities" class="card-text"></div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border border-outline">

                <div class="card-body">
                    <h5 class="card-title">Room feature</h5>
                    <p id ="room-feature" class="card-text"></p>

                </div>
            </div>
        </div>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
hotelDetails();
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

      //document.getElementById('hotel_name').innerText = details.hotel_name;
      //document.getElementById('hotel_description').innerText = details.hotel_description;
      document.getElementById('hotel-text').innerText = details.hotel_name;
      document.getElementById('country-text').innerText = details.country;
      document.getElementById('district-text').innerText = details.district;
      document.getElementById('email-text').innerText = details.email;
      document.getElementById('website-text').innerText = details.website;
      document.getElementById('phone-text').innerText = details.phone;
      document.getElementById('address-text').innerText = details.address;
      document.getElementById('discount-text').innerText = details.discount;

      // Clear existing amenities

 document.getElementById('amenities').innerHTML = '';

// Split amenities string and create div for each amenity
details.hotel_amenities.split(',').forEach(amenity => {
  let amenityDiv = document.createElement('div');
  let icon = document.createElement('i');

  //icon.classList.add('fas', 'fa-check'); // Add Font Awesome classes for the icon
  icon.classList.add('fas', 'fa-umbrella-beach');
  //icon.classList.add('fas',  'fa-stack-overflow');
  amenityDiv.appendChild(icon);

  let textNode = document.createTextNode(' ' + amenity.trim());
  amenityDiv.appendChild(textNode);

  amenityDiv.classList.add('amenity'); // Add a class for styling if needed
  amenityDiv.style.backgroundColor = '#fff'; // Dark background color
  amenityDiv.style.color = '#000'; // White text color
  amenityDiv.style.border = '1px solid #000'; // White outline border
  amenityDiv.style.marginRight = '5px'; // Add a right margin of 5px
  amenityDiv.style.marginTop = '5px'; // Add a right margin of 5px
  amenityDiv.style.borderRadius = '5px'; // Add a right margin of 5px
  amenityDiv.style.display = 'inline-block'; // Ensure divs stay side by side
  amenityDiv.style.padding = '5px'; // Add some padding for better appearance

  document.getElementById('amenities').appendChild(amenityDiv);
});

      // Clear existing amenities

document.getElementById('room-feature').innerHTML = '';

// Split amenities string and create div for each amenity
details.room_feature.split(',').forEach(feature => {
  let featureDiv = document.createElement('div');
  let icon = document.createElement('i');

  //icon.classList.add('fas', 'fa-check'); // Add Font Awesome classes for the icon
  icon.classList.add('fas', 'fa-tv');
  //icon.classList.add('fas',  'fa-stack-overflow');
  featureDiv.appendChild(icon);

  let textNode = document.createTextNode(' ' + feature.trim());
  featureDiv.appendChild(textNode);

  featureDiv.classList.add('feature'); // Add a class for styling if needed
  featureDiv.style.backgroundColor = '#fff'; // Dark background color
  featureDiv.style.color = '#000'; // White text color
  featureDiv.style.border = '1px solid #000'; // White outline border
  featureDiv.style.marginRight = '5px'; // Add a right margin of 5px
  featureDiv.style.marginTop = '5px'; // Add a right margin of 5px
  featureDiv.style.borderRadius = '5px'; // Add a right margin of 5px
  featureDiv.style.display = 'inline-block'; // Ensure divs stay side by side
  featureDiv.style.padding = '5px'; // Add some padding for better appearance

  document.getElementById('room-feature').appendChild(featureDiv);
});

 // Clear existing ROOM TYPE
 document.getElementById('room-type').innerHTML = '';

      // Split amenities string and create div for each amenity
      details.room_type.split(',').forEach(type => {
        let typeDiv = document.createElement('div');
        typeDiv.innerHTML = type.trim();
        typeDiv.classList.add('type'); // Add a class for styling if needed
        typeDiv.style.marginTop = '5px'; // Add a right margin of 5px

        document.getElementById('room-type').appendChild(typeDiv);
      });


    } else {
      console.error('No details found for hotel ID:', id);
    }
  } catch (error) {
    console.error('Error fetching hotel details:', error);
  }
}

</script>
