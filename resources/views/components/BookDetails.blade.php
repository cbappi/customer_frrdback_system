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

    <p  class="fs-1 text-center">Explore Book Details  <span id="district-text" class="fs-1 text-center"></span></p>


    <div class="row">
      <div class="col-md-3">

        <p id="website" class="card border border-outline-dark p-2 fs-5 text-center">
            <span >Book name : </span> <span id="bookname-text"></span>
        </p>
      </div>
      <div class="col-md-5">
        <p id="website" class="card border border-outline-dark p-2 fs-5 text-center">
            <span >Author : </span> <span id="author-text"></span>
        </p>

      </div>
      <div class="col-md-4">
        <p id="website" class="card border border-outline-dark p-2 fs-5 text-center">
            <span >Publisher : </span> <span id="publisher-text"></span>
        </p>
      </div>
      <div class="col-md-3">
        <p id="email" class="card border border-outline-dark p-2 fs-5 text-center">
            <span >ISBN : </span><span id="isbn-text"></span>
        </p>
      </div>
      <div class="col-md-2">
        <p id="email" class="card border border-outline-dark p-2 fs-5 text-center">
            <span >Edition : </span><span id="edition-text"></span>
        </p>
      </div>
      <div class="col-md-3">
        <p id="email" class="card border border-outline-dark p-2 fs-5 text-center">
            <span >Pages : </span><span id="pages-text"></span>
        </p>
      </div>
      <div class="col-md-2">
        <p id="email" class="card border border-outline-dark p-2 fs-5 text-center">
            <span >Language : </span><span id="language-text"></span>
        </p>
      </div>

    </div>
  </div>
</div>

<div class="section">
  <div class="container mt-5">

    <div class="row">
      <div class="card border border-outline-dark col-md-3">

          <img id="img11" src="" class="card-img-top" alt="Image 1" style="height: 300px;">

      </div>

      <div class="col-md-9 card border border-outline-dark border p-2 fs-5 text-center">
        <div id="email">
            <span >Book description : </span><span id="bookdes-text"></span>
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
    let res = await axios.get(`/BookDetailsById/${id}`);
    let details = res.data.data;

    if (details) {
      document.getElementById('img11').src = details.image_one;
      document.getElementById('bookname-text').innerText = details.book_name;
      document.getElementById('author-text').innerText = details.author;
      document.getElementById('publisher-text').innerText = details.publisher;
      document.getElementById('isbn-text').innerText = details.isbn;
      document.getElementById('edition-text').innerText = details.edition;
      document.getElementById('pages-text').innerText = details.pages;
      document.getElementById('language-text').innerText = details.language;
      document.getElementById('bookdes-text').innerText = details.book_description;





// Split amenities string and create div for each amenity


      // Clear existing amenities


// Split amenities string and create div for each amenity


 // Clear existing ROOM TYPE


      // Split amenities string and create div for each amenity



    } else {
      console.error('No details found for hotel ID:', id);
    }
  } catch (error) {
    console.error('Error fetching hotel details:', error);
  }
}

</script>
