<div class="container mt-5">
    <h2 class="text-center">Reviews for <span id="HotelName"></span></h2>
    <div id="reviewList" class="row justify-content-center mt-3">
    </div>
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
</style>

<script>
ByHotelReviews();

async function ByHotelReviews() {
    let searchParams = new URLSearchParams(window.location.search);
    let id = searchParams.get('id');
    let res = await axios.get(`/ListReviewsByHotelId/${id}`);
    let hotelRes = await axios.get(`/HotelDetailsById/${id}`);
    $("#reviewList").empty();
    $("#HotelName").text(hotelRes.data['data']['hotel_name']);
    let reviewList = $("#reviewList");

    res.data['data'].forEach((review, i) => {
        let EachReview = `
            <div class="col-md-12 review-card">
                <h3>${review['review_title']}</h3>
                <p>${review['review_des']}</p>
                <p class="rating">Rating: ${review['rating']} / 5</p>
                <p><strong>Reviewed by:</strong> ${review['name']}</p>
                <p><strong>Year:</strong> ${review['year']}</p>
                <p><strong>Go with:</strong> ${review['gowith']}</p>
            </div>`;
        reviewList.append(EachReview);
    });
}
</script>
