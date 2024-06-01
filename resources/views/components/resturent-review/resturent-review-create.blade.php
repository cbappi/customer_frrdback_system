<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Resturent Review</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">


                                <label class="form-label">Resturent Name</label>
                                <select type="text" class="form-control form-select" id="resturentName">
                                    <option value="">Select Resturent Name</option>
                                </select>

                                <label class="form-label">Review title *</label>
                                <input type="text" class="form-control" id="reviewTitle">

                                <label class="form-label">Review description *</label>
                                <input type="text" class="form-control" id="reviewDes">



                                <select class="form-select" aria-label="Default      select example" id="rating">
                                    <option selected>Select Rating</option>
                                    <option value="20">Terrible</option>
                                    <option value="40">Poor</option>
                                    <option value="60">Average</option>
                                    <option value="80">Very Good</option>
                                    <option value="100">Excellent</option>
                                </select>


                                <select class="form-select" aria-label="Default      select example" id="gowith">
                                    <option selected>Select who did you go with</option>
                                    <option value="Family">Family</option>
                                    <option value="Friend">Friend</option>
                                    <option value="Couple">Couple</option>
                                    <option value="Solo">Solo</option>
                                    <option value="Business">Business</option>
                                </select>

                                <select class="form-select" aria-label="Default      select example" id="year">
                                    <option selected>Select when did you go</option>
                                    <option value="2028">2028</option>
                                    <option value="2027">2027</option>
                                    <option value="2026">2026</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                </select>

                                <label class="form-label">Review submitter name *</label>
                                <input type="text" class="form-control" id="name">

                                <label class="form-label">Review submitter email *</label>
                                <input type="text" class="form-control" id="email">

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


    async function FillCategoryDropDown(){
            let res = await axios.get("/list-resturent-info")
            res.data.forEach(function (item,i) {
                let option=`<option value="${item['id']}">${item['resturent_name']}</option>`
                $("#resturentName").append(option);
            })
    }

    async function Save() {
        let resturentName= document.getElementById('resturentName').value;
        let reviewTitle = document.getElementById('reviewTitle').value;
        let reviewDes = document.getElementById('reviewDes').value;
        let rating = document.getElementById('rating').value;
        let gowith = document.getElementById('gowith').value;
        let year = document.getElementById('year').value;
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;


        if (resturentName.length === 0) {
            errorToast("Resturent Name Required !")
        }
        else if(reviewTitle.length===0){
            errorToast("Review Title Required !")
        }
        else if(reviewDes.length===0){
            errorToast("Review Description Required !")
        }
        else if(rating.length===0){
            errorToast("Rating Required !")
        }
        else if(gowith.length===0){
            errorToast("Go with Required !")
        }
        else if(year.length===0){
            errorToast("Year Required !")
        }
        else if(name.length===0){
            errorToast("Name Required !")
        }
        else if(email.length===0){
            errorToast("Email Required !")
        }


        else {

            document.getElementById('modal-close').click();

            showLoader();
            let res = await axios.post("/create-resturent-review",{resturent_info_id:resturentName,
                review_title:reviewTitle,
                review_des:reviewDes,
                rating:rating,
                gowith:gowith,
                year:year,
                name:name,
                email:email

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

