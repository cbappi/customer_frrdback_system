<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Customer</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">


                                <label class="form-label">Resturent Category</label>
                                <select type="text" class="form-control form-select" id="resturentCategory">
                                    <option value="">Select Category</option>
                                </select>

                                <label class="form-label">Resturen name *</label>
                                <input type="text" class="form-control" id="resturentName">

                                <label class="form-label">Resturent description *</label>
                                <input type="text" class="form-control" id="resturentDescription">

                                <label class="form-label">Festures *</label>
                                <input type="text" class="form-control" id="features">

                                <label class="form-label">Cuisines *</label>
                                <input type="text" class="form-control" id="cuisines">

                                <label class="form-label">Special diets *</label>
                                <input type="text" class="form-control" id="specialDiets">

                                <label class="form-label">Meals *</label>
                                <input type="text" class="form-control" id="meals">

                                <label class="form-label">Discount *</label>
                                <input type="text" class="form-control" id="discount">

                                <label class="form-label">Price range start *</label>
                                <input type="number" step=".10" class="form-control" id="priceFirst">

                                <label class="form-label">Price range last  *</label>
                                <input type="number" step=".10" class="form-control" id="priceLast">

                                <label class="form-label">Open time *</label>
                                <input type="text" class="form-control" id="openTime">

                                <label class="form-label">Close time *</label>
                                <input type="text" class="form-control" id="closeTime">

                                <label class="form-label">Address *</label>
                                <input type="text" class="form-control" id="address">

                                <label class="form-label">Website name  *</label>
                                <input type="text" class="form-control" id="website">

                                <label class="form-label">Email *</label>
                                <input type="text" class="form-control" id="email">

                                <label class="form-label">Phone *</label>
                                <input type="text" class="form-control" id= "phone">


                                <label class="form-label">Image one *</label>
                                <input type="text" class="form-control" id="imageOne">

                                <label class="form-label">Image two *</label>
                                <input type="text" class="form-control" id="imageTwo">

                                <label class="form-label">Image three *</label>
                                <input type="text" class="form-control" id="imageThree">

                                <label class="form-label">Image four *</label>
                                <input type="text" class="form-control" id="imageFour">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>

<script>

    //let categoryMap = {};

    FillCategoryDropDown();

    async function FillCategoryDropDown() {
    try {
        let res = await axios.get("/list-resturent-info");
        if (res.data && res.data.length) {
            res.data.forEach(function (item, i) {
                let option = `<option value="${item['id']}">${item['resturent_name']}</option>`;
                $("#resturentName").append(option);
            });
        } else {
            console.log("No data available");
        }
    } catch (error) {
        console.error("Error fetching restaurant info:", error);
    }
}


    // async function FillCategoryDropDown(){
    //         let res = await axios.get("/list-resturent-sub-category")
    //         res.data.forEach(function (item,i) {
    //             let option=`<option value="${item['id']}">${item['name']}</option>`
    //             $("#resturentCategory").append(option);
    //         })
    // }

    async function Save() {
        let resturentCategory = document.getElementById('resturentCategory').value;
        let resturentName = document.getElementById('resturentName').value;
        let resturentDescription = document.getElementById('resturentDescription').value;
        let features = document.getElementById('features').value;
        let cuisines = document.getElementById('cuisines').value;
        let specialDiets = document.getElementById('specialDiets').value;
        let meals = document.getElementById('meals').value;
        let discount = document.getElementById('discount').value;
        let priceFirst = document.getElementById('priceFirst').value;
        let priceLast = document.getElementById('priceLast').value;

        let openTime = document.getElementById('openTime').value;
        let closeTime = document.getElementById('closeTime').value;
        let address = document.getElementById('address').value;
        let website = document.getElementById('website').value;
        let email = document.getElementById('email').value;
        let phone = document.getElementById('phone').value;

        let imageOne= document.getElementById('imageOne').value;
        let imageTwo = document.getElementById('imageTwo').value;
        let imageThree = document.getElementById('imageThree').value;
        let imageFour = document.getElementById('imageFour').value;

        if (resturentName.length === 0) {
            errorToast("Resturent Name Required !")
        }
        else if(resturentDescription.length===0){
            errorToast("Resturen Description Required !")
        }
        else if(features.length===0){
            errorToast("Features Required !")
        }
        else if(resturentDescription.length===0){
            errorToast("Resturen Description Required !")
        }
        else if(features.length===0){
            errorToast("Features Required !")
        }
        else if(cuisines.length===0){
            errorToast("Cuisines Required !")
        }
        else if(specialDiets.length===0){
            errorToast("Special Diets Required !")
        }
        else if(meals.length===0){
            errorToast("Meals Required !")
        }
        else if(discount.length===0){
            errorToast("Discount Required !")
        }
        else if(priceFirst.length===0){
            errorToast("Price Range First Required !")
        }
        else if(priceLast.length===0){
            errorToast("Price Range last Required !")
        }
        else if(openTime.length===0){
            errorToast("Open Time Required !")
        }
        else if(closeTime.length===0){
            errorToast("Close Time Required !")
        }
        else if(address.length===0){
            errorToast("Address Required !")
        }
        else if(website.length===0){
            errorToast("Website Required !")
        }
        else if(email.length===0){
            errorToast("Email Required !")
        }
        else if(phone.length===0){
            errorToast("Phone Required !")
        }
        else if(imageOne.length===0){
            errorToast("Image One Required !")
        }
        else if(imageTwo.length===0){
            errorToast("Image Two Required !")
        }
        else if(imageThree.length===0){
            errorToast("Image Three Required !")
        }
        else if(imageFour.length===0){
            errorToast("Image Four Required !")
        }
        else {

            document.getElementById('modal-close').click();

            showLoader();
            let res = await axios.post("/create-resturent-info",{resturent_category_id:resturentCategory,
                resturent_name:resturentName,
                resturent_description:resturentDescription,
                features: features,
                cuisines:cuisines,
                 special_diets:specialDiets,
                  meals:meals,
                   discount:discount,
                    price_range_start:priceFirst,
                    price_range_last:priceLast,
                    open_time:openTime,
                    close_time:closeTime,
                    address:address,
                    website:website,
                    email:email, phone:phone,
                    image_one:imageOne,
                    image_two:imageTwo,
                    image_three:imageThree,
                    image_four:imageFour })
           hideLoader();

            if(res.status===201){

                successToast('Request completed');

                document.getElementById("save-form").reset();

                await getList();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }

</script>

