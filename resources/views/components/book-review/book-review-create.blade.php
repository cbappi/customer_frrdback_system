<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Book Review</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">


                                <label class="form-label">Book Name</label>
                                <select type="text" class="form-control form-select" id="bookName">
                                    <option value="">Select Book Name</option>
                                </select>

                                <label class="form-label">Book title *</label>
                                <input type="text" class="form-control" id="bookTitle">

                                <label class="form-label">Book description *</label>
                                <input type="text" class="form-control" id="bookDes">



                                <select class="form-select" aria-label="Default      select example" id="rating">
                                    <option selected>Select Rating</option>
                                    <option value="20">Not Satisfactory</option>
                                    <option value="40">Poor</option>
                                    <option value="60">Average</option>
                                    <option value="80">Good</option>
                                    <option value="100">Excellent</option>
                                </select>


                                <select class="form-select" aria-label="Default      select example" id="reviewType">
                                    <option selected>Select review type</option>
                                    <option value="Not Satisfy">Not Satisfy</option>
                                    <option value="Poor">Poor</option>
                                    <option value="Average">Average</option>
                                    <option value="Good">Good</option>
                                    <option value="Excellent">Excellent</option>
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
            let res = await axios.get("/list-book-name")
            res.data.forEach(function (item,i) {
                let option=`<option value="${item['id']}">${item['name']}</option>`
                $("#bookName").append(option);
            })
    }

    async function Save() {
        let bookName= document.getElementById('bookName').value;
        let bookTitle = document.getElementById('bookTitle').value;
        let bookDes = document.getElementById('bookDes').value;
        let rating = document.getElementById('rating').value;
        let reviewType = document.getElementById('reviewType').value;

        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;


        if (bookName.length === 0) {
            errorToast("Resturent Name Required !")
        }
        else if(bookTitle.length===0){
            errorToast("Review Title Required !")
        }
        else if(bookDes.length===0){
            errorToast("Review Description Required !")
        }

        else if(reviewType.length===0){
            errorToast("Go with Required !")
        }
        else if(rating.length===0){
            errorToast("Rating Required !")
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
            let res = await axios.post("/create-book-review",{book_name_id:bookName,
                review_title:bookTitle,
                review_des:bookDes,
                rating:rating,
                review_type:reviewType,
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

