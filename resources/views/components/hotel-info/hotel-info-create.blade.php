<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Hotel Category</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">


                                <label class="form-label">Hotel Category</label>
                                <select type="text" class="form-control form-select" id="hotelCategory">
                                    <option value="">Select Hotel Category</option>
                                </select>

                                <label class="form-label">Hotel name *</label>
                                <input type="text" class="form-control" id="hotelName">

                                <label class="form-label">Hotel description *</label>
                                <input type="text" class="form-control" id="hotelDescription">

                                <label class="form-label">Hotel anenities *</label>
                                <input type="text" class="form-control" id="hotelAmenities">

                                <label class="form-label">Hotel type *</label>
                                <input type="text" class="form-control" id="hotelType">

                                <label class="form-label">Room feature *</label>
                                <input type="text" class="form-control" id="roomFeature">

                                <label class="form-label">Room price start *</label>
                                <input type="text" class="form-control" id="roomStart">

                                <label class="form-label">Room price last *</label>
                                <input type="text" class="form-control" id="roomLast">

                                <label class="form-label">Discount*</label>
                                <input type="text" class="form-control" id="discount">

                                <label class="form-label">Country*</label>
                                <input type="text" class="form-control" id="country">


                                {{-- ---------------------- --}}

                                <label class="form-label">District *</label>
                                <input type="text" class="form-control" id="district">

                                <label class="form-label">Address*</label>
                                <input type="text" class="form-control" id="address">

                                <label class="form-label">Website*</label>
                                <input type="text" class="form-control" id="website">


                                <label class="form-label">Email*</label>
                                <input type="text" class="form-control" id="email">

                                <label class="form-label">Phone*</label>
                                <input type="text" class="form-control" id="phone">


                                {{-- ---------------------- --}}
                                <label class="form-label">Image one*</label>
                                <input type="text" class="form-control" id="imageOne">

                                <label class="form-label">Image two*</label>
                                <input type="text" class="form-control" id="imageTwo">

                                <label class="form-label">Image three*</label>
                                <input type="text" class="form-control" id="imageThree">

                                <label class="form-label">Image four*</label>
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


    FillCategoryDropDown();


    async function FillCategoryDropDown() {
    try {
        let res = await axios.get("/list-hotel-subcategory");
        if (res.data && res.data.length) {
            res.data.forEach(function (item, i) {
                let option = `<option value="${item['id']}">${item['sub_cat_name']}</option>`;
                $("#hotelCategory").append(option);
            });
        } else {
            console.log("No data available");
        }
    } catch (error) {
        console.error("Error fetching restaurant info:", error);
    }
}


    // async function FillCategoryDropDown(){
    //         let res = await axios.get("/list-hotel-subcategory")
    //         res.data.forEach(function (item,i) {
    //             let option=`<option value="${item['id']}">${item['sub_cat_name']}</option>`
    //             $("#hotelCategory").append(option);
    //         })
    // }

    async function Save() {
        let hotelCategory= document.getElementById('hotelCategory').value;
        let hotelName = document.getElementById('hotelName').value;
        let hotelDescription = document.getElementById('hotelDescription').value;
        let hotelAmenities = document.getElementById('hotelAmenities').value;
        let hotelType = document.getElementById('hotelType').value;
        let roomFeature= document.getElementById('roomFeature').value;
        let roomStart= document.getElementById('roomStart').value;
        let roomLast= document.getElementById('roomLast').value;
        let discount= document.getElementById('discount').value;
        let country= document.getElementById('country').value;
        let district = document.getElementById('district').value;
        let address = document.getElementById('address').value;
        let website = document.getElementById('website').value;
        let email = document.getElementById('email').value;
        let phone = document.getElementById('phone').value;
        let imageOne = document.getElementById('imageOne').value;
        let imageTwo = document.getElementById('imageTwo').value;
        let imageThree = document.getElementById('imageThree').value;
        let imageFour = document.getElementById('imageFour').value;


        if (hotelCategory.length === 0) {
            errorToast("Resturent Name Required !")
        }
        else if(hotelName.length===0){
            errorToast("Review Title Required !")
        }
        else if(hotelDescription.length===0){
            errorToast("Review Description Required !")
        }
        else if(hotelAmenities.length===0){
            errorToast("Rating Required !")
        }
        else if(hotelType.length===0){
            errorToast("Review Title Required !")
        }
        else if(roomFeature.length===0){
            errorToast("Review Description Required !")
        }
        else if( roomStart.length===0){
            errorToast("Rating Required !")
        }
        else if( roomLast.length===0){
            errorToast("Go with Required !")
        }
        else if(discount.length===0){
            errorToast("Year Required !")
        }

        else if(country.length===0){
            errorToast("Email Required !")
        }
        else if(district.length===0){
            errorToast("Email Required !")
        }

        else if(address.length===0){
            errorToast("Name Required !")
        }
        else if(website.length===0){
            errorToast("Name Required !")
        }
        else if(email.length===0){
            errorToast("Name Required !")
        }
        else if(phone.length===0){
            errorToast("Name Required !")
        }
        else if(imageOne.length===0){
            errorToast("Name Required !")
        }

        else if(imageTwo.length===0){
            errorToast("Name Required !")
        }
        else if(imageThree.length===0){
            errorToast("Name Required !")
        }
        else if(imageFour.length===0){
            errorToast("Name Required !")
        }



        else {

            document.getElementById('modal-close').click();

            showLoader();
            let res = await axios.post("/create-hotel-info",{hotel_subcategory_id:hotelCategory,
                hotel_name:hotelName,
                hotel_description:hotelDescription,
                hotel_amenities: hotelAmenities,
                hotel_type:hotelType,
                room_feature:roomFeature,
                start_room_price:roomStart,
                last_room_price:roomLast,
                discount:discount,
                country:country,
                district:district,
                address:address,
                website:website,

                email:email,
                phone:phone,
                image_one:imageOne,
                image_two:imageTwo,
                image_three:imageThree,
                image_four:imageFour


             })
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

