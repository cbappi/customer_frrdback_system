
<?

<div class="container mt-5">
    <h2 class="text-center" style="color:#9b9797;">Reviews for <span id="HotelName"></span></h2>
    <div id="averageRating" class="row justify-content-center mt-3"></div>

    <div class="row mt-4">
        <div class="col-md-4 mb-2">
            <button class="btn btn-primary w-100 filter-btn active" data-filter="all">All Reviews</button>
        </div>
        <div class="col-md-4 mb-2">
            <button class="btn btn-secondary w-100 filter-btn" data-filter="excellent">Excellent Reviews</button>
        </div>
        <div class="col-md-4 mb-2">
            <button class="btn btn-success w-100 filter-btn" data-filter="good">Good Reviews</button>
        </div>
        <div class="col-md-4 mb-2">
            <button class="btn btn-info w-100 filter-btn" data-filter="average">Average Reviews</button>
        </div>
        <div class="col-md-4 mb-2">
            <button class="btn btn-warning w-100 filter-btn" data-filter="poor">Poor Reviews</button>
        </div>
        <div class="col-md-4 mb-2">
            <button class="btn btn-danger w-100 filter-btn" data-filter="worse">Worse Reviews</button>
        </div>
    </div>

    <div id="reviewList" class="row justify-content-center mt-3"></div>
</div>

<style>
    .review-card {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 10px;
    }
    .review-card h3 {
        font-size: 1.5em;
        margin-bottom: 10px;
    }
    .review-card p {
        font-size: 1em;
        margin-bottom: 10px;
    }
    .review-card .rating {
        font-size: 1.2em;
        color: #ffc107;
    }

    .review-des {
        font-style: italic;
        font-family: 'Times New Roman', Times, serif;
        color: #555;
    }

    .review-title {
        font-family: 'Times New Roman', Times, serif;
        color: #555;
        font-size: 24px;
    }

    .review-text {
        font-family: 'Times New Roman', Times, serif;
        color: #555;
        font-size: 17px;
    }

    .reviewer-info {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .rating {
        width: 100%;
        display: flex;
        margin: auto;
        justify-content: center;
        align-items: center;
    }
    .product_rate {
        height: 20px;
    }

    .filter-btn {
        cursor: pointer;
    }

    .filter-btn.active {
        background-color: #007bff;
        color: white;
    }
</style>

<script>
ByHotelReviews();

async function ByHotelReviews() {
    let searchParams = new URLSearchParams(window.location.search);
    let id = searchParams.get('id');
    let res = await axios.get(`/ListReviewsByBookId/${id}`);
    let hotelRes = await axios.get(`/BookDetailsById/${id}`);
    $("#reviewList").empty();
    $("#HotelName").text(hotelRes.data['data']['book_name']);
    let reviewList = $("#reviewList");

    let totalRating = 0;
    let reviewCount = res.data['data'].length;

    res.data['data'].forEach((review, i) => {
        let formattedDate = formatDate(review['created_at']);
        totalRating += review['rating'];

        let EachReview = `
            <div class="col-md-12 review-card" data-rating="${review['rating']}">
                <div class="reviewer-info">
                    <img class="fluid" src="${review['image_one']}" alt="product_img9" style="border-radius:50%;width:50px;height:50px;">
                    <div>
                        <p class="ms-2 review-text"><strong>${review['name']}</strong> wrote a review on ${formattedDate}</p>
                    </div>
                </div>

                <div class="rating_wrap">
                    <div class="rating">
                        <div class="product_rate" style="width:${review['rating']}%;"></div>
                    </div>
                </div>

                <p class="review-title">${review['review_title']}</p>
                <p class="review-des">${review['review_des']}</p>

                <hr>
            </div>`;
        reviewList.append(EachReview);
    });

    // Calculate the average rating (in the 1-5 scale)
    let averageRating = (totalRating / reviewCount) / 20;
    let averageRatingPercentage = (averageRating / 5) * 100;

    let averageRatingHtml = `
        <h3 class="text-center" style="color:#9b9797;">Average Rating</h3>
        <div class="d-flex justify-content-center align-items-center">
            <div class="rating_wrap">
                <div class="rating">
                    <div class="product_rate" style="width:${averageRatingPercentage}%;"></div>
                </div>
            </div>
            <span class="ms-2">${averageRating.toFixed(1)}</span>
        </div>
    `;

    $("#averageRating").append(averageRatingHtml);

    // Add click event listeners to filter buttons
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', function() {
            filterReviews(this.getAttribute('data-filter'));
        });
    });
}

function filterReviews(filter) {
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.classList.remove('active');
    });

    document.querySelector(`.filter-btn[data-filter="${filter}"]`).classList.add('active');

    document.querySelectorAll('.review-card').forEach(card => {
        let rating = parseInt(card.getAttribute('data-rating'));

        if (filter === 'all') {
            card.style.display = '';
        } else if (filter === 'excellent' && rating == 100) {
            card.style.display = '';
        } else if (filter === 'good' && rating == 80) {
            card.style.display = '';
        } else if (filter === 'average' && rating == 60) {
            card.style.display = '';
        } else if (filter === 'poor' && rating == 40) {
            card.style.display = '';
        } else if (filter === 'worse' && rating == 20) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}

function formatDate(dateString) {
    let date = new Date(dateString);
    let year = date.getFullYear();
    let month = String(date.getMonth() + 1).padStart(2, '0');
    let day = String(date.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}
</script>

