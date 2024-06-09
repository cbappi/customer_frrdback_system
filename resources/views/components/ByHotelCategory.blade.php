<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Category: <span id="CatName"></span></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{url("/")}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">This Page</a></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="mt-5">
    <div class="container my-5">
        <div id="byCategoryList" class="row justify-content-center">
        </div>
        <div id="paginationControls" class="d-flex justify-content-center mt-4">
        </div>
    </div>
</div>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    .room-feature {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: #343a40;
        color: white;
        margin: 5px;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.9em;
    }

    .room-feature i {
        margin-right: 5px;
    }

    .content-text {
        font-family: 'Roboto', sans-serif;
        font-size: 1.2em;
        color: #333;
    }

    .pagination-btn {
        margin: 0 5px;
        padding: 5px 10px;
        border: 1px solid #343a40;
        border-radius: 5px;
        cursor: pointer;
        color: #343a40;
    }

    .pagination-btn:hover {
        background-color: #343a40;
        color: white;
    }

    .pagination-btn.active {
        background-color: #343a40;
        color: white;
    }
</style>

<script>
ByCategory();

async function ByCategory() {
    let searchParams = new URLSearchParams(window.location.search);
    let id = searchParams.get('id');
    let res = await axios.get(`/ListHotelBySubCategory/${id}`);
    let hotels = res.data['data'];

    const itemsPerPage = 5;
    const totalPages = Math.ceil(hotels.length / itemsPerPage);

    // Function to render the current page of hotels
    function renderPage(page) {
        $("#byCategoryList").empty();
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        let pageHotels = hotels.slice(start, end);

        pageHotels.forEach((item, i) => {
            let roomFeatures = item['room_type'].split(',');
            let features = roomFeatures.map(roomFeature => `
                <div class="room-feature">
                    ${roomFeature.trim()}
                </div>`).join('');

            let description = item['hotel_description'];
            let truncatedDescription = truncateDescription(description, 50, start + i);
            let EachItem = `
                <div class="col-md-12 mt-3" style='box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;'>
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-5 p-2">
                                <img class="fluid" src="${item['image_one']}" alt="product_img9" style="height:350px;">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h3 class="card-title">${item['hotel_name']}</h3>
                                    <p class="fs-3"><i class="fas fa-map-marker-alt"></i> ${item['district']}, ${item['country']}</p>
                                    <p class="fs-6 lh-sm" id="description-${start + i}">${truncatedDescription}</p>
                                    <p class="fs-4 text-dark fw-bold lh-sm">What travelers love most</p>
                                    <div class="room-features">${features}</div>
                                    <a type="button" class="btn btn-outline-dark ms-2" href="/details-hotel?id=${item['id']}">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
            $("#byCategoryList").append(EachItem);
        });

        $("#CatName").text(hotels[0]['subcategory']['sub_cat_name']);
    }

    // Function to render pagination controls
    function renderPaginationControls() {
        $("#paginationControls").empty();
        for (let i = 1; i <= totalPages; i++) {
            let pageBtn = `<span class="pagination-btn ${i === 1 ? 'active' : ''}" data-page="${i}">${i}</span>`;
            $("#paginationControls").append(pageBtn);
        }
    }

    // Event listener for pagination buttons
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('pagination-btn')) {
            let page = parseInt(e.target.getAttribute('data-page'));
            $(".pagination-btn").removeClass('active');
            $(e.target).addClass('active');
            renderPage(page);
        }
    });

    // Render initial content
    renderPaginationControls();
    renderPage(1);
}

function truncateDescription(description, wordLimit, index) {
    let words = description.split(' ');
    if (words.length > wordLimit) {
        let truncated = words.slice(0, wordLimit).join(' ');
        return `${truncated}... <a href="#" class="learn-more text-danger" data-index="${index}" data-full-text="${encodeURIComponent(description)}" data-truncated-text="${encodeURIComponent(truncated)}">Learn More</a>`;
    }
    return description;
}

document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('learn-more')) {
        e.preventDefault();
        let index = e.target.getAttribute('data-index');
        let fullText = decodeURIComponent(e.target.getAttribute('data-full-text'));
        let truncatedText = decodeURIComponent(e.target.getAttribute('data-truncated-text'));
        let descriptionElem = document.getElementById(`description-${index}`);

        if (e.target.textContent === "Learn More") {
            descriptionElem.innerHTML = `${fullText} <a href="#" class="learn-more text-danger" data-index="${index}" data-full-text="${encodeURIComponent(fullText)}" data-truncated-text="${encodeURIComponent(truncatedText)}">Read Less</a>`;
        } else {
            descriptionElem.innerHTML = `${truncatedText}... <a href="#" class="learn-more text-danger" data-index="${index}" data-full-text="${encodeURIComponent(fullText)}" data-truncated-text="${encodeURIComponent(truncatedText)}">Learn More</a>`;
        }
    }
});
</script>
