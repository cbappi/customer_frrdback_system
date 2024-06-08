{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reviews</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body> --}}
    <div class="container mt-5">
        <h1 class="mb-4">Hotel Reviews</h1>
        <div id="reviews"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hotelInfoId = "{{ $hotel_info_id }}";
            axios.get(`/getReviewsByHotel/${hotelInfoId}`)
                .then(response => {
                    const reviews = response.data;
                    const reviewsContainer = document.getElementById('reviews');

                    if (reviews.length === 0) {
                        reviewsContainer.innerHTML = '<p>No reviews available.</p>';
                        return;
                    }

                    let reviewsHtml = '<div class="list-group">';
                    reviews.forEach(review => {
                        reviewsHtml += `
                            <div class="list-group-item">
                                <h5>${review.review_title}</h5>
                                <p>${review.review_des}</p>
                                <p><strong>Rating:</strong> ${review.rating}/5</p>
                                <p><strong>Go With:</strong> ${review.gowith}</p>
                                <p><strong>Year:</strong> ${review.year}</p>
                                <p><strong>Name:</strong> ${review.name}</p>
                                <p><strong>Email:</strong> ${review.email}</p>
                                <small><strong>Created at:</strong> ${new Date(review.created_at).toLocaleDateString()}</small>
                            </div>
                        `;
                    });
                    reviewsHtml += '</div>';
                    reviewsContainer.innerHTML = reviewsHtml;
                })
                .catch(error => {
                    console.error('Error fetching reviews:', error);
                    document.getElementById('reviews').innerHTML = '<p>Error loading reviews. Please try again later.</p>';
                });
        });
    </script>
</body>
</html>
