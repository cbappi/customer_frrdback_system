<!-- START SECTION BREADCRUMB -->
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
</style>
<style>
    .content-text {
        font-family: 'Roboto', sans-serif;
        font-size: 1.2em;
        color: #333;
    }
</style>
<script>
ByCategory();

async function ByCategory() {
    let searchParams = new URLSearchParams(window.location.search);
    let id = searchParams.get('id');
    let res = await axios.get(`/ListBookByCategory/${id}`);
    $("#byCategoryList").empty();
    let tableList = $("#byCategoryList");
    res.data['data'].forEach((item, i) => {


        let description = item['book_description'];
        let truncatedDescription = truncateDescription(description, 50, i);
        let EachItem = `
            <div class="col-md-12 mt-3" style='box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;'>
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-5 p-2">
                            <img class="fluid" src="${item['image_one']}" alt="product_img9" style ="height:350px;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h3 class="card-title">${item['book_name']}</h3>
                                <p class="fs-3">Author :  ${item['author']}</p>

                                <p class="fs-6 lh-sm" id="description-${i}">${truncatedDescription}</p>
                        

                                <a type="button" class="btn btn-outline-dark ms-2" href="/details-book?id=${item['id']}">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
        $("#byCategoryList").append(EachItem);
        // $("#CatName").text(res.data['data'][0]['category']['name']);
    });


}

function truncateDescription(description, wordLimit, index) {
    let words = description.split(' ');
    if (words.length > wordLimit) {
        let truncated = words.slice(0, wordLimit).join(' ');
        return `${truncated}... <a href="#" class="learn-more text-danger" data-index="${index}" data-full-text="${encodeURIComponent(description)}" data-truncated-text="${encodeURIComponent(truncated)}">Learn More</a>`;
    }
    return description;
}



document.addEventListener('click', function(e) {
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
